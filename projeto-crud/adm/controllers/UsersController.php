<?php
    class UsersController{

        public function validateLogin(){
            $login = $_POST["login"];
            require("models/UsersModel.php");
            $User = new UsersModel();
            $User -> consultUser($login);
            $result = $User -> getConsult();

            if($line = $result -> fetch_assoc()){
                if($line['senha'] == $_POST["pass"]){
                    $_SESSION['idUser'] = $line['idUser'];
                    $_SESSION['nome'] = $line['nome'];
                    $_SESSION['login'] = $line['login'];
                    header("Location: index.php?c=m&a=i");
                }
                else{
                    print("senha errada");
                }
            }else{
                print("usuario não existe");
            }

        }
    }
?>