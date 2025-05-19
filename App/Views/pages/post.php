<?php
   includeView('header');
   
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?=$post['title'];?></title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
  <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
    <!-- Tiêu đề -->
    <h1 class="text-3xl font-bold text-blue-600 mb-2"><?=$post['title'];?></h1>
    
    <!-- Thông tin -->
    <div class="text-sm text-gray-500 mb-4 flex items-center justify-between">
      <span>Viết bởi <span class="font-medium text-gray-700">User #<?=$post['user_id'];?></span></span>
      <span>🕒<?=$post['created_at'];?></span>
    </div>

    <!-- Danh mục + trạng thái -->
    <div class="mb-4 flex flex-wrap gap-2 text-sm">
      <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full">#<?=$post['category'];?></span>
      
    </div>

    <!-- Nội dung -->
    <div class="prose prose-lg max-w-none mb-6">
      <p><?=$post['content'];?></p>
    </div>

    <!-- Thống kê -->
    <div class="flex items-center gap-4 text-sm text-gray-600">
      <div class="flex items-center gap-1">
        👁 <span><?=$post['views'];?> lượt xem</span>
      </div>
      <div class="flex items-center gap-1">
        ❤️ <span><?=$post['likes'];?> lượt thích</span>
      </div>
    </div>
  </div>
</body>
</html>

