<?php

namespace App\Routes;

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
    call_user_func($this->function);
  }
}
