<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

if (isset($_POST['news'])) {
    $title = mysql_real_escape_string($_POST['title']);
    $news = mysql_real_escape_string($_POST['news']);
    $day = date('Y-m-d H:i:s');
    mysqli_query($link,"INSERT INTO main_news (title, news, day) VALUES ('$title', '$news', '$day')");
}

if (empty($title))
    $error .= "You must fill in a title\n";
$exe_news = mysqli_query($link,"SELECT news FROM main_news ORDER BY day DESC");
list($news) = mysql_fetch_array($exe_news);
mysql_free_result($exe_news);
$news = htmlspecialchars($news);
?>

<form method="post" action="index.php?page=add_news">
<table border="0">
<tr>
	<td width="120">title:</td>
	<td><input type="text" name="title" maxlength="30"></td>
</tr>
</table>
    <textarea id="tinyeditor" name="news" cols="50" rows="15"><?php echo $news; ?></textarea>
    <input type="submit" value="Save" />
</form>
