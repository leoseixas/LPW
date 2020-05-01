<?php
    $request_method = $_SERVER["REQUEST_METHOD"];
    $local = $_SERVER['SCRIPT_NAME'];
    $uri = $_SERVER['PHP_SELF'];
    $rout = str_replace($local, "",$uri);
    $uriSegments = explode("/", $rout);

    if(isset($uriSegments[1])){
        switch($uriSegments[1]){
            case 'clients':
            require_once("controllers/ClientsController.php");
            $Client = new ClientsController();
                switch($request_method){
                    case 'GET':
                        if(!isset($uriSegments[2]))
                            $Client -> listClients();
                        else
                            $Client -> consultClient($uriSegments[2]);
                    break;  
                    
                    case 'POST':
                         $Client -> addClients(); 
                    break;

                    case 'PUT': 
                        $Client -> editarClients($uriSegments[2]); 
                    break;
                    
                    case 'DELETE': 
                        $Client -> deletarClients($uriSegments[2]); 
                    break;
                }
        break;
        }
    }
?>