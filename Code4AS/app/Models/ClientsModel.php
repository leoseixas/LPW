<?php
namespace App\Models;
use CodeIgniter\Model;

class ClientsModel extends Model{
    
    protected $table = 'clientes';
    protected $primaryKey = 'idCliente';
    protected $allowedFields = [
        'nome','endereco','email','telefone'
    ];

    public function getClients($id=null)
    {
        if($id==null):
            return $this->findAll();
        else:
            return $this->find($id);
        endif;
    }

    public function getSearch($nome)
    {
        
        return $this->like('nome',$nome);
    
    }

    
}