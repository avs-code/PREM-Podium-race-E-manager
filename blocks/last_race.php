<!--Last race block-->
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
    
$ditem = mysql_fetch_array($dresult);

mysql_free_result($result);
mysql_free_result($dresult);

?>
 
<div>
<table>
    <td><strong>Season:&nbsp;</strong>
    <tr></tr>    
    <td><?=$item['sname']?></td>
    <tr></tr>
	<td><strong>Track:&nbsp;</strong><?=$item['name']?></td>
    <tr></tr>
</table>
<table>
    <td><strong>Pos</strong></td><td><strong>Driver</strong></td><td><strong>Team</strong></td>
    <tr></tr>
    <td><?=$ditem['position']?></td>
    <td><?=$ditem['dname']?></td>
	<td><?=$ditem['tname']?></td>
</table>
</div>

<!--
<div>
<strong>Final example:</strong><br />
Show race.season<br />
Show race.name<br />
1º driver name - team<br />
2º driver name - team<br />
3º driver name - team<br />
fast lap time<br />
</div>-->