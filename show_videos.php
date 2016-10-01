<? if (!defined("CONFIG"))
    exit(); ?>
<?
$video = "SELECT `video`.`video_name` FROM video ORDER BY `video`.`id` DESC LIMIT 0 , 30";
$result = mysql_query($video);
if (!$result) {
    show_error("MySQL Error: " . mysql_error() . "\n");
    return;
}
?>
<?
while ($sitem = mysql_fetch_array($result)) { ?>
<?php
$url = 'video_url';
?>

<iframe id="ytplayer" type="text/html" width="420" height="345"
    src="<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>;
    
