<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = intval($_POST['id']);

mysqlconnect();
$query = "DELETE FROM uploads WHERE id='$id' LIMIT 1";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=upload", "File succesfully removed\n");
?>