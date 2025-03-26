<?php

// bringing the links routes from different file or from router
$routes = require  basePath('routes.php');
// getting the current uri page path
$uri = $_SERVER['REQUEST_URI'];

//inspectAndDie($uri);
$method = $_SERVER['REQUEST_METHOD'] ; // inspect($method);
// checking if uri exist in routers array
if (array_key_exists($uri, $routes)) {

    require(basePath($routes[$uri]));
    exit;

}else{

    // add  the respond code 404 when page doesnt exist
    http_response_code(404);
    require(basePath($routes['404']));
    exit;

}

