<?php
    class clientesModel
    {
        var $resultado;

        public function listaClientes()
        {
            require_once("db/conexaoClass.php");
            $Oconn = new connectClass();
            $Oconn -> openConnect();
            $conn = $Oconn -> getconn();
            $sql = 'SELECT * FROM clientes';
            $this -> resultado = $conn -> query($sql);
        }

        public function getConsulta()
        {
            return $this -> resultado;
        }
        
    }
?>