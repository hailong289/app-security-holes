<section class="mb-10">
    <h1 class="text-2xl font-semibold mb-2">🔥 A03:2021 - SQL Injection là gì?</h1>
    <p class="mb-2">SQL Injection (SQLi) là một lỗ hổng bảo mật cho phép kẻ tấn công chèn mã SQL độc hại vào truy vấn cơ sở dữ liệu của ứng dụng. Điều này có thể dẫn đến việc rò rỉ, sửa đổi hoặc xóa dữ liệu trái phép.</p>
    <p class="mb-2">Ví dụ:</p>
    <pre class="bg-gray-200 p-2 rounded overflow-auto text-sm"><code>Username: ' OR '1'='1
Password: anything</code></pre>
    <p class="mb-2">Nếu hệ thống không xử lý đúng đầu vào, truy vấn có thể trở thành:</p>
    <pre class="bg-gray-200 p-2 rounded overflow-auto text-sm"><code>SELECT * FROM users WHERE username = '' OR '1'='1' AND password = 'anything';</code></pre>
    <p>Kết quả: Đăng nhập thành công mà không cần tài khoản hợp lệ.</p>
</section>

<h3 class="text-3xl font-bold mb-6 text-blue-700">🧪 SQL Injection Test Script</h3>

<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-2">🎯 1. System Info</h2>
    <ul class="list-disc list-inside">
        <li>Login Page: <code><?= getBaseUrl() ?>/login</code></li>
        <li>Admin Posts: <code><?= getBaseUrl() ?>/admin/posts</code></li>
        <li>API: GET, POST, PUT on /admin/posts</li>
    </ul>
</section>

<!--<section class="mb-10">-->
<!--    <h2 class="text-2xl font-semibold mb-2">🧪 2. Test: Login Form</h2>-->
<!--    <div class="overflow-auto">-->
<!--        <table class="table-auto w-full border border-gray-300 text-sm">-->
<!--            <thead class="bg-blue-100">-->
<!--                <tr>-->
<!--                    <th class="border px-4 py-2 text-left">Step</th>-->
<!--                    <th class="border px-4 py-2 text-left">Action</th>-->
<!--                    <th class="border px-4 py-2 text-left">Expected Result</th>-->
<!--                    <th class="border px-4 py-2 text-left">Actual Result</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                <tr>-->
<!--                    <td class="border px-4 py-2">1</td>-->
<!--                    <td class="border px-4 py-2">Visit /login</td>-->
<!--                    <td class="border px-4 py-2">Login form appears</td>-->
<!--                    <td class="border px-4 py-2">✅</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="border px-4 py-2">2</td>-->
<!--                    <td class="border px-4 py-2">Input: <code>' OR '1'='1</code> / any password</td>-->
<!--                    <td class="border px-4 py-2">Login bypasses</td>-->
<!--                    <td class="border px-4 py-2">❓</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="border px-4 py-2">3</td>-->
<!--                    <td class="border px-4 py-2">Input: <code>admin' --</code></td>-->
<!--                    <td class="border px-4 py-2">Login bypasses</td>-->
<!--                    <td class="border px-4 py-2">❓</td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td class="border px-4 py-2">4</td>-->
<!--                    <td class="border px-4 py-2">Check for SQL error messages</td>-->
<!--                    <td class="border px-4 py-2">Errors shown</td>-->
<!--                    <td class="border px-4 py-2">❓</td>-->
<!--                </tr>-->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!---->
<!--</section>-->


<section class="mb-10">
    <h2 class="text-2xl font-semibold mb-2">🧪 2. Test: Admin Post Queries</h2>
    <div class="overflow-auto">
        <table class="table-auto w-full border border-gray-300 text-sm">
            <thead class="bg-blue-100">
                <tr>
                    <th class="border px-4 py-2">Step</th>
                    <th class="border px-4 py-2">Action</th>
                    <th class="border px-4 py-2">Expected Result</th>
                    <th class="border px-4 py-2">Actual Result</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">GET <code>/admin/posts?id=1</code></td>
                    <td class="border px-4 py-2">Post appears</td>
                    <td class="border px-4 py-2">✅</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">Try <code>id=1'</code></td>
                    <td class="border px-4 py-2">Lỗi SQL (nếu dễ bị tấn công)</td>
                    <td class="border px-4 py-2">❓</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">3</td>
                    <td class="border px-4 py-2">Try <code>1 and 1!=1</code></td>
                    <td class="border px-4 py-2">hiện thị trang không tìm thấy bài viết</td>
                    <td class="border px-4 py-2">❓</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">Thử copy đoạn code sau vào form id:
                        <code class="bg-gray-300">1 and 1!=1 UNION SELECT 11,11,11,DATABASE(),table_name,11,VERSION(),11,NOW(),NOW(),11 FROM information_schema.tables WHERE table_schema = database() LIMIT 1,1
                        </code>
                    </td>
                    <td class="border px-4 py-2">Thông tin cơ sở dữ liệu được tìm thấy bao gồm tên bảng làm tên bài đăng, phiên bản cơ sở dữ liệu làm ID người dùng và tên cơ sở dữ liệu làm nội dung bài đăng.</td>
                    <td class="border px-4 py-2">❓</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<section>
    <form method="get" class="w-full" action="<?= url('/test/injection') ?>">
        <span class="bg-gray-300 p-2 rounded-s-md"><?= getBaseUrl() ?>/?id=</span>
        <input type="text" class="py-2 rounded-e-md " placeholder="nhập id bài viết" id="postId"
            name="url"
            value="<?= !empty($_GET['url']) ? $_GET['url'] : '' ?>" />

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" id="getPostBtn"> chuyển trang</button>
    </form>
</section>
<section>
    <?php if (!empty($path)): ?>
        <div class="mt-4 p-4 rounded-md flex items-center">
            <iframe src="<?= url($path) ?>" class="w-full h-[500px]"></iframe>
        </div>
    <?php endif; ?>
</section>
<section>
    <h2 class="text-2xl font-semibold mb-2">🛡️ Khuyến nghị khắc phục</h2>
    <ul class="list-disc list-inside">
        <li>Sử dụng truy vấn chuẩn hóa (prepared statements) hoặc truy vấn tham số hóa (parameterized queries)</li>
        <li>Escape và kiểm tra hợp lệ tất cả dữ liệu đầu vào từ người dùng</li>
        <li>Sử dụng các framework ORM (ví dụ: Sequelize, Eloquent)</li>
        <li>Thiết lập quyền truy cập cơ sở dữ liệu theo nguyên tắc tối thiểu (least privilege)</li>
    </ul>
</section>