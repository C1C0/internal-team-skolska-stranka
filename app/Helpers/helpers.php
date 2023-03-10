<?php

if (!function_exists('dd')) {
  function dd($data)
  {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
  }
}

if (!function_exists('view')) {
  function view(string $view, array $data = [])
  {
    $view = str_replace('.', DS, $view);
    $view = str_replace('/', DS, $view);
    $file = APP_ROOT . DS . "views" . DS . $view . ".php";
    if (file_exists($file)) {
      extract($data);
      require $file;
    } else {
      abort(404, "View file $view not found");
    }
  }
}

if (!function_exists('abort')) {
  function abort(int $code, string $message = null)
  {
    http_response_code($code);
    $file = APP_ROOT . DS . "views" . DS . "errors" . DS . $code . ".php";
    if (file_exists($file)) {
      return view("errors.$code", compact('message'));
    }
    exit;
  }
}
