<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>
<?
if(isset($_GET['filter'])) {
	$filter = $_GET['filter'];
	$query_where = "WHERE name LIKE '%$filter%'";
}
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT * FROM point_ruleset $query_where ORDER BY name ASC";
$result = mysqli_query($link,$query);
if(!$result) {
	show_error("MySQL error: " . mysql_error($link));
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
	<td width="22" align="center">16</td>
	<td width="22" align="center">17</td>
	<td width="22" align="center">18</td>
	<td width="22" align="center">19</td>
	<td width="22" align="center">20</td>
	<td width="22" align="center">21</td>
	<td width="22" align="center">22</td>
	<td width="22" align="center">23</td>
	<td width="22" align="center">24</td>
	<td width="22" align="center">25</td>
	<td width="22" align="center">26</td>
	<td width="22" align="center">27</td>
	<td width="22" align="center">28</td>
	<td width="22" align="center">29</td>
	<td width="22" align="center">30</td>
	<td width="22" align="center">31</td>
	<td width="22" align="center">32</td>
	<td width="22" align="center">33</td>
	<td width="22" align="center">34</td>
	<td width="22" align="center">35</td>
	<td width="22" align="center">36</td>
	<td width="22" align="center">37</td>
	<td width="22" align="center">38</td>
	<td width="22" align="center">39</td>
	<td width="22" align="center">40</td>
	<td width="22" align="center">q1</td>
	<td width="22" align="center">q2</td>
	<td width="22" align="center">q3</td>
	<td width="22" align="center">q4</td>
	<td width="22" align="center">q5</td>
	<td width="22" align="center">fl</td>
</tr>

<?
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
	<td width="22" align="center"><?=$item['rp16']?></td>
	<td width="22" align="center"><?=$item['rp17']?></td>
	<td width="22" align="center"><?=$item['rp18']?></td>
	<td width="22" align="center"><?=$item['rp19']?></td>
	<td width="22" align="center"><?=$item['rp20']?></td>
	<td width="22" align="center"><?=$item['rp21']?></td>
	<td width="22" align="center"><?=$item['rp22']?></td>
	<td width="22" align="center"><?=$item['rp23']?></td>
	<td width="22" align="center"><?=$item['rp24']?></td>
	<td width="22" align="center"><?=$item['rp25']?></td>
	<td width="22" align="center"><?=$item['rp26']?></td>
	<td width="22" align="center"><?=$item['rp27']?></td>
	<td width="22" align="center"><?=$item['rp28']?></td>
	<td width="22" align="center"><?=$item['rp29']?></td>
	<td width="22" align="center"><?=$item['rp30']?></td>
	<td width="22" align="center"><?=$item['rp31']?></td>
	<td width="22" align="center"><?=$item['rp32']?></td>
	<td width="22" align="center"><?=$item['rp33']?></td>
	<td width="22" align="center"><?=$item['rp34']?></td>
	<td width="22" align="center"><?=$item['rp35']?></td>
	<td width="22" align="center"><?=$item['rp36']?></td>
	<td width="22" align="center"><?=$item['rp37']?></td>
	<td width="22" align="center"><?=$item['rp38']?></td>
	<td width="22" align="center"><?=$item['rp39']?></td>
	<td width="22" align="center"><?=$item['rp40']?></td>
	<td width="22" align="center"><?=$item['qp1']?></td>
	<td width="22" align="center"><?=$item['qp2']?></td>
	<td width="22" align="center"><?=$item['qp3']?></td>
	<td width="22" align="center"><?=$item['qp4']?></td>
	<td width="22" align="center"><?=$item['qp5']?></td>
	<td width="22" align="center"><?=$item['fl']?></td>
</tr>
<?
}
?>
</table>
