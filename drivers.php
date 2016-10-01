<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE d.name LIKE '%$filter%'";
}
$query = "SELECT d.*, COUNT(td.id) teamcount FROM driver d LEFT JOIN team_driver td ON (td.driver = d.id) $query_where GROUP BY d.id ORDER BY name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

?>
<h1>Drivers</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="drivers">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=driver_add">Add driver</a>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No drivers found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="40">&nbsp;</td>
	<td>Name</td>
	<td width="40" align="center">Teams</td>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="<?=$style?>">
	<td width="40">
		<a href=".?page=driver_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=driver_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td width="40" align="center"><?=$item['teamcount']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
