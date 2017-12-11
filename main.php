<?php if (!defined("CONFIG"))
    exit();

require_once("functions.php"); // import mysql function
$link = mysqlconnect(); // call mysql function to get the link to the database

$exe_blocks = mysqli_query($link,"SELECT `id`, `title`, `content_file`, `content_html`, `language`, `sort_order` FROM blocks WHERE `active` = 1 ORDER BY `sort_order` ASC");
if ($exe_blocks) {
	while (list($blockID, $blockTitle, $blockContentFile, $blockContentHtml, $blockSortOrder) = mysqli_fetch_array($exe_blocks)) {
		if (!$blockTitle)
			continue;

		if ($blockContentFile) {

			if (strpos($blockContentFile, '/') !== false)
				continue;

			if (file_exists('blocks/'.$blockContentFile.'.php')) {
				ob_start();
				include("blocks/$blockContentFile.php");
				$blockContent = ob_get_clean();
			} else {
				$blockContent = "<p align='center'>File <strong>$blockContentFile</strong> has not been found</p>";
			}

		} elseif ($blockContentHtml) {
			$blockContent = $blockContentHtml;
		} else
			$blockContent = "<p align='center'>Content has not been found</p>";

		$blocks[] = array(
			"id" => $blockID,
			"title" => $blockTitle,
			"content" => $blockContent
		);
	}
	mysqli_free_result($exe_blocks);
} else
	$blocks = array();

# News
$exe_news = mysqli_query($link,"SELECT `id`, `title`, `news`, `day` FROM main_news ORDER BY day DESC LIMIT 5");

?>


<!-- Main page content-->

<!--Side Bar-->
<div class="w3-row">
<?php
if ($blocks) {
	?>
<!--class l# sets the width of the page, see w3.css-->
	<div class="w3-col s12 l12 w3-gray w3-border w3-border-black w3-round-xlarge">
		<?php
		foreach($blocks as $blockTempID => $blockDetails) {
			?>
			<div>

				<div class="w3-center w3-black w3-text-white"><h2><?=$blockDetails['title'];?></h2></div>
				<div class="w3-responsive w3-padding-tiny">
					<?=$blockDetails['content'];?>
				</div>

			</div>
			<?php
		}
		?>
	</div>

	<?php
}
?>

<!--NEWS-->
<!--class l# sets the width of the page, see w3.css-->
<div class="w3-col s12 l12 w3-dark-gray w3-border w3-border-black w3-round-large w3-center">
<div class="w3-center w3-black w3-text-white"><h2>News</h2></div>

<?php
if ($exe_news) {
	?>

	<?php
	while (list($id, $title, $news, $day) = mysqli_fetch_array($exe_news)) {
		?>

			<div class="w3-center w3-black w3-text-white"><h3><?=$title;?>&nbsp;<?=$day;?></h3></div>

			<p><div class="w3-padding-large"><?=$news;?></div> </p>

		<?php
	}
	mysqli_free_result($exe_news);
}

?>
</div>
</div>
