<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức công nghệ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Header -->
    <?php require_once 'header_logined.php'; ?>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <?php foreach ($posts as $post): ?>
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                <img src="https://source.unsplash.com/600x300/?<?= urlencode($post['category']) ?>" alt="Thumbnail" class="w-full h-40 object-cover">
                <div class="p-5">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-2">
                        <?= $post['title'] ?>
                    </h2>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        <?= $post['content'] ?>
                    </p>

                    <div class="text-xs text-gray-500 flex justify-between items-center mb-3">
                        <span class="bg-indigo-100 text-indigo-700 px-2 py-0.5 rounded-full">#<?= htmlspecialchars($post['category']) ?></span>
                        <span>🕒 <?= date('d/m/Y', strtotime($post['created_at'])) ?></span>
                    </div>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <span>👁 <?= $post['views'] ?></span>
                        <span>❤️ <?= $post['likes'] ?></span>
                        <a href="?id=<?= $post['post_id'] ?>" class="text-blue-600 hover:underline font-medium ml-auto">Xem chi tiết →</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Lặp lại nhiều bài viết tương tự... -->

    </main>

    <!-- Footer -->
    <footer class="text-center text-sm text-gray-500 py-6">
        © 2025 Tin Công Nghệ | All rights reserved.
    </footer>
</body>

</html>