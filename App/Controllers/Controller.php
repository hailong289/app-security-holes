<?php
namespace App\Controllers;
use App\Core\BaseController;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    protected User $user;

    public function __construct()
    {
        $this->user = $this->useModel('user');
    }

    public function index()
    {
//        $data = $this->user->getlist();
        return $this->view('index', [
            'menu' => $this->menu(),
//            'data' => $data
        ]);
    }

    public function menu()
    {
        return [
            [
                'title' => '1. Broken Access Control',
                'icon' => 'fas fa-lock',
                'description' => 'Cho phép người dùng truy cập trái phép vào dữ liệu hoặc chức năng, ví dụ: xem dữ liệu của người dùng khác hoặc thực hiện hành động vượt quyền.',
                'link' => url('/broken-access-control'),
            ],
            [
                'title' => '2. Cryptographic Failures',
                'icon' => 'fas fa-key',
                'description' => 'Lỗi liên quan đến mã hóa yếu hoặc không mã hóa dữ liệu nhạy cảm, dẫn đến rò rỉ thông tin như mật khẩu hoặc dữ liệu thẻ tín dụng.',
                'link' => url('/cryptographic-failures'),
            ],
            [
                'title' => '3. Injection',
                'icon' => 'fas fa-syringe',
                'description' => 'Tấn công chèn mã độc (SQL, XSS, v.v.) vào hệ thống, cho phép kẻ tấn công thực thi lệnh trái phép hoặc đánh cắp dữ liệu.',
                'link' => url('/injection'),
            ],
            [
                'title' => '4. Insecure Design',
                'icon' => 'fas fa-drafting-compass',
                'description' => 'Thiếu các biện pháp bảo mật trong thiết kế hệ thống, dẫn đến lỗ hổng không thể khắc phục chỉ bằng cấu hình hoặc vá lỗi.',
                'link' => url('/insecure-design'),
            ],
            [
                'title' => '5. Security Misconfiguration',
                'icon' => 'fas fa-cog',
                'description' => 'Cấu hình sai, ví dụ: để lộ thông tin nhạy cảm, sử dụng tài khoản mặc định, hoặc không tắt các tính năng không cần thiết.',
                'link' => url('/security-misconfiguration'),

            ],
            [
                'title' => '6. Vulnerable and Outdated Components',
                'icon' => 'fas fa-exclamation-triangle',
                'description' => 'Sử dụng thư viện, framework hoặc phần mềm lỗi thời có lỗ hổng đã biết, dễ bị khai thác bởi kẻ tấn công.',
                'link' => url('/vulnerable-and-outdated-components'),
            ],
            [
                'title' => '7. Identification and Authentication Failures',
                'icon' => 'fas fa-user-lock',
                'description' => 'Lỗi xác thực và nhận diện người dùng, ví dụ: sử dụng mật khẩu yếu hoặc không bảo vệ tài khoản bằng xác thực hai yếu tố.',
                'link' => url('/identification-and-authentication-failures'),
            ],
            [
                'title' => '8. Software and Data Integrity Failures',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Thiếu các biện pháp bảo vệ dữ liệu và phần mềm khỏi việc thay đổi trái phép, ví dụ: không kiểm tra tính toàn vẹn của dữ liệu tải xuống.',
                'link' => url('/software-and-data-integrity-failures'),
            ],
            [
                'title' => '9. Security Logging and Monitoring Failures',
                'icon' => 'fas fa-eye',
                'description' => 'Thiếu ghi lại và giám sát các hoạt động bảo mật, dẫn đến việc không phát hiện kịp thời các cuộc tấn công hoặc sự cố bảo mật.',
                'link' => url('/security-logging-and-monitoring-failures'),
            ],
            [
                'title' => '10. Server-Side Request Forgery (SSRF)',
                'icon' => 'fas fa-server',
                'description' => 'Lỗ hổng cho phép kẻ tấn công gửi yêu cầu đến máy chủ nội bộ từ xa, có thể dẫn đến rò rỉ thông tin nhạy cảm.',
                'link' => url('/server-side-request-forgery'),
            ]
        ];
    }

    public function componentWithKnownVulnerabilities()
    {
        $request = Request::createFromGlobals();
        return $this->json([
            'Host' => $request->headers->get('host'),
            'Full URL' => $request->getSchemeAndHttpHost() . $request->getRequestUri()
        ]);
    }
}