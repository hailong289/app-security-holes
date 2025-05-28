/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80040 (8.0.40)
 Source Host           : localhost:3306
 Source Schema         : app_test

 Target Server Type    : MySQL
 Target Server Version : 80040 (8.0.40)
 File Encoding         : 65001

 Date: 13/05/2025 21:41:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

    -- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NULL DEFAULT NULL,
  `date_of_birth` date NULL DEFAULT NULL,
  `gender` tinyint NULL DEFAULT (0) COMMENT '0: Khác, 1: nam, 2: nữ',
  `role` tinyint NOT NULL DEFAULT (0) COMMENT '0: user, 1: admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci  ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
  `status` enum('draft','published','archived') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT 'draft',
  `views` int NULL DEFAULT 0,
  `likes` int NULL DEFAULT 0,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci  ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments`  (
 `comment_id` int NOT NULL AUTO_INCREMENT,
 `post_id` int NOT NULL,
 `user_id` int NOT NULL,
 `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
 `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`comment_id`) USING BTREE,
 INDEX `post_id`(`post_id` ASC) USING BTREE,
 INDEX `user_id`(`user_id` ASC) USING BTREE,
 CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
 CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci  ROW_FORMAT = Dynamic;



-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Nguyen Van Admin', 'admin01', '$2y$10$hashedpassword1234567890', '0905123456', '1990-01-15', 1, 1, '2025-05-13 13:42:19', '2025-05-13 13:42:19');
INSERT INTO `users` VALUES (2, 'Tran Thi User', 'user01', '$2y$10$hashedpassword0987654321', '0987654321', '1995-06-20', 2, 0, '2025-05-13 13:42:19', '2025-05-13 13:42:19');


-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (1, 1, 'Giới thiệu về AI', 'Nội dung về trí tuệ nhân tạo và ứng dụng.', 'published', 150, 25, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (2, 2, 'Cách nấu phở bò', 'Hướng dẫn chi tiết nấu phở bò truyền thống.', 'published', 200, 40, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (3, 1, 'Lập trình Python cơ bản', 'Học Python từ con số 0.', 'draft', 10, 2, 'Lập trình', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (4, 2, 'Du lịch Đà Lạt 3 ngày 2 đêm', 'Kinh nghiệm du lịch Đà Lạt tiết kiệm.', 'published', 300, 60, 'Du lịch', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (5, 1, 'Blockchain là gì?', 'Giải thích công nghệ blockchain đơn giản.', 'published', 180, 30, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (6, 2, 'Review phim mới', 'Đánh giá phim bom tấn tháng này.', 'published', 120, 15, 'Giải trí', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (7, 1, 'Tối ưu hóa website', 'Mẹo tăng tốc độ website hiệu quả.', 'archived', 50, 8, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (8, 2, 'Cách làm bánh flan', 'Công thức bánh flan đơn giản tại nhà.', 'published', 250, 45, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (9, 1, 'Học máy tính lượng tử', 'Giới thiệu về máy tính lượng tử.', 'draft', 20, 3, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (10, 2, 'Top 5 điểm check-in Hà Nội', 'Những nơi không thể bỏ qua ở Hà Nội.', 'published', 280, 55, 'Du lịch', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (11, 1, 'API là gì?', 'Tìm hiểu về API và cách sử dụng.', 'published', 160, 22, 'Lập trình', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (12, 2, 'Học tiếng Anh giao tiếp', 'Mẹo cải thiện kỹ năng nói tiếng Anh.', 'published', 190, 35, 'Giáo dục', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (13, 1, 'Cơ sở dữ liệu NoSQL', 'So sánh NoSQL và SQL.', 'draft', 15, 1, 'Lập trình', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (14, 2, 'Cách chăm sóc cây cảnh', 'Hướng dẫn chăm sóc cây trong nhà.', 'published', 140, 20, 'Lifestyle', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (15, 1, 'An ninh mạng cơ bản', 'Bảo vệ dữ liệu cá nhân trên mạng.', 'published', 170, 28, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (16, 2, 'Review sách hay', 'Giới thiệu sách nên đọc năm nay.', 'published', 130, 18, 'Văn học', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (17, 1, 'Machine Learning cho người mới', 'Học ML cơ bản với Python.', 'published', 200, 32, 'Lập trình', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (18, 2, 'Cách làm trà sữa tại nhà', 'Công thức trà sữa ngon, dễ làm.', 'published', 270, 50, 'Ẩm thực', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (19, 1, 'IoT và ứng dụng', 'Internet of Things thay đổi cuộc sống.', 'archived', 40, 5, 'Công nghệ', '2025-05-13 13:42:20', '2025-05-13 13:42:20');
INSERT INTO `posts` VALUES (20, 2, 'Kinh nghiệm phỏng vấn xin việc', 'Mẹo để vượt qua vòng phỏng vấn.', 'published', 220, 38, 'Kỹ năng', '2025-05-13 13:42:20', '2025-05-13 13:42:20');


-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES (1, 1, 2, 'Bài viết rất hữu ích, cảm ơn admin!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (2, 2, 1, 'Mình sẽ thử nấu phở theo công thức này.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (3, 4, 1, 'Đà Lạt đẹp quá, thanks bạn chia sẻ!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (4, 5, 2, 'Blockchain hơi khó hiểu, có bài chi tiết hơn không?', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (5, 6, 1, 'Phim này mình cũng thích, đồng ý với review.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (6, 8, 1, 'Bánh flan làm dễ mà ngon, recommend mọi người!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (7, 10, 1, 'Hà Nội mùa này đẹp, cảm ơn gợi ý check-in.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (8, 12, 1, 'Mình đang học tiếng Anh, bài này hay quá!', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (9, 15, 2, 'An ninh mạng quan trọng thật, thanks bài viết.', '2025-05-13 13:42:20');
INSERT INTO `comments` VALUES (10, 18, 1, 'Trà sữa homemade ngon hơn ngoài tiệm luôn!', '2025-05-13 13:42:20');

SET FOREIGN_KEY_CHECKS = 1;
