<?php

namespace App\Classes;

use App\Enums\Method;

class Route
{
  public string $path;
  public Method $method;
  private $function;


  public function __construct(string $path, Method $method, $function)
  {
    $this->path = $path;
    $this->method = $method;

    $this->function = $function;
  }

  public function execute()
  {
    if (is_callable($this->function)) {
      return call_user_func($this->function);
    }
    if (is_string($this->function)) {
      $function = explode('@', $this->function);
      $controller = "App\\Controllers\\" . $function[0];
      $method = $function[1];
      return (new $controller)->$method();
    }
    if (is_array($this->function)) {
      $controller = $this->function[0];
      $method = $this->function[1];
      return (new $controller)->$method();
    }
  }
}
