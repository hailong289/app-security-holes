<h1 class="text-3xl font-bold mb-6">A09:2021 - Security Logging and Monitoring Failures</h1>
<p class="mb-8">Dưới đây là ví dụ về hệ thống không ghi lại hoặc giám sát hoạt động, khiến các cuộc tấn công không được phát hiện.</p>
<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi Ghi Nhật Ký và Giám Sát Bảo Mật Trong Ví Dụ</h2>
<ul class="list-disc ml-5 mb-4">
    <li><strong>Không ghi lại đăng nhập thất bại:</strong> Hệ thống không lưu thông tin khi người dùng đăng nhập sai.</li>
    <li><strong>Thiếu cảnh báo:</strong> Không có thông báo cho quản trị viên khi có hành vi bất thường (VD: nhiều lần đăng nhập sai).</li>
    <li><strong>Nhật ký không đầy đủ:</strong> Không ghi lại thông tin quan trọng như IP, thời gian, hoặc hành động của người dùng.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Thử đăng nhập nhiều lần với mật khẩu sai (VD: username 'testuser', password 'wrongpass').</p>
    <p class="text-gray-700">2. Kiểm tra xem hệ thống có ghi lại các lần đăng nhập thất bại không (thường không có).</p>
    <p class="text-gray-700">3. Thử tấn công brute force (dùng công cụ như Hydra) và xem có cảnh báo nào không.</p>
    <p class="text-gray-700">4. Cách khắc phục: Ghi lại tất cả đăng nhập thất bại, thêm cảnh báo, và lưu trữ nhật ký đầy đủ (IP, thời gian, hành động).</p>
</div>