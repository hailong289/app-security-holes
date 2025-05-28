<h1 class="text-2xl font-bold mb-4">A04:2021 - Insecure Design</h1>
<p class="mb-4">Dưới đây là ví dụ về thiết kế hệ thống thiếu bảo mật từ đầu, dẫn đến lỗ hổng dễ bị khai thác.</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold text-gray-800 mb-2">Các Lỗi Thiết Kế Không An Toàn Trong Ví Dụ</h2>
<ul class="list-disc ml-5 text-gray-700 mb-4">
    <li><strong>Không kiểm tra quyền truy cập:</strong> Ai cũng có thể truy cập trang admin mà không cần xác thực.</li>
    <li><strong>Không giới hạn đầu vào:</strong> Người dùng có thể nhập dữ liệu quá dài hoặc không hợp lệ mà không bị chặn.</li>
    <li><strong>Thiếu kiểm tra vai trò:</strong> Không phân biệt quyền giữa người dùng thường và admin.</li>
</ul>
<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Đăng ký với tên người dùng bất kỳ (ví dụ: "testuser").</p>
    <p class="text-gray-700">2. Thử truy cập trực tiếp vào <a href="#" class="text-blue-500 hover:underline"><?=getBaseUrl()?>/admin</a> mà không đăng nhập (nếu có).</p>
    <p class="text-gray-700">3. Nhập dữ liệu dài bất thường (VD: 1000 ký tự) vào trường username để kiểm tra giới hạn.</p>
    <p class="text-gray-700">4. Cách khắc phục: Thêm kiểm tra quyền truy cập, giới hạn đầu vào, và xác thực vai trò người dùng.</p>
</div>

<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <!-- Kết quả giả lập -->
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="<?=url('/register')?>" class="w-full h-[500px]"></iframe>
        </div>
    </div>
</div>