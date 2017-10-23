<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = intval($_POST['id']);

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$sql_fileInfo = "SELECT `file` FROM uploads WHERE id='$id' LIMIT 1";
$exe_fileInfo = mysqli_query($link,$sql_fileInfo);
$fileInfo = mysqli_fetch_array($exe_fileInfo);
mysql_free_result($exe_fileInfo);

$result = mysqli_query($link,"DELETE FROM uploads WHERE id='$id' LIMIT 1");
unlink("uploads/".$fileInfo['file']);

if(!$result) error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=upload", "File succesfully removed\n");
?>
