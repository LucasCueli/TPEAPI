<?php 

    require_once ('model.php');

    class ProductsModel extends Model {

        //funciones para procesadores

        public function getAllProcesadores(){
            $query = $this->db->prepare('SELECT * FROM procesadores');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllProcesadoresOrder($params){
            $sql = 'SELECT * FROM procesadores ';
            if(isset($params['sort'])){
                $sql .= ' ORDER BY ' . $params['sort'];
            }
            if(isset($params['order'])){
                $sql .= ' ' . $params['order'];
            }

            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getProcesador($idProcesador){
            $query = $this->db->prepare('SELECT * FROM procesadores WHERE ID_procesadores = ?');
            $query->execute([$idProcesador]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function addProcesador($marca, $modelo, $socket, $valor) {
            $query = $this->db->prepare('INSERT INTO procesadores(ID_procesadores, Marca, Modelo, Socket, Valor) VALUES(NULL,?,?,?,?)');
            $query->execute([$marca, $modelo, $socket, $valor]); 
        }

        public function deleteProcesador($idProcesador){
            $query = $this->db->prepare('DELETE FROM procesadores WHERE ID_procesadores = ?');
            $query->execute([$idProcesador]); 
        }

        public function updateProcesador($idProcesador, $marca, $modelo, $socket, $valor) {
            $query = $this->db->prepare('UPDATE procesadores SET Marca = ?, Modelo = ?, Socket = ?, Valor = ? WHERE ID_procesadores = ?');
            $query->execute([$marca, $modelo, $socket, $valor, $idProcesador]);
        }

        //funciones para graficas

        public function getAllGraficas(){
            $query = $this->db->prepare('SELECT * FROM graficas');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllGraficasOrder($params){
            $sql = 'SELECT * FROM graficas ';
            if(isset($params['sort'])){
                $sql .= ' ORDER BY ' . $params['sort'];
            }
            if(isset($params['order'])){
                $sql .= ' ' . $params['order'];
            }

            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getGrafica($idGrafica){
            $query = $this->db->prepare('SELECT * FROM graficas where ID_graficas = ?');
            $query->execute([$idGrafica]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function addGrafica($marca, $modelo, $vram, $valor) {
            $query = $this->db->prepare('INSERT INTO graficas(ID_graficas, Marca, Modelo, Vram, Valor) VALUES(NULL,?,?,?,?)');
            $query->execute([$marca, $modelo, $vram, $valor]); 
        }

        public function deleteGrafica($idGrafica){
            $query = $this->db->prepare('DELETE FROM graficas WHERE ID_graficas = ?');
            $query->execute([$idGrafica]); 
        }

        public function updateGrafica($idGrafica, $marca, $modelo, $vram, $valor) {
            $query = $this->db->prepare('UPDATE graficas SET Marca = ?, Modelo = ?, Vram = ?, Valor = ? WHERE ID_graficas = ?');
            $query->execute([$marca, $modelo, $vram, $valor, $idGrafica]);
        }

        //funciones para rams

        public function getAllRams(){
            $query = $this->db->prepare('SELECT * FROM rams');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllRamsOrder($params){
            $sql = 'SELECT * FROM rams ';
            if(isset($params['sort'])){
                $sql .= ' ORDER BY ' . $params['sort'];
            }
            if(isset($params['order'])){
                $sql .= ' ' . $params['order'];
            }

            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getRam($idRam){
            $query = $this->db->prepare('SELECT * FROM rams');
            $query->execute([$idRam]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function addRam($marca, $tamaño, $velocidad, $generacion, $valor){
            $query = $this->db->prepare('INSERT INTO rams(ID_RAM, Marca, Tamaño, Velocidad, Generacion, Valor) VALUES(NULL,?,?,?,?,?)');
            $query->execute([$marca, $tamaño, $velocidad, $generacion, $valor]);
        }

        public function deleteRam($idRam){
            $query = $this->db->prepare('DELETE FROM rams WHERE ID_RAM = ?');
            $query->execute([$idRam]);
        }

        public function updateRam($idRam, $marca, $tamaño, $velocidad, $generacion, $valor) {
            $query = $this->db->prepare('UPDATE rams SET Marca = ?, Tamaño = ?, Velocidad = ?, Generacion = ?, Valor = ? WHERE ID_RAM = ?');
            $query->execute([$marca, $tamaño, $velocidad, $generacion, $valor, $idRam]);
        }

        //funciones para gabinetes

        public function getAllGabinetes(){
            $query = $this->db->prepare('SELECT * FROM gabinetes');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllGabinetesOrder($params){
            $sql = 'SELECT * FROM gabinetes ';
            if(isset($params['sort'])){
                $sql .= ' ORDER BY ' . $params['sort'];
            }
            if(isset($params['order'])){
                $sql .= ' ' . $params['order'];
            }

            $query = $this->db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getGabinete($idGabinete){
            $query = $this->db->prepare('SELECT * FROM gabinetes where ID_gabinete = ?');
            $query->execute([$idGabinete]);

            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function addGabinete($marca, $modelo, $tamaño, $valor){
            $query = $this->db->prepare('INSERT INTO gabinetes(ID_gabinete, Marca, Modelo, Tamaño, Valor) VALUES(NULL,?,?,?,?)');
            $query->execute([$marca, $modelo, $tamaño, $valor]);
        }

        public function deleteGabinete($idGabinete){
            $query = $this->db->prepare('DELETE FROM gabinetes WHERE ID_gabinete = ?');
            $query->execute([$idGabinete]);
        }

        public function updateGabinete($idGabinete, $marca, $modelo, $tamaño, $valor) {
            $query = $this->db->prepare('UPDATE gabinetes SET Marca = ?, Modelo = ?, Tamaño = ?, Valor = ? WHERE ID_gabinete = ?');
            $query->execute([$marca, $modelo, $tamaño, $valor, $idGabinete]);
        }
    }
?>