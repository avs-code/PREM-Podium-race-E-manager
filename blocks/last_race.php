<!--Last race block-->
<div>

<?php
require_once("results_functions.php");


    $query = "SELECT r.*, s.name sname, d.name dname FROM race_driver rd, race r LEFT JOIN season s ON (s.id = r.season) JOIN division d ON (d.id = r.division) WHERE ((r.id =rd.race) AND (r.progress = 2) AND (rd.status =0)) ORDER BY r.date DESC, rd.position ASC LIMIT 1";
    $result = mysql_query($query);
    if(!$result) {
    	show_error("MySQL Error: " . mysql_error() . "\n");
    	return;
    }
    if(mysql_num_rows($result) == 0) {
    	show_error("Race does not exist\n");
    	return;
    }

$item = mysql_fetch_array($result);
$last = ($item['id']);

    $dquery = "SELECT rd.*, d.name dname, t.name tname FROM race_driver rd JOIN team_driver td ON (td.id = rd.team_driver) JOIN team t ON (t.id = td.team) JOIN driver d ON (d.id = td.driver) JOIN race r ON (rd.race = r.id) WHERE rd.race='$last' AND (rd.status = 0) ORDER BY rd.position ASC LIMIT 3";
    $dresult = mysql_query($dquery);
    if(!$dresult) {
    	show_error("MySQL Error: " . mysql_error() . "\n");
    	return;
    }



mysql_free_result($result);


?>
 
	
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
    <? while($ditem = mysql_fetch_array($dresult)) {    ?>
    <tr class="w3-hover-blue">
    <td class="w3-dark-grey"><?=$ditem['position']?></td>
    <td><?=$ditem['dname']?></td>
	<td><?=$ditem['tname']?></td>
    </tr>
    <?     } mysql_free_result($dresult);    ?>
</table>
</div>