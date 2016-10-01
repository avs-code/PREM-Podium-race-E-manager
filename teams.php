<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE t.name LIKE '%$filter%'";
}
$query = "SELECT t.*, COUNT(td.driver) drivercount FROM team t LEFT JOIN team_driver td ON (t.id = td.team) $query_where GROUP BY t.id ORDER BY t.name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

?>
<h1>Teams</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="teams">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=team_add">Add team</a>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No teams found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="40">&nbsp;</td>
	<td>Name</td>
	<td width="50" align="center">Drivers</td>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="<?=$style?>">
	<td width="40">
		<a href=".?page=team_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=team_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td width="50" align="center"><?=$item['drivercount']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
