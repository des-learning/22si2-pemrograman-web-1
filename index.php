<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
case '/':
  require 'root_controller.php';
  break;
case '/hello':
  require 'hello_controller.php';
  break;
default:
  require '404.php';
}
