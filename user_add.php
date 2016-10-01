<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<h1>Add user</h1>

<form action="user_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" maxlength="20"></td>
</tr>
<tr>
	<td>Generate password?</td>
	<td>
		<input type="radio" name="passgen" value="1" id="passgenyes" onclick="showOptions(2);"> <label for="passgenyes">yes</label>
		<input type="radio" name="passgen" value="0" id="passgenno" onclick="showOptions(1);" checked> <label for="passgenno">no</label>
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
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>

<script type="text/javascript" language="javascript" src="functions.js"></script>
<script type="text/javascript" language="javascript">
<!--
function showOptions(op) {
	switch(op) {
		case 1:
			ele("createpass1").style.display = "table-row";
			ele("createpass2").style.display = "table-row";
			break;
		case 2:
			ele("createpass1").style.display = "none";
			ele("createpass2").style.display = "none";
			break;
	}
}
showOptions(1);
// -->
</script>
