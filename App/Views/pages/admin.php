<?php includeView('header'); ?>

<main class="flex-1 p-6 overflow-auto bg-gray-100 min-h-screen">
    <?php require_once 'header_admin.php'; ?>

    <div class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-blue-600">👥 Danh sách người dùng</h3>
                <?php if ($checkAdmin): ?>
                    <a href="/admin/user" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        ➕ Thêm người dùng
                    </a>
                <?php endif; ?>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white text-sm border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="text-left p-3">Họ và tên</th>
                        <th class="text-left p-3">Tên đăng nhập</th>
                        <th class="text-left p-3">Số điện thoại</th>
                        <th class="text-left p-3">Giới tính</th>
                        <th class="text-left p-3">Quyền</th>
                        <?php if ($checkAdmin): ?>
                            <th class="text-left p-3">Hành động</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody class="text-gray-800">
                    <?php foreach ($users as $user): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-3"><?= $user['name'] ?></td>
                            <td class="p-3"><?= $user['username'] ?></td>
                            <td class="p-3"><?= $user['phone'] ?></td>
                            <td class="p-3"><?= $user['gender'] === 1 ? "Nam" : "Nữ" ?></td>
                            <td class="p-3"><?= $user['role'] === 1 ? "Quản trị" : "Người dùng" ?></td>
                            <?php if ($checkAdmin): ?>
                                <td class="p-3 flex gap-2">
                                    <a href="/admin/user/edit?id=<?= $user['id'] ?>"
                                       class="text-blue-600 hover:underline">✏️ Sửa</a>

                                    <form method="POST" action="/admin/user/delete"
                                          onsubmit="return confirm('Bạn chắc chắn muốn xoá người dùng này?')">
                                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                        <button type="submit" class="text-red-600 hover:underline bg-transparent border-none cursor-pointer">
                                            🗑️ Xoá
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
</div>
