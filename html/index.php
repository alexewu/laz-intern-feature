<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';

use objects\library\Router\Request;
use objects\library\Router\Router;

$request = new Request();
$router = new Router($request);

var_dump($request);

$router->get('/', function() {
    include 'index.html';
});

$router->get('/featureDescription', function() {
    return "Qr Student Login :)";
});