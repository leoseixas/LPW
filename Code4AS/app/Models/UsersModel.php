<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';

    public function getUser($userName)
    {
        return $this-> asArray() -> where('login',$userName)->first();
    }
}