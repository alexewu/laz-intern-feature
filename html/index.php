<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';
require_once 'feature/src/api/QrLoginApiController.php';

use objects\library\Router\Request;
use objects\library\Router\Router;
use feature\src\api\QrLoginApiController;

$request = new Request();
$router = new Router($request);
$qrController = new QrLoginApiController();

$router->get('/', function() {
    include 'index.html';
});

$router->post('/api/regenerate', function($request) {
    var_dump($request);
    return "dang dang dang";
});

$router->get('/api/studentPasscode', function($request) {
    var_dump($request);
    return "bang bang bang";
});