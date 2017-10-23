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

$dquery = "SELECT d.name FROM team_driver td JOIN driver d ON (td.driver = d.id) WHERE team='$id'";
$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}
if(mysql_num_rows($dresult) > 0) {
	$drivers = "";
	while($d = mysql_fetch_array($dresult)) {
		$drivers .= "&bull; " . $d['name'] . "\n";
	}
	show_error("Team cannot be deleted because it is related to the following driver(s):\n" . $drivers);
	return;
}
?>
<h1>Delete team</h1>

<form action="team_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure that you want to delete this team?</td>
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
