<?php

class ConnectClass{
    var $conn;//propriedade
    //metodo
    function openConnect(){//abrir conexao com o banco de dados
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "pw_ap2";
    $this -> conn = new mysqli($servername, $username, $password, $dbname);
    }
    
    function getConnect(){
        return $this -> conn;
    }

}
?>