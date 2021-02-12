<?php

require '../../system/Autoloader.php';

Autoloader::register();

$route = new Route();

$route->root('index');
$route->get('about');
$route->get('home');

$route->run();
?>