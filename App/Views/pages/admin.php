<?php
   includeView('header');
?>


<main class="flex-1 p-6 overflow-auto">
    <header class="bg-white shadow p-4 flex justify-between items-center">
        <div class="text-lg font-semibold">Đây là trang quản trị </div>
    </header>
    <!-- Table -->
    <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold mb-4">Danh sách người dùng</h3>
            <table class="w-full">
                <thead>
                <tr class="border-b">
                    <th class="text-left p-2">Họ và tên </th>
                    <th class="text-left p-2">Tên đăng nhập</th>
                    <th class="text-left p-2">Số điện thoại</th>
                    <th class="text-left p-2">Giới tính</th>
                    <th class="text-left p-2">Quyền</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="border-b">
                        <td class="p-2"><?=$user['name']?></td>
                        <td class="p-2"><?=$user['username']?></td>
                        <td class="p-2"><?=$user['phone']?></td>
                        <td class="p-2"><?=$user['gender'] === 1 ? "Nam" : "Nu"?></td>
                        <td class="p-2"><?=$user['role'] === 1 ? "Quản trị" : "Người dùng"?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if(!empty($message)): ?>
        <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
            <strong class="font-semibold">Kết quả:</strong> <?=$message?>
        </div>
    <?php endif; ?>
</main>
</div>