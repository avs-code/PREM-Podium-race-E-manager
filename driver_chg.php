<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
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

$tquery = "SELECT td.*, t.name teamname FROM team_driver td JOIN team t ON (t.id = td.team) WHERE td.driver = '$id'";
$tresult = mysql_query($tquery);
if(!$tresult) {
	show_error("MySQL error: " . mysql_error());
	return;
}

$teamcount = mysql_num_rows($tresult);
?>
<h1>Modify driver</h1>

<form action="driver_chg_do.php" method="post">
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
	<td width="120">Name:</td>
	<td><input type="text" name="name" value="<?=$item['name']?>" maxlength="30"></td>
    <td width="120">Photo:</td>
	<td><input type="url" name="driver_photo" value="<?=$item['driver_photo']?>" maxlength="200"></td>
</tr>
<tr class="w3-hover-green">
	<td>Teams (<?=$teamcount?>):</td>
	<td>
	<? while($titem = mysql_fetch_array($tresult)) { ?>
		<a href="?page=team_driver_rem&amp;id=<?=$titem['id']?>"><img src="images/delete16.png" alt="delete"></a> <?=$titem['teamname']?><br>
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
