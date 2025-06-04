<h1 class="text-3xl font-bold mb-6">A10:2021 - Server-Side Request Forgery (SSRF)</h1>
<p class="mb-8">Dưới đây là ví dụ về hệ thống cho phép kẻ tấn công yêu cầu server truy cập tài nguyên nội bộ hoặc bên ngoài.</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi SSRF Trong Ví Dụ</h2>
<ul class="list-disc ml-5 mb-4">
    <li><strong>Không kiểm tra URL đầu vào:</strong> Cho phép người dùng nhập URL bất kỳ mà không lọc.</li>
    <li><strong>Truy cập nội bộ:</strong> Server có thể bị buộc truy cập vào localhost (VD: 127.0.0.1) hoặc mạng nội bộ.</li>
    <li><strong>Thiếu giới hạn:</strong> Không giới hạn các miền hoặc giao thức (http, https, ftp) được phép.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Thử URL bên ngoài như 'http://example.com/secret' để kiểm tra giới hạn miền.</p>
    <p class="text-gray-700">2. Sử dụng công cụ như Burp Suite để sửa đổi URL thành các địa chỉ nhạy cảm</p>
    <p class="text-gray-700">3. Cách khắc phục: Lọc và giới hạn URL hợp lệ, chặn truy cập nội bộ, và sử dụng whitelist.</p>
</div>


<!-- Form giả lập -->
<!--<div class="mt-6">-->
<!--    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>-->
<!--    <div class="bg-white p-6 rounded-md shadow-md">-->
<!--        <div class="mt-4 p-4 rounded-md">-->
<!--            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">-->
<!--                <h2 class="text-xl font-semibold text-gray-800 text-center mb-4">Thử Gửi Yêu Cầu</h2>-->
<!--                <form id="ssrfForm" method="GET" action="--><?php //=url('/test/server-side-request-forgery')?><!--">-->
<!--                    <div class="mb-6">-->
<!--                        <label for="url" class="block text-gray-700 text-sm font-bold mb-2">Nhập URL để kiểm tra</label>-->
<!--                        <input type="text" id="url" name="url" required-->
<!--                                 value="--><?php //=isset($_GET['url']) ? htmlspecialchars($_GET['url']) : ''?><!--"-->
<!--                               class="w-full p-2 border rounded focus:outline-none focus:ring-2"-->
<!--                               placeholder="Thử 'http://example.com/secret'">-->
<!--                    </div>-->
<!--                    <button type="submit"-->
<!--                            class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">-->
<!--                        Gửi yêu cầu-->
<!--                    </button>-->
<!--                </form>-->
<!--                --><?php //if(!empty($message)): ?>
<!--                    <div class="mt-4 p-4 rounded-md bg---><?php //= $status === 'success' ? 'green' : 'red' ?><!---100 text---><?php //= $status === 'success' ? 'green' : 'red' ?><!---700">-->
<!--                        <strong class="font-semibold">Kết quả:</strong> --><?php //=$message?>
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->