<?php

session_start();

require '../vendor/autoload.php';

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('insert_comment', ['controller' => 'Comments', 'action' => 'insert']);
$router->add('login', ['controller' => 'Users', 'action' => 'login']);
$router->add('logout', ['controller' => 'Users', 'action' => 'logout']);
$router->add('admin', ['controller' => 'Comments', 'action' => 'admin']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
