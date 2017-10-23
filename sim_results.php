<? if (!defined("CONFIG"))
    exit();
if ($simresultID = intval($_GET['sres']))
	$sim_results = "SELECT simresults_url FROM sim_results WHERE `id` = '$simresultID' LIMIT 1";
else
	$sim_results = "SELECT `sim_results`.`id`, `sim_results`.`race_name` , `season`.`name` AS season_name, `sim_results`.`simresults_url` FROM sim_results LEFT JOIN season ON `sim_results`.`season` = `season`.`id` ORDER BY `season`.`name`, `sim_results`.`id` ASC LIMIT 0 , 30";
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$result = mysqli_query($link,$sim_results);
if (!$result) {
    show_error("MySQL Error: " . mysqli_error($link) . "\n");
    return;
}
?>
<h1>Simresults</h1>
<?php
if ($simresultID) {
	$sitem = mysqli_fetch_array($result);
	?>
	<h2><a href="?page=sim_results">&#8606; Go back</a></h2>
	<iframe src="<?=$sitem['simresults_url'];?>" width="100%" height="600px"></iframe>
	<?php
	return;
}
?>
<div class="w3-container">
	<table class="w3-table-all">
		<tr class="w3-dark-grey">
			<td><h1>Name</h1></td>
			<td><h1><strong>Season</strong></h1></td>
			<td><h1>Simresults_URL</h1></td>
		</tr>
		<?
		while ($sitem = mysqli_fetch_array($result)) {
			?>
			<tr class="w3-hover-green">
				<td><?= $sitem['race_name'] ?></td>
				<td><?= $sitem['season_name'] ?></td>
				<td><a href="?page=sim_results&sres=<?=$sitem['id'];?>">simresults</a></td>
			</tr>
			<?
		}
		?>
	</table>
</div>
