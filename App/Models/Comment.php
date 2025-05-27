<?php

namespace App\Models;

use App\Database\DB;

class Comment
{
    public DB $db;
    protected $tb = 'comments';
    protected $field = [
        'comment_id',
        'post_id',
        'user_id',
        'content',
        'created_at',


    ];

    public function getlist()
    {
        return $this->db->query("SELECT * FROM $this->tb")
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCommentByPostId($postId)
    {
        return $this->db->select($this->tb, $this->field, 'post_id =' . $postId);
    }

    public function addCommentByPostId($postId, $userId, $content)
    {
        $data = [
            'post_id' => $postId,
            'user_id' => $userId,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $this->db->insert($this->tb, $data);
    }

    public function deleteCommentById($commentId, $postId, $userId)
    {
        return $this->db->delete($this->tb, 'comment_id =' . $commentId . ' and post_id =' . $postId . ' and user_id =' . $userId);

    }

}