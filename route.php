<?php 
    require_once ('config.php');
    require_once ('libs/router.php');
    require_once ('app/controllers/products.api.controller.php');

    $router = new Router();

    //routes para procesadores

    $router->addRoute('procesadores', 'GET' , 'ProductsApiController' , 'obtenerProcesadores');
    $router->addRoute('procesadores/:ID', 'GET' , 'ProductsApiController' , 'obtenerProcesador');
    $router->addRoute('procesadores/:ID', 'DELETE' , 'ProductsApiController' , 'borrarProcesador');
    $router->addRoute('procesadores', 'POST', 'ProductsApiController', 'agregarProcesador');
    $router->addRoute('procesadores/:ID', 'PUT', 'ProductsApiController', 'actualizarProcesador');

    //routes para graficas

    $router->addRoute('graficas', 'GET' , 'ProductsApiController' , 'obtenerGraficas');
    $router->addRoute('graficas/:ID', 'GET' , 'ProductsApiController' , 'obtenerGrafica');
    $router->addRoute('graficas/:ID', 'DELETE' , 'ProductsApiController' , 'borrarGrafica');
    $router->addRoute('graficas', 'POST', 'ProductsApiController', 'agregarGrafica');
    $router->addRoute('graficas/:ID', 'PUT', 'ProductsApiController', 'actualizarGrafica');

    //routes para rams

    $router->addRoute('rams', 'GET' , 'ProductsApiController' , 'obtenerRams');
    $router->addRoute('rams/:ID', 'GET' , 'ProductsApiController' , 'obtenerRam');
    $router->addRoute('rams/:ID', 'DELETE' , 'ProductsApiController' , 'borrarRam');
    $router->addRoute('rams', 'POST', 'ProductsApiController', 'agregarRam');
    $router->addRoute('rams/:ID', 'PUT', 'ProductsApiController', 'actualizarRam');

    //routes para gabinetes

    $router->addRoute('gabinetes', 'GET' , 'ProductsApiController' , 'obtenerGabinetes');
    $router->addRoute('gabinetes/:ID', 'GET' , 'ProductsApiController' , 'obtenerGabinete');
    $router->addRoute('gabinetes/:ID', 'DELETE' , 'ProductsApiController' , 'borrarGabinete');
    $router->addRoute('gabinetes', 'POST', 'ProductsApiController', 'agregarGabinete');
    $router->addRoute('gabinetes/:ID', 'PUT', 'ProductsApiController', 'actualizarGabinete');

    //routes para users
    $router->addRoute('user/token', 'GET' , 'UserApiController' , 'getToken');


    $router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
?>