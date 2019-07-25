<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';
require_once 'feature/src/api/QrLoginApiController.php';

use objects\library\Router\Request;
use objects\library\Router\Router;
use feature\src\api\QrLoginApiController;

$request = new Request();
$router = new Router($request);


$router->get('/', function() {
    include 'index.html';
});

$router->post('/api/regenerate', function($request) {
    $qrController = new QrLoginApiController();
    return $qrController->regenerate();
});

$router->get('/api/studentPasscode', function($request) {
    $qrController = new QrLoginApiController();
    return $qrController->getQrCode();
});