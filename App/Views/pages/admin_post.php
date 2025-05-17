<?php
includeView('header');
?>


    <main class="flex-1 p-6 overflow-auto">
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <div class="text-lg font-semibold">Đây là trang quản trị </div>
            <!--        <div class="flex items-center space-x-4">-->
            <!--            <input type="text" placeholder="Search..." class="border rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">-->
            <!--            <div class="flex items-center space-x-2">-->
            <!--                <img src="https://via.placeholder.com/32" alt="User Avatar" class="w-8 h-8 rounded-full">-->
            <!--                <span>Admin User</span>-->
            <!--            </div>-->
            <!--        </div>-->
        </header>
        <!-- Table -->
        <div class="mt-8 bg-white rounded-lg shadow overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Danh sách bài viết</h3>
                <table class="w-full">
                    <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Danh mục</th>
                        <th class="text-left p-2">Tiêu đề </th>
                        <th class="text-left p-2">Nội dung</th>
                        <th class="text-left p-2">Trạng thái</th>
                        <th class="text-left p-2">Lượt xem</th>
                        <th class="text-left p-2">Lượt thích</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $item): ?>
                        <tr class="border-b">
                            <td class="p-2"><?=$item['category']?></td>
                            <td class="p-2"><?=$item['title']?></td>
                            <td class="p-2"><?=$item['content']?></td>
                            <td class="p-2"><?=$item['status']?></td>
                            <td class="p-2"><?=$item['views']?></td>
                            <td class="p-2"><?=$item['likes']?></td>
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

<?php includeView('footer'); ?>