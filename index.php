<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/captcha.php";

$captcha = new FarsiCaptcha("Example Text");

// Display image
header('Content-type: image/png');
imagepng($captcha->image);
imagedestroy($captcha->image);
