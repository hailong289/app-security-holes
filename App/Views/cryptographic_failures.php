<h1 class="text-2xl font-bold mb-4">A02:2021 - Cryptographic Failures</h1>
<p class="mb-4">Lỗi mã hóa xảy ra khi dữ liệu nhạy cảm không được bảo vệ đúng cách, dẫn đến nguy cơ bị lộ thông tin quan trọng như mật khẩu, thẻ tín dụng, hoặc dữ liệu cá nhân.</p>
<h2 class="text-xl font-semibold text-gray-800 mb-2">Các Lỗi Mã Hóa Trong Ví Dụ</h2>
<ul class="list-disc ml-5 text-gray-700 mb-6">
    <li><strong>Không mã hóa mật khẩu:</strong> Mật khẩu được lưu dưới dạng văn bản thuần (plaintext), dễ bị đọc trực tiếp nếu cơ sở dữ liệu bị xâm phạm.</li>
    <li><strong>Không bảo vệ dữ liệu nhạy cảm:</strong> Không có cơ chế bảo vệ như băm (hashing) hay mã hóa, dẫn đến nguy cơ lộ thông tin.</li>
    <li><strong>Không sử dụng muối (salt):</strong> Vì không băm mật khẩu, nên cũng không có muối để tăng cường bảo mật.</li>
</ul>

<h2 class="text-xl font-semibold text-gray-800 mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Đăng ký với mật khẩu bất kỳ (ví dụ: "mypassword123").</p>
    <p class="text-gray-700">2. Nếu hacker truy cập được cơ sở dữ liệu, họ sẽ thấy mật khẩu gốc (plaintext) mà không cần giải mã.</p>
    <p class="text-gray-700">3. Cách khắc phục: Sử dụng thuật toán băm mạnh như bcrypt hoặc Argon2 để bảo vệ mật khẩu.</p>
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