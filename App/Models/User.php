<?php

namespace App\Models;
use App\Database\DB;

class User
{
    public DB $db;
    protected $tb = 'user';
    protected  $field = [
        'name',
        'username',
        'password',
        'email',
        'phone',
        'birth_of_date',
        'gender',
        'role', // 1 => admin, 0 => user
        'created_at',
        'updated_at',
    ];

    public function getlist()
    {
       return $this->db->query("SELECT * FROM $this->tb")
           ->fetchAll(\PDO::FETCH_ASSOC);
    }
}