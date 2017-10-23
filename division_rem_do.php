<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

// Check if division is related to any seasons
$squery = "SELECT s.name FROM division d JOIN season s ON (s.division = d.id) WHERE s.division='$id'";
$sresult = mysqli_query($link,$squery);
if(!$sresult) {
	error("MySQL error: " . mysqli_error($link) . "\n");
}
if(mysql_num_rows($sresult) > 0) {
	$seasons = "";
	while($s = mysqli_fetch_array($sresult)) {
		$seasons .= "&bull; " . $s['name'] . "\n";
	}
	error("Division cannot be deleted because it is related to the following season(s):\n" . $seasons);
}

$query = "DELETE FROM division WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=divisions", "Division succesfully deleted\n$msg");
?>
