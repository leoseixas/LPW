<?php
    class UserModel
    {
        var $result;

        function __construct()
        {
            require_once("db/ConexaoClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();
        }

        public function listaUsuario()
        {
            $sql = 'SELECT * FROM usuarios';
            $this -> result = $this -> conn -> query($sql);
        }

         public function adicionarUsuario($arrayUsers)
        {
            $sql = "INSERT INTO usuarios (nome, login, senha)
            VALUE ('".$arrayUsers['nome']."', '".$arrayUsers['login']."',
            '".$arrayUsers['senha']."');";

            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult()
        {
            return $this -> result;
        }   
        
    }
?>