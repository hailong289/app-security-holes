<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>📝 Tạo bài viết mới</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once 'header_admin.php'; ?>
<div  class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-blue-600 mb-6">✍️ Tạo bài viết mới</h1>

        <form action="/admin/posts/add" method="POST" enctype="multipart/form-data" class="space-y-4">

            <!-- Thumbnail -->
            <div>
                <label class="block mb-1 font-medium">Ảnh thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" required class="w-full p-2 border rounded">
            </div>

            <!-- Tiêu đề -->
            <div>
                <label class="block mb-1 font-medium">Tiêu đề</label>
                <input type="text" name="title" required class="w-full p-2 border rounded">
            </div>

            <!-- Nội dung -->
            <div>
                <label class="block mb-1 font-medium">Nội dung</label>
                <textarea name="content" rows="8" required class="w-full p-2 border rounded"></textarea>
            </div>

            <!-- Danh mục -->
            <div>
                <label class="block mb-1 font-medium">Danh mục</label>
                <select name="category" class="w-full p-2 border rounded" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat ?>"><?= $cat ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <!-- Trạng thái -->
            <div>
                <label class="block mb-1 font-medium">Trạng thái</label>
                <select name="status" class="w-full p-2 border rounded">
                    <option value="draft">Nháp</option>
                    <option value="published">Công khai</option>
                </select>
            </div>

            <!-- Views & Likes (ẩn, mặc định 0) -->
            <input type="hidden" name="user_id" value="<?= session()->get('user')['id'] ?>">

            <!-- Submit -->
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Đăng bài
            </button>
        </form>
    </div>
</div>

</body>
</html>
