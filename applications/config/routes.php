<?php

require('../../system/Routes.php');

$route = new Route();

$route->root('index');
$route->get('about');
$route->get('home');

$route->run();
?>