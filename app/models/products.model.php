<?php 

    require_once ('model.php');

    class ProductsModel extends Model {

        //funciones para procesadores

        public function getAllProcesadores(){
            $query = $this->db->prepare('SELECT * FROM procesadores');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function getProcesador($idProcesador){
            $query = $this->db->prepare('SELECT * FROM procesadores where ID_procesadores = ?');
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
            $query = $this->db->prepare('SELECT * FROM graficas ORDER BY Marca ASC');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function addGrafica($marca, $modelo, $vram, $valor) {
            $query = $this->db->prepare('INSERT INTO graficas(ID_graficas, Marca, Modelo, Vram, Valor) VALUES(NULL,?,?,?,?)');
            $query->execute([$marca, $modelo, $vram, $valor]); 
        }

        public function deleteGrafica($idGrafica){
            $query = $this->db->prepare('DELETE FROM graficas WHERE ID_graficas = ?');
            $query->execute([$idGrafica]); 
        }

        //funciones para rams

        public function getAllRams(){
            $query = $this->db->prepare('SELECT * FROM rams ORDER BY Marca ASC');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function addRam($marca, $tamaño, $velocidad, $generacion, $valor){
            $query = $this->db->prepare('INSERT INTO rams(ID_RAM, Marca, Tamaño, Velocidad, Generacion, Valor) VALUES(NULL,?,?,?,?,?)');
            $query->execute([$marca, $tamaño, $velocidad, $generacion, $valor]);
        }

        public function deleteRam($idRam){
            $query = $this->db->prepare('DELETE FROM rams WHERE ID_RAM = ?');
            $query->execute([$idRam]);
        }

        //funciones para gabinetes

        public function getAllGabinetes(){
            $query = $this->db->prepare('SELECT * FROM gabinetes ORDER BY Marca ASC');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function addGabinete($marca, $modelo, $tamaño, $valor){
            $query = $this->db->prepare('INSERT INTO gabinetes(ID_gabinete, Marca, Modelo, Tamaño, Valor) VALUES(NULL,?,?,?,?)');
            $query->execute([$marca, $modelo, $tamaño, $valor]);
        }

        public function deleteGabinete($idGabinete){
            $query = $this->db->prepare('DELETE FROM gabinetes WHERE ID_gabinete = ?');
            $query->execute([$idGabinete]);
        }
    }
?>