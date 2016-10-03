<? if (!defined("CONFIG"))
    exit(); ?>
<?

$drivers = "SELECT `driver`.`name` , `driver`.`1st` , `driver`.`2nd` , `driver`.`3rd` , `driver`.`driver_photo` FROM driver ORDER BY `driver`.`name` ASC LIMIT 0 , 30";
$result = mysql_query($drivers);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<h1>Drivers</h1>
<h2>Drivers</h2>
<div class="w3-container">
<table class="w3-table-all">
<tr class="w3-dark-grey">
<td><h1>Name</h1></td>
<td><h1><strong>1st</strong> <img src="images/cup1st.png" alt="" width="150" height="150" /></h1></td>
<td><h1>2nd <img src="images/cup2nd.png" alt="" width="150" height="150" /></h1></td>
<td><h1><strong>3rd</strong> <img src="images/cup3rd.png" alt="" width="150" height="150" /></h1></td>
<td><h1><strong>Photo</strong></h1></td>
</tr>
<?
#$style = "odd";
while ($sitem = mysql_fetch_array($result)) {
 if ($sitem['driver_photo'] == '') { $url = 'images/helmet.png' ; } else { $url = $sitem['driver_photo']; } 
?>
<tr class="w3-hover-green">
<!--<tr class="<?= $style ?>">-->
<td><?= $sitem['name'] ?></td>
<td><?= $sitem['1st'] ?></td>
<td><?= $sitem['2nd'] ?></td>
<td><?= $sitem['3rd'] ?></td>
<td><a><img src="<?=$url;?>" width="150" height="150"/></a></td>
</tr>
<?
#$style = $style == "odd" ? "even" : "odd";
}
?>
</table>