<?php

namespace App\Functions;

class Router
{
  protected $routes = [];

  public function route(string $uri, string $method)
  {
    foreach ($this->routes as $route) {
      if ($route['path'] === $uri && $route['method'] === $method) {
        $route['function']();
        return;
      }
    }
    abort(404);
  }

  protected function addRoute(string $path, string $method, $function): void
  {
    $this->routes[] = compact('path', 'method', 'function');
  }

  public function get(string $path, $function): void
  {
    $this->addRoute($path, 'GET', $function);
  }

  public function post(string $path, $function): void
  {
    $this->addRoute($path, 'POST', $function);
  }

  public function delete(string $path, $function): void
  {
    $this->addRoute($path, 'DELETE', $function);
  }

  public function put(string $path, $function): void
  {
    $this->addRoute($path, 'PUT', $function);
  }
}
