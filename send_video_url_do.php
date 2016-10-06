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

mysqlconnect();

$query = "INSERT INTO video (video_name, video_url) VALUES ('$video_name', '$video_url')";
$result = mysql_query($query);
if (!$result)
    error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=show_videos", "video_url succesfully added\n$msg");
?>