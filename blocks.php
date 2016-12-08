<? if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
require_once("session_start.php");
?>

<!--Next events block-->
<h1>Next events</h1>
<form action="blocks.php" method="post"> 
  Activate:
  <input type="radio" name="active_next" <?php if (isset($active_next) && $active_next=="1") echo "checked";?> value="1">Yes
  <input type="radio" name="active_next" <?php if (isset($active_next) && $active_next=="0") echo "checked";?> value="0">No
   &nbsp;
   </b> </b> <input type="submit" name="submit_next" value="Set">
  <br><br> 
</form>

<?PHP
mysqlconnect();

if (isset($_POST['submit_next'])){
$query_next = "UPDATE blocks SET active='$active_next' WHERE content_file='$next_events'";
$result_next = mysql_query($query_next);
if(!$result_next) error("MySQL Error: " . mysql_error() . "\n");

return_do(".?page=blocks", "activated succesfully modified\n$msg");}
mysql_free_result($result_next)

?>


<!--Last race block-->
<h1>Last race</h1>
<form action="blocks.php" method="post"> 
  Activate:
  <input type="radio" name="active_last" value="1">Yes
  <input type="radio" name="active_last" value="0">No
  &nbsp;</b> </b> <input type="submit" name="submit" value="Set">
  <br><br>
</form>

<!--standings block-->
<h1>Standings block</h1>
<form action="blocks.php" method="post"> 
  Activate:
  <input type="radio" name="active_standings" value="1">Yes
  <input type="radio" name="active_standings" value="0">No
  &nbsp;</b> </b> <input type="submit" name="submit" value="Set">
  <br><br>
  
</form>

<?
    $sql_sp_list = "SELECT sp.*, s.name FROM standing_pages sp JOIN season s ON (sp.season = s.id) ORDER BY sp.page ASC";
    $result_sp_list = mysql_query($sql_sp_list);
    if(!$result_sp_list) {
    	show_error("MySQL error: " . mysql_error());
    	return;
    }
    
?>

<br />
<br />
<a href=".?page=standings_add">Add Standing page</a>
<?
    if(mysql_num_rows($result_sp_list) == 0) {
    	show_msg("No standings pages found\n");
    	return;
    }
?>
    <div class="w3-container">
<table class="w3-table-all">
    <tr class="w3-dark-grey">
    	<td>&nbsp;</td>
        <td>Page</td>
    	<td>Season</td>
    </tr>

<?

    while($item = mysql_fetch_array($result_sp_list)) {
?>

    <tr class="w3-hover-green">
    	<td>
    		<a href=".?page=standings_chg&amp;id=<?=$item['id']?>"><img src="images/edit16.png" alt="chg"></a>
    		<a href=".?page=standings_rem&amp;id=<?=$item['id']?>"><img src="images/delete16.png" alt="rem"></a>
    	</td>
    	<td><?=$item['page']?></td>
    	<td><?=$item['name']?></td>
    </tr>
    <?
    }
    mysql_free_result($result_sp_list)
    ?>
</table>


