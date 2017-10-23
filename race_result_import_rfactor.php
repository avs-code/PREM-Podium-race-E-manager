<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['id']))
	$id = addslashes($_GET['id']);
elseif(isset($_POST['id']))
	$id = addslashes($_POST['id']);

if(isset($_POST['xml'])) {
	$upload = false;
	switch($_FILES['userfile']['error']) {
	case UPLOAD_ERR_OK:
		$upload = true;
		break;
	case UPLOAD_ERR_NO_FILE:
		$error .= "No file selected for uploading\n";
		break;
	case UPLOAD_ERR_INI_SIZE:
		$error .= "XML file too big\n";
		break;
	case UPLOAD_ERR_PARTIAL:
		$error .= "Upload of the XML file was not completed\n";
		break;
	case UPLOAD_NO_TMP_DIR:
		$error .= "Server error: missing tmp-directory\n";
		break;
	case UPLOAD_ERR_CANT_WRITE:
		$error .= "Server error: cannot write file\n";
		break;
	}

	if($upload) {
		$driver = array();
		$elem = null;

		# Parser functions
		function startElement($parser, $name, $attrs) {
			global $driver;
			global $elem;

			if($name == "DRIVER") $driver[] = array();
			$elem = $name;
		}

		function endElement($parser, $name) {
			global $elem;
			$elem = null;
		}

		function textData($parser, $text) {
			global $driver;
			global $elem;

			if(count($driver) == 0)
				return;
			$elems = array("NAME", "TEAMNAME", "GRIDPOS", "POSITION", "BESTLAPTIME", "FINISHTIME", "LAPS");

			if(in_array($elem, $elems)) {
				$driver[count($driver) - 1][strtolower($elem)] = $text;
			}
		}

		# Parse the XML file
		$file = $_FILES['userfile']['tmp_name'];
		$parser = xml_parser_create();
		if (!($fp = fopen($file, "r"))) {
			show_error("Could not open XML file");
			return;
		}
		$data = fread($fp, filesize($file));
		fclose($fp);
		xml_set_element_handler($parser, "startElement", "endElement");
		xml_set_character_data_handler($parser, "textData");
		$ret = xml_parse($parser, $data, true);
		if(!$ret) {
			$code = xml_get_error_code($parser);
			show_error("XML error on line " . xml_get_current_line_number($parser) . ": " . xml_error_string($code));
			return;
		}
		xml_parser_free($parser);

		# Sort out drivers by final position
		foreach($driver as $key => $row) {
			$position[$key] = $row['position'];
		}
		array_multisort($position, SORT_ASC, SORT_NUMERIC, $driver);

		# Get driver with fastest lap
		$bestlapdriver = null;
		$bestlap = null;
		foreach($driver as $key => $row) {
			if($bestlap == null || $row['bestlaptime'] < $bestlap) {
				$bestlap = $row['bestlaptime'];
				$bestlapdriver = $key;
			}
		}
		$driver[$bestlapdriver]['fastestlap'] = 1;
	}
}

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT r.*, d.name dname, rs.name rsname, s.name sname FROM race r JOIN division d ON (d.id = r.division) JOIN point_ruleset rs ON (rs.id = r.ruleset) LEFT JOIN season s ON (s.id = r.season) WHERE r.id='$id' ORDER BY r.date DESC";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Race does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$date = strtotime($item['date']);
?>
<h1>Import rFactor XML</h1>

<table border="0" width="100%">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
	<td>Laps:</td>
	<td><?=$item['laps']?></td>
</tr>
<tr>
	<td>Track:</td>
	<td><?=$item['track']?></td>
	<? if($item['season'] == 0) { ?>
	<td>Division/Ruleset:</td>
	<td><?=$item['dname']?> / <?=$item['rsname']?></td>
	<? } else { ?>
	<td>Season / Division:</td>
	<td><?=$item['sname']?> / <?=$item['dname']?></td>
	<? } ?>
</tr>
<tr>
	<td>Date/Time:</td>
	<td>
		<?=date("j F Y, H:i", $date)?>
	</td>
	<td>Max players:</td>
	<td><?=$item['maxplayers']?></td>
</tr>
</table>
<? if(!$upload) { ?>
<br/>
<form action=".?page=race_result_import_rfactor" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" cellpadding="2">
<tr>
	<td>XML file:</td>
	<td><input type="file" name="userfile"/></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Upload"/>
		<input type="hidden" name="id" value="<?=$id?>"/>
		<input type="hidden" name="xml" value="1"/>
	</td>
</tr>
</table>
</form>
<? } else { ?>
<? require_once("results_functions.php"); ?>
<?
if($item['season'] == 0)
	$dquery = "SELECT td.id, t.name team, d.name driver FROM team_driver td JOIN team t ON (t.id = td.team) JOIN driver d ON (d.id = td.driver)";
else
	$dquery = "SELECT td.id, t.name team, d.name driver FROM season_team st JOIN team t ON (t.id = st.team) JOIN team_driver td ON (td.team = t.id) JOIN driver d ON (d.id = td.driver) WHERE st.season='{$item['season']}'";

$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysql_num_rows($dresult) == 0){
	show_error("No drivers exist in teams or no teams are in this season\n");
	return;
}

$drivers = array();
while($ditem = mysqli_fetch_array($dresult)) {
	$drivers[$ditem['id']]['name'] = $ditem['driver'];
	$drivers[$ditem['id']]['team'] = $ditem['team'];
}

function show_driver_combo($did = 0) {
	global $drivers;

	echo "<select name=\"driver[]\">\n";
	echo "<option value=\"\">&nbsp;</option>\n";
	foreach($drivers as $id => $driver) {
		echo "<option value=\"$id\"";
		if($id == $did) echo " selected";
		echo ">" . $driver['name'] . " (" . $driver['team'] . ")";
		echo "</option>\n";
	}
	echo "</select>\n";
}
?>
<form action="race_results_chg_do.php" method="post">
		<table border="0" cellspacing="0" cellpadding="1" width="100%">
		<tr class="head">
			<td>Driver (Team)</td>
			<td align="center">Grid</td>
			<td align="center">Pos</td>
			<td align="center">Laps</td>
			<td>Time</td>
			<td align="center"><span class="abbr" title="Fastest Lap">FL</span></td>
			<td>Status</td>
		</tr>
		<? $style = "odd"; ?>
		<? for($x = 0; $x < $item['maxplayers']; $x++) {
			if($x < count($driver)) {
				$ditem = $driver[$x];
				$drivername = $ditem['name'] . " (" . $ditem['teamname'] . ")";
				$grid = $ditem['gridpos'];
				if($grid == 0) $grid = "";
				$position = $ditem['position'];
				if($position == 0) $position = "";
				$laps = $ditem['laps'];
				if($laps == 0) $laps = "";
				$time = $ditem['finishtime'] * 10000;
				$fl = $ditem['fastestlap'];
				$status = 0;

				$hour = floor($time / 36000000);
				$time = $time % 36000000;
				$minute = floor($time / 600000);
				$time = $time % 600000;
				$second = floor($time / 10000);
				$ms = round(($time % 10000) / 10);
			} else {
				$drivername = "";
				$grid = "";
				$position = "";
				$laps = "";
				$hour = "";
				$minute = "";
				$second = "";
				$ms = "";
				$fl = 0;
				$status = 3;
			}
			?>
			<tr class="<?=$style?>">
				<td><?=$drivername . (!empty($drivername) ? "<br/>" : "")?><? show_driver_combo(); ?></td>
				<td align="center"><input type="text" name="grid[]" value="<?=$grid?>" size="2" maxlength="2"></td>
				<td align="center"><input type="text" name="pos[]" value="<?=$position?>" size="2" maxlength="2"></td>
				<td align="center"><input type="text" name="laps[]" value="<?=$laps?>" size="3" maxlength="3"></td>
				<td>
					<input type="text" name="hour[]" value="<?=$hour?>" style="text-align:right;" size="1" maxlength="2">h
					<input type="text" name="minute[]" value="<?=$minute?>" style="text-align:right;" size="1" maxlength="2">m
					<input type="text" name="second[]" value="<?=$second?>" style="text-align:right;" size="1" maxlength="2">s
					<input type="text" name="ms[]" value="<?=$ms?>" size="2" maxlength="3">
				</td>
				<td align="center"><input type="checkbox" name="fl[<?=$x?>]"<?=$fl==1?" checked":""?>></td>
				<td align="center">
					<select name="status[]">
						<? foreach($race_status_s as $i => $s) { ?>
						<option value="<?=$i?>"<?=$i == $status ? " selected" : ""?>><?=$s?></option>
						<? } ?>
					</select>
				</td>
			</tr>
		<?	$style = $style == "odd" ? "even" : "odd"; ?>
		<? } ?>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="season" value="<?=$item['season']?>">
					<input type="submit" class="button submit" value="Save results"/>
					<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);"/>
				</td>
			</tr>
		</table>
</form>
<? } ?>
