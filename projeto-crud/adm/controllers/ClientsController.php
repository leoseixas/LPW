<?php
class ClientsController{
    function __construct(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }
        require_once("models/ClientsModel.php");
    }

    public function index(){
        $this -> listClients();
    }

    public function listClients(){
        $ClientModel = new ClientsModel();
        $ClientModel -> listClients();
        $result = $ClientModel -> getConsult();

        $arrayClients = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayClients,$line);
        }
        
        require_once("views/Header.php");
        require_once("views/clients/ListClients.php");
        require_once("views/Footer.php");
    }


    public function addClientsForm()
    {
        require_once("views/Header.php");
        require_once("views/clients/addClients.php");
        require_once("views/Footer.php");
    }

    public function addClients()
    {
        $arrayClients = array();

        $arrayClients["nome"] = $_POST["nome"];
        $arrayClients["endereco"] = $_POST["endereco"];
        $arrayClients["email"] = $_POST["email"];
        $arrayClients["telefone"] = $_POST["telefone"];

        $ClientModel = new clientsModel();
        $ClientModel -> adicionarCliente($arrayClients);

        $this -> listClients();
    }

    public function editarClientsForm($idCliente)
    {
        $ClientModel = new clientsModel();
        $ClientModel -> consultClients($idCliente);   
        $result = $ClientModel -> getConsult();

        if($arrayClients = $result -> fetch_assoc()){
            require_once("views/Header.php");
            require_once("views/clients/editarClients.php");
            require_once("views/Footer.php");
        }     
    }

    public function editarClients(){
        $arrayClients["idCliente"] = $_POST["idCliente"];
        $arrayClients["nome"]      = $_POST["nome"];
        $arrayClients["endereco"]  = $_POST["endereco"];
        $arrayClients["email"]     = $_POST["email"];
        $arrayClients["telefone"]  = $_POST["telefone"];

        $ClientModel = new clientsModel();
        $ClientModel -> editarClients($arrayClients);
        $this ->listClients();
    }

    public function deletarClients($idCliente){
        $ClientModel = new clientsModel();
        $ClientModel -> deleteClients($idCliente);
        $this -> listClients();
    }
}
?>