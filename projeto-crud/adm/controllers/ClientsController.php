<?php
class ClientsController{
    var $ClientModel;

    function __construct(){
        if(!isset($_SESSION["login"])){
            header("Location: index.php?c=m&a=l");
        }
        require_once("models/ClientsModel.php");
        $this -> ClientModel = new ClientsModel();
    }

    public function index(){
        $this -> listClients();
    }

    public function listClients(){
        $this -> ClientModel -> listClients();
        $result = $this -> ClientModel -> getConsult();

        $arrayClients = array();

        while($line = $result->fetch_assoc()){
            array_push($arrayClients,$line);
        }
        
        require_once("views/Header.php");
        require_once("views/clients/ListClients.php");
        require_once("views/Footer.php");
    }


    public function addClientsForm()
    {
        require_once("views/Header.php");
        require_once("views/clients/addClients.php");
        require_once("views/Footer.php");
    }

    public function addClients()
    {
        $arrayClients = array();
        $arrayClients["nome"] = $_POST["nome"];
        $arrayClients["endereco"] = $_POST["endereco"];
        $arrayClients["email"] = $_POST["email"];
        $arrayClients["telefone"] = $_POST["telefone"];

        $this -> ClientModel -> adicionarCliente($arrayClients);
        $idCliente = $this -> ClientModel -> getConsult();
        

        if($_FILES["photo"]["name"] != ""){
        
            $foto_temp = $_FILES["photo"]["tmp_name"];	//pega o caminho temporário do arquivo
            $foto_name = $_FILES["photo"]["name"];		//pega o nome
        
            $extensao = str_replace('.','',strrchr($foto_name, '.')); //strtolower(end(explode('.', $foto_name))); //seleciona a extenção da imagem
            $max_width = 600; //define largura máxima
            $max_height = 600; //define altura míxima
        
            // Carrega a imagem 
            $img = null;
        
            //Transforma a imagem em JPG
            if ($extensao == 'jpg' || $extensao == 'jpeg') { 
                $img = imagecreatefromjpeg($foto_temp);
            } else if ($extensao == 'png') { 
                $img = imagecreatefrompng($foto_temp);
            } else if ($extensao == 'gif') { 
                $img = imagecreatefromgif($foto_temp); 
            }  else     
                $img = imagecreatefromjpeg($foto_temp); 
        
            // Se a imagem foi carregada com sucesso, testa o tamanho da mesma
            if ($img) { 
                // Pega o tamanho da imagem e calcula proporção de resize 
                $width  = imagesx($img); 
                $height = imagesy($img); 
                $scale  = min($max_width/$width, $max_height/$height); 
                // Se a imagem é maior que o permitido, encolhe ela! 
                if ($scale < 1) { 
                    $new_width = floor($scale*$width); 
                    $new_height = floor($scale*$height);
                    // Cria uma imagem temporária 
                    $tmp_img = imagecreatetruecolor($new_width, $new_height);
                    // Copia e resize a imagem velha na nova     
                    imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, 
                                    $new_width, $new_height, $width, $height);  
                    imagedestroy($img); 
                    $img = $tmp_img; 
                }           
            }
        
            //cria imagem no diretório @imagejpeg($img,"diretorio/".$id_noticia) se já tiver com este nome vai substituir
            imagejpeg($img,"assets/img/".$idCliente.".jpg");      
        
        }

        mkdir("assets/files/clients/{$idCliente}");
        $this -> listClients();
        
    }

    public function editarClientsForm($idCliente)
    {
        $this -> ClientModel -> consultClients($idCliente);   
        $result = $this -> ClientModel -> getConsult();

        if($arrayClients = $result -> fetch_assoc()){
            require_once("views/Header.php");
            require_once("views/clients/editarClients.php");
            require_once("views/Footer.php");
        }     
    }

    public function editarClients(){
        $arrayClients["idCliente"] = $_POST["idCliente"];
        $arrayClients["nome"]      = $_POST["nome"];
        $arrayClients["endereco"]  = $_POST["endereco"];
        $arrayClients["email"]     = $_POST["email"];
        $arrayClients["telefone"]  = $_POST["telefone"];

        $this -> ClientModel -> editarClients($arrayClients);

        if($_FILES["photo"]["name"] != ""){
            $idCliente = $arrayClients["idCliente"];
            $foto_temp = $_FILES["photo"]["tmp_name"];	//pega o caminho temporário do arquivo
            $foto_name = $_FILES["photo"]["name"];		//pega o nome
        
            $extensao = str_replace('.','',strrchr($foto_name, '.')); //strtolower(end(explode('.', $foto_name))); //seleciona a extenção da imagem
            $max_width = 600; //define largura máxima
            $max_height = 600; //define altura míxima
        
            // Carrega a imagem 
            $img = null;
        
            //Transforma a imagem em JPG
            if ($extensao == 'jpg' || $extensao == 'jpeg') { 
                $img = imagecreatefromjpeg($foto_temp);
            } else if ($extensao == 'png') { 
                $img = imagecreatefrompng($foto_temp);
            } else if ($extensao == 'gif') { 
                $img = imagecreatefromgif($foto_temp); 
            }  else     
                $img = imagecreatefromjpeg($foto_temp); 
        
            // Se a imagem foi carregada com sucesso, testa o tamanho da mesma
            if ($img) { 
                // Pega o tamanho da imagem e calcula proporção de resize 
                $width  = imagesx($img); 
                $height = imagesy($img); 
                $scale  = min($max_width/$width, $max_height/$height); 
                // Se a imagem é maior que o permitido, encolhe ela! 
                if ($scale < 1) { 
                    $new_width = floor($scale*$width); 
                    $new_height = floor($scale*$height);
                    // Cria uma imagem temporária 
                    $tmp_img = imagecreatetruecolor($new_width, $new_height);
                    // Copia e resize a imagem velha na nova     
                    imagecopyresampled($tmp_img, $img, 0, 0, 0, 0, 
                                    $new_width, $new_height, $width, $height);  
                    imagedestroy($img); 
                    $img = $tmp_img; 
                }           
            }
        
            //cria imagem no diretório @imagejpeg($img,"diretorio/".$id_noticia) se já tiver com este nome vai substituir
            imagejpeg($img,"assets/img/{$idCliente}.jpg");      
        
        }
        $this ->listClients();
    }

    public function deletarClients($idCliente){
        $this -> ClientModel -> deleteClients($idCliente);

        $linkPhoto = "assets/img/{$idCliente}.jpg";
        if(file_exists($linkPhoto)){
            unlink($linkPhoto);
        }

        //deletar um deterório com arquivos
        $dir = ("assets/files/clients/{$idCliente}");
        $this->delTree($dir);
        $this -> listClients();
    }

    public function listFileClient($idCliente){
        require_once("views/Header.php");
        require_once("views/clients/files/ListFileClient.php");
        require_once("views/Footer.php");
    }

    public function uploadFileClient($idCliente){
        require_once("views/Header.php");
        require_once("views/clients/files/uploadFileClient.php");
        require_once("views/Footer.php");
    }
    
    public function uploadFileClientAction($idCliente){
        //Obtendo info. dos envios
        $name = $_FILES['file']['name'];
        $tempName = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];

        //Movendo arquivos do upload
        $file = $tempName;
        $location = "assets/files/clients/{$idCliente}/{$name}";
        move_uploaded_file($file, $location);
        $this -> listFileClient($idCliente);
    }

    public function deleteFilesClient($idCliente)
    {
        $file = $_GET['file'];

        unlink("assets/files/clients/{$idCliente}/{$file}");
        $this->listFileClient($idCliente);
    }
    
    public function delTree($dir)
    {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach($files as $file){
            (is_dir("{dir}/{file}")) ? $this->delTree("{$dir}/{$file}") : unlink("{$dir}/{$file}");
        }
        return rmdir($dir);
    }
}
?>