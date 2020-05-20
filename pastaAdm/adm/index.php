<?php
    session_start();
    //require_once("config/config.php");

    if(!isset($_GET['c'])){
        require_once("controllers/mainController.php");
        $Main = new MainController();
        $Main -> index();
    }else{
        switch($_REQUEST['c']){
            
            case 'm':
                require_once("controllers/mainController.php");
                $Main = new MainController();

                if(!isset($_GET['a'])){
                    $Main -> index();
                }else{
                    switch($_GET['a']){
                        case 'i': $Main -> index(); break;
                        case 'l': $Main -> login(); break;
                        case 'sd': $Main -> sessionDestroy(); break;
                    }
                }
            break;

            case 'u':   
                require_once("controllers/usersController.php");
                $User = new usersController();

                if(!isset($_GET['a'])){
                    $User -> index();
                }else{
                    switch($_REQUEST['a']){
                        case 'vl': $User -> validateLogin(); break;
                    }
                }
            break;

            case 'c':
                require_once("controllers/clientsController.php");
                $Client = new ClientsController();

                if(!isset($_GET['a'])){
                    $Client -> index();
                }else{
                    switch($_REQUEST['a']){
                        case 'lc'  : $Client -> listClients(); break;
                        case 'adf' : $Client -> addClientsForm(); break;
                        case 'ad'  : $Client -> addClients(); break;
                        case 'ecf' : $idCliente=$_GET['id']; $Client -> editarClientsForm($idCliente); break;
                        case 'ec'  : $Client -> editarClients(); break;
                        case 'dc'  : $idCliente=$_GET['id']; $Client -> deletarClients($idCliente); break;
                        case 'lfc' : $idCliente=$_GET['id']; $Client -> listFileClient($idCliente); break;
                        case 'ufc' : $idCliente=$_GET['id']; $Client -> uploadFileClient($idCliente); break;
                        case 'ufcs': $idCliente=$_GET['id']; $Client -> uploadFileClientAction($idCliente); break;
                        case 'dfc' : $idCliente=$_GET['id']; $Client -> deleteFilesClient($idCliente); break;
                    }
                }
            break;
        }
    }
?>