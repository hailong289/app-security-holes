<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm người dùng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once 'header_admin.php'; ?>
<div class="mt-2 bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-full max-w-xl">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">🧑‍💻 Thêm người dùng mới</h1>

        <form action="/admin/user" method="POST" class="space-y-4">
            <div>
                <label class="block font-medium mb-1">Họ tên</label>
                <input type="text" name="name" required class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Tên đăng nhập</label>
                <input type="text" name="username" required class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Mật khẩu</label>
                <input type="password" name="password" required class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Số điện thoại</label>
                <input type="text" name="phone" class="w-full p-2 border rounded">
            </div>

            <div>
                <label class="block font-medium mb-1">Ngày sinh</label>
                <input type="date" name="date_of_birth" value="<?=date('Y-m-d'); ?>" class="w-full p-2 border rounded" required>
            </div>

            <div>
                <label class="block font-medium mb-1">Giới tính</label>
                <select name="gender" class="w-full p-2 border rounded">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                    <option value="0">Khác</option>
                </select>
            </div>

            <div>
                <label class="block font-medium mb-1">Vai trò</label>
                <select name="role" class="w-full p-2 border rounded">
                    <option value="0">Người dùng</option>
                    <option value="1">Quản trị viên</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Tạo tài khoản
            </button>
        </form>
    </div>
</div>

</body>
</html>
