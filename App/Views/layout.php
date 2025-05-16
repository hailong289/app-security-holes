<?php require_once 'header.php'; ?>

    <div class="flex w-full min-h-screen">
        <div class="w-1/4 bg-gray-800 text-white p-4 overflow-y-auto">
            <?php require_once 'side_left.php'; ?>
        </div>
        <div class="w-3/4 p-6 relative">
            <?php require_once "$page.php" ?>
            <div class="h-40"></div>
            <div class="absolute bottom-0 right-0 w-full">
                <?php require_once 'footer.php'; ?>
            </div>
        </div>
    </div>
