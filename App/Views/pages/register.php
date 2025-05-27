<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Người Dùng - Lỗi Mã Hóa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">
<div class="w-full max-w-md m-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800  text-center mb-6">Đăng ký tài khoản</h2>

    <!-- Form đăng ký -->
    <form id="registerForm" method="POST" action="<?= url('/register') ?>" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Họ và tên</label>
            <input type="text" id="username" name="name" required class="w-full p-2 border rounded focus:outline-none focus:ring-2">
        </div>
        <div class="mb-4">
            <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Tên đăng nhập</label>
            <input type="text" id="username" name="username" required class="w-full p-2 border rounded focus:outline-none focus:ring-2">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded focus:outline-none focus:ring-2">
        </div>
        <div>
            <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Đăng ký
            </button>
        </div>
    </form>

    <!-- Phản hồi từ PHP -->
    <div id="response" class="mt-4 text-center"></div>
</div>
</body>
</html>