<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

// Check if drivers are related to the team
$dquery = "SELECT d.name FROM team_driver td JOIN driver d ON (td.driver = d.id) WHERE team='$id'";
$dresult = mysqli_query($link,$dquery);
if(!$dresult) {
	error("MySQL error: " . mysqli_error($link) . "\n");
}
if(mysql_num_rows($dresult) > 0) {
	$drivers = "";
	while($d = mysqli_fetch_array($dresult)) {
		$drivers .= "&bull; " . $d['name'] . "\n";
	}
	error("Team cannot be deleted because it is related to the following driver(s):\n" . $drivers);
}

$query = "DELETE FROM team WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=teams", "Team succesfully deleted\n$msg");
?>
