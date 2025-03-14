-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 14 2025 г., 13:30
-- Версия сервера: 8.0.41-0ubuntu0.24.04.1
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazine`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `image_path` text,
  `slug` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `sort` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`id`, `title`, `description`, `parent_id`, `image_path`, `slug`, `sort`, `created_at`, `updated_at`, `supplier_id`) VALUES
(8, 'Ручки', NULL, NULL, '8e0t9VgQxTRjnF5fKhb9Z1QMjPyL8lgKBQCnG4Fv.jpg', 'ruchki', 11, NULL, '2024-12-03 15:37:36', 0),
(9, 'Карандаши', NULL, NULL, NULL, 'karandashi', 3, NULL, '2024-11-01 18:01:24', 0),
(10, 'Краски', NULL, NULL, NULL, 'kraski', 1, NULL, '2024-11-01 18:01:24', 0),
(11, 'Кисти', NULL, NULL, NULL, 'kisti', 13, NULL, '2024-11-01 18:01:24', 0),
(12, 'Холсты', NULL, NULL, NULL, 'xolsty', 13, NULL, '2024-11-01 18:01:24', 0),
(13, 'Альбомы', NULL, NULL, NULL, 'albomy', 7, NULL, '2024-11-01 18:01:24', 0),
(14, 'Блакноты', NULL, NULL, NULL, 'blaknoty', 11, NULL, '2024-11-01 18:01:24', 0),
(16, 'масялянные краски', 'Это масляные краски!', NULL, NULL, 'maslyanie-kraski', NULL, '2024-11-17 13:01:55', '2024-11-17 13:01:55', 0),
(17, 'тестовая', 'тестовая', NULL, NULL, 'ma', NULL, '2024-11-17 13:11:48', '2024-11-17 13:11:48', 0),
(18, 'тестовая', 'тестовая', NULL, NULL, 'ma', NULL, '2024-12-02 16:46:34', '2024-12-02 16:46:34', 0),
(19, 'тестоваядлябля', 'тестовая', NULL, NULL, 'ma', NULL, '2024-12-02 16:57:04', '2024-12-02 16:57:04', 0),
(20, 'маслянные краски', 'маслянные краски', NULL, 'KYU0Y0esWlJ8Z0MUTUFiOrbDF9IXsk9jwT26C3o7.jpg', 'maslyanie-kraski', NULL, '2024-12-03 16:33:32', '2025-03-11 18:35:40', 0),
(21, 'тестовая', 'тестовая', NULL, 'ChSmoDMdVMfdXwim1dMNUWTWks4GYkk7NhjYAUIX.jpg', 'magla', NULL, '2024-12-03 16:53:46', '2025-03-11 18:38:10', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` text NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `count` int NOT NULL,
  `image_src` varchar(124) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Type` varchar(124) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `price`, `count`, `image_src`, `Type`, `created_at`, `updated_at`) VALUES
(22, NULL, 'abba', 4103.00, 12, NULL, 'Ручки', NULL, '2025-01-24 12:14:00'),
(23, 11, 'abba', 2852.00, 45, NULL, 'Кисти', NULL, NULL),
(24, NULL, 'ddd', 2700.00, 1, NULL, 'Карандаши', NULL, NULL),
(25, 11, 'blueSky', 2664.00, 1, NULL, 'Кисти', NULL, NULL),
(26, NULL, 'blueSky', 4062.00, 8, NULL, 'Карандаши', NULL, NULL),
(27, 11, 'blueSky', 4023.00, 1, NULL, 'Кисти', NULL, NULL),
(28, 11, 'blueSky', 1118.00, 5, NULL, 'Кисти', NULL, NULL),
(29, NULL, 'ddd', 724.00, 10, NULL, 'Ручки', NULL, NULL),
(30, NULL, 'blueSky', 1508.00, 6, NULL, 'Краски', NULL, NULL),
(31, NULL, 'ddd', 2080.00, 5, NULL, 'Ручки', NULL, NULL),
(32, 11, 'blueSky', 1118.00, 5, '5', 'null', '2025-01-08 17:15:09', '2025-01-08 17:15:09'),
(33, 11, 'blueSky', 1118.00, 5, '5', 'null', '2025-01-08 17:15:30', '2025-01-08 17:15:30'),
(34, 11, 'blueSky', 1118.00, 5, 'null', 'Кисти', '2025-01-08 17:18:14', '2025-01-08 17:18:14');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2020_10_04_115514_create_moonshine_roles_table', 1),
(16, '2020_10_05_173148_create_moonshine_tables', 1),
(17, '2022_04_14_115549_create_moonshine_change_logs_table', 1),
(18, '2022_12_19_115549_create_moonshine_socialites_table', 1),
(19, '2023_01_20_173629_create_moonshine_user_permissions_table', 1),
(20, '2024_10_31_145231_add_parent_id_field_to_category', 1),
(21, '2024_10_31_152438_add_fields_to_category', 1),
(22, '9999_12_20_173629_create_notifications_table', 1),
(24, '2024_11_01_184554_edit_fileds_in_category', 2),
(26, '2024_11_17_204635_create_suppliers_table', 3),
(27, '2024_11_24_121006_add_is_supplier_field_to_users', 4),
(29, '2024_11_01_191837_rename_field_to_category', 5),
(30, '2025_01_08_191621_add_time-stamps_fileds_to_goods', 6),
(33, '2025_01_22_200739_edit_goods_product_table', 7),
(34, '2025_01_22_233248_add_quantity_filed_to_goods', 8),
(35, '2025_01_23_195635_delete_excess_filed_to_goods', 9),
(37, '2025_01_26_173128_add_active_field_to_user_products', 10),
(39, '2025_02_10_113424_create_sessions_table', 11),
(40, '2025_02_17_180107_add_fields_to_orders', 12),
(59, '2025_02_17_211444_create_order_items_table', 13),
(60, '2025_02_17_211624_add_fields_to_order_table', 14),
(61, '2025_02_17_211727_edit_column_to_goods', 15),
(62, '2025_02_19_101008_delete_extra_fields_to__orders', 16),
(63, '2025_02_19_232248_add_price_field_to_users_goods', 17),
(64, '2025_03_02_102501_edit_fields_to_order_items', 18),
(65, '2025_03_10_161345_add_field_to_orders', 19);

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_change_logs`
--

CREATE TABLE `moonshine_change_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_id` bigint UNSIGNED NOT NULL,
  `changelogable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `changelogable_id` bigint UNSIGNED NOT NULL,
  `states_before` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `states_after` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_socialites`
--

CREATE TABLE `moonshine_socialites` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_id` bigint UNSIGNED NOT NULL,
  `driver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_users`
--

CREATE TABLE `moonshine_users` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_role_id` bigint UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moonshine_users`
--

INSERT INTO `moonshine_users` (`id`, `moonshine_user_role_id`, `email`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chopoko@mail.ru', '$2y$10$UgIs/c0WZzn37Jz638Kng.iCLcdfzE.nr9btZ079VHvwNOP7skc/W', 'Chopoko', NULL, '07pSRxtdZzB9vwfuaZAEpmnWJ77wVabBErpquv6tMyY5ebnfhbvu1QlxCbqL', '2024-10-31 14:02:01', '2024-10-31 14:02:01');

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_permissions`
--

CREATE TABLE `moonshine_user_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `moonshine_user_id` bigint UNSIGNED NOT NULL,
  `permissions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_roles`
--

CREATE TABLE `moonshine_user_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moonshine_user_roles`
--

INSERT INTO `moonshine_user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-10-31 13:57:57', '2024-10-31 13:57:57');

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Orders`
--

CREATE TABLE `Orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `e-mail` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `total_price` decimal(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `status` enum('accepted','cancelled','in_procces') NOT NULL DEFAULT 'in_procces'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Orders`
--

INSERT INTO `Orders` (`id`, `user_id`, `created_at`, `updated_at`, `e-mail`, `address`, `phone`, `comment`, `total_price`, `status`) VALUES
(15, 26, '2025-03-03 17:47:57', '2025-03-13 04:04:39', 'batraz.tolasovv@gmail.com', 'koloeva 41', '+79696750803', 'доставка', 4103.00, 'accepted');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `quantity` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `goodsId` int NOT NULL,
  `orderId` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `name`, `price`, `quantity`, `user_id`, `goodsId`, `orderId`, `created_at`, `updated_at`, `total_price`) VALUES
(4, 'abba', 4103.00, 1, 26, 22, 15, '2025-03-03 17:47:57', '2025-03-03 17:47:57', 4103.00);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `PaymentMethods`
--

CREATE TABLE `PaymentMethods` (
  `id` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '81bbf1e3aa0efbf333afc8d359060e9bae81aaf13f367b53307246f9b4701dc9', '[\"*\"]', NULL, NULL, '2024-10-31 13:59:28', '2024-10-31 13:59:28'),
(2, 'App\\Models\\User', 1, 'auth_token', 'd45bb0e8cf30b8548a86058f8bbea915830c156865ab383b37360b8df8bf63a4', '[\"*\"]', NULL, NULL, '2024-10-31 13:59:36', '2024-10-31 13:59:36'),
(3, 'App\\Models\\User', 1, 'auth_token', '6636b7c0f1b4fb568b9d9850e248611337934fb588e50b1c685f887c368ded83', '[\"*\"]', NULL, NULL, '2024-10-31 14:06:07', '2024-10-31 14:06:07'),
(4, 'App\\Models\\User', 1, 'auth_token', '688528e32141d2676adec20878c4007becc822e21f79dcfd430761e1128f377d', '[\"*\"]', '2024-10-31 14:15:38', NULL, '2024-10-31 14:08:11', '2024-10-31 14:15:38'),
(5, 'App\\Models\\User', 1, 'auth_token', '276d04e0d36a59cfb185282e96a94373759bb39d5c2b4711f74bbf8bec34a439', '[\"*\"]', NULL, NULL, '2024-10-31 14:11:02', '2024-10-31 14:11:02'),
(6, 'App\\Models\\User', 1, 'auth_token', '7b0ea567d3e2726451d91e2a0a226467922db2846511b584a36d9f33ddfe10e7', '[\"*\"]', NULL, NULL, '2024-10-31 14:11:17', '2024-10-31 14:11:17'),
(7, 'App\\Models\\User', 1, 'auth_token', '45b019676181ec35c904b298b59deb603e97e62f721363e5efd439531cdb9671', '[\"*\"]', NULL, NULL, '2024-10-31 14:22:04', '2024-10-31 14:22:04'),
(8, 'App\\Models\\User', 2, 'auth_token', 'e2cf9966b7b8c99c3432e9851ad15cdf2695ba12c08c0f746fa1b6eca9adf403', '[\"*\"]', NULL, NULL, '2024-10-31 14:22:52', '2024-10-31 14:22:52'),
(9, 'App\\Models\\User', 1, 'auth_token', 'e11cbfbaf46660809fa155aa55af7ac0b578c0a679c26ccb38cc39d394fca881', '[\"*\"]', NULL, NULL, '2024-10-31 14:28:51', '2024-10-31 14:28:51'),
(10, 'App\\Models\\User', 1, 'auth_token', 'cde4764d50f69414f9fbee3b129ab533e354ce23e3bb5e372a89b4d82f7f22ab', '[\"*\"]', NULL, NULL, '2024-10-31 14:29:08', '2024-10-31 14:29:08'),
(11, 'App\\Models\\User', 1, 'auth_token', '7092491a8e02ef4a35b510e965041f70086ca418e200e6132f5e95c552cd91ec', '[\"*\"]', NULL, NULL, '2024-10-31 14:35:26', '2024-10-31 14:35:26'),
(12, 'App\\Models\\User', 1, 'auth_token', 'bebbb94ad71e4e62276189f41044d6fae04b56f581edf69b0af74244f278d21f', '[\"*\"]', NULL, NULL, '2024-10-31 14:36:10', '2024-10-31 14:36:10'),
(13, 'App\\Models\\User', 1, 'auth_token', '1740503121c40eca33395812e61a19f023623acb04ecd056dbdb4267577ee566', '[\"*\"]', NULL, NULL, '2024-10-31 14:52:03', '2024-10-31 14:52:03'),
(14, 'App\\Models\\User', 1, 'auth_token', 'a28db1721ed1167bec6a6d63c20bf2a71f97fbe0f724ed6c3d372e016de71173', '[\"*\"]', '2024-10-31 15:03:36', NULL, '2024-10-31 14:57:11', '2024-10-31 15:03:36'),
(15, 'App\\Models\\User', 1, 'auth_token', '06f2969c8b85624ba7c64690407a9a4fd3cef9b4248ece9b0ebe991df9dcf80c', '[\"*\"]', NULL, NULL, '2024-10-31 16:37:14', '2024-10-31 16:37:14'),
(16, 'App\\Models\\User', 1, 'auth_token', '87df0fa520539bce0e6c3544980816874e9ad83c0a05b895f38cfe08c81be5c1', '[\"*\"]', NULL, NULL, '2024-10-31 16:37:26', '2024-10-31 16:37:26'),
(17, 'App\\Models\\User', 3, 'auth_token', '79d25a14c794a8df336277215ce5bcd49a8d8257fa1f1815ce386949e5fb10f7', '[\"*\"]', NULL, NULL, '2024-10-31 17:20:51', '2024-10-31 17:20:51'),
(18, 'App\\Models\\User', 1, 'auth_token', 'c26585d3f29c2713ab2c3c9d72c59941b3b173dc03316b3a1103c0de275e3c23', '[\"*\"]', NULL, NULL, '2024-10-31 17:21:05', '2024-10-31 17:21:05'),
(19, 'App\\Models\\User', 1, 'auth_token', '4456aeef85b86866ff2c59431f2bb669e2ca8588b8dc74a614fc5f02d28b445e', '[\"*\"]', NULL, NULL, '2024-11-01 14:23:20', '2024-11-01 14:23:20'),
(20, 'App\\Models\\User', 1, 'auth_token', '646d0d621c73714ddcf5d8df92dd12b72492bb74c851789fb7d0da62a4b0059c', '[\"*\"]', NULL, NULL, '2024-11-01 14:23:31', '2024-11-01 14:23:31'),
(21, 'App\\Models\\User', 1, 'auth_token', 'b71f344e4bafd6ca2abe6ebd3d82dd284472d50cf2711a4c6dfdf2089c88ae6f', '[\"*\"]', NULL, NULL, '2024-11-01 14:27:43', '2024-11-01 14:27:43'),
(22, 'App\\Models\\User', 1, 'auth_token', '6d022cbd9755b510b684fe2382b727b1eb46dac1d504d9e22dade1ef4d2d54c7', '[\"*\"]', NULL, NULL, '2024-11-01 14:29:21', '2024-11-01 14:29:21'),
(23, 'App\\Models\\User', 1, 'auth_token', '8b9fa12004957b4856612b8429049cb78201ec1ff2aef99dec50b95ce88a3254', '[\"*\"]', NULL, NULL, '2024-11-01 14:47:45', '2024-11-01 14:47:45'),
(24, 'App\\Models\\User', 1, 'auth_token', '6aab7465f1b181e1cb93941ec062f3c112244d2e52b76ec3db3163cc0885b41a', '[\"*\"]', NULL, NULL, '2024-11-17 12:05:24', '2024-11-17 12:05:24'),
(25, 'App\\Models\\User', 1, 'auth_token', '3c868ac882d5325fcb1e84be10aa1905ba5d3c137bd601a9ee315eb827c634af', '[\"*\"]', NULL, NULL, '2024-11-17 12:09:39', '2024-11-17 12:09:39'),
(26, 'App\\Models\\User', 4, 'auth_token', 'ee2b356b61d27017c2102a780c78683aa296f9d6e43dee2117e6658b911cc615', '[\"*\"]', '2024-11-17 12:17:09', NULL, '2024-11-17 12:11:34', '2024-11-17 12:17:09'),
(27, 'App\\Models\\User', 1, 'auth_token', '2a508a2193444be3361abebe2f7c3b91ef77734dfd784ef767740bb2103fb6bc', '[\"*\"]', NULL, NULL, '2024-11-17 12:23:52', '2024-11-17 12:23:52'),
(28, 'App\\Models\\User', 1, 'auth_token', '1dbd383b32ae5d5bc903b033b61624e610e3c7f12b6abc05735ace378cb173c6', '[\"*\"]', NULL, NULL, '2024-11-17 12:24:02', '2024-11-17 12:24:02'),
(29, 'App\\Models\\User', 5, 'auth_token', 'da00b7da82966634697cb8cf517a9518adb1fa7d6a73fbc36bcf1743f952050a', '[\"*\"]', NULL, NULL, '2024-11-17 13:10:34', '2024-11-17 13:10:34'),
(30, 'App\\Models\\User', 5, 'auth_token', '596fe87329230a1fd522fa00eb53cc3d448c4e22a5aef8591c89906cd108c2e8', '[\"*\"]', NULL, NULL, '2024-11-17 13:10:49', '2024-11-17 13:10:49'),
(31, 'App\\Models\\User', 6, 'auth_token', 'd868d4ff170707fe98c8b410c8f9a908ede4f0c47e30fa24e6c3de07ea09cdd4', '[\"*\"]', NULL, NULL, '2024-11-22 07:25:24', '2024-11-22 07:25:24'),
(32, 'App\\Models\\User', 17, 'auth_token', '9d9d458a13d88303364d29ec2f259d5f16aa0cfafca16704ccc3917b4ec7ae65', '[\"*\"]', NULL, NULL, '2024-11-24 16:11:32', '2024-11-24 16:11:32'),
(33, 'App\\Models\\User', 18, 'auth_token', 'e44cd268bf10658f46eab78c90ce79866bfa15c68683b24847d2810e82fea93c', '[\"*\"]', NULL, NULL, '2024-11-24 17:07:13', '2024-11-24 17:07:13'),
(34, 'App\\Models\\User', 19, 'auth_token', '38cdbd25588e7b3734f159e78898b6d9784377226455529f2cf8e64a17d04998', '[\"*\"]', NULL, NULL, '2024-11-24 17:07:39', '2024-11-24 17:07:39'),
(35, 'App\\Models\\User', 22, 'auth_token', '28e4efd3e725d6f693493f3f256b21b73cc5553bb986815689a264d59d0e00c1', '[\"*\"]', NULL, NULL, '2024-11-24 17:10:21', '2024-11-24 17:10:21'),
(36, 'App\\Models\\User', 23, 'auth_token', 'a79b1f00e75ba3b271a820131979d051bd7d3b6d9bc8979e32d6c5e5a66b1335', '[\"*\"]', NULL, NULL, '2024-12-02 16:24:57', '2024-12-02 16:24:57'),
(37, 'App\\Models\\User', 24, 'auth_token', 'be75b3c2e10649966b12ec74c8ac483609b8afc5da7c2514ea8a94ba1e753eb1', '[\"*\"]', NULL, NULL, '2024-12-02 16:47:36', '2024-12-02 16:47:36'),
(38, 'App\\Models\\User', 25, 'auth_token', '0bcae359ce4473820674a9ced7068a1928b30ce48e49be33e137bffe65b4742d', '[\"*\"]', NULL, NULL, '2024-12-02 16:51:59', '2024-12-02 16:51:59'),
(39, 'App\\Models\\User', 26, 'auth_token', '2a2b2108aa56ce402990a929958c281ab172a26d4da9573ddb610d70ce32ed85', '[\"*\"]', NULL, NULL, '2024-12-02 16:54:02', '2024-12-02 16:54:02'),
(40, 'App\\Models\\User', 26, 'auth_token', '29294ac24694e2ffb3f4369868ec15ee85b3dc29e8a7112954be177df8649cd9', '[\"*\"]', NULL, NULL, '2024-12-02 16:55:52', '2024-12-02 16:55:52'),
(41, 'App\\Models\\User', 26, 'auth_token', '6ac23ca02fd761c630b796aab7e3552507b3c36269df6e4f2db0169df9587cb0', '[\"*\"]', NULL, NULL, '2024-12-02 16:56:58', '2024-12-02 16:56:58'),
(42, 'App\\Models\\User', 26, 'auth_token', '0f4e7c4669924e199fead891edc1e7cdaffd1a1b56ed7004a2914b024c514f42', '[\"*\"]', NULL, NULL, '2025-02-10 08:37:41', '2025-02-10 08:37:41'),
(43, 'App\\Models\\User', 26, 'auth_token', '14742cffb2cc938e8d990cc77b4c48749ce238f6fcb3972fb9cf8aa7a0104a21', '[\"*\"]', NULL, NULL, '2025-03-02 05:45:33', '2025-03-02 05:45:33');

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5DyZzjoDZPaf1lKjYHW2LKDGhfEaQoGNctjnRQon', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRGE4SHJTa1RGdHlnUnVkY0M0elJ0ZkM0NXBlSUxKajFURFlDdFZwdyI7czo1NjoibG9naW5fbW9vbnNoaW5lXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIzOiJwYXNzd29yZF9oYXNoX21vb25zaGluZSI7czo2MDoiJDJ5JDEwJFVnSXMvYzBXWnpuMzdKejYzOEtuZy5pQ0xjZGZ6RS5ucjlidFowNzlWSHZ3Tk9QN3NrYy9XIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NzoiaHR0cDovLzEyNy4wLjAuMTo4MS9tb29uc2hpbmUvcmVzb3VyY2Uvb3JkZXJzLXJlc291cmNlLzE1Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741850322),
('DbrI4l1E1Fqo1V4IhdujmCLZ8j985I7TDubMNPq7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT1pkZFdsNGhjWWQ0Wk9mSGxZZnMwOUh1aW5xd2lUWk05dU5xYTE5diI7czo1NjoibG9naW5fbW9vbnNoaW5lXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIzOiJwYXNzd29yZF9oYXNoX21vb25zaGluZSI7czo2MDoiJDJ5JDEwJFVnSXMvYzBXWnpuMzdKejYzOEtuZy5pQ0xjZGZ6RS5ucjlidFowNzlWSHZ3Tk9QN3NrYy9XIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1NDoiaHR0cDovLzEyNy4wLjAuMTo4MS9tb29uc2hpbmUvcmVzb3VyY2Uvb3JkZXJzLXJlc291cmNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741809205),
('n7Iu4kn7ipOgqWHfXUDdrhahbRRXDr3R9gtpqNNe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFh4SkllYzBzem5MQnhMV09RR0VEZXBCdTFpM0FXenREd0l6Z0tHUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NzoiaHR0cDovLzEyNy4wLjAuMTo4MS9tb29uc2hpbmUvcmVzb3VyY2Uvb3JkZXJzLXJlc291cmNlLzE1Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODEvbW9vbnNoaW5lL3Jlc291cmNlL29yZGVycy1yZXNvdXJjZS8xNSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741849033),
('TlnpxvEBXYwRyDEUqaUiv6BJj3FLxLiqRGOUQdDt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU1gycllDN0p6b1F2b1MydG81QXRSaWFiOWhkSWdXUlNkNThvQVFrdCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1NDoiaHR0cDovLzEyNy4wLjAuMTo4MS9tb29uc2hpbmUvcmVzb3VyY2Uvb3JkZXJzLXJlc291cmNlIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODEvbW9vbnNoaW5lL3Jlc291cmNlL29yZGVycy1yZXNvdXJjZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741849574);

-- --------------------------------------------------------

--
-- Структура таблицы `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_adress` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `company_name`, `company_adress`, `bank_name`, `contact_person`, `created_at`, `updated_at`) VALUES
(1, 17, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-11-24 16:11:32', '2024-11-24 16:11:32'),
(2, 18, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-11-24 17:07:13', '2024-11-24 17:07:13'),
(3, 19, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-11-24 17:07:39', '2024-11-24 17:07:39'),
(4, 22, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-11-24 17:10:21', '2024-11-24 17:10:21'),
(5, 23, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-12-02 16:24:57', '2024-12-02 16:24:57'),
(6, 26, 'ChopokoIndestries', 'koloeva_41', 'VTB', 'DoomBoy', '2024-12-02 16:54:02', '2024-12-02 16:54:02');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_supplier` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_supplier`) VALUES
(1, '123123fg', 'Test@mail.ru', NULL, '$2y$10$cUS6VfOsP4o8jzdZH1PIFOZZ8TM2uZ9joVO263jos7CavgJdfkGWO', '1|6D5EeufpYUCpSN8q4mdV6UxuomDBusYyJcYKPK6m651be43b', '2024-10-31 13:59:27', '2024-10-31 13:59:28', 0),
(2, '123123fg', 'Test1@mail.ru', NULL, '$2y$10$0qWdgV2XiZWRzit5pVJyPeL2WWwSrQ0Z1zSXqzWUsDzgE8ro5D6L2', '8|S2L314PSoW9oDmbroRvWgnQhlGGAbow2xAzotRMzfcff291c', '2024-10-31 14:22:52', '2024-10-31 14:22:52', 0),
(3, '123123fg', 'Test31@mail.ru', NULL, '$2y$10$RCdgCBr0BZhleNR/9Bi/vumXtTLTaWBr2k1VI4c0xHwmafa/eSsnC', '17|yapzZkWzKIq9QBXLnpA46RciQZBjuondBLWOwAVgfa5460fe', '2024-10-31 17:20:51', '2024-10-31 17:20:51', 0),
(4, '123123fg', 'Test311@mail.ru', NULL, '$2y$10$Z46jrSWlobVa09b6IU.ZXOUpy6eEx/5BtEjqczOpDPfPa6v1yYXMa', '26|NhoySKxY6JmeTjkBDpRU9smpeA9gafTWjr4Qm2dvf11d33d4', '2024-11-17 12:11:34', '2024-11-17 12:11:34', 0),
(5, '123123fg', 'Testp@mail.ru', NULL, '$2y$10$wbqHLSIRaCopz8Xdz/t3webCAigIPNWODK/QvMFWW94AgwQRN87dq', '5JJFufJSyN1MiLXEtxFvl9Wpx9L45o9FsBtpx4WS320d140c', '2024-11-17 13:10:34', '2024-11-17 13:10:34', 0),
(6, 'macho', 'batraz.toalso@mail.u', NULL, '$2y$10$oOX65xfwDSDyYj4r46PAZelux0ljMC3nvXwhPvLxwoM0YKkbvXcyS', 'cui0yHM5vdpcqAZlAJxRgUNVAXSkChifmeOOTjLC109b64c3', '2024-11-22 07:25:23', '2024-11-22 07:25:24', 0),
(7, '123123fg', 'postavchik@mail.ru', NULL, '$2y$10$Y1JZLgzkUxGT4bzGTpdbFOwOj/Ua1ZJeYFMjJw6JToUJgl7sihvvm', NULL, '2024-11-24 16:03:09', '2024-11-24 16:03:09', 0),
(8, '123123fg', 'postavchik1@mail.ru', NULL, '$2y$10$KsownpYF0xaoOhJXeCc2me.EFn/DcEPXQ3tI0mBzSgFKH5xadA4ta', NULL, '2024-11-24 16:04:12', '2024-11-24 16:04:12', 0),
(9, '123123fg', 'postavchik2@mail.ru', NULL, '$2y$10$Za3hPNM.NMbeaEvg7HipD.w25R6IXKgRRgG/44bv7LcVACnNq4ygG', NULL, '2024-11-24 16:05:54', '2024-11-24 16:05:54', 0),
(10, '123123fg', 'postavchik3@mail.ru', NULL, '$2y$10$f1F1t.0WDJMMK5IuppD2lOsMxARDvHzqmT1kuHH57N09L0zadZaVa', NULL, '2024-11-24 16:07:57', '2024-11-24 16:07:57', 0),
(11, '123123fg', 'postavchik4@mail.ru', NULL, '$2y$10$GwAtnu73EyzrEqhxo8bVZegqnRa0xdoEK9DEHWDiRr1kLr1.oL7.G', NULL, '2024-11-24 16:08:14', '2024-11-24 16:08:14', 0),
(12, '123123fg', 'postavchik4!@mail.ru', NULL, '$2y$10$YePEnR//OOrMhyvTKwDoNujFbWSs3uAMwpwfWY4sBSjwZCIznHCO2', NULL, '2024-11-24 16:09:13', '2024-11-24 16:09:13', 0),
(13, '123123fg', 'postavchik5!@mail.ru', NULL, '$2y$10$wMmoTyQh0CvD8GBeSYqx8up3EH6M2E23MVGvKxGh/2/1tcuNENI5e', NULL, '2024-11-24 16:10:29', '2024-11-24 16:10:29', 0),
(14, '123123fg', 'postavchik15!@mail.ru', NULL, '$2y$10$ye3JLw6O8deaMCGmq0e4N.dp5vQkehAfUL7Ty7vphjANL0bzFpGYG', NULL, '2024-11-24 16:10:52', '2024-11-24 16:10:52', 0),
(15, '123123fg', 'postavchik125!@mail.ru', NULL, '$2y$10$rAvfSCbBgxAN26LtJfATNuETokMXjV3/qPf8bONFjCKRSZ70xAaqi', NULL, '2024-11-24 16:11:03', '2024-11-24 16:11:03', 0),
(16, '123123fg', 'postavchik1252!@mail.ru', NULL, '$2y$10$3R7fP3OYpGskv8BWmRSoGuQyzdYOeobHdXM1RWH8bUg4bQuOEQSvG', NULL, '2024-11-24 16:11:17', '2024-11-24 16:11:17', 0),
(17, '123123fg', 'postavchik!@mail.ru', NULL, '$2y$10$BNV4Uxk66dd2AM9JurlhYOMGG3bhpJH.1SxH.eLlo6QkkOlyObya.', 'QAx8vhWsBEX1KKdId46EdmH2KwX46EnKK4TwIFOL6870daad', '2024-11-24 16:11:32', '2024-11-24 16:11:32', 0),
(18, '123123fg', 'postavchik1!@mail.ru', NULL, '$2y$10$ny0N1xDJFwQuvN2JU..fz.PC99BO49niFCUZPiN1pfOZqLo4WoC22', 'AxJgkOCbVY8Qjt9BRK6P7MoBvlw6CKQJxJs1KTlT5e81a713', '2024-11-24 17:07:13', '2024-11-24 17:07:13', 0),
(19, '123123fg', 'postavchik11!@mail.ru', NULL, '$2y$10$Fh2EzbgYKJrPuCs/t8QGrOZ3oV9Wl8/30QnFOBCp8c9XyKQ3riNf.', 'LAPWXXwkVKbfWNaJ4JeRSumafpOnz3UjgLrEozxK43060d93', '2024-11-24 17:07:39', '2024-11-24 17:07:39', 0),
(20, '123123fg', 'postavchik11!1@mail.ru', NULL, '$2y$10$JaQuvk0nBNFzP9yAChmqz.J7Pm8uVNKeX1m3ybcx7u7zxX/A9fuya', NULL, '2024-11-24 17:08:28', '2024-11-24 17:08:28', 0),
(21, '123123fg', 'postavchik112!1@mail.ru', NULL, '$2y$10$vhklScLSXv9JDs/w0kBhDOPZxLZc/WODRvEAcQLVphUra2FJaTbCm', NULL, '2024-11-24 17:08:42', '2024-11-24 17:08:42', 0),
(22, '123123fg', 'postavchik1122!1@mail.ru', NULL, '$2y$10$BrawBCh72bP3.Xbz46yKG.v3y4v84Rl6OkGkGROnm3.nmC/sc61Wm', 'ajJPS0dHmPPB7zyfiV1wBcHlxTiHBNzMt8lpNLh55baa99d0', '2024-11-24 17:10:21', '2024-11-24 17:10:21', 1),
(23, '123123fg', 'postavchikTEST@mail.ru', NULL, '$2y$10$IhgUs3YQTGLf9/SSr5VETe3oBg0fyOtFPM0Hz72cJU/NTyAZ1.6yq', 'xDY9MwP1EYknS3caoLH7RzkgsSjlNo1HkEX1PZ445e6d1d03', '2024-12-02 16:24:57', '2024-12-02 16:24:57', 1),
(24, '123123fg', 'NEpostavchikTEST@mail.ru', NULL, '$2y$10$bJBoOiAKw900iU3/QnCbweH6r1b761xQTsXsyZKolL4K9exP5Oejy', 'TY55usBjzaEWR4LkA2V6HYmRyF5MAZCbH89OwLO1c8c0832e', '2024-12-02 16:47:36', '2024-12-02 16:47:36', 0),
(25, '123123fg', 'NEpostavchikTEST1@mail.ru', NULL, '$2y$10$RdqWAYtWwkiDM7Z0VJhhbuVNqInn9DNnMmXYuEHX.JRBSsdNmYKUa', 's1lFSI8fmTvuk6IJfbFWNUnxC63My50ofdGGzAVe0afc21f6', '2024-12-02 16:51:59', '2024-12-02 16:51:59', 0),
(26, '123123fg', 'postavchikTEST2@mail.ru', NULL, '$2y$10$M28V9kdaqwW77qC3QKijSuMVA2mEN0s6e8znxSvGMAWcNGODPTxQ2', 'tApSzFBgJiZSuEOtuiAEoY5M4UvxIXyU3o5nAuxwf50956c8', '2024-12-02 16:54:02', '2025-03-02 05:45:33', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `usersGoods`
--

CREATE TABLE `usersGoods` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `usersID` int NOT NULL,
  `goodsID` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `total_price` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `usersGoods`
--

INSERT INTO `usersGoods` (`id`, `name`, `usersID`, `goodsID`, `quantity`, `created_at`, `updated_at`, `active`, `price`, `total_price`) VALUES
(4, 'abba', 25, 22, 22, '2025-01-23 12:32:39', '2025-02-17 15:36:01', 1, 0.00, 0.00),
(5, 'abba', 25, 22, 1, '2025-01-23 12:58:20', '2025-01-23 12:58:20', 1, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `UsersOld`
--

CREATE TABLE `UsersOld` (
  `id` int NOT NULL,
  `name` varchar(124) NOT NULL,
  `password` varchar(124) NOT NULL,
  `goods` int DEFAULT NULL,
  `orders_id` int DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `UsersOld`
--

INSERT INTO `UsersOld` (`id`, `name`, `password`, `goods`, `orders_id`, `remember_token`, `email`, `updated_at`, `created_at`) VALUES
(1, 'test', '$2y$10$PIcU3gxbxToPffXfu5fAFux5f5cRplBGgSTgTK7tpe0ET75/vaeQS', NULL, NULL, NULL, 'test@mail.ru', '2024-09-15', '2024-09-15'),
(2, 'me', '$2y$10$5qCumn6z/r2KzwL28j6AlulhLR3KOpUt/cP2//As6QX2B7tTzz6ki', NULL, NULL, NULL, 'me@mail.ru', '2024-10-01', '2024-10-01'),
(3, '123123fg', '$2y$10$t9Qwwn8hWcDNyTGCfdhkUO1LWe5DcR3wWkXhzZQ2Rfia9v2DJ4ure', NULL, NULL, NULL, 'me1@mail.ru', '2024-10-06', '2024-10-06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moonshine_change_logs`
--
ALTER TABLE `moonshine_change_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moonshine_change_logs_changelogable_type_changelogable_id_index` (`changelogable_type`,`changelogable_id`);

--
-- Индексы таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`);

--
-- Индексы таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_users_email_unique` (`email`),
  ADD KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`);

--
-- Индексы таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Индексы таблицы `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`),
  ADD KEY `order_items_goodsid_foreign` (`goodsId`),
  ADD KEY `order_items_ibfk_1` (`orderId`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `PaymentMethods`
--
ALTER TABLE `PaymentMethods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `usersGoods`
--
ALTER TABLE `usersGoods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `UsersOld`
--
ALTER TABLE `UsersOld`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `moonshine_change_logs`
--
ALTER TABLE `moonshine_change_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `usersGoods`
--
ALTER TABLE `usersGoods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `UsersOld`
--
ALTER TABLE `UsersOld`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_goodsid_foreign` FOREIGN KEY (`goodsId`) REFERENCES `goods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `Orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
