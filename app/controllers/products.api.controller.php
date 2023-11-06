<?php
    require_once ('./app/controllers/api.controller.php');
    require_once ('./app/models/products.model.php');

    class ProductsApiController extends ApiController {
        private $model;

        public function __construct(){
            $this->model = new ProductsModel();
            parent::__construct();
        }

        function obtenerProcesadores($params = []){
            $procesadores = $this->model->getAllProcesadores();

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
    }
?>