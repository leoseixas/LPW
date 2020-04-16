<?php
class clientsModel{

    var $result;

    function __construct()
    {
        require_once("db/ConexaoClass.php");
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $this -> conn = $Oconn -> getConnect();
    }

    public function listClients()
    { 
        $sql = 'SELECT * FROM clientes';
        $this -> result = $this -> conn -> query($sql);
    }
    public function getConsult()
    {
        return $this -> result;
    }

}
?>