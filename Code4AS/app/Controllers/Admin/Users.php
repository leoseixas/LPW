<?php

namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Models\UsersModel;

class Users extends Controller{
    
    public function index()
    {
        
    }

    public function validateLogin()
    {
        $users = new UsersModel;

        $userName = $this->request->getVar('login');
        $userPass = $this->request->getVar('pass');

        if($user = $users->getUser($userName)):
            if($userPass == $user['senha']):
                $session = \Config\Services::session();
                $session -> set('user', $user);
                return redirect() -> to(base_url('admin'));
            else:
                return redirect() -> to(base_url('admin'));
            endif;
            
        else:
            return redirect() -> to(base_url('admin'));
        endif;
    }
}