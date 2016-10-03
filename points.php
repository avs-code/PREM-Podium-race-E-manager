<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE name LIKE '%$filter%'";
}
$query = "SELECT * FROM point_ruleset $query_where ORDER BY name ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}

?>
<h1>Points</h1>

<div align="right">
<form action="." method="GET">
<input type="hidden" name="page" value="points">
<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
</form>
</div>
<a href=".?page=point_add">Add ruleset</a>
<?
if(mysql_num_rows($result) == 0) {
	show_msg("No rulesets found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
	<td>&nbsp;</td>
	<td>Ruleset</td>
	<td width="22" align="center">1</td>
	<td width="22" align="center">2</td>
	<td width="22" align="center">3</td>
	<td width="22" align="center">4</td>
	<td width="22" align="center">5</td>
	<td width="22" align="center">6</td>
	<td width="22" align="center">7</td>
	<td width="22" align="center">8</td>
	<td width="22" align="center">9</td>
	<td width="22" align="center">10</td>
	<td width="22" align="center">11</td>
	<td width="22" align="center">12</td>
	<td width="22" align="center">13</td>
	<td width="22" align="center">14</td>
	<td width="22" align="center">15</td>
	<td width="22" align="center">q1</td>
	<td width="22" align="center">q2</td>
	<td width="22" align="center">q3</td>
	<td width="22" align="center">q4</td>
	<td width="22" align="center">q5</td>
	<td width="22" align="center">fl</td>
</tr>

<?
$style = "odd";
while($item = mysql_fetch_array($result)) {
?>
<tr class="w3-hover-green">
	<td>
		<a href=".?page=point_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
		<a href=".?page=point_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
	</td>
	<td><?=$item['name']?></td>
	<td width="22" align="center"><?=$item['rp1']?></td>
	<td width="22" align="center"><?=$item['rp2']?></td>
	<td width="22" align="center"><?=$item['rp3']?></td>
	<td width="22" align="center"><?=$item['rp4']?></td>
	<td width="22" align="center"><?=$item['rp5']?></td>
	<td width="22" align="center"><?=$item['rp6']?></td>
	<td width="22" align="center"><?=$item['rp7']?></td>
	<td width="22" align="center"><?=$item['rp8']?></td>
	<td width="22" align="center"><?=$item['rp9']?></td>
	<td width="22" align="center"><?=$item['rp10']?></td>
	<td width="22" align="center"><?=$item['rp11']?></td>
	<td width="22" align="center"><?=$item['rp12']?></td>
	<td width="22" align="center"><?=$item['rp13']?></td>
	<td width="22" align="center"><?=$item['rp14']?></td>
	<td width="22" align="center"><?=$item['rp15']?></td>
	<td width="22" align="center"><?=$item['qp1']?></td>
	<td width="22" align="center"><?=$item['qp2']?></td>
	<td width="22" align="center"><?=$item['qp3']?></td>
	<td width="22" align="center"><?=$item['qp4']?></td>
	<td width="22" align="center"><?=$item['qp5']?></td>
	<td width="22" align="center"><?=$item['fl']?></td>
</tr>
<?
#	$style = $style == "odd" ? "even" : "odd";
}
?>
</table>
