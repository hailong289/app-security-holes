<?php

namespace App\Controllers;
use App\Core\BaseController;
use App\Models\User;
use App\Models\Post;

/**
 *  1. Broken Access Control
 */
class BrokenAccessControlController extends BaseController
{
    protected $menu;
    protected User $users;
    protected Post $posts;

    public function __construct()
    {
        $this->menu = menu();
        $this->users = $this->useModel('user');
        $this->posts = $this->useModel('post');
    }

    public function index()
    {
        $path = $_GET['url'] . ($_GET['checkAdmin'] == 1 ? '?checkAdmin=1' : '');
        return $this->view('layout', [
            'page' => 'broken_access_control',
            'menu' => $this->menu,
            'path' => $path
        ]);
    }

    public function loginForm()
    {

        return $this->view('pages.login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = $this->users->loginUser($username, $password);
        // Kiểm tra thông tin đăng nhập
        if ($user) {
            // Đăng nhập thành công
            session()->set('user', $user);
            return $this->view('testcase.message', [
                'message' => 'Đăng nhập thành công',
                'status' => 'success',
            ]);
        } else {
            return $this->view('pages.login', [
                'message' => 'Đăng nhập thất bại',
                'status' => 'error',
            ]);
        }
    }

    public function admin()
    {
        if (!$this->isAdmin() && !empty($_GET['flg_check_admin'])) {
            return $this->forbidden();
        }
        return $this->view('pages.admin', [
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: '. ($this->isAdmin() ? 'Admin' : 'Người dùng'),
            'status' => 'success',
            'users' => $this->users->getlist(),
        ]);
    }

    public function adminPost()
    {
        if (!$this->isAdmin() && !empty($_GET['flg_check_admin'])) {
            return $this->forbidden();
        }
        return $this->view('pages.admin_post', [
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
            'status' => 'success',
            'posts' => $this->posts->getlist(),
        ]);
    }

    public function forbidden()
    {
        return $this->view('pages.403');
    }

    public function isAdmin()
    {
        $role = session()->get('user')['role'] ?? 0;
        return $role === 1;
    }
}