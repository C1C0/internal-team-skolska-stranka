<?php

namespace App\Functions;

use App\Enums\Method;
use App\Routes\Route;

class Router
{
  protected $routes = [];

  public function route(string $uri, string $method)
  {
    foreach ($this->routes as $route) {
      if ($route->path === $uri && $route->method === Method::tryFrom($method)) {
        $route->execute();
        return;
      }
    }
    abort(404);
  }

  protected function addRoute(string $path, Method $method, $function): void
  {
    $this->routes[] = new Route($path, $method, $function);
  }

  public function get(string $path, $function): void
  {
    $this->addRoute($path, Method::GET, $function);
  }

  public function post(string $path, $function): void
  {
    $this->addRoute($path, Method::POST, $function);
  }

  public function delete(string $path, $function): void
  {
    $this->addRoute($path, Method::DELETE, $function);
  }

  public function put(string $path, $function): void
  {
    $this->addRoute($path, Method::PUT, $function);
  }
}
