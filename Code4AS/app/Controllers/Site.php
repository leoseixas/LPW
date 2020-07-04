<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Site extends Controller{
    
    public function index()
    {
        $this-> view('home');
    }

    public function view($page = 'home')
    {
        echo view('templates/Header');
        echo view('site/'.$page);
        echo view('templates/Footer');
    }

}