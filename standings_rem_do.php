<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

mysqlconnect();
$query = "DELETE FROM standing_pages WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=blocks", "Standing page succesfully deleted\n$msg");
mysql_free_result($result)
?>
