<?php includeView('header'); ?>

<main class="flex-1 p-6 overflow-auto bg-gray-100 min-h-screen">
    <?php require_once 'header_admin.php'; ?>

    <div class="max-w-6xl mx-auto mt-8 bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-800">📋 Danh sách bài viết</h3>
                <?php if ($checkAdmin): ?>
                    <a href="/admin/posts/add"
                       class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                        ➕ Thêm bài viết
                    </a>
                <?php endif; ?>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="text-left p-3">📂 Danh mục</th>
                        <th class="text-left p-3">📝 Tiêu đề</th>
                        <th class="text-left p-3">📄 Nội dung</th>
                        <th class="text-left p-3">🚦 Trạng thái</th>
                        <th class="text-left p-3">👁 Lượt xem</th>
                        <th class="text-left p-3">❤️ Lượt thích</th>
                        <th class="text-left p-3">⚙️ Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $item): ?>
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-3"><?= $item['category'] ?></td>
                            <td class="p-3 font-medium text-blue-700"><?= $item['title'] ?></td>
                            <td class="p-3 truncate max-w-[250px]"><?= substr(strip_tags($item['content']), 0, 100) ?>
                                ...
                            </td>
                            <td class="p-3">
                                <span class="inline-block px-2 py-1 text-xs rounded-full
                                    <?= $item['status'] === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' ?>">
                                    <?= ucfirst($item['status']) ?>
                                </span>
                            </td>
                            <td class="p-3"><?= $item['views'] ?></td>
                            <td class="p-3"><?= $item['likes'] ?></td>
                            <?php if ($checkAdmin): ?>
                                <td class="p-2 flex gap-2">
                                    <a href="/admin/posts/edit?id=<?= $item['post_id'] ?>" class="text-blue-600 hover:underline text-sm">
                                        ✏️ Sửa
                                    </a>

                                    <form method="POST" action="/admin/posts/delete" onsubmit="return confirm('Bạn có chắc muốn xoá không?')">
                                        <input type="hidden" name="post_id" value="<?= $item['post_id'] ?>">
                                        <button type="submit" class="text-red-600 hover:underline text-sm bg-transparent border-none cursor-pointer">
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

<?php includeView('footer'); ?>
