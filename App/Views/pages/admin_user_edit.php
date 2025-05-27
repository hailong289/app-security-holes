<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa người dùng</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-8 rounded shadow-md w-full max-w-xl">
    <h1 class="text-2xl font-bold text-blue-600 mb-6">✏️ Cập nhật người dùng</h1>

    <form action="/admin/user/edit" method="POST" class="space-y-4">

        <input type="hidden" name="id" value="<?= $user['id'] ?>">

        <div>
            <label class="block font-medium mb-1">Họ tên</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
                   class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Tên đăng nhập</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required
                   class="w-full p-2 border rounded">
        </div>

        <!-- Ẩn đổi mật khẩu -->
        <details class="bg-gray-50 border rounded p-4">
            <summary class="cursor-pointer text-blue-600 font-medium">🔒 Thay đổi mật khẩu (nếu cần)</summary>
            <div class="mt-4">
                <input type="password" name="password" placeholder="Nhập mật khẩu mới (nếu đổi)"
                       class="w-full p-2 border rounded">
            </div>
        </details>


        <div>
            <label class="block font-medium mb-1">Số điện thoại</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>"
                   class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Ngày sinh</label>
            <input type="date" name="date_of_birth" value="<?= $user['date_of_birth'] ?>"
                   class="w-full p-2 border rounded">
        </div>

        <div>
            <label class="block font-medium mb-1">Giới tính</label>
            <select name="gender" class="w-full p-2 border rounded">
                <option value="1" <?= $user['gender'] == 1 ? 'selected' : '' ?>>Nam</option>
                <option value="2" <?= $user['gender'] == 2 ? 'selected' : '' ?>>Nữ</option>
                <option value="0" <?= $user['gender'] == 0 ? 'selected' : '' ?>>Khác</option>
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">Vai trò</label>
            <select name="role" class="w-full p-2 border rounded">
                <option value="0" <?= $user['role'] == 0 ? 'selected' : '' ?>>Người dùng</option>
                <option value="1" <?= $user['role'] == 1 ? 'selected' : '' ?>>Quản trị viên</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            ✅ Lưu thay đổi
        </button>
    </form>
</div>

</body>
</html>
