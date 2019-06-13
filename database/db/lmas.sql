-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for lmas
CREATE DATABASE IF NOT EXISTS `lmas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lmas`;

-- Dumping structure for table lmas.grade_leave
CREATE TABLE IF NOT EXISTS `grade_leave` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade_level` int(11) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.grade_leave: ~2 rows (approximately)
/*!40000 ALTER TABLE `grade_leave` DISABLE KEYS */;
INSERT INTO `grade_leave` (`id`, `grade_level`, `leave_id`, `days`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 5, '2019-06-12 20:17:34', '2019-06-12 20:17:34'),
	(2, 1, 2, 5, '2019-06-12 20:31:35', '2019-06-12 20:31:35'),
	(3, 1, 3, 10, '2019-06-12 20:44:38', '2019-06-12 20:44:38');
/*!40000 ALTER TABLE `grade_leave` ENABLE KEYS */;

-- Dumping structure for table lmas.leave
CREATE TABLE IF NOT EXISTS `leave` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.leave: ~2 rows (approximately)
/*!40000 ALTER TABLE `leave` DISABLE KEYS */;
INSERT INTO `leave` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sick', '2019-06-12 19:57:45', NULL),
	(2, 'Compassionate', '2019-06-12 19:23:45', '2019-06-12 19:23:45'),
	(3, 'Annual', '2019-06-12 19:24:57', '2019-06-12 19:24:57');
/*!40000 ALTER TABLE `leave` ENABLE KEYS */;

-- Dumping structure for table lmas.leave_request
CREATE TABLE IF NOT EXISTS `leave_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(10) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `resumption_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `approved_by_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.leave_request: ~0 rows (approximately)
/*!40000 ALTER TABLE `leave_request` DISABLE KEYS */;
INSERT INTO `leave_request` (`id`, `staff_id`, `leave_id`, `status`, `start_date`, `end_date`, `resumption_date`, `days`, `approved_by_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 3, 0, '2019-06-17', '2019-06-24', '2019-06-24', 7, NULL, '2019-06-12 22:38:27', '2019-06-12 22:38:27');
/*!40000 ALTER TABLE `leave_request` ENABLE KEYS */;

-- Dumping structure for table lmas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_06_11_195943_create_staff_table', 1),
	(4, '2019_06_11_200109_create_staff_grade_table', 1),
	(5, '2019_06_11_200218_create_leave_table', 1),
	(6, '2019_06_11_200321_create_leave_request_table', 1),
	(7, '2019_06_11_200434_create_grade_leave_table', 1),
	(8, '2015_01_15_105324_create_roles_table', 2),
	(9, '2015_01_15_114412_create_role_user_table', 2),
	(10, '2015_01_26_115212_create_permissions_table', 2),
	(11, '2015_01_26_115523_create_permission_role_table', 2),
	(12, '2015_02_09_132439_create_permission_user_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table lmas.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table lmas.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table lmas.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table lmas.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.permission_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;

-- Dumping structure for table lmas.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', NULL, 1, '2019-06-12 13:53:00', NULL),
	(2, 'User', 'user', NULL, 2, '2019-06-12 15:54:00', NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table lmas.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.role_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2019-06-12 13:53:47', NULL),
	(2, 2, 3, '2019-06-12 21:46:30', '2019-06-12 21:46:30');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table lmas.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `staff_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_manager_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.staff: ~0 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `user_id`, `staff_no`, `line_manager_id`, `grade_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 'SAHARA/753/0619', 1, 1, '2019-06-12 21:46:30', '2019-06-12 21:46:30');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table lmas.staff_grade
CREATE TABLE IF NOT EXISTS `staff_grade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.staff_grade: ~5 rows (approximately)
/*!40000 ALTER TABLE `staff_grade` DISABLE KEYS */;
INSERT INTO `staff_grade` (`id`, `name`, `level`, `created_at`, `updated_at`) VALUES
	(1, 'Entry level', 1, '2019-06-12 16:29:59', NULL),
	(2, 'Officer', 2, '2019-06-12 16:30:39', NULL),
	(3, 'Supervisor', 3, '2019-06-12 16:31:08', NULL),
	(4, 'Manager', 5, '2019-06-12 16:31:30', NULL),
	(5, 'Assistant Manager', 4, '2019-06-12 19:43:22', '2019-06-12 19:43:22');
/*!40000 ALTER TABLE `staff_grade` ENABLE KEYS */;

-- Dumping structure for table lmas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table lmas.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Sahara', 'Group', 'Admin', 'bolaberry.ma@gmail.com', '$2y$10$Ym.E3wv5kSJdi/z43eex.upNbDmp3.4nQah1uDqdRQdxyJhLKCZ5C', 'gXTnKjIvssFXyPZqyijcnAwsRRSYqvLqGCdFZGXfm1Q0F9QgT9bNVBLyFuy4', '2019-06-12 11:19:58', '2019-06-12 11:19:58'),
	(3, 'Adedeji', 'Omobolanle', 'berry', 'mariamadedeji3@gmail.com', '$2y$10$wJ48ZiQzOpv/t/SMkIUNqOkfyJKTSYpwx8XovMyp5upcdCX0lTSjO', '4hGfbRvqAWDzRNXuBfagFDCMEUmLZriCcdF9IrXrZgqqavFKnwALWFyZI5CR', '2019-06-12 21:46:30', '2019-06-12 21:46:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
