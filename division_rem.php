<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

$query = "SELECT * FROM division WHERE id='$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Division does not exist\n");
	return;
}
$item = mysql_fetch_array($result);

$squery = "SELECT s.name FROM division d JOIN season s ON (s.division = d.id) WHERE s.division='$id'";
$sresult = mysql_query($squery);
if(!$sresult) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($sresult) > 0) {
	$seasons = "";
	while($s = mysql_fetch_array($sresult)) {
		$seasons .= "&bull; " . $s['name'] . "\n";
	}
	show_error("Division cannot be deleted because it is related to the following season(s):\n" . $seasons);
	return;
}
?>
<h1>Delete division</h1>

<form action="division_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Type:</td>
	<td><?=$item['type']?></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>Are you sure that you want to delete this division?</td>
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
