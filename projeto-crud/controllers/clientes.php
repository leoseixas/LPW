<?php
    class clientesController
    {
        function formCadastro(){
            require_once("views/templates/header.php");
            require_once("views/client/formCadastro.php");
            require_once("views/templates/footer.php");
        }
        function cadastroCliente(){
            $cliente = array(
                "nome" => $_POST['nome'],
                "login" => $_POST['login'],
                "sexo" => $_POST['sexo'],
                "ta" => $_POST['taxtarea']
            );
            require_once("views/templates/header.php");
            require_once("views/client/cadastroCliente.php");
            require_once("views/templates/footre.php");
        }

        function listaClientes(){
            require_once("models/clientesModel.php");
            $cliente = new clientesModel();
            $cliente -> listaClientes();
            $resultado = $cliente -> getConsulta();

            $arrayClientes = array();

            while($linha = $resultado->fetch_assoc()){
                array_push($arrayClientes,$linha);
            }

            require_once("views/templates/header.php");
            require_once("views/client/listaClientes.php");
            require_once("views/templates/footer.php");
        }
    }
?>