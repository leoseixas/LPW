<?php
    ini_set('display_errors',1);
    ini_set('diplay_startup_errors',1);
    error_reporting(E_ALL);

    if(!isset($_GET['c'])){
    }else{
        switch($_REQUEST['c']){
            case 'c':
                require_once("controllers/ClientsController.php");
                $Client = new ClientsController();

                if(!isset($_GET['a'])){
                    $Client -> listClients();
                }else{
                    switch($_REQUEST['a']){
                        case 'lc'  : $Client -> listClients(); break;
                        case 'cc'  : $Client -> consultClient($_GET['idCliente']); break;
                        case 'ad'  : $Client -> addClients(); break;
                        case 'ec'  : $Client -> editarClients($_GET['idCliente']); break;
                        case 'dc'  : $Client -> deletarClients($_GET['idCliente']); break;
                }
            break;
            }
        }
    }
?>