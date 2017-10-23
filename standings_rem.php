<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM standing_pages WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Standing page does not exist\n");
	return;
}
$item = mysql_fetch_array($result);
?>
<h1>Delete standing page</h1>

<form action="standings_rem_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Page:</td>
	<td><?=$item['page']?></td>
</tr>
<tr>
	<td>Season:</td>
	<td><?=$item['season']?></td>
</tr>

	<?
    mysql_free_result($result)
    ?>

<tr>
	<td>&nbsp;</td>
	<td>Are you sure you want to delete this standing page?</td>
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
