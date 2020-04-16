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
                        case 'home': $site -> home(); break;
                        case 'contato': $site -> contato(); break;
                        case 'sobre': $site -> sobre(); break;
                        case 'prod': $site -> produto(); break;
                    }
                    break;
                
                case 'c':
                    require_once("controllers/usuariosController.php");
                    $Users = new UsuariosController();
                    
                    if(!isset($_GET['a'])){
                        $Users -> formCadastro();
                    }else{
                        switch($_REQUEST['a']){
                            case 'uf': $Users -> formCadastro(); break;
                            case 'uca': $Users -> cadastrarUsuario(); break;
                            case 'ul': $Users -> listarUsuarios(); break;   
                        }
                    }
                break;
                
                case 'l':
                    require_once("controllers/clientsController.php");
                    $Client = new clientsController();
                    switch($_REQUEST['a']){
                        case 'l': $Client -> listClients();break;
                    }

            }
        }
    
?>
