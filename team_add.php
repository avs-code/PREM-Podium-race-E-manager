<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
// Potential new drivers
$ndquery = "SELECT * FROM driver ORDER BY name ASC";
$ndresult = mysqli_query($link,$ndquery);
if(!$ndresult) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}

$drivers = array();
while($nditem = mysqli_fetch_array($ndresult)) {
	$drivers[$nditem['id']] = $nditem['name'];
}

function show_driver_combo() {
	global $drivers;

	echo "<select name=\"driver[]\">\n";
	echo "<option value=\"\">&nbsp;</option>\n";
	foreach($drivers as $id => $driver) {
		echo "<option value=\"$id\">$driver</option>";
	}
	echo "</select>\n";
}
?>
<h1>Add team</h1>

<form action="team_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" maxlength="30"></td>
</tr>
<tr>
	<td width="120">Drivers:</td>
	<td>
		<? for($x = 0; $x < 5; $x++) {
		show_driver_combo();
		echo "<br>\n";
		} ?>
	</td>
</tr>
<tr>
    <td width="120">Logo image url:</td>
	<td><input type="url" name="logo" value="<?=$item['logo']?>" maxlength="200"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
