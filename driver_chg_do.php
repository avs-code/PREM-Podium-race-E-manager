<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$name = htmlspecialchars($_POST['name']);
$photo = htmlspecialchars($_POST['driver_photo']);

mysqlconnect();
$query = "UPDATE driver SET name='$name', driver_photo='$photo' WHERE id='$id'";
$result = mysql_query($query);
if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=drivers", "Driver succesfully modified\n$msg");
?>
