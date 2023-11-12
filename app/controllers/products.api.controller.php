<?php
    require_once ('./app/controllers/api.controller.php');
    require_once ('./app/models/products.model.php');

    class ProductsApiController extends ApiController {
        private $model;

        public function __construct(){
            $this->model = new ProductsModel();
            parent::__construct();
        }

        //controllers para procesadores

        function obtenerProcesadores($params = []){
            if (isset($_GET['sort'])){
                $params['sort'] = $_GET['sort'];
                if (isset($_GET['order'])){
                    $params['order'] = $_GET['order'];
                }
                $procesadores = $this->model->getAllProcesadoresOrder($params);
            } else if(empty($params)){
                $procesadores = $this->model->getAllProcesadores();
            }

            return $this->view->response($procesadores, 200);
        }

        function obtenerProcesador($params= []){
            $idProcesador = $params[':ID'];
            $procesador = $this->model->getProcesador($idProcesador);

            if (!empty($procesador)) {
                $this->view->response($procesador, 200);
            } else {
                $this->view->response("No existe el procesador con la ID={$idProcesador}", 404);
            }
        }

        function borrarProcesador($params= []){
            $idProcesador = $params[':ID'];
            $procesador = $this->model->getProcesador($idProcesador);

            if(!empty($procesador)){
                $this->model->deleteProcesador($idProcesador);
                $this->view->response("El procesador con la ID={$idProcesador} ha sido eliminado.", 200);
            } else {
                $this->view->response("El procesador con la ID={$idProcesador} no existe.", 404);
            }
        }

        function agregarProcesador($params= []){
            $body = $this->getData();

            $marca = $body->Marca;
            $modelo = $body->Modelo;
            $socket = $body->Socket;
            $valor = $body->Valor; 

            $this->model->addProcesador($marca,$modelo,$socket,$valor);
            $this->view->response("El procesador fue guardado exitosamente.", 201);
        }

        function actualizarProcesador($params= []){
            $idProcesador = $params[':ID'];
            $procesador = $this->model->getProcesador($idProcesador);

            if(!empty($procesador)){
                $body = $this->getData();

                $marca = $body->Marca;
                $modelo = $body->Modelo;
                $socket = $body->Socket;
                $valor = $body->Valor; 

                $this->model->updateProcesador($idProcesador, $marca, $modelo, $socket, $valor);
                $this->view->response("El procesador con la ID={$idProcesador} ha sido actualizado.", 200);
            } else {
                $this->view->response("El procesador con la ID={$idProcesador} no existe.", 404);
            }
        }

        //controllers para graficas

        function obtenerGraficas($params = []){
            if (isset($_GET['sort'])){
                $params['sort'] = $_GET['sort'];
                if (isset($_GET['order'])){
                    $params['order'] = $_GET['order'];
                }
                $graficas = $this->model->getAllGraficasOrder($params);
            } else if (empty($params)){
                $graficas = $this->model->getAllGraficas();
            }
            
            return $this->view->response($graficas, 200);
        }

        function obtenerGrafica($params= []){
            $idGrafica = $params[':ID'];
            $grafica = $this->model->getGrafica($idGrafica);

            if (!empty($grafica)) {
                $this->view->response($grafica, 200);
            } else {
                $this->view->response("No existe la grafica con la ID={$idGrafica}", 404);
            }
        }

        function borrarGrafica($params= []){
            $idGrafica = $params[':ID'];
            $grafica = $this->model->getGrafica($idGrafica);

            if(!empty($grafica)){
                $this->model->deleteGrafica($idGrafica);
                $this->view->response("La grafica con la ID={$idGrafica} ha sido eliminada.", 200);
            } else {
                $this->view->response("La grafica con la ID={$idGrafica} no existe.", 404);
            }
        }
        
        function agregarGrafica($params= []){
            $body = $this->getData();

            $marca = $body->Marca;
            $modelo = $body->Modelo;
            $vram = $body->Vram;
            $valor = $body->Valor; 

            $this->model->addGrafica($marca,$modelo,$vram,$valor);
            $this->view->response("La grafica fue guardada exitosamente.", 201);
        }

        function actualizarGrafica($params= []){
            $idGrafica = $params[':ID'];
            $grafica = $this->model->getGrafica($idGrafica);

            if(!empty($grafica)){
                $body = $this->getData();

                $marca = $body->Marca;
                $modelo = $body->Modelo;
                $vram = $body->Vram;
                $valor = $body->Valor; 

                $this->model->updateGrafica($idGrafica, $marca, $modelo, $vram, $valor);
                $this->view->response("La grafica con la ID={$idGrafica} ha sido actualizada.", 200);
            } else {
                $this->view->response("La grafica con la ID={$idGrafica} no existe.", 404);
            }
        }

        //controllers para rams

        function obtenerRams($params = []){
            if (isset($_GET['sort'])){
                $params['sort'] = $_GET['sort'];
                if (isset($_GET['order'])){
                    $params['order'] = $_GET['order'];
                }
                $rams = $this->model->getAllRamsOrder($params);
            } else if (empty($params)){
                $rams = $this->model->getAllRams();
            }
        
            return $this->view->response($rams, 200);
        }

        function obtenerRam($params= []){
            $idRam = $params[':ID'];
            $ram = $this->model->getRam($idRam);

            if (!empty($ram)) {
                $this->view->response($ram, 200);
            } else {
                $this->view->response("No existe la ram con la ID={$idRam}", 404);
            }
        }

        function borrarRam($params= []){
            $idRam = $params[':ID'];
            $ram = $this->model->getRam($idRam);

            if(!empty($ram)){
                $this->model->deleteRam($idRam);
                $this->view->response("La ram con la ID={$idRam} ha sido eliminada.", 200);
            } else {
                $this->view->response("La ram con la ID={$idRam} no existe.", 404);
            }
        }
        
        #ID_RAM, Marca, Tamaño, Velocidad, Generacion, Valor
        function agregarRam($params= []){
            $body = $this->getData();

            $marca = $body->Marca;
            $tamaño = $body->Tamaño;
            $velocidad = $body->Velocidad;
            $generacion = $body->Generacion;
            $valor = $body->Valor; 

            $this->model->addRam($marca,$tamaño,$velocidad,$generacion,$valor);
            $this->view->response("La ram fue guardada exitosamente.", 201);
        }

        function actualizarRam($params= []){
            $idRam = $params[':ID'];
            $ram = $this->model->getRam($idRam);

            if(!empty($ram)){
                $body = $this->getData();

                $marca = $body->Marca;
                $tamaño = $body->Tamaño;
                $velocidad = $body->Velocidad;
                $generacion = $body->Generacion;
                $valor = $body->Valor; 

                $this->model->updateRam($idRam,$marca,$tamaño,$velocidad,$generacion,$valor);
                $this->view->response("La ram con la ID={$idRam} ha sido actualizada.", 200);
            } else {
                $this->view->response("La ram con la ID={$idRam} no existe.", 404);
            }
        }

        //controllers para gabinetes

        function obtenerGabinetes($params = []){
            if (isset($_GET['sort'])){
                $params['sort'] = $_GET['sort'];
                if (isset($_GET['order'])){
                    $params['order'] = $_GET['order'];
                }
                $gabinetes = $this->model->getAllGabinetesOrder($params);
            } else if (empty($params)){
                $gabinetes = $this->model->getAllGabinetes();
            }

            return $this->view->response($gabinetes, 200);
        }

        function obtenerGabinete($params= []){
            $idGabinete = $params[':ID'];
            $gabinete = $this->model->getGabinete($idGabinete);

            if (!empty($gabinete)) {
                $this->view->response($gabinete, 200);
            } else {
                $this->view->response("No existe el gabinete con la ID={$idGabinete}", 404);
            }
        }

        function borrarGabinete($params= []){
            $idGabinete = $params[':ID'];
            $gabinete = $this->model->getGabinete($idGabinete);

            if(!empty($gabinete)){
                $this->model->deleteGabinete($idGabinete);
                $this->view->response("El gabinete con la ID={$idGabinete} ha sido eliminado.", 200);
            } else {
                $this->view->response("El gabinete con la ID={$idGabinete} no existe.", 404);
            }
        }
        
        function agregarGabinete($params= []){
            $body = $this->getData();

            $marca = $body->Marca;
            $modelo = $body->Modelo;
            $tamaño = $body->Tamaño;
            $valor = $body->Valor; 

            $this->model->addGabinete($marca,$modelo,$tamaño,$valor);
            $this->view->response("El gabinete fue guardado exitosamente.", 201);
        }

        function actualizarGabinete($params= []){
            $idGabinete = $params[':ID'];
            $gabinete = $this->model->getGabinete($idGabinete);

            if(!empty($gabinete)){
                $body = $this->getData();

                $marca = $body->Marca;
                $modelo = $body->Modelo;
                $tamaño = $body->Tamaño;
                $valor = $body->Valor; 

                $this->model->updateGabinete($idGrafica, $marca, $modelo, $vram, $valor);
                $this->view->response("El gabinete con la ID={$idGabinete} ha sido actualizado.", 200);
            } else {
                $this->view->response("El gabinete con la ID={$idGabinete} no existe.", 404);
            }
        }
    }
?>