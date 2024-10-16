-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 09, 2024 lúc 01:59 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qtstorenew1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(111, 8, 15, 1, '2024-10-07 03:20:53', '2024-10-07 03:20:53'),
(112, 8, 20, 1, '2024-10-07 03:20:54', '2024-10-07 03:20:54'),
(113, 8, 6, 1, '2024-10-07 03:20:55', '2024-10-07 03:20:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dmhot` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `dmhot`, `created_at`, `updated_at`) VALUES
(1, 'fuga', 'hero-slide1.png', 1, '2024-05-28 17:30:11', '2024-05-28 17:30:11'),
(2, 'et', 'hero-slide2.png', 1, '2024-05-28 17:30:11', '2024-05-28 17:30:11'),
(3, 'eum', 'hero-slide3.png', 1, '2024-05-28 17:30:11', '2024-05-28 17:30:11'),
(4, 'illo', 'hero-slide1.png', 1, '2024-05-28 17:30:11', '2024-05-28 17:30:11'),
(5, 'quae', 'hero-slide2.png', 1, '2024-05-28 17:30:11', '2024-05-28 17:30:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `rating`, `created_at`, `updated_at`) VALUES
(10, 8, 1, 'dfffff', 2, '2024-06-03 00:37:29', '2024-06-03 00:37:29'),
(11, 8, 1, 'te', 1, '2024-06-03 00:38:13', '2024-06-03 00:38:13'),
(12, 8, 17, 'good', 3, '2024-06-03 00:45:03', '2024-06-03 00:45:03'),
(13, 8, 15, 'te', 1, '2024-06-05 00:37:53', '2024-06-05 00:37:53'),
(14, 8, 6, 'ffff', 4, '2024-06-05 02:12:23', '2024-06-05 02:12:23'),
(19, 8, 9, 'ssss', 4, '2024-06-09 15:16:58', '2024-06-09 15:16:58'),
(20, 8, 15, 'aaa', 4, '2024-06-09 15:24:28', '2024-06-09 15:24:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2024_05_28_032906_add_columns_to_users_table', 3),
(7, '2014_10_12_000000_create_users_table', 4),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(9, '2019_08_19_000000_create_failed_jobs_table', 4),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(11, '2024_05_13_011235_create_categories_table', 4),
(12, '2024_05_13_011303_create_products_table', 5),
(13, '2024_05_17_011627_create_products_img_table', 5),
(14, '2024_05_28_074631_add_role_to_users_table', 5),
(15, '2024_06_02_153452_create_comments_table', 6),
(16, '2024_06_04_221213_create_orders_table', 7),
(17, '2024_06_04_221231_create_orders_details_table', 8),
(18, '2024_09_13_092135_add_google_id_to_users_table', 8),
(19, '2024_09_13_134755_create_carts_table', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1.đang chờ duyệt\r\n2. đang chuẩn bị\r\n3. xuất hàng\r\n4. đã giao\r\n5. đã hủy đơn',
  `trangthaithanhtoan` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1. chưa thanh toán\r\n2. đã thanh toán',
  `total_money` int NOT NULL DEFAULT '0',
  `total_quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_fullname`, `user_email`, `user_phone`, `user_address`, `trangthai`, `trangthaithanhtoan`, `total_money`, `total_quantity`, `created_at`, `updated_at`) VALUES
(11, 15, 'Nguyễn Quang Trí', 'sieutromsskid@gmail.com', '0394287242', 'quang trung', '3', '1', 250100, 2, '2024-10-02 07:25:46', '2024-10-02 07:28:02'),
(23, 8, 'triszzz', 'nquangtri203@gmail.com', '4343434', 'long an', '1', '2', 1640000, 7, '2024-10-04 09:06:56', '2024-10-04 09:07:17'),
(27, 27, 'quangtri123', 'tri@gmail.com', '4343434', 'tân thành', '1', '2', 250100, 2, '2024-10-07 03:28:34', '2024-10-07 03:29:26'),
(28, 27, 'quangtri123', 'tri@gmail.com', '4343434', 'long an', '1', '2', 310100, 3, '2024-10-07 03:30:28', '2024-10-07 03:30:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(18, 11, 9, 1, 250000, '2024-10-02 07:25:46', '2024-10-02 07:25:46'),
(19, 11, 8, 1, 100, '2024-10-02 07:25:46', '2024-10-02 07:25:46'),
(54, 23, 15, 1, 50000, '2024-10-04 09:06:56', '2024-10-04 09:06:56'),
(55, 23, 6, 2, 500000, '2024-10-04 09:06:56', '2024-10-04 09:06:56'),
(56, 23, 11, 2, 45000, '2024-10-04 09:06:56', '2024-10-04 09:06:56'),
(57, 23, 9, 2, 250000, '2024-10-04 09:06:56', '2024-10-04 09:06:56'),
(69, 27, 8, 1, 100, '2024-10-07 03:28:34', '2024-10-07 03:28:34'),
(70, 27, 9, 1, 250000, '2024-10-07 03:28:34', '2024-10-07 03:28:34'),
(71, 28, 8, 1, 100, '2024-10-07 03:30:28', '2024-10-07 03:30:28'),
(72, 28, 9, 1, 250000, '2024-10-07 03:30:28', '2024-10-07 03:30:28'),
(73, 28, 7, 1, 60000, '2024-10-07 03:30:28', '2024-10-07 03:30:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sieutromsskid@gmail.com', '$2y$12$619V4B095rzX/LPgmgu6b.ndsJzg2VKwJqS0mxzsRKtvu8zKce04u', '2024-06-05 01:05:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quantity` bigint UNSIGNED NOT NULL DEFAULT '0',
  `sold` bigint UNSIGNED NOT NULL DEFAULT '0',
  `view` bigint UNSIGNED NOT NULL DEFAULT '0',
  `categories_id` int UNSIGNED NOT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `sellers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `quantity`, `sold`, `view`, `categories_id`, `trending`, `sellers`, `created_at`, `updated_at`) VALUES
(1, 'quibusdam', 'product1.png', '976.49', 350000.00, 5, 0, 200, 2, '1', '0', '2024-05-12 18:59:39', '2024-05-12 18:59:39'),
(2, 'cumque', 'product2.png', '345.09', 230000.00, 2, 0, 100, 5, '1', '0', '2024-05-12 18:59:39', '2024-05-12 18:59:39'),
(3, 'distinctio', 'product3.png', '450.58', 40000.00, 3, 0, 555, 1, '0', '0', '2024-05-12 18:59:39', '2024-05-12 18:59:39'),
(4, 'non', 'product4.png', '383.99', 22000.00, 5, 0, 355, 1, '0', '0', '2024-05-12 18:59:39', '2024-05-12 18:59:39'),
(5, 'laborum', 'product2.png', '899.52', 20000.00, 5, 0, 242, 5, '1', '0', '2024-05-12 18:59:39', '2024-05-12 18:59:39'),
(6, 'velit', 'product3.png', '504.92', 500000.00, 5, 0, 55, 3, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(7, 'porro', 'product1.png', '661.77', 60000.00, 4, 0, 757, 3, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(8, 'in', 'product5.png', '916.47', 100.00, 8, 0, 242, 4, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(9, 'sint', 'product3.png', '638.65', 250000.00, 8, 0, 2424, 2, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(10, 'qui', 'product6.png', '65.32', 300.00, 8, 0, 224, 1, '0', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(11, 'officiis', 'product4.png', '707.75', 45000.00, 9, 0, 252, 2, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(12, 'quidem', 'product1.png', '563.55', 50000.00, 4, 0, 525, 3, '0', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(13, 'qui', 'product4.png', '168.38', 10000.00, 2, 0, 2524, 1, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(14, 'debitis', 'product3.png', '604.83', 45000.00, 1, 0, 352, 5, '0', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(15, 'et', 'product4.png', '973.14', 50000.00, 3, 0, 252, 2, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(16, 'quae', 'product6.png', '747.83', 330000.00, 2, 0, 858, 4, '0', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(17, 'harum', 'product5.png', '602.93', 1000000.00, 3, 0, 2525, 4, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(18, 'ut', 'product2.png', '922.69', 340000.00, 0, 0, 0, 2, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(19, 'natus', 'product1.png', '266.33', 60000.00, 0, 0, 0, 3, '1', '0', '2024-05-12 19:00:00', '2024-05-12 19:00:00'),
(20, 'est', 'product6.png', '149.08', 600000.00, 3, 0, 0, 2, '1', '0', '2024-05-12 19:00:00', '2024-05-26 05:03:20'),
(44, 'Sản phẩm4444', '1024253.png', 'dddddd', 5000002.00, 23, 0, 0, 2, '0', '0', '2024-05-26 05:07:14', '2024-05-26 17:23:20'),
(45, 'Sản phẩm 1111111', 'Ảnh-Galaxy-Anime-đẹp-nhất.jpg', 'sản phẩm mới', 300000.00, 23, 0, 0, 3, '0', '0', '2024-05-26 17:59:51', '2024-05-26 18:01:32'),
(46, 'Sản phẩm test', '2069216.jpg', 'dcdd', 343434.00, 33, 0, 0, 1, '0', '0', '2024-05-26 18:31:38', '2024-05-26 18:31:38'),
(47, 'Sản phẩm new', '2282120494_preview_tom-adams-winter-cabin-render-not4k.jpg', NULL, 343434.00, 33, 0, 0, 2, '0', '0', '2024-05-26 18:35:19', '2024-06-05 01:14:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_img`
--

CREATE TABLE `products_img` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `token`, `google_id`) VALUES
(8, 'triszzz', NULL, 'nquangtri203@gmail.com', NULL, NULL, '$2y$12$p8PM/u1Qqa3wE3he1K0/VuZL9sU0Sf//nCHXj1EQUcArIj1JSN7bC', '61D7t9ns8DSENay5YC5zeSUF0D3V8D3GXc3WtXUNnBL8DK8BuzyOrZYL8dEL', '2024-06-02 16:49:36', '2024-06-04 11:58:42', 'user', NULL, NULL),
(11, 'qtri123', NULL, 'nquangtri2023@gmail.com', NULL, NULL, '$2y$12$adyYmUdWXuMtvkBmZoj.y.CXBw8hK0AXtvg1m1gWARPFF/nJ/jFDO', NULL, '2024-09-12 02:02:57', '2024-09-12 02:02:57', 'user', NULL, NULL),
(15, 'Quang Trí Nguyễn', NULL, 'sieutromsskid@gmail.com', NULL, NULL, '$2y$12$3Q1QqAVvH9XiZtLNuLhXzuvIrjo8EJPmKf6ZdRcPgv0ER7wB7CRoK', NULL, '2024-09-13 04:13:19', '2024-09-13 04:13:19', 'user', NULL, '115458602810558886965'),
(26, 'quangtri12', NULL, 'nquangtri2003@gmail.com', NULL, NULL, '$2y$12$QQDl4/JWeVNKLEZinJY0s.uTmMe8QCDRItXCzlOJZYOOSF/GI3tQS', NULL, '2024-10-03 03:08:24', '2024-10-03 03:08:24', 'user', NULL, NULL),
(27, 'quangtri123', NULL, 'tri@gmail.com', NULL, NULL, '$2y$12$myb5hBXs8OgOluw53WNF/.vQugEs.l2fXjO3I/tSp3WSj7g9UQo26', NULL, '2024-10-03 03:15:41', '2024-10-03 03:15:41', 'admin', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_details_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `products_img`
--
ALTER TABLE `products_img`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
