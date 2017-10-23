<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM team WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Team does not exist\n");
	return;
}
$item = mysql_fetch_array($result);

$dquery = "SELECT td.id, d.id did, d.name, COUNT(rd.race) rcount FROM team_driver td JOIN driver d ON (td.driver = d.id) LEFT JOIN race_driver rd ON (td.id = rd.team_driver) WHERE td.team = '$id' GROUP BY td.id ORDER BY name ASC";
$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}

$drivercount = mysql_num_rows($dresult);

// Potential new drivers
$ndquery = "SELECT * FROM driver ORDER BY name ASC";
$ndresult = mysqli_query($link,$ndquery);
if(!$ndresult) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}

$drivers = array();
while($nditem = mysql_fetch_array($ndresult)) {
	$drivers[$nditem['id']] = $nditem['name'];
}

function show_driver_combo($did = 0, $enabled = true) {
	global $drivers;

	echo "<select name=\"driver[]\"" . ($enabled ? "" : " disabled") . ">\n";
	echo "<option value=\"\">&nbsp;</option>\n";
	foreach($drivers as $id => $driver) {
		echo "<option value=\"$id\"";
		if($id == $did) echo " selected";
		echo ">" . $driver;
		echo "</option>\n";
	}
	echo "</select>\n";
	if(!$enabled)
		echo "<input type=\"hidden\" name=\"preserve[]\" value=\"$did\">";
}
?>
<h1>Modify team</h1>

<form action="team_chg_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" value="<?=$item['name']?>" maxlength="30"></td>
    <td width="120">logo:</td>
	<td><input type="url" name="logo" value="<?=$item['logo']?>" maxlength="200"></td>
</tr>
<tr>
	<td>Drivers (<?=$drivercount?>):</td>
	<td>
	<?
	for($x = 0; $x < 5; $x++) {
		if($ditem = mysql_fetch_array($dresult)) {
			show_driver_combo($ditem['did'], ($ditem['rcount'] == 0));
			if($ditem['rcount'] > 0) {
				echo "<img src=\"images/info16.png\" title=\"You cannot change this because this driver is related to " . $ditem['rcount'] . " race(s)\" onclick=\"alert('You cannot change this because this driver is related to " . $ditem['rcount'] . " race(s)');\" alt=\"\">";
			}
		} else {
			show_driver_combo();
		}
		echo "<br>\n";
	}
	?>
	<? while($ditem = mysql_fetch_array($dresult)) { ?>
		<a href="?page=team_driver_rem&amp;id=<?=$ditem['id']?>"><img src="images/delete16.png" alt="delete"></a> <?=$ditem['name']?><br>
	<? } ?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Modify">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
