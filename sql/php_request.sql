-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-12-21 10:21:51
-- 服务器版本： 10.6.7-MariaDB
-- PHP 版本： 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `php_request`
--

-- --------------------------------------------------------

--
-- 表的结构 `api`
--

CREATE TABLE `api` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0 COMMENT '0接口1目录',
  `method` tinyint(4) DEFAULT 0 COMMENT '0get 1post 2put 3delete',
  `url` varchar(1000) DEFAULT NULL,
  `header` text DEFAULT NULL,
  `params` text DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT 0,
  `body` text DEFAULT NULL,
  `result` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `api`
--

INSERT INTO `api` (`id`, `name`, `type`, `method`, `url`, `header`, `params`, `created_at`, `updated_at`, `user_id`, `project_id`, `p_id`, `body`, `result`) VALUES
(1, '用户管理', 1, 0, NULL, NULL, NULL, 1671528131, 1671528131, NULL, 2, 0, NULL, NULL),
(2, 'test', 1, 0, NULL, NULL, NULL, 1671528191, 1671528191, NULL, 2, 1, NULL, NULL),
(3, '訂單管理', 0, 0, NULL, NULL, NULL, 1671587416, 1671587416, NULL, 2, 2, NULL, NULL),
(4, '234', 1, 0, NULL, NULL, NULL, 1671590955, 1671590955, NULL, 2, 0, NULL, NULL),
(5, 'eee', 1, 0, NULL, NULL, NULL, 1671592024, 1671592024, NULL, 2, 0, NULL, NULL),
(6, '111', 1, 0, NULL, NULL, NULL, 1671592104, 1671592104, NULL, 2, 0, NULL, NULL),
(7, 'aaa', 1, 0, NULL, NULL, NULL, 1671592531, 1671592531, NULL, 2, 5, NULL, NULL),
(8, '222', 1, 0, NULL, NULL, NULL, 1671592555, 1671592555, NULL, 2, 4, NULL, NULL),
(9, 'test', 1, 0, NULL, NULL, NULL, 1671605031, 1671605031, NULL, 1, 0, NULL, NULL),
(10, '她她她', 1, 0, NULL, NULL, NULL, 1671605423, 1671605423, NULL, 1, 9, NULL, NULL),
(11, '555', 1, 0, NULL, NULL, NULL, 1671605439, 1671605439, NULL, 1, 10, NULL, NULL),
(12, '测试接口33', 0, 0, 'https://builduup.henmei.de/api/notify/async_paypal', '[]', '[{\"name\":\"id\",\"value\":\"1\",\"type\":\"int\",\"description\":\"文件id\"},{\"name\":\"name\",\"value\":\"张三\",\"type\":\"string\",\"description\":\"姓名\"}]', 1671609196, 1671611385, 3, 1, 9, '[]', NULL),
(13, 'ttt', 0, 0, 'http://34.92.196.202/andypma/index.php?route=/sql&pos=0&db=builduup_novalab&table=store_income_log', NULL, '[{\"name\":\"we\",\"value\":\"we\",\"type\":\"string\",\"description\":\"234\"},{\"name\":null,\"value\":null,\"type\":\"string\",\"description\":null},{\"name\":null,\"value\":null,\"type\":\"string\",\"description\":null}]', 1671609327, 1671609327, 3, 1, 11, NULL, NULL),
(14, '666', 0, 0, 'https://builduup.henmei.de/api/notify/async_paypal', '[{\"name\":null,\"value\":null,\"type\":\"string\",\"description\":null}]', '[{\"name\":\"234\",\"value\":\"234\",\"type\":\"string\",\"description\":\"234\"}]', 1671609743, 1671614233, 3, 1, 9, '[{\"name\":\"234333\",\"value\":\"334\",\"type\":\"string\",\"description\":\"34\"}]', NULL),
(15, '234', 0, 1, 'http://192.168.31.76:12011/home/main/index/id/1', '[]', '[]', 1671609954, 1671616105, 3, 1, 11, '[{\"name\":\"id\",\"value\":\"1\",\"type\":\"string\",\"description\":null},{\"name\":\"name\",\"value\":\"张三\",\"type\":\"string\",\"description\":null}]', NULL),
(16, '434', 0, 0, '2343', '[]', '[{\"name\":\"234\",\"value\":\"234\",\"type\":\"string\",\"description\":null}]', 1671609985, 1671609985, 3, 1, 11, '[]', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '项目名称',
  `description` text DEFAULT NULL COMMENT '简介',
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='项目表';

--
-- 转存表中的数据 `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test项目', '333', 3, 1671517742, 1671517742, NULL),
(2, 'test2项目', '333234', 3, 1671517802, 1671517802, NULL),
(3, 't二维图问3', '234', 3, 1671517814, 1671517814, NULL),
(4, 'T234T', '23433', 3, 1671521582, 1671522034, NULL),
(5, 'T234T', '23433ee', 3, 1671522034, 1671522057, NULL),
(6, 'T234T', '23433ee', 3, 1671522057, 1671522057, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `last_login_ip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login_time`, `last_login_ip`) VALUES
(3, 'tangwei', '996501126@qq.com', NULL, '$2y$10$ITOD1OydFkZDDu16W46ieOTBUUYSI6gnZacdM36H0OKla1UuWvFBm', NULL, '2022-12-19 06:04:41', '2022-12-21 01:04:02', 1671584642, '127.0.0.1'),
(4, 'ttt', 'test1@qq.com', NULL, '$2y$10$NXd39DbxrKwcepFMjVpZF.DI1r1PxZKGG9oMtnA/nXoOeZEWTwc7m', NULL, '2022-12-19 08:25:46', '2022-12-19 08:25:46', NULL, NULL),
(5, 'ttt', 'admin@123.com', NULL, '$2y$10$8E0praDB9oyxjD02DXhfFe4QD6fIHYyHri4ZPDbr/aGcvz39V8t2G', NULL, '2022-12-19 08:27:16', '2022-12-19 08:27:16', NULL, NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 表的索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 表的索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 表的索引 `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `api`
--
ALTER TABLE `api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用表AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
