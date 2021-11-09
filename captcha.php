<?php
require_once __DIR__ . "/FarsiGD.php";

class FarsiCaptcha {

   public $image;
   public $text;

   public function __construct($text) {
      $this->draw_background();
      $this->draw_text($text);
      return $this->image;
   }

   private function draw_background() {
      $this->image = imagecreatetruecolor(200, 50);
      imageantialias($this->image, true);
      $colors = [];
      $red    = rand(125, 175);
      $green  = rand(125, 175);
      $blue   = rand(125, 175);

      for($i = 0; $i < 5; $i++) {
        $colors[] = imagecolorallocate($this->image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
      }

      imagefill($this->image, 0, 0, $colors[0]);

      for($i = 0; $i < 10; $i++) {
        imagesetthickness($this->image, rand(2, 10));
        $rect_color = $colors[rand(1, 4)];
        imagerectangle($this->image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
      }
   }

   private function draw_text(string $text) {
      $black = imagecolorallocate($this->image, 0, 0, 0);
      $white = imagecolorallocate($this->image, 255, 255, 255);
      $textcolors = [$black, $white];
      $font = __DIR__ . "/fonts/Vazir-Medium-FD.ttf";
      imagettftext($this->image, 20, rand(-15, 15), 15, rand(20, 40), $textcolors[rand(0, 1)], $font, $text);
   }
}
