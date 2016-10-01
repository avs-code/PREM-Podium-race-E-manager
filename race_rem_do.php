<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$season = addslashes($_POST['season']);

mysqlconnect();
$query = "DELETE FROM race WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

$query = "DELETE FROM race_driver WHERE race='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=races&season=$season", "Race succesfully deleted\n$msg");
?>
