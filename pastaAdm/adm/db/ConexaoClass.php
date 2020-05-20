
<?php

class ConnectClass{
    var $conn;//propriedade
    //metodo
    function openConnect(){//abrir conexao com o banco de dados
    $servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "lpw_exemplo";
    $this -> conn = new mysqli($servername, $username, $password, $dbname);
    }
    
    function getConnect(){
        return $this -> conn;
    }

}
?>