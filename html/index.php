<?php
use objects\library\Router\Router;
use objects\library\Router\Request;
echo "requiring...";
echo "CRLF problem?";
require_once 'html/objects/library/Router/Request.class.php';
echo "helloooooooooooo?";
$request = new Request();
echo "hellooo";
//$router->get('/', function() {
//    //include 'html/index.html';
//    echo "hello world";
//});
//
//$router->get('/featureDescription', function() {
//    return "Qr Student Login :)";
//});
