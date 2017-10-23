<?
if(!defined("CONFIG")) exit();
if(!isset($login)) { show_error("You do not have administrator rights\n"); return; }
require_once("session_start.php");
require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database
?>
<!--Next events-->
<h1>Next events</h1>

<?
    $query_next_status = "SELECT active FROM blocks WHERE content_file='next_events'";
    $result_next_status = mysqli_query($link,$query_next_status);
    mysql_free_result($result_next_status);

$active_next = $_POST["active_next"];

    if (isset($_POST['active_next'])) {
        $query_next = "UPDATE blocks SET active='$active_next' WHERE content_file='next_events'";
        $result_next = mysqli_query($link,$query_next);
        if (!$result_next) error("MySQL Error: ".mysql_error($link)."\n");
        echo "<br /> <strong><h2>Next events succesfully modified</h2></strong>";
    }else{
?>



    <form action=".?page=blocks" method="post">
        Activate:
        <input type="radio" name="active_next" <?php if (isset($result_next_status) && $result_next_status=="1") echo "checked";?> value="1">Yes
        <input type="radio" name="active_next" <?php if (isset($result_next_status) && $result_next_status=="0") echo "checked";?> value="0">No
        &nbsp;
        </b> </b> <input type="submit" name="submit" value="Set">
        <br><br>
    </form>
<? } ?>




<!--Last race block-->
<h1>Last race</h1>

<?
    $query_last_status = "SELECT active FROM blocks WHERE content_file='last_race'";
    $result_last_status = mysqli_query($link,$query_last_status);
    mysql_free_result($result_last_status);

$active_last = $_POST["active_last"];

    if (isset($_POST['active_last'])) {
        $query_last = "UPDATE blocks SET active='$active_last' WHERE content_file='last_race'";
        $result_last = mysqli_query($link,$query_last);
        if (!$result_last) error("MySQL Error: ".mysql_error($link)."\n");
        echo "<br /> <strong><h2>Last_race succesfully modified</h2></strong>";
    }else{ ?>


    <form action=".?page=blocks" method="post">
        Activate:
        <input type="radio" name="active_last" <?php if (isset($result_last_status) && $result_last_status=="1") echo "checked";?> value="1">Yes
        <input type="radio" name="active_last" <?php if (isset($result_last_status) && $result_last_status=="0") echo "checked";?> value="0">No
        &nbsp;
        </b> </b> <input type="submit" name="submit" value="Set">
        <br><br>
    </form>
<? } ?>


<!--comms_viewer-->
<h1>Comms viewer</h1>

<?
    $query_comms_status = "SELECT active FROM blocks WHERE content_file='comms_viewer'";
    $result_comms_status = mysqli_query($link,$query_comms_status);
    mysql_free_result($result_comms_status);

$active_comms = $_POST["active_comms"];

    if (isset($_POST['active_comms'])) {
        $query_comms = "UPDATE blocks SET active='$active_comms' WHERE content_file='comms_viewer'";
        $result_comms = mysqli_query($link,$query_comms);
        if (!$result_comms) error("MySQL Error: ".mysql_error($link)."\n");
        echo "<br /> <strong><h2>Comms viewer succesfully modified</h2></strong>";
    }else{ ?>


    <form action=".?page=blocks" method="post">
        Activate:
        <input type="radio" name="active_comms" <?php if (isset($result_comms_status) && $result_comms_status=="1") echo "checked";?> value="1">Yes
        <input type="radio" name="active_comms" <?php if (isset($result_comms_status) && $result_comms_status=="0") echo "checked";?> value="0">No
        &nbsp;
        </b> </b> <input type="submit" name="submit" value="Set">
        <br><br>
    </form>
<? } ?>


<!--standings block-->
<h1>Standings block</h1>

<?
    $query_standings_status = "SELECT active FROM blocks WHERE content_file='standings'";
    $result_standings_status = mysqli_query($link,$query_standings_status);
    mysql_free_result($result_standings_status);

$active_standings = $_POST["active_standings"];

    if (isset($_POST['active_standings'])) {
        $query_standings = "UPDATE blocks SET active='$active_standings' WHERE content_file='standings'";
        $result_standings = mysqli_query($link,$query_standings);
        if (!$result_standings) error("MySQL Error: ".mysql_error($link)."\n");
        echo "<br /> <strong><h2>Standings succesfully modified</h2></strong>";
    }else{ ?>


    <form action=".?page=blocks" method="post">
        Activate:
        <input type="radio" name="active_standings" <?php if (isset($result_standings_status) && $result_standings_status=="1") echo "checked";?> value="1">Yes
        <input type="radio" name="active_standings" <?php if (isset($result_standings_status) && $result_standings_status=="0") echo "checked";?> value="0">No
        &nbsp;
        </b> </b> <input type="submit" name="submit" value="Set">
        <br><br>
    </form>
<? } ?>


<!--Standing_block_pages-->
<?
    $sql_sp_list = "SELECT sp.*, s.name FROM standing_pages sp JOIN season s ON (sp.season = s.id) ORDER BY sp.page ASC";
    $result_sp_list = mysqli_query($link,$sql_sp_list);
    if(!$result_sp_list) {
    	show_error("MySQL error: " . mysql_error($link));
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
