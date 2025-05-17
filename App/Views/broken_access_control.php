<h1 class="text-2xl font-bold mb-4">A01:2021 - Broken Access Control</h1>
<p class="mb-4">Lỗ hổng kiểm soát truy cập cho phép kẻ tấn công truy cập dữ liệu hoặc chức năng không được phép.</p>
<h3 class="text-lg font-semibold mb-2">Ví dụ kiểm tra:</h3>
<p class="mb-4">Thử truy cập /admin mà không có quyền admin.</p>

<!-- Hướng dẫn từng bước -->
<h3 class="text-lg font-semibold mb-2">Hướng dẫn kiểm tra từng bước:</h3>
<ol class="list-decimal list-inside mb-4">
    <li class="mb-2">Đăng nhập bằng tài khoản người dùng thông thường.</li>
    <li class="mb-2">Thử truy cập URL quản trị (ví dụ: /admin) bằng cách nhập trực tiếp vào thanh địa chỉ.</li>
    <li class="mb-2">Kiểm tra xem hệ thống có chặn truy cập hay cho phép vào không.</li>
</ol>

<h3 class="text-lg font-semibold text-gray-800 mb-4">Các đường dẫn test:</h3>
<ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
    <li><code class="bg-gray-100 px-1.5 py-0.5 rounded text-sm"><?=getBaseUrl()?>/login</code> (Trang đăng nhập)</li>
    <li><code class="bg-gray-100 px-1.5 py-0.5 rounded text-sm"><?=getBaseUrl()?>/admin</code> (Trang quản trị)</li>
    <li><code class="bg-gray-100 px-1.5 py-0.5 rounded text-sm"><?=getBaseUrl()?>/admin/posts</code> (Trang quản trị bài viết)</li>
</ul>

<h3 class="text-lg font-semibold text-gray-800 mb-4">Cách khắc phục lỗ hổng này:</h3>
<ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
    <li class="mb-2">Kiểm tra quyền truy cập: Đảm bảo rằng người dùng chỉ có thể truy cập các chức năng và dữ liệu mà họ được phép.</li>
</ul>

<!-- Form kiểm tra -->
<div class="mt-6">
    <h3 class="text-lg font-semibold mb-4 text-center">TEST</h3>
    <div class="bg-white p-6 rounded-md shadow-md">
        <form class="mb-4 relative"
              action="<?= url('/broken-access-control') ?>"
        >
            <div class="mb-4 relative">
            <label class="block text-sm font-medium text-gray-700 mb-1">Truy cập theo trang (ví dụ: /login)</label>
                <div class="relative flex items-center">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <input
                            type="text"
                            class="w-full pl-10 pr-24 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition sm:text-sm"
                            placeholder="Nhập các đường dẫn cần kiểm tra"
                            name="url"
                            value="<?= !empty($_GET['url']) ? $_GET['url'] : '' ?>"
                    />
                    <button
                            type="submit"
                            class="absolute right-1.5 inset-y-1.5 bg-blue-600 text-white px-4 py-1.5 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition text-sm font-medium"
                    >
                        Chuyển trang
                    </button>
                </div>
            </div>
            <div class="mb-4 flex items-center">
                <label class="text-sm font-medium text-gray-700 mr-3">Bật cờ kiểm tra quyền admin đề khắc phục lỗ hổng này</label>
                <div class="relative inline-block w-10 h-6">
                    <input
                            type="checkbox"
                            id="toggle"
                            class="absolute opacity-0 w-0 h-0"
                            name="flg_check_admin"
                            value="1"
                    />
                    <label
                            for="toggle"
                            class="block w-full h-full bg-gray-300 rounded-full cursor-pointer transition-all duration-300 ease-in-out"
                            id="toggle-label"
                    >
                    <span
                            class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full shadow-sm transition-all duration-300 ease-in-out"
                            id="toggle-circle"
                    ></span>
                    </label>
                </div>
            </div>
        </form>
        <!-- Kết quả giả lập -->
        <?php if(!empty($path)): ?>
        <div class="mt-4 p-4 rounded-md flex items-center">
           <iframe src="<?=url($path, $_GET['flg_check_admin'] ? [
                'flg_check_admin' => $_GET['flg_check_admin']
           ] : [])?>" class="w-full h-[500px]"></iframe>
        </div>
        <?php endif; ?>
    </div>
</div>
<script>
    const toggle = document.getElementById('toggle');
    const toggleLabel = document.getElementById('toggle-label');
    const toggleCircle = document.getElementById('toggle-circle');

    // Kiểm tra trạng thái từ localStorage hoặc URL
    const urlParams = new URLSearchParams(window.location.search);
    const initialState = urlParams.get('checkAdmin') === '1' || localStorage.getItem('checkAdmin') === 'true';
    toggle.checked = initialState;
    updateToggleState(initialState);

    // Xử lý sự kiện thay đổi toggle
    toggle.addEventListener('change', () => {
        const isChecked = toggle.checked;
        updateToggleState(isChecked);
        // Lưu trạng thái vào localStorage
        localStorage.setItem('checkAdmin', isChecked);
    });

    // Hàm cập nhật giao diện toggle
    function updateToggleState(isChecked) {
        toggleLabel.classList.toggle('bg-blue-600', isChecked);
        toggleLabel.classList.toggle('bg-gray-300', !isChecked);
        toggleCircle.classList.toggle('translate-x-4', isChecked);
        toggleCircle.classList.toggle('scale-110', isChecked);
    }
</script>