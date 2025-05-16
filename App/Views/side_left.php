<h2 class="text-xl font-bold mb-4">OWASP Top 10</h2>
<ul>
    <?php foreach ($menu as $item): ?>
        <li class="cursor-pointer">
            <a href="<?=$item['link']?>" class="text-gray-300 hover:bg-gray-700 <?=activeRoute($item['link']) ? 'bg-gray-600':''?> hover:text-white block p-2 rounded">
                <?=$item['title']?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>