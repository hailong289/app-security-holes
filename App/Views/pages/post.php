<?php
includeView('header');

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $post['title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
<?php require_once 'header_logined.php'; ?>
<div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
    <!-- Tiêu đề -->
    <h1 class="text-3xl font-bold text-blue-600 mb-2"><?= $post['title']; ?></h1>

    <!-- Thông tin -->
    <div class="text-sm text-gray-500 mb-4 flex items-center justify-between">
        <span>Viết bởi <span class="font-medium text-gray-700">User #<?= $post['user_id']; ?></span></span>
        <span>🕒<?= $post['created_at']; ?></span>
    </div>

    <!-- Danh mục + trạng thái -->
    <div class="mb-4 flex flex-wrap gap-2 text-sm">
        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full">#<?= $post['category']; ?></span>

    </div>

    <!-- Nội dung -->
    <div class="prose prose-lg max-w-none mb-6">
        <p><?= $post['content']; ?></p>
    </div>

    <!-- Thống kê -->
    <div class="flex items-center gap-4 text-sm text-gray-600">
        <div class="flex items-center gap-1">
            👁 <span><?= $post['views']; ?> lượt xem</span>
        </div>
        <div class="flex items-center gap-1">
            ❤️ <span><?= $post['likes']; ?> lượt thích</span>
        </div>

    </div>
</div>
<!-- Bình luận -->
<div class="mt-10">
    <h2 class="text-xl font-semibold mb-4">💬 Bình luận</h2>

    <!-- Danh sách bình luận -->
    <div class="space-y-4 mb-6">
        <?php if (!empty($comments)) : ?>
            <?php foreach ($comments as $comment) : ?>
                <div class="bg-gray-50 p-4 rounded shadow-sm relative group">
                    <div class="text-sm text-gray-700 mb-1 flex justify-between items-center">
                        <span><strong>User #<?= $comment['user_id']; ?></strong> · 🕒 <?= $comment['created_at']; ?></span>
                        <?php if (!empty(session()->get('user')) && session()->get('user')['id'] == $comment['user_id']) : ?>
                            <form action="/comment/del" method="POST" onsubmit="return confirm('Bạn chắc chắn muốn xóa bình luận này?');">
                                <input type="hidden" name="comment_id" value="<?= $comment['comment_id']; ?>">
                                <input type="hidden" name="user_id" value="<?= $comment['user_id']; ?>">
                                <input type="hidden" name="post_id" value="<?= $post['post_id']; ?>">
                                <button type="submit" class="text-red-500 text-sm hover:underline">Xóa</button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <p class="text-gray-800"><?= htmlspecialchars($comment['content']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-gray-500 italic">Chưa có bình luận nào. Hãy là người đầu tiên!</p>
        <?php endif; ?>
    </div>

    <!-- Form bình luận mới -->
    <?php if (!empty(session()->get('user'))) : ?>
        <form action="/comment" method="POST" class="space-y-4">
           <input type="hidden" name="post_id" value="<?= $post['post_id']; ?>">
            <input type="hidden" name="user_id" value="<?= session()->get('user')['id']; ?>">
            <textarea name="content" rows="3" class="w-full p-3 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Viết bình luận..."></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Gửi bình luận</button>
        </form>
    <?php else : ?>
        <p class="text-gray-600 italic">Vui lòng <a href="/login?redirect=/post?id=<?= $post['post_id']; ?>" class="text-blue-500 hover:underline">đăng nhập</a> để bình luận.</p>
    <?php endif; ?>
</div>

</body>

</html>