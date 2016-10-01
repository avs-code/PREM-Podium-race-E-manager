<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$type = htmlspecialchars($_POST['type']);

mysqlconnect();
$query = "UPDATE division SET type='$type' WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=divisions", "Division succesfully modified\n$msg");
?>
