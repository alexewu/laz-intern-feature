<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';
require_once 'feature/src/api/QrLoginApiController.class.php';

use objects\library\Router\Request;
use objects\library\Router\Router;

$request = new Request();
$router = new Router($request);

$router->get('/', function() {
    include 'index.html';
});

$router->get('/test', );