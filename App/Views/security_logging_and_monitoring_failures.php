<h1 class="text-3xl font-bold mb-6">A09:2021 - Security Logging and Monitoring Failures</h1>
<p class="mb-8">Dưới đây là ví dụ về hệ thống không ghi lại hoặc giám sát hoạt động, khiến các cuộc tấn công không được phát hiện.</p>
<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi Ghi Nhật Ký và Giám Sát Bảo Mật Trong Ví Dụ</h2>
<ul class="list-disc ml-5 mb-4">
    <li><strong>Không ghi lại đăng nhập thất bại:</strong> Hệ thống không lưu thông tin khi người dùng đăng nhập sai.</li>
    <li><strong>Spams đăng ký tài khoản:</strong> Hệ thống không không hạn chế số lượng đăng ký tài khoản trong một khoản thời gian ngắn.</li>

    <li><strong>Thiếu cảnh báo:</strong> Không có thông báo cho quản trị viên khi có hành vi bất thường (VD: nhiều lần đăng nhập sai).</li>
    <li><strong>Nhật ký không đầy đủ:</strong> Không ghi lại thông tin quan trọng như IP, thời gian, hoặc hành động của người dùng.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Thử đăng nhập nhiều lần với mật khẩu sai (VD: username 'testuser', password 'wrongpass').</p>
    <p class="text-gray-700">2. Kiểm tra xem hệ thống có ghi lại các lần đăng nhập thất bại không (thường không có).</p>
    <p class="text-gray-700">3. Kiểm tra khi dùng các tool để spams quá trình đăng ký liên tục trong khoảng thời gian ví dụ trong 1 phút thì không có thông báo, hạn chế hoặc chặn ip .</p>

    <p class="text-gray-700">4. Thử tấn công brute force (dùng công cụ như Hydra) và xem có cảnh báo nào không.</p>
    <p class="text-gray-700">5. Cách khắc phục: Ghi lại tất cả đăng nhập thất bại, thêm cảnh báo, và lưu trữ nhật ký đầy đủ (IP, thời gian, hành động).</p>
</div>
<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Kết quả giả lập -->
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="<?=getBaseUrl()?>/register" class="w-full h-[500px]"></iframe>
        </div>
    </div>

</div>
<div>
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Kết quả giả lập -->
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="https://1drv.ms/v/c/d6c01640de2c1229/IQRpfH1TlARVTY8emfELJY9gAQx5PK2XBA089vflgx03kpc" width="2052" height="1080" frameborder="0" scrolling="no" allowfullscreen></iframe>
        </div>
    </div>

</div>