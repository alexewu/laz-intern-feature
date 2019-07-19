<?php
use objects\library\Router\Router;
use objects\library\Router\Request;
echo "helloooooooooooo?";
$router = new Router(new Request());
echo "hellooo";
$router->get('/', function() {
    //include 'html/index.html';
    echo "hello world";
});

$router->get('/featureDescription', function() {
    return "Qr Student Login :)";
});
