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
        'thumbnail',
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
    public function getPostByIdPublish($id)
    {
        return $this->db->select($this->tb, $this->field, 'status ="published" and post_id =' . $id);
    }
    public function getPostById($id)
    {
        echo 'id: ' . $id;
        return $this->db->select($this->tb, $this->field, 'post_id =' . $id);
    }

    public function getPostByPublishedAll()
    {
        return $this->db->select($this->tb, $this->field, 'status ="published"');
    }

    public function addPost($data)
    {
        return $this->db->insert($this->tb, $data);
    }

    public function updatePost($id, $data)
    {
        return $this->db->update($this->tb, $data, 'post_id = ' . $id);
    }
    public function deletePost($id)
    {
        return $this->db->delete($this->tb, 'post_id = ' . $id);
    }
}
