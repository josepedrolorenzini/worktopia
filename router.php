<?php

// bringing the links routes from different file or from router
$routes = require  basePath('routes.php');
// getting the current uri page path
$uri = $_SERVER['REQUEST_URI'];

//inspectAndDie($uri);
if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
    exit;
}else{
    http_response_code(404);
    require(basePath($routes['404']));
    exit;
}

