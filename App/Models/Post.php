<?php

namespace App\Models;

use App\Database\DB;

class User
{
    public DB $db;
    protected $tb = 'posts';
    protected $field = [
        'id',
        'title',
        'summary',
        'image',
        'content',
        'created_at',
        'updated_at',
        'created_by',// ref users
        'start_num'//defaut 5 start

    ];

    public function getlist()
    {
        return $this->db->query("SELECT * FROM $this->tb")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}