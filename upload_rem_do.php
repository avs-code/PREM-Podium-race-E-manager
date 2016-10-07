<?
require_once("session_start.php");
if(!isset($login)) error("You do not have administrator rights\n");

$id = intval($_POST['id']);

mysqlconnect();
$sql_fileInfo = "SELECT `file` FROM uploads WHERE id='$id' LIMIT 1";
$exe_fileInfo = mysql_query($sql_fileInfo);
$fileInfo = mysql_fetch_array($exe_fileInfo);
mysql_free_result($exe_fileInfo);

$result = mysql_query("DELETE FROM uploads WHERE id='$id' LIMIT 1");
unlink("uploads/".$fileInfo['file']);

if(!$result) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=upload", "File succesfully removed\n");
?>
