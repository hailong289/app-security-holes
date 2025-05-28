<h1 class="text-3xl font-bold mb-6">A06:2021 - Vulnerable and Outdated Components
</h1>
<p class="mb-8">Dưới đây là ví dụ về việc sử dụng thư viện hoặc phần mềm lỗi thời, dễ bị khai thác bởi lỗ hổng đã biết.</p>

<!-- Phần giải thích lỗi -->
<h2 class="text-xl font-semibold text-gray-800 mb-2">Các Lỗi Liên Quan Đến Thành Phần Dễ Bị Tấn Công</h2>
<ul class="list-disc ml-5 text-gray-700 mb-4">
    <li><strong>Sử dụng thư viện lỗi thời:</strong> Ví dụ, dùng phiên bản jQuery 1.9.1 (có lỗ hổng XSS đã biết).</li>
    <li><strong>Không cập nhật phần mềm:</strong> Sử dụng phiên bản server cũ (VD: Apache 2.4.10) với lỗ hổng bảo mật công khai.</li>
    <li><strong>Thiếu kiểm tra phiên bản:</strong> Không kiểm tra hoặc cập nhật các dependency thường xuyên.</li>
</ul>

<!-- Hướng dẫn kiểm tra -->
<h2 class="text-xl font-semibold mb-2">Cách Kiểm Tra Lỗi</h2>
<div class="mb-4">
    <p class="text-gray-700">1. Kiểm tra phiên bản thư viện: Mở console trình duyệt và kiểm tra jQuery (VD: <code>jQuery.fn.jquery</code>).</p>
    <p class="text-gray-700">2. Tìm kiếm lỗ hổng đã biết: Tra cứu CVE của phiên bản (VD: CVE-2015-9251 cho jQuery 1.9.1).</p>
    <p class="text-gray-700">3. Thử khai thác: Tải lên tệp độc hại để khai thác lỗ hổng nếu có (VD: file chứa mã XSS).</p>
    <p class="text-gray-700">4. Cách khắc phục: Cập nhật thư viện lên phiên bản mới nhất (VD: jQuery 3.7.x) và kiểm tra dependency thường xuyên.</p>
</div>
<!-- Nhúng jQuery phiên bản 1.9.1 (lỗi thời, có lỗ hổng XSS đã biết) -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
