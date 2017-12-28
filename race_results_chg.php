<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
require_once("results_functions.php");

$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT r.*, d.name dname, rs.name rsname, s.name sname
					FROM race r
					JOIN division d ON (d.id = r.division)
					JOIN point_ruleset rs ON (rs.id = r.ruleset)
					LEFT JOIN season s ON (s.id = r.season)
					WHERE r.id='$id' ORDER BY r.date DESC";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($result) == 0){
	show_error("Race does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$date = strtotime($item['date']);

if($item['season'] == 0)
	$dquery = "SELECT td.id, t.name team, d.name driver, d.plate dplate
						 FROM team_driver td
						 JOIN team t ON (t.id = td.team)
						 JOIN driver d ON (d.id = td.driver)";
else
	$dquery = "SELECT td.id, t.name team, d.name driver, d.plate dplate
	           FROM season_team st
						 JOIN team t ON (t.id = st.team)
						 JOIN team_driver td ON (td.team = t.id)
						 JOIN driver d ON (d.id = td.driver)
						 WHERE st.season='{$item['season']}'";

$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysqli_num_rows($dresult) == 0){
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

$rdquery = "SELECT * FROM race_driver WHERE race='$id' ORDER BY position ASC, time ASC, grid ASC";
$rdresult = mysqli_query($link,$rdquery);
if(!$rdresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}

?>
<h1>Modify race results</h1>

<br/>
<a href="?page=race_result_import_rfactor&amp;id=<?=$id?>"><img src="images/properties16.png" alt=""/> Import rFactor XML</a> |
<a href="?page=race_result_import_lfspoints&amp;id=<?=$id?>"><img src="images/properties16.png" alt=""/> Import LFSPoints XML</a> |
<a href="?page=race_result_import_ac&amp;id=<?=$id?>"><img src="images/properties16.png" alt=""/> Import Assetto Corsa JSON</a><br/>

<br/>

<form action="race_results_chg_do.php" method="post">
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
<tr>
    <td>Replay link:</td>
	<td><i class="fa fa-link"></i><input type="url" name="replay" value="<?=$item['replay']?>" maxlength="200"></td>
</tr>
<tr>
	<td>Upload result file to Simresults:</a></td>
	<td><a href="http://simresults.net" target="_blank"><i class="fa fa-upload fa-4x" aria-hidden="true"></i></td>
</tr>
<tr>
    <td>Simresults URL:</td>
	<td><div class="input-group margin-bottom-sm">
	<i class="fa fa-link"></i><input type="url" name="simresults" value="<?=$item['simresults']?>" maxlength="200"></div></td>
</tr>
<tr>
	<td>
	Official result?
	</td>
	<td colspan="3">
	<input type="checkbox" name="official"<?=$item['result_official']=='1'?" checked=\"1\"":""?>>
	</td>
</tr>
<tr>
	<td colspan="4">
		<table border="0" cellspacing="0" cellpadding="1" width="100%">
		<tr class="head">
			<td>Driver (Team)</td>
			<td align="center">Car #</td>
			<td align="center">Grid</td>
			<td align="center">Pos</td>
			<td align="center">Laps</td>
			<td>Time</td>
			<td align="center"><span class="abbr" title="Fastest Lap">FL</span></td>
			<td>Status</td>
		</tr>
		<? $style = "odd"; ?>
		<? for($x = 0; $x < $item['maxplayers']; $x++) {
			if($rditem = mysqli_fetch_array($rdresult)) {
				$driver = $rditem['team_driver'];
				$dplate = $rditem['dplate'];
				$grid = $rditem['grid'];
				if($grid == 0) $grid = "";
				$position = $rditem['position'];
				if($position == 0) $position = "";
				$laps = $rditem['laps'];
				if($laps == 0) $laps = "";
				$time = $rditem['time'];
				$fl = $rditem['fastest_lap'];
				$status = $rditem['status'];

				$hour = floor($time / 3600000);
				$time = $time % 3600000;
				$minute = floor($time / 60000);
				$time = $time % 60000;
				$second = floor($time / 1000);
				$ms = $time % 1000;
			} else {
				$driver = 0;
				$grid = "";
				$position = "";
				$laps = "";
				$hour = "";
				$minute = "";
				$second = "";
				$ms = "";
				$fl = 0;
				$status = 0;
			}
			?>
			<tr class="<?=$style?>">
				<td><? show_driver_combo($driver) ?></td>
				<td align="center"><input type="text" name="dplate[]" value="<?=$dplate?>" size="3" maxlength="3"></td>
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
		</table>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan="3">
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="season" value="<?=$item['season']?>">
		<input type="submit" class="button submit" value="Save results">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>

<script type="text/javascript" language="javascript" src="functions.js"></script>
<script type="text/javascript" language="javascript">
<!--
function showOptions() {
	var season = ele("season").value;

	if(season == 0) {
		ele("division").style.display = "table-row";
		ele("ruleset").style.display = "table-row";
	}
	else {
		ele("division").style.display = "none";
		ele("ruleset").style.display = "none";
	}
}
showOptions();
// -->
</script>
