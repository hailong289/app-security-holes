<?php

namespace App\Models;
use App\Database\DB;

class User
{
    public DB $db;
    protected $tb = 'users';
    protected  $field = [
        'id',
        'name',
        'username',
        'password',
        'phone',
        'date_of_birth',
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

    public function loginUser($username, $password)
    {
        $stmt = $this->db->query("SELECT * FROM $this->tb WHERE username = '$username' AND password = '$password'");
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getNameById($id){
        return $this->db->select("SELECT name FROM $this->tb WHERE id = '$id'");
    }
    public function addUser($data)
    {
        return $this->db->insert($this->tb, $data);
    }
    public function getUserById($id)
    {
        return $this->db->select($this->tb, $this->field, 'id =' . $id);
    }
    public function updateUser($id, $data)
    {
        return $this->db->update($this->tb, $data, 'id = ' . $id);
    }
    public function deleteUser($id)
    {
        return $this->db->delete($this->tb, 'id = ' . $id);
    }
}