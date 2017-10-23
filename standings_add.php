<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<?
$season = $_GET['season'];

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$squery = "SELECT s.* FROM season s";
$sresult = mysqli_query($link,$squery);
if(!$sresult) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}


?>
<h1>Add season</h1>

<form action="standings_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Page:</td>
	<td><input type="number" name="page" min="1" max="7">
</tr>
<tr>
	<td>Season:</td>
	<td>
		<select id="season" name="season" onchange="showOptions();">
		<option value="0">--NO SEASON--</option>
		<? while($sitem = mysqli_fetch_array($sresult)) { ?>
			<option value="<?=$sitem['id']?>"<?=$season == $sitem['id'] ? " selected=\"1\"" : ""?>><?=$sitem['name']?></option>
		<? }
        mysqli_free_result($sresult)
        ?>
		</select>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
