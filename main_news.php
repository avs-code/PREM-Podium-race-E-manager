<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; } ?>

<!--ADD-->
<h1>Add news to show in main page</h1><br />
<p></p>
<a href=".?page=add_news">Add news</a>


<!--REMOVE-->

<?

$query = "SELECT id, title, day FROM main_news ORDER BY id DESC";
$result = mysql_query($query);

if(!$result) {
	show_error("MySQL error: " . mysql_error());
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
				<a href=".?page=main_news_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
			</td>
			<td><?=$item['day']?></td>
			<td><?=$item['title']?></td>	
		</tr>
		<?
	}
	?>
</table>