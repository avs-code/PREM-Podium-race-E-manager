<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE name LIKE '%$filter%' OR type LIKE '%$filter%'";
}
$query = "SELECT * FROM division $query_where ORDER BY name ASC";
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link));
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
<!-- old style.css<table border="0" cellspacing="0" cellpadding="1" width="100%">
<tr class="head">
	<td width="40">&nbsp;</td>-->
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
	<td>Division</td>
	<td>Type</td>
</tr>

<?
$style = "odd";
while($item = mysqli_fetch_array($result)) {
?>
<!--old style.css<tr class="<?=$style?>">-->
<tr class="w3-hover-green">
	<td>
		<a href=".?page=division_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=division_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td><?=$item['type']?></td>
</tr>
<?
	#old style.css $style = $style == "odd" ? "even" : "odd";
}
?>
</table>
