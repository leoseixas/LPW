<?php
    class ContactsModel{
        var $result;

        function __construct()
        {
            require_once("db/ConnectClass.php");
            $Oconn = new ConnectClass();
            $Oconn -> openConnect();
            $this -> conn = $Oconn -> getConnect();
        }

        public function insertContact($arrayContatc)
        {
            $sql = "INSERT INTO contacts(name, email, message)
            VALUE (
                '".$arrayContatc['name']."',
                '".$arrayContatc['email']."',
                '".$arrayContatc['message']."'
            );";
            $this -> conn -> query($sql);
            $this -> result = $this -> conn -> insert_id;
        }

        public function listContact()
        {
            $sql = 'SELECT * FROM contacts';
            $this -> result = $this -> conn -> query($sql);
        }

        public function getConsult()
    {
        return $this -> result;
    }
    }
?>