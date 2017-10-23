<!--Last race block-->
<div>

<?php
require_once("results_functions.php");
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

    $query = "SELECT r.*, s.name sname, d.name dname FROM race_driver rd, race r LEFT JOIN season s ON (s.id = r.season) JOIN division d ON (d.id = r.division) WHERE ((r.id =rd.race) AND (r.progress = 2) AND (rd.status =0)) ORDER BY r.date DESC, rd.position ASC LIMIT 1";
    $result = mysqli_query($link,$query);
    if(!$result) {
    	show_error("MySQL Error: " . mysqli_error($link) . "\n");
    	return;
    }
    if(mysql_num_rows($result) == 0) {
    	show_error("Race does not exist\n");
    	return;
    }

$item = mysqli_fetch_array($result);
$last = ($item['id']);

    $dquery = "SELECT rd.*, d.name dname, t.name tname FROM race_driver rd JOIN team_driver td ON (td.id = rd.team_driver) JOIN team t ON (t.id = td.team) JOIN driver d ON (d.id = td.driver) JOIN race r ON (rd.race = r.id) WHERE rd.race='$last' AND (rd.status = 0) ORDER BY rd.position ASC LIMIT 3";
    $dresult = mysqli_query($link,$dquery);
    if(!$dresult) {
    	show_error("MySQL Error: " . mysqli_error($link) . "\n");
    	return;
    }



mysqli_free_result($result);


?>

<div class="w3-responsive">
<table class="w3-table-all">
    <td class="w3-dark-grey"><strong>Division:&nbsp;</strong>
    <tr></tr>
    <td><?=$item['dname']?></td>
    <tr></tr>
	<td class="w3-dark-grey"><strong>Track:&nbsp;</strong></td>
    <tr></tr>
    <td><?=$item['track']?></td>
    <tr></tr>
</table>
    <tr></tr>
<table class="w3-table-all">
    <td class="w3-dark-grey"><strong>Pos</strong></td><td class="w3-dark-grey"><strong>Driver</strong></td><td class="w3-dark-grey"><strong>Team</strong></td>
    <? while($ditem = mysqli_fetch_array($dresult)) {    ?>
    <tr class="w3-hover-blue">
    <td class="w3-dark-grey"><?=$ditem['position']?></td>
    <td><?=$ditem['dname']?></td>
	<td><?=$ditem['tname']?></td>
    </tr>
    <?     } mysqli_free_result($dresult);    ?>
</table>
</div>
</div>
