<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<h1>Add ruleset</h1>

<form action="point_add_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name ruleset:</td>
	<td><input type="text" name="name" maxlength="30"></td>
</tr>
<tr>
	<td>Race:</td>
	<td>
		<table border="0">
		<tr>
			<td width="22" align="right">1:</td>
			<td><input type="text" name="rp1" size="3" maxlength="3"></td>
			<td width="22" align="right">2:</td>
			<td><input type="text" name="rp2" size="3" maxlength="3"></td>
			<td width="22" align="right">3:</td>
			<td><input type="text" name="rp3" size="3" maxlength="3"></td>
			<td width="22" align="right">4:</td>
			<td><input type="text" name="rp4" size="3" maxlength="3"></td>
			<td width="22" align="right">5:</td>
			<td><input type="text" name="rp5" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">6:</td>
			<td><input type="text" name="rp6" size="3" maxlength="3"></td>
			<td width="22" align="right">7:</td>
			<td><input type="text" name="rp7" size="3" maxlength="3"></td>
			<td width="22" align="right">8:</td>
			<td><input type="text" name="rp8" size="3" maxlength="3"></td>
			<td width="22" align="right">9:</td>
			<td><input type="text" name="rp9" size="3" maxlength="3"></td>
			<td width="22" align="right">10:</td>
			<td><input type="text" name="rp10" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">11:</td>
			<td><input type="text" name="rp11" size="3" maxlength="3"></td>
			<td width="22" align="right">12:</td>
			<td><input type="text" name="rp12" size="3" maxlength="3"></td>
			<td width="22" align="right">13:</td>
			<td><input type="text" name="rp13" size="3" maxlength="3"></td>
			<td width="22" align="right">14:</td>
			<td><input type="text" name="rp14" size="3" maxlength="3"></td>
			<td width="22" align="right">15:</td>
			<td><input type="text" name="rp15" size="3" maxlength="3"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>Qualifying:</td>
	<td>
		<table border="0">
		<tr>
			<td width="22" align="right">1:</td>
			<td><input type="text" name="qp1" size="3" maxlength="3"></td>
			<td width="22" align="right">2:</td>
			<td><input type="text" name="qp2" size="3" maxlength="3"></td>
			<td width="22" align="right">3:</td>
			<td><input type="text" name="qp3" size="3" maxlength="3"></td>
			<td width="22" align="right">4:</td>
			<td><input type="text" name="qp4" size="3" maxlength="3"></td>
			<td width="22" align="right">5:</td>
			<td><input type="text" name="qp5" size="3" maxlength="3"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>Fatest lap:</td>
	<td><input type="text" name="fl" size="3" maxlength="3"></td>
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
