<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }

$id = addslashes($_GET['id']);
if (isset($_POST['news'])) {
    $news = mysql_real_escape_string($_POST['news']);
    $id = addslashes($_POST['id']);
    $query = "UPDATE driver SET name='$name', driver_photo='$photo' WHERE id='$id'";
    mysql_query("UPDATE main_news SET `title` = '$title', `news` = '$news' WHERE id='$id'");
}
$exe_news = mysql_query("SELECT news FROM main_news");
list($news) = mysql_fetch_array($exe_news);
mysql_free_result($exe_news);
$news = htmlspecialchars($news);
?>

<form method="post" action="index.php?page=edit_news">
    <textarea id="tinyeditor" name="news" cols="50" rows="15"><?php echo $news; ?></textarea>
    <input type="submit" value="Save" />
</form>