<?php
    class ContatcsController{
        var $ContatcModel;

        function __construct()      
        {
            require_once("models/ContactsModel.php");
            $this -> ContatcModel = new ContactsModel();
        }

        public function insertContact()
        {
            $Contatc = json_decode(file_get_contents("php://input"));

            $arrayContatc['name'] = $Contatc -> name;
            $arrayContatc['email'] = $Contatc -> email;
            $arrayContatc['message'] = $Contatc -> message;

            $this -> ContatcModel -> insertContact($arrayContatc);

            header('Content-Type: application/json');
            echo('{"result":"true"}');
        }

        public function ListContact()
        {
            $header = apache_request_headers();
            $token = $header['Authorization'];

            $token = str_replace("Bearer ", "", $token); //se tiver o prefixo "Bearer" remover

            //var_dump($token);

            $part = explode(".",$token);
            $header = $part[0];
            $payload = $part[1];
            $signature = $part[2];

            $valid = hash_hmac('sha256',"$header.$payload",'minha-senha',true);
            $valid = base64_encode($valid);
            $valid = str_replace(['+', '/', '='], ['-', '_', ''], $valid); //base64url

            if($signature == $valid){ 
                $_payload = base64_decode($payload);
                //echo (".$_payload.'");
                $user = json_decode($_payload); 
                                
                if ($user->{'admin'} == true){
                
                    $this -> ContatcModel -> listContact();
                    $result = $this -> ContatcModel -> getConsult();
    
                    $arrayContacts = array();
    
                    while($line = $result->fetch_assoc()){
                        array_push($arrayContacts,$line);
                    }
                    header('Content-Type: application/json');
                    echo json_encode($arrayContacts);   
                }else{
                    echo 'Usuario invalid';
                }
                                              
           
            }else{
            echo 'token invalid';
            }            
        }

        public function GetContact()
        {
            
        }


    }
?>