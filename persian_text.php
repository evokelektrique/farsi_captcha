<?php
require_once __DIR__ . "/text_decorator.php";

// Improved version of FarsiGD.php (Under development)
class PersianText  {

  use TextDecorator;

  public function __construct($text) {
    $length = $this->utf8_string_length($text);

    $array = preg_split('//u', $text, null, PREG_SPLIT_NO_EMPTY);
    $output = null;
    for ($i=0; $i < $length; $i++) {
      $output .= $array[$i];
    }

    return $output;
  }

  private function utf8_string_length($text) {
    return mb_strlen($text, "UTF-8");
  }
}
