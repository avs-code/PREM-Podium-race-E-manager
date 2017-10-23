<?
require_once ("session_start.php");
if (!isset($login))
    error("You do not have administrator rights\n");

$video_name = htmlspecialchars($_POST['video_name']);
$video_url = htmlspecialchars($_POST['video_url']);

$error = "";

if (empty($video_name))
    $error .= "You must fill in a video_name\n";
if (empty($video_url))
    $error .= "You must fill in a video_url\n";

if (!empty($error))
    error($error);

$msg = "";

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "INSERT INTO video (video_name, video_url) VALUES ('$video_name', '$video_url')";
$result = mysqli_query($link,$query);
if (!$result)
    error("MySQL Error: " . mysql_error($link) . "\n");

return_do(".?page=show_videos", "video_url succesfully added\n$msg");
?>
