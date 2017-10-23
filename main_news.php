<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<!--ADD-->
<h1>Add news to show in main page</h1>
<a href=".?page=add_news"><input type="button" value="Add news"/></a>


<!--REMOVE-->

<?
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$query = "SELECT id, title, day FROM main_news ORDER BY id DESC";
$result = mysqli_query($link,$query);

if(!$result) {
	show_error("MySQL error: " . mysql_error($link));
	return;
}

?>
<h1>News</h1>


<?php
if(mysql_num_rows($result) == 0) {
	show_msg("No news found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
	<tr class="w3-dark-grey">
		<td>&nbsp;</td>
		<td>Day</td>
		<td align="center">Title</td>
	</tr>

	<?
	while($item = mysql_fetch_array($result)) {
		?>
		<tr class="w3-hover-green">
			<td>
				<a href=".?page=remove_news&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
                <a href=".?page=edit_news&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
			</td>
			<td><?=$item['day']?></td>
			<td><?=$item['title']?></td>
		</tr>
		<?
	}
	?>
</table>
