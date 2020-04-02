<?php
class ClientsModel{

    var $result;

    function __construct()
    {
        require_once("db/ConexaoClass.php");
    }

    public function listClients()
    {
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $conn = $Oconn -> getConnect();
        $sql = 'SELECT * FROM clientes';
        $this -> result = $conn -> query($sql);
    }

    public function getConsult()
    {
        return $this -> result;
    }

    public function consultClients($idCliente)
    {
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $conn = $Oconn -> getConnect();

        $sql = 'SELECT * FROM clientes WHERE idCliente="'.$idCliente.'"';
        $this -> result = $conn -> query($sql);
    }

    public function adicionarCliente($arrayClients)
    {
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $conn = $Oconn -> getConnect();

        $sql = "INSERT INTO clientes(nome, endereco, email, telefone)
        VALUE ('".$arrayClients['nome']."', '".$arrayClients['endereco']."',
         '".$arrayClients['email']."', '".$arrayClients['telefone']."');";
         $this -> result = $conn -> query($sql);
    }

    public function editarClients($arrayClients)
    {
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $conn = $Oconn -> getConnect();

        $sql = "UPDATE clientes set
        nome = '".$arrayClients['nome']."',
        endereco = '".$arrayClients['endereco']."',
        email = '".$arrayClients['email']."',
        telefone = '".$arrayClients['telefone']."'
        WHERE idCliente = ".$arrayClients['idCliente'].";";

        $this -> result = $conn -> query($sql);
    }

    public function deleteClients($idCliente)
    {
        $Oconn = new ConnectClass();
        $Oconn -> openConnect();
        $conn = $Oconn -> getConnect();

       $sql = "DELETE FROM clientes WHERE idCliente='".$idCliente."';";
       $this -> result = $conn -> query($sql);
    }
}
?>