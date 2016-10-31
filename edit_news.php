<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
if (isset($_POST['news'])) {
    $news = mysql_real_escape_string($_POST['news']);
    mysql_query("UPDATE main_news SET `news` = '$news' WHERE ´id´ =1 LIMIT 1");
}
$exe_news = mysql_query("SELECT news FROM main_news LIMIT 1 ORDER BY id DESC");
list($news) = mysql_fetch_array($exe_news);
mysql_free_result($exe_news);
$news = htmlspecialchars($news);
?>

<form method="post" action="index.php?page=edit_news">
    <textarea id="tinyeditor" name="news" cols="50" rows="15"><?php echo $news; ?></textarea>
    <input type="submit" value="Save" />
</form>