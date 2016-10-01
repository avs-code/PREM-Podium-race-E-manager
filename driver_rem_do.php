<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

mysqlconnect();

// Check if teams are related to the driver
$tquery = "SELECT t.name FROM team_driver td JOIN team t ON (td.team = t.id) WHERE driver='$id'";
$tresult = mysql_query($tquery);
if(!$tresult) {
	error("MySQL error: " . mysql_error() . "\n");
}
if(mysql_num_rows($tresult) > 0) {
	$teams = "";
	while($t = mysql_fetch_array($tresult)) {
		$teams .= "&bull; " . $t['name'] . "\n";
	}
	error("Driver cannot be deleted because it is related to the following team(s):\n" . $teams);
}

$query = "DELETE FROM driver WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=drivers", "Driver succesfully deleted\n$msg");
?>
