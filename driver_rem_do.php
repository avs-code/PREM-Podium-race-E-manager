<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

// Check if teams are related to the driver
$tquery = "SELECT t.name FROM team_driver td JOIN team t ON (td.team = t.id) WHERE driver='$id'";
$tresult = mysqli_query($link,$tquery);
if(!$tresult) {
	error("MySQL error: " . mysql_error($link) . "\n");
}
if(mysql_num_rows($tresult) > 0) {
	$teams = "";
	while($t = mysqli_fetch_array($tresult)) {
		$teams .= "&bull; " . $t['name'] . "\n";
	}
	error("Driver cannot be deleted because it is related to the following team(s):\n" . $teams);
}

$query = "DELETE FROM driver WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=drivers", "Driver succesfully deleted\n$msg");
?>
