<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

$query = "SELECT * FROM driver WHERE id='$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Driver does not exist\n");
	return;
}
$item = mysql_fetch_array($result);

$tquery = "SELECT t.name FROM team_driver td JOIN team t ON (td.team = t.id) WHERE driver='$id'";
$tresult = mysql_query($tquery);
if(!$tresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($tresult) > 0) {
	$teams = "";
	while($t = mysql_fetch_array($tresult)) {
		$teams .= "&bull; " . $t['name'] . "\n";
	}
	show_error("Driver cannot be deleted because it is related to the following team(s):\n" . $teams);
	return;
}

?>
<h1>Delete driver</h1>

<form action="driver_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure that you want to delete this driver?</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Yes">
		<input type="button" class="button cancel" value="No" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
