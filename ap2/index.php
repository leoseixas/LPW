<?php
    $request_method = $_SERVER["REQUEST_METHOD"];
    $local = $_SERVER['SCRIPT_NAME'];
    $uri = $_SERVER['PHP_SELF'];
    $rout = str_replace($local, "",$uri);
    $uriSegments = explode("/", $rout);

    if(isset($uriSegments[1])){
        switch($uriSegments[1]){
            case 'contatc':
            require_once("controllers/ContactsController.php");
            $Contatc = new ContatcsController();
                switch($request_method){
                    case 'GET':
                      if(!isset($uriSegments[2]))
                            $Contatc -> ListContact();
                        else
                            $Contatc -> GetContact($uriSegments[2]); 
                    break;  
                    
                    case 'POST':
                        $Contatc -> InsertContact();
                    break;

                }
            break;

            case 'user':
            require_once("controllers/UsersController.php");
            $User = new UsersController();
                switch($request_method){
                    case 'GET':
                        $User -> loginUser();
                    break;
                }
        }
    }
?>