<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<!--ADD-->
<h1>Add video to show in videos page</h1><br />
<p></p>Go to youtube video and click in share option, after go to insert option and copy video url with <strong>"embed"</strong> parameter.<br />
Example: https://www.youtube.com/<strong>embed</strong>/yAkJ97ago7g This is the url that you must paste in url link.<br /><p></p>

<form action="send_video_url_do.php" method="post">
<table border="0">
<tr>
	<td width="120">Video name:</td>
	<td><input type="text" name="video_name" maxlength="30"></td>
</tr>
<tr>
	<td>Video url:</td>
	<td><input type="url" name="video_url" maxlength="200"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
		<input type="submit" class="button submit" value="Add">
		<input type="button" class="button cancel" value="Cancel" onclick="history.go(-1);">
	</td>
</tr>
</table>
</form>

<!--REMOVE-->

<?
if(isset($_GET['filter'])) {
	$filter = mysql_real_escape_string($_GET['filter']);
	$query_where = "WHERE video_name LIKE '%$filter%'";
}
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
$query = "SELECT id, video_name, video_url FROM video $query_where ORDER BY id ASC";
$result = mysqli_query($link,$query);

if(!$result) {
	show_error("MySQL error: " . mysqli_error($link));
	return;
}

?>
<h1>Videos</h1>

<div align="right">
	<form action="." method="GET">
		<input type="hidden" name="page" value="send_video_url">
		<input type="text" class="search" name="filter" value="<?=$_GET['filter']?>">
	</form>
</div>

<?php
if(mysql_num_rows($result) == 0) {
	show_msg("No videos found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
	<tr class="w3-dark-grey">
		<td>&nbsp;</td>
		<td>Video name</td>
		<td align="center">Video url</td>
	</tr>

	<?
	while($item = mysqli_fetch_array($result)) {
		?>
		<tr class="w3-hover-green">
			<td>
				<a href=".?page=send_video_url_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
			</td>
			<td><?=$item['video_name']?></td>
			<td><?=$item['video_url']?></td>
		</tr>
		<?
	}
	?>
</table>
