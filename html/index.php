<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';

use objects\library\Router\Request;
use objects\library\Router\Router;

$request = new Request();
echo "jfkasd";
$router = new Router($request);
var_dump($router);


$router->get('/', function() {
    //include 'html/index.html';
    echo "hello world";
});

$router->get('/featureDescription', function() {
    return "Qr Student Login :)";
});