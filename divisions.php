<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE name LIKE '%$filter%' OR type LIKE '%$filter%'";
}
$query = "SELECT * FROM division $query_where ORDER BY name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

?>
<h1>Divisions</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="divisions">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=division_add">Add division</a>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No divisions found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="40">&nbsp;</td>
	<td>Division</td>
	<td>Type</td>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="<?=$style?>">
	<td width="40">
		<a href=".?page=division_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=division_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td><?=$item['type']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
