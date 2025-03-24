<?php

require __DIR__ . '/../helpers.php'; // Include helper

//// creating the routers

/// all routes
//$routes = [
//    "/" => 'controllers/home.php',
//    '/listings' => "controllers/listings/index.php" ,
//    "/listings/create" => "controllers/listings/create.php" ,
//    "404" => "controllers/error/404.php"
//];


//// getting the current uri page path
$uri = $_SERVER['REQUEST_URI'];
//
//// inspectAndDie($uri);
//if (array_key_exists($uri, $routes)) {
//    require(basePath($routes[$uri]));
//    exit;
//}else{
//    require(basePath($routes['404']));
//    exit;
//}
//
require basePath('router.php');

//loadView("home")    ;
//die;




//var_dump(loadView('home')) ;
//require basePath('views\home.view.php') ;
//use function Worktopia\Helpers\basePath; // Correct import
//
//echo basePath('views\home.view.php');


?>
