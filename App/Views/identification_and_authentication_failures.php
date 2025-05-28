<h1 class="text-3xl font-bold mb-6">A10:2021 - Identification and Authentication Failures</h1>

<p class="mb-8">Dưới đây là ví dụ về hệ thống xác thực yếu, dễ bị tấn công bởi các kỹ thuật như đoán mật khẩu hoặc đánh cắp phiên.</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi Xác Thực và Nhận Dạng Trong Ví Dụ</h2>
<ul class="list-disc ml-5 text-gray-700 mb-4">
    <li><strong>Cho phép mật khẩu yếu:</strong> Không yêu cầu mật khẩu phức tạp (VD: cho phép mật khẩu "123").</li>
    <li><strong>Không khóa tài khoản:</strong> Người dùng có thể thử đăng nhập không giới hạn lần mà không bị khóa.</li>
    <li><strong>Quản lý phiên yếu:</strong> Session ID không được bảo vệ, dễ bị đánh cắp (VD: không dùng HTTPS).</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold text-yellow-800 mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Thử đăng nhập với mật khẩu yếu (VD: username 'user1', password '123').</p>
    <p class="text-gray-700">2. Thử đăng nhập nhiều lần với mật khẩu sai để kiểm tra xem tài khoản có bị khóa không.</p>
    <p class="text-gray-700">3. Sử dụng công cụ như Burp Suite để kiểm tra session ID (nếu không dùng HTTPS, dễ bị đánh cắp).</p>
    <p class="text-gray-700">4. Cách khắc phục: Yêu cầu mật khẩu mạnh, thêm cơ chế khóa tài khoản, và sử dụng HTTPS để bảo vệ phiên.</p>
</div>

<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Kết quả giả lập -->
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="<?=url('/login')?>" class="w-full h-[500px]"></iframe>
        </div>
    </div>
</div>