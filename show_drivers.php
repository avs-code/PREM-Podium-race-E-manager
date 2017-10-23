<? if (!defined("CONFIG"))
    exit();

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$sql_positions = "SELECT `team_driver`, `position` FROM race_driver WHERE `position` <= 3";
$exe_positions = mysqli_query($link,$sql_positions);
while ($positions = mysqli_fetch_array($exe_positions)) {
	$position[$positions['team_driver']][$positions['position']]++;
}
mysql_free_result($exe_positions);

$sql_drivers = "SELECT `driver`.`id`, `driver`.`name`, `driver`.`driver_photo`, `team_driver`.`id` as teamDriverID FROM driver LEFT JOIN team_driver ON driver.id = team_driver.driver ORDER BY `driver`.`name` ASC";
$exe_drivers = mysqli_query($link,$sql_drivers);
if (!$exe_drivers) {
    show_error("MySQL Error: " . mysqli_error($link) . "\n");
    return;
}

?>
<h1>Drivers</h1>
<div class="w3-container">
<div class="w3-responsive">
<table class="w3-table-all">
<tr class="w3-dark-grey">
<td><h1><strong>Name</strong></h1></td>
<td></td>
<td><h1><strong>Podiums</strong></td>
<td></td>
<td><h1><strong>Photo</strong></h1></td>
<tr class="w3-dark-grey">
<td></td>
<td><h1>1st<img src="images/cup1st.png" alt="" width="100" height="100" /></h1></td>
<td><h1>2nd<img src="images/cup2nd.png" alt="" width="100" height="100" /></h1></td>
<td><h1>3rd<img src="images/cup3rd.png" alt="" width="100" height="100" /></h1></td>
<td></td>
</tr>
</tr>
<?

while ($sitem = mysqli_fetch_array($exe_drivers)) {
	if ($sitem['driver_photo'] == '') { $url = 'images/helmet.png' ; } else { $url = $sitem['driver_photo']; }
	$first_position = intval($position[$sitem['teamDriverID']][1]);
	$second_position = intval($position[$sitem['teamDriverID']][2]);
	$third_position = intval($position[$sitem['teamDriverID']][3]);
	?>
	<tr class="w3-hover-green">
	<td><?= $sitem['name'] ?></td>
	<td><?= $first_position ?></td>
	<td><?= $second_position ?></td>
	<td><?= $third_position ?></td>
	<td><a><img src="<?=$url;?>" width="150" height="150"/></a></td>
	</tr>
	<?

}
mysql_free_result($exe_drivers);
?>
</table>
</div>
</div>
