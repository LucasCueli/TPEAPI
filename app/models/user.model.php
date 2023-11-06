<?php
    class UserModel {

        private $db;

        public function __construct() {
            $this->db = new PDO('mysql:host=localhost;dbname=tienda computacion;charset=utf8', 'root', '');
        }

        //lista de usuarios guardados en la base de datos
        public function getByUsername($username) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
            $query->execute(array($username));

            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function addUsuario($userEmail,$userPassword){
            //Guardo el nuevo usuario en la base de datos
            $db = new PDO('mysql:host=localhost;'.'dbname=tienda computacion;charset=utf8', 'root', '');
            $query = $this->db->prepare('INSERT INTO usuarios (email, password) VALUES (? , ?)');
            $query->execute([$userEmail,$userPassword]);     
        }        

    }
