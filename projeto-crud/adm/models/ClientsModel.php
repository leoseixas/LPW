<?php
class ClientsModel{

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

    public function consultClients($idCliente)
    {
        $sql = 'SELECT * FROM clientes WHERE idCliente="'.$idCliente.'"';
        $this -> result = $this -> conn -> query($sql);
    }

    public function adicionarCliente($arrayClients)
    {
        $sql = "INSERT INTO clientes(nome, endereco, email, telefone)
        VALUE ('".$arrayClients['nome']."', '".$arrayClients['endereco']."',
         '".$arrayClients['email']."', '".$arrayClients['telefone']."');";
         $this -> result = $this -> conn -> query($sql);
    }

    public function editarClients($arrayClients)
    {
        $sql = "UPDATE clientes set
        nome = '".$arrayClients['nome']."',
        endereco = '".$arrayClients['endereco']."',
        email = '".$arrayClients['email']."',
        telefone = '".$arrayClients['telefone']."'
        WHERE idCliente = ".$arrayClients['idCliente'].";";

        $this -> result = $this -> conn -> query($sql);
    }

    public function deleteClients($idCliente)
    {
       $sql = "DELETE FROM clientes WHERE idCliente='".$idCliente."';";
       $this -> result = $this -> conn -> query($sql);
    }
}
?>