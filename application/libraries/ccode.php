<?php

class ccode{
  public function encode($text){
    $text = preg_replace('/\[f-(.*?)\]/i', '<img data-asset-id="$1" />', $text);
    return $text;
  }

}