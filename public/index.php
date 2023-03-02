<?php
define("APP_ROOT", dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

require APP_ROOT . DS . 'vendor' . DS . 'autoload.php';

use App\Functions\Router;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router = new Router();

require APP_ROOT . DS . 'routes' . DS . 'routes.php';

$router->route($uri, $method);
