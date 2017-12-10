<? if(!defined("CONFIG")) exit(); ?>
<? if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
?>

<a href=".?page=add_rules"><input type="button" value="Add rules"/></a>

<?
$query = "$link,SELECT id, name, rules FROM rules_table ORDER BY id ASC";
$result = mysql_query($query);
if(!$result) {
	show_error("MySQL error: " . mysql_error());
	return;
}
?>
<h1>Regulations</h1>
<?php
$name = $_POST["name"];
if(mysql_num_rows($result) == 0) {
	show_msg("No Regulations found\n");
	return;
}
?>
<div class="w3-container">
<table class="w3-table-all">
	<tr class="w3-dark-grey">
		<td>&nbsp;</td>
		<td align="center">Id</td>
		<td align="center">Name</td>
	</tr>
	<?
	while($item = mysql_fetch_array($result)) {
		?>
		<tr class="w3-hover-green">
			<td>
			   <a href=".?page=edit_rules_mods&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
         <a href=".?page=remove_rules&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
			</td>
			<td><?=$item['id']?></td>
			<td><?=$item['name']?></td>
		</tr>
		<?
	}
	?>
</table>
