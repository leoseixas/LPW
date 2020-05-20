<?php
    class UsersModel{
        var $result;

        function __construct()
        {
            require_once("db/ConnectClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();    
        }

        public function loginUser($arrayUser)   
        {
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $sql = "SELECT * FROM users WHERE user='".$arrayUser['user']."' AND 
            password='".$arrayUser['password']."'";
            $conn = $Oconn -> getConnect();
            $this -> result = $conn -> query($sql);
        }

        public function GetConsult()
        {
            return $this -> result;
        }
    
    }
?>