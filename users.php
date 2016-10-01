<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE name LIKE '%$filter%'";
}
$query = "SELECT * FROM user $query_where ORDER BY name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

?>
<h1>Users</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="users">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=user_add">Add user</a>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No users found\n");
	return;
}
?>
<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head"><td width="40">&nbsp;</td><td>Name</td></tr>

<?

$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="<?=$style?>">
	<td width="40">
		<a href=".?page=user_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=user_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
</tr>
<?
	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
