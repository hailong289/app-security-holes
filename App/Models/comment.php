<?php

namespace App\Models;

use App\Database\DB;

class User
{
    public DB $db;
    protected $tb = 'comments';
    protected $field = [
        'id',
        'parent_id',//ref comment
        'left',//0
        'right',//0
        'content',
        'created_at',
        'updated_at',
        'created_by',//ref users

    ];

    public function getlist()
    {
        return $this->db->query("SELECT * FROM $this->tb")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
}