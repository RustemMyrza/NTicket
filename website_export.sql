-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.2.0 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп данных таблицы nticket.admin_users: ~1 rows (приблизительно)
INSERT INTO `admin_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'nticket_admin', 'nticket_admin@localhost', NULL, '$2y$10$hIiq4rumlGuXN51jWm3ZNu84.X.0oaI8ikICZzt9foaA8v5kVyxoO', NULL, '2024-04-25 05:14:30', '2024-04-25 05:14:30');

-- Дамп данных таблицы nticket.bank_cards: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.cache: ~2 rows (приблизительно)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('user@localhost|127.0.0.1', 'i:1;', 1717160573),
	('user@localhost|127.0.0.1:timer', 'i:1717160573;', 1717160573);

-- Дамп данных таблицы nticket.cache_locks: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.carts: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.consultation_requests: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.failed_jobs: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.id_cards: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.jobs: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.job_batches: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.migrations: ~13 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2014_10_12_000000_create_users_table', 2),
	(6, '2024_04_24_191443_create_organizations_table', 3),
	(9, '2024_04_24_192259_create_routes_table', 4),
	(11, '0001_01_01_000000_create_users_table', 5),
	(15, '2024_04_25_142022_create_carts_table', 7),
	(16, '2024_04_25_212501_add_cards_to_users_table', 8),
	(17, '2024_04_23_131523_create_bank_cards_table', 9),
	(18, '2024_04_23_131431_create_id_cards_table', 10),
	(19, '2024_04_25_124537_create_tickets_table', 11),
	(22, '2024_04_30_002015_create_consultation_requests_table', 12),
	(24, '2024_04_30_025515_create_question_chats_table', 13);

-- Дамп данных таблицы nticket.organizations: ~6 rows (приблизительно)
INSERT INTO `organizations` (`id`, `created_at`, `updated_at`, `name`, `transport_type`, `image`) VALUES
	(2, '2024-04-25 04:15:59', '2024-05-14 00:45:23', 'Air Astana', '1', 'storage/images/EfcgsDKf64W8VoxQ3lun1v2EGhN6EYaYgz3rhsV5.png'),
	(3, '2024-06-04 14:25:31', '2024-06-04 14:25:31', 'Fly arystan', '1', 'storage/images/RWTTdxS4amw7tKyhXwWP3JH7sIDdz0qYh4T6gXEt.jpg'),
	(4, '2024-06-04 14:46:44', '2024-06-04 14:46:44', 'Bus trader', '2', NULL),
	(5, '2024-06-04 14:48:40', '2024-06-04 14:48:40', 'Turan express', '3', 'storage/images/7p95fW18E8UvlfG0Qmxj04flTEX8IEJ1Z9mJiByZ.png'),
	(6, '2024-06-04 14:52:33', '2024-06-04 14:52:33', 'Bus transport', '2', NULL),
	(8, '2024-06-04 16:42:04', '2024-06-04 16:42:04', 'Bus express', '2', NULL);

-- Дамп данных таблицы nticket.password_resets: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.password_reset_tokens: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.question_chats: ~1 rows (приблизительно)
INSERT INTO `question_chats` (`id`, `created_at`, `updated_at`, `question`, `asked`, `answer`) VALUES
	(12, '2024-06-04 16:39:14', '2024-06-04 16:39:46', 'Можно ли сегодня поехать в Павлодар?', '8', 'Конечно поездка планируется в ближайшее время');

-- Дамп данных таблицы nticket.routes: ~10 rows (приблизительно)
INSERT INTO `routes` (`id`, `created_at`, `updated_at`, `from_place`, `to_place`, `departure_time`, `arrival_time`, `price`, `seats_number`, `organizer`) VALUES
	(2, '2024-04-25 04:47:32', '2024-06-04 21:55:55', 'Алматы', 'Шымкент', '2024-04-25 17:00:00', '2024-04-25 18:00:00', '10000', '48', 2),
	(3, '2024-04-25 08:52:29', '2024-06-04 01:25:39', 'Алматы', 'Астана', '2024-04-25 21:00:00', '2024-04-25 23:00:00', '15000', '100', 2),
	(4, '2024-06-04 14:27:48', '2024-06-04 14:27:48', 'Шымкент', 'Астана', '2024-06-06 01:00:00', '2024-06-06 03:30:00', '25000', '100', 3),
	(5, '2024-06-04 14:44:00', '2024-06-04 16:33:27', 'Павлодар', 'Кызылорда', '2024-06-09 07:30:00', '2024-06-09 09:00:00', '50000', '63', 2),
	(7, '2024-06-04 14:49:30', '2024-06-04 14:49:30', 'Алаколь', 'Алматы', '2024-06-09 03:15:00', '2024-06-09 04:00:00', '10000', '30', 5),
	(8, '2024-06-04 14:51:38', '2024-06-04 14:51:38', 'Конаев', 'Алматы', '2024-06-20 21:00:00', '2024-06-20 21:30:00', '5000', '20', 5),
	(9, '2024-06-04 14:53:27', '2024-06-04 16:33:28', 'Кольсай', 'Алматы', '2024-06-25 05:00:00', '2024-06-26 01:00:00', '15000', '13', 6),
	(10, '2024-06-04 14:55:34', '2024-06-04 14:55:34', 'Туркестан', 'Талдыкорган', '2024-06-30 02:00:00', '2024-06-30 03:30:00', '10000', '50', 3),
	(11, '2024-06-04 14:57:28', '2024-06-04 15:44:22', 'Туркестан', 'Алматы', '2024-06-01 05:00:00', '2024-06-13 05:00:00', '20000', '54', 3),
	(12, '2024-06-04 16:42:48', '2024-06-04 16:50:02', 'Павлодар', 'Шымкент', '2024-06-13 07:45:00', '2024-06-13 08:00:00', '20000', '19', 8);

-- Дамп данных таблицы nticket.sessions: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.tickets: ~0 rows (приблизительно)

-- Дамп данных таблицы nticket.users: ~0 rows (приблизительно)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
