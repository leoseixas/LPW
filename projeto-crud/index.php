<?php
    session_start();
    
        if(!isset($_GET['c'])){
            require_once('controllers/site.php');
            $site = new siteController();
            $site -> home();
        }else{
            switch ($_REQUEST['c']) {
                case 's':
                    require_once('controllers/site.php');
                    $site = new siteController();
                    switch ($_REQUEST['a']) {
                        case 'home':
                            $site -> home();
                        break;
                        
                        case 'contato':
                            $site -> contato();
                        break;
                        
                        case 'sobre':
                            $site -> sobre();
                        break;

                        case 'prod':
                            $site -> produto();
                        break;
                    }
                    break;
                
                case 'c':
                    require_once("controllers/clientes.php");
                    $cliente = new clientesController();
                    
                    if(!isset($_GET['a'])){
                        //$cliente -> home();
                    }else{
                        switch($_REQUEST['a']){
                            case 'cc': $cliente -> formCadastro();
                            break;
                            case 'cca': $cliente -> cadastroCliente();
                            break;
                            case 'lc': $cliente -> listaClientes();
                            break;   
                        }
                    }
                break;
            }
        }
    
?>
