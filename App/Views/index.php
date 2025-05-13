<?php
  require 'header.php';
?>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($menu as $item): ?>
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 flex flex-col items-stretch">
            <div class="flex items-start">
                <i class="<?=$item['icon']?> text-red-600 text-2xl mr-3"></i>
                <div>
                    <h2 class="text-xl font-bold text-red-600 mb-2"><?=$item['title']?></h2>
                    <p class="text-gray-700 mb-4"><?=$item['description']?></p>
                </div>
            </div>
            <a href="<?=$item['link']?>" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded text-center text-sm font-medium transition-colors duration-200">
                Tìm hiểu thêm
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php
  require 'footer.php';
  ?>
