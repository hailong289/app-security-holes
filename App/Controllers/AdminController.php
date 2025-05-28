<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends BaseController
{
    protected $menu;
    protected User $users;
    protected Post $posts;
    protected Comment $comments;

    public function __construct()
    {
        $this->menu = menu();
        $this->users = $this->useModel('user');
        $this->posts = $this->useModel('post');
        $this->comments = $this->useModel('comment');
    }

    public function addUser()
    {
        return $this->view('pages.admin_user_add', [
                'page' => 'add_user',
                'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),

            ]);

//        if ($this->isAdmin()) {
//            return $this->view('pages.admin_user_add', [
//                'page' => 'add_user',
//                'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
//
//            ]);
//        } else {
//            return $this->view('pages.404', [
//                'menu' => $this->menu,
//                'message' => 'Bạn không có quyền truy cập vào trang này.',
//            ]);
//        }
    }

    public function addUserForm()
    {

        $data = [
            'name' => $_POST['name'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'phone' => $_POST['phone'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
            'role' => $_POST['role'],
        ];
        $this->users->addUser($data);
        return $this->redirect('/admin');

    }

    public function editUser()
    {
        $userId = $_GET['id'];
        $user = $this->users->getUserById($userId);
        return $this->view('pages.admin_user_edit', [
            'page' => 'edit_user',
            'user' => $user[0],
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),

        ]);
//        if ($this->isAdmin()) {
//            return $this->view('pages.admin_user_edit', [
//                'page' => 'edit_user',
//                'user' => $user[0],
//                'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
//
//            ]);
//        } else {
//            return $this->view('pages.404', [
//                'menu' => $this->menu,
//                'message' => 'Bạn không có quyền truy cập vào trang này.',
//            ]);
//        }
    }

    public function editUserForm()
    {
        $userId= $_POST['id'];

        $data = [
            'name' => $_POST['name'],
            'username' => $_POST['username'],

            'phone' => $_POST['phone'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
            'role' => $_POST['role'],
        ];
        if(!empty($_POST['password'])) {
            $data['password'] = $_POST['password'];
        }
        $this->users->updateUser($userId,$data);
        return $this->redirect('/admin');

    }
    public function deleteUserForm(){
        $userId = $_POST['id'];
        $this->users->deleteUser($userId);
        return $this->redirect('/admin');
    }

    public function isAdmin()
    {
        $role = session()->get('user')['role'] ?? 0;
        return $role === 1;
    }

    public function addPost()
    {

        $categories = [
            'Công nghệ',
            'AI & Machine Learning',
            'An toàn thông tin',
            'Lập trình Web',
            'Mobile App',
            'DevOps & Cloud',
            'Thiết bị phần cứng',
            'Khởi nghiệp công nghệ'
        ];
        return $this->view('pages.admin_post_add', [
            'page' => 'add_post',
            'categories' => $categories,
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),

        ]);
//        if ($this->isAdmin()) {
//            return $this->view('pages.admin_post_add', [
//                'page' => 'add_post',
//                'categories' => $categories,
//                'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
//
//            ]);
//        } else {
//            return $this->view('pages.404', [
//                'menu' => $this->menu,
//                'message' => 'Bạn không có quyền truy cập vào trang này.',
//            ]);
//        }
    }

    public function addPostForm()
    {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category' => $_POST['category'],
            'status' => $_POST['status'],
            'user_id' => $_POST['user_id'],
        ];

        // Xử lý upload thumbnail
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["thumbnail"]["name"]);
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
            $data['thumbnail'] = $targetFile;
        }

        $this->posts->addPost($data);
        return $this->redirect('/admin/posts');
    }

    function editPost()
    {
        $postId = $_GET['id'];
        $post = $this->posts->getPostById($postId);
        $categories = [
            'Công nghệ',
            'AI & Machine Learning',
            'An toàn thông tin',
            'Lập trình Web',
            'Mobile App',
            'DevOps & Cloud',
            'Thiết bị phần cứng',
            'Khởi nghiệp công nghệ'
        ];
        return $this->view('pages.admin_post_update', [
            'page' => 'edit_post',
            'post' => $post[0],
            'categories' => $categories,
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),

        ]);
//        if ($this->isAdmin()) {
//            return $this->view('pages.admin_post_update', [
//                'page' => 'edit_post',
//                'post' => $post[0],
//                'categories' => $categories,
//                'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
//
//            ]);
//        } else {
//            return $this->view('pages.404', [
//                'menu' => $this->menu,
//                'message' => 'Bạn không có quyền truy cập vào trang này.',
//            ]);
//        }
    }

    public function editPostForm()
    {
        $postId = $_POST['post_id'];
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category' => $_POST['category'],
            'status' => $_POST['status'],
            'user_id' => $_POST['user_id'],
        ];

        // Xử lý upload thumbnail
        if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES["thumbnail"]["name"]);
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFile);
            $data['thumbnail'] = $targetFile;
        }

        $this->posts->updatePost($postId, $data);
        return $this->redirect('/admin/posts');
    }

    public function deletePostForm()
    {
        $postId = $_POST['post_id'];
        $this->posts->deletePost($postId);
        return $this->redirect('/admin/posts');
    }


}