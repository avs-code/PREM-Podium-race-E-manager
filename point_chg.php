<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

$query = "SELECT * FROM point_ruleset WHERE id='$id'";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error() . "\n");
	return;
}
if(mysql_num_rows($result) == 0){
	show_error("Ruleset does not exist\n");
	return;
}
$item = mysql_fetch_array($result);

?>
<h1>Modify ruleset</h1>

<form action="point_chg_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Name ruleset:</td>
	<td><?=$item['name']?></td>
</tr>
<tr>
	<td>Race:</td>
	<td>
		<table border="0">
		<tr>
			<td width="22" align="right">1:</td>
			<td><input type="text" name="rp1" value="<?=$item['rp1']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">2:</td>
			<td><input type="text" name="rp2" value="<?=$item['rp2']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">3:</td>
			<td><input type="text" name="rp3" value="<?=$item['rp3']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">4:</td>
			<td><input type="text" name="rp4" value="<?=$item['rp4']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">5:</td>
			<td><input type="text" name="rp5" value="<?=$item['rp5']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">6:</td>
			<td><input type="text" name="rp6" value="<?=$item['rp6']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">7:</td>
			<td><input type="text" name="rp7" value="<?=$item['rp7']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">8:</td>
			<td><input type="text" name="rp8" value="<?=$item['rp8']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">9:</td>
			<td><input type="text" name="rp9" value="<?=$item['rp9']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">10:</td>
			<td><input type="text" name="rp10" value="<?=$item['rp10']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">11:</td>
			<td><input type="text" name="rp11" value="<?=$item['rp11']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">12:</td>
			<td><input type="text" name="rp12" value="<?=$item['rp12']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">13:</td>
			<td><input type="text" name="rp13" value="<?=$item['rp13']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">14:</td>
			<td><input type="text" name="rp14" value="<?=$item['rp14']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">15:</td>
			<td><input type="text" name="rp15" value="<?=$item['rp15']?>" size="3" maxlength="3"></td>
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
			<td><input type="text" name="qp1" value="<?=$item['qp1']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">2:</td>
			<td><input type="text" name="qp2" value="<?=$item['qp2']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">3:</td>
			<td><input type="text" name="qp3" value="<?=$item['qp3']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">4:</td>
			<td><input type="text" name="qp4" value="<?=$item['qp4']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">5:</td>
			<td><input type="text" name="qp5" value="<?=$item['qp5']?>" size="3" maxlength="3"></td>
		</tr>
		</table>
	</td>
</tr>
<tr>
	<td>Fatest lap:</td>
	<td><input type="text" name="fl" value="<?=$item['fl']?>" size="3" maxlength="3"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		Please note that by changing a ruleset, all the result related to it will be affected.<br>
		<br>
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="submit" class="button submit" value="Modify">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>
