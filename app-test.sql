/*
 Navicat Premium Data Transfer

 Source Server         : mysql_local
 Source Server Type    : MySQL
 Source Server Version : 80040
 Source Host           : 127.0.0.1:3306
 Source Schema         : app_test

 Target Server Type    : MySQL
 Target Server Version : 80040
 File Encoding         : 65001

 Date: 28/05/2025 23:14:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
  `comment_id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`) USING BTREE,
  INDEX `post_id`(`post_id` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (2, 2, 1, 'Mình sẽ thử nấu phở theo công thức này.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (3, 4, 1, 'Đà Lạt đẹp quá, thanks bạn chia sẻ!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (4, 5, 2, 'Blockchain hơi khó hiểu, có bài chi tiết hơn không?', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (5, 6, 1, 'Phim này mình cũng thích, đồng ý với review.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (6, 8, 1, 'Bánh flan làm dễ mà ngon, recommend mọi người!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (7, 10, 1, 'Hà Nội mùa này đẹp, cảm ơn gợi ý check-in.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (8, 12, 1, 'Mình đang học tiếng Anh, bài này hay quá!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (9, 15, 2, 'An ninh mạng quan trọng thật, thanks bài viết.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (10, 18, 1, 'Trà sữa homemade ngon hơn ngoài tiệm luôn!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (13, 1, 1, 'nội dung hơi tệ', '2025-05-21 17:37:46');
INSERT INTO `comments` VALUES (15, 21, 1, 'hi', '2025-05-21 19:59:57');
INSERT INTO `comments` VALUES (16, 1, 1, 'test', '2025-05-28 05:20:46');
INSERT INTO `comments` VALUES (17, 1, 1, 'test2', '2025-05-28 05:21:30');
INSERT INTO `comments` VALUES (18, 1, 1, 'dfsfs1', '2025-05-28 05:22:29');
INSERT INTO `comments` VALUES (19, 1, 1, 'dfsfsf', '2025-05-28 05:24:08');
INSERT INTO `comments` VALUES (20, 1, 1, 'dfsfsf', '2025-05-28 05:25:34');
INSERT INTO `comments` VALUES (21, 1, 1, 'dfsfsf', '2025-05-28 05:25:45');
INSERT INTO `comments` VALUES (22, 1, 1, 'fsfd', '2025-05-28 05:26:11');
INSERT INTO `comments` VALUES (23, 1, 1, '32424', '2025-05-28 05:26:16');
INSERT INTO `comments` VALUES (24, 1, 1, 'dsf', '2025-05-28 05:28:50');
INSERT INTO `comments` VALUES (26, 1, 2, 'dfsf', '2025-05-28 05:30:42');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `views` int NULL DEFAULT 0,
  `likes` int NULL DEFAULT 0,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 'public/blog1.jpg', 'Giới thiệu về AI', '### Giới thiệu về AI (Trí tuệ nhân tạo)\r\n\r\n**Trí tuệ nhân tạo (AI)** là một lĩnh vực của khoa học máy tính, nơi các hệ thống và chương trình có thể mô phỏng trí tuệ con người. AI có thể học hỏi từ dữ liệu, nhận diện mẫu, đưa ra quyết định và thậm chí sáng tạo nội dung.\r\n\r\n#### **Các loại AI phổ biến**\r\n1. **AI Hẹp (Narrow AI)** – Đây là AI được thiết kế để thực hiện một tác vụ cụ thể, như nhận diện khuôn mặt, trợ lý giọng nói (Siri, Google Assistant), hay hệ thống gợi ý phim ảnh.\r\n2. **AI Tổng quát (General AI)** – Loại AI này có khả năng tư duy linh hoạt giống con người, có thể học và thích nghi với nhiều tác vụ khác nhau. Tuy nhiên, AI loại này vẫn đang trong giai đoạn nghiên cứu.\r\n3. **Siêu AI (Super AI)** – Là tương lai của AI, nơi nó có thể vượt qua khả năng trí tuệ của con người. Đây là một chủ đề đang được tranh luận trong giới công nghệ và khoa học.\r\n\r\n#### **Ứng dụng của AI**\r\n- **Y tế**: Chẩn đoán bệnh, hỗ trợ điều trị, nghiên cứu dược phẩm.\r\n- **Giao thông**: Xe tự lái, tối ưu hoá tuyến đường.\r\n- **Tài chính**: Phân tích dữ liệu thị trường, phát hiện gian lận.\r\n- **Giải trí**: Tạo nội dung, game có AI, chỉnh sửa ảnh/video.\r\n- **Giáo dục**: Hỗ trợ học tập, gia sư AI.\r\n\r\nAI ngày càng trở thành một phần không thể thiếu trong cuộc sống và công nghệ. Bạn có muốn tìm hiểu sâu hơn về một khía cạnh cụ thể nào không? 🤖🚀\r\n', 'published', 150, 25, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:08:57');
INSERT INTO `posts` VALUES (2, 2, 'public/blog2.jpg', 'Cách nấu phở bò', 'Hướng dẫn chi tiết nấu phở bò truyền thống.', 'published', 200, 40, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-28 16:09:03');
INSERT INTO `posts` VALUES (3, 1, 'public/blog3.jpg', 'Lập trình Python cơ bản', 'Học Python từ con số 0.', 'draft', 10, 2, 'Lập trình', '2025-05-13 13:42:20', '2025-05-28 16:09:07');
INSERT INTO `posts` VALUES (4, 2, 'public/blog4.jpg', 'Du lịch Đà Lạt 3 ngày 2 đêm', 'Kinh nghiệm du lịch Đà Lạt tiết kiệm.', 'published', 300, 60, 'Du lịch', '2025-05-13 13:42:20', '2025-05-28 16:09:10');
INSERT INTO `posts` VALUES (5, 1, 'public/blog5.jpg', 'Blockchain là gì?', 'Giải thích công nghệ blockchain đơn giản.', 'published', 180, 30, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:09:15');
INSERT INTO `posts` VALUES (6, 2, 'public/blog6.jpg', 'Review phim mới', 'Đánh giá phim bom tấn tháng này.', 'published', 120, 15, 'Giải trí', '2025-05-13 13:42:20', '2025-05-28 16:09:18');
INSERT INTO `posts` VALUES (7, 1, 'public/blog7.jpg', 'Tối ưu hóa website', 'Mẹo tăng tốc độ website hiệu quả.', 'archived', 50, 8, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:09:22');
INSERT INTO `posts` VALUES (8, 2, 'public/blog8.jpg', 'Cách làm bánh flan', 'Công thức bánh flan đơn giản tại nhà.', 'published', 250, 45, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-28 16:09:26');
INSERT INTO `posts` VALUES (9, 1, 'public/blog9.jpg', 'Học máy tính lượng tử', 'Giới thiệu về máy tính lượng tử.', 'draft', 20, 3, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:09:31');
INSERT INTO `posts` VALUES (10, 2, 'public/blog10.jpg', 'Top 5 điểm check-in Hà Nội', 'Những nơi không thể bỏ qua ở Hà Nội.', 'published', 280, 55, 'Du lịch', '2025-05-13 13:42:20', '2025-05-28 16:09:35');
INSERT INTO `posts` VALUES (11, 1, 'public/blog11.jpg', 'API là gì?', 'Tìm hiểu về API và cách sử dụng.', 'published', 160, 22, 'Lập trình', '2025-05-13 13:42:20', '2025-05-28 16:09:37');
INSERT INTO `posts` VALUES (12, 2, 'public/blog12.jpg', 'Học tiếng Anh giao tiếp', 'Mẹo cải thiện kỹ năng nói tiếng Anh.', 'published', 190, 35, 'Giáo dục', '2025-05-13 13:42:20', '2025-05-28 16:09:41');
INSERT INTO `posts` VALUES (13, 1, 'public/blog13.jpg', 'Cơ sở dữ liệu NoSQL', 'So sánh NoSQL và SQL.', 'draft', 15, 1, 'Lập trình', '2025-05-13 13:42:20', '2025-05-28 16:09:44');
INSERT INTO `posts` VALUES (14, 2, 'public/blog14.jpg', 'Cách chăm sóc cây cảnh', 'Hướng dẫn chăm sóc cây trong nhà.', 'published', 140, 20, 'Lifestyle', '2025-05-13 13:42:20', '2025-05-28 16:09:46');
INSERT INTO `posts` VALUES (15, 1, 'public/blog15.jpg', 'An ninh mạng cơ bản', 'Bảo vệ dữ liệu cá nhân trên mạng.', 'published', 170, 28, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:09:49');
INSERT INTO `posts` VALUES (16, 2, 'public/blog16.jpg', 'Review sách hay', 'Giới thiệu sách nên đọc năm nay.', 'published', 130, 18, 'Văn học', '2025-05-13 13:42:20', '2025-05-28 16:09:53');
INSERT INTO `posts` VALUES (17, 1, 'public/blog17.jpg', 'Machine Learning cho người mới', 'Học ML cơ bản với Python.', 'published', 200, 32, 'Lập trình', '2025-05-13 13:42:20', '2025-05-28 16:09:56');
INSERT INTO `posts` VALUES (18, 2, 'public/blog18.jpg', 'Cách làm trà sữa tại nhà', 'Công thức trà sữa ngon, dễ làm.', 'published', 270, 50, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-28 16:10:00');
INSERT INTO `posts` VALUES (19, 1, 'public/blog19.png', 'IoT và ứng dụng', 'Internet of Things thay đổi cuộc sống.', 'published', 40, 5, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-28 16:13:21');
INSERT INTO `posts` VALUES (20, 2, 'public/blog20.jpg', 'Kinh nghiệm phỏng vấn xin việc', 'Mẹo để vượt qua vòng phỏng vấn.', 'published', 220, 38, 'Kỹ năng', '2025-05-13 13:42:20', '2025-05-28 16:10:07');
INSERT INTO `posts` VALUES (21, 1, 'public/blog21.jpg', 'Lập trìn moblie', 'Khi phát triển ứng dụng di động, việc lựa chọn ngôn ngữ lập trình phù hợp là rất quan trọng. Dưới đây là một số ngôn ngữ phổ biến được sử dụng trong lập trình mobile:\r\n\r\n### 1. **Swift** (iOS)\r\n- Ngôn ngữ chính thức của Apple dành cho iOS.\r\n- Hiệu suất cao, cú pháp đơn giản, dễ đọc và bảo mật tốt.\r\n- Sử dụng với Xcode và UIKit/SwiftUI để tạo ứng dụng iPhone, iPad.\r\n\r\n### 2. **Kotlin** (Android)\r\n- Được Google khuyến nghị thay thế Java trong phát triển ứng dụng Android.\r\n- Ngắn gọn, mạnh mẽ, hỗ trợ lập trình hàm và tương thích với Java.\r\n- Sử dụng với Android Studio và Jetpack Compose.\r\n\r\n### 3. **Flutter (Dart)** (Đa nền tảng)\r\n- Framework của Google hỗ trợ lập trình ứng dụng cho cả Android và iOS.\r\n- Sử dụng ngôn ngữ Dart, hiệu suất cao, giao diện đẹp với hệ thống widget tùy chỉnh.\r\n- Một codebase duy nhất, dễ triển khai trên nhiều nền tảng.\r\n\r\n### 4. **React Native (JavaScript)** (Đa nền tảng)\r\n- Được phát triển bởi Facebook, sử dụng JavaScript và React để tạo ứng dụng mobile.\r\n- Hỗ trợ viết code một lần, chạy trên cả Android và iOS.\r\n- Có thể kết hợp với mã native nếu cần hiệu suất tốt hơn.\r\n\r\n### 5. **C# với .NET MAUI/Xamarin** (Đa nền tảng)\r\n- C# kết hợp với Xamarin (trước đây) hoặc .NET MAUI để xây dựng ứng dụng di động đa nền tảng.\r\n- Hiệu suất tốt, có thể tái sử dụng code giữa Android, iOS và Windows.\r\n- Tích hợp tốt với các dịch vụ của Microsoft.\r\n\r\nBạn đang quan tâm đến ngôn ngữ nào nhất? Tôi có thể giúp bạn tìm hiểu sâu hơn hoặc hướng dẫn cách bắt đầu lập trình với ngôn ngữ đó! 🚀📱\r\n', 'published', 0, 0, 'Mobile App', '2025-05-21 19:16:47', '2025-05-28 16:10:13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_of_birth` date NULL DEFAULT NULL,
  `gender` tinyint NULL DEFAULT 0 COMMENT '0: Khác, 1: nam, 2: nữ',
  `role` tinyint NOT NULL DEFAULT 0 COMMENT '0: user, 1: admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Nguyen Van Admin ', 'admin', 'admin', '0905123456', '1990-01-15', 1, 1, '2025-05-13 13:42:19', '2025-05-21 19:53:11');
INSERT INTO `users` VALUES (2, 'Tran Thi User', 'user', 'user', '0987654321', '1995-06-20', 2, 0, '2025-05-13 13:42:19', '2025-05-21 18:04:38');
INSERT INTO `users` VALUES (3, 'thientrile', 'thientrile', '1', '0834822676', NULL, 0, 1, '2025-05-21 18:39:30', '2025-05-21 18:39:30');

SET FOREIGN_KEY_CHECKS = 1;
