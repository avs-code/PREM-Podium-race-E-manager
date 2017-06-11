<?
$text = $_GET['text'];
$text2 = $_GET['text2'];

$i = imagecreatetruecolor(25, 180);

$white = imagecolorallocate($i, 255, 255, 255);
$back = imagecolorallocate($i, 0x88, 0x88, 0x88);

imagefill($i, 0, 0, $back);

imagestringup($i, 2, 1, 178, $text, $white);
imagestringup($i, 2, 12, 178, $text2, $white);

header("Content-Type: image/jpeg");
imagejpeg($i, null, 100);
?>
