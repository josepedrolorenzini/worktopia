<?php

 class Router
 {
     protected  $routes = [];

     /**
      * Add a route
      * @param string $method
      * @param string $uri
      */

     public function registerRoute(string $method, string $uri, string $controller){
         $this->routes[] = [
             'method'      => $method,
             'uri'         => $uri,
             'controller'  => $controller
         ];
     }
     /**
      * Add a Get route
      * @param string $uri
      * @param string $controller
      * @return void
      */

     public function get(string $uri, string $controller)
     {
            $this->registerRoute("GET" , $uri , $controller);
     }

     /**
      * Add a POST route
      * @param string $uri
      * @param string $controller
      * @return void
      */

     public function post(string $uri, string $controller)
     {
         $this->registerRoute("POST" , $uri , $controller);
     }

     /**
      * Add a PUT route
      * @param string $uri
      * @param string $controller
      * @return void
      */

     public function put(string $uri, string $controller)
     {
         $this->registerRoute("PUT" , $uri , $controller);
     }

     /**
      * Add a DELETE route
      * @param string $uri
      * @param string $controller
      * @return void
      */

     public function delete(string $uri, string $controller)
     {
         $this->registerRoute("DELETE" , $uri , $controller);
     }

     /**
      * Load error page
      * @param int $httpCode
      * @return void
      */

     public function error(int $httpCode = 404){
         http_response_code($httpCode);
         loadView("error/$httpCode");
         exit;
     }


     /**
      * Add a PATCH route
      * @param string $uri
      * @param string $method
      * @return void
      */

     public function route(string $uri, string $method){
            foreach ($this->routes as $route){
                if($route['uri'] === $uri && $route['method'] === $method){
                    require basePath($route['controller']);
                    return;
                }
            }
            http_response_code(404) ;
            $this->error();
//            loadView('error/404');
//            exit;
     }
 }
