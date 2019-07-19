<?php
require_once 'objects/library/Router/Request.php';
require_once 'objects/library/Router/Router.php';

$request = new Request();
$router = new Router($request);

$router->get('/', function() {
    //include 'html/index.html';
    echo "hello world";
});

$router->get('/featureDescription', function() {
    return "Qr Student Login :)";
});
