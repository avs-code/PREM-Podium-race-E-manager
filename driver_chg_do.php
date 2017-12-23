<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = addslashes($_POST['id']);
$name = htmlspecialchars($_POST['name']);
$country = htmlspecialchars($_POST['country']);
$plate = htmlspecialchars($_POST['plate']);
$photo = htmlspecialchars($_POST['driver_photo']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "UPDATE driver SET name='$name', plate='$plate', country='$country', driver_photo='$photo' WHERE id='$id'";
$result = mysqli_query($link,$query);
if(!$result) error("MySQL Error: " . mysqli_error($link) . "\n");

return_do(".?page=drivers", "Driver succesfully modified\n$msg");
?>
