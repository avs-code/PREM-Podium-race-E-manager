<? if (!defined("CONFIG"))    exit();
$sql_drivers = "SELECT driver.id as driverID, driver.name as driverName, team.team as teamID FROM driver LEFT JOIN team_driver as team ON team.driver = driver.id ORDER BY driver.id LIMIT 0, 30";
$exe_drivers = mysql_query($sql_drivers);
if (!$exe_drivers) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
while ($drivers = mysql_fetch_array($exe_drivers)) {
	$driver[$drivers['teamID']][$drivers['driverID']] = $drivers['driverName'];
}
mysql_free_result($exe_drivers);
if (!isset($driver)) {
    show_error("Drivers has been not found.\n");
    return;
}
$teams = "SELECT `team`.`id`, `team`.`name` , `team`.`logo` FROM team ORDER BY `team`.`name` ASC LIMIT 0 , 30";
$result = mysql_query($teams);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Teams</h1>
<div class="w3-container">
<table class="w3-table-all">
	<tr class="w3-dark-grey">
		<td><h1><strong>Name</strong></h1></td>
		<td><h1><strong>Drivers</strong></h1></td>
		<td><h1><strong>Logo</strong></h1></td>
	</tr>
	<?php
	#$style = "odd";
	while ($sitem = mysql_fetch_array($result)) {
	 if ($sitem['logo'] == '') { $url = 'images/logo.png' ; } else { $url = $sitem['logo']; } 
	?>
	<tr class="w3-hover-green">
	<!--<tr class="<?= $style ?>">-->
	<td><?= $sitem['name'] ?></td><!--team name-->
	<td><!--driver name-->
		<?php
		if (is_array($driver[$sitem['id']])) {
			foreach ($driver[$sitem['id']] as $driverID => $driverName) {
				echo "<li>".$driverName."</li>";
			}
		}
		?>
	</td><!--driver name-->
	<td><a><img src="<?=$url;?>" width="150" height="150"/></a></td><!--url logo-->
	</tr>
	<?
	#$style = $style == "odd" ? "even" : "odd";
	}
	mysql_free_result($result);
	?>
</table>