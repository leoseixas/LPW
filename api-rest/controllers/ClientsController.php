<?php
class ClientsController{
    var $ClientModel;

    function __construct(){

        require_once("models/ClientsModel.php");
        $this -> ClientModel = new ClientsModel();
    }

    public function listClients(){
        $this -> ClientModel -> listClients();
        $result = $this -> ClientModel -> getConsult();

        $arrayClients = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayClients,$line);
        }

        header('Content-Type: application/json');
        echo json_encode($arrayClients);
    }


    public function consultClient($idCliente){
        $this -> ClientModel -> consultClients($idCliente);
        $result = $this -> ClientModel -> getConsult();

        if($client = $result->fetch_assoc()){
            header('Content-Type: application/json');
            echo json_encode($client);
        }else{
            header('Content-Type: application/json');
            echo('{"result":"null"}');
            http_response_code(400);
        }

    }

    public function addClients()
    {
        $client = json_decode(file_get_contents("php://input"));

        $arrayClients["nome"] = $client -> nome;
        $arrayClients["endereco"] = $client -> endereco;
        $arrayClients["email"] = $client -> email;
        $arrayClients["telefone"] = $client -> telefone;

        $this -> ClientModel -> adicionarCliente($arrayClients);
        
        header('Content-Type: application/json');
        echo json_encode($client);   
    }

    
    public function editarClients($idCliente){

        $client = json_decode(file_get_contents("php://input"));

        $arrayClients["idCliente"] = $client -> idCliente;
        $arrayClients["nome"]      = $client -> nome;
        $arrayClients["endereco"]  = $client -> endereco;
        $arrayClients["email"]     = $client -> email;
        $arrayClients["telefone"]  = $client -> telefone;

        $this -> ClientModel -> editarClients($arrayClients);
        header('Content-Type: application/json');
        echo json_encode($client);
    }

    public function deletarClients($idCliente){

        $this -> ClientModel -> consultClients($idCliente);
        $result = $this -> ClientModel -> getConsult();

        if($client = $result->fetch_assoc()){
            $this -> ClientModel -> deleteClients($idCliente);
            header('Content-Type: application/json');
            echo json_encode($client);
        }else{
            header('Content-Type: application/json');
            echo('{"result":"null"}');
            http_response_code(400);
        }

        /*$this -> ClientModel -> deleteClients($idCliente);
        
        header('Content-Type: application/json');
        echo('{"result":"true"}');  */

    }

}
?>