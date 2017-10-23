<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
$id = addslashes($_GET['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM point_ruleset WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysql_error($link) . "\n");
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
		<tr>
			<td width="22" align="right">16:</td>
			<td><input type="text" name="rp16" value="<?=$item['rp16']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">17:</td>
			<td><input type="text" name="rp17" value="<?=$item['rp17']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">18:</td>
			<td><input type="text" name="rp18" value="<?=$item['rp18']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">19:</td>
			<td><input type="text" name="rp19" value="<?=$item['rp19']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">20:</td>
			<td><input type="text" name="rp20" value="<?=$item['rp20']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">21:</td>
			<td><input type="text" name="rp21" value="<?=$item['rp21']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">22:</td>
			<td><input type="text" name="rp22" value="<?=$item['rp22']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">23:</td>
			<td><input type="text" name="rp23" value="<?=$item['rp23']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">24:</td>
			<td><input type="text" name="rp24" value="<?=$item['rp24']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">25:</td>
			<td><input type="text" name="rp25" value="<?=$item['rp25']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">26:</td>
			<td><input type="text" name="rp26" value="<?=$item['rp26']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">27:</td>
			<td><input type="text" name="rp27" value="<?=$item['rp27']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">28:</td>
			<td><input type="text" name="rp28" value="<?=$item['rp28']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">29:</td>
			<td><input type="text" name="rp29" value="<?=$item['rp29']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">30:</td>
			<td><input type="text" name="rp30" value="<?=$item['rp30']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">31:</td>
			<td><input type="text" name="rp31" value="<?=$item['rp31']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">32:</td>
			<td><input type="text" name="rp32" value="<?=$item['rp32']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">33:</td>
			<td><input type="text" name="rp33" value="<?=$item['rp33']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">34:</td>
			<td><input type="text" name="rp34" value="<?=$item['rp34']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">35:</td>
			<td><input type="text" name="rp35" value="<?=$item['rp35']?>" size="3" maxlength="3"></td>
		</tr>
		<tr>
			<td width="22" align="right">36:</td>
			<td><input type="text" name="rp36" value="<?=$item['rp36']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">37:</td>
			<td><input type="text" name="rp37" value="<?=$item['rp37']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">38:</td>
			<td><input type="text" name="rp38" value="<?=$item['rp38']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">39:</td>
			<td><input type="text" name="rp39" value="<?=$item['rp39']?>" size="3" maxlength="3"></td>
			<td width="22" align="right">40:</td>
			<td><input type="text" name="rp40" value="<?=$item['rp40']?>" size="3" maxlength="3"></td>
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
