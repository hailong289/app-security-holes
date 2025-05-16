<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test case</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php if(!empty($message)): ?>
    <div class="mt-4 p-4 rounded-md bg-<?= $status === 'success' ? 'green' : 'red' ?>-100 text-<?= $status === 'success' ? 'green' : 'red' ?>-700">
        <strong class="font-semibold">Kết quả:</strong> <?=$message?>
    </div>
<?php endif; ?>
</body>
</html>