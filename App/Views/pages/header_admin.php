<header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/admin" class="text-2xl font-bold text-blue-600">Admin


        </a>

        <a href="/admin/posts" class="text-xl font-bold text-gray-600">Post</a>

        <?php if (!empty(session()->get('user'))) { ?>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 font-medium">
                    <?= session()->get('user')['name'] ?>
                </span>
                <form action="/logout" method="POST" class="inline">
                    <button type="submit" class="text-red-500 hover:underline">
                        Logout
                    </button>
                </form>
            </div>
        <?php } else { ?>
            <a href="/login?redirect=admin" class="text-blue-500 hover:underline">
                Login
            </a>
        <?php } ?>
    </div>
</header>
<?php if (!empty($message)): ?>
    <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
        <strong class="font-semibold">Kết quả:</strong> <?= $message ?>
    </div>
<?php endif; ?>

