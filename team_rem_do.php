<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

mysqlconnect();

// Check if drivers are related to the team
$dquery = "SELECT d.name FROM team_driver td JOIN driver d ON (td.driver = d.id) WHERE team='$id'";
$dresult = mysql_query($dquery);
if(!$dresult) {
	error("MySQL error: " . mysql_error() . "\n");
}
if(mysql_num_rows($dresult) > 0) {
	$drivers = "";
	while($d = mysql_fetch_array($dresult)) {
		$drivers .= "&bull; " . $d['name'] . "\n";
	}
	error("Team cannot be deleted because it is related to the following driver(s):\n" . $drivers);
}

$query = "DELETE FROM team WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=teams", "Team succesfully deleted\n$msg");
?>
