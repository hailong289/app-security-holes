<h1 class="text-3xl font-bold mb-6">A10:2021 - Server-Side Request Forgery (SSRF)</h1>
<p class="mb-8">
    Lỗ hổng SSRF xảy ra khi máy chủ cho phép kẻ tấn công thao túng các yêu cầu HTTP, dẫn đến việc truy cập trái phép vào các tài nguyên nội bộ hoặc bên ngoài.
</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold mb-2">Các Lỗi SSRF Trong Ví Dụ</h2>
<ul class="list-disc pl-5 mb-4 text-gray-600">
    <li><strong>Thao túng URL localhost:</strong> Một ứng dụng có endpoint <code>url=<?=getBaseUrl()?>/admin</code> có thể để lộ giao diện quản trị nội bộ nếu không được kiểm tra.</li>
    <li><strong>Truy cập file nội bộ:</strong> Sử dụng <code>url=file:///etc/passwd</code> để cố gắng đọc file cấu hình hệ thống Linux từ máy chủ.</li>
</ul>


<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<ol class="list-decimal pl-5 mb-4 text-gray-600">
    <li><strong>Thử địa chỉ:</strong> Gửi <code>url=<?=getBaseUrl()?></code> và kiểm tra phản hồi để thấy dữ liệu nội bộ như trang web mặc định.</li>
    <li><strong>Kiểm tra cổng và file:</strong> Thử <code>url=<?=getIp()?>:3306</code> (MySQL) hoặc <code>url=file:///etc/hosts</code> hoặc <code>url=file:///etc/passwd</code>và ghi nhận kết quả.</li>
    <li><strong>Bỏ qua bộ lọc:</strong> Sử dụng <code>url=<?=getBaseUrl()?>%20@safe.com</code> để vượt qua whitelist đơn giản.</li>
</ol>


<!-- Form giả lập -->
<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <div class="mt-4 p-4 rounded-md">
            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold text-gray-800 text-center mb-4">Thử Gửi Yêu Cầu</h2>
                <form id="ssrfForm" method="GET" action="<?=url('/test/server-side-request-forgery')?>">
                    <div class="mb-6">
                        <label for="url" class="block text-gray-700 text-sm font-bold mb-2">Nhập URL để kiểm tra</label>
                        <input type="text" id="url" name="url" required
                                 value="<?=isset($_GET['url']) ? htmlspecialchars($_GET['url']) : ''?>"
                               class="w-full p-2 border rounded focus:outline-none focus:ring-2"
                               placeholder="Thử '<?=getBaseUrl()?>'">
                    </div>
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Gửi yêu cầu
                    </button>
                </form>
                <?php if(!empty($message)): ?>
                    <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
                        <strong class="font-semibold">Kết quả:</strong> <?=$message?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if(!empty($response)): ?>
            <div class="mt-4 p-4 rounded-md bg-gray-100 text-gray-800">
                <strong class="font-semibold">Nội dung phản hồi:</strong>
                <pre class="whitespace-wrap break-words mt-2"><?=htmlspecialchars($response)?></pre>
            </div>
        <?php endif; ?>
    </div>
</div>