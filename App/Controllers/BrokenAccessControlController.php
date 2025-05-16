<?php

namespace App\Controllers;
use App\Core\BaseController;

/**
 *  1. Broken Access Control
 */
class BrokenAccessControlController extends BaseController
{
    protected $menu;

    public function __construct()
    {
        $this->menu = menu();
    }

    public function index($message = null)
    {
        $path = $_GET['url'];
        return $this->view('layout', [
            'page' => 'broken_access_control',
            'menu' => $this->menu,
            'path' => $path,
            'message' => $message
        ]);
    }

    public function loginForm()
    {

        return $this->view('testcase.broken_access_control.login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kiểm tra thông tin đăng nhập
        if ($username === 'admin' && $password === 'admin') {
            // Đăng nhập thành công
            setcookie('userid', 1, time() + 3600, '/');
            return $this->index('Đăng nhập thành công');
        } else {
            return $this->index('Đăng nhập thất bại');
        }
    }
}