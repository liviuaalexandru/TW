<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/map.php';
require_once __DIR__ . '/functions.php';
$route      = explode( '@', router( request()->uri() ) );
$controller = $route[0];
$action     = $route[1];
// Start session

session_start();
//session()->remove('game');
//session()->remove('auth');
 //(new PagesController())->index();
(new $controller())->{$action}();
