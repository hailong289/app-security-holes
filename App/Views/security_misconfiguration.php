<h1 class="text-3xl font-bold mb-6">A05:2021 - Security Misconfiguration</h1>
<p class="mb-8">Dưới đây là ví dụ về cấu hình không an toàn dẫn đến các lỗ hổng bảo mật.</p>
<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold text-gray-800 mb-2">Các Lỗi Cấu Hình Bảo Mật Sai Trong Ví Dụ</h2>
<ul class="list-disc ml-5 text-gray-700 mb-4">
    <li><strong>Để mặc định cấu hình:</strong> Sử dụng thông tin đăng nhập mặc định (VD: admin/admin) cho trang quản trị.</li>
    <li><strong>Để lộ trang lỗi:</strong> Cấu hình sai khiến lộ thông tin server (VD: stack trace).</li>
    <li><strong>Không cập nhật phần mềm:</strong> Sử dụng phiên bản cũ của thư viện hoặc server dễ bị tấn công.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold text-yellow-800 mb-4">Cách Kiểm Tra Lỗi</h2>
<p class="text-gray-700">1. Đăng nhập với thông tin mặc định (username: 'admin', password: 'admin').</p>
<p class="text-gray-700">2. Thử truy cập trực tiếp <a href="<?=getBaseUrl()?>/admin" class="text-blue-500 hover:underline"><?=getBaseUrl()?>/admin</a> mà không cần đăng nhập.</p>
<p class="text-gray-700">3. Kiểm tra trang lỗi (VD: 404, 500) để xem có lộ thông tin server không.</p>
<p class="text-gray-700">4. Cách khắc phục: Thay đổi thông tin mặc định, ẩn trang admin, và cập nhật phần mềm thường xuyên.</p>

<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Kết quả giả lập -->
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="<?=getBaseUrl()?>/admin" class="w-full h-[500px]"></iframe>
        </div>
    </div>
</div>