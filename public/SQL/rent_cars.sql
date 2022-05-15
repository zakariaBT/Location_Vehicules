-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 03:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `company`, `created_at`, `updated_at`) VALUES
(1, 'zakaria', 'zaka', 'zakaria123@gmail.com', '01234', '$2y$10$EjgJWWsQiMgFJBKTGcmaPOaXzrWW4lR1f/4SIVsX.BvmXc.aoY2uO', '', NULL, '2021-09-02 15:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AgencyNumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `AgencyNumber`, `address`, `created_at`, `updated_at`) VALUES
(8, 'agence5', '5', 'RABAT', '2021-09-02 01:05:49', '2021-09-17 12:10:41'),
(12, 'Agence de Fes', '5', 'fes', '2021-09-17 12:00:47', '2021-09-17 12:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payement_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TVA` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `price`, `payement_method`, `TVA`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'F-1', '888', 'Espèce', 20, 1, '2021-09-02 10:25:26', '2021-09-02 10:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(61, '2014_10_12_000000_create_users_table', 1),
(62, '2014_10_12_100000_create_password_resets_table', 1),
(63, '2019_08_19_000000_create_failed_jobs_table', 1),
(64, '2021_08_03_103302_create_vehicules_table', 1),
(65, '2021_08_03_103554_create_agencies_table', 1),
(66, '2021_08_03_103801_create_admins_table', 1),
(67, '2021_08_03_103824_create_contact_us_table', 1),
(68, '2021_08_03_103847_create_invoices_table', 1),
(69, '2021_08_03_103944_create_pages_table', 1),
(70, '2021_08_03_202109_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about`, `terms`, `policy`, `created_at`, `updated_at`) VALUES
(1, '<p>about us</p>', '<p>terms and conditions</p>', '<p>policy and privacy</p>', '2021-08-25 12:20:24', '2021-08-25 12:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicule_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_agency` bigint(20) UNSIGNED NOT NULL,
  `end_agency` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `Status`, `user_id`, `vehicule_id`, `invoice_id`, `start_agency`, `end_agency`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, NULL, 9, 1, NULL, 8, 8, '2021-10-03 10:23:00', '2021-09-16 10:23:00', '2021-09-02 10:23:22', '2021-09-02 10:23:22'),
(2, 'confirmed', 10, 2, 1, 8, 8, '2021-09-10 10:25:00', '2021-09-14 10:25:00', '2021-09-02 10:25:26', '2021-09-02 10:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CIN` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `CIN`, `name`, `email`, `email_verified_at`, `password`, `phone_number`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Dr. Justine Rempel V', 'Sydnie Bogan', 'dietrich.kayley@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 943, 'Beatae laudantium animi vel velit.', 'R15uG73PDT', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(9, 'Mr. Paolo Monahan', 'Margot Ondricka', 'streich.hiram@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 772, 'Eum ea accusantium deleniti est.', 'yPXaBaQeKs', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(10, 'Lee Paucek', 'Magdalena Marquardt', 'clyde25@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 621, 'Veritatis voluptatibus assumenda occaecati cumque error.', 'MIcgGOMHxP', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(11, 'Adan Rath DVM', 'Emelia Kertzmann', 'palma41@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 444, 'Sit sed qui placeat aperiam quis.', '3EUFoDJ5DK', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(12, 'Lesly Anderson', 'Tianna Emard', 'wcarter@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 840, 'Cum earum quia odit libero.', 'AWdeJyLi7s', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(13, 'Prof. Alyce Zemlak', 'Dr. Garnett Blanda', 'wendy.williamson@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 847, 'Aliquam qui aut quasi velit earum.', 'zqOwNiDoQr', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(14, 'Dr. Kiana Wiegand', 'Keira Lueilwitz', 'tillman.erdman@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 848, 'Dolor est ut illo qui qui accusantium.', 'OaI7yIJgmq', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(15, 'Mr. Dejon Wyman', 'Ray Johns', 'kendrick18@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 910, 'Voluptatum numquam voluptas enim quam distinctio sed.', 'Ph3SVsEQxk', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(16, 'Jake Collins', 'Noble Emmerich Jr.', 'druecker@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1031, 'Sed non consequatur enim nihil nulla reprehenderit.', 'P3AXaMe55O', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(17, 'Lucinda Armstrong', 'Deja Eichmann', 'dominic.kutch@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 367, 'Repudiandae expedita sint quis non odit qui.', '9Q6tLOHiAv', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(18, 'Dr. Logan Gislason', 'Deontae Keebler', 'twila30@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 214, 'Nam accusamus animi consectetur et quaerat architecto.', 'J2UEKKjuIC', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(19, 'Charlene Jaskolski', 'Cecil Swift', 'tiana.purdy@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 788, 'Inventore cum nisi quam.', 'b9lC0rU3th', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(20, 'Triston Torphy V', 'Carolina Maggio MD', 'christopher.gulgowski@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 806, 'Facilis totam sit eos fugit rem molestias.', '7gLY8dlJRN', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(21, 'Abbey Jerde', 'Prof. Breana Grant', 'javonte37@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 804, 'Distinctio dolores quo non eaque illo sed.', 'hoOc94ZfHB', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(22, 'Gayle Cartwright', 'Braden Casper III', 'leannon.katherine@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 618, 'Consequatur iste cumque adipisci.', 'LckomYnSiI', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(23, 'Delphia Moore', 'Dr. Sienna Towne', 'ghaley@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 498, 'Consequatur aut et tempora enim alias.', '522vs0G9vi', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(24, 'Columbus Walker', 'Jacky Runte', 'vroob@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 89, 'Ut rerum et dolor repellat aut.', 'jLEWJuUUe1', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(25, 'Garth Reichert PhD', 'Milo Effertz DVM', 'ryann.heathcote@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 215, 'Ut iusto labore nisi nobis.', 'hDoUsP0mCO', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(26, 'Cristal Zieme', 'Milo O\'Conner IV', 'kaelyn21@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 767, 'Nobis quos sint blanditiis.', 'jZShkZVSMV', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(27, 'Savanna Greenholt', 'Mose Keeling', 'hammes.everardo@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 425, 'Beatae et et repellendus.', '1LHnQF0FPt', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(28, 'Pat McDermott', 'Clifton Schumm', 'reilly.waylon@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 990, 'Illo perspiciatis rem mollitia odit.', 'cX41A6Pobz', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(29, 'Ms. Maya Kozey', 'Mac Hermiston', 'curtis78@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 832, 'Modi enim dicta iusto aut.', 'FGp4hTBhSb', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(30, 'Prof. Major Cormier', 'Dr. General Wolff', 'coconner@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 525, 'Voluptatem ex ea et ut debitis.', 'XjhEsYBYiK', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(31, 'Ali Roob', 'Prof. Lou Koss V', 'janis.russel@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 315, 'Natus qui quos facere.', 'KE3NkIcp89', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(32, 'Dillon O\'Connell', 'Isaias Skiles', 'lelah06@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 103, 'Commodi quia impedit et sapiente.', 'waH5lX1e5U', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(33, 'Prof. Vicenta Bahringer', 'William Heaney II', 'diego.streich@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 604, 'Aspernatur similique in ut laborum.', '0KlAVIvU0x', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(34, 'Nadia Schaden', 'Shyann Oberbrunner', 'krajcik.theresa@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 786, 'In nostrum non enim temporibus et doloribus.', 'dVUyyimudb', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(35, 'Audrey Ortiz', 'Tristian Huels', 'jamir22@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 221, 'Impedit enim harum est quibusdam.', 'BfsS2H6PIM', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(36, 'Orlando Murazik', 'Prof. Keegan Tremblay Sr.', 'lucius.ferry@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1054, 'Ut ut corporis quisquam et molestiae non.', '94S2S4YuN8', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(37, 'Julia Heller Jr.', 'D\'angelo Torphy', 'corkery.kaley@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 438, 'Est ab ea amet.', 'vRgHJSqlc0', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(38, 'Rolando Keeling', 'Zachery Price', 'christop.mcdermott@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 880, 'Dolore omnis voluptatem ut quae commodi ea.', 'UpFdt2LlIp', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(39, 'Emmet Gibson I', 'Elyssa Abernathy', 'bayer.moses@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 185, 'Illo numquam ratione accusantium.', 'geeLAFEY6B', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(40, 'Anita Trantow', 'Emely Bergstrom', 'billy.strosin@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 697, 'Laboriosam consequatur libero reiciendis quo quidem.', 'RIHaOC4pq3', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(41, 'Dr. Aleen Mueller', 'Josh Pagac', 'humberto.schoen@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 226, 'Exercitationem maxime aliquid consectetur quis velit facilis.', 'muwk9m9TJK', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(42, 'Casper Runte', 'Stella Mayert', 'kirsten29@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 873, 'Iste et eos quasi qui at repellendus.', 'A8paEeDCV4', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(43, 'Dr. Albina Christiansen', 'Mrs. Danyka Lebsack', 'isaac24@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 308, 'Perferendis omnis dolorum molestiae.', 'jp9t41TOe4', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(44, 'Sarah Littel', 'Fae Goldner', 'nienow.sandy@example.net', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 209, 'Facilis dolorem iste et fugit pariatur sint.', 'aHSyX0Kbr7', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(45, 'Dr. Arvid VonRueden', 'Miss Antonetta Rodriguez III', 'ollie.hettinger@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 630, 'Saepe reprehenderit velit culpa quaerat quibusdam.', 'QpFi4nCLkW', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(46, 'Ressie Reichel', 'May Anderson', 'bhessel@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 802, 'Cumque voluptatum quo et sapiente tempore illum.', 'pFktAg6yl8', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(47, 'Prof. Houston Windler', 'Vivienne Ward', 'magali92@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 759, 'Vel velit laudantium soluta culpa.', 'WkuOB27Zh8', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(48, 'Elvis Daniel', 'Miss Else Schoen', 'wunsch.royce@example.org', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1042, 'Vel facilis dolorem ut perspiciatis est reiciendis.', 'mJgd97TmM4', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(49, 'Juvenal Smith', 'Anibal Hyatt', 'bessie.von@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 659, 'Quia neque voluptas accusantium enim itaque.', 'Gn7rMGWwec', '2021-08-25 12:16:18', '2021-08-25 12:16:18'),
(50, 'Jadon Champlin', 'Dr. Marcia Pacocha PhD', 'swilliamson@example.com', '2021-08-25 12:16:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 955, 'Et eum omnis odit quisquam commodi.', '5JMz5o6AQw', '2021-08-25 12:16:18', '2021-08-25 12:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `licence_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `Passengers_number` int(11) NOT NULL,
  `bagages_number` int(11) NOT NULL,
  `fuel_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_available` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `licence_plate`, `name`, `brand`, `description`, `price`, `Passengers_number`, `bagages_number`, `fuel_type`, `car_available`, `created_at`, `updated_at`) VALUES
(1, 'Z123456', 'BMW6', 'BMW', 'sport', 12, 2, 3, 'Diesel', 'NO', '2021-09-02 10:22:55', '2021-09-02 10:23:22'),
(2, '2', 'AUDI 7', 'AUDI', 'dfg', 222, 2, 5, 'Essence', 'NO', '2021-09-02 10:24:37', '2021-09-02 10:25:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_vehicule_id_foreign` (`vehicule_id`),
  ADD KEY `reservations_invoice_id_foreign` (`invoice_id`),
  ADD KEY `reservations_start_agency_foreign` (`start_agency`),
  ADD KEY `reservations_end_agency_foreign` (`end_agency`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_cin_unique` (`CIN`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehicules_licence_plate_unique` (`licence_plate`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_end_agency_foreign` FOREIGN KEY (`end_agency`) REFERENCES `agencies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_start_agency_foreign` FOREIGN KEY (`start_agency`) REFERENCES `agencies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_vehicule_id_foreign` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicules` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
