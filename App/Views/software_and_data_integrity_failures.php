<h1 class="text-3xl font-bold mb-6">A08:2021 - Software and Data Integrity Failures</h1>
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
    <p class="text-gray-700">1.  Sử dụng Burp Suite để thay đổi dữ liệu tải xuống trong quá trình truyền bằng cách chỉnh sửa yêu cầu POST.</p>
    <p class="text-gray-700">2. Cách khắc phục: Sử dụng chữ ký số (digital signature), kiểm tra hash (MD5/SHA), và xác minh đầu vào.</p>
</div>


<div class="mt-6 w-4/12">
    <form action="<?=url('/test/software-and-data-integrity-failures')?>" method="get">
        <input type="hidden" name="download" value="1">
        <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Tải xuống file
        </button>
    </form>
    <?php if(!empty($message)): ?>
        <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
            <strong class="font-semibold">Kết quả:</strong> <?=$message?>
        </div>
    <?php endif; ?>
</div>