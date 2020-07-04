<?php
namespace App\Controllers\Admin;
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

        echo view('admin/templates/Header');
        echo view('admin/clients/list',$data);
        echo view('admin/templates/Footer');
    }

    public function details($id)
    {
        $clients = new ClientsModel(); 

        $data = [
            'client' => $clients->getClients($id)
        ];

        echo view('admin/templates/header');
        echo view('admin/clients/details',$data);
        echo view('admin/templates/footer'); 
    }

    public function insert()
    {
        echo view('admin/templates/header');
        echo view('admin/clients/insert');
        echo view('admin/templates/footer'); 
    }

    public function insertAction()
    {
        $clients = new ClientsModel(); 

        $data =[
            'nome' => $this -> request -> getVar('nome'),
            'email' => $this -> request -> getVar('email'),
            'telefone' => $this -> request -> getVar('telefone'),
            'endereco' => $this -> request -> getVar('endereco')
        ];

        $clients -> insert($data);        
        return redirect()->route('admin/clients');
    }

    public function searchAction($nome)
    {
        $this->output->enable_profiler(true);
        $clients = new ClientsModel(); 

        $data = [
            'title' => 'Lista de Clientes',
            'clients' => $clients->getSearch($nome)
        ];

        echo view('admin/templates/Header');
        echo view('admin/clients/list',$data);
        echo view('admin/templates/Footer');
        
    }

    public function update($id)
    {
        $clients = new ClientsModel(); 

        $data = [ 
            'client' => $clients->getClients($id)
        ];
        echo view('admin/templates/header');
        echo view('admin/clients/update',$data);
        echo view('admin/templates/footer');
    }

    public function updateAction($id)   
    {
        $clients = new ClientsModel();

        $data =[
            'nome' => $this -> request -> getVar('nome'),
            'email' => $this -> request -> getVar('email'),
            'telefone' => $this -> request -> getVar('telefone'),
            'endereco' => $this -> request -> getVar('endereco')
        ];

        $clients -> update($id, $data);
        return redirect()->route('admin/clients'); 
    }

    public function delete($id)
    {
        $clients = new ClientsModel();

        $clients -> delete($id);

        return redirect()->route('admin/clients');
    }
        
    
}
