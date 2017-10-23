<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "DELETE FROM user WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=users", "User succesfully removed\n");
?>
