<h1 class="text-3xl font-bold mb-6">A07:2021 - Software and Data Integrity Failures</h1>
<p class="mb-8">Dưới đây là ví dụ về hệ thống không bảo vệ dữ liệu hoặc phần mềm khỏi bị thay đổi trái phép.</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi Toàn Vẹn Phần Mềm và Dữ Liệu Trong Ví Dụ</h2>
<ul class="list-disc ml-5 text-gray-700 mb-4">
    <li><strong>Không kiểm tra bản cập nhật:</strong> Cho phép tải xuống phần mềm không được ký số, dễ bị thay đổi.</li>
    <li><strong>Không xác minh dữ liệu đầu vào:</strong> Dữ liệu từ người dùng có thể bị sửa đổi mà không bị phát hiện.</li>
    <li><strong>Sử dụng mã nguồn không an toàn:</strong> Không kiểm tra tính toàn vẹn của các thư viện hoặc script bên thứ ba.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-4">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Chọn phiên bản 1.0 và tải xuống, kiểm tra xem có thông báo xác minh tính toàn vẹn không (không có).</p>
    <p class="text-gray-700">2. Sử dụng công cụ như Wireshark để thay đổi dữ liệu tải xuống trong quá trình truyền.</p>
    <p class="text-gray-700">3. Thử nhập dữ liệu giả mạo vào ứng dụng (VD: sửa giá sản phẩm trong giỏ hàng).</p>
    <p class="text-gray-700">4. Cách khắc phục: Sử dụng chữ ký số (digital signature), kiểm tra hash (MD5/SHA), và xác minh đầu vào.</p>
</div>