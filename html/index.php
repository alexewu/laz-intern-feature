<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';
require_once 'feature/src/api/QrLoginApiController.php';
include 'include.html';

use objects\library\Router\Request;
use objects\library\Router\Router;
use feature\src\api\QrLoginApiController;

$request = new Request();
$router = new Router($request);


$router->get('/', function() {
    include 'index.html';
});

$router->get('/student', function() {
    include 'student.html';
});

$router->get('/teacher', function() {
    include 'teacher.html';
});

$router->post('/api/regenerate', function() {
    $qrController = new QrLoginApiController();
    return $qrController->regenerate();
});

$router->get('/api/studentPasscode', function() {
    $qrController = new QrLoginApiController();
    return $qrController->getQrCode();
});

$router->post('/api/Login', function() {
    $qrController = new QrLoginApiController();
    return $qrController->login();
});
