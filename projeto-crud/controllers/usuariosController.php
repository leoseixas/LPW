<?php
    class UsuariosController
    {

        var $UserModel;

        public function __construct(){
            require_once("models/usersModel.php");
            $this -> UserModel = new UserModel();
        }

        public function formCadastro(){
            require_once("views/templates/header.php");
            require_once("views/users/formCadastro.php");
            require_once("views/templates/footer.php");
        }

        public function cadastrarUsuario(){
            $arrayUsers = array();
            $arrayUsers["nome"] = $_POST['nome'];
            $arrayUsers["login"] = $_POST['login'];
            $arrayUsers["senha"] = $_POST['senha'];

            $this -> UserModel -> adicionarUsuario($arrayUsers);

            $this-> listarUsuarios();
        }

        public function listarUsuarios(){
            $this -> UserModel -> listaUsuario();
            $result = $this -> UserModel -> getConsult();

            $arrayUsers = array();

            while($line = $result->fetch_assoc()){
                array_push($arrayUsers,$line);
            }

            require_once("views/templates/header.php");
            require_once("views/users/listUsers.php");
            require_once("views/templates/footer.php");  
        }
    }
?>