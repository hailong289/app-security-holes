<?php

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\User;

/**
 *  2. Cryptographic Failures
 */
class CryptographicFailuresController extends BaseController
{
    protected User $user;
    public function __construct()
    {
        $this->user = $this->useModel('user');
    }
    public function index()
    {
        return $this->view('layout', [
            'page' => 'cryptographic_failures',
            'menu' => menu(),
        ]);
    }

    public function registerForm()
    {
        return $this->view('pages.register', [
            'menu' => menu(),
            'page' => 'register',
        ]);
    }

    // Hàm lưu thông tin người dùng mà không mã hóa mật khẩu
    public function register()
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $this->user->addUser([
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'phone' => rand(1000000000, 9999999999), // Số điện thoại giả
            'date_of_birth' => date('Y-m-d'),
            'gender' => rand(1, 2), // Giới tính ngẫu nhiên
            'role' => 0, // Mặc định là người dùng
        ]);
        if (!$status) {
            return $this->view('pages.register', [
                'menu' => menu(),
                'page' => 'register',
                'error' => 'Đăng ký không thành công. Vui lòng thử lại.',
            ]);
        }
        return $this->redirect('/login');
    }

}