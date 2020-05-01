<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);

    if(!isset($_GET['c'])){

    }else{
        switch($_REQUEST['c']){
            case 'c': //controler cliente
                require_once("controllers/ClientesControlles.php");
                $client = new ClientsController();

                if(!isset($_GET['a'])){
                    $client -> listClients();
                }else{
                    switch($_REQUEST['a']){
                        case 'lc': $client -> listClients();break;
                        case 'cc': $client -> consultClient($_GET['id']);break;
                        case 'ic': $client -> insertClient();break;

                        case 'uc': $client -> updateClient();break;
                        case 'dc': $client -> deleteClient();break;
                        
                    }
                }
            br
        }
    }
?>