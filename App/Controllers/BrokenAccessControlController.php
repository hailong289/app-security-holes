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
        $url = '/login';
        if (!empty($_GET['redirect'])) {
            $url .= '?redirect=' . $_GET['redirect'];
        }
        return $this->view('pages.login', [
            'url' => $url,
        ]);
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
            if (empty($_GET['redirect'])) {

                return $this->redirect('/post');
            }
            return $this->redirect($_GET['redirect']);
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
            'message' => 'Bạn đã truy cập vào trang quản trị với quyền: ' . ($this->isAdmin() ? 'Admin' : 'Người dùng'),
            'status' => $this->isAdmin() ? 'success' : 'error',
            'users' => $this->users->getlist(),
            'checkAdmin' => $this->isAdmin(),
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
            'checkAdmin' => $this->isAdmin(),
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

    public function logout()
    {
        session()->remove('user');
        return $this->redirect('/login');
    }
}