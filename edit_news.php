<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }

$id = intval($_GET['id']);
if (isset($_POST['news'])) {
    $news = mysql_real_escape_string($_POST['news']);
    $id = addslashes($_POST['id']);
    $title = addslashes($_POST['title']);
    mysql_query("UPDATE main_news SET `title` = '$title', `news` = '$news' WHERE id='$id'");
}
$exe_news = mysql_query("SELECT title, news FROM main_news WHERE id='$id' LIMIT 1");
list($title, $news) = mysql_fetch_array($exe_news);
mysql_free_result($exe_news);
$news = htmlspecialchars($news);
?>

<form method="post" action="index.php?page=edit_news">
    <table border="0">
	<td width="120">title:</td>
	<td><input type="text" name="title" maxlength="30" value="<?=$title;?>"></td>
</tr>
</table>
    <textarea id="tinyeditor" name="news" cols="50" rows="15"><?php echo $news; ?></textarea>
    <input type="hidden" name="id" value="<?=$id;?>">
    <input type="submit" value="Save" />
</form>