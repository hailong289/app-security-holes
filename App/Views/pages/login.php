<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<form class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md"
      action="<?=url('/test/login')?>"
      method="post"
>
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>
    <div>
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" id="username" name="username" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your username" required>
        </div>
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your password" required>
        </div>
        <div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign In</button>
        </div>
        <?php if(!empty($message)): ?>
            <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
                <strong class="font-semibold">Kết quả:</strong> <?=$message?>
            </div>
        <?php endif; ?>
    </div>
</form>
</body>
</html>