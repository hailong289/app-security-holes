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
            setcookie('isAdmin', 1, time() + 3600, '/');
            return $this->view('testcase.message', [
                'message' => 'Đăng nhập thành công',
                'status' => 'success',
            ]);
        } else {
            return $this->index('testcase.message', [
                'message' => 'Đăng nhập thất bại',
                'status' => 'error',
            ]);
        }
    }

    public function admin()
    {
        if ($_GET['checkAdmin'] == 1) {
            if (empty($_COOKIE['isAdmin'])) {
                return $this->view('testcase.message', [
                    'message' => 'Bạn không có quyền truy cập vào trang này',
                    'status' => 'error',
                ]);
            }
        }

        return $this->view('testcase.message', [
            'message' => 'Bạn đã truy cập vào trang quản trị',
            'status' => 'success',
        ]);
    }
}