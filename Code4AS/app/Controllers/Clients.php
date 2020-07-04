<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ClientsModel;

class Clients extends Controller{
    
    public function index()
    {
        $clients = new ClientsModel(); 

        $data = [
            'title' => 'Lista de Clientes',
            'clients' => $clients->getClients()
        ];

        echo view('templates/Header');
        echo view('clients/list',$data);
        echo view('templates/Footer');
    }

    public function details($id)
    {
        $clients = new ClientsModel(); 

        $data = [
            'client' => $clients->getClients($id)
        ];

        echo view('templates/Header');
        echo view('clients/details',$data);
        echo view('templates/Footer'); 
    }

    
        
    
}

