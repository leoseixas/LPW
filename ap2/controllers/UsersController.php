<?php
    class UsersController{
        var $UserModel;

        function __construct() {
            require_once("models/UsersModel.php");
            $this->UserModel = new UsersModel;
        }

        public function loginUser()
        {
            $User = json_decode(file_get_contents("php://input"));

            $arrayUser['user'] = $User -> user;
            $arrayUser['password'] = $User -> password;

            $this -> UserModel -> loginUser($arrayUser);
            $result = $this -> UserModel -> GetConsult();

            if($user = $result->fetch_assoc()){
                $header = [
                    'alg' => 'HS256',
                    'typ' => 'JWT'
                 ];
                 $header = json_encode($header);
                 $header = base64_encode($header);
                 $header = str_replace(['+', '/', '='], ['-', '_', ''], $header); //base64url
                 
                 $payload = [
                    'idUser ' => $user['idUser'],
                    'name'=> $user['name'],
                    'user' => $user['user'],
                    'password' => $user['password'],
                    'admin' => $user['admin']
    
                 ];
                 $payload = json_encode($payload);
                 $payload = base64_encode($payload);
                 $payload = str_replace(['+', '/', '='], ['-', '_', ''], $payload); //base64url
                 
                 $signature = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
                 $signature = base64_encode($signature);
                 $signature = str_replace(['+', '/', '='], ['-', '_', ''], $signature); //base64url
                 
                 
                 $token = $header . "." . $payload . "." . $signature;
                 
                 header('Content-Type: application/json');	
                 echo ('{"acess":"true","token":"'.$token.'"}'); 
            }else{
                header('Content-Type: application/json');
                echo('{"result":"Usuario ou senha errado"}');
            }          
             
        }
    }
?>