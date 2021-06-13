-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-06-2021 a las 07:48:29
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_sensors`
--

CREATE TABLE `data_sensors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensor_device_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_sensors`
--

INSERT INTO `data_sensors` (`id`, `uuid`, `sensor_device_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 'fa3b348d-6f85-429e-adce-d62f79dee1db', 1, 'Humedad:83.00</br>Temperatura:27.90', '2021-06-12 14:09:19', '2021-06-12 14:09:19'),
(2, 'a075faed-139a-428b-b7d7-be4b02d701bf', 1, 'Humedad:81.00</br>Temperatura:28.50', '2021-06-12 14:24:19', '2021-06-12 14:24:19'),
(3, 'c513658a-cfc3-4f43-8a47-155c022ab6ec', 1, 'Humedad:81.00</br>Temperatura:28.50', '2021-06-12 14:39:20', '2021-06-12 14:39:20'),
(4, '1425ef4c-5da8-415d-95a0-7fdd76e083f3', 1, 'Humedad:80.00</br>Temperatura:28.70', '2021-06-12 14:54:21', '2021-06-12 14:54:21'),
(5, 'e9dd9e45-f624-4832-ad1f-572dff75550d', 1, 'Humedad:79.00</br>Temperatura:28.80', '2021-06-12 15:09:22', '2021-06-12 15:09:22'),
(6, '8444b3cc-68f8-4ab7-9158-6e8cc4ea1ed3', 1, 'Humedad:80.00</br>Temperatura:29.00', '2021-06-12 15:24:22', '2021-06-12 15:24:22'),
(7, '36149099-f8b2-48d9-bf74-e11e9144ae75', 1, 'Humedad:78.00</br>Temperatura:29.10', '2021-06-12 15:39:23', '2021-06-12 15:39:23'),
(8, 'f89c3b7b-67ca-4bfb-b37e-d7567df72838', 1, 'Humedad:77.00</br>Temperatura:29.20', '2021-06-12 15:54:24', '2021-06-12 15:54:24'),
(9, '7de15d14-b13f-4219-a039-40919fa01a50', 1, 'Humedad:76.00</br>Temperatura:29.80', '2021-06-12 16:09:25', '2021-06-12 16:09:25'),
(10, 'da494c01-ba71-4c67-b3f5-ca9ac4ffb819', 1, 'Humedad:74.00</br>Temperatura:29.40', '2021-06-12 16:24:26', '2021-06-12 16:24:26'),
(11, '129005d2-a467-49d1-8a36-3a7296c1632c', 1, 'Humedad:76.00</br>Temperatura:29.20', '2021-06-12 16:39:26', '2021-06-12 16:39:26'),
(12, 'a8bf9da8-ba68-4282-b04f-7b530bb0c696', 1, 'Humedad:75.00</br>Temperatura:29.50', '2021-06-12 16:54:27', '2021-06-12 16:54:27'),
(13, '77022404-13c5-4b90-a855-6f172fc65494', 1, 'Humedad:73.00</br>Temperatura:29.60', '2021-06-12 17:09:28', '2021-06-12 17:09:28'),
(14, '4ce990a3-6b42-4515-bf45-8622b9de88a8', 1, 'Humedad:74.00</br>Temperatura:29.50', '2021-06-12 17:24:29', '2021-06-12 17:24:29'),
(15, '84bd5710-33ce-4ab3-b6dd-f6f1bbd5335a', 1, 'Humedad:70.00</br>Temperatura:29.80', '2021-06-12 17:39:30', '2021-06-12 17:39:30'),
(16, 'c84b08fc-8154-499c-b783-7aa030cd7bf8', 1, 'Humedad:69.00</br>Temperatura:29.80', '2021-06-12 17:54:31', '2021-06-12 17:54:31'),
(17, '4d2429a0-f6e5-40d0-8a1e-90c354467e35', 1, 'Humedad:68.00</br>Temperatura:30.00', '2021-06-12 18:09:31', '2021-06-12 18:09:31'),
(18, 'ffb17751-4c1a-46e2-9a6b-45f435469592', 1, 'Humedad:69.00</br>Temperatura:30.10', '2021-06-12 18:24:32', '2021-06-12 18:24:32'),
(19, '515360aa-07d5-4818-ac06-d3e5166920f7', 1, 'Humedad:66.00</br>Temperatura:30.10', '2021-06-12 18:39:33', '2021-06-12 18:39:33'),
(20, '7d62f295-a876-49b4-b639-fe2cdb99393d', 1, 'Humedad:68.00</br>Temperatura:30.00', '2021-06-12 18:54:34', '2021-06-12 18:54:34'),
(21, 'e5870adf-31ab-4dc5-bef1-3a94f6a1a6b2', 1, 'Humedad:71.00</br>Temperatura:30.10', '2021-06-12 19:09:34', '2021-06-12 19:09:34'),
(22, '94a34b25-c724-4e09-bf8c-67847437d1aa', 1, 'Humedad:68.00</br>Temperatura:30.70', '2021-06-12 19:24:35', '2021-06-12 19:24:35'),
(23, 'f391d5e3-6808-4912-8a5e-88b76748e056', 1, 'Humedad:66.00</br>Temperatura:30.70', '2021-06-12 19:39:41', '2021-06-12 19:39:41'),
(24, '39a5dfbe-6051-4003-ba15-fc5c3b03c5b4', 1, 'Humedad:66.00</br>Temperatura:31.00', '2021-06-12 19:54:47', '2021-06-12 19:54:47'),
(25, '564c4b89-d36f-415b-9e99-ea7c13831f40', 1, 'Humedad:66.00</br>Temperatura:31.20', '2021-06-12 20:09:47', '2021-06-12 20:09:47'),
(26, 'e2dddb0f-6c40-4113-8819-f68637ec2ef5', 1, 'Humedad:68.00</br>Temperatura:31.00', '2021-06-12 20:24:48', '2021-06-12 20:24:48'),
(27, '7bfe77f2-4efe-42dc-9774-32f362270b62', 1, 'Humedad:78.00</br>Temperatura:30.30', '2021-06-12 20:39:48', '2021-06-12 20:39:48'),
(28, 'c34d681a-5b28-46f5-8322-28d97b3736f8', 1, 'Humedad:81.00</br>Temperatura:30.00', '2021-06-12 20:54:49', '2021-06-12 20:54:49'),
(29, 'f0c988fd-dc1b-4b78-aa3a-789a1b42918d', 1, 'Humedad:86.00</br>Temperatura:29.70', '2021-06-12 21:09:50', '2021-06-12 21:09:50'),
(30, 'fc4d1cc0-beee-41e6-81be-8f65af728fed', 1, 'Humedad:85.00</br>Temperatura:29.50', '2021-06-12 21:24:51', '2021-06-12 21:24:51'),
(31, '95bb74cc-dcde-445d-b0d8-85482f94fee0', 1, 'Humedad:86.00</br>Temperatura:29.10', '2021-06-12 21:39:52', '2021-06-12 21:39:52'),
(32, '8dd8096a-9fc3-472f-ad22-747ccbe4b332', 1, 'Humedad:86.00</br>Temperatura:29.20', '2021-06-12 21:54:52', '2021-06-12 21:54:52'),
(33, 'e10519c1-e629-47e5-bac7-721715c6ac5f', 1, 'Humedad:87.00</br>Temperatura:29.20', '2021-06-12 22:09:53', '2021-06-12 22:09:53'),
(34, '772a865d-a473-4e0f-8cee-90ee28ab2c95', 1, 'Humedad:87.00</br>Temperatura:29.00', '2021-06-12 22:24:54', '2021-06-12 22:24:54'),
(35, '1439e011-84bf-4c07-a772-e7ef02c7fd83', 1, 'Humedad:76.00</br>Temperatura:29.80', '2021-06-12 22:54:09', '2021-06-12 22:54:09'),
(36, 'd91a59c5-f8bf-4885-afb1-f9a5b8b2a0e3', 1, 'Humedad:76.00</br>Temperatura:29.80', '2021-06-12 23:09:11', '2021-06-12 23:09:11'),
(37, '20c812c3-7853-4f75-a8e7-6c7d614b09ad', NULL, 'Humedad:76.00</br>Temperatura:30.30', '2021-06-12 23:24:12', '2021-06-12 23:24:12'),
(38, 'a53b31e3-ffd9-41d5-b896-342a971bf0df', 2, 'Humedad:86.00</br>Temperatura:29.50', '2021-06-12 23:46:53', '2021-06-12 23:46:53'),
(39, '62dbee03-a6b7-4737-bb48-2bafaa6f89cf', 2, 'Humedad:88.00</br>Temperatura:29.20', '2021-06-13 00:01:53', '2021-06-13 00:01:53'),
(40, '32b2dbe8-3ae5-4a04-82fa-5f71bfae3236', 2, 'Humedad:89.00</br>Temperatura:29.20', '2021-06-13 00:16:54', '2021-06-13 00:16:54'),
(41, '13bb2617-bc41-41c4-a5d4-fd6c85b2b757', 2, 'Humedad:88.00</br>Temperatura:29.10', '2021-06-13 00:31:55', '2021-06-13 00:31:55'),
(42, '1a6ddd8a-9530-4119-a62f-b3278027c66d', 2, 'Humedad:87.00</br>Temperatura:28.10', '2021-06-13 00:46:56', '2021-06-13 00:46:56'),
(43, '018c3e02-a7c1-4a1f-92d1-c582522e367d', 2, 'Humedad:88.00</br>Temperatura:29.00', '2021-06-13 01:01:57', '2021-06-13 01:01:57'),
(44, '22f463ff-d252-47cb-a431-644d4528e190', 2, 'Humedad:88.00</br>Temperatura:28.80', '2021-06-13 01:16:57', '2021-06-13 01:16:57'),
(45, '642b19d2-298f-4545-a52f-4a3f050829f1', 2, 'Humedad:87.00</br>Temperatura:29.10', '2021-06-13 01:31:58', '2021-06-13 01:31:58'),
(46, 'f79802de-9b12-49c2-9671-922856d67c88', 2, 'Humedad:85.00</br>Temperatura:29.00', '2021-06-13 01:46:59', '2021-06-13 01:46:59'),
(47, 'cf1270ee-854a-4b27-acd2-f68ccf27461a', 2, 'Humedad:84.00</br>Temperatura:29.10', '2021-06-13 02:02:00', '2021-06-13 02:02:00'),
(48, '64952fdb-5881-4f47-a72e-a14574453e74', 2, 'Humedad:83.00</br>Temperatura:28.90', '2021-06-13 02:17:01', '2021-06-13 02:17:01'),
(49, 'a8392bbe-2f68-42bd-9ffc-2a224cb50e14', 2, 'Humedad:83.00</br>Temperatura:29.10', '2021-06-13 02:32:01', '2021-06-13 02:32:01'),
(50, 'ff688bb1-a657-420e-a022-dbe4cdbd9e45', 2, 'Humedad:84.00</br>Temperatura:28.60', '2021-06-13 02:47:02', '2021-06-13 02:47:02'),
(51, '287c58f5-3b11-42b7-8215-bc1192cafb19', 2, 'Humedad:83.00</br>Temperatura:28.60', '2021-06-13 03:02:03', '2021-06-13 03:02:03'),
(52, '8bcdff31-b045-419d-b1d7-51e17b422bc8', 2, 'Humedad:84.00</br>Temperatura:28.70', '2021-06-13 03:17:04', '2021-06-13 03:17:04'),
(53, '97f75e8b-1c92-4aab-b71d-3a3ce435049e', 2, 'Humedad:88.00</br>Temperatura:28.10', '2021-06-13 03:37:01', '2021-06-13 03:37:01'),
(54, '56d8c4d9-e0d5-4c92-993e-4f91a62d04f7', 2, 'Humedad:86.00</br>Temperatura:28.40', '2021-06-13 03:52:02', '2021-06-13 03:52:02'),
(55, 'b47804d7-0473-4eba-98ec-92729bbe5099', 2, 'Humedad:88.00</br>Temperatura:28.10', '2021-06-13 04:07:02', '2021-06-13 04:07:02'),
(56, '09ad8358-07ee-4a55-ab67-6555c2d5f5b0', 2, 'Humedad:88.00</br>Temperatura:28.10', '2021-06-13 04:22:03', '2021-06-13 04:22:03'),
(57, 'c66f84b8-d740-4f17-a921-56507cb7e3f5', 2, 'Humedad:88.00</br>Temperatura:28.00', '2021-06-13 04:37:04', '2021-06-13 04:37:04'),
(58, '347aa39d-1f91-4a86-a10e-b46e1261aae6', 2, 'Humedad:89.00</br>Temperatura:27.80', '2021-06-13 04:52:05', '2021-06-13 04:52:05'),
(59, '6c66b0b0-1ae6-4a39-bea8-530b14561e5b', 2, 'Humedad:89.00</br>Temperatura:27.80', '2021-06-13 05:07:06', '2021-06-13 05:07:06'),
(60, '4440e311-df2c-4130-a349-e1d0f9175dba', 2, 'Humedad:88.00</br>Temperatura:27.90', '2021-06-13 05:22:07', '2021-06-13 05:22:07'),
(61, 'b468172d-d0cf-41f8-9543-24c396c1c34b', 2, 'Humedad:88.00</br>Temperatura:27.70', '2021-06-13 05:37:07', '2021-06-13 05:37:07'),
(62, '2cd05ad6-bc39-439e-85bb-4e4a3deee5be', 2, 'Humedad:89.00</br>Temperatura:27.60', '2021-06-13 05:52:08', '2021-06-13 05:52:08'),
(63, '8264f149-ae0c-47ec-9c26-feffb82b699b', 2, 'Humedad:89.00</br>Temperatura:27.60', '2021-06-13 06:07:09', '2021-06-13 06:07:09'),
(64, 'b08d92c6-8ee7-4ebc-aef1-0ee4bf24e537', 2, 'Humedad:88.00</br>Temperatura:27.50', '2021-06-13 06:22:10', '2021-06-13 06:22:10'),
(65, '238becda-2ef2-447d-80df-4b51aa90429a', 2, 'Humedad:86.00</br>Temperatura:28.20', '2021-06-13 06:37:11', '2021-06-13 06:37:11'),
(66, '8f9a17f6-10e5-4602-af95-cee1be0ce9eb', 2, 'Humedad:85.00</br>Temperatura:28.30', '2021-06-13 06:52:12', '2021-06-13 06:52:12'),
(67, '06295d55-2241-4e25-bbd0-693625497407', 2, 'Humedad:86.00</br>Temperatura:28.00', '2021-06-13 07:07:12', '2021-06-13 07:07:12'),
(68, 'a3190698-7c9b-46c3-b756-b84e461f652e', 2, 'Humedad:85.00</br>Temperatura:28.10', '2021-06-13 07:22:13', '2021-06-13 07:22:13'),
(69, '379e431a-a8ac-4af2-8ee6-355bdca3f630', 2, 'Humedad:85.00</br>Temperatura:28.00', '2021-06-13 07:37:14', '2021-06-13 07:37:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`id`, `uuid`, `nombre`, `token`, `direction_id`, `created_at`, `updated_at`) VALUES
(1, 'cfbf1ff0-efcb-4fd2-b904-b286ddedadb8', 'Dispositivo 1', 'PFPW60c485af4b5c8', 1, '2021-06-12 10:00:15', '2021-06-12 10:00:15'),
(2, '94e4ffc2-fa5a-4b2b-9a2d-846a1dc925fa', 'Dispositivo 2', 'PFPW60c542216c2ac', 1, '2021-06-12 23:24:17', '2021-06-12 23:24:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directions`
--

CREATE TABLE `directions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` text COLLATE utf8mb4_unicode_ci,
  `colony` text COLLATE utf8mb4_unicode_ci,
  `city` text COLLATE utf8mb4_unicode_ci,
  `state` text COLLATE utf8mb4_unicode_ci,
  `cp` text COLLATE utf8mb4_unicode_ci,
  `reference_dir` text COLLATE utf8mb4_unicode_ci,
  `direction_complete` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `directions`
--

INSERT INTO `directions` (`id`, `uuid`, `latitude`, `longitude`, `street`, `colony`, `city`, `state`, `cp`, `reference_dir`, `direction_complete`, `created_at`, `updated_at`) VALUES
(1, '7c920092-d7b7-4efb-b619-e627eab930be', '21.34706674472849', '-98.22210776090166', 'Quinta Minero', 'El Rastro', 'Tantoyuca', 'Veracruz', '92124', NULL, 'Quinta Minero 112, El Rastro, 92124 Tantoyuca, Ver., México', '2021-06-12 10:00:15', '2021-06-12 10:00:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_06_04_231236_create_sessions_table', 1),
(7, '2021_06_04_235633_create_devices_table', 2),
(8, '2021_06_04_235729_create_directions_table', 2),
(9, '2021_06_04_235811_create_type_sensors_table', 2),
(10, '2021_06_04_235926_create_sensor_devices_table', 2),
(13, '2021_06_11_190516_create_data_sensors_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'devices', '689cb7eec2d1b071c93b281caf246286eb9cca64f6535adea30a6b8bcbeeae5a', '[\"read\",\"create\",\"update\",\"delete\"]', '2021-06-13 07:37:14', '2021-06-12 12:37:02', '2021-06-13 07:37:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensor_devices`
--

CREATE TABLE `sensor_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `type_sensors_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sensor_devices`
--

INSERT INTO `sensor_devices` (`id`, `uuid`, `device_id`, `type_sensors_id`, `created_at`, `updated_at`) VALUES
(1, 'eb237829-06f5-43a8-96d0-f71e8c3ea7be', 1, 1, '2021-06-12 11:23:27', '2021-06-12 11:23:27'),
(2, '0cb3bab8-9415-4c88-b7f3-78d2c80661d9', 2, 1, '2021-06-12 23:24:35', '2021-06-12 23:24:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('46CeeMmO1oXyGeRmuXIz7fV8qxETwjxB76ChH6Yo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSXBjUTMzTUk1R2xoZ0ZJcEQzVUFSZll0NExtalEwc3NyVTNKS09aeCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjgxOiJodHRwczovL3Byb3llY3RvZmluYWwudGVzdC9ob21lL2RldmljZXMvc2hvdy9jZmJmMWZmMC1lZmNiLTRmZDItYjkwNC1iMjg2ZGRlZGFkYjgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkYWV3UjcvejhPcC50SEVycDJBVzdWZTBzR09CdnRUdVpydHZiZXBuSWhTYWpqU0lvRlBJMW0iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGFld1I3L3o4T3AudEhFcnAyQVc3VmUwc0dPQnZ0VHVacnR2YmVwbkloU2FqalNJb0ZQSTFtIjt9', 1623570451),
('j4ugVVAgPIWlEyFcruUoLTxZ8J1k65jNmyXKdWph', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiblg2dzZRczJJME1GTHpmdVdjSnNEblpPNXVOR2ZJSWlHQmdvV0Z5dSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODE6Imh0dHBzOi8vcHJveWVjdG9maW5hbC50ZXN0L2hvbWUvZGV2aWNlcy9zaG93L2NmYmYxZmYwLWVmY2ItNGZkMi1iOTA0LWIyODZkZGVkYWRiOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkYWV3UjcvejhPcC50SEVycDJBVzdWZTBzR09CdnRUdVpydHZiZXBuSWhTYWpqU0lvRlBJMW0iO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGFld1I3L3o4T3AudEhFcnAyQVc3VmUwc0dPQnZ0VHVacnR2YmVwbkloU2FqalNJb0ZQSTFtIjt9', 1623541002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_sensors`
--

CREATE TABLE `type_sensors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `type_sensors`
--

INSERT INTO `type_sensors` (`id`, `uuid`, `nombre`, `description`, `created_at`, `updated_at`) VALUES
(1, 'd640af10-d88d-4e78-a375-6ead40ab8124', 'DHT11', 'DHT11 es un sensor de humedad relativa y temperatura.', '2021-06-12 10:31:42', '2021-06-12 10:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Hugo', 'hugodariolc@gmail.com', NULL, '$2y$10$aewR7/z8Op.tHErp2AW7Ve0sGOBvtTuZrtvbepnIhSajjSIoFPI1m', NULL, NULL, NULL, NULL, NULL, '2021-06-05 04:34:03', '2021-06-05 04:34:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `data_sensors`
--
ALTER TABLE `data_sensors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_sensors_uuid_unique` (`uuid`);

--
-- Indices de la tabla `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devices_uuid_unique` (`uuid`);

--
-- Indices de la tabla `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `directions_uuid_unique` (`uuid`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `sensor_devices`
--
ALTER TABLE `sensor_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sensor_devices_uuid_unique` (`uuid`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `type_sensors`
--
ALTER TABLE `type_sensors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_sensors_uuid_unique` (`uuid`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `data_sensors`
--
ALTER TABLE `data_sensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `directions`
--
ALTER TABLE `directions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sensor_devices`
--
ALTER TABLE `sensor_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_sensors`
--
ALTER TABLE `type_sensors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
