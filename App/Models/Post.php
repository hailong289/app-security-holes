<?php

namespace App\Models;

use App\Database\DB;

class Post
{
    public DB $db;
    protected $tb = 'posts';
    protected $field = [
        'post_id',
        'user_id',
        'title',
        'content',
        'status',
        'views',
        'likes',
        'category',
        'created_at',
        'updated_at',

    ];

    public function getlist()
    {
        return $this->db->query("SELECT * FROM $this->tb")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getPostById($id)
    {
        return $this->db->select($this->tb, $this->field, 'status ="published" and post_id =' . $id );
    }
    public function getPostByPublishedAll()
    {
        return $this->db->select($this->tb, $this->field, 'status ="published"');
    }
}
