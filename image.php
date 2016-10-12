<?php
function createImg($text){
	$im = @imagecreatetruecolor(800, 600);
	if (!$im) {
		die('Не установлена библиотека GD2');
	}
$backgroundColor= imagecolorallocate($im, 0xBB, 0xCC, 0xAA);
$textColor= imagecolorallocate($im, 133, 14, 91);
$textColorBg= imagecolorallocate($im, 255, 255, 255);
$fontFile= realpath(__DIR__ . '/a_LCDNovaObl.ttf');


imagefill($im, 0, 0, $backgroundColor);

imagettftext($im, 30, 0, 52, 252, $textColor, $fontFile, $text);
imagettftext($im, 30, 0, 50, 250, $textColorBg, $fontFile, $text);


$boxPath= realpath(__DIR__ . '/smile1.png');
$box= imagecreatefrompng($boxPath);

imagecopy($im, $box, 250, 256, 0, 0, 256, 214);

imagepng($im);

}
header('Content-Type: image/png');
 $text = 'Вы ответили на все вопросы!';
createImg($text);
?>