<?php
error_reporting(0); // FarsiGD.php has a lot of problems, It needs a re work.

require_once __DIR__ . "/FarsiGD.php";         // UTF-8 Farsi encoder
// require_once __DIR__ . "/persian_text.php"; // Imporved version of FarsiGD.php
require_once __DIR__ . "/captcha.php";         // Captcha core class

// Initialize text
$text = "این یک تست میباشد";

// Encode text
$farsi_gd = new FarsiGD();
$text = $farsi_gd->persianText($text, "fa", "normal");

// Create Image
$captcha = new FarsiCaptcha($text);

// Display image
header('Content-type: image/png');
imagepng($captcha->image);
imagedestroy($captcha->image);
