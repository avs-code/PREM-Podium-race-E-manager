<? if (!defined("CONFIG"))
    exit();

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$sql_drivers = "SELECT name, driver_photo,
    SUM(position_1_count) AS pos_1,
    SUM(position_2_count) AS pos_2,
    SUM(position_3_count) AS pos_3
FROM team_driver, team_driver_top3, driver
WHERE (team_driver.id = team_driver_top3.team_driver AND team_driver.driver = driver.id)
GROUP BY driver
ORDER BY driver.name;";
$exe_drivers = mysqli_query($link,$sql_drivers);
if (!$exe_drivers) {
    show_error("MySQL Error: " . mysqli_error($link) . "\n");
    return;
}
?>
<h1>Drivers by name</h1>
<div class="w3-container">
<div class="w3-responsive">
<table class="w3-table-all">
<tr class="w3-dark-grey">
<td><h1><strong><button class="w3-button w3-text-green w3-dark-grey w3-border w3-border-red w3-round-large">Name - <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></button></strong></td>
<td></td>
<td><h1><strong><javascript:void(0)" class="tablink" title="Sort by driver podiums"><a href="?page=show_drivers" target="_self"><button class="w3-btn w3-dark-gray w3-border w3-border-red w3-round-large w3-hover-red">Podiums - <i class="fa fa-sort-numeric-desc" aria-hidden="true"></i></button></a></strong></h1></td>
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
	?>
	<tr class="w3-hover-green">
	<td><?= $sitem['name'] ?></td>
	<td><?= $sitem['pos_1'] ?></td>
	<td><?= $sitem['pos_2'] ?></td>
	<td><?= $sitem['pos_3'] ?></td>
	<td><a><img src="<?=$url;?>" width="150" height="150"/></a></td>
	</tr>
	<?
}
mysqli_free_result($exe_drivers);
?>
</table>
</div>
</div>
