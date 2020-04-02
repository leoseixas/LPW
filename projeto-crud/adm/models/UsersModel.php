<?php
    class UsersModel{

        var $result;

        function __construct()
        {
            require_once("db/ConexaoClass.php");
        }

        public function consultUser($login){
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $sql = "SELECT * FROM usuarios WHERE login='".$login."'";
            $conn = $Oconn -> getConnect();
            $this -> result = $conn -> query($sql);
        }

        public function getConsult(){
            return $this -> result;
        }
    }
?>