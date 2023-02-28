<?php

namespace App\Functions;

class Helpers
{
  public static function loadHelpers(): void
  {
    $helpers = scandir(APP_ROOT . DS . 'app' . DS . 'helpers');
    foreach ($helpers as $helper) {
      if ($helper !== '.' && $helper !== '..') {
        require APP_ROOT . DS . 'app' . DS . 'helpers' . DS . $helper;
      }
    }
  }
}
