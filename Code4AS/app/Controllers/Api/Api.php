<?php

namespace App\Controllers\Api;
use CodeIgniter\Controller;
use App\Models\ClientsModel;

class Api extends Controller{
    
    public function index() 
    {
        $clients = new ClientsModel();

        $data = [
            'clients' => $clients->getClients()
        ];

        echo view ('api/api', $data);
    }
}