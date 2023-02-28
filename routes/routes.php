<?php

$router->get('/', function () {
  return view('index');
});

$router->get('/test', function () {
  return view('test');
});

$router->get('/blog', function () {
  return view('blog.index');
});
$router->post('/blog', function () {
  dd($_POST);
});
