<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

mysqlconnect();

// Check if division is related to any seasons
$squery = "SELECT s.name FROM division d JOIN season s ON (s.division = d.id) WHERE s.division='$id'";
$sresult = mysql_query($squery);
if(!$sresult) {
	error("MySQL error: " . mysql_error() . "\n");
}
if(mysql_num_rows($sresult) > 0) {
	$seasons = "";
	while($s = mysql_fetch_array($sresult)) {
		$seasons .= "&bull; " . $s['name'] . "\n";
	}
	error("Division cannot be deleted because it is related to the following season(s):\n" . $seasons);
}

$query = "DELETE FROM division WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=divisions", "Division succesfully deleted\n$msg");
?>
