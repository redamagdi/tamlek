-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2017 at 03:52 PM
-- Server version: 5.7.18
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `ks_admins`
--

CREATE TABLE `ks_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_admins`
--

INSERT INTO `ks_admins` (`id`, `email`, `username`, `name`, `password`, `last_seen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@kesswa.app', 'admin', 'Kesswa Admin', '$2y$10$vQSpaIJaInwAEmUvkpl8UOH5qgjuwh3c9SuKnVEIj/22hWrKjQNH2', NULL, NULL, '2017-06-18 13:47:46', '2017-06-18 13:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `ks_archives`
--

CREATE TABLE `ks_archives` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_beneficiaries`
--

CREATE TABLE `ks_beneficiaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_cards`
--

CREATE TABLE `ks_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_card_region`
--

CREATE TABLE `ks_card_region` (
  `card_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_companions`
--

CREATE TABLE `ks_companions` (
  `id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_donations`
--

CREATE TABLE `ks_donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `donor_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_donors`
--

CREATE TABLE `ks_donors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_files`
--

CREATE TABLE `ks_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_f_a_qs`
--

CREATE TABLE `ks_f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_f_a_qs_categories`
--

CREATE TABLE `ks_f_a_qs_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_media`
--

CREATE TABLE `ks_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_migrations`
--

CREATE TABLE `ks_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_migrations`
--

INSERT INTO `ks_migrations` (`id`, `migration`, `batch`) VALUES
(154, '2017_03_14_154130_create_admins_table', 1),
(155, '2017_03_28_214926_create_beneficiaries_table', 1),
(156, '2017_04_08_181049_create_companions_table', 1),
(157, '2017_04_09_181411_create_regions_table', 1),
(158, '2017_04_14_194407_create_permissions_table', 1),
(159, '2017_04_15_012346_create_permission_user_table', 1),
(160, '2017_04_15_034708_create_region_admin_table', 1),
(161, '2017_04_23_133858_create_donors_table', 1),
(162, '2017_04_23_133910_create_donations_table', 1),
(163, '2017_04_23_133931_create_products_table', 1),
(164, '2017_05_01_143724_create_f_a_qs_categories_table', 1),
(165, '2017_05_01_214442_create_f_a_qs_table', 1),
(166, '2017_05_03_193357_create_settings_table', 1),
(167, '2017_05_31_004312_create_files_table', 1),
(168, '2017_05_31_004331_create_products_beneficiaries_table', 1),
(169, '2017_06_05_145956_create_visits_table', 1),
(170, '2017_06_10_124006_create_cards_table', 1),
(171, '2017_06_10_124111_create_card_region_table', 1),
(172, '2017_06_10_200801_create_archives_table', 1),
(173, '2017_06_18_140704_create_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ks_permissions`
--

CREATE TABLE `ks_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_permissions`
--

INSERT INTO `ks_permissions` (`id`, `name`, `display_name`, `description`, `guard`) VALUES
(1, 'admins_view', 'مشاهدة المدراء', 'مشاهدة مدراء البرنامج', 'admin'),
(2, 'admins_create', 'إضافة مدير جديد', 'إضافة مدير للبرنامج', 'admin'),
(3, 'admins_update', 'تعديل المدراء', 'تعديل مدير موجود مسبقاً بالبرنامج', 'admin'),
(4, 'admins_delete', 'حذف المدراء', 'حذف مدير موجود مسبقاً بالبرنامج', 'admin'),
(5, 'archives_outgoing_view', 'مشاهدة أرشيف الصادرات', 'مشاهدة قائمة أرشيف الصادر في البرنامج', 'admin'),
(6, 'archives_outgoing_create', 'اضافة لأرشيف الصادر', 'اضفة أرشيف جديد لأرشيف الصادر في البرنامج', 'admin'),
(7, 'archives_outgoing_update', 'تعديل أرشيف من الصادرات', 'تعديل أرشيف من الصادرات في البرنامج', 'admin'),
(8, 'archives_outgoing_delete', 'حذف أرشيف من الصادرات', 'حذف أرشيف من الصادرات في البرنامج', 'admin'),
(9, 'archives_incoming_view', 'مشاهدة أرشيف الواردات', 'مشاهدة قائمة أرشيف الوارد في البرنامج', 'admin'),
(10, 'archives_incoming_create', 'اضافة لأرشيف الوارد', 'اضفة أرشيف جديد لأرشيف الوارد في البرنامج', 'admin'),
(11, 'archives_incoming_update', 'تعديل أرشيف من الواردات', 'تعديل أرشيف من الواردات في البرنامج', 'admin'),
(12, 'archives_incoming_delete', 'حذف أرشيف من الواردات', 'حذف أرشيف من الواردات في البرنامج', 'admin'),
(13, 'archives_procurement_view', 'مشاهدة أرشيف المشتريات', 'مشاهدة قائمة أرشيف المشتريات في البرنامج', 'admin'),
(14, 'archives_procurement_create', 'اضافة لأرشيف المشتريات', 'اضفة أرشيف جديد لأرشيف المشتريات في البرنامج', 'admin'),
(15, 'archives_procurement_update', 'تعديل أرشيف من المشتريات', 'تعديل أرشيف من المشتريات في البرنامج', 'admin'),
(16, 'archives_procurement_delete', 'حذف أرشيف من المشتريات', 'حذف أرشيف من المشتريات في البرنامج', 'admin'),
(17, 'archives_events_view', 'مشاهدة أرشيف الفعاليات', 'مشاهدة قائمة أرشيف الفعاليات في البرنامج', 'admin'),
(18, 'archives_events_create', 'اضافة لأرشيف الفعاليات', 'اضفة أرشيف جديد لأرشيف الفعاليات في البرنامج', 'admin'),
(19, 'archives_events_update', 'تعديل أرشيف من الفعاليات', 'تعديل أرشيف من الفعاليات في البرنامج', 'admin'),
(20, 'archives_events_delete', 'حذف أرشيف من الفعاليات', 'حذف أرشيف من الفعاليات في البرنامج', 'admin'),
(21, 'regions_view', 'يشاهد المناطق', 'يشاهد المناطق بالبرنامج', 'admin'),
(22, 'regions_create', 'يضيف مناطق', 'إضافة منطقة جديدة للبرنامج', 'admin'),
(23, 'regions_update', 'يعدل على المناطق', 'التعديل على المناطق في البرنامج', 'admin'),
(24, 'regions_delete', 'يحذف مناطق', 'حذف مناطق البرنامج', 'admin'),
(25, 'regions_attach', 'يعين مشرفين', 'تعيين المشرفين على المناطق', 'admin'),
(26, 'beneficiaries_view', 'يشرف على منطقة', 'يشاهد المستفيدين في المناطق التي يشرف عليها', 'admin'),
(27, 'beneficiaries_update', 'يعدل على المستفيدين', 'تعديل على المستفيدين في المناطق التي يشرف عليها', 'admin'),
(28, 'beneficiaries_delete', 'يحذف المستفيدين', 'حذف المستفيدين في المناطق التي يشرف عليها', 'admin'),
(29, 'beneficiaries_create', 'يضيف مستفيدين', 'اضافة مستفيدين جدد للمناطق التي يشرف عليها', 'admin'),
(30, 'beneficiaries_action', 'حالة الملف', 'قبول، تعليق، رفض واستبعاد الملف', 'admin'),
(31, 'cards_view', 'مشاهدة الكروت والتصاميم', 'مشاهدة قائمة الكروت في البرنامج', 'admin'),
(32, 'cards_create', 'اضافة تصميم جديد', 'اضافة تصميم كرت للبرنامج', 'admin'),
(33, 'cards_delete', 'حذف التصاميم', 'حذف التصاميم من البرنامج', 'admin'),
(34, 'cards_attache', 'اضافة التصميم للمنطقة', 'تعيين التصميم للمنطقة والتحكم في الظهور', 'admin'),
(35, 'donors_view', 'مشاهدة المتبرعين', 'مشاهدة قائمة المتبرعين في البرنامج', 'admin'),
(36, 'donors_create', 'إضافة متبرع جديد', 'إضافة متبرع جديد للبرنامج', 'admin'),
(37, 'donors_update', 'تعديل المتبرعين', 'تعديل بيانات متبرع موجود مسبقاً بالبرنامج', 'admin'),
(38, 'donors_delete', 'حذف المتبرعين', 'حذف متبرع موجود مسبقاً بالبرنامج', 'admin'),
(39, 'products_view', 'مشاهدة المنتجات', 'مشاهدة قائمة المنتجات في البرنامج', 'admin'),
(40, 'products_create', 'إضافة منتج جديد', 'إضافة منتج جديد للبرنامج', 'admin'),
(41, 'products_update', 'تعديل المنتجات', 'تعديل بيانات منتج موجود مسبقاً بالبرنامج', 'admin'),
(42, 'products_delete', 'حذف المنتجات', 'حذف منتج موجود مسبقاً بالبرنامج', 'admin'),
(43, 'products_attache', 'تعيين منتجات للمستفيدين', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ks_permission_user`
--

CREATE TABLE `ks_permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_permission_user`
--

INSERT INTO `ks_permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Admin'),
(2, 1, 'App\\Admin'),
(3, 1, 'App\\Admin'),
(4, 1, 'App\\Admin'),
(5, 1, 'App\\Admin'),
(6, 1, 'App\\Admin'),
(7, 1, 'App\\Admin'),
(8, 1, 'App\\Admin'),
(9, 1, 'App\\Admin'),
(10, 1, 'App\\Admin'),
(11, 1, 'App\\Admin'),
(12, 1, 'App\\Admin'),
(13, 1, 'App\\Admin'),
(14, 1, 'App\\Admin'),
(15, 1, 'App\\Admin'),
(16, 1, 'App\\Admin'),
(17, 1, 'App\\Admin'),
(18, 1, 'App\\Admin'),
(19, 1, 'App\\Admin'),
(20, 1, 'App\\Admin'),
(21, 1, 'App\\Admin'),
(22, 1, 'App\\Admin'),
(23, 1, 'App\\Admin'),
(24, 1, 'App\\Admin'),
(25, 1, 'App\\Admin'),
(26, 1, 'App\\Admin'),
(27, 1, 'App\\Admin'),
(28, 1, 'App\\Admin'),
(29, 1, 'App\\Admin'),
(30, 1, 'App\\Admin'),
(31, 1, 'App\\Admin'),
(32, 1, 'App\\Admin'),
(33, 1, 'App\\Admin'),
(34, 1, 'App\\Admin'),
(35, 1, 'App\\Admin'),
(36, 1, 'App\\Admin'),
(37, 1, 'App\\Admin'),
(38, 1, 'App\\Admin'),
(39, 1, 'App\\Admin'),
(40, 1, 'App\\Admin'),
(41, 1, 'App\\Admin'),
(42, 1, 'App\\Admin'),
(43, 1, 'App\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `ks_products`
--

CREATE TABLE `ks_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `barcode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_products_beneficiaries`
--

CREATE TABLE `ks_products_beneficiaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_regions`
--

CREATE TABLE `ks_regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ks_regions`
--

INSERT INTO `ks_regions` (`id`, `name`, `color`) VALUES
(1, 'الدسمة', NULL),
(2, 'الدعية و الشامية', NULL),
(3, 'الشويخ', NULL),
(4, 'قصر الشعب', NULL),
(5, 'الرميثية', NULL),
(6, 'بيان', NULL),
(7, 'مشرف', NULL),
(8, 'الزور', NULL),
(9, 'الصوابر', NULL),
(10, 'الفنطاس', NULL),
(11, 'الفروانية', NULL),
(12, 'الحصانية', NULL),
(13, 'أبو حليفة', NULL),
(14, 'وارة', NULL),
(15, 'الشدادية', NULL),
(16, 'الجهراء', NULL),
(17, 'المقوع والمهبولة', NULL),
(18, 'جليب الشيوخ', NULL),
(19, 'حولي', NULL),
(20, 'الصليبية والطرفاء', NULL),
(21, 'الفحيحيل', NULL),
(22, 'جزيرة كبر', NULL),
(23, 'أم المرادم', NULL),
(24, 'أم النمل وعوهة وفيلكا', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ks_region_admin`
--

CREATE TABLE `ks_region_admin` (
  `region_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_settings`
--

CREATE TABLE `ks_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `option` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ks_visits`
--

CREATE TABLE `ks_visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `beneficiary_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ks_admins`
--
ALTER TABLE `ks_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `ks_archives`
--
ALTER TABLE `ks_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archives_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `ks_beneficiaries`
--
ALTER TABLE `ks_beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiaries_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `ks_cards`
--
ALTER TABLE `ks_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_card_region`
--
ALTER TABLE `ks_card_region`
  ADD KEY `card_region_card_id_foreign` (`card_id`),
  ADD KEY `card_region_region_id_foreign` (`region_id`);

--
-- Indexes for table `ks_companions`
--
ALTER TABLE `ks_companions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companions_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `ks_donations`
--
ALTER TABLE `ks_donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_donor_id_foreign` (`donor_id`);

--
-- Indexes for table `ks_donors`
--
ALTER TABLE `ks_donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_files`
--
ALTER TABLE `ks_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_admin_id_foreign` (`admin_id`),
  ADD KEY `files_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `ks_f_a_qs`
--
ALTER TABLE `ks_f_a_qs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_a_qs_category_id_foreign` (`category_id`);

--
-- Indexes for table `ks_f_a_qs_categories`
--
ALTER TABLE `ks_f_a_qs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_media`
--
ALTER TABLE `ks_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ks_migrations`
--
ALTER TABLE `ks_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_permissions`
--
ALTER TABLE `ks_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_permission_user`
--
ALTER TABLE `ks_permission_user`
  ADD KEY `permission_user_user_id_user_type_index` (`user_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `ks_products`
--
ALTER TABLE `ks_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_products_beneficiaries`
--
ALTER TABLE `ks_products_beneficiaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_beneficiaries_product_id_foreign` (`product_id`),
  ADD KEY `products_beneficiaries_beneficiary_id_foreign` (`beneficiary_id`);

--
-- Indexes for table `ks_regions`
--
ALTER TABLE `ks_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_region_admin`
--
ALTER TABLE `ks_region_admin`
  ADD KEY `region_admin_region_id_foreign` (`region_id`),
  ADD KEY `region_admin_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `ks_settings`
--
ALTER TABLE `ks_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ks_visits`
--
ALTER TABLE `ks_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_beneficiary_id_foreign` (`beneficiary_id`),
  ADD KEY `visits_admin_id_foreign` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ks_admins`
--
ALTER TABLE `ks_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ks_archives`
--
ALTER TABLE `ks_archives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_beneficiaries`
--
ALTER TABLE `ks_beneficiaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_cards`
--
ALTER TABLE `ks_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_companions`
--
ALTER TABLE `ks_companions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_donations`
--
ALTER TABLE `ks_donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_donors`
--
ALTER TABLE `ks_donors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_files`
--
ALTER TABLE `ks_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_f_a_qs`
--
ALTER TABLE `ks_f_a_qs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_f_a_qs_categories`
--
ALTER TABLE `ks_f_a_qs_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_media`
--
ALTER TABLE `ks_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_migrations`
--
ALTER TABLE `ks_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `ks_permissions`
--
ALTER TABLE `ks_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `ks_products`
--
ALTER TABLE `ks_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_products_beneficiaries`
--
ALTER TABLE `ks_products_beneficiaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_regions`
--
ALTER TABLE `ks_regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ks_settings`
--
ALTER TABLE `ks_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ks_visits`
--
ALTER TABLE `ks_visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ks_archives`
--
ALTER TABLE `ks_archives`
  ADD CONSTRAINT `archives_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `ks_admins` (`id`);

--
-- Constraints for table `ks_beneficiaries`
--
ALTER TABLE `ks_beneficiaries`
  ADD CONSTRAINT `beneficiaries_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `ks_admins` (`id`);

--
-- Constraints for table `ks_card_region`
--
ALTER TABLE `ks_card_region`
  ADD CONSTRAINT `card_region_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `ks_cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `card_region_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `ks_regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_companions`
--
ALTER TABLE `ks_companions`
  ADD CONSTRAINT `companions_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `ks_beneficiaries` (`id`);

--
-- Constraints for table `ks_donations`
--
ALTER TABLE `ks_donations`
  ADD CONSTRAINT `donations_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `ks_donors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_files`
--
ALTER TABLE `ks_files`
  ADD CONSTRAINT `files_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `ks_admins` (`id`),
  ADD CONSTRAINT `files_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `ks_beneficiaries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ks_f_a_qs`
--
ALTER TABLE `ks_f_a_qs`
  ADD CONSTRAINT `f_a_qs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `ks_f_a_qs_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_permission_user`
--
ALTER TABLE `ks_permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `ks_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_products_beneficiaries`
--
ALTER TABLE `ks_products_beneficiaries`
  ADD CONSTRAINT `products_beneficiaries_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `ks_beneficiaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_beneficiaries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `ks_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_region_admin`
--
ALTER TABLE `ks_region_admin`
  ADD CONSTRAINT `region_admin_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `ks_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `region_admin_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `ks_regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ks_visits`
--
ALTER TABLE `ks_visits`
  ADD CONSTRAINT `visits_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `ks_admins` (`id`),
  ADD CONSTRAINT `visits_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `ks_beneficiaries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
