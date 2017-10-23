<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM standing_pages WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysqli_error($link) . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Standing page does not exist\n");
	return;
}
$item = mysqli_fetch_array($result);

$squery = "SELECT s.* FROM season s";
$sresult = mysqli_query($link,$squery);
if(!$sresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

?>
<h1>Modify Standing page</h1>

<form action="standings_chg_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Page:</td>
	<td><input type="number" name="page" value="<?=$item['page']?>" min="1" max="7"></td>
</tr>
<tr>
	<td>Season:</td>
	<td>
		<select id="season" name="season" onchange="showOptions();">
		<option value="0">--NO SEASON--</option>
		<? while($sitem = mysqli_fetch_array($sresult)) { ?>
			<option value="<?=$sitem['id']?>"<?=$item['season'] == $sitem['id'] ? " selected=\"1\"" : ""?>><?=$sitem['name']?></option>
		<? }
        mysqli_free_result($sresult);
        mysqli_free_result($result);
         ?>
		</select>
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
