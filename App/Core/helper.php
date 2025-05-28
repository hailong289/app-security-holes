<?php
if (!function_exists('getBaseUrl')) {
    function getBaseUrl()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . '://' . $host;
    }
}

if (!function_exists('url')) {
     function url($path, $params = [])
     {
         $queryString = http_build_query($params);
         if (!empty($queryString)) {
             $path .= '?' . $queryString;
         }
         return getBaseUrl() . $path;
     }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        header("Location: $path");
        exit();
    }
}

if (!function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die();
    }
}

if (!function_exists('view')) {
    function view($view, $data = [])
    {
        extract($data);
        require_once APP_PATH . "/Views/$view.php";
    }
}

if (!function_exists('viewPath')) {
    function viewPath($view)
    {
        return APP_PATH . 'App/Views/' . str_replace('.', '/', $view) . '.php';
    }
}

if (!function_exists('urlTest')) {
    function urlTest($path, $params = [])
    {
        $queryString = http_build_query($params);
        if (!empty($queryString)) {
            $path .= '?' . $queryString;
        }
        return getBaseUrl() . '/test' . $path;
    }
}

if (!function_exists('includeView')) {
    function includeView($name)
    {
        $viewPath = viewPath($name);
        require_once $viewPath;
    }
}

if (!function_exists('session')) {
    function session()
    {
        return new class {
            public function set($key, $value)
            {
                $_SESSION[$key] = $value;
            }

            public function get($key)
            {
                if (isset($_SESSION['flash'][$key])) {
                    $value = $_SESSION['flash'][$key];
                    unset($_SESSION['flash'][$key]);
                    return $value;
                }
                return $_SESSION[$key] ?? null;
            }

            public function has($key)
            {
                return isset($_SESSION[$key]);
            }

            public function remove($key)
            {
                unset($_SESSION[$key]);
            }

            public function all()
            {
                return $_SESSION;
            }

            public function flash($key, $value)
            {
                $_SESSION['flash'][$key] = $value;
            }
        };
    }
}

if (!function_exists('cookie')) {
    function cookie()
    {
        return new class {

            public function set($name, $value, $expire = 3600)
            {
                setcookie($name, $value, time() + $expire, "/");
            }

            public function get($name)
            {
                return $_COOKIE[$name] ?? null;
            }

            public function has($name)
            {
                return isset($_COOKIE[$name]);
            }

            public function remove($name)
            {
                setcookie($name, '', time() - 3600, "/");
            }

            public function all()
            {
                return $_COOKIE;
            }

            public function flash($name, $value)
            {
                setcookie($name, $value, time() + 5, "/"); // thời gian tồn tại 5 giây
            }
        };
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        if (session()->has('csrf_token')) {
            return session()->get('csrf_token');
        }
        $token = bin2hex(random_bytes(32));
        session()->set('csrf_token', $token);
        return $token;
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
    }
}



if (!function_exists('config')) {
    function config($key, $default = null){
        if (isset($_ENV[$key])) {
            return $_ENV[$key] ?? $default;
        }

        if (getenv($key)) {
            return getenv($key);
        }

        return $default;
    }
}


if (!function_exists('activeRoute')) {
    function activeRoute($path)
    {
        return str_contains(getBaseUrl().$_SERVER['REQUEST_URI'], $path);
    }
}

if (!function_exists('menu')) {
    function menu()
    {
        return [
            [
                'title' => '1. Broken Access Control',
                'icon' => 'fas fa-lock',
                'description' => 'Cho phép người dùng truy cập trái phép vào dữ liệu hoặc chức năng, ví dụ: xem dữ liệu của người dùng khác hoặc thực hiện hành động vượt quyền.',
                'link' => url('/test/broken-access-control'),
            ],
            // tạo trang thông tin profile có thể xem thông tin của các profile khác chỉ cần thay đổi cookie chứa userid
            [
                'title' => '2. Cryptographic Failures',
                'icon' => 'fas fa-key',
                'description' => 'Lỗi liên quan đến mã hóa yếu hoặc không mã hóa dữ liệu nhạy cảm, dẫn đến rò rỉ thông tin như mật khẩu hoặc dữ liệu thẻ tín dụng.',
                'link' => url('/test/cryptographic-failures'),
            ],
            // mật khẩu không được mã hoá trong database, không dùng https
            [
                'title' => '3. Injection',
                'icon' => 'fas fa-syringe',
                'description' => 'Tấn công chèn mã độc (SQL, XSS, v.v.) vào hệ thống, cho phép kẻ tấn công thực thi lệnh trái phép hoặc đánh cắp dữ liệu.',
                'link' => url('/test/injection'),
            ],
            // SQL Injection, XSS
            [
                'title' => '4. Insecure Design',
                'icon' => 'fas fa-drafting-compass',
                'description' => 'Thiếu các biện pháp bảo mật trong thiết kế hệ thống, dẫn đến lỗ hổng không thể khắc phục chỉ bằng cấu hình hoặc vá lỗi.',
                'link' => url('/test/insecure-design'),
            ],
            // upload file không kiểm tra định dạng, không kiểm tra kích thước file, có thể chạy mã độc
            [
                'title' => '5. Security Misconfiguration',
                'icon' => 'fas fa-cog',
                'description' => 'Cấu hình sai, ví dụ: để lộ thông tin nhạy cảm, sử dụng tài khoản mặc định, hoặc không tắt các tính năng không cần thiết.',
                'link' => url('/test/security-misconfiguration'),

            ],
            // hiện thị lỗi  của php lên websile , không dùng https
            [
                'title' => '6. Vulnerable and Outdated Components',
                'icon' => 'fas fa-exclamation-triangle',
                'description' => 'Sử dụng thư viện, framework hoặc phần mềm lỗi thời có lỗ hổng đã biết, dễ bị khai thác bởi kẻ tấn công.',
                'link' => url('/test/vulnerable-and-outdated-components'),
            ],
            [
                'title' => '7. Identification and Authentication Failures',
                'icon' => 'fas fa-user-lock',
                'description' => 'Lỗi xác thực và nhận diện người dùng, ví dụ: sử dụng mật khẩu yếu hoặc không bảo vệ tài khoản bằng xác thực hai yếu tố.',
                'link' => url('/test/identification-and-authentication-failures'),
            ],
            // không khoá tài khoản sau nhiều lần đăng nhập sai (dùng tool dò mật khẩu), không dùng xác thực 2 yếu tố
            [
                'title' => '8. Software and Data Integrity Failures',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Thiếu các biện pháp bảo vệ dữ liệu và phần mềm khỏi việc thay đổi trái phép, ví dụ: không kiểm tra tính toàn vẹn của dữ liệu tải xuống.',
                'link' => url('/test/software-and-data-integrity-failures'),
            ],
            // do không dùng https nên bắt gói tin mạng có thể thay đổi nội dung của gói tin dùng  Wireshark  để bắt gói tin ( dùng tạo wifi host để truy cập và bắt gói tin )
            [
                'title' => '9. Security Logging and Monitoring Failures',
                'icon' => 'fas fa-eye',
                'description' => 'Thiếu ghi lại và giám sát các hoạt động bảo mật, dẫn đến việc không phát hiện kịp thời các cuộc tấn công hoặc sự cố bảo mật.',
                'link' => url('/test/security-logging-and-monitoring-failures'),
            ],
            // không ghi lại nhật ký truy cập, không có hệ thống cảnh báo khi có hành vi bất thường
            [
                'title' => '10. Server-Side Request Forgery (SSRF)',
                'icon' => 'fas fa-server',
                'description' => 'Lỗ hổng cho phép kẻ tấn công gửi yêu cầu đến máy chủ nội bộ từ xa, có thể dẫn đến rò rỉ thông tin nhạy cảm.',
                'link' => url('/test/server-side-request-forgery'),
            ]
        ];
    }
}