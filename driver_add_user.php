<? if(!defined("CONFIG")) exit(); ?>

<h1>Add driver</h1>

<form action="driver_add_do_user.php" method="post">
<table border="0">
<tr>
	<td width="120">Name:</td>
	<td><input type="text" name="name" maxlength="30"></td>
</tr>
<tr>
    <td width="120">Photo:</td>
	<td><input type="url" name="driver_photo" value="<?=$item['driver_photo']?>" maxlength="200"></td>
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
