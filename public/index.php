<?php
define("APP_ROOT", dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

// Autolaod class
spl_autoload_register(function ($class) {
  $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
  $file = APP_ROOT . DIRECTORY_SEPARATOR . $file;
  if (file_exists($file)) {
    require $file;
    return true;
  }
  return false;
});


use App\Functions\Router;
use App\Functions\Helpers;

Helpers::loadHelpers();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Router();

require APP_ROOT . DS . 'routes' . DS . 'routes.php';

$router->route($uri, $method);
