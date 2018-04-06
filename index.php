<?php

require_once 'autoload.php';

session_start();

$router = new Router;
$router->routerRequest();