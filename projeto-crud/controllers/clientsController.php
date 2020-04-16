<?php

    class clientsController{
        var $ClientModel;

        function __construct(){
            require_once("models/clientsModel.php");
            $this -> ClientModel = new clientsModel();
        }

        public function listClients(){
            $this -> ClientModel -> listClients();
            $result = $this -> ClientModel -> getConsult();
    
            $arrayClients = array();
    
            while($line = $result->fetch_assoc()){
                array_push($arrayClients,$line);
            }
            
            require_once("views/templates/Header.php");
            require_once("views/clients/listClients.php");
            require_once("views/templates/Footer.php");
        }
    }
    

?>