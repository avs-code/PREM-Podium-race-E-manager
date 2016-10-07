<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<h1>Modify admin</h1>

<?
$id = addslashes($_GET['id']);
$query = "SELECT * FROM user WHERE id = '$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}
if(mysql_num_rows($result) == 0) {
	show_error("User does not exist\n");
	return;
}
$item = mysql_fetch_array($result);
?>

<form action="user_chg_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Reset password?</td>
	<td>
		<input type="radio" name="passreset" value="2" id="passgenerate" onclick="showOptions(2);"> <label for="passgenerate">yes, generate</label>
		<input type="radio" name="passreset" value="1" id="passenter" onclick="showOptions(1);"> <label for="passenter">yes, enter new one</label>
		<input type="radio" name="passreset" value="0" id="passno" onclick="showOptions(0);" checked> <label for="passno">no</label>
	</td>
</tr>
<tr id="createpass1">
	<td>New password:</td>
	<td><input type="password" name="pass1"></td>
</tr>
<tr id="createpass2">
	<td>Confirm password:</td>
	<td><input type="password" name="pass2"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Modify">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
		<input type="hidden" name="id" value="<?=$id?>">
	</td>
</tr>
</table>
</form>

<script type="text/javascript" language="javascript" src="functions.js"></script>
<script type="text/javascript" language="javascript">
<!--
function showOptions(op) {
	switch(op) {
		case 0:
			ele("createpass1").style.display = "none";
			ele("createpass2").style.display = "none";
			break;
		case 1:
			ele("createpass1").style.display = "table-row";
			ele("createpass2").style.display = "table-row";
			break;
		case 2:
			document.getElementById("createpass1").style.display = "none";
			document.getElementById("createpass2").style.display = "none";
			break;
	}
}
showOptions(0);
// -->
</script>
