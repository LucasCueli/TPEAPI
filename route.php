<?php 
    require_once ('config.php');
    require_once ('libs/router.php');
    require_once ('app/controllers/products.api.controller.php');

    $router = new Router();

    $router->addRoute('procesadores', 'GET' , 'ProductsApiController' , 'obtenerProcesadores');
    $router->addRoute('procesadores/:ID', 'GET' , 'ProductsApiController' , 'obtenerProcesador');
    $router->addRoute('procesadores/:ID', 'DELETE' , 'ProductsApiController' , 'borrarProcesador');
    $router->addRoute('procesadores', 'POST', 'ProductsApiController', 'agregarProcesador');
    $router->addRoute('procesadores/:ID', 'PUT', 'ProductsApiController', 'actualizarProcesador');

    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>