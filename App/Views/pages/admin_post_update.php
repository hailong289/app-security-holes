<?php
// Ví dụ mảng danh mục (bạn có thể load từ DB)
$categories = [
    'Công nghệ',
    'AI & Machine Learning',
    'An toàn thông tin',
    'Lập trình Web',
    'Mobile App',
    'DevOps & Cloud',
    'Thiết bị phần cứng',
    'Khởi nghiệp công nghệ'
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>✏️ Chỉnh sửa bài viết</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body >



<?php require_once 'header_admin.php'; ?>
<div class="bg-gray-100 min-h-screen p-6">

<div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-orange-500 mb-6">✏️ Chỉnh sửa bài viết</h1>

    <form action="/admin/posts/edit" method="POST" enctype="multipart/form-data" class="space-y-4">

        <!-- Thumbnail hiện tại -->
        <div>
            <label class="block mb-1 font-medium">Ảnh hiện tại</label>
            <img src="<?= $post['thumbnail'] ?>" alt="Thumbnail" class="w-40 h-24 object-cover rounded mb-2">
            <input type="file" name="thumbnail" accept="image/*" class="w-full p-2 border rounded">
            <small class="text-gray-500">Bỏ qua nếu không muốn thay ảnh</small>
        </div>

        <!-- Tiêu đề -->
        <div>
            <label class="block mb-1 font-medium">Tiêu đề</label>
            <input type="text" name="title" value="<?= $post['title'] ?>" required class="w-full p-2 border rounded">
        </div>

        <!-- Nội dung -->
        <div>
            <label class="block mb-1 font-medium">Nội dung</label>
            <textarea name="content" rows="8" required class="w-full p-2 border rounded"><?= $post['content'] ?></textarea>
        </div>

        <!-- Danh mục -->
        <div>
            <label class="block mb-1 font-medium">Danh mục</label>
            <select name="category" class="w-full p-2 border rounded" required>
                <option value="">-- Chọn danh mục --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat ?>" <?= $cat == $post['category'] ? 'selected' : '' ?>>
                        <?= $cat ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Trạng thái -->
        <div>
            <label class="block mb-1 font-medium">Trạng thái</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="draft" <?= $post['status'] == 'draft' ? 'selected' : '' ?>>Nháp</option>
                <option value="published" <?= $post['status'] == 'published' ? 'selected' : '' ?>>Công khai</option>
            </select>
        </div>

        <!-- Hidden -->
        <input type="hidden" name="user_id" value="<?= $post['user_id'] ?>">
        <input type="hidden" name="post_id" value="<?= $post['post_id'] ?>">

        <!-- Submit -->
        <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
            💾 Cập nhật
        </button>
    </form>
</div>
</div>
</body>
</html>
