<?php


require_once 'Router.php';
require_once 'Controller.php';
require_once 'controllers/TestController.php';
// require_once 'controllers/TestController123.php';

$router = new Router();
$router->handleRequest();

