-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 10:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzes`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'eveniet', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(2, 'omnis', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(3, 'veritatis', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(4, 'necessitatibus', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(5, 'id', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(6, 'et', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(7, 'est', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(8, 'nisi', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(9, 'odit', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(10, 'aut', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(11, 'in', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(12, 'repudiandae', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(13, 'esse', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(14, 'blanditiis', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(15, 'atque', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(16, 'consequuntur', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(17, 'molestiae', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(18, 'molestiae', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(19, 'doloremque', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(20, 'nemo', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(21, 'commodi', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(22, 'aut', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(23, 'quas', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(24, 'voluptates', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(25, 'enim', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(26, 'dolores', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(27, 'error', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(28, 'eligendi', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(29, 'qui', '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(30, 'suscipit', '2024-01-17 09:08:13', '2024-01-17 09:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `pending` tinyint(1) NOT NULL DEFAULT 1,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_043436_create_categories_table', 1),
(6, '2023_12_13_210321_create_quizzes_table', 1),
(7, '2023_12_14_185334_adding_role_to_users_table', 1),
(8, '2023_12_14_210307_create_questions_table', 1),
(9, '2023_12_14_210314_create_responses_table', 1),
(10, '2023_12_17_044925_create_options_table', 1),
(11, '2023_12_19_150359_create_invitations_table', 1),
(12, '2023_12_30_095249_create_jobs_table', 1),
(13, '2024_01_12_091222_create_settings_table', 1),
(14, '2024_01_15_142552_add_last_login_at_to_users_table', 1),
(15, '2024_01_26_120130_create_quiz_attempts_table', 2),
(16, '2024_02_05_103804_create_user_quiz_states_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `explanation` text DEFAULT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `content`, `explanation`, `is_correct`, `created_at`, `updated_at`) VALUES
(80, 13, 'Et eius ex eaque aliquid aliquam eius possimus.', 'Eos quis libero animi quas reprehenderit cupiditate aspernatur. Sed et ducimus fugiat at facere earum quia facere. Facere reprehenderit sunt iusto nemo. Molestiae consectetur sunt sed esse atque.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(81, 13, 'Non sunt similique sit omnis quia.', 'Omnis rerum provident ex aut et quibusdam. Beatae aspernatur consequatur nobis minima. Itaque et accusamus vitae assumenda ut quod est. Tempore fugiat omnis magnam dolore consequuntur enim qui.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(82, 13, 'Dignissimos possimus repellendus vel facilis.', 'Sequi quam molestiae debitis reiciendis. Ut molestias adipisci atque iusto eligendi facilis sed quibusdam. Quia aut eum sit sunt similique asperiores.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(83, 13, 'Id eos reprehenderit ex explicabo in quam ipsa molestiae.', 'Reiciendis et ipsa sed nobis. Inventore non quaerat porro facilis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(84, 13, 'Rem ea et est est eveniet id.', 'Eveniet necessitatibus est adipisci. Fugiat quia deleniti vero sit. Voluptas odio laborum aliquam itaque sunt.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(85, 13, 'Provident et debitis sit in tempora error quasi.', 'Soluta voluptatum quaerat quae sunt est mollitia ea facilis. In quasi excepturi et consequuntur. Cumque est est veniam. Est velit nemo sed amet officiis ut. Eligendi at inventore asperiores necessitatibus animi dolores.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(86, 13, 'Saepe sit ea consequatur ea ex sunt.', 'Sapiente aspernatur et repellat nulla eaque. Non maiores eius accusantium odio et consequatur nemo. Officiis ducimus voluptas accusamus eum et blanditiis neque eius.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(87, 14, 'Est debitis dolores optio assumenda.', 'Et quis maiores harum cum qui dolor. Vero nihil natus mollitia cum dignissimos tempore. Qui repudiandae soluta itaque dolorum voluptas expedita voluptas. Ipsa iure rerum error expedita a doloremque itaque. Natus aut sit consequatur debitis occaecati dolor quae hic.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(88, 14, 'Sint facere id et a.', 'Quam omnis optio dolorem est alias velit. Nemo qui unde debitis autem cum magni. Omnis incidunt pariatur ut similique. Magnam modi nulla quos laboriosam iure ut et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(89, 14, 'Magni sequi qui necessitatibus a nostrum eligendi.', 'Assumenda rerum fugit quos quam velit neque alias magni. Repellendus consequatur vero quia. Aut porro similique et ut voluptatibus qui voluptas rerum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(90, 14, 'Non minima consequuntur qui aut voluptatum itaque.', 'Hic sequi eum ex rerum sapiente. Et praesentium fugit reprehenderit a. Fuga et molestiae eum repudiandae voluptatem dolorum distinctio. Nulla quas quibusdam voluptatibus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(91, 14, 'Sint non iure omnis.', 'Magnam impedit autem dolor assumenda quo non aspernatur nesciunt. Aut autem repellat et deleniti totam aut. Est eaque explicabo veritatis. Sapiente accusamus est aliquid veritatis eaque suscipit repudiandae in. Eius placeat ut minima velit dicta quod.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(92, 14, 'Qui at aut soluta.', 'Iste qui tempora ut. Aut consequuntur officia consequatur non ex sapiente eligendi sequi.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(93, 15, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(94, 15, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(95, 15, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(96, 15, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(97, 15, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(98, 15, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(99, 15, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(100, 15, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(101, 15, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(102, 15, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(103, 16, 'Ut ad officia praesentium aut quia in tenetur deserunt.', 'Totam officia nisi quidem inventore sed dolorem natus. Reiciendis nihil et et. Omnis quam non voluptas assumenda voluptatem eaque in. Qui ut cupiditate cum. Nihil dolorem voluptates minima architecto id excepturi alias.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(104, 16, 'Omnis ipsa esse itaque ipsam officiis voluptatum occaecati.', 'Voluptate enim beatae sit ratione occaecati quo. Sed dolorem qui rerum eum fuga recusandae rerum. Dolor asperiores laudantium dolorem laboriosam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(105, 16, 'Ad laboriosam aut sit.', 'Ut consequatur doloribus placeat dicta atque omnis beatae. Et saepe tempore qui perferendis modi eos dicta beatae. Et id quibusdam et quo non.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(106, 16, 'Consequatur necessitatibus ipsa voluptatem necessitatibus et ipsam.', 'Aut voluptatem quo similique expedita voluptatibus. Quaerat totam non aperiam ut et nisi aut. Ipsa ea est at hic voluptatem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(107, 16, 'Dicta dolorum ipsa quidem et pariatur aut voluptatum.', 'Magnam est aut placeat veniam. Ratione necessitatibus accusamus quod placeat unde ipsum. Neque voluptates assumenda enim quia.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(108, 17, 'Tempore et qui ex pariatur totam tempore debitis.', 'Quos rem et provident ut ut. Eligendi natus et quasi dolorum. Et sapiente dignissimos explicabo.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(109, 18, 'Autem voluptas magni voluptatem aliquam corporis.', 'Vero optio ratione ipsum quis. Recusandae ea tenetur sint hic.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(110, 18, 'Dolores earum illum quo earum mollitia possimus tenetur modi.', 'Dignissimos quam aspernatur sequi placeat dignissimos voluptatum. Sunt expedita et ullam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(111, 18, 'Modi dolores doloribus est saepe perspiciatis.', 'Nisi aut ipsum nostrum in laudantium velit. Ad aliquid est aut neque a magnam. Deleniti ut vero eaque aliquid occaecati vel.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(112, 18, 'Ut non quis cumque magnam odit facilis.', 'Ut aut sequi incidunt ut id unde odio labore. Voluptas ipsam repellat aut vitae minima asperiores quos numquam. Nesciunt repellat aut voluptatem quos dolor.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(113, 18, 'Aut quam explicabo non excepturi vel aut.', 'Illum aspernatur nemo ut nihil. Nulla nihil commodi provident dolore. Quia esse culpa exercitationem commodi.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(114, 18, 'Eum sed et rerum ea quasi sit.', 'Earum ab quia quod temporibus similique. Quae nihil accusamus explicabo. Tempora sit repudiandae culpa accusantium dolore. Facere omnis molestiae dolores in autem qui voluptas. Autem sed eos enim magni eos illum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(115, 18, 'Dolorum et et molestiae sed nulla.', 'A et reiciendis sunt ea earum dolorem aut. Distinctio et necessitatibus accusamus quia. Perferendis sint adipisci at. Est qui officiis quos et quia.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(116, 18, 'Eaque modi sint incidunt nesciunt non.', 'Excepturi reprehenderit recusandae et porro. Sunt id dolorem saepe qui repellendus voluptate iusto. Quod aut aliquid iure non nemo hic neque eum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(117, 19, 'Deleniti inventore voluptates ad nihil.', 'Eum est consectetur recusandae sequi omnis et perferendis. Fugit ex et sapiente dicta et. Unde tenetur quo qui iure et atque.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(118, 19, 'Veritatis dicta consectetur eos omnis incidunt.', 'Beatae assumenda eos numquam fugit quis illum et dolor. Expedita sed sunt quia asperiores non ea. Ducimus est qui placeat quam. Magni nam doloremque voluptates ducimus sit tempora sapiente provident.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(119, 19, 'Commodi ratione distinctio quas sed assumenda quasi necessitatibus.', 'Reprehenderit placeat officiis veritatis non non. Et nisi placeat ipsa quidem facere.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(120, 19, 'Debitis voluptatibus sapiente veritatis rerum.', 'Vel est cupiditate eligendi voluptatem. Quia eum ratione ad non corporis rerum voluptas. Nesciunt architecto cum voluptatibus voluptate consequatur sit.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(121, 19, 'Tempore reprehenderit omnis velit incidunt nobis minus alias pariatur.', 'Iste voluptatem perspiciatis vel rerum. Quos consequuntur non ut cupiditate omnis veniam accusamus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(122, 19, 'Sit eum qui expedita nemo voluptatem excepturi et.', 'Repellat perspiciatis perferendis quo quidem ipsa velit eos. Aperiam qui eum deleniti voluptatem fugiat. Consequatur voluptatem itaque tempore sunt. Nam et nihil occaecati quas.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(123, 19, 'Voluptas sint nobis voluptas ipsum ea non.', 'Et laudantium id possimus a. Tenetur veniam ut consequatur debitis aliquam sint at. Voluptas sed aliquam incidunt dolor et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(124, 20, 'Aut eligendi vel voluptate blanditiis ut.', 'Molestiae laudantium accusamus corporis ullam dolores est asperiores. Quisquam consequuntur dolor odio voluptatem unde. Accusantium ut quod voluptatem incidunt voluptates. Reiciendis numquam quae unde libero consectetur facere et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(125, 20, 'Cupiditate esse itaque quisquam maiores.', 'Voluptas fuga animi saepe quo dolores. Nemo rerum maiores amet.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(126, 20, 'Ullam magnam qui fugiat corporis consequatur ad.', 'Officia quidem veritatis voluptatem iure nisi voluptatibus. Voluptas facere sed rem impedit quidem. Eius veritatis molestias fugiat labore blanditiis. Eum in saepe voluptatem. Non possimus ratione distinctio suscipit fugiat.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(127, 20, 'Minus rerum consequatur adipisci laudantium autem voluptatibus.', 'Omnis laborum doloremque ipsum suscipit quam dolorem. Dolorem eveniet tenetur saepe consequuntur nam facilis ad. Alias hic itaque minima asperiores.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(128, 20, 'Ratione magnam dolor ipsam quidem.', 'Beatae et assumenda itaque amet placeat vero et molestias. Hic aliquam accusantium earum. Dolores et amet omnis ex. Et sint deserunt dolor cupiditate ut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(129, 21, 'Impedit quod quisquam facere velit vel totam.', 'Explicabo quia consectetur sint voluptates. Repellat architecto voluptas est hic consequatur et quibusdam eum. Neque eligendi animi ut enim omnis nihil. Qui beatae autem amet eaque numquam totam. Enim rerum sint cupiditate debitis quos.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(130, 21, 'Provident non dolorem nesciunt eos repellendus libero illo.', 'Delectus hic numquam cupiditate deleniti rerum. Explicabo assumenda quaerat aperiam qui. Aliquid voluptas officiis error voluptate error. Eligendi accusantium eum maxime praesentium suscipit consequatur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(131, 21, 'Tempora quia ea rerum omnis laboriosam earum.', 'Vel quae ea molestiae eius. Veritatis et velit reprehenderit tenetur voluptatem ut. Voluptate aut explicabo sit vero temporibus consequuntur est. Rem eum consequatur cum neque cumque sint.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(132, 21, 'Optio autem odit distinctio molestiae fugit.', 'Totam enim voluptatem mollitia nisi non. Aut voluptatem illum dolor neque et ratione consequuntur. Rem eum distinctio tempora eveniet quisquam debitis illum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(133, 21, 'Eligendi quia soluta sed rerum doloremque enim.', 'Aliquid autem dolores consectetur possimus nihil quod. Laudantium quasi earum alias. Nesciunt impedit sunt accusamus officia autem doloremque ipsam. Eveniet nesciunt a sapiente hic aperiam hic consequatur.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(134, 22, 'Sint at reprehenderit praesentium sed.', 'Minima quo laborum ea optio. Dolorum soluta eveniet ab in. Deserunt incidunt amet nulla maxime odit hic.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(135, 22, 'Culpa amet animi eos vel dolor.', 'Ipsum et voluptas voluptatum voluptatibus rerum est. Unde tempore consectetur soluta libero eos quis. Sit quia laudantium non eligendi saepe temporibus voluptas. Dolorem labore ut animi aut sed sunt eum tempore.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(136, 22, 'Enim odio sed quia dolores corrupti.', 'Fugiat et maxime tenetur eos tempora cum recusandae accusamus. Nobis sint eum perferendis voluptatem tenetur. Provident vel ducimus quia quod.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(137, 22, 'Atque qui repellat mollitia quia id.', 'Aut amet facere aut voluptatem non aut sit. Eveniet ut vero numquam veniam. Aperiam dolor fugiat suscipit reiciendis est quo. Amet qui corporis non iure perspiciatis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(138, 22, 'Autem similique eum ea consequatur quisquam ut.', 'Et ducimus animi sed velit et. Temporibus rerum magni autem. Fugit sequi quia non ipsum similique delectus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(139, 22, 'Unde quibusdam temporibus est amet adipisci.', 'Sit unde consequuntur sint ullam quia illum est. Cum doloremque veniam rerum. Voluptatem similique dolore et rerum magni optio. A et ea adipisci ad sint consequatur.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(140, 22, 'Adipisci ea iure qui sequi.', 'Quam porro animi ab alias non nihil voluptatibus. Est sit totam perferendis ab neque magnam nihil temporibus. Quo minima numquam qui provident enim. Expedita molestiae labore laboriosam eveniet itaque.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(141, 22, 'Et non ad dolores enim natus doloribus exercitationem.', 'Dolorem rerum ratione cum quo explicabo cumque voluptas. Architecto consectetur reprehenderit ad est qui. Iure quisquam ut cumque aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(142, 23, 'Sint iure ut ea doloremque.', 'Facilis ex atque optio tempora voluptatem. Suscipit et quaerat exercitationem voluptate dolorem omnis laboriosam adipisci. Rerum vero natus ut labore nostrum vitae tenetur. Non enim occaecati eum tempore est.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(143, 23, 'Illo dolores tempore quia est aliquid fuga.', 'Et ut dolor nihil iste rem sed expedita consequatur. Quia sit esse natus tempore et. Sint qui asperiores sunt voluptas autem animi omnis et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(144, 23, 'Earum fugit fuga ducimus numquam.', 'Numquam est nostrum voluptate beatae numquam cum dignissimos et. Quis nostrum omnis culpa rerum quia qui. Magni fugit pariatur dolorum fuga similique. Itaque a mollitia quis labore.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(145, 23, 'Facilis dolores magnam distinctio voluptas nostrum nobis.', 'Esse sit aperiam sint qui dolorum. Placeat qui nesciunt debitis. Omnis voluptas placeat molestiae eum fugit eveniet tempora. Dolor aut odio nemo tenetur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(146, 24, 'Rem doloremque commodi recusandae non ex.', 'Id assumenda molestiae quia. Numquam dolorum repellat aut aliquid vero cum. Quibusdam corrupti soluta iusto amet laudantium ab aut nihil.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(147, 25, 'Incidunt quasi magnam totam quo.', 'Laudantium ea nobis laborum non unde expedita. Ducimus molestias quibusdam alias veniam. Doloremque adipisci eveniet explicabo sequi. Rerum et recusandae deserunt dolorem odit error est.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(148, 26, 'Perferendis sed et suscipit.', 'Incidunt aut quas omnis enim consequatur. Id consequatur velit doloremque. Hic dolorum quis aspernatur labore. Nulla voluptatem ipsam aperiam sit.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(149, 26, 'Et ex iusto vel ut.', 'Molestias fuga et commodi. Quos esse quo ex voluptas et nostrum. Consequatur nemo consequatur ab.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(150, 26, 'Saepe debitis necessitatibus pariatur qui.', 'Delectus accusamus dignissimos quisquam totam rerum. Saepe mollitia voluptate error ipsum quos. Non autem hic similique iure iste nam et rerum. Debitis a sit veniam quod sint dolorem odit. Odio non perspiciatis adipisci earum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(151, 26, 'Ea nostrum at nulla ut autem.', 'Fuga vel expedita cum. Voluptatem reprehenderit assumenda neque animi eos labore est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(152, 26, 'Iusto numquam earum pariatur eos velit tenetur.', 'Sunt reprehenderit quaerat aut praesentium dolorem pariatur. Eum illum voluptatibus rerum id reiciendis sint sunt. Deserunt corrupti veritatis fuga ut quod quisquam expedita. Animi non reiciendis aut consequatur omnis et nulla sapiente.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(153, 27, 'Atque necessitatibus qui accusantium ut libero iste voluptatum officiis.', 'Omnis aperiam quae est sequi qui. Eos atque commodi doloremque enim ut eius sed. Vel aspernatur et voluptas dolores facilis ipsam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(154, 27, 'Et accusantium quo non pariatur est dolor.', 'Beatae dicta mollitia quae aperiam impedit. Consequatur explicabo deserunt ducimus qui. Qui porro eos qui. Quis nostrum voluptas repudiandae ullam aut nostrum eum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(155, 27, 'Eius neque aut veritatis dicta ratione.', 'Ipsam doloremque esse eos ratione. Ipsum dolores accusantium architecto ducimus rem consequatur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(156, 27, 'Voluptas sunt nihil soluta eveniet accusamus.', 'Qui impedit et soluta eum veritatis aspernatur. Aliquam odit impedit veritatis sit illum omnis dolor. Et quo sed cumque qui et. Doloribus voluptas excepturi necessitatibus sapiente alias sed in. Sit et rerum id adipisci.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(183, 34, 'Cum delectus voluptatem consequatur occaecati.', 'Aut illum impedit molestias voluptatem eum nisi qui. Repellendus quo similique omnis officiis dolores autem eum. Et quidem ipsum et tempora.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(184, 35, 'Atque delectus maiores modi quis.', 'Officiis expedita esse minus asperiores eligendi quam et. Excepturi magni pariatur sit omnis et. Aperiam harum et qui asperiores quia illum esse aspernatur. Neque sapiente tempora cumque dolorem odio.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(185, 35, 'Eum corporis sunt harum qui deleniti.', 'Architecto esse velit explicabo recusandae rem mollitia. Magni aliquam sit et ut quaerat velit accusamus. Nulla recusandae consequatur provident aut sed adipisci.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(186, 35, 'Quam sint et nihil aliquam tempore.', 'Dolore adipisci et dolores tenetur odio. Tempora ipsam iste voluptates iure sunt est. Cumque expedita ex libero repellendus officiis aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(187, 35, 'Nihil at voluptas deserunt id aliquam.', 'Nesciunt tenetur deserunt aut occaecati. Voluptas saepe in quam quis quae. Itaque dolorem enim dolores distinctio veniam consequatur.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(188, 35, 'Eos illo dicta qui minima nobis autem sed.', 'Quos voluptas ipsa iusto laboriosam. Sapiente rerum inventore rerum harum libero amet doloremque cumque. Sunt voluptas itaque voluptates optio.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(189, 35, 'Nihil ducimus est eaque officiis iure consectetur quod.', 'Occaecati neque doloribus consequatur quia nihil. Incidunt laudantium aliquam et omnis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(190, 35, 'Dolorem accusantium sit dignissimos sunt reprehenderit.', 'Aliquam et non sit praesentium aut nulla ea. Iusto qui autem ullam nisi recusandae tenetur repudiandae et. Et dolore quaerat sequi laudantium excepturi et est. Qui expedita nostrum porro deserunt dolores. Ducimus quo quas tempora culpa quia nesciunt quidem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(191, 35, 'Qui perferendis est voluptatibus atque velit eos consequatur ad.', 'Et dolores sint cupiditate totam ut. Odit architecto rem vel rerum aut. Consequuntur recusandae eveniet doloribus quia ipsum omnis. Voluptatem ut sit beatae enim et. Animi et illum ipsa neque et eligendi autem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(192, 36, 'Velit asperiores culpa nihil.', 'Ea distinctio omnis velit distinctio officiis aut commodi. Maxime saepe enim repellendus culpa voluptate nam occaecati.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(193, 36, 'Hic impedit perferendis magnam eos quaerat.', 'Quia quod at sapiente quia. Animi porro vero rerum vel tenetur est impedit. Nihil qui optio eius reiciendis. Voluptas id dolor reiciendis dignissimos.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(194, 36, 'Sunt earum consectetur sed et nobis.', 'Consequatur animi voluptatibus voluptas neque quia vel nisi voluptatum. Quod tempore velit et occaecati iure in. Dolorum laborum consequuntur quos sunt iste necessitatibus qui. Eaque dolor alias sint eos quidem voluptatem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(195, 36, 'Voluptatem minima ab quia quia est corporis.', 'Omnis velit enim ea a dignissimos harum. Illo reiciendis ut facilis et minus provident iure id.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(196, 36, 'Beatae amet dolorum veniam maiores aut.', 'Iure odio unde sit enim id sequi et. Fugit ut distinctio non a dolores numquam. Voluptate ipsum modi et ullam. Necessitatibus numquam a ducimus ut quisquam sint sunt.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(197, 37, 'Minima ad saepe odit ab accusamus.', 'Commodi id architecto neque sed. Atque fugit repellat et ut labore quas.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(198, 37, 'Quis ut aspernatur excepturi sunt.', 'Porro aut dolorem inventore accusamus. Facilis quia aut exercitationem non maxime.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(199, 37, 'Aliquam voluptate eum est excepturi officia dolores.', 'Laboriosam quod quod rerum enim molestias. Voluptatem soluta id minus saepe autem similique blanditiis eum. Et voluptatem atque sed et et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(200, 37, 'Est non deserunt voluptas culpa voluptatem distinctio accusamus.', 'Omnis molestiae voluptas consequatur dolorum est. Error nihil et tempore temporibus enim laudantium ut qui. Error non ut corporis est deserunt. Id natus odit ut amet vel quis ut perferendis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(201, 37, 'Similique autem modi animi ut velit quia deserunt.', 'Asperiores et suscipit officiis rerum. Et reiciendis recusandae iure in perferendis. Qui culpa praesentium omnis qui fugit incidunt consectetur.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(202, 37, 'Quo aut in et alias eveniet voluptas cupiditate.', 'Quam quae aperiam omnis non harum. Dolore veniam quis tempora odio at dolores tempora. Velit quia esse culpa sequi possimus. Illo possimus magni est nesciunt.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(203, 37, 'Commodi est ut veniam id aut.', 'Fuga sequi corporis fugiat molestiae. Placeat aut minus vel nihil consequatur. Aspernatur sequi ipsa minima. Cum magnam amet fuga ullam est et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(204, 38, 'Error dignissimos soluta quia voluptate.', 'Consequatur incidunt optio deleniti deserunt blanditiis corrupti labore itaque. Omnis repudiandae libero enim autem aut unde. Numquam rem asperiores numquam. Ut illo ipsum illum ex nisi consequatur. Occaecati a iure sed placeat mollitia.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(205, 38, 'Sapiente sed cum saepe repellat debitis debitis.', 'Earum aut ipsum autem nihil minima vitae totam. Modi consequatur sit et odit distinctio.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(206, 38, 'Iure ad omnis veritatis id.', 'Voluptas fugiat voluptatibus ut non nihil est dicta. Voluptatem aut fugit delectus incidunt et aspernatur adipisci ex. Necessitatibus quia voluptatem magnam sit voluptas sit architecto. Sint et voluptas quia possimus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(207, 38, 'Necessitatibus modi corrupti debitis dolores.', 'Omnis quia dolorem impedit quaerat rerum amet et. Et eveniet possimus officia debitis. Natus assumenda dolorem quia aliquid. Sequi repellat aliquam beatae modi excepturi.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(208, 38, 'Sint quae voluptate quod praesentium corporis corrupti.', 'Et rerum libero aut omnis ab eveniet eum. Vel nam quas rem atque adipisci harum. Voluptatem harum id et minus maxime quidem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(209, 38, 'Eveniet qui sunt est esse officiis cumque.', 'Ipsam voluptas aut voluptatem. Suscipit repellat doloremque excepturi nemo enim. Optio non quia ea omnis ea adipisci placeat.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(210, 38, 'Soluta hic quae dolor quae.', 'Maxime voluptas repellat in est rem. Quo et sapiente non magni voluptates dolores omnis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(211, 38, 'Nulla nihil dicta illum quia accusantium aut.', 'Quasi qui ut et nostrum commodi incidunt iusto nisi. Ducimus harum molestias dolorum velit. Ab nostrum numquam maiores cupiditate cumque soluta.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(212, 39, 'Similique similique velit sequi quisquam ducimus.', 'Et nihil quo ut. Molestiae reiciendis itaque repellat quisquam vitae nemo. Enim vero sit aut qui voluptas nisi. Quasi debitis et nostrum aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(213, 39, 'Ipsam facere esse accusantium rerum quaerat officiis et.', 'Odio ullam deserunt modi sed. Perspiciatis numquam voluptate aut et velit molestiae dolor. Alias dolore minus corrupti ut fuga magnam. Quo iusto suscipit impedit rem ut placeat qui.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(214, 39, 'Perspiciatis et autem eveniet aut quisquam quia similique.', 'Quos ut corporis eos illo quidem. Fugit cupiditate nobis et rerum ut ducimus quia. Delectus magni magnam minima at praesentium. Autem eveniet placeat neque quia velit.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(215, 39, 'Accusantium vero nihil nesciunt voluptatem.', 'Et qui occaecati autem dolorum qui porro aperiam ut. Non quas libero ab itaque. Enim possimus assumenda blanditiis debitis rem animi ipsam quidem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(216, 39, 'Quia sint eveniet quo aperiam repudiandae ut quia aliquam.', 'Error laboriosam facilis ut earum libero id beatae. Sunt numquam corporis quia quos id. Nulla qui quae consectetur dolor in saepe.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(217, 39, 'Laudantium exercitationem sed qui et.', 'Tenetur omnis qui itaque unde. Repellendus dolore voluptatum laboriosam exercitationem fugiat voluptate. Sit id id esse cupiditate quam officiis autem. Modi neque et veritatis amet.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(218, 39, 'Iusto voluptate et est blanditiis modi nesciunt autem.', 'Voluptas sed consequatur quia. Facere non voluptates enim beatae. Eaque omnis tempore explicabo nemo. Voluptate pariatur deserunt recusandae.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(219, 39, 'Et voluptatem optio repellendus officia doloremque.', 'Sit architecto consequatur quos soluta. Neque praesentium dolor ipsa earum quaerat ipsa. Et eius libero odit voluptas est.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(220, 40, 'Molestias quo ut laboriosam sapiente quisquam sed accusantium hic.', 'Qui aspernatur quis quisquam porro. Quo voluptatem occaecati eos aut harum deserunt. Explicabo eos voluptatem corrupti tempora eaque animi eaque consectetur. Laboriosam consectetur eum accusantium omnis neque.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(221, 40, 'Autem cum aliquid non et.', 'Cumque ea totam ducimus commodi dolores odit. Optio unde provident perferendis adipisci. Odio numquam maiores nobis nisi neque quaerat est asperiores. Ipsum dolores deleniti voluptatem dolorum odio rerum magni.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(222, 40, 'Minima soluta dignissimos accusantium delectus suscipit perspiciatis perspiciatis nihil.', 'Sit dolor voluptatem officia voluptatem doloribus qui ducimus. Et rerum et est assumenda numquam autem laboriosam. Quas ea assumenda eum aut omnis nisi.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(223, 40, 'Dolorum repudiandae voluptate sed odio itaque.', 'Ducimus quod eum itaque sint. Et aut quod id fugiat asperiores molestiae. Maxime dolorum blanditiis ducimus quia itaque. Neque voluptatum at consectetur ex et veniam. Provident ea dolores soluta aut itaque neque.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(224, 40, 'Sit aut quia sapiente nihil rerum non.', 'Odio veritatis rem officia quae neque ea. Perferendis et et consectetur harum quam. Cumque aliquam quaerat sit atque officia fuga sed inventore.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(225, 40, 'Sequi qui sed unde id dolorem magni odit minima.', 'Libero voluptatum nemo et assumenda incidunt numquam tempore. Reprehenderit non occaecati inventore. Qui praesentium est facilis qui minus dicta maxime.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(226, 40, 'Natus distinctio culpa aliquam voluptatem eaque voluptate.', 'Nobis et necessitatibus porro veniam sed accusamus. Voluptate sint culpa ut. Aliquid cum ut et ea voluptatem ipsam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(227, 41, 'Cum mollitia ea libero vero dolorem harum.', 'Ut ipsa unde iusto ut quis ullam maiores. Accusamus sequi deleniti sed mollitia aperiam sint omnis. Dignissimos molestiae quas eos quam doloremque qui tenetur. Vitae qui aut ab laudantium alias magni.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(228, 41, 'Odit est laborum rerum reprehenderit.', 'Esse tempora iure aut eum culpa. Voluptatum provident eos perspiciatis aliquam repellat et dolorem ut. Ex ducimus aut at commodi dolor et rem quo. Quis ut nemo dolores possimus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(229, 41, 'Velit autem ea veritatis dicta ex nisi.', 'Omnis eos placeat qui nihil velit omnis. Tempore sed praesentium incidunt temporibus molestias. Suscipit modi magnam inventore vel non suscipit quia aliquid. Delectus in omnis et exercitationem non aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(230, 41, 'Qui est voluptas quia est est expedita.', 'Officiis quos hic ut nostrum quas qui tenetur. Voluptatem consequatur id non accusantium ut. Eum et id soluta id fuga et ullam debitis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(231, 42, 'Mollitia omnis aliquam consequatur.', 'Qui odit ratione dicta velit rem. Accusantium totam ut cupiditate perferendis id rerum. Sunt aut at a ad sint et. Optio illo explicabo pariatur aut magni.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(232, 43, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(233, 43, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(234, 43, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(235, 43, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(236, 43, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(237, 43, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(238, 43, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(239, 43, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(240, 43, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(241, 43, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(242, 44, 'Voluptates possimus dicta ipsa hic.', 'Quaerat mollitia magni nihil non est est. Eveniet porro distinctio natus ut et officia. Veritatis doloribus ab fuga eveniet.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(243, 45, 'Ut debitis sit veritatis molestias tempore.', 'Officia accusamus itaque in voluptatibus autem repudiandae facere. Aliquam perspiciatis animi et vero cum. Blanditiis aut perferendis ratione vel eius officiis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(244, 45, 'Sequi nesciunt quasi tempore quibusdam eum officia aut.', 'Explicabo quisquam dolorem vero est culpa nemo tenetur. Sunt et omnis enim perspiciatis ut doloremque asperiores. Et in optio enim in consequatur dolores aut repellat. Aut aut est deserunt ad unde recusandae quidem corporis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(245, 45, 'Reprehenderit ad necessitatibus facilis omnis dolorem voluptatem vel.', 'Numquam iure voluptatem est facere eum consequatur. Ea iste quibusdam velit. Placeat iste eveniet consequuntur deleniti error dicta.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(246, 45, 'Magni possimus et pariatur ea consequatur rerum.', 'Aut ea qui et natus necessitatibus eligendi. Recusandae sit odit eos ut. Et velit est consequatur quia. Exercitationem nostrum excepturi et qui qui enim ut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(247, 46, 'Commodi velit saepe maiores suscipit omnis et.', 'Facere adipisci aliquid ratione ut. Natus natus aut veritatis quos suscipit velit dolores. A vero quae quia minima. Eaque illo consequatur quia nulla.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(248, 47, 'Eius doloremque quia at.', 'Nesciunt ea est et omnis. Aliquid et consequatur cum assumenda. Et explicabo commodi ut culpa. Repellat dolorem rem incidunt molestiae et aut velit. Qui voluptates ab omnis dicta cupiditate debitis nam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(249, 47, 'Voluptate adipisci ea accusamus vel excepturi ad.', 'Omnis nobis qui excepturi omnis iste voluptatem. Debitis qui et maxime ut. Perferendis dicta veritatis ut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(250, 47, 'Dicta dolorem qui architecto odio rerum.', 'Iste voluptatem eos ea deserunt tenetur quo. Esse sint alias non pariatur ex et. Temporibus laboriosam magnam suscipit fugit maiores. Dolor error nulla quod quas at impedit harum autem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(251, 47, 'Esse magni ea iste sapiente consequatur totam dolorem.', 'Ipsam quis voluptate ab. Rerum omnis qui consequuntur qui voluptate autem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(252, 47, 'Repellat officia et et blanditiis.', 'Quae itaque natus facilis incidunt quia dolores. Officia earum cumque in sit praesentium vitae. Esse commodi voluptates iste et hic eos eligendi.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(253, 47, 'Exercitationem eum culpa sed est ea.', 'Praesentium animi eos sunt eos error cupiditate quo incidunt. Dignissimos consectetur voluptas cupiditate corporis molestiae. Sed ipsum possimus et unde aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(254, 47, 'Voluptatem numquam reiciendis dolor at expedita.', 'Repudiandae enim doloribus nobis animi atque ipsum omnis. Explicabo commodi corrupti adipisci ducimus accusantium voluptatum. Repellendus velit modi ipsa reprehenderit et omnis molestias. Provident qui et voluptas vero aut sed.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(255, 48, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(256, 48, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(257, 48, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(258, 48, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(259, 48, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(260, 48, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(261, 48, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(262, 48, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(263, 48, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(264, 48, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(265, 49, 'Dolorem qui alias sint vero.', 'Corrupti ut nihil assumenda beatae mollitia qui. Odit dolore sapiente ullam quaerat dolores iusto assumenda. Aut sit voluptas sint occaecati. Qui nostrum nihil temporibus consequatur illum eos. Consequatur adipisci ut quasi minus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(266, 49, 'Alias ut quia commodi aliquid culpa.', 'Cupiditate consequatur omnis libero et ut iusto sint. Voluptas sed voluptatem consequuntur reprehenderit qui.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(267, 49, 'Numquam illo pariatur id eius.', 'Voluptas nisi occaecati omnis quam aliquid ipsa. Voluptatem nam id inventore reprehenderit eaque ipsam architecto laborum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(268, 49, 'Ut libero voluptas ipsum vel a et.', 'Accusamus illo rerum aliquid. Officiis autem omnis ullam. Dolores ut rerum incidunt sit adipisci libero quis. Molestiae totam quasi voluptatibus a quaerat aut reiciendis voluptatem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(269, 49, 'Incidunt rerum dicta pariatur repudiandae incidunt delectus atque.', 'Voluptatem est voluptas impedit omnis velit consequatur sed. Illum aut doloribus excepturi tempore distinctio minus commodi. Quia odio deleniti dignissimos iure facere est. Alias et iste nobis impedit cum dignissimos.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(270, 49, 'Est expedita reiciendis ut culpa sit doloribus.', 'Maiores veniam rerum placeat dignissimos praesentium rerum et. Ea eius impedit ducimus facere. Possimus eos est rerum minima optio.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(271, 49, 'Id labore autem ullam eius dicta ea.', 'Enim autem aut consequatur omnis ab animi et. Explicabo aut et fugiat perspiciatis quam. Maxime accusamus fugiat animi soluta molestiae. Qui perspiciatis non sed temporibus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(272, 49, 'Nihil iusto qui repellat voluptatem illo.', 'Ut distinctio et omnis fugit. Et unde voluptatem sed. Est perferendis rem quia qui. Vero harum exercitationem quas ex suscipit a.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(273, 50, 'Quis error et cupiditate voluptatibus nisi temporibus corrupti ullam.', 'Consequatur dignissimos incidunt repellat mollitia. Omnis ratione culpa sunt fugit ab quas explicabo architecto. Non veniam voluptas nemo voluptatibus. Laborum autem excepturi omnis iure. Rerum minus eos aspernatur neque.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(274, 50, 'Beatae ullam vero doloribus illo.', 'Autem voluptatem similique quam ut et distinctio. Veniam officia alias recusandae voluptatibus. Eius incidunt magni dolorem maiores placeat.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(275, 50, 'Excepturi est qui atque repellat odio.', 'Harum itaque quasi vero. Autem aut doloribus iusto. Ipsam magni debitis quaerat itaque. Aut dolore voluptatem excepturi architecto. Ut maxime ea sed aut vitae corporis voluptatem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(276, 50, 'Laudantium aperiam ea quo tempore.', 'Iusto autem vero pariatur. Inventore ea nisi nobis et sed exercitationem enim soluta. Consequatur non et asperiores.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(277, 51, 'Occaecati autem delectus qui sequi.', 'A enim veniam voluptas ea voluptatem eum. Consectetur atque aliquam sed eum vel autem. Porro facere in perspiciatis odio aut. Rerum et non beatae natus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(278, 52, 'Molestiae saepe aperiam veniam debitis.', 'Earum rerum distinctio repudiandae harum sed consequatur. Eaque ut architecto incidunt provident nihil. Saepe maiores repellendus ullam. Voluptates voluptatem blanditiis explicabo veritatis qui magnam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(279, 52, 'Eaque omnis alias explicabo aut sint rerum quibusdam.', 'Eum ipsam voluptatem mollitia a. Ea quibusdam molestiae rerum exercitationem quia repudiandae vero blanditiis. Fuga minus aperiam at qui sunt omnis natus. Tempora dolores deserunt accusamus dolorum esse ad qui ducimus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(280, 52, 'Provident sequi voluptatem eius veniam.', 'Iste accusamus veniam est qui voluptate et. Dolorem incidunt minus temporibus culpa ipsum et ut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(281, 52, 'Qui fuga accusamus beatae.', 'Natus sit accusantium itaque neque. Eius sit nulla dolores atque. Repudiandae consequuntur laudantium sed rerum sapiente.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(282, 52, 'Illo corrupti earum nihil.', 'At quia accusamus dolore nemo voluptas fugiat. Eum aliquid cupiditate voluptatem error aliquam voluptatem mollitia ipsam. Maiores eum nostrum tempore ad saepe.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(283, 52, 'Nihil deserunt iure id distinctio qui eligendi quaerat.', 'Quae voluptatem aut nulla qui aliquam velit. Aut et voluptatem delectus velit sed praesentium eos rerum. Consectetur ut magnam assumenda est ea. Nihil voluptas voluptates et voluptatem facere voluptatem adipisci. Et fugiat et expedita dolores et sunt illum iste.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(284, 53, 'Qui esse laborum vero quia temporibus quibusdam.', 'Inventore ad eveniet delectus cumque. Earum iusto quos impedit ut. Quis ut beatae blanditiis ratione. Hic blanditiis quasi soluta cumque.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(285, 54, 'Ad dolorem ea molestias ut voluptas omnis.', 'Perferendis ea omnis tempore et quia. Quidem quia illo quia ut et quibusdam fugiat. Doloremque aliquid vitae dolorum alias unde. Eos ut veritatis inventore est voluptatibus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(286, 54, 'Rerum asperiores ut reiciendis quos magni sed.', 'Aliquam consequatur eum temporibus. Eos enim non optio facilis et et tempore. Esse perferendis consectetur quaerat officiis possimus in maiores dolores.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(287, 54, 'Eius vel et reiciendis quo rerum officiis blanditiis.', 'Sed illo odio consequuntur. Qui est soluta dolores sit et ullam in. Aperiam harum pariatur in et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(288, 54, 'Ducimus asperiores sunt voluptas quibusdam ipsa cum in.', 'Culpa et sequi hic doloribus fugiat. Ea ratione quia maxime dolore ratione assumenda est et. Corporis magni voluptatibus nihil nam aperiam atque facilis magnam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(289, 54, 'Velit ab saepe harum minus et sit eaque.', 'Maxime id maiores consequatur quasi sit doloremque. Mollitia consequatur molestiae natus itaque est est illo. Quis non harum similique aut velit repellat aperiam distinctio.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(290, 55, 'Voluptates perspiciatis maiores incidunt fugiat ut minus ut placeat.', 'Quis dignissimos omnis aut eligendi excepturi maxime rerum. Veniam dolorem a voluptas nulla est. Alias rerum fugit ea libero consequatur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(291, 55, 'Quos consequatur ab veritatis ad.', 'Dolor non eum porro facilis. Qui ut natus deserunt voluptatum earum voluptatem. Id voluptatem tempore dignissimos totam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(292, 55, 'Cumque nihil nobis commodi eos nobis quibusdam.', 'Dolor nobis reprehenderit optio sint maxime non explicabo. Odio dignissimos eligendi excepturi. Harum quasi fuga non deserunt voluptas adipisci. Odit eum aut eum ea ut dolores et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(293, 55, 'Quam voluptatem expedita quis non.', 'Ipsam quas deleniti numquam et. Quaerat corporis autem nemo et. Commodi voluptate quisquam eum voluptas est exercitationem aspernatur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(294, 55, 'Eaque eum in odio illum est.', 'Tempora veritatis maxime aliquam possimus. Suscipit praesentium odio excepturi unde qui nulla repudiandae. A expedita ratione dolorem tempora. Consequuntur voluptates quas modi rerum nobis non et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(295, 55, 'Numquam repudiandae dignissimos harum sunt qui sapiente hic et.', 'Aut facilis magni maiores quis nobis accusamus. Omnis incidunt eum sequi alias voluptates et et. Et dolorem optio velit iusto autem quaerat adipisci. Praesentium nemo alias enim et aut vel aut sequi.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(296, 55, 'Suscipit ipsum amet soluta eius.', 'Error enim aut doloremque laboriosam adipisci quidem autem quod. Enim iusto voluptatem dolor explicabo molestiae. Impedit cupiditate ducimus voluptas fugiat. At libero qui odit deleniti architecto laborum qui aperiam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(297, 56, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(298, 56, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(299, 56, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(300, 56, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(301, 56, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(302, 56, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(303, 56, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(304, 56, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(305, 56, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(306, 56, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(307, 57, 'Perferendis eligendi omnis blanditiis id temporibus sed recusandae dicta.', 'Inventore perferendis qui eligendi ex occaecati qui tempora. Omnis corrupti ipsa quo omnis ut. Assumenda nesciunt fugiat ipsa fugiat iusto quia dicta.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(308, 58, 'Voluptas temporibus asperiores aut fugit.', 'Unde rerum repellendus corporis. Ducimus natus explicabo dolor est voluptas. Et voluptatem dignissimos quas vel voluptates iusto. Omnis at adipisci natus enim ratione illo.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(309, 58, 'Est et enim consequuntur.', 'Asperiores dignissimos tempora impedit doloremque est praesentium ut. Quod amet deleniti in doloribus facilis iste et. Culpa provident et distinctio laudantium et nobis ducimus totam. Blanditiis est ex et voluptatem consectetur excepturi non eveniet.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(310, 58, 'Voluptas illo in velit nihil iusto omnis.', 'Est omnis maiores non quod quod laborum. Laboriosam aut maiores sint voluptatem laborum. Maiores harum harum eum nemo magni velit nihil. Libero qui fugit eos.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(311, 58, 'Non ut dolor veniam et iure.', 'Perspiciatis nostrum et minima harum occaecati consectetur. Quam eius velit unde molestiae quia iure ut incidunt. Labore nihil voluptatibus magnam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(312, 59, 'Ut et dolorem velit facere quo quas nulla.', 'Natus amet voluptatem ea recusandae. Delectus vitae vero asperiores impedit soluta praesentium ut. Laboriosam voluptas omnis iure dolores animi ipsa vel ab.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(313, 59, 'Sequi non rerum eos repellendus.', 'Fugiat quis odio libero et. Cum placeat mollitia quibusdam rerum itaque atque consectetur deleniti. Eum dolorem sit est voluptas occaecati rem. Sunt voluptas officiis non sit fugit. Aut non corporis aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(314, 59, 'Quasi a voluptas quam vel.', 'Aut nulla eius harum aut natus voluptas illo ipsum. Qui deserunt magni ut et qui consequatur ex. Dolores quaerat vitae excepturi.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(315, 59, 'Accusantium corporis repellat voluptas quisquam.', 'Illum dolorem rem accusantium debitis et aliquid. Et deleniti fuga occaecati sunt. Harum ut eos ut hic. Distinctio quis sequi illum impedit eum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(316, 60, 'Ratione sapiente cumque recusandae quis odit.', 'Placeat eaque sit expedita in dicta ullam quae. Pariatur numquam quia aut illo excepturi voluptatem. Voluptas culpa voluptatem iure ad. Occaecati in fugiat ipsum soluta molestiae labore eveniet praesentium.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(317, 61, 'Non ipsa deleniti sed quia.', 'Repellat nesciunt laboriosam accusantium ipsum. Distinctio fugiat dolores quibusdam similique et quam itaque. Sapiente facere minus libero sit alias inventore. Incidunt voluptas sed corporis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(318, 62, 'Nihil quas consectetur quasi temporibus dolor.', 'Minima quia minima pariatur iusto beatae. Molestias quia et molestiae veniam. Consequatur consectetur fugit omnis eligendi ut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(319, 63, 'Vel aut autem modi aut labore.', 'Quia dolor corporis tenetur tenetur aut provident cumque. Tenetur eligendi est qui. Adipisci fugit illo illo dolor iure ut quas. Aliquid sequi qui occaecati necessitatibus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(320, 63, 'Officiis voluptatem optio sint quia dolor.', 'Aut ipsa optio magni voluptas veniam distinctio. Voluptate vitae a occaecati deserunt. Iure qui tenetur accusamus fuga.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(321, 63, 'A est expedita eos reprehenderit.', 'Hic voluptatum fugit corrupti laboriosam. Nesciunt earum est eveniet voluptatem. Qui culpa neque corporis facilis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13');
INSERT INTO `options` (`id`, `question_id`, `content`, `explanation`, `is_correct`, `created_at`, `updated_at`) VALUES
(322, 63, 'Et non deleniti praesentium temporibus delectus.', 'Cupiditate nesciunt velit repudiandae voluptas. Vel aperiam ut consequatur quis quibusdam quis. Autem soluta possimus optio qui. Praesentium quis perspiciatis soluta optio et dolor animi. Numquam numquam maxime atque dolore.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(323, 63, 'Laborum ullam nam illum est quos.', 'Consequatur error cupiditate eum voluptatem quo dolores. Rerum in ea aut earum. Sint qui vero pariatur incidunt possimus. Doloribus asperiores quibusdam animi sint magnam nam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(324, 63, 'Rerum qui ab recusandae itaque.', 'Qui eos alias quibusdam aut. Laborum consequatur aut sit est excepturi officiis eum. Quia esse dolorem officia explicabo repudiandae alias. Consectetur delectus dignissimos ducimus ipsa fugit.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(325, 64, 'Voluptatem repudiandae soluta qui sit nisi nulla.', 'Consequatur et et pariatur omnis voluptatem consequuntur. Quibusdam officia occaecati accusamus nostrum nihil in perspiciatis. Molestiae qui expedita accusantium nostrum cupiditate. Debitis blanditiis vero excepturi a in eos.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(326, 64, 'Aut autem aut minus esse velit.', 'Sequi assumenda odit et possimus. Autem dolor qui accusamus laborum. Quasi voluptatum quos molestiae saepe.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(327, 64, 'Voluptatibus repellat quis asperiores et suscipit et in.', 'Ab similique reprehenderit quis et vero dolorem quo sit. Aut labore non eum cumque sed facilis dolor. Eos est quia quis quae ut. Provident optio incidunt hic aliquam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(328, 64, 'Nihil error in reiciendis fuga laboriosam blanditiis ab.', 'Sint quam maiores ipsam natus consequuntur beatae quisquam. Tempore officia doloribus dolor. Nemo sequi maxime quaerat expedita.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(329, 64, 'Et commodi culpa rerum voluptatum nisi ut.', 'Rerum et enim odio culpa at. Rerum incidunt eos dolore vitae. Non voluptas sapiente a eveniet velit incidunt in.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(330, 64, 'Iure veniam non libero ut dolorum eveniet et.', 'Ipsa aut dolores autem occaecati quis numquam iusto laboriosam. Est rerum quod iusto. Iure blanditiis sit consequatur deserunt. Numquam laborum aut incidunt aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(331, 65, 'Ab dolore natus impedit qui aut rerum.', 'Ut est itaque a facere eum ab suscipit. Iusto qui ipsam et deserunt animi exercitationem impedit. Sit quia corrupti assumenda. Corrupti et tenetur voluptate natus. Ratione et sunt omnis quo consectetur iusto a.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(332, 65, 'Saepe aut et quo occaecati quia adipisci.', 'Possimus voluptates vel consequatur nam consectetur eum. Sed rem et aliquam quas atque. Quaerat ipsam unde nisi sit dolores et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(333, 65, 'Repudiandae nemo commodi quis voluptas porro.', 'Nesciunt nam iusto aspernatur quam quod. Vel voluptas illo voluptas. Eos ut vel sunt quod rem earum.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(334, 65, 'Voluptatibus adipisci veritatis quis sunt magnam commodi at nisi.', 'Dolor quos et nesciunt saepe. Quibusdam voluptatibus doloremque tenetur delectus. Ullam ratione aut natus non. Nihil fuga similique qui.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(335, 65, 'Ipsa odio incidunt eos.', 'Aut nihil est et est nihil ipsum aspernatur. Et laudantium ex debitis doloremque magni aut. Magnam quas expedita odio.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(336, 65, 'Tenetur error qui aut sapiente qui ducimus itaque.', 'Asperiores et libero eos et commodi neque. Sint deleniti dolores sunt ipsum. Dolorem quia totam id. Aperiam et explicabo nisi in.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(337, 66, 'Quas accusamus qui molestias ipsam in et quis.', 'Maxime reprehenderit maxime culpa. Molestiae quia sunt necessitatibus eveniet voluptas voluptatem. Animi nihil sit fugit quia incidunt sit et. Optio temporibus quod cum corporis. Hic veniam velit libero natus dolores.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(338, 67, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(339, 67, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(340, 67, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(341, 67, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(342, 67, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(343, 67, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(344, 67, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(345, 67, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(346, 67, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(347, 67, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(348, 68, 'Odio voluptate doloribus et ut earum maiores aut doloribus.', 'Quaerat aspernatur voluptatum ducimus et magnam maiores. Aut ipsa nesciunt accusamus dicta. Temporibus maiores eos ea veniam earum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(349, 68, 'Commodi quia illo ipsa voluptatem odit harum quaerat.', 'Quaerat pariatur in mollitia corporis alias mollitia. Reiciendis sit corporis modi atque sequi. In et numquam ea ut impedit.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(350, 68, 'Labore voluptatem molestias et excepturi similique.', 'Voluptatibus illo minima iusto libero. Et labore autem aperiam suscipit at. Non deserunt aut quia numquam consequuntur et ad. Harum qui iste dolorem rerum reiciendis temporibus inventore.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(351, 68, 'At et quia qui non esse.', 'Repudiandae iste quos asperiores enim nihil. Corrupti beatae aut quaerat amet amet aut. Et aspernatur et earum aut. In laborum sunt id quibusdam nostrum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(352, 68, 'Eius quos molestiae voluptas qui in optio.', 'Eius hic occaecati omnis cumque deleniti libero. Vel accusantium aut facilis laudantium voluptas praesentium. Assumenda reprehenderit recusandae est laborum est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(353, 69, 'Cum corrupti numquam est voluptatem sit dignissimos qui.', 'Illo consequatur nostrum ad odit vel et nemo. Consectetur magnam sit qui dignissimos. Debitis id perferendis enim ut. Temporibus et nobis a quis suscipit quas enim.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(354, 69, 'Et non repudiandae aut est dolor esse.', 'Delectus ut itaque pariatur corporis ut similique quas. Sit et non et ut. Voluptatem rem explicabo quas qui voluptas et et aut. Quia nisi in occaecati ut est autem voluptatem. Dolore rerum ad voluptates fugit.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(355, 69, 'Et consequatur aliquam consectetur.', 'Ut consequatur est saepe corrupti quaerat pariatur. Necessitatibus eum eaque quas facere vitae tempore eos beatae. Autem nemo perferendis autem quisquam provident architecto. Alias tempore accusamus ipsa in.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(356, 69, 'Dolorem illum quia quo similique.', 'Suscipit voluptate velit esse. Quaerat cumque repellendus quas aliquid vero. Provident voluptatum ut alias dolor error sequi id.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(357, 69, 'Sed quia alias molestiae ut.', 'Ipsa doloremque sit veritatis dolores optio optio. Eaque harum recusandae provident iure. Aut officia earum voluptatem et. Impedit aut sit ullam dolore enim consequatur.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(358, 69, 'Dicta omnis quia dicta totam at neque perspiciatis.', 'Sed praesentium modi porro non alias. Dolor corrupti a quae quo. Unde quibusdam doloremque consequatur accusamus. Ipsum eligendi quos consectetur est deleniti. Quibusdam aut magnam cupiditate sint.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(359, 69, 'Deleniti cupiditate occaecati eum aut pariatur voluptate cumque.', 'Excepturi nihil odit ut dignissimos. Ipsum magnam libero fuga facere enim dignissimos vitae. Voluptatum nihil facilis non alias sit qui impedit nam. Facilis molestiae vero voluptate qui nihil eos tempore.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(360, 70, 'Dolor aperiam dolor quis saepe dignissimos earum et.', 'Cupiditate earum eum nisi omnis voluptatem et non. Iure impedit sit quo ut fugit reiciendis aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(361, 70, 'Et eaque sed qui modi molestiae voluptas quia aut.', 'Voluptatibus autem est laborum voluptates at. Porro accusamus eaque odio aut. Tenetur itaque pariatur ut temporibus fugit.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(362, 70, 'Dolores aut est ea architecto laudantium.', 'Sed et harum velit quae et error quis. Autem quidem deleniti repellendus reprehenderit aperiam consequatur.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(363, 70, 'Esse et dolorem doloremque.', 'Quas aut rerum aliquam et. Non ducimus neque sit ullam praesentium veniam voluptatem ea. Dolore et velit porro quam voluptatem facilis vitae. Fuga odit velit quas dolorem nemo qui.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(364, 71, 'Repudiandae quia quae quia non.', 'Expedita in quam sed voluptatem. Qui et soluta totam similique est aut. In sunt beatae neque et voluptates corporis. Voluptas voluptatem recusandae est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(365, 71, 'Voluptas reiciendis iste doloremque ullam omnis deserunt numquam.', 'Officiis quia distinctio facilis aspernatur culpa non et. Facilis et id eveniet et ut cupiditate. Maiores et non voluptas alias officia eius. Nostrum facere ut accusantium.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(366, 71, 'Ducimus sint id aut aut sint voluptatem.', 'Esse distinctio suscipit tempora sit. Inventore quia est omnis praesentium error. Quidem mollitia aut facilis sit ullam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(367, 71, 'Deserunt ipsa modi ut cum porro.', 'Quis omnis repellat velit voluptate error sint exercitationem. Quia et a laudantium qui optio rerum natus. Laudantium vero accusamus nisi est. Sunt corrupti quia dolorem quia consequatur. Tempora omnis laudantium natus nulla.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(368, 71, 'Et earum voluptatem consequuntur rerum.', 'Nemo cumque rerum eos velit. Vero iure eaque nulla debitis consequatur eum. Officia ad molestias ut illum dignissimos.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(369, 72, 'Voluptatem amet minima expedita vero quae.', 'Delectus dolore nobis ut esse quia beatae. Incidunt fugit debitis dolores ab laborum optio rerum. Debitis voluptas qui eos occaecati assumenda sequi aliquam. Aliquid consequuntur rerum aspernatur nulla quod quia.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(370, 73, 'Aspernatur expedita natus at odio.', 'Sunt ut nihil quia adipisci. Dignissimos quasi expedita recusandae ratione. Laudantium et minus quasi repellendus omnis dolor. Laudantium delectus molestiae et ex et reprehenderit.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(371, 73, 'Tempora et maxime eligendi consequatur consequatur fugit.', 'Enim dolor sed sed quis. Deleniti nisi dolorem molestias voluptas et. Quo dolor maiores et ad doloribus. Aliquid cupiditate ut voluptatem velit nemo culpa sapiente dolores. At numquam iste qui commodi quasi molestiae.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(372, 73, 'Sint illum ipsa similique non non blanditiis similique.', 'Eius aliquid magnam inventore officiis quia ut consequatur. Facilis magnam nisi occaecati. Nihil voluptatem quas reiciendis consectetur aut dignissimos nesciunt nemo.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(373, 73, 'Debitis ipsam et voluptas magni.', 'Consequatur nobis quis ipsa consequatur cum assumenda quaerat. Est quaerat quibusdam repellendus beatae eveniet aspernatur praesentium sapiente. Eum dolor iusto tenetur in. Qui consequuntur aut sint sint odit.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(374, 73, 'Iste qui nostrum in perferendis ut molestiae.', 'Quam aut quibusdam adipisci animi incidunt ut. Praesentium aliquam eius nesciunt. Molestiae aperiam molestias repellat. Dolore voluptas nisi voluptatem repudiandae.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(375, 73, 'Fugiat officiis quia in blanditiis.', 'Quas enim consequatur soluta rem nisi. Est perferendis quaerat libero tempore. In rerum et qui maiores quas nihil.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(376, 74, 'Qui optio sunt quis occaecati voluptates eius.', 'Fuga sapiente eaque et hic quisquam nesciunt. Consequatur optio et ullam et reprehenderit facere. Nam excepturi perspiciatis ut ut. Ut a rerum saepe rerum doloremque assumenda vel.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(377, 74, 'Commodi nostrum inventore fugiat voluptatem sint quam debitis hic.', 'Consectetur reprehenderit id animi. Delectus eos est corporis non aliquam laboriosam. Et et praesentium est harum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(378, 74, 'Recusandae esse at qui commodi placeat.', 'Ut assumenda odio aut voluptates tenetur. Nihil tempora repellat mollitia corporis. Laborum et et beatae omnis dolores.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(379, 74, 'Porro labore quis quam veritatis.', 'Eius reiciendis sit consectetur ad alias. Officiis deserunt beatae quidem assumenda est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(380, 75, 'Inventore ducimus nihil quia hic.', 'Voluptas non sed quam fugit ad libero. Sunt qui fuga consequatur aut commodi perspiciatis perspiciatis et. Provident ut animi consequuntur rem. Tenetur minima est ducimus repellat.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(381, 75, 'Odio minus veniam dolorem est commodi.', 'Rerum possimus explicabo voluptas et. Dignissimos ducimus quis et qui aut enim. Laboriosam qui omnis velit itaque est. Ut laboriosam consequatur sit sapiente nulla sed quis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(382, 75, 'Ea sapiente aliquid consectetur.', 'Eum id et aut qui. Deserunt vero ad et dolore. Sed est dicta sed consequatur dolor esse.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(383, 75, 'Tempora atque impedit doloremque eligendi laudantium in sed.', 'Modi delectus totam ipsam eos rerum ut. Et autem dolor ad nobis accusamus laborum. A delectus enim odio laboriosam quo assumenda consequatur. Dolores quia enim occaecati eius. Qui quia cumque ut cumque facere natus.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(384, 75, 'Cum tempora aperiam aliquid sit corporis commodi.', 'Eligendi sunt id rerum eum et neque nihil. In numquam accusantium aut dolore nostrum labore et. Alias rem dolores temporibus inventore libero harum est. Veniam aliquid sint quo et sunt voluptatibus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(385, 75, 'Commodi sequi modi labore.', 'Temporibus repellendus et repellat. Veritatis corporis deserunt hic consequatur sit aut est. Voluptas aliquam nam placeat sed earum. Exercitationem voluptate earum ut unde aut maiores blanditiis.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(386, 75, 'Commodi occaecati laboriosam nam minima sint inventore esse dolores.', 'Ea sed ex placeat culpa ut. Molestiae earum ex aspernatur asperiores sed.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(387, 75, 'Excepturi ullam atque qui maiores.', 'A ipsa sed sed quo magni architecto eaque. In nobis et odio. Eos et ut inventore quo maxime.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(388, 76, 'Ut omnis reprehenderit ullam qui.', 'Laudantium accusamus dolor autem nihil totam. Itaque et non rem ratione iure repudiandae facilis. Magni amet facilis autem sed autem dolores. Dolor atque repellat nihil.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(389, 76, 'Similique repellat sequi et perspiciatis.', 'Impedit non natus consectetur maxime asperiores. Et a et accusamus libero fugit. Qui autem aperiam officiis pariatur omnis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(390, 76, 'Laudantium asperiores perspiciatis quia praesentium non eius.', 'Nobis omnis tenetur qui iure qui ipsam eum. Dolore adipisci deserunt dolor error. Eaque repellendus labore dolorem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(391, 76, 'Accusamus nam molestiae dolores delectus qui.', 'Unde quod commodi est eos. Doloremque incidunt qui cum consectetur. Aut ad adipisci deserunt est libero aut. Aspernatur nam modi est molestiae sapiente rerum itaque.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(392, 76, 'Dolores dolor facilis laborum.', 'Eum dolores quisquam non aut. Nam voluptatibus eos alias eum qui aliquid consectetur. Et nostrum occaecati est nihil. Voluptas tempora aut praesentium a quaerat.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(393, 77, 'Ipsam velit dolor tempore totam.', 'Maxime et et adipisci non. Cumque quae non inventore exercitationem. Sed aut a expedita distinctio. Ipsam tempora perferendis voluptas doloremque quidem quia.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(394, 77, 'Sed autem omnis asperiores debitis corrupti voluptatibus.', 'Architecto et saepe doloribus quaerat dolores ut mollitia. Et voluptate deleniti nulla qui inventore cumque ut. Qui optio ipsa culpa et expedita corrupti.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(395, 77, 'Quasi animi et sint ut et omnis.', 'Ea velit ut rerum esse alias error ut. Quis non sint et saepe dolorem. Reprehenderit sit explicabo distinctio culpa. Fuga et inventore rerum quia.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(396, 77, 'Natus ipsa et ea et facilis nihil.', 'Excepturi molestiae quod dignissimos non. Voluptatem assumenda et illo. Explicabo rerum cupiditate enim iusto.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(397, 77, 'Omnis vero quos facere ab.', 'Ullam quia nihil officia. Magni qui vel est magnam ut labore. Doloribus omnis perspiciatis rem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(398, 77, 'Nulla iste necessitatibus assumenda.', 'Corporis praesentium et voluptas accusamus consequuntur. Consequatur fuga ea esse at exercitationem minima fugiat quisquam. Non deserunt officia consequatur pariatur placeat aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(399, 78, 'Maiores excepturi quam et perspiciatis nihil aspernatur debitis.', 'Consectetur quod consequatur vitae qui voluptate. Qui quas neque et. Nobis debitis ad eum enim sed. A et architecto et officia laudantium possimus. Rerum eos voluptas aliquam est excepturi et harum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(400, 78, 'Eum quo nemo animi est autem illum laudantium.', 'Quisquam quia in inventore accusantium accusantium non. Deserunt id officiis eius distinctio voluptas quibusdam non. Aperiam et quisquam nihil pariatur aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(401, 78, 'Ipsam sunt eos soluta velit et quia cupiditate.', 'Possimus et qui perferendis architecto culpa eveniet. Et labore iusto blanditiis non recusandae eligendi. Et rerum tempora corrupti consequatur dolorem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(402, 78, 'Consequatur fugiat deleniti sed distinctio autem explicabo.', 'Aut a nihil ducimus quo quia. Culpa nam soluta deserunt qui. Blanditiis quidem dolor voluptas laboriosam non eius impedit. Sed laboriosam qui quasi veritatis omnis nostrum est et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(404, 80, 'Sapiente maiores illo saepe sit dolores libero tenetur incidunt.', 'Iste et exercitationem culpa non. Autem dolores aut voluptatum ut nihil. Non sapiente necessitatibus quos quia.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(405, 80, 'Iste autem praesentium sunt velit.', 'Rem modi recusandae adipisci nihil repellendus. Beatae qui est qui et doloribus. Non rerum magnam officia animi deserunt qui esse.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(406, 80, 'Praesentium ratione vitae sed.', 'Doloremque repudiandae occaecati suscipit veritatis quaerat facere. Eum voluptatem consequatur hic vel. Ducimus aliquam esse aliquid nemo quidem fuga. Est et aliquid voluptatibus temporibus necessitatibus ut quisquam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(407, 80, 'Quaerat sit eum non.', 'Sed eum nemo et quam. Aut fugit alias incidunt. Eligendi quam voluptas cumque nostrum.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(408, 80, 'In corporis laborum quibusdam eveniet illum.', 'Aliquam voluptas reiciendis perspiciatis minus praesentium similique in. Saepe harum reprehenderit et quo. Tenetur voluptas sed tempore distinctio id et ut. Eligendi cum sint amet repellendus quidem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(409, 81, 'Tempora rerum sunt quibusdam quia velit.', 'Dolores minus omnis et ducimus necessitatibus accusamus vero. Accusantium rerum in repellendus nulla assumenda. Quasi unde modi dolorem vel numquam quis. Praesentium qui sint occaecati provident ea necessitatibus iure. Iusto aut quod explicabo.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(410, 82, 'Vel rerum quo libero et et repellendus natus.', 'Qui reiciendis minus a omnis. Aut id necessitatibus qui et autem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(411, 82, 'Quia voluptate nobis occaecati qui fuga a dolor.', 'Quisquam et non eos accusamus similique. Accusantium voluptatum mollitia sed eligendi distinctio aut commodi. Sit dolores et aspernatur quia.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(412, 82, 'Vitae fugit debitis aut.', 'Sed labore illo voluptatum ut est rem. Magnam beatae et magnam quia. Explicabo aut est tenetur quia cumque ipsa. Eum sequi in laboriosam aut dolor. Ipsa totam sed et vitae cupiditate odio ea numquam.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(413, 82, 'Vero est iure nobis aut odio ut.', 'Suscipit nemo rerum tempora facere corrupti. Totam nulla asperiores repellendus ipsam aliquam. Voluptatum iusto maxime ipsam odit expedita. Neque ut magnam minima explicabo aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(414, 82, 'Quo aut iure officiis ut voluptatem natus nemo.', 'Ratione nam aliquam vel consequatur. Numquam sit quo et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(415, 82, 'Qui veritatis quo adipisci quidem officiis.', 'Delectus autem cupiditate et eos aut velit. Modi nihil facilis dolores qui quisquam numquam voluptatem ab. Totam maiores molestiae fugiat neque dolorum. Aliquid et vero qui est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(416, 82, 'Tempora numquam dignissimos veniam et.', 'Excepturi assumenda repudiandae id et sed. Placeat tempore nisi molestias maiores beatae necessitatibus. Ipsum consequatur et ducimus quisquam omnis.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(417, 83, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(418, 83, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(419, 83, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(420, 83, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(421, 83, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(422, 83, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(423, 83, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(424, 83, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(425, 83, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(426, 83, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(427, 84, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(428, 84, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(429, 84, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(430, 84, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(431, 84, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(432, 84, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(433, 84, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(434, 84, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(435, 84, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(436, 84, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(437, 85, 'Consequatur explicabo voluptas sit et a.', 'Consequatur quae corporis maxime commodi pariatur. Sint dicta libero qui et id. Consequuntur quidem provident cumque eos.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(438, 86, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(439, 86, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(440, 86, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(441, 86, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(442, 86, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(443, 86, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(444, 86, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(445, 86, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(446, 86, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(447, 86, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(448, 87, 'Accusantium maiores necessitatibus eum incidunt voluptate.', 'Doloremque saepe odit repellendus suscipit consequatur deserunt. Quia ipsum quae quibusdam praesentium accusantium architecto. Voluptas quia nostrum molestiae illo cupiditate ut voluptas.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(449, 87, 'Ut nulla dolorum recusandae quidem dolorem.', 'Earum dolores aspernatur quia ipsam. Consequuntur necessitatibus et non tempora explicabo vel reprehenderit. Quos porro iure sint fuga corrupti quisquam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(450, 87, 'Consequatur possimus sed laboriosam maxime.', 'Dolores eaque labore exercitationem. Rerum totam odit libero amet. Vitae totam minima rerum non sed aut error.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(451, 87, 'Quos neque voluptatibus consequatur error commodi velit.', 'Nihil necessitatibus tempora hic ullam modi. Sit praesentium similique quod voluptatem voluptatum et. Est voluptatem aliquam quia nostrum voluptatem quae.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(497, 95, 'Tenetur atque dignissimos ullam aut ut necessitatibus fugiat.', 'Quas eveniet suscipit accusantium. Ut iure aut quia atque veniam sed hic. Veritatis rerum ullam at dolor.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(498, 95, 'Veniam et ipsam quia nihil.', 'Ab aspernatur vel aut sit unde. Dolorem aliquam dolorem ut eius. Nihil sed distinctio voluptatem hic. Nam neque explicabo est porro quo aut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(499, 95, 'Sapiente minima corporis qui qui cumque eum ipsum.', 'Iusto occaecati officia doloremque sunt quo ut aut incidunt. Illum voluptas ipsum eaque voluptatem cum quas odio quia.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(500, 95, 'Sed vel repellat et labore.', 'Pariatur natus sint ipsa in aperiam voluptatem hic. Voluptatibus id id aut iusto et. Possimus repudiandae libero odit et saepe.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(501, 96, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(502, 96, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(503, 96, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(504, 96, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(505, 96, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(506, 96, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(507, 96, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(508, 96, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(509, 96, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(510, 96, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(511, 97, 'Deleniti nostrum eum et.', 'Non qui in et modi et occaecati autem tenetur. Voluptas illum facere omnis facere illo eaque itaque et. Ut aut delectus et at autem. Rerum fugit minus suscipit ut voluptatem.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(512, 97, 'Quam quis architecto quod.', 'Animi et consectetur voluptas omnis eaque architecto unde eum. Tempora voluptates dolorum non adipisci debitis et. Ipsa in similique natus veritatis illum ut. Molestiae beatae officiis deserunt repellat accusamus reprehenderit.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(513, 97, 'Nihil cum suscipit est explicabo.', 'Officia aliquam maiores dignissimos nemo beatae omnis voluptatibus. Cumque enim quaerat nobis illum. Beatae ut reprehenderit odio doloribus tempore. Iusto provident praesentium ratione iusto quisquam.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(514, 97, 'Minus vel ipsam et fugit harum.', 'Eligendi non eum est nisi explicabo omnis. Aliquid et omnis voluptas tenetur nostrum voluptatibus ipsa. Amet maxime voluptatem quos ipsa qui reiciendis illo est.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(515, 97, 'Ratione facilis molestiae qui qui voluptate suscipit architecto voluptatem.', 'Dolores sequi ipsam aut consectetur architecto nulla dolor ipsum. Nam molestiae impedit illo. At sed incidunt harum voluptate molestias. Repellendus voluptas enim ut quod similique facilis rerum. Consectetur vitae quo aut asperiores ratione modi.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(516, 97, 'Assumenda eveniet odit earum non tenetur rerum molestias.', 'Vitae laboriosam a commodi modi maxime aliquam dignissimos. Numquam corrupti aliquid consectetur quaerat similique a. Repudiandae nemo fugit excepturi veritatis enim dolor. Ratione est sint delectus.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(517, 97, 'Est adipisci ratione odit.', 'Ullam nam aut rerum dolor repellat amet. Sequi sit placeat magnam nisi. Quis repudiandae accusamus perspiciatis. Inventore officiis aliquam itaque quos modi quibusdam et.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(518, 98, 'Quidem labore earum accusantium ea asperiores vero sunt.', 'Fugiat praesentium possimus molestias repellat. Illo ratione iusto nemo facilis et. Recusandae voluptas facilis mollitia voluptatem explicabo molestiae ab.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(519, 99, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(520, 99, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(521, 99, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(522, 99, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(523, 99, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(524, 99, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(525, 99, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(526, 99, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(527, 99, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(528, 99, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(529, 100, '1', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(530, 100, '2', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(531, 100, '3', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(532, 100, '4', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(533, 100, '5', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(534, 100, '6', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(535, 100, '7', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(536, 100, '8', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(537, 100, '9', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(538, 100, '10', NULL, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(539, 101, 'Vel tempore ad perspiciatis.', 'Consectetur ab odit est earum quidem ut a necessitatibus. Laudantium voluptas itaque in est rerum id dignissimos. Nesciunt praesentium dolorum sit aut ea sit alias. Dolores temporibus magnam quia veniam ipsum autem.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(540, 102, 'Aut itaque est omnis est.', 'Ea accusamus quos ipsum beatae. Voluptas a vitae et consectetur vero doloremque atque natus. Quisquam nam qui et rerum. Temporibus natus atque omnis aut. Provident repellat omnis aut quia.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(541, 102, 'Et quaerat ea ea maiores fugiat natus libero veritatis.', 'Tenetur odio ratione rem quos omnis. Vel nulla in pariatur praesentium. Iste quas facilis voluptatem dolores vel. Aut nam odio et quis aut.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(542, 102, 'Occaecati suscipit ratione debitis esse unde porro.', 'Sed voluptas nesciunt suscipit qui laudantium et. Eaque quaerat sit quia quaerat incidunt rem quis. Ex temporibus consequuntur consequatur. Rem ratione sit enim et.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(543, 102, 'Quis alias a voluptas blanditiis facilis.', 'Voluptatum inventore ut similique omnis in. Cumque aliquid et nulla nihil placeat placeat nam. Velit possimus enim quis repellendus magni.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(544, 102, 'Magni quos minus aliquam est et.', 'Et minima ad nulla aut omnis accusantium quisquam. Impedit tempora eveniet excepturi repellat consequatur architecto quidem. Minima impedit labore placeat minima nostrum porro magni. Molestias fugit id porro modi qui.', 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(545, 102, 'Sed ullam doloremque quo quas at quia sunt.', 'Animi ad laudantium velit non corrupti. Cupiditate sapiente nihil aperiam nostrum nesciunt ut. Eos autem perspiciatis sint facilis numquam voluptas earum. Porro mollitia occaecati corrupti qui qui in ut.', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(546, 103, 'Voluptatem amet assumenda dolore et quasi et tempora.', 'Quia at animi consequatur iste id sit. Soluta voluptatibus adipisci temporibus ab perspiciatis. Velit exercitationem quae veritatis. Quia odit animi facere quaerat et ut odit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(547, 103, 'Molestiae quas praesentium praesentium et iure aut.', 'Autem libero est dolores numquam. Est occaecati qui aliquid. Dolor hic molestiae sit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(548, 103, 'Expedita nihil in cupiditate perferendis odit.', 'Consectetur dolorum dolores aut rem. Mollitia voluptatem dolorem asperiores enim provident.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(549, 103, 'Blanditiis placeat qui aut qui.', 'Voluptatibus aut ut quo doloremque quia deserunt ratione error. Eaque amet vel in tempore recusandae. Maiores similique ab mollitia sit quos molestiae. Eius voluptatem aut alias non.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(550, 103, 'Voluptate quis corrupti iure minus.', 'Enim et fuga quas vel. Debitis inventore ea qui. Dolorem autem architecto non dolorem ut dolor ex.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(551, 103, 'Et id quae dolorem consequuntur non numquam.', 'Et est velit est unde. Rem cumque excepturi pariatur autem incidunt. Velit aut modi ea blanditiis dicta vero.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(552, 104, 'Doloribus et commodi harum labore nemo vel.', 'Expedita ut eos officiis. Tempora et velit necessitatibus. At incidunt fuga dicta. Ut sit et et delectus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(553, 104, 'Ut qui similique recusandae ut sed commodi.', 'Rerum consequatur suscipit voluptatibus veritatis dolore ipsam non veritatis. Beatae nihil ratione rerum eaque non tempore excepturi eos. Veritatis ut fuga nostrum eius. Facilis autem aspernatur perspiciatis in. Est quis est sunt velit soluta.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(554, 104, 'Fugit non quasi voluptatibus nihil architecto enim officia.', 'Vel provident consequatur culpa reprehenderit delectus. Libero distinctio voluptas vel dignissimos ipsam. Sed consectetur veritatis dolores at. Corporis eos sunt omnis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(555, 104, 'Modi atque aut officia tempora.', 'Officia illum esse asperiores id vitae sed. Quam cum quia sit nesciunt. Deserunt sed in eum rerum voluptatem expedita ipsum dolores. Qui molestiae voluptatum quo quibusdam ut dolores consequatur.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(556, 104, 'Dicta incidunt et alias ea et.', 'Unde voluptatem sunt quaerat aliquid doloremque dolores recusandae sint. Ut voluptatem maxime necessitatibus sed. Unde necessitatibus sequi enim.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(557, 105, 'Aperiam aliquid nostrum vero error.', 'Velit quasi quaerat ut voluptatem repudiandae non. Autem repudiandae laborum eos vel voluptatem amet. Quis et facilis suscipit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(558, 106, 'Et ut quod nulla a.', 'In rerum culpa natus quod sit. Et molestias ipsam aut. Ratione tempore quia temporibus sunt laborum praesentium assumenda modi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(559, 107, 'Quia odit id at sunt animi.', 'Autem soluta accusamus aut fugit quod eveniet. Cum aut delectus hic unde in. Eum at commodi nisi sint nihil id incidunt est.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(560, 107, 'Maiores pariatur amet et dolore.', 'Aliquam ea voluptas dolorem. Ut esse recusandae adipisci saepe vel. Enim cumque et deleniti voluptatibus laboriosam culpa. Nisi fugit fugiat commodi vel mollitia.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(561, 107, 'Consequatur nostrum atque modi numquam.', 'Nobis molestias error nemo. Numquam minima consequatur et eveniet omnis optio pariatur. Nihil voluptatem error qui iste dicta aut. Molestiae provident modi consequatur odit nihil ut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(562, 107, 'Nobis quia fugit vel consequuntur temporibus facere.', 'Fugit quos quam corporis est esse. Non quaerat veniam mollitia. Asperiores necessitatibus molestiae culpa cupiditate fuga id ut. Minima quisquam distinctio architecto labore inventore voluptatem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(563, 107, 'Ratione qui itaque et est.', 'Iusto eaque cum non. Sed eos delectus ut illum. Consequatur rem ut eligendi labore.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(564, 107, 'Accusamus amet aut maxime.', 'Deserunt aut consectetur rerum voluptatem. Facere assumenda incidunt dolore sequi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(565, 107, 'Harum aut et magni esse alias illum sapiente vero.', 'Quas saepe quisquam occaecati aperiam explicabo eos impedit. Laboriosam magni ipsam officiis enim ut dolor. Incidunt commodi sed aut fuga rerum recusandae aspernatur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(566, 108, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(567, 108, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(568, 108, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(569, 108, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(570, 108, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(571, 108, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(572, 108, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(573, 108, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(574, 108, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(575, 108, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(576, 109, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(577, 109, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(578, 109, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(579, 109, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(580, 109, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(581, 109, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(582, 109, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(583, 109, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(584, 109, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(585, 109, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(586, 110, 'Dolorem dolores necessitatibus natus expedita.', 'Voluptatum est qui ex minus temporibus odio. Veritatis doloribus deleniti eaque repudiandae nesciunt. Unde dolorem ad nisi repudiandae voluptatem. Rerum explicabo optio esse enim expedita assumenda omnis nobis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(587, 110, 'Alias exercitationem rerum rem aliquid veniam ut harum.', 'Ipsa et totam ut doloribus a quia ut. Voluptatem expedita dolores enim nobis laudantium voluptatem ad. Eligendi aspernatur expedita cupiditate tempore recusandae. Autem quibusdam eveniet sit doloribus ut rem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(588, 110, 'Est soluta aspernatur odit omnis accusamus.', 'Voluptatem quidem adipisci eos et. Laborum adipisci provident qui adipisci eveniet magnam cupiditate. Vel est veniam labore doloribus assumenda qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(589, 110, 'Nulla quia autem dolorem aut nisi nesciunt minus.', 'Iure temporibus laboriosam a magnam pariatur aut. Qui nisi voluptatem excepturi iusto perspiciatis qui quis. Unde quasi laborum aut rerum animi aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(590, 110, 'Sint quis corporis incidunt facere est ipsum odio illum.', 'Est sit blanditiis consequatur asperiores expedita amet quia. Perferendis nam doloribus non et alias. Rerum officia earum aut provident quis incidunt laborum. Debitis eos commodi pariatur doloremque.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(591, 110, 'Animi veritatis voluptatem consequuntur mollitia.', 'Optio voluptatem delectus rem voluptas. Quisquam deserunt eos fugit distinctio nostrum reiciendis tenetur. Nesciunt necessitatibus velit quis totam.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(592, 110, 'Sapiente culpa eligendi fugit hic.', 'Veniam excepturi cumque corrupti expedita voluptate rerum minima. Molestiae quo sint necessitatibus autem. Libero dolorem earum aut deleniti. Aut omnis rerum modi praesentium porro deserunt corrupti. Eum aspernatur incidunt ut facere ut alias.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(593, 110, 'Ducimus aliquid unde corporis sunt suscipit.', 'Omnis vero itaque totam. Voluptatem itaque officia et sint autem distinctio.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(594, 111, 'Distinctio explicabo voluptas ut doloribus molestiae non ratione aperiam.', 'Inventore ut atque quas unde deleniti est molestias. Veniam placeat doloremque dolorem minus similique. Deleniti perspiciatis dolor est et qui ipsam quo. Molestiae quisquam repudiandae excepturi optio beatae ullam maiores molestias.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(595, 111, 'Atque molestias voluptatem ab illum.', 'Eos suscipit inventore eaque excepturi. Iste inventore rerum iure at rerum non. Magni libero nihil quos laudantium et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(596, 111, 'Vel minus voluptas debitis laboriosam nisi consequatur dolore.', 'Sapiente optio similique nam ut quas. Nihil non voluptas eos animi maiores.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(597, 111, 'Eaque dolore explicabo aut expedita voluptatibus debitis voluptate sint.', 'Vel at explicabo sapiente sapiente voluptatibus quo. Vel laboriosam perspiciatis vitae necessitatibus est et delectus. Quis optio et expedita tempora esse magni aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(598, 111, 'Quia vel dolorem rerum labore.', 'Ipsa soluta omnis voluptatem consequatur non qui dolorem. Esse rerum error et dolores. Deleniti voluptate quos omnis qui necessitatibus molestiae. Qui sapiente et fugiat voluptate.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(599, 111, 'Id quo molestiae recusandae est quasi corrupti architecto.', 'Est est inventore similique omnis laudantium voluptatem. Quo eos voluptatem nobis voluptatem commodi. Consequatur eos tempore perferendis culpa eos. Commodi qui eaque dolorem est. Amet hic est vitae qui atque accusantium omnis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(600, 111, 'Voluptatibus blanditiis sunt voluptatem corrupti sunt magni culpa facilis.', 'Ut quisquam aperiam voluptatum dolor cumque. Aliquam corporis non iusto officia molestias excepturi et. Eveniet aut quis soluta facere molestiae eligendi. Eum officiis illo voluptate hic ipsa autem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(601, 111, 'Quis voluptatem fuga omnis atque aliquid ducimus.', 'Ut rerum dignissimos eaque voluptatem. Necessitatibus voluptatem temporibus maiores perspiciatis iusto sit voluptatem. Quaerat ipsum est vel cum itaque.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(602, 112, 'Aspernatur sapiente iure quia quam quo similique.', 'Nihil debitis voluptas ullam qui. Est et voluptatem dignissimos vel est. Minima sed consequuntur iste nam omnis et dolores.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(603, 112, 'Velit qui sint nihil recusandae perspiciatis soluta.', 'Recusandae ratione repudiandae harum porro. Modi iusto cupiditate saepe libero iste. Non quo debitis dolores dignissimos est. Nobis adipisci omnis quos et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(604, 112, 'Sed in nesciunt consectetur veniam vel tenetur sequi sunt.', 'Ad ipsa et ea maiores nobis consequatur commodi. Atque quidem laborum repellendus voluptas tenetur dolore. Rerum doloribus eaque sit harum nihil perspiciatis. Nesciunt delectus sed enim possimus deserunt.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(605, 112, 'Vitae et ipsum laboriosam quibusdam consectetur.', 'Qui veniam saepe rem. Itaque quidem maxime nihil fuga ex quam delectus. Et ullam rerum necessitatibus assumenda sunt.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(606, 112, 'Dolore consectetur sunt consequuntur temporibus tempora beatae.', 'Qui sint voluptas vitae. Qui rerum eum laborum. Reiciendis commodi ratione enim tenetur. Quaerat iusto culpa facere eum omnis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(607, 112, 'Eum quia ipsa iure.', 'Voluptatem nemo ea est sunt omnis laboriosam. Autem perferendis maxime sed blanditiis repellat velit eaque. Repellendus et laudantium ullam consectetur unde recusandae. Fuga molestias magni et iste itaque incidunt cumque sit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(608, 112, 'Distinctio libero provident voluptate quia excepturi.', 'Eveniet omnis enim sed veritatis qui. Tempora nemo corrupti enim natus ut repellendus qui. Libero esse modi alias blanditiis mollitia non. Consectetur eos consectetur maiores praesentium veniam voluptas ut et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(609, 113, 'Quo voluptatibus corrupti ratione non veniam quas.', 'Cupiditate unde explicabo quidem quo et consequatur debitis dolor. Numquam error et eos. Magni eius quis qui quia molestiae. Sunt sit est veniam ad et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(610, 113, 'Nobis voluptas corporis explicabo hic porro debitis earum.', 'Autem aut quod omnis. Veritatis a non voluptas eaque quidem rem. Natus voluptatem voluptate et modi exercitationem impedit dignissimos. Molestiae et labore modi minima voluptates enim et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(611, 113, 'Expedita nobis ut sit consectetur.', 'Et sint est fuga rerum laudantium. Commodi culpa ipsa voluptatibus minima minima.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(612, 113, 'Voluptatem id dicta vel.', 'Voluptatem omnis ea non explicabo. Molestiae aperiam quaerat aliquam dolorum eligendi. Voluptatibus consequatur voluptatem assumenda nihil occaecati saepe.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(613, 113, 'Laboriosam ut pariatur suscipit ratione voluptas voluptas.', 'Ipsa aut eos quasi et quod accusantium rerum. Quia mollitia ea ut quia aut aliquid. Ut temporibus in fugiat.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(614, 113, 'Fuga ducimus iste iste repellendus.', 'Maiores non doloribus eos recusandae eius. Ipsum qui porro error et sed. Est error ipsa delectus commodi iure. Similique qui dicta provident accusantium sit veritatis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(615, 113, 'Doloribus et mollitia totam incidunt porro enim sit.', 'Dignissimos est rerum cum. Dolores nemo ex ut. Asperiores nesciunt aliquam placeat assumenda quod non illo. Est nulla qui ut fuga quia magnam et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(616, 113, 'Aut amet et fugit eum corporis ullam corrupti.', 'Consequuntur molestiae quis accusamus culpa. Officia et eos enim nisi veritatis. Explicabo laudantium ea atque nulla amet totam.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(617, 114, 'Autem qui distinctio eaque quia aut odio.', 'Molestias enim facilis nisi sed architecto quidem et. Sed magni saepe perferendis aut ut aut. Consequatur nesciunt tempora facilis id.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(618, 114, 'Corporis praesentium ratione ut.', 'Voluptatem quis quos nihil aut voluptatem. Ut et sint itaque eum qui. Beatae repellat nihil corporis ipsa esse libero dolorem. Nemo repellat aut consequuntur in.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(619, 114, 'Laudantium nihil repellendus nihil sit odit.', 'Sed adipisci voluptates neque. Sint qui architecto voluptatem quisquam consequatur harum et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(620, 114, 'Incidunt ex sunt quam quidem minima.', 'Assumenda et modi error. Mollitia aliquam reprehenderit quia dolorum. Eos aliquam aut corporis porro minima culpa dolorum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14');
INSERT INTO `options` (`id`, `question_id`, `content`, `explanation`, `is_correct`, `created_at`, `updated_at`) VALUES
(621, 114, 'Delectus officiis cumque laboriosam odio aut.', 'Sed officia facilis dolorum similique quisquam qui laboriosam sit. Nihil voluptas non totam consequatur sed ipsam vel ab. Occaecati quae saepe modi voluptas impedit sunt inventore. Assumenda ipsa quia necessitatibus tenetur esse molestiae error.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(622, 114, 'Harum deleniti quidem qui consequatur et reiciendis aut quia.', 'Nulla voluptas corporis vero omnis eum atque dolorem. Quis architecto voluptates officia. Consequatur optio dolor illum dignissimos et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(623, 114, 'Ratione neque omnis voluptatem rerum ad.', 'Quod ipsa quis sit debitis aspernatur molestiae sunt. Et veritatis dolorum voluptatem molestias et. Sapiente blanditiis non eos sunt dolorum nostrum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(624, 115, 'Sit deleniti ex et repudiandae.', 'Explicabo sed et aut id esse laboriosam. Voluptatem consequuntur accusamus similique et necessitatibus. Omnis officiis quo ut exercitationem sit qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(625, 116, 'Corporis voluptas quae pariatur.', 'Magnam modi et aut voluptas minus nulla quia. Quasi eum ut reprehenderit. Perferendis quia quis id ut distinctio accusantium.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(626, 116, 'Facilis minus dolores eum perferendis aut quod.', 'Sint et molestiae dolor ut debitis. Accusantium illo sunt et. Maiores ea voluptatem beatae est.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(627, 116, 'Voluptate ea natus iusto.', 'Porro id quia totam dolorem voluptatem adipisci officiis. Itaque sed vel sit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(628, 116, 'Aliquid molestiae commodi ipsa nostrum rerum ut.', 'Tenetur quisquam eligendi odio at sint repudiandae facilis. Aut ut esse consequatur a quis vel. Quasi modi commodi aut et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(629, 116, 'Voluptas excepturi ipsa occaecati voluptate provident qui.', 'Est temporibus sunt et autem a. Tenetur repudiandae qui perspiciatis amet quam dolorum illum. Qui vel repellat suscipit alias sed.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(630, 116, 'Nostrum omnis assumenda doloremque non quaerat deleniti.', 'Nesciunt dolores iste delectus. Corporis ullam cumque ut assumenda sequi. Ratione rerum ipsa nisi ut aut et nesciunt iste.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(631, 116, 'Autem omnis voluptatem placeat dolorem non debitis in.', 'Nam ut et asperiores quia iure non molestiae. Odit odit alias et quo laborum tempora. In aspernatur et quo modi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(632, 116, 'Quam sunt quidem corporis reiciendis et.', 'Et rerum eum voluptatem nostrum rerum. Harum deserunt unde nostrum delectus soluta commodi sit rerum. Repellendus iste voluptatem perferendis. Quis distinctio consequatur magni corrupti aperiam fuga quia officiis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(633, 117, 'Ut non quia et eos quis ut.', 'Quas laborum recusandae molestiae ut ut numquam. Aut sit porro deserunt autem blanditiis. A sed qui repellendus et saepe cupiditate enim. Minus et aspernatur rerum quisquam. Porro fugiat minima quia id.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(634, 117, 'Dolores ipsam autem quia consequatur.', 'Molestiae eius voluptatum et. Consequatur qui dolor quia et sed cupiditate velit aut. Dolorem voluptates repellat eos ut vero quod occaecati.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(635, 117, 'Delectus laborum velit reprehenderit hic quia ipsum quas.', 'Nemo dolor et at libero. Ipsam ut et pariatur aut ipsum qui. Saepe dolor similique quaerat rem voluptatum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(636, 117, 'Cum et est eos reiciendis mollitia cum voluptatem.', 'Eum et et quos molestiae accusamus. Quia magnam consequatur nobis accusantium. Aut aut debitis qui ut veritatis culpa.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(637, 117, 'Consequatur possimus in dolorum hic dolores harum.', 'Repellendus ullam maxime eaque aperiam deserunt. Sunt iusto eos aut illum harum consequatur nam aut. Aut atque suscipit est rerum dolor est omnis. Sequi natus dolorem qui voluptate reiciendis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(638, 117, 'Quo tempore delectus voluptatum.', 'Similique illum aperiam amet quo mollitia aut. Doloribus voluptatum voluptas ut odio ut soluta eligendi. Atque voluptatem non dolorem ut. Omnis rerum dignissimos eligendi ducimus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(639, 117, 'Maiores illo sed porro consequatur qui.', 'Est ea natus veniam atque. Porro autem nesciunt suscipit ut placeat. Tempora iusto eveniet qui est voluptatem facere et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(640, 117, 'Quia voluptas dolor qui optio fugit dolores.', 'Quis explicabo at qui dolore autem aspernatur autem. Laborum totam ullam commodi delectus atque omnis minima.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(641, 118, 'Distinctio incidunt alias quis.', 'Sit ut distinctio corporis unde nemo optio aut. Pariatur dolore repellat iure expedita voluptate aperiam. Est qui qui facilis tempore.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(642, 119, 'Deserunt distinctio ea aut iusto consectetur.', 'Nobis molestiae ea sequi consectetur quia ea doloribus. Quae reprehenderit id vel pariatur maxime ut maxime. Excepturi aut distinctio aut odio earum id quia. Temporibus quis nesciunt et et accusantium.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(643, 120, 'Est vel consequuntur inventore maxime.', 'Ut ipsa laudantium delectus nihil placeat porro ut. Expedita ipsam magnam voluptatum odit ipsa delectus cum. Veritatis omnis unde labore aliquam nulla iste assumenda. Repellat odit voluptatem ut sit. Officiis qui iste et et sunt quia.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(644, 120, 'Voluptas blanditiis quae sunt numquam.', 'Voluptas dolorem aut qui perspiciatis alias consequatur. Nulla iure ab voluptate est nostrum perferendis nam. Fugiat ipsum temporibus numquam. Quos voluptatum laudantium distinctio dolorem enim rem. Quasi similique ut dolor dolorem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(645, 120, 'Maxime sequi aspernatur veritatis.', 'Ad eum velit quam harum veritatis quis. Similique nulla saepe sint inventore. Inventore numquam et doloremque odit est.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(646, 120, 'Odit nesciunt rerum at est est dolore quia.', 'Eaque cumque dolore voluptas consequatur sint dolorem. Laudantium dignissimos officia assumenda ullam. Animi omnis unde ut placeat veritatis tempore.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(647, 120, 'Illum nesciunt et velit enim labore qui ut aut.', 'Ipsa dolores unde quos veritatis voluptatem. Nemo non facere quos. Sit et eligendi eum incidunt.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(648, 120, 'Nihil eligendi quam aut voluptates qui dolorem consequuntur rerum.', 'Quos facere molestias quisquam ratione dolorem earum quia. Adipisci vitae eius cum vel. Tempora neque excepturi sint error illum quod nisi atque.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(649, 120, 'Perspiciatis quia rerum consequuntur tenetur cum.', 'Aliquam velit libero nihil eaque quo aliquid. Rerum ipsam fuga exercitationem libero et veritatis voluptates. Est perspiciatis et iure maiores in itaque. Sint at accusamus pariatur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(650, 121, 'Laboriosam nisi mollitia sit blanditiis architecto.', 'Et quam est voluptatum nisi ad hic sequi. Odit architecto consequatur dolore et et. Vel qui esse commodi. Pariatur nobis omnis ipsa in.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(651, 121, 'Est eum et consequatur non.', 'Vel quia minima et incidunt veniam doloribus qui nam. Non doloribus unde quasi voluptatibus. Neque nostrum fugiat temporibus quis necessitatibus esse corporis. Nostrum corrupti quisquam porro incidunt cum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(652, 121, 'Eum dolores modi minima architecto repellat.', 'Sed eveniet saepe est odio nihil fugiat at. Odit doloribus delectus id earum. Et doloribus sit recusandae esse id.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(653, 121, 'Quam odio similique eum vitae dicta temporibus ullam soluta.', 'Enim ut totam commodi amet consequatur aut qui. Corrupti omnis tempora et incidunt praesentium quidem hic. Voluptatem quia accusamus ducimus consectetur.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(654, 121, 'Ut explicabo consequatur ut ut ducimus ducimus inventore.', 'Maiores ipsam tempora quae placeat molestiae possimus quos mollitia. Autem autem voluptatibus eius vitae nihil inventore. Dolore recusandae nam blanditiis est. Quisquam ea dolor autem qui ad voluptatem aspernatur. Veniam dolores et ea libero et ut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(655, 122, 'Aliquid quia necessitatibus tempora cumque officiis voluptatem.', 'Qui quo impedit sequi nemo ipsum id necessitatibus. Eveniet iusto odio neque similique nam explicabo. Voluptatum qui dolores debitis repudiandae nulla. Tempore ipsam cupiditate et est sed.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(656, 122, 'Voluptas sint libero id neque id.', 'Veniam reiciendis labore animi. Eos laboriosam omnis fugiat suscipit inventore. Laborum dicta laudantium enim sint aut. Ea aut asperiores dolores. Libero odit quo asperiores nihil eos nihil nobis laudantium.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(657, 122, 'Beatae modi quia nulla quia maxime a recusandae.', 'Praesentium rerum odit temporibus. Doloribus fuga neque et est asperiores omnis earum. Et beatae voluptas sed est aut corporis aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(658, 122, 'Illum rerum optio odit nihil ea officia.', 'Deleniti blanditiis voluptatem expedita iusto. Illum suscipit eum eos qui. Accusamus reprehenderit rerum reprehenderit laudantium ducimus quisquam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(659, 122, 'Rem omnis impedit voluptas necessitatibus.', 'Veritatis rerum sint nobis velit impedit iusto. Mollitia iusto velit mollitia consequatur veritatis autem sunt. Earum earum aliquid iusto aut reprehenderit voluptatem et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(660, 123, 'Laboriosam voluptatem assumenda et sit numquam corrupti consequuntur temporibus.', 'Repellat rem aut est sint ex. Blanditiis voluptate sit nihil quo. Distinctio placeat id in at iusto rem consequatur earum. Vel est necessitatibus iste et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(661, 123, 'Non sed quasi magnam enim sit consequatur.', 'Ipsa dolorem quos quaerat modi. Aliquam saepe et sunt eum. Ut ut reiciendis et iusto harum iusto necessitatibus. Fuga omnis officia enim aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(662, 123, 'Sint dicta nam mollitia sed molestias enim qui nobis.', 'Aut ut eum voluptate ipsum suscipit sequi. Corrupti ut est animi alias voluptate perferendis. Esse esse id cupiditate temporibus quas.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(663, 123, 'Nulla et quasi id occaecati incidunt repellendus.', 'Minus dignissimos quibusdam voluptates odit non. Cumque ipsum quas quaerat eaque.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(664, 124, 'Velit molestias illum velit molestias quaerat fuga.', 'Placeat perferendis veritatis velit dolor possimus. Qui consequatur natus laboriosam quaerat perspiciatis quisquam. Temporibus quasi sed totam est quo voluptas aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(665, 124, 'Ipsa sit nihil et corrupti.', 'Ad sit quis similique sapiente facere possimus laborum. Amet dignissimos ut facere ut voluptatem. Quia fugiat quia sequi excepturi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(666, 124, 'Voluptas repellendus molestias facere ut temporibus asperiores.', 'Illo est sapiente laboriosam. Fugiat voluptatem accusamus molestiae. Officia sed voluptatem odit et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(667, 124, 'Aliquam repellendus voluptas ut harum et error dignissimos.', 'Voluptatum voluptatem nostrum recusandae. Odio alias assumenda fuga excepturi et eum in. Aut qui nisi et quis ut tempora sit dolores. Et eum aut maiores quisquam cum eos est. Debitis quae sint omnis error vero.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(668, 124, 'Earum quo sapiente facilis officiis soluta totam et.', 'Et exercitationem rerum quis et. Velit est hic laudantium autem voluptatum delectus. Doloribus quasi similique velit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(669, 124, 'Assumenda et corporis natus molestiae itaque qui.', 'Velit nihil dolor tempora maxime. Omnis nesciunt est ex modi. Maxime atque at itaque eius voluptatem ipsum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(670, 125, 'Ea cupiditate magnam delectus reiciendis aliquam.', 'Libero voluptas voluptatem non corporis. Fuga quae temporibus recusandae optio dignissimos qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(671, 126, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(672, 126, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(673, 126, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(674, 126, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(675, 126, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(676, 126, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(677, 126, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(678, 126, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(679, 126, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(680, 126, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(681, 127, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(682, 127, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(683, 127, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(684, 127, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(685, 127, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(686, 127, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(687, 127, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(688, 127, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(689, 127, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(690, 127, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(691, 128, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(692, 128, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(693, 128, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(694, 128, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(695, 128, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(696, 128, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(697, 128, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(698, 128, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(699, 128, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(700, 128, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(701, 129, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(702, 129, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(703, 129, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(704, 129, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(705, 129, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(706, 129, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(707, 129, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(708, 129, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(709, 129, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(710, 129, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(711, 130, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(712, 130, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(713, 130, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(714, 130, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(715, 130, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(716, 130, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(717, 130, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(718, 130, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(719, 130, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(720, 130, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(721, 131, 'Perferendis porro consequatur accusamus nihil.', 'Quia sunt adipisci reiciendis cupiditate. Et quae ut est hic. Nam voluptates ut illo quos ad sint est doloribus. Natus modi placeat a quia voluptatem optio fuga.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(722, 131, 'Asperiores et incidunt et.', 'Ut quia quis quas voluptatem. Ipsa expedita quia voluptas impedit. Excepturi sint sint sunt ut tempora.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(723, 131, 'Dignissimos quia voluptatibus a saepe magnam maxime odio facilis.', 'Ut eveniet aut inventore. Consequatur quia voluptate vitae minima porro corrupti. Est distinctio minima dolor optio assumenda. Molestiae quo voluptas officiis est non eum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(724, 131, 'Quidem alias quisquam corrupti qui voluptatem id.', 'Pariatur beatae magnam temporibus culpa et illum. Minima eum quod mollitia sed. Distinctio atque sit et in.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(725, 132, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(726, 132, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(727, 132, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(728, 132, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(729, 132, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(730, 132, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(731, 132, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(732, 132, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(733, 132, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(734, 132, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(735, 133, 'Dolor odit consequatur temporibus et eum.', 'Ea hic ut temporibus rem. Ullam accusamus aut dolor recusandae ut. Omnis sint ipsa nihil quis voluptates.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(736, 134, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(737, 134, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(738, 134, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(739, 134, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(740, 134, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(741, 134, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(742, 134, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(743, 134, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(744, 134, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(745, 134, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(746, 135, 'Quae nihil placeat qui rem qui fugit nemo.', 'Doloremque est blanditiis non nulla sit dolorem. Enim quis quam architecto. Minus rerum qui dolores ab et repellat. Natus officia voluptates itaque velit et voluptatibus laborum. Quas possimus dolor rerum quo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(747, 135, 'Vitae delectus aut est ut deserunt consequatur voluptatum.', 'Perferendis eum nihil vero deserunt. Voluptas doloribus et ipsam velit et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(748, 135, 'Autem asperiores voluptas alias repellat sed minus dolores.', 'Sunt modi est reprehenderit dolore ex beatae. Occaecati expedita omnis dolor tempora veritatis beatae. Quibusdam sit cum qui ut minima aliquid reprehenderit eligendi. Qui facilis numquam expedita.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(749, 135, 'Quo officiis odio nihil beatae voluptatem eius ab.', 'Delectus dolorem consectetur facere aliquid molestiae et recusandae voluptatem. Illum qui est laboriosam vel neque sit. Numquam quisquam ullam dolorum porro necessitatibus soluta dolor. Consectetur enim sed nesciunt temporibus non.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(750, 135, 'Sint fugit quia quas asperiores.', 'Accusantium aliquam est odio autem tempore. Est non qui tempore minima eos ducimus. Voluptatem doloremque pariatur maxime ut hic aperiam. Laborum error sunt eligendi numquam molestias dignissimos est.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(751, 136, 'Quia esse architecto quo aut accusamus.', 'Illum voluptates iste quaerat est. Expedita cum ut quam iure. Iste accusantium quisquam sapiente facere non sint.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(752, 136, 'Quo dolorem sed pariatur sit autem autem.', 'Qui quis voluptatibus laborum aspernatur. Necessitatibus voluptatem rerum animi. Non maxime officia fugiat ad. Quia aspernatur quo exercitationem laboriosam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(753, 136, 'Qui placeat fuga adipisci.', 'Officiis quis ut aspernatur dolorem laudantium eaque. Molestias perspiciatis tempora qui consequuntur et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(754, 136, 'Eveniet voluptatem officiis dolores illo aspernatur voluptas rem.', 'Laudantium quis facere expedita ut nesciunt deleniti. Ducimus in voluptate voluptatem fuga laborum molestiae. Vel error deserunt nam aut sequi. Distinctio id dolores soluta ut aspernatur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(755, 136, 'Itaque non sed laboriosam non quisquam.', 'Doloribus laudantium odio blanditiis architecto sint voluptatibus. Ex et et reiciendis ut nostrum alias. Quas repudiandae perspiciatis eum omnis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(756, 137, 'Possimus pariatur maiores ad enim neque.', 'Veritatis sit incidunt laborum quaerat. Dolore qui enim tempore magni quae. Optio nemo fugit sapiente est est. Itaque dolorem quia et quis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(757, 137, 'Est officiis doloremque rem nemo at.', 'Ea error itaque voluptas corporis. Nihil porro maiores doloribus dolorem vero ea ipsam. Porro dolor saepe cumque fuga beatae vel quae. Molestiae odio sint asperiores qui ut illo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(758, 137, 'Ratione modi et expedita.', 'Inventore numquam excepturi aut alias est. Maiores animi qui quibusdam quibusdam iure architecto est quas. Qui ratione quo qui labore consequatur dolor. Accusantium est ullam in sed neque quo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(759, 137, 'Et consequuntur minima non.', 'Est voluptatem animi doloremque culpa ad quia et. Aliquam tenetur ratione tempore aliquam porro voluptas. Repudiandae ea sunt et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(760, 137, 'Autem sed non non enim eveniet.', 'Et magni libero dolorem nostrum enim. Saepe neque repellat doloribus itaque iusto at id nesciunt. Qui maxime facilis qui quis provident doloribus velit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(761, 138, 'Quos quia et dolores enim ad ut.', 'Voluptatem consequatur qui hic quia voluptatum. Suscipit quia earum optio voluptatem voluptas.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(762, 138, 'Architecto minima aut dolorum voluptas quaerat dolorem temporibus rerum.', 'Illo ab accusamus et ipsam aut facere quisquam. Eius praesentium ut id id. Mollitia voluptas similique dolor aut. Officia qui sint voluptates molestiae libero.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(763, 138, 'Aspernatur voluptas voluptas et nemo.', 'Facere eaque et sapiente corrupti temporibus ut sapiente. Earum facilis quis voluptatem odit ut unde quia. Et eos ut ea et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(764, 138, 'Excepturi eum enim et dolor doloribus necessitatibus.', 'Ut delectus nesciunt quam ratione. Explicabo aspernatur labore nobis tempore corporis. Ducimus est aut aut non. Aliquam ipsam nihil beatae suscipit inventore suscipit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(765, 138, 'Non rerum omnis ut rem.', 'Temporibus consequatur quia nemo aut adipisci. Eveniet perspiciatis facilis eligendi occaecati. Unde in reprehenderit vel qui aliquam itaque. Amet architecto est voluptas laboriosam est itaque minima sint. Eos et quasi dolorem officiis ea suscipit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(766, 138, 'Aut aut dolorum asperiores quia quam et assumenda.', 'Rerum optio laboriosam animi. Voluptate nulla expedita totam tempora deleniti autem. Officiis qui et sit quas soluta qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(767, 139, 'Sunt similique rerum in rerum rerum.', 'Tempore labore dolorem ut quis eius. Voluptatum culpa eum neque quia non et sint.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(768, 139, 'Voluptatem non est facilis ab.', 'Nihil dignissimos dolore similique exercitationem qui assumenda dolorum labore. Sequi et labore id omnis fuga. Alias debitis in exercitationem veniam esse sit ut. Consectetur saepe labore laboriosam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(769, 139, 'Repellendus quibusdam sed nobis modi et.', 'Et in accusamus dolor veniam animi. Voluptas nisi non nulla. Omnis nobis non accusamus non.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(770, 139, 'Voluptas ipsa illo ex nemo.', 'Non blanditiis ut nulla harum. Quae laboriosam nostrum omnis temporibus nulla exercitationem. Repudiandae in dolore alias voluptatem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(771, 140, 'Ut placeat ratione non et hic sit dolores.', 'Dolorem eaque ut aut delectus nam. Quidem dolores qui nam accusamus nihil dolore qui. Omnis non minima est ut aliquid.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(772, 140, 'Voluptas consectetur cumque ipsa.', 'Dolorum maxime maxime asperiores inventore. Numquam voluptatibus est earum quisquam. Laudantium quos fugit quia sit amet.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(773, 140, 'Est sed ut quo distinctio vero.', 'Rem accusamus quibusdam rerum sunt et omnis. Quos fugiat corrupti a ut. Asperiores quia cupiditate id earum nihil qui deserunt similique. Exercitationem quisquam molestias doloribus autem quisquam odit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(774, 140, 'Ut sunt similique et distinctio et laboriosam est.', 'Deserunt facere officiis necessitatibus non et et. Ipsa qui at id commodi at corrupti. Perspiciatis beatae blanditiis repellendus et sunt autem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(775, 140, 'Id fuga aut est libero porro.', 'Ut culpa excepturi atque corporis iusto. Rerum voluptatem eaque ut voluptates voluptatibus. Eos recusandae consequatur deserunt hic sed eum. Dolorem aliquid sit id.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(776, 141, 'Soluta incidunt sit voluptatem impedit quas adipisci ea.', 'Est ipsum sit qui consectetur molestiae velit minus. Assumenda eveniet dolores porro aspernatur expedita. Nam placeat saepe autem fugiat at nobis ut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(777, 141, 'Sit ea voluptatem veniam.', 'Dolorum vel eveniet consequatur expedita officia. Voluptatem sunt perspiciatis qui dolore. Dignissimos exercitationem debitis consequatur expedita quam dolore voluptas.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(778, 141, 'Totam molestias excepturi aperiam ad ut cupiditate ut.', 'Sint odit modi deserunt similique. Hic maxime officiis cumque rerum maiores id et. Sint maxime omnis optio aut consequatur. Ut error nam consequuntur praesentium.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(779, 141, 'Vel quisquam ipsa qui sunt mollitia consectetur voluptas ipsa.', 'Sit tempore omnis dolorum. Nemo consequatur dolorem asperiores aliquid.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(780, 141, 'Dolore quo et nulla quia dolorum occaecati.', 'Earum vel eaque deserunt veritatis cupiditate. Pariatur ipsa quae fugiat aut dolorem quas quia. Voluptatibus provident cum aut harum vitae et quisquam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(781, 141, 'Dolor est quia earum et deleniti.', 'Molestias dolores velit sed in eligendi. Animi qui et aut repellendus atque earum. Qui tempora distinctio recusandae dolore eum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(782, 142, 'Non ea voluptatem et velit qui quos.', 'Aut enim et quia qui. Occaecati ea atque consequuntur aut commodi dignissimos occaecati alias. Voluptate exercitationem minus et delectus earum itaque.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(783, 142, 'Alias dolorum aut et ipsum rerum voluptatibus dolor.', 'Optio cum labore tenetur aperiam sit culpa consequuntur. Illum molestiae sapiente incidunt corporis. Sint rerum ad aut officiis fugit et. Placeat qui excepturi et in architecto temporibus saepe quae.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(784, 142, 'Reiciendis sequi ipsum aperiam et rerum quod illo.', 'Perspiciatis officia officiis quos quam cumque. Eos autem distinctio et accusamus exercitationem rerum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(785, 142, 'Et aut temporibus suscipit.', 'Ab quo cumque eveniet veniam iure dolor. Dicta neque et a. Ut cum sed earum enim.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(786, 142, 'Ipsam veniam deleniti sint eaque.', 'Est quia nemo non voluptas. Nesciunt aliquid voluptas nemo id qui et. Eos officia veniam est perferendis atque molestiae dolor. Eum enim perspiciatis eos tenetur cumque similique.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(787, 142, 'Vero quaerat dolore minima illum tenetur voluptas.', 'Aut eos sed ipsum repellendus ipsum. Perferendis asperiores rerum fugit facere id. Vel possimus sapiente magni aut incidunt est. Aut error et iste qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(788, 142, 'In est cupiditate tempora autem.', 'Ab repudiandae consequatur qui repellat tempora labore necessitatibus. Ut quos culpa dolor ipsa autem voluptatibus vel.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(789, 143, 'Dolores dignissimos velit non maiores quasi.', 'Incidunt dignissimos iusto architecto dolorem aut. Qui nihil sunt eum voluptas iusto quia sed. Aliquam quae officiis dolorum sequi eveniet autem. Ut qui et consectetur laborum omnis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(790, 143, 'Quis facilis aperiam eaque ad aut qui incidunt.', 'Itaque aut vel sed ratione rerum cupiditate. Voluptas quia qui sint voluptate itaque. Voluptatem omnis unde excepturi voluptatem et corporis aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(791, 143, 'Voluptatem totam iusto atque sed.', 'Aliquid sed veritatis beatae quae maiores aliquid et. Aut ex magni qui nihil. Provident corrupti hic molestiae eveniet.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(792, 143, 'Tempore ipsam rerum voluptas qui quos porro voluptate.', 'Velit quia et odio asperiores magni qui cupiditate. Et fugiat nihil et soluta dolor totam. Ut reiciendis et necessitatibus voluptas repellendus repudiandae a et. Rerum quis earum ea illo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(793, 143, 'Id nostrum libero ipsum libero saepe fugit similique.', 'Dicta rerum est explicabo omnis sit ab maxime. Et qui quibusdam ducimus dolorum nisi deserunt ut. Repellat sed repudiandae tenetur itaque dicta. Optio ut est eius et rerum veritatis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(794, 144, 'Architecto sed laborum error quibusdam perferendis laboriosam sed.', 'Fuga tenetur excepturi vel. Sunt ut est nulla quasi nisi. Nesciunt ut aut tempora nulla sunt quibusdam incidunt.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(795, 144, 'Soluta fugit ut voluptatibus omnis provident qui optio.', 'Ipsa dolor autem tenetur ipsa ipsa dolores voluptatem. Nulla consequatur rerum blanditiis deleniti fugiat debitis quo. Soluta et at omnis ducimus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(796, 144, 'Molestiae vel totam tenetur neque vel.', 'Et molestias expedita temporibus expedita deserunt velit laboriosam. Iste asperiores qui odit error tempora incidunt eligendi. Cupiditate aut totam accusantium consequatur molestiae minus. Et quia repudiandae non numquam deserunt.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(797, 144, 'Quas facere quis itaque voluptas qui et est totam.', 'Numquam autem vero id sit delectus molestiae. Qui quia error corporis blanditiis non fuga. Consequatur voluptatem repudiandae dolor dolores officiis. Mollitia est qui quo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(798, 144, 'Quam omnis et quo eos molestiae ut sequi.', 'Est blanditiis at rerum eum. Provident quia nulla ut. Cumque adipisci vitae vitae vero dolores.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(799, 145, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(800, 145, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(801, 145, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(802, 145, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(803, 145, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(804, 145, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(805, 145, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(806, 145, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(807, 145, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(808, 145, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(809, 146, 'Suscipit ea eum repellat tenetur voluptas deleniti et.', 'Recusandae voluptatem quis quia magni. Id et qui qui doloribus nisi ut sunt. Dolores autem veritatis quibusdam velit in voluptatum vel.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(810, 146, 'Reiciendis voluptatem iusto eius provident.', 'Eum sed laborum omnis exercitationem. Repellat amet ut hic repellat et beatae commodi. Debitis dicta maxime tempore. Fugiat adipisci eius dolorem ipsam fuga.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(811, 146, 'Et quidem provident mollitia sint voluptas.', 'Eum qui et similique vel. Et qui et animi quidem. Nemo eum consequuntur voluptatem ut eveniet. In sunt sequi sed quae et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(812, 146, 'Consequatur unde nam cumque.', 'Aperiam aperiam voluptas veritatis illum aut. Sed maxime ut similique non dolorum illo nihil. Velit sed quidem consequuntur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(813, 146, 'Rem eum aut est ut doloribus sit quia.', 'Quos veniam qui qui debitis. Sint perferendis id amet ut quos provident voluptas repellat. Impedit et voluptas ut rem dolorem. Voluptatem veniam cum expedita corrupti voluptates.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(814, 146, 'Aut in in quo.', 'Aut blanditiis ut qui ipsam eum magnam quo delectus. Rerum accusamus et quis est voluptatem dolor. Asperiores beatae autem atque quidem numquam illum mollitia.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(815, 146, 'Qui et sit quaerat deserunt exercitationem rem.', 'Possimus doloribus facere quod. Omnis sit sequi vel laborum. Unde et est deserunt soluta corrupti accusamus. Eveniet accusantium vel in incidunt mollitia. Suscipit ipsa veritatis repellendus eveniet recusandae voluptas.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(816, 147, 'In ipsa nesciunt repudiandae et.', 'Rerum quia autem iure ut nihil. Et blanditiis incidunt doloribus maiores numquam. Adipisci dolor voluptas et. Dolores aut ratione odio excepturi voluptates nam.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(817, 147, 'Sapiente voluptatibus officia sit dignissimos.', 'Velit optio nihil at non cupiditate. Qui ab numquam facere nobis. Quasi aut reprehenderit quis quis et. Enim placeat molestias sunt et officia non. Quos sit culpa mollitia omnis et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(818, 147, 'Velit perspiciatis commodi culpa laudantium deleniti.', 'Itaque debitis aspernatur expedita laudantium. Iste eum rem saepe qui magni. Ad illum iste tempore expedita ad eaque dolores. Occaecati quis dolores sequi ut eos.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(819, 147, 'Dolorem doloremque magni aut error atque.', 'Repellendus autem numquam aut id quod vero sapiente sed. Id totam minima consequuntur reiciendis corrupti. Quidem omnis vero maxime dignissimos aperiam distinctio et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(820, 147, 'Necessitatibus sed sequi rerum modi quam.', 'Et eligendi delectus et iste. Rerum aut esse corporis sit assumenda quos. Et porro eveniet eveniet. Temporibus non nihil adipisci ratione voluptatem consequatur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(821, 147, 'Nemo minus tempora mollitia atque nulla et doloremque quod.', 'Nihil iusto nemo consequuntur eum et. Velit pariatur sit ipsum nihil est ut. Et veniam alias a ipsa doloremque laboriosam minus. Accusamus aut aut qui adipisci non.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(822, 147, 'Possimus placeat dolorum delectus aut voluptates.', 'Officia quia dolore praesentium veniam nihil aliquam ea. Voluptatum voluptatem in quia ratione. Minima recusandae libero facere et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(823, 147, 'Adipisci eum voluptatum sit et.', 'Illum unde excepturi aut et. Dolorum eveniet sint itaque sint quo quidem. Quis voluptatum nulla doloribus facere voluptas. Voluptatibus accusamus commodi iusto et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(824, 148, 'Quasi delectus iste repellendus quis.', 'Sint natus mollitia unde qui adipisci distinctio. Voluptatem vero aut praesentium sint sapiente. Soluta tenetur quidem sed voluptatibus est. Ad mollitia perspiciatis incidunt est. Et nobis qui voluptas tempora nulla culpa.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(825, 148, 'Mollitia assumenda doloremque consequatur cupiditate voluptas.', 'Laboriosam soluta facilis corporis mollitia officiis quas. Ut neque non et. Fugiat quia occaecati harum excepturi ab mollitia. Quia iste debitis voluptatibus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(826, 148, 'Adipisci harum et possimus et ut enim mollitia explicabo.', 'Quaerat ducimus aut inventore eligendi aut rerum. Dolorem dolore omnis possimus quo. Velit aut alias saepe magni. Illo error consequuntur optio itaque officia animi odio.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(827, 148, 'At et odio est aut ea officia tempore.', 'Veniam consectetur et ut non incidunt. Quisquam enim necessitatibus quis esse quis eum. Vel natus ea molestiae sequi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(828, 148, 'Impedit expedita et dicta voluptas.', 'Et libero voluptatem ipsa dolores dolorem alias sit minus. Qui eveniet sit voluptas officia. Ad omnis omnis inventore vel deserunt vitae voluptas. Totam velit doloribus officia corrupti.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(829, 148, 'Repellat id esse quod qui rem delectus.', 'Voluptate maxime laborum doloribus eaque nisi. Quae totam quia quidem laboriosam. Sequi optio repellat cupiditate et illum sed.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(830, 148, 'Nulla recusandae repudiandae et.', 'Voluptatum saepe repellat qui. Aliquam eum nam et et quia. Itaque ipsa vel ea dolores non aut quos.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(831, 149, 'Itaque fuga voluptatem sed vel.', 'Dolores ad dignissimos at quas. Necessitatibus nesciunt eaque maxime illo. Et accusamus porro tenetur aliquam.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(832, 149, 'Consequatur ut aut ullam assumenda error.', 'Eligendi iste eum velit velit fuga molestiae rem. Nobis ducimus ut voluptas reiciendis sed nulla. Sed eum autem placeat earum optio culpa. Magnam recusandae magnam fugit distinctio.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(833, 149, 'Est laborum ea dignissimos dolores consequatur consequatur.', 'Veniam autem omnis quasi est unde. Et in ullam repellat.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(834, 149, 'Aut praesentium perspiciatis praesentium esse laudantium.', 'Asperiores tempora eveniet aut unde quaerat. Aut voluptas eos eveniet eius. Quia sunt ea in itaque aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(835, 149, 'Dolor recusandae suscipit qui et repellendus dicta dolor dolores.', 'Temporibus et qui voluptas rem unde maiores. Cumque dolores aut ut expedita quidem. Ea sed voluptatibus id.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(836, 150, 'Fuga eum facilis iure rem.', 'Sed facilis consequuntur est quas quisquam. Sit quod et dolorum veniam porro inventore.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(837, 150, 'Dicta fuga veniam inventore adipisci asperiores esse.', 'Quae est rerum ea rerum eos cum deserunt. Blanditiis a impedit molestiae occaecati neque aspernatur. Facere maiores consequuntur aliquid eligendi consequatur. Dolores cumque dolor rerum ipsam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(838, 150, 'Modi itaque est quaerat natus.', 'Ratione sunt culpa voluptatem odit reprehenderit ad et. Et omnis quis ipsam. Dignissimos quos ducimus et voluptatibus nihil. Dignissimos ipsam molestiae accusamus quis nostrum praesentium facere. Amet repellendus voluptas dolores omnis quis totam et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(839, 150, 'Optio dolor aut alias accusantium libero quis consequatur.', 'Neque vel aut et ut aut sit nesciunt. Corporis rerum at at praesentium commodi. Aut perspiciatis sed nulla animi velit impedit. Quis rerum a mollitia sed impedit harum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(840, 150, 'Aut ipsam harum iusto eum laborum aliquam.', 'Ut illum temporibus aut soluta. Voluptatem velit sit corrupti sed consequatur in minima neque. Dolores quibusdam autem voluptas ut rerum saepe soluta. Quidem magni occaecati consequatur ullam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(841, 151, 'Occaecati ut sapiente dolorum aliquam doloremque.', 'Quam corporis vel non eos sapiente. Minus ut reprehenderit aut velit cupiditate dicta. Totam labore officia id repellendus tempora deserunt reiciendis vel. Animi suscipit accusantium rerum tempora et eum sed commodi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(842, 151, 'Ratione et dolores nihil natus eos id.', 'Magnam est accusamus temporibus aut facilis occaecati dolor sed. Nisi deleniti et sit vel et consequuntur pariatur. Quia natus ut illum explicabo.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(843, 151, 'Excepturi vel omnis est cupiditate ratione veniam.', 'Itaque ut asperiores iste eaque qui. Quia temporibus et a velit quisquam sed.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(844, 151, 'Nostrum sed est possimus sit et sed illo.', 'Veritatis suscipit ut vero et est. Voluptatem consequatur quos adipisci molestias aut repellat omnis. Rem minus sit itaque reiciendis autem alias enim.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(845, 151, 'Expedita consequuntur consectetur porro cum alias voluptas.', 'Officiis at sit perspiciatis sunt qui beatae. Dolore explicabo animi et quasi. Qui sapiente veniam et tenetur iure.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(846, 151, 'Quia autem sunt ut harum inventore.', 'Adipisci assumenda ab occaecati ullam earum modi. Quas in natus laborum. Culpa nobis amet doloremque id autem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(847, 151, 'Pariatur qui aut quas id libero eligendi deserunt.', 'Reiciendis consequatur et ratione esse eligendi sapiente. Reprehenderit consequatur assumenda alias ex rem nostrum. Doloribus quae sit molestias amet aliquam aspernatur sunt.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(848, 151, 'Voluptas beatae aut porro dignissimos porro harum aut eos.', 'Quisquam earum quod ea expedita et tempora iure suscipit. Perferendis odit et deleniti delectus. Ullam facilis ut provident ut aperiam minus itaque. Praesentium sunt et eos dolorem laborum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(849, 152, 'Et ad in et nulla.', 'Numquam minus dolorem et officia non. Tenetur cum asperiores et dolores nesciunt voluptates et. Laborum veritatis blanditiis libero.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(850, 152, 'Vero magni error et.', 'Enim itaque non ab velit rerum quidem corporis deleniti. Non itaque voluptatem explicabo id ea laborum. A enim provident ipsa deserunt et.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(851, 152, 'Doloremque dolorum et et commodi harum quia.', 'Voluptatem voluptatem modi dolor. Unde magni aut ut laboriosam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(852, 152, 'Pariatur quod cum placeat et omnis.', 'Est consequuntur aut nemo consequatur voluptas provident provident. Dicta non non earum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(853, 152, 'Molestias omnis dolore quis.', 'Accusamus adipisci aperiam neque est. Omnis saepe nesciunt libero et. Officia aut et explicabo aut ipsum accusamus soluta dolorem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(854, 152, 'Enim vero aperiam quisquam minus sunt.', 'Sint quos placeat dolores eveniet. Voluptatem eos et quis consequatur aspernatur rerum. Quos aliquid iste excepturi voluptatum est.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(855, 152, 'Autem modi sed odit cumque cupiditate quibusdam et.', 'Dolores cupiditate qui sequi quidem sint accusamus. Nobis voluptas voluptas exercitationem aut velit voluptates aliquam. Sint exercitationem voluptas facilis omnis nihil dolorem. Porro soluta nisi temporibus atque nisi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(856, 153, 'Voluptas magni non sed magnam dolor.', 'Et architecto sit omnis et. Quia optio et illo. Incidunt optio reiciendis officia nihil qui.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(857, 154, 'Dolorum quo eaque dolorum id.', 'Voluptatem eum neque tempore adipisci molestiae laudantium. Aspernatur sit unde minus a minus unde omnis. Nostrum quam eos provident ex hic. Placeat doloremque dolorem commodi. Sunt deserunt et fuga corporis ratione.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(858, 154, 'Iusto pariatur esse quos velit.', 'Vitae dolorem modi ab exercitationem. Maiores nemo dolores voluptatem dolores aut est explicabo. Laudantium ipsam voluptatem architecto corporis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(859, 154, 'Quia provident cumque blanditiis molestiae.', 'Illum aperiam eum voluptas asperiores sint placeat porro odit. Sed ut non eaque ut. Architecto at quam ut harum aut consequatur in qui.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(860, 154, 'Corporis fugit accusantium odio debitis officia delectus adipisci.', 'Voluptatem id rerum minima nam consequatur. Non modi praesentium ut sunt et numquam id.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(861, 154, 'Blanditiis ullam quas aut ut dolorem ad qui tempora.', 'Ut commodi sapiente ratione dolorem et veritatis. Non eius et rem et dolor. Ex ex soluta et neque qui quisquam tenetur. Voluptatem et aut id eum aliquam voluptatum et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(862, 154, 'Non non possimus et necessitatibus.', 'Sit aspernatur illum saepe et. Hic similique iusto itaque. Odio neque autem et. Culpa tempora fuga id sed sint animi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(863, 154, 'Quia sint veniam quia et.', 'Ut est et ut velit quia ea. Sunt non quaerat eveniet architecto est. Qui voluptates modi eos error est.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(864, 154, 'Et similique iusto est aut.', 'Nihil qui assumenda aut et nam qui nisi. Sit aspernatur laborum ea voluptatem. Quisquam ut temporibus dolores ut. Aliquam et consequatur officiis soluta nemo aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(865, 155, 'Esse pariatur consequatur iure ullam molestiae consequatur sint.', 'Laboriosam aut omnis velit sit. Non vero totam dolor accusantium quis at. Magni delectus eum asperiores enim ipsa blanditiis odit magnam. Voluptates doloremque modi sequi mollitia distinctio.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(866, 155, 'Quo architecto natus aut.', 'Sint et quia aliquam esse id molestias ea. Qui atque tenetur doloremque eveniet. Vel eos omnis blanditiis officiis. In neque voluptatem assumenda maxime ab placeat velit nisi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(867, 155, 'Et expedita sint et reprehenderit ut sint.', 'Perspiciatis error itaque doloremque quaerat ea. Ipsam incidunt consectetur et sunt. Itaque est autem voluptas minima quis laudantium quo tempore. Vel excepturi alias laboriosam dolorum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(868, 155, 'Ut et quo ratione dolorum qui id.', 'Sint ea consectetur enim autem. Voluptatibus aut facilis voluptatum deserunt omnis non delectus explicabo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(869, 155, 'Qui consectetur veritatis doloribus dolores minus porro quisquam.', 'Sint fugit est ut sit quos. Dolor vero quis veniam magnam animi totam. Quas iusto tenetur possimus dignissimos. Odit ut repudiandae a libero dolorem enim.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(870, 155, 'At harum minus maiores.', 'Quia est ab accusamus dolor illo sit. Optio magni tenetur recusandae accusantium fuga eum qui. Perspiciatis praesentium maiores cumque harum culpa possimus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(871, 155, 'Et dolorem ipsum necessitatibus et officiis rerum.', 'Voluptas sunt minima et. Accusamus sequi cum accusantium. Et ut fugiat et officiis dolor dolores rerum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14');
INSERT INTO `options` (`id`, `question_id`, `content`, `explanation`, `is_correct`, `created_at`, `updated_at`) VALUES
(872, 155, 'Illo placeat enim illo rerum omnis.', 'Qui illo dicta et quia quo velit provident. Beatae esse natus magnam repudiandae recusandae sit molestiae. Ad omnis itaque voluptas minus cupiditate. Ut odit doloremque quo modi. Libero iusto distinctio ipsa.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(873, 156, 'Esse aut velit dolor tempora consectetur.', 'Porro et sed est aut sint eos facere. Non dignissimos voluptates et id facere. Provident odio dolore et rem ad veritatis excepturi rem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(874, 156, 'Ipsum velit aliquid impedit enim ex optio.', 'Aut ut corrupti itaque cum eius in veniam veritatis. Facilis dignissimos quo suscipit omnis qui. Similique earum tempore quo incidunt et tenetur consequatur.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(875, 156, 'Est non autem est est modi laboriosam.', 'Eum possimus ab et tempora quidem tenetur quia. Rem aut pariatur molestiae nesciunt itaque consequatur. Quasi nihil ea odio necessitatibus quasi. Quia consequatur qui nisi vel ad nihil repellat. In odit est ea enim doloremque corrupti assumenda.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(876, 156, 'Eos aperiam veritatis ea voluptatem eligendi temporibus.', 'Ducimus quo sit ea sunt. Est autem voluptas ipsum. Vel ab aut sed non. Iure sed rem molestiae atque asperiores voluptas quisquam vel.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(877, 156, 'Sit magni nihil numquam non sunt voluptatem sit.', 'Sed atque illo totam. Cum ratione ad sunt quam et ea rerum. Voluptatum laudantium qui quis tempore. Quis sed ut amet fugiat non.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(878, 157, 'Praesentium sequi labore quo non facere possimus.', 'Illum dicta suscipit distinctio quia. Officiis esse minus ut nobis et non debitis. Optio et quidem error repudiandae praesentium.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(879, 157, 'Error quos necessitatibus error iste quia nihil.', 'Sunt ut eaque exercitationem et velit. Et sunt sed adipisci dolor voluptatem harum. Molestiae sed molestias esse nihil qui provident reprehenderit qui. Quia et non minima occaecati.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(880, 157, 'Alias ut dolor sit.', 'Quia quia fugit odio quia consequatur maxime reprehenderit. Aliquam ipsum tempore sunt aut autem. Velit eos corporis necessitatibus placeat.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(881, 157, 'Cumque eos et nemo omnis nihil ratione.', 'Sit aut adipisci quis debitis similique quasi. Quia velit quo nam ea laborum dolor. Et consectetur tenetur expedita reiciendis. Ratione voluptatum veritatis libero voluptas et harum aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(882, 157, 'Voluptas sed molestias illum est et enim eius.', 'At eos eum odio ab consectetur. Architecto ea accusantium ullam non aliquid voluptatem laborum. Nulla minus quisquam fuga aut qui fuga.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(883, 157, 'Tempora perspiciatis facilis quo quibusdam ea.', 'Quia excepturi quo laudantium magnam omnis consequatur. Laudantium ad atque et aut est dignissimos eaque. Dolor beatae vero maxime enim corporis labore sunt nesciunt.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(884, 158, 'Eum consequuntur autem modi.', 'Omnis sunt ex non molestiae laudantium hic nisi. Nam quisquam quo nostrum quos.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(885, 158, 'Aut vitae corporis minima.', 'Quia laboriosam quae placeat sed sit doloribus. Consequatur nam quia atque. Sit voluptas nostrum illum temporibus non pariatur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(886, 158, 'Laboriosam dignissimos consectetur voluptas et.', 'Quibusdam quo ratione facere magnam. Id occaecati et aperiam officia necessitatibus. Ratione illo error qui culpa ipsam consequatur eveniet. Quibusdam quia optio impedit et ex iste possimus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(887, 158, 'Beatae dolor est doloribus qui delectus.', 'Alias praesentium earum animi. Sint nobis laudantium qui alias ad iure. Consequatur nesciunt veritatis beatae sit voluptas delectus voluptatum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(888, 158, 'Est neque occaecati excepturi quis sint.', 'Pariatur autem praesentium magnam saepe. Unde nisi nesciunt facere vel qui. Quia et facilis et. Porro porro voluptas sit minus nisi et qui. Nihil saepe architecto recusandae facilis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(889, 159, 'Qui corporis repudiandae ipsum aut et.', 'Ipsum voluptatem inventore doloremque dolorem quis aut itaque quae. Velit fuga dignissimos sint enim id et. Voluptatum id voluptatem quos.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(890, 160, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(891, 160, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(892, 160, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(893, 160, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(894, 160, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(895, 160, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(896, 160, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(897, 160, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(898, 160, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(899, 160, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(900, 161, 'Rerum odit distinctio quo veniam dolor.', 'Voluptatem dolorum itaque quia beatae. Tempore quia consequatur in voluptatibus temporibus laudantium possimus. Architecto laudantium tempore voluptatem architecto veritatis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(901, 161, 'Debitis repellendus odit harum veniam voluptas perspiciatis.', 'Quis aut repudiandae ducimus impedit. Cupiditate assumenda quo laborum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(902, 161, 'Quis repellat vitae voluptates.', 'Reiciendis est ab veritatis similique laudantium porro est. Labore beatae molestiae eius consequatur est ut quia culpa. Est odio tempore rerum enim sit quos eveniet. Dolor consequatur nihil sed excepturi earum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(903, 161, 'Quibusdam similique qui quod vel.', 'Quod ipsum natus qui eos provident fugiat. Tempora placeat non incidunt eaque fugiat. Eligendi est itaque qui et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(904, 161, 'Inventore esse deleniti et odit veritatis nobis fugit doloremque.', 'Odio pariatur est aut. Voluptatum perferendis id sunt. Commodi nihil sunt facilis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(905, 162, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(906, 162, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(907, 162, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(908, 162, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(909, 162, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(910, 162, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(911, 162, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(912, 162, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(913, 162, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(914, 162, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(915, 163, 'Tempore ipsum dolorum velit qui doloremque libero.', 'Voluptatem libero id laborum autem est quibusdam. Expedita voluptatem autem ipsam et non. Similique cum repudiandae officiis ipsam voluptatem adipisci. Vel necessitatibus eum id molestias consequatur ad sunt in.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(916, 163, 'Reiciendis qui harum tempora voluptatem explicabo blanditiis placeat.', 'Deleniti suscipit eum dolorum vel et. Magni velit aspernatur quos dignissimos magni aliquid. Sed nobis omnis molestiae tempora quo.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(917, 163, 'Eius cupiditate nisi rerum non molestias commodi repudiandae illo.', 'In officia autem harum dolorem. Veritatis quia perspiciatis eum unde rerum magnam. Non dolorem rerum repellat libero error.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(918, 163, 'Quae quaerat fuga cupiditate quae quia voluptatem veniam et.', 'Exercitationem tenetur error beatae dolorem enim quis. Id esse cupiditate dolor quia. Ut dolores et eum rerum mollitia eum mollitia. Ipsam quo qui ut suscipit iure.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(919, 164, 'Ut perspiciatis cum nihil et incidunt vitae voluptas.', 'Cumque nesciunt praesentium rerum hic voluptas vel. Harum asperiores alias ullam qui optio. Aut beatae quibusdam nostrum est ut. Id corrupti sit consequuntur eos.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(920, 165, 'Aliquam et quam ut sapiente omnis et.', 'Deleniti vitae porro pariatur nemo rem blanditiis. Vitae laudantium beatae impedit. Omnis deleniti cumque eos illo voluptatum reiciendis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(921, 165, 'Voluptas voluptas nam nemo qui eius est distinctio.', 'Quis corporis ut aut id perspiciatis. A doloribus quam voluptates omnis aut. Sit asperiores vero laborum quae ad.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(922, 165, 'Sit vero similique nemo rerum nobis quos dignissimos.', 'Et modi aliquam et et eveniet. Consequuntur repellat nemo enim molestiae praesentium. Ad vero numquam non neque. Molestiae consectetur necessitatibus aut dolores.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(923, 165, 'Amet ipsa quia corrupti distinctio.', 'Magni ad ratione temporibus. Quia unde commodi recusandae eum. Et omnis sequi sed repudiandae error.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(924, 166, 'Veritatis quo facere ullam in.', 'Nisi deleniti enim blanditiis blanditiis dignissimos quo placeat molestiae. Delectus iusto laboriosam perferendis labore nostrum. Magnam commodi cupiditate veritatis voluptas voluptates quia. Quis qui facilis assumenda minima ipsam mollitia.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(925, 166, 'Aut accusamus ipsam minima et.', 'Aspernatur suscipit nulla est aut. Non sint similique accusantium quia occaecati quisquam laboriosam id. Velit ut ut repudiandae sint.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(926, 166, 'Tempora et et molestias fugiat vel.', 'Et voluptatem natus velit architecto quos. Excepturi aut qui qui deleniti quaerat.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(927, 166, 'Aperiam non accusamus dolor provident quam nisi voluptatibus.', 'Sit non quia possimus aut. Nihil autem sit quia architecto. Nulla doloremque quia possimus dolore numquam sit. Non non dolor voluptatum vel.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(928, 166, 'Facilis atque dolorem ea aut dolor alias.', 'Aut neque nesciunt ipsum excepturi odio autem. Voluptatem rerum temporibus consequatur inventore quaerat velit aut. Beatae accusantium distinctio facilis tenetur explicabo nobis. Amet earum est est odit ut qui culpa.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(929, 166, 'Rerum voluptates aut et.', 'Quo consequatur omnis eum id maxime quidem iusto alias. Autem similique consectetur neque tenetur quo. Delectus deserunt non nobis sunt aspernatur aut vero ex.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(930, 166, 'Vel voluptatem praesentium molestiae harum iure voluptate commodi.', 'Nisi accusantium ab quod voluptatem est vero. Possimus vel rerum pariatur tempora voluptates maxime. Vel animi libero velit ullam ea dicta voluptates. Laboriosam ab delectus ut nihil illum itaque quae in.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(931, 166, 'Veniam id ipsam alias.', 'Numquam vel nisi iusto omnis nulla quo. Aliquid incidunt id libero similique praesentium. Non nemo at explicabo enim quod tempore sit. Voluptas dignissimos debitis nihil suscipit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(932, 167, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(933, 167, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(934, 167, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(935, 167, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(936, 167, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(937, 167, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(938, 167, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(939, 167, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(940, 167, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(941, 167, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(942, 168, 'Repellat repellat voluptas aut odit.', 'Dolorem et at facere aspernatur perferendis reiciendis quia. Ut et enim adipisci. Et ea et et molestiae sit quo aut. Nisi eos optio aut quasi animi deserunt dicta. Cum minima corrupti pariatur voluptas aut molestiae nulla.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(943, 169, 'Provident ut dolores qui sunt.', 'Repellat aspernatur ex minima et rerum et et. Autem laudantium quia voluptas. Reprehenderit quam quo ad eaque pariatur voluptatibus. Repellendus cumque dolorum quibusdam hic facere.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(944, 169, 'Ipsum delectus sit ab omnis.', 'Consequatur omnis in reiciendis et laudantium fuga. Eos cumque voluptatem rerum odio est. Laborum neque tempore enim ad. Autem accusantium laudantium voluptatem magnam soluta at. Odit voluptatum est nihil et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(945, 169, 'Illo suscipit eos totam beatae.', 'Blanditiis tempore incidunt vel magni rerum optio. Quasi tenetur labore laborum dolorem. Sunt numquam maiores consequatur voluptatum expedita quos ducimus assumenda. Fugiat tempore aut distinctio quia.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(946, 169, 'Inventore libero qui ea.', 'Perspiciatis sunt deleniti adipisci fugit. Beatae nisi consequuntur blanditiis a rerum. Est a beatae fuga aut corporis ea similique.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(947, 169, 'Soluta voluptas velit eaque reiciendis sequi.', 'Voluptas ratione esse ut accusantium explicabo labore in. Ut aut suscipit temporibus quae est. Aut repellendus vel neque.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(948, 169, 'Sunt ducimus asperiores voluptatem cum.', 'Non quo officia odio velit ea. Delectus laudantium et qui. Omnis nostrum ab voluptate hic dicta eligendi. Accusamus iure quia eum non rerum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(949, 169, 'Quam et vero possimus.', 'Dolorum ab qui aut id excepturi. Doloribus amet quaerat enim vitae. Quae aliquid sit voluptates amet. Nemo error doloremque temporibus accusamus facilis beatae. Excepturi alias quia aut ipsum dolores error animi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(950, 169, 'Eum quia expedita omnis error magnam qui.', 'Aut dolor quibusdam hic aliquid magnam. Necessitatibus quod consequatur id debitis dicta. Cum optio ipsum a aliquam ut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(951, 170, 'Voluptas ut officia expedita qui amet corporis.', 'Quibusdam dolorem nam libero ipsam. Voluptas voluptatem explicabo quasi consectetur aliquid.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(952, 170, 'Ut aut vel eos ducimus expedita occaecati.', 'Aperiam eum optio delectus ab quia eligendi sint. Eius sed minima et odit ut expedita. Esse dolores tempore voluptatem nulla mollitia ea sed.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(953, 170, 'Et nihil suscipit facere ab non fugiat.', 'Quidem enim impedit deserunt culpa. Ea magni sit consequatur quod asperiores.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(954, 170, 'Rem ut non commodi.', 'Saepe aut nulla rerum esse earum consequuntur. Et dolor vel eligendi non nesciunt aperiam. Dolore est omnis vel aut dolore quia. Dolor quaerat nisi ipsam et repudiandae eum esse sed.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(955, 171, 'Suscipit autem omnis ipsum.', 'Unde corrupti asperiores aut dolorum vel tempora voluptatibus. Ad accusamus quam aut aut ea est. Nulla doloribus velit est et eveniet possimus libero occaecati.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(956, 171, 'Quo id beatae nemo ea non autem veritatis.', 'Facilis voluptatum aut id soluta voluptas laborum suscipit sed. Saepe occaecati tempore et aut est porro numquam. Dolorum qui est quas quae a rerum. Fuga ea reprehenderit incidunt dicta ex consectetur consequatur.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(957, 171, 'Totam voluptas et velit.', 'Et autem voluptas nihil nesciunt eos et. Autem rerum aut ipsa libero iure. Aut eos ut provident vel totam. Corporis et libero numquam cumque beatae sequi soluta.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(958, 171, 'Quia minus suscipit optio quaerat hic.', 'Eaque alias temporibus labore. Earum nihil quis impedit esse. Id error voluptate natus repudiandae. Excepturi sequi accusantium adipisci.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(959, 171, 'Labore doloremque dolore sit.', 'Necessitatibus quidem eos doloremque eligendi. Fugiat dolorem et magni ipsum sit distinctio id. Deserunt omnis est autem dolores nam sequi non. Labore est animi perferendis velit quis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(960, 171, 'Non vel et est nihil id magni.', 'Reprehenderit maxime delectus est sint. Dolor nulla hic non voluptates incidunt. Distinctio voluptatem unde id quo error quo unde blanditiis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(961, 171, 'Quod laborum temporibus id ducimus molestiae et.', 'Totam autem repellendus labore dolore. Facilis et voluptas consequatur sunt et et sint asperiores. Tenetur voluptate quaerat veritatis delectus quis similique molestias. Qui perspiciatis qui dolore eius error.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(962, 172, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(963, 172, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(964, 172, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(965, 172, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(966, 172, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(967, 172, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(968, 172, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(969, 172, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(970, 172, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(971, 172, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(972, 173, 'Laboriosam molestiae qui soluta eos inventore doloremque sit.', 'Minus est minus delectus eaque accusamus consectetur id. Molestias aut hic nam quisquam. Doloremque iste laboriosam libero veritatis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(973, 173, 'Officiis qui possimus distinctio magni.', 'Atque repudiandae facere accusamus. Distinctio excepturi quia facere qui commodi. Fugit ut excepturi doloremque sed. Ex laboriosam dolores rerum dolore.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(974, 173, 'Perferendis sint rem quisquam aliquam ipsam est aut.', 'Est expedita architecto rem quae. Exercitationem molestiae quaerat tempore.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(975, 173, 'Qui qui qui vitae ut distinctio.', 'Consequatur dolore beatae in eius. Vitae nisi omnis aperiam recusandae. Sit et est fuga recusandae voluptate non aliquid.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(976, 173, 'Enim labore beatae debitis eum.', 'Id nihil et saepe voluptatem sunt asperiores. Et accusamus at sint quo eveniet voluptatibus ab. Modi eveniet nihil error.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(977, 173, 'Rerum qui consequatur ut repudiandae aut aspernatur et.', 'Accusantium iste quia ut consequuntur. Molestiae error facilis cupiditate necessitatibus. Ullam ducimus dolorem ut alias odit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(978, 174, 'Hic aut impedit voluptas omnis.', 'Neque repudiandae quam et rerum quia adipisci eligendi fuga. Laboriosam adipisci consequatur voluptas beatae porro. Minima sunt consequatur eos quia. Voluptatem et nobis voluptatem nihil expedita itaque qui quidem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(979, 175, 'Inventore similique pariatur quasi.', 'Sit explicabo molestiae sit eum qui similique. Itaque veritatis animi suscipit quam voluptatem qui. Qui eos consequuntur ipsa sequi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(980, 176, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(981, 176, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(982, 176, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(983, 176, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(984, 176, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(985, 176, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(986, 176, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(987, 176, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(988, 176, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(989, 176, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(990, 177, 'Nihil consequatur dolor excepturi.', 'Rerum saepe doloremque provident in omnis quibusdam. Unde modi ut vel ipsa. Laboriosam reprehenderit ut mollitia ut soluta.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(991, 177, 'Possimus inventore aspernatur occaecati dolores totam voluptatem quis.', 'Ut quo aut quidem non deleniti maiores. Aut et possimus enim maxime expedita molestiae sint.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(992, 177, 'Sunt ut veritatis a expedita neque consequatur.', 'Ea sint praesentium similique cumque. Sit itaque beatae voluptatem. Qui reiciendis iure assumenda nemo in architecto perspiciatis molestiae. Aliquam sapiente odit distinctio veritatis excepturi cumque vitae ex.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(993, 177, 'Nostrum quia ipsa et.', 'Id praesentium libero mollitia cupiditate. Est perferendis eum ea est sint fugit. Pariatur quidem voluptatem voluptatem occaecati accusamus aperiam quos. Fuga architecto ut ipsum odit earum quis quasi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(994, 178, 'Natus mollitia enim voluptas ratione culpa impedit est.', 'Nam cumque iusto sed adipisci. Voluptas est distinctio labore qui modi fugit doloribus. Corrupti est doloremque maxime est ullam. Perferendis ad et provident.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(995, 178, 'A sint aliquam natus maiores.', 'Neque error sed voluptatibus et. Officiis fuga eum eum recusandae recusandae. Voluptas illum beatae soluta a enim.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(996, 178, 'Et autem ad enim ut cum a autem velit.', 'Harum aut fugiat voluptas asperiores. Qui incidunt aspernatur aut molestias amet. Quidem consequatur voluptate nesciunt omnis natus libero eum. Qui ut reprehenderit harum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(997, 178, 'Et provident temporibus sit ducimus quisquam voluptate.', 'Libero consectetur ad vero vero qui in porro. Recusandae nam deleniti vel cumque quo repudiandae sit. Accusantium labore voluptatibus repellendus aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(998, 178, 'Est enim voluptatem beatae quaerat magni consequatur.', 'Aut sunt eaque porro quaerat nam. Quo officiis adipisci voluptate aperiam aliquam at ab. Quia modi ea omnis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(999, 179, 'Repellat dolores est dolores est tempora repellat saepe.', 'Dolores saepe nihil veniam doloremque assumenda repellendus. Eius voluptatem provident delectus dolores sunt.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1000, 180, 'Occaecati possimus non ea tenetur in.', 'Perspiciatis eligendi asperiores officia ipsa ipsa non provident sit. Autem magnam dolores saepe. Nostrum nobis illum voluptatem aut beatae eligendi corporis.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1001, 180, 'Velit quod quia vero accusamus ut.', 'Quo deserunt tempore quia a aliquid. Voluptate perspiciatis earum cupiditate harum exercitationem itaque numquam aut. Consequuntur libero aperiam iure nisi iste sunt.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1002, 180, 'Modi quidem sapiente voluptatum dolore error et.', 'Quam quos architecto quod sed inventore. Deserunt possimus hic tempora ratione expedita consequatur est rerum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1003, 180, 'Qui dolores possimus officiis esse eligendi.', 'Ducimus eveniet exercitationem ad ex dicta. Illo laboriosam quia consequatur quia maiores architecto. Nam velit dolor non quasi deserunt veritatis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1004, 180, 'Rerum voluptas qui sint eum nobis cum ratione.', 'Quidem quam tempore corporis. In commodi voluptas consectetur minus. Officia fuga dolor cupiditate aperiam soluta. Illo error non et enim rerum earum id.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1005, 180, 'Ad totam ea quasi.', 'Saepe minus est maxime hic nesciunt voluptatem sed. Cumque minus labore dolore aut et error.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1006, 180, 'Animi hic cumque et aut velit sapiente aut.', 'Modi nobis et ratione aliquam modi officiis eaque. Et aliquid expedita iure atque aperiam sit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1007, 181, '1', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1008, 181, '2', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1009, 181, '3', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1010, 181, '4', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1011, 181, '5', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1012, 181, '6', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1013, 181, '7', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1014, 181, '8', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1015, 181, '9', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1016, 181, '10', NULL, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1017, 182, 'Fugiat corrupti est eum expedita ex ut sint.', 'Id voluptatem sed velit quia qui aliquam aut. Illo ut et quia cupiditate rerum. Eveniet quia facilis quaerat. Cumque voluptas quis sint rerum natus quo omnis reprehenderit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1018, 183, 'Enim omnis officiis saepe illo est vitae rem nisi.', 'Aut corrupti eveniet harum hic autem non. Commodi aut accusantium eius error. Ab quaerat totam totam nesciunt quia eligendi deserunt veritatis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1019, 183, 'Blanditiis magni atque esse consequatur eveniet quaerat.', 'Excepturi voluptatem vel occaecati molestiae et. Atque facilis officia sapiente inventore aut et. Nemo quisquam iure nihil aut quia asperiores dolor. Quasi quis maxime eaque magni.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1020, 183, 'Harum totam totam enim minima.', 'Minima distinctio incidunt dolorem dolores voluptates. Perferendis nemo eveniet magni expedita adipisci autem quia molestiae. Esse quo rerum suscipit est sed.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1021, 183, 'Sequi aut eius magni.', 'Fugit aliquid inventore dolor voluptatem nihil. Doloremque nihil repudiandae quam qui voluptates autem autem. Omnis eos enim excepturi suscipit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1022, 183, 'Aut accusantium amet nihil maiores magnam.', 'Est a facilis dolorum laudantium quod. Totam iste facere eligendi nesciunt dolor neque. Perferendis iusto eligendi eos eaque neque enim blanditiis at. Quod doloremque quae amet accusamus nesciunt.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1023, 184, 'Non cum aut ut ex.', 'Alias et et sunt error nobis. Nesciunt in vel necessitatibus cumque. Facere adipisci aut architecto quibusdam magni dolores. Repudiandae et aut quisquam qui voluptatem praesentium laudantium.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1024, 185, 'Harum officiis et molestias sit quam tempora iusto.', 'Qui qui illum deserunt harum veniam adipisci. Fuga rerum voluptatem perferendis adipisci est qui quam. Ullam recusandae natus labore consequatur. Reprehenderit ipsum consequatur repellat provident aliquam suscipit omnis aliquid.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1025, 185, 'Harum possimus sed enim omnis laborum reiciendis fugit non.', 'Quia impedit voluptas rerum ex. Omnis error quis nemo nam velit. Voluptatum corporis asperiores ad quia. Qui voluptate facere modi cumque fuga enim.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1026, 185, 'Aliquid quas in nihil similique mollitia quo voluptates.', 'Deserunt itaque voluptatem ipsam minus excepturi expedita quidem. Omnis voluptatem quasi earum voluptatibus nisi eius. Magni et est omnis asperiores.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1027, 185, 'Eum est quam voluptatem doloremque.', 'Culpa omnis laborum est ut itaque quasi. Eum ipsa iusto commodi sit voluptates. Recusandae est possimus distinctio ex doloribus et sunt. Ullam perferendis rem minus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1028, 185, 'Expedita veniam quam laboriosam officia qui itaque non.', 'Consectetur delectus neque voluptatibus. Rerum quia cupiditate dolorum iste autem ad perferendis. Libero ut distinctio ut totam ut quisquam possimus sit. Sed harum sit et perferendis. Sit ut sunt quibusdam cupiditate ipsa.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1029, 185, 'Repellat nihil nobis voluptatum nam id.', 'Non alias qui consequatur laudantium. Sapiente quos fugiat ut praesentium dolores ipsam dolorem. Odit quia tenetur cupiditate facere quidem itaque. Voluptatum quis molestiae a voluptatem totam aut molestiae. Eum quod sed quaerat blanditiis hic id.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1030, 185, 'Nesciunt vel voluptatibus perspiciatis.', 'Occaecati dolorum explicabo sunt quam at occaecati omnis. Molestiae sint officia laudantium at quo deleniti qui dolores. Impedit dolorum corporis repellendus voluptatem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1031, 186, 'Omnis magnam voluptatum odit dolore et mollitia eaque voluptates.', 'Quae consequatur voluptate quidem aut alias adipisci nisi dolor. Sunt error perferendis placeat nisi ipsum quis soluta aut. Nihil alias voluptatibus recusandae enim. Non voluptates qui dicta nesciunt quia.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1032, 186, 'Magni quo omnis autem illum.', 'Autem voluptates eum minima consequatur fuga. Sit pariatur deserunt minus omnis sequi. Repudiandae delectus odit voluptatum temporibus sit. Voluptas accusamus hic voluptas laboriosam rerum sit perspiciatis quo. Modi distinctio facilis libero voluptas maiores nisi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1033, 186, 'Tempora cumque neque adipisci laboriosam nihil.', 'Fugiat optio beatae quia fuga neque enim molestiae. Quia eum placeat impedit hic error corrupti est. Qui deleniti ipsam exercitationem reprehenderit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1034, 186, 'Nulla animi eveniet quia enim.', 'Exercitationem repudiandae doloremque in dolor. Rerum et voluptatem reiciendis libero blanditiis nesciunt sunt. Ut possimus voluptatem ut et perferendis eos veritatis.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1035, 186, 'Dicta dolorem quos dolorem ut.', 'Eos harum veniam laudantium reprehenderit. Consectetur laudantium quia inventore et quia voluptatum quidem ipsa. Sit nisi quidem iste saepe nihil fugit molestiae. Numquam numquam qui sit soluta ut rerum doloribus. Quasi ex ut vitae exercitationem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1036, 187, 'Commodi quia sit aut corporis.', 'Velit dolor dignissimos consequuntur omnis eius consequatur. Est voluptatibus vitae ut facere nesciunt voluptatibus labore. Recusandae id quos numquam blanditiis quo.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1037, 187, 'Enim est voluptas cupiditate et.', 'Dicta autem ea autem. Aut aut alias blanditiis laboriosam illo quibusdam. Non ut consequatur unde nihil a ea sint.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1038, 187, 'Laudantium omnis laudantium saepe eveniet sed autem nisi.', 'Iusto omnis sunt quis perspiciatis. Asperiores ad nobis aut quos quasi.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1039, 187, 'At sequi aut eum et exercitationem rerum eos autem.', 'Placeat alias fugiat quidem ipsum vel numquam facere. Neque tenetur vel sed nihil soluta rerum. Sapiente voluptatem alias nam quidem alias odio.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1040, 187, 'Ut est quia iusto maxime.', 'Beatae ut ut omnis molestiae unde sed. Et veniam quas ipsam dolores. Eum id et qui ex porro ab sit qui.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1041, 188, 'Qui rerum dolorem eligendi et.', 'Est nisi dolore velit libero suscipit quam et velit. Excepturi sit sit et aliquid. Blanditiis maxime dolores adipisci qui magnam rem.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1042, 188, 'Vero minus aut necessitatibus sint quia eligendi.', 'Qui quaerat minus porro ut voluptatem impedit occaecati. Consequatur eum hic delectus dolorum non nihil consequuntur. Corporis enim ex veniam quibusdam. Iste rerum odio aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1043, 188, 'Ut accusantium ipsa tempora accusamus sit harum aliquid.', 'Ullam quidem facere qui sapiente omnis. Enim autem ut impedit non ipsa quo. Praesentium error quis nisi voluptatum saepe quis quisquam. Est voluptatem eveniet ut et quisquam blanditiis laboriosam.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1044, 188, 'Ratione sint et quibusdam sapiente quo.', 'Eos quaerat et aliquam sit amet quia. Qui corporis ratione optio vel. Culpa qui iure eos et voluptatem aspernatur nostrum. Culpa placeat assumenda quo voluptatem saepe odit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1045, 188, 'Quia sit qui odio pariatur aut.', 'Sed quo sunt consectetur inventore fugiat molestias. Fuga voluptatem accusantium magnam est. Sed similique atque porro aspernatur. Eum dolor et iure architecto minus deserunt eligendi. Iusto fugiat ab blanditiis omnis dolorum voluptatibus natus.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1046, 188, 'Quis et quaerat expedita eligendi eum.', 'Odit maiores qui in voluptate id. Architecto debitis reprehenderit recusandae ea corrupti eaque rerum. Possimus dolor tempore a.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1047, 189, 'Ut consectetur dolor excepturi quis.', 'Asperiores ex quisquam molestiae et excepturi distinctio reprehenderit. Corporis iure quod deserunt ab assumenda et maiores. Vero beatae nulla itaque nostrum quidem consequatur. Aspernatur voluptatem delectus quod voluptas libero voluptatum repellat. Repudiandae explicabo sunt quam minima numquam qui.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1048, 189, 'Consequuntur repellat in illum aut debitis quibusdam.', 'Possimus ipsa consequuntur corrupti corporis ad. Eum ab voluptatem ad aut. Nisi a assumenda laudantium in laborum. Harum qui corporis omnis animi excepturi.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1049, 189, 'Magni unde voluptate rerum voluptas ad ut.', 'Sit qui sit nihil qui dolor. Et non sint et veniam sint eos voluptas. Quisquam incidunt incidunt voluptas porro ducimus minima tempore.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1050, 189, 'Ex nisi sed harum et at animi.', 'Modi corporis est nemo accusamus et. Amet est vel nam facere molestiae. Nesciunt expedita culpa velit quo itaque cupiditate. Cupiditate tempora quia voluptatum voluptates dolore nihil nobis fugit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1051, 189, 'Quo quidem quisquam qui qui asperiores molestias velit.', 'Impedit distinctio dolore ratione atque. Cupiditate laudantium est rerum consequatur alias commodi. Qui quae animi ipsum quam.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1052, 189, 'Et quia neque at qui veniam voluptatem accusamus.', 'Dolorum cupiditate eius reprehenderit cum minus. Facilis quia vel recusandae totam quae magni eligendi. Quod omnis excepturi rem. Id velit possimus debitis odit possimus dignissimos. Quia nulla quia ut nisi quos recusandae.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1053, 190, 'Deserunt ipsum optio velit eligendi sint ea dolore.', 'Facere temporibus expedita est et adipisci. Et repellat assumenda tempora debitis accusantium adipisci. Qui quidem occaecati ut rerum debitis. Dolorum consequatur aspernatur ullam velit earum nulla.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1054, 190, 'Et aut quia sed eum est.', 'Sed a est atque eaque consequuntur perspiciatis quia. Fugit aliquid facere incidunt aliquam dicta eligendi. Asperiores incidunt omnis id asperiores harum voluptatibus facere.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1055, 190, 'Alias rerum sed sint assumenda omnis et.', 'Sunt maiores libero ad voluptatem est nam repellat. Eveniet quos repudiandae voluptatibus unde totam. Veniam ea excepturi et eveniet.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1056, 190, 'Quis qui tempore modi et totam hic.', 'Velit atque et fuga. Fuga et facere error aut dolorum quia. Minus eveniet velit aliquid soluta.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1057, 190, 'Et dolore impedit voluptatibus maxime ex.', 'Qui reprehenderit sint a repellat quae. Praesentium esse eveniet in est sit. Sunt sed corrupti excepturi veritatis consequatur unde.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1058, 190, 'Sed ex at perferendis molestiae suscipit voluptates consequuntur.', 'Similique velit repudiandae dolor perferendis. Minus eius inventore assumenda omnis. Pariatur explicabo ut tenetur qui.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1059, 190, 'Voluptates inventore ut error ipsam sit.', 'Perspiciatis aut ea sit eum aut sunt. Repellendus porro dolor neque quis. Dignissimos autem necessitatibus et qui ut rerum autem.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1060, 190, 'Eum laboriosam voluptas et amet est ut vel.', 'Harum consequatur consectetur quam ex quibusdam. Aperiam ducimus deleniti ab similique non vel ut ea. Nostrum voluptatem tenetur qui officiis impedit.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1061, 191, 'Ducimus voluptas possimus mollitia omnis.', 'Voluptas et tenetur aut ut ducimus exercitationem soluta. Amet aut sed eligendi aut deserunt ex voluptas.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1062, 191, 'Error iusto totam sunt perspiciatis.', 'Repellat architecto tempore maxime sint doloremque fugiat. Perferendis impedit possimus commodi qui. Sapiente provident possimus velit voluptas nam maiores aut. Libero ratione qui cupiditate quaerat non impedit.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1063, 191, 'Esse qui omnis explicabo sunt.', 'Aspernatur ratione accusantium eos molestiae. Quo non repellendus possimus est possimus accusamus delectus quia. Unde ea aliquid voluptatum consequuntur ex est voluptas. Veritatis blanditiis et quo cupiditate.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1064, 191, 'Omnis autem sapiente numquam ratione natus illum cum.', 'Et adipisci commodi praesentium nihil porro rerum laudantium. Deserunt doloremque ab a rerum labore porro inventore quia. Sed molestiae nemo assumenda expedita rerum et.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1065, 191, 'Vitae fugit adipisci occaecati praesentium sapiente voluptatem tempora.', 'Ab quos qui reprehenderit facere autem. Adipisci et non culpa consequatur magni laboriosam iste cupiditate.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1066, 192, 'Dolores expedita velit voluptas est necessitatibus vitae cupiditate.', 'Perferendis iusto velit voluptatem sed nesciunt. Fugiat maxime velit quia reiciendis rerum aut.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1067, 192, 'Illum eius sint commodi magni quaerat accusamus.', 'Ex aperiam cum eos debitis. Earum nesciunt a nemo aspernatur hic. Quam magnam dolore explicabo nulla. Voluptatem omnis facere ut id omnis repellat.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1068, 192, 'Atque est quia deserunt nam velit repudiandae culpa iste.', 'Incidunt totam doloremque et ut adipisci in quam. Sit qui voluptatibus autem maxime. Voluptas earum quis perferendis sint enim aperiam. Recusandae rerum dignissimos dignissimos nulla repellendus.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1069, 192, 'Exercitationem dolore earum quia provident placeat.', 'Excepturi at nisi commodi molestias adipisci eveniet. Quod mollitia est facere voluptate omnis tempora est. Quasi ratione sit et error qui architecto ipsa. Ipsa accusantium molestias eveniet consequatur dolores sapiente.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1070, 192, 'Quis aut reprehenderit exercitationem fugiat aliquam.', 'Ut aspernatur laborum nam nulla. Ad dolorem dignissimos nobis in dolorum aliquam. Cumque similique officia cumque voluptas fugit voluptatum.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1071, 193, 'Temporibus consectetur voluptatum possimus consequatur doloremque repellendus.', 'Labore rerum quos omnis et quaerat ut nam. Repudiandae sit ducimus cum et expedita quo. Et nihil perspiciatis consequatur totam assumenda quia illum. Mollitia rem eius labore voluptates nostrum aut.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1072, 193, 'Natus repudiandae facere omnis error eius sit.', 'Voluptas voluptatem doloremque similique dolorem ut est laborum. Fuga et rerum illum praesentium accusamus neque nostrum. Reprehenderit veritatis sed ducimus quia blanditiis nostrum.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1073, 193, 'Quia voluptatum ea facere facilis voluptates qui.', 'Quam nobis tempora qui rerum molestias. Et ipsum vel eligendi molestias rerum voluptatem perferendis. Mollitia dolor tempore quis quis. Nobis non id sit dignissimos tenetur.', 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1074, 193, 'Voluptas natus maxime quos dicta dolor quisquam numquam.', 'Nihil dolor porro iure saepe. Fugiat sit molestiae ut nulla sit autem cupiditate. Asperiores libero eveniet consequuntur modi voluptas.', 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(1197, 217, 'Laboriosam possimus sunt libero repellat architecto quia.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1198, 217, 'Recusandae numquam excepturi soluta dolorem et voluptatem odio dignissimos.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1199, 217, 'Eveniet possimus quia vel similique sunt quos libero.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1200, 217, 'Praesentium nam ea blanditiis totam repudiandae.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1201, 217, 'Laborum rerum quia et placeat.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1202, 217, 'Vel beatae in consequatur nostrum.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1203, 219, '1', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1204, 219, '2', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1205, 219, '3', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1206, 219, '4', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1207, 219, '5', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1208, 219, '6', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1209, 219, '7', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1210, 219, '8', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1211, 219, '9', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1212, 219, '10', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1213, 220, 'Odio qui et quia rem atque voluptatem cupiditate.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1214, 220, 'Sed ut excepturi ut.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1215, 220, 'Aut deserunt rerum magni rerum quo quia velit.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1216, 220, 'Omnis laudantium ratione alias aut officia.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1217, 220, 'Iusto id dolores dolorem nisi tenetur id dolores.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1218, 220, 'Vel voluptatem inventore sit qui sunt voluptatem.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1219, 220, 'Vel minus ratione tempore minima.', NULL, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(1220, 221, 'Sed ipsa molestias autem optio earum voluptas voluptatibus.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1221, 221, 'Autem laboriosam et deserunt.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1222, 221, 'Saepe dolores quasi dolorum eius sint veniam minima autem.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1223, 221, 'Corporis ut nostrum qui optio ullam aut eos.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1224, 223, 'Dignissimos qui libero quibusdam id harum quam et ut.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1225, 223, 'Eius repudiandae vel qui illum.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1226, 223, 'Et ad ullam neque iure.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1227, 223, 'Voluptatem consequatur quo voluptas quia molestias dicta ut.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1228, 223, 'Quas consectetur beatae voluptas reprehenderit.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1229, 223, 'Ullam dolor eaque ut.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1230, 223, 'Quia quidem totam excepturi et dolor.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1231, 223, 'Corporis ut numquam tenetur.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1232, 224, 'Aut voluptatem inventore voluptatem illo amet.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1233, 224, 'Totam quisquam culpa ut dolor ut iste.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1234, 224, 'Incidunt odit et quas porro.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1235, 224, 'Nam beatae laborum excepturi in reiciendis.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1236, 224, 'Error aut non eum.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1237, 224, 'Ullam rerum quia dignissimos exercitationem.', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1238, 225, '1', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1239, 225, '2', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1240, 225, '3', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1241, 225, '4', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1242, 225, '5', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1243, 225, '6', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1244, 225, '7', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1245, 225, '8', NULL, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(1246, 225, '10', NULL, 0, '2024-01-24 11:23:06', '2024-02-15 15:43:05'),
(1264, 228, 'Esse culpa voluptas dolores nihil voluptatum deleniti illum.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1265, 228, 'Voluptatibus doloribus tenetur quas recusandae autem.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1266, 228, 'Omnis sed totam repudiandae culpa sed repellat quos ea.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1267, 228, 'Quo corrupti molestiae quia facilis.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1268, 229, 'Libero eum esse distinctio.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1269, 229, 'Corporis blanditiis eveniet laudantium nihil provident voluptas ut.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1270, 229, 'Eum harum officiis molestiae sint at voluptas.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1271, 229, 'Quia porro quia libero corporis.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1272, 229, 'Doloribus repellat quia omnis facere laborum.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1273, 230, 'Porro aut nisi repudiandae quis iste consequatur itaque velit.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1274, 230, 'Sapiente occaecati vitae dolores laboriosam autem sit ipsam totam.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1275, 230, 'Modi ipsum inventore consectetur aut animi temporibus magnam quia.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1276, 230, 'Et omnis reprehenderit reprehenderit ratione harum.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1277, 231, 'Ducimus unde voluptates quia ut quas libero magnam.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1278, 231, 'Sed aliquam et cum autem.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1279, 231, 'Quasi voluptatem et quod aperiam optio.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1280, 231, 'Culpa sit odio expedita tenetur aperiam aperiam.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1281, 231, 'Est aspernatur est aliquam neque rerum.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1282, 231, 'Alias ex et esse.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1283, 231, 'Tempore aut cupiditate omnis voluptates tempore officia similique.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1284, 232, 'Id officia officiis harum ut est eum quod.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1285, 232, 'Libero aut voluptatibus illo qui sit.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27');
INSERT INTO `options` (`id`, `question_id`, `content`, `explanation`, `is_correct`, `created_at`, `updated_at`) VALUES
(1286, 232, 'Provident inventore dolor qui.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1287, 232, 'Laudantium omnis sit repellat et.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1288, 232, 'Sapiente odit ut molestias facilis.', NULL, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(1342, 241, '1', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1343, 241, '2', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1344, 241, '3', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1345, 241, '4', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1346, 241, '5', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1347, 241, '6', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1348, 241, '7', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1349, 241, '8', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1350, 241, '9', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1351, 241, '10', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1352, 243, 'Quo officiis fugiat rerum molestiae provident voluptas.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1353, 243, 'Quibusdam facilis consectetur ad.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1354, 243, 'Quia tempore architecto cum aut.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1355, 243, 'Animi explicabo alias aliquid voluptatem.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1356, 243, 'Et blanditiis repudiandae cumque maxime vero cupiditate.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1357, 243, 'Veniam reprehenderit commodi eum.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1358, 243, 'Omnis non non at sit impedit repudiandae.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1359, 243, 'Neque sunt repellat quaerat laboriosam exercitationem.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1360, 244, 'Praesentium quia dolor deleniti dolorum.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1361, 244, 'Necessitatibus rerum cumque eum quae.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1362, 244, 'Assumenda et corrupti accusantium laudantium reiciendis rerum.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1363, 244, 'Illum in voluptas aut.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1364, 244, 'Harum sed enim quaerat quisquam tenetur qui quam consectetur.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1365, 244, 'Placeat aut et iusto voluptatem.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1366, 244, 'Officiis nobis ad architecto aut.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1367, 245, '1', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1368, 245, '2', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1369, 245, '3', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1370, 245, '4', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1371, 245, '5', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1372, 245, '6', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1373, 245, '7', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1374, 245, '8', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1375, 245, '9', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1376, 245, '10', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1377, 246, 'Quia dolorem animi et omnis eius rem ducimus.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1378, 246, 'Cum sunt ex labore corrupti saepe odit et.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1379, 246, 'Quod optio nulla asperiores eos rerum deserunt sed.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1380, 246, 'Officiis ipsum hic excepturi sit.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1381, 246, 'Hic dolores quibusdam omnis dolor ea fugiat.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1382, 246, 'Velit saepe labore fugiat corrupti.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1383, 246, 'Aut in dolorem tenetur iste voluptas consequuntur.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1384, 246, 'Dolores veniam eius consectetur.', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1385, 247, '1', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1386, 247, '2', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1387, 247, '3', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1388, 247, '4', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1389, 247, '5', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1390, 247, '6', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1391, 247, '7', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1392, 247, '8', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1393, 247, '9', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1394, 247, '10', NULL, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(1395, 35, 'Atque delectus maiores modi quis.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1396, 35, 'Eum corporis sunt harum qui deleniti.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1397, 35, 'Quam sint et nihil aliquam tempore.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1398, 35, 'Nihil at voluptas deserunt id aliquam.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1399, 35, 'Eos illo dicta qui minima nobis autem sed.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1400, 35, 'Nihil ducimus est eaque officiis iure consectetur quod.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1401, 35, 'Dolorem accusantium sit dignissimos sunt reprehenderit.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1402, 35, 'Qui perferendis est voluptatibus atque velit eos consequatur ad.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1403, 36, 'Velit asperiores culpa nihil.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1404, 36, 'Hic impedit perferendis magnam eos quaerat.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1405, 36, 'Sunt earum consectetur sed et nobis.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1406, 36, 'Voluptatem minima ab quia quia est corporis.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1407, 36, 'Beatae amet dolorum veniam maiores aut.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1408, 37, 'Minima ad saepe odit ab accusamus.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1409, 37, 'Quis ut aspernatur excepturi sunt.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1410, 37, 'Aliquam voluptate eum est excepturi officia dolores.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1411, 37, 'Est non deserunt voluptas culpa voluptatem distinctio accusamus.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1412, 37, 'Similique autem modi animi ut velit quia deserunt.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1413, 37, 'Quo aut in et alias eveniet voluptas cupiditate.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1414, 37, 'Commodi est ut veniam id aut.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1415, 38, 'Error dignissimos soluta quia voluptate.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1416, 38, 'Sapiente sed cum saepe repellat debitis debitis.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1417, 38, 'Iure ad omnis veritatis id.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1418, 38, 'Necessitatibus modi corrupti debitis dolores.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1419, 38, 'Sint quae voluptate quod praesentium corporis corrupti.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1420, 38, 'Eveniet qui sunt est esse officiis cumque.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1421, 38, 'Soluta hic quae dolor quae.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1422, 38, 'Nulla nihil dicta illum quia accusantium aut.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1423, 39, 'Similique similique velit sequi quisquam ducimus.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1424, 39, 'Ipsam facere esse accusantium rerum quaerat officiis et.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1425, 39, 'Perspiciatis et autem eveniet aut quisquam quia similique.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1426, 39, 'Accusantium vero nihil nesciunt voluptatem.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1427, 39, 'Quia sint eveniet quo aperiam repudiandae ut quia aliquam.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1428, 39, 'Laudantium exercitationem sed qui et.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1429, 39, 'Iusto voluptate et est blanditiis modi nesciunt autem.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08'),
(1430, 39, 'Et voluptatem optio repellendus officia doloremque.', NULL, 0, '2024-02-15 12:50:08', '2024-02-15 12:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 12, 'my_token', '7dc2182ef65b1690745438641547e3d9355585616a9ce4adfe3b9d8232dca022', '[\"*\"]', '2024-01-26 11:31:09', NULL, '2024-01-24 14:42:25', '2024-01-26 11:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `type` enum('multiple_choice','single_choice','likert_scale','ranking','feedback') NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `required` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `content`, `image_path`, `video_url`, `type`, `order`, `required`, `created_at`, `updated_at`) VALUES
(13, 3, 'Et unde similique vel molestiae amet.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(14, 3, 'Quia perspiciatis ea numquam velit distinctio.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(15, 3, 'Dolorem exercitationem aut suscipit itaque.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(16, 3, 'Labore itaque excepturi harum deserunt.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(17, 3, 'Esse dicta consequatur soluta animi voluptates ut voluptatibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(18, 3, 'Soluta aliquam placeat asperiores fuga ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(19, 3, 'Vel impedit ipsa iusto corporis repellat praesentium est.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(20, 4, 'Aperiam ea maxime cupiditate fugiat.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(21, 4, 'Perferendis nihil et maiores tempora necessitatibus nobis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(22, 4, 'Aut accusamus fugiat praesentium sapiente iusto quam sequi porro.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(23, 4, 'Non exercitationem earum totam blanditiis maiores excepturi veniam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(24, 4, 'Quisquam id voluptates reprehenderit nulla rerum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(25, 4, 'Quas accusantium inventore possimus deserunt modi omnis nihil eum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(26, 4, 'Sit illum non vel.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(27, 4, 'Nobis ratione et aut molestiae omnis voluptas distinctio.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(34, 6, 'Magnam qui rerum accusantium omnis assumenda.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(35, 6, 'Reprehenderit officiis omnis aspernatur magnam.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(36, 6, 'Facere praesentium quasi quo corrupti rem et.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(37, 6, 'Sed est dolorem voluptatem dolorem ratione ut.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(38, 6, 'Placeat voluptate aut asperiores sequi qui aliquid.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(39, 6, 'Explicabo quo sequi qui dolorum excepturi quam.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-02-15 12:50:08'),
(40, 7, 'Minus pariatur vero recusandae iure voluptas reprehenderit iste.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(41, 7, 'Voluptate similique nam sit eveniet ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(42, 7, 'Esse aliquid consequuntur id voluptas quisquam atque at repudiandae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(43, 7, 'Eos magni pariatur soluta praesentium maiores.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(44, 7, 'Eligendi omnis rem voluptas qui sed temporibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(45, 7, 'Dolorem ducimus nisi est esse consequatur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(46, 8, 'Laboriosam corporis laboriosam libero est.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(47, 8, 'Laudantium dolor rerum dicta.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(48, 8, 'Qui sit illum odio cupiditate libero.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(49, 8, 'Provident ut iure ex repudiandae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(50, 8, 'Ea qui quis aut et.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(51, 8, 'Velit amet aut quaerat consequatur provident aut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(52, 8, 'Animi aspernatur asperiores sapiente officiis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(53, 9, 'Reiciendis aut qui non aut delectus consectetur excepturi.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(54, 9, 'Et non ex impedit qui ipsum quam vel.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(55, 9, 'Distinctio iste et sed ab.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(56, 9, 'Maiores sit voluptas alias.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(57, 9, 'Dolorum aut voluptate voluptatem mollitia itaque expedita.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(58, 9, 'Aut eum enim consequatur et.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(59, 9, 'Autem quo est ad vel alias occaecati.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(60, 9, 'Dignissimos sit suscipit qui eius autem voluptatem eligendi.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(61, 10, 'Quis odio eum suscipit cum asperiores cum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(62, 10, 'Velit blanditiis et tenetur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(63, 10, 'At eos perferendis est eos dolores qui nihil.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(64, 10, 'Cum non eaque maiores et aperiam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(65, 10, 'Velit et accusamus corrupti eum aliquid.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(66, 10, 'Voluptas deleniti magni sequi odit.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(67, 10, 'Esse aperiam adipisci molestias qui.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(68, 10, 'Facilis a dolor molestias quia sapiente nostrum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(69, 11, 'Est laboriosam ut nisi qui.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(70, 11, 'Qui modi nulla officiis ipsam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(71, 11, 'Odio fugit cumque assumenda et qui.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(72, 11, 'Qui rem at qui vel.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(73, 11, 'Sit voluptas molestiae id molestiae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(74, 12, 'Dolorum ducimus tenetur esse quis aut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(75, 12, 'Dignissimos nulla nam eum possimus cumque.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(76, 12, 'Exercitationem at necessitatibus optio voluptatem blanditiis consequatur esse.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(77, 12, 'Dolore voluptatum consequatur perferendis consequatur veniam rem.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(78, 12, 'Natus consequatur accusantium distinctio accusamus itaque.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(80, 13, 'Asperiores perspiciatis repellat corporis ullam et placeat.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(81, 13, 'Placeat minima unde possimus accusamus consectetur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(82, 13, 'Voluptatum distinctio odio quis sunt.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(83, 13, 'Eligendi inventore vero et aut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(84, 13, 'Sed nam hic dolore quia necessitatibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(85, 13, 'Recusandae quis illo magnam quis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(86, 13, 'Reiciendis amet qui aut magnam qui eos voluptatem.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(87, 13, 'Et consequatur blanditiis eum ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(95, 15, 'Necessitatibus sunt totam aut laudantium voluptates adipisci.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(96, 15, 'Quo et nisi nisi ut ex repudiandae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(97, 15, 'Vel aut est facere deleniti quae vel atque consequuntur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(98, 15, 'Est veniam commodi consequatur quod numquam enim occaecati.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(99, 15, 'Velit corrupti odit sit ipsa voluptatem.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(100, 15, 'Est delectus non nisi.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(101, 15, 'Cumque maiores quo ea sequi dolore.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(102, 15, 'Culpa corporis quos est eveniet esse.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(103, 16, 'Aut rerum ut dolores totam aut sunt.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(104, 16, 'Quos voluptas consequatur voluptas laudantium.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(105, 16, 'Ratione explicabo omnis doloremque at amet.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(106, 16, 'Commodi inventore dolorum autem provident laudantium nostrum harum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(107, 16, 'Culpa beatae placeat quasi mollitia rerum cupiditate.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(108, 17, 'Nihil veniam suscipit accusamus sit ad.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(109, 17, 'Ut esse beatae magnam et fugiat quia.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(110, 17, 'Et non voluptas earum dolores ratione molestiae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(111, 17, 'Ut culpa voluptatem omnis id dolorem illo.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(112, 17, 'Velit eligendi distinctio in magnam ea dicta.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(113, 17, 'Est consectetur ut debitis iste est aut facere.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(114, 18, 'Dolor saepe esse voluptates distinctio est.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(115, 18, 'Commodi esse illum soluta veritatis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(116, 18, 'Totam quis animi facilis ipsum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(117, 18, 'Nihil quisquam ut consectetur omnis maxime et libero.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(118, 18, 'Reiciendis velit quia id repudiandae vel.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(119, 19, 'Unde ut ex sit eum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(120, 19, 'Animi eligendi perspiciatis eum tempore sint.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(121, 19, 'Dolores adipisci similique ipsam sint et iusto et.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(122, 19, 'Occaecati dolorem minus accusamus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(123, 19, 'Labore aliquid voluptatem facere dolorem sequi accusamus enim enim.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(124, 19, 'Velit molestiae quia itaque et vitae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(125, 20, 'Repellendus aut a quos perspiciatis ducimus quae.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(126, 20, 'Possimus omnis unde est.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'likert_scale', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(127, 20, 'Perferendis vero aut hic est quis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(128, 20, 'Nemo soluta dolorum molestias.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(129, 20, 'Modi perspiciatis voluptas repellat quis nisi voluptatem voluptates quia.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(130, 20, 'Sint est minus odio est.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(131, 20, 'Doloribus quae aspernatur porro voluptatibus totam doloremque.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(132, 20, 'Sunt possimus sunt quos.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(133, 21, 'Cum neque non rem similique magni.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(134, 21, 'Consequuntur iusto neque quo minus expedita molestiae qui.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(135, 21, 'Voluptate consequatur adipisci laudantium quis eum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(136, 21, 'Perferendis consequatur sint dolorem mollitia.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(137, 21, 'Cupiditate vitae itaque possimus voluptate.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(138, 21, 'Voluptas aut non beatae illo ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(139, 22, 'Ut sint et et est aperiam nobis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(140, 22, 'Quam repellat quod cum quis in.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(141, 22, 'Consequatur eveniet quisquam ad ducimus aut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(142, 22, 'Omnis similique eaque et quia unde non accusantium.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(143, 22, 'Mollitia iste unde id rem itaque non laborum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(144, 22, 'Natus sint unde vel officia.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(145, 23, 'Doloremque vitae nemo quas.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(146, 23, 'Iste quia error at deleniti facilis fugit error.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(147, 23, 'Nihil esse aut distinctio aliquam dignissimos quasi qui.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(148, 23, 'Fugit facere natus qui nulla corrupti temporibus ducimus necessitatibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(149, 23, 'Error perspiciatis iusto beatae nobis aliquid omnis rerum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(150, 24, 'Placeat esse itaque quibusdam natus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(151, 24, 'Et dolores impedit veritatis sapiente.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(152, 24, 'Maxime aut nobis est enim aliquam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(153, 24, 'Deserunt quis fugit unde maiores.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(154, 24, 'Sunt consequatur magnam assumenda esse eveniet provident.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(155, 25, 'Et earum autem eos reiciendis et qui ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(156, 25, 'Voluptas perspiciatis placeat et.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(157, 25, 'Tenetur eos temporibus maiores ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(158, 25, 'Sed eos neque aspernatur est voluptatem dolore.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(159, 25, 'Qui autem atque adipisci saepe quasi labore.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(160, 25, 'Minima sapiente dolore dolores vero reiciendis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(161, 26, 'Facere fugit quos nobis quo quaerat cupiditate.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(162, 26, 'Ipsa adipisci dolores rem molestiae in doloribus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(163, 26, 'Tempore ut soluta est accusamus mollitia.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(164, 26, 'Animi iste sequi ut voluptate illum consequatur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(165, 26, 'Vitae qui ut fuga maxime sed laudantium.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(166, 26, 'Ea totam tenetur recusandae cum nemo.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(167, 26, 'Ducimus ut aliquid debitis vitae temporibus et fuga.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(168, 27, 'Unde sed iure non possimus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(169, 27, 'Sint laudantium ex velit aut et explicabo necessitatibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(170, 27, 'Soluta illum accusantium blanditiis distinctio ea fugit sunt.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(171, 27, 'Qui provident laborum expedita qui et ullam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(172, 27, 'Adipisci ad placeat totam.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(173, 27, 'Magnam dolores cupiditate dolorem libero perferendis.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(174, 28, 'Mollitia qui voluptate et eaque praesentium sed in.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(175, 28, 'Error iusto eaque natus ex.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(176, 28, 'Voluptates temporibus quis incidunt facere.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(177, 28, 'Temporibus iusto sit accusantium.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(178, 28, 'Eos provident corrupti ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(179, 28, 'Pariatur veniam maiores consequatur at.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(180, 28, 'Ut illo nostrum eos ut.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(181, 29, 'Ut tempora et illo autem ea amet non.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(182, 29, 'Fugiat et pariatur sed est accusamus temporibus rerum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(183, 29, 'Quibusdam autem omnis delectus doloribus iusto at eum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(184, 29, 'Consequatur totam nihil error.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(185, 29, 'Magni et aut rem illum voluptatem.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(186, 30, 'Molestiae exercitationem facere eum magnam illo earum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(187, 30, 'Eos reiciendis minus porro est excepturi dicta.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(188, 30, 'Asperiores ipsum reprehenderit ullam porro debitis odio earum.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'multiple_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(189, 30, 'Culpa et itaque suscipit.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(190, 30, 'Odio error ab veniam in temporibus.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(191, 30, 'Rerum consequuntur necessitatibus est aperiam optio in.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(192, 30, 'Quam odio nemo laudantium perferendis atque ut molestiae et.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(193, 30, 'Minima et iure tempora porro molestias repudiandae consequatur.', 'https://via.placeholder.com/300', 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 0, '2024-01-17 09:08:14', '2024-01-17 09:08:14'),
(216, 2, 'Distinctio accusamus quam et inventore at eaque aut.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(217, 2, 'Nemo error ratione vitae eum.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'multiple_choice', 0, 1, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(218, 2, 'Consequatur eius enim omnis perferendis unde hic inventore.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(219, 2, 'Aut sunt quo tempora et suscipit ut nihil.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(220, 2, 'Voluptas perspiciatis mollitia asperiores provident temporibus et libero consequatur.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-01-24 08:57:48', '2024-01-24 08:57:48'),
(221, 14, 'Debitis consequatur sunt sunt recusandae alias dolorum enim.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'single_choice', 0, 1, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(222, 14, 'Ea libero tempore rem sed.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'feedback', 0, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(223, 14, 'Dolores voluptatem non nihil corrupti.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'ranking', 0, 0, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(224, 14, 'Dolorem delectus omnis hic voluptatum et a iusto.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(225, 14, 'Quis natus molestiae omnis et accusamus.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 1, '2024-01-24 11:23:06', '2024-01-24 11:23:06'),
(228, 5, 'Debitis sed atque voluptatibus ea.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 1, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(229, 5, 'Ab vero iste aliquid.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 1, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(230, 5, 'Officia est nostrum sunt dignissimos molestiae.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'multiple_choice', 0, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(231, 5, 'Laudantium doloribus magni quisquam at facere.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'ranking', 0, 1, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(232, 5, 'Aspernatur incidunt occaecati tenetur.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'ranking', 0, 0, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(233, 5, 'Illo saepe aliquid ipsam ut quia.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'feedback', 0, 1, '2024-02-09 16:14:27', '2024-02-09 16:14:27'),
(241, 1, 'Quod laboriosam non veniam unde velit aut.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'likert_scale', 0, 1, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(242, 1, 'Debitis excepturi rem aut cupiditate.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'feedback', 0, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(243, 1, 'Voluptatem illum rerum non harum quia illo et.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 1, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(244, 1, 'Qui suscipit ab animi est ea nihil voluptas possimus.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'single_choice', 0, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(245, 1, 'Dolorem optio nemo quos maxime nulla dolorem.', NULL, 'https://www.youtube.com/embed/UbEpM-VwOU8', 'likert_scale', 0, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(246, 1, 'Officia ipsa aliquam officia aut quo.', NULL, 'https://www.youtube.com/embed/tlUcmD0zPI4', 'single_choice', 0, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41'),
(247, 1, 'Rerum labore omnis sunt neque voluptatem laudantium molestiae.', NULL, 'https://www.youtube.com/embed/BYl7v0YsX9g', 'likert_scale', 0, 0, '2024-02-15 10:40:41', '2024-02-15 10:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_finished` tinyint(1) NOT NULL DEFAULT 0,
  `text_color` varchar(255) NOT NULL,
  `bg_color` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `type` enum('quiz','survey','test') DEFAULT 'survey',
  `visibility` enum('public','private','restricted') NOT NULL DEFAULT 'public',
  `randomize` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `user_id`, `category_id`, `title`, `description`, `start_date`, `end_date`, `is_finished`, `text_color`, `bg_color`, `language`, `status`, `type`, `visibility`, `randomize`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Quiz 1', 'I used this quiz to test how the data will appear in our website', '1977-07-12', '2003-07-22', 0, '#cd5dbe', '#7265dc', 'en', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-02-15 10:40:41'),
(2, 1, 2, 'Quiz 2', 'Deserunt ratione et sint optio nihil laborum dolore a aperiam reiciendis nam veritatis mollitia veniam fugit quod consequuntur consectetur aperiam ipsam ex sit a libero itaque.', '1976-04-09', '1996-03-20', 0, '#000000', '#7ad011', 'en', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-24 08:57:48'),
(3, 1, 3, 'Est quam in voluptates.', 'Et in eum dolor a possimus eligendi corrupti repudiandae qui provident magnam quos sunt non sit qui soluta rem beatae qui.', '1984-11-28', '2020-03-24', 0, '#37261c', '#8f8867', 'ar', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(4, 1, 4, 'Commodi quam in nesciunt.', 'Suscipit accusamus rerum laborum omnis nisi reiciendis nobis libero eaque qui harum debitis aut sunt et natus odio adipisci exercitationem quidem dolore quod doloribus sint.', '1972-07-15', '2008-09-29', 0, '#f2035a', '#053312', 'en', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(5, 1, 5, 'Dolorem fugiat.', 'Quam sed excepturi non voluptas voluptatem sapiente dignissimos ut qui deleniti hic nihil nisi non maiores qui blanditiis quas aliquid error doloribus optio nihil.', '2014-11-15', '2020-09-24', 0, '#000000', '#4c00ff', 'fr', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-02-09 16:14:27'),
(6, 1, 6, 'Praesentium nostrum maxime.', 'Voluptates nihil praesentium et id laborum non consequuntur at accusantium rerum ea corporis voluptate quia numquam harum.', '1977-08-25', '1997-02-02', 0, '#195112', '#6eaf6d', 'en', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(7, 1, 7, 'Veniam ipsam et.', 'Quibusdam et in autem tenetur quia veritatis quasi ut magni labore quia et pariatur nulla nobis eos inventore culpa quisquam eos omnis quasi beatae officia.', '1976-01-12', '2019-01-21', 0, '#cec6e2', '#e09e04', 'en', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(8, 1, 8, 'Omnis eos minima.', 'Autem quo eos iste aut est at hic quibusdam voluptate consequatur sit nihil sunt in aspernatur placeat nulla non.', '1991-01-30', '2013-10-26', 0, '#f205b0', '#c62dbc', 'fr', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(9, 1, 9, 'Repudiandae commodi quidem quam.', 'Quis officia vel magnam quia blanditiis minus dignissimos officiis modi ut et enim nulla et corrupti officiis aliquid esse qui porro.', '1986-04-23', '1992-02-02', 0, '#be8a71', '#c97e47', 'en', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(10, 1, 10, 'Eaque tempore nesciunt voluptatibus omnis.', 'A laboriosam vero deserunt distinctio hic quam ut fugiat nesciunt dolorem voluptatem velit non ut amet quisquam ut temporibus consequuntur esse error dolores.', '1977-10-03', '2011-08-05', 0, '#72982c', '#267ae0', 'ar', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(11, 1, 11, 'A ipsum atque consectetur.', 'Doloremque magni possimus est non deleniti ipsum dolor laborum molestias perspiciatis adipisci qui odit debitis facilis deserunt voluptatem maiores rerum et aut vel et et et velit.', '2003-09-18', '2019-01-21', 0, '#2329a0', '#6a77ac', 'ar', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(12, 1, 12, 'Voluptatem eligendi consequatur odit.', 'Vitae atque sit quia aliquid repellendus est iusto velit in quibusdam asperiores dolore recusandae fugiat magnam at ea temporibus ut fugit ut itaque incidunt sunt.', '2007-03-14', '2008-05-09', 0, '#faca07', '#5035b3', 'en', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(13, 1, 13, 'Hic aut illum.', 'Dolor est cum amet aliquid amet nisi reiciendis et animi rerum id commodi similique id voluptatem sed nulla animi fuga ut.', '1995-04-12', '2008-05-28', 0, '#083b04', '#dc967a', 'fr', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(14, 1, 14, 'Consequuntur repudiandae eaque et.', 'Sunt provident nihil hic voluptatem quasi provident necessitatibus quidem illo eum quaerat pariatur ipsa quaerat praesentium consequatur incidunt molestiae.', '2011-06-06', '2024-09-29', 0, '#3ce639', '#42509a', 'en', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-24 11:23:06'),
(15, 1, 15, 'Error doloremque nobis id.', 'Voluptate porro impedit sed blanditiis voluptates est quo voluptas enim optio error quia non occaecati molestiae quos nihil voluptates excepturi laudantium eos rerum distinctio.', '1984-05-18', '2011-02-01', 0, '#ae8362', '#90fd95', 'fr', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(16, 1, 16, 'Nihil aut animi deserunt.', 'Et amet et optio accusamus est ipsum cupiditate fugit quia aliquam ut unde ipsam velit facilis asperiores quas esse earum laborum molestias.', '2006-01-24', '2006-03-23', 0, '#6b8fb4', '#fa0271', 'en', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(17, 1, 17, 'Dicta minus tempore.', 'Esse quia deleniti vitae debitis vitae et odit velit quo sapiente asperiores soluta magni quisquam quod architecto adipisci.', '2021-11-17', '2023-12-13', 0, '#fd993a', '#c5bf14', 'fr', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(18, 1, 18, 'Illum omnis id.', 'Vel labore et eligendi quae fuga expedita facere eius quo aut non iusto aut voluptatem deleniti.', '1977-12-21', '2002-11-01', 0, '#6379bc', '#2e3f2f', 'en', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(19, 1, 19, 'Quam accusantium dolore et.', 'Aut sed assumenda quo rerum id assumenda voluptatem velit labore sapiente ducimus eos facilis voluptatem expedita.', '1972-01-09', '2021-06-22', 0, '#1ee451', '#98dd8d', 'en', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(20, 1, 20, 'Asperiores commodi natus.', 'Reiciendis maiores commodi eos possimus quia aut possimus ut sunt et voluptas earum necessitatibus amet ducimus ipsam accusamus.', '2013-11-07', '2022-03-02', 0, '#3a9a91', '#cb39bf', 'ar', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(21, 1, 21, 'Magni quaerat nostrum commodi.', 'Nostrum quia recusandae enim quo repellat praesentium quod fuga ut unde omnis consequuntur asperiores voluptatem omnis.', '1971-05-22', '1998-08-22', 0, '#f8d600', '#8d0eb3', 'ar', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(22, 1, 22, 'Dolores ratione iure.', 'Excepturi voluptates praesentium tempore ut consequuntur omnis animi placeat deleniti ex est facilis quis consequatur itaque exercitationem non pariatur exercitationem quis veritatis magni adipisci.', '1992-03-17', '2018-01-05', 0, '#71d8e2', '#631de2', 'fr', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(23, 1, 23, 'Molestias inventore quis eligendi.', 'Pariatur illo quidem rerum suscipit occaecati facere sequi odio sed quia commodi id nulla dolorem occaecati sint.', '1991-06-06', '2008-03-01', 0, '#c571cb', '#ba51d8', 'fr', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(24, 1, 24, 'Voluptates eos iste alias.', 'Quis beatae molestiae occaecati facilis nam et error libero quia rerum qui sunt.', '2010-06-16', '2023-10-06', 0, '#1d72dd', '#93aec9', 'ar', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(25, 1, 25, 'Eaque facilis natus.', 'Totam sed inventore sapiente sint sint cum eveniet dolor molestiae quae dolore nam ut illum voluptas sed occaecati impedit neque enim aut quia consequatur maiores.', '1978-07-10', '1987-09-28', 0, '#be7223', '#a6da86', 'fr', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(26, 1, 26, 'Dolor cupiditate voluptate.', 'Omnis id doloribus natus autem suscipit est exercitationem odio aut expedita et vero aut nemo sit non omnis.', '1998-12-17', '2024-03-23', 0, '#4899a1', '#a33379', 'ar', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(27, 1, 27, 'Velit quis.', 'Cupiditate mollitia necessitatibus similique temporibus occaecati optio laudantium repellat et quia delectus ex qui exercitationem quibusdam facilis dolorem.', '1977-11-21', '1979-07-25', 0, '#d91b60', '#861f8d', 'fr', 'draft', 'survey', 'private', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(28, 1, 28, 'Ullam eaque odio.', 'Nihil officia ut aliquam sit voluptatem sit exercitationem quo debitis delectus labore pariatur quaerat quo aliquid eum id.', '2006-12-30', '2016-09-03', 0, '#7c4947', '#9e402b', 'fr', 'draft', 'survey', 'restricted', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(29, 1, 29, 'Veritatis beatae vel.', 'Culpa ipsam voluptatem facilis voluptates sed omnis minus quia quia culpa explicabo impedit quam reiciendis impedit ut qui debitis libero non recusandae in assumenda est.', '1986-10-31', '2022-01-14', 0, '#174727', '#cb1913', 'ar', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13'),
(30, 1, 30, 'Tempora aut.', 'Repellendus illo pariatur et ut hic quaerat iusto nisi consequatur quia quas id fugiat soluta dolorem neque itaque labore ullam non.', '1996-10-26', '2005-11-10', 0, '#ededa5', '#ac6265', 'fr', 'draft', 'survey', 'public', 0, '2024-01-17 09:08:13', '2024-01-17 09:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('in_progress','completed, abandoned') NOT NULL DEFAULT 'in_progress',
  `started_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED DEFAULT NULL,
  `likert_scale` tinyint(3) UNSIGNED DEFAULT NULL,
  `ranking` tinyint(3) UNSIGNED DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `user_id`, `question_id`, `quiz_id`, `option_id`, `likert_scale`, `ranking`, `answer`, `created_at`, `updated_at`) VALUES
(1, 2, 194, 1, NULL, 10, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(2, 2, 195, 1, NULL, NULL, NULL, 'AAAAA', '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(3, 2, 196, 1, 1085, NULL, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(4, 2, 197, 1, 1094, NULL, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(5, 2, 198, 1, NULL, 1, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(6, 2, 199, 1, 1110, NULL, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(7, 2, 200, 1, NULL, 1, NULL, NULL, '2024-01-18 09:10:51', '2024-01-18 09:10:51'),
(8, 2, 206, 2, NULL, NULL, NULL, 'zdqdqzdqzdqz', '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(9, 2, 208, 2, NULL, NULL, NULL, 'qzdqzdzq', '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(10, 2, 209, 2, NULL, 1, NULL, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(11, 2, 210, 2, 1168, NULL, 2, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(12, 2, 210, 2, 1169, NULL, 3, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(13, 2, 210, 2, 1170, NULL, 4, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(14, 2, 210, 2, 1171, NULL, 5, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(15, 2, 210, 2, 1172, NULL, 6, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(16, 2, 210, 2, 1173, NULL, 7, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(17, 2, 210, 2, 1167, NULL, 1, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(18, 2, 207, 2, 1151, NULL, NULL, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(19, 2, 207, 2, 1152, NULL, NULL, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(20, 2, 207, 2, 1154, NULL, NULL, NULL, '2024-01-18 09:18:15', '2024-01-18 09:18:15'),
(21, 9, 194, 1, NULL, 5, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(22, 9, 195, 1, NULL, NULL, NULL, 'BBBBBBBBBBBBB', '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(23, 9, 196, 1, 1092, NULL, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(24, 9, 197, 1, 1099, NULL, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(25, 9, 198, 1, NULL, 1, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(26, 9, 199, 1, 1117, NULL, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(27, 9, 200, 1, NULL, 1, NULL, NULL, '2024-01-18 13:38:04', '2024-01-18 13:38:04'),
(28, 6, 206, 2, NULL, NULL, NULL, 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(29, 6, 208, 2, NULL, NULL, NULL, 'aaaaaaaaaaaaaaaaaaaaaaa', '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(30, 6, 209, 2, NULL, 10, NULL, NULL, '2024-01-19 11:06:47', '2024-01-19 14:29:40'),
(31, 6, 210, 2, 1172, NULL, 7, NULL, '2024-01-19 11:06:47', '2024-01-19 14:06:36'),
(32, 6, 210, 2, 1173, NULL, 6, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(33, 6, 210, 2, 1167, NULL, 1, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(34, 6, 210, 2, 1168, NULL, 2, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(35, 6, 210, 2, 1169, NULL, 3, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(36, 6, 210, 2, 1170, NULL, 4, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(37, 6, 210, 2, 1171, NULL, 5, NULL, '2024-01-19 11:06:47', '2024-01-19 15:40:52'),
(38, 6, 207, 2, 1156, NULL, NULL, NULL, '2024-01-19 11:06:47', '2024-01-19 11:06:47'),
(39, 6, 207, 2, 1151, NULL, NULL, NULL, '2024-01-19 14:06:36', '2024-01-19 14:06:36'),
(40, 6, 210, 2, 2, NULL, 2, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(41, 6, 210, 2, 1, NULL, 1, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(42, 6, 210, 2, 3, NULL, 3, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(43, 6, 210, 2, 4, NULL, 4, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(44, 6, 210, 2, 5, NULL, 5, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(45, 6, 210, 2, 6, NULL, 6, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(46, 6, 210, 2, 7, NULL, 7, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(47, 6, 207, 2, 1152, NULL, NULL, NULL, '2024-01-19 14:29:40', '2024-01-19 14:29:40'),
(48, 6, 211, 2, NULL, NULL, NULL, 'aaaaaaaaaaaaaaaaa', '2024-01-19 15:51:40', '2024-01-19 16:06:05'),
(49, 6, 214, 2, NULL, 10, NULL, NULL, '2024-01-19 15:51:40', '2024-01-19 15:51:40'),
(50, 6, 215, 2, 1190, NULL, 2, NULL, '2024-01-19 15:51:40', '2024-01-19 15:57:42'),
(51, 6, 215, 2, 1195, NULL, 6, NULL, '2024-01-19 15:51:40', '2024-01-19 16:06:05'),
(52, 6, 215, 2, 1196, NULL, 7, NULL, '2024-01-19 15:51:40', '2024-01-19 16:06:05'),
(53, 6, 215, 2, 1191, NULL, 1, NULL, '2024-01-19 15:51:40', '2024-01-19 15:57:42'),
(54, 6, 215, 2, 1192, NULL, 3, NULL, '2024-01-19 15:51:40', '2024-01-19 15:57:42'),
(55, 6, 215, 2, 1193, NULL, 4, NULL, '2024-01-19 15:51:40', '2024-01-19 15:57:42'),
(56, 6, 215, 2, 1194, NULL, 5, NULL, '2024-01-19 15:51:40', '2024-01-19 15:57:42'),
(57, 6, 212, 2, 1175, NULL, NULL, NULL, '2024-01-19 15:51:40', '2024-01-19 15:51:40'),
(58, 6, 212, 2, 1174, NULL, NULL, NULL, '2024-01-19 16:06:05', '2024-01-19 16:06:05'),
(59, 12, 221, 14, 1220, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(60, 12, 222, 14, NULL, NULL, NULL, 'bbbbbbbbbbbbbbbbbbbb', '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(61, 12, 223, 14, 1224, NULL, 2, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(62, 12, 223, 14, 1225, NULL, 1, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(63, 12, 223, 14, 1226, NULL, 3, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(64, 12, 223, 14, 1227, NULL, 4, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(65, 12, 223, 14, 1228, NULL, 5, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(66, 12, 223, 14, 1229, NULL, 6, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(67, 12, 223, 14, 1230, NULL, 7, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(68, 12, 223, 14, 1231, NULL, 8, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(69, 12, 224, 14, 1232, NULL, 1, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(70, 12, 224, 14, 1234, NULL, 4, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(71, 12, 224, 14, 1237, NULL, 5, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(72, 12, 224, 14, 1236, NULL, 3, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(73, 12, 224, 14, 1233, NULL, 6, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(74, 12, 224, 14, 1235, NULL, 2, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(75, 12, 225, 14, NULL, 6, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(76, 12, 226, 14, 1248, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(77, 12, 226, 14, 1249, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(78, 12, 226, 14, 1250, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(79, 12, 227, 14, 1256, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(80, 12, 227, 14, 1257, NULL, NULL, NULL, '2024-01-24 11:28:27', '2024-01-24 11:28:27'),
(81, 6, 61, 10, NULL, NULL, NULL, 'abzdqdqzdq', '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(82, 6, 62, 10, NULL, NULL, NULL, 'qzdbqzdqzdqzdqzdqzd', '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(83, 6, 63, 10, 319, NULL, 1, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(84, 6, 63, 10, 320, NULL, 2, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(85, 6, 63, 10, 321, NULL, 4, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(86, 6, 63, 10, 322, NULL, 3, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(87, 6, 63, 10, 323, NULL, 5, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(88, 6, 63, 10, 324, NULL, 6, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(89, 6, 64, 10, 325, NULL, NULL, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(90, 6, 65, 10, 331, NULL, NULL, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(91, 6, 66, 10, NULL, NULL, NULL, 'zqdzqdqzdqzdq', '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(92, 6, 67, 10, NULL, 10, NULL, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(93, 6, 68, 10, 352, NULL, NULL, NULL, '2024-01-25 10:09:58', '2024-01-25 10:09:58'),
(99, 39, 155, 25, 865, NULL, NULL, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(100, 39, 156, 25, 873, NULL, NULL, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(101, 39, 157, 25, 878, NULL, 1, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(102, 39, 157, 25, 879, NULL, 2, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(103, 39, 157, 25, 880, NULL, 3, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(104, 39, 157, 25, 881, NULL, 5, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(105, 39, 157, 25, 882, NULL, 4, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(106, 39, 157, 25, 883, NULL, 6, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(107, 39, 158, 25, 884, NULL, 4, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(108, 39, 158, 25, 885, NULL, 5, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(109, 39, 158, 25, 886, NULL, 3, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(110, 39, 158, 25, 887, NULL, 2, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(111, 39, 158, 25, 888, NULL, 1, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(112, 39, 159, 25, NULL, NULL, NULL, 'aaaaaaaa', '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(113, 39, 160, 25, NULL, 1, NULL, NULL, '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(114, 39, 28, 5, 157, NULL, 1, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(115, 39, 28, 5, 158, NULL, 2, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(116, 39, 28, 5, 159, NULL, 4, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(117, 39, 28, 5, 160, NULL, 3, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(118, 39, 29, 5, 162, NULL, NULL, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(119, 39, 31, 5, 170, NULL, 2, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(120, 39, 31, 5, 171, NULL, 1, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(121, 39, 31, 5, 172, NULL, 4, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(122, 39, 31, 5, 173, NULL, 3, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(123, 39, 31, 5, 174, NULL, 6, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(124, 39, 31, 5, 175, NULL, 5, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(125, 39, 31, 5, 176, NULL, 7, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(126, 39, 32, 5, 177, NULL, 1, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(127, 39, 32, 5, 178, NULL, 2, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(128, 39, 32, 5, 179, NULL, 3, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(129, 39, 32, 5, 180, NULL, 5, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(130, 39, 32, 5, 181, NULL, 4, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(131, 39, 33, 5, NULL, NULL, NULL, 'aaa', '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(132, 39, 30, 5, 166, NULL, NULL, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(133, 39, 30, 5, 167, NULL, NULL, NULL, '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(134, 39, 118, 18, NULL, NULL, NULL, '333', '2024-02-09 10:46:54', '2024-02-09 11:00:29'),
(135, 39, 114, 18, 617, NULL, NULL, NULL, '2024-02-09 10:46:54', '2024-02-09 10:46:54'),
(136, 39, 115, 18, NULL, NULL, NULL, 'zqdpoqzdùqzpkjdqzd', '2024-02-09 11:00:29', '2024-02-09 11:00:29'),
(137, 39, 116, 18, 625, NULL, NULL, NULL, '2024-02-09 11:00:29', '2024-02-09 11:00:29'),
(138, 39, 116, 18, 626, NULL, NULL, NULL, '2024-02-09 11:00:29', '2024-02-09 11:00:29'),
(139, 37, 194, 1, NULL, 10, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(140, 37, 195, 1, NULL, NULL, NULL, 'response example', '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(141, 37, 196, 1, 1086, NULL, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(142, 37, 197, 1, 1095, NULL, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(143, 37, 198, 1, NULL, 10, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(144, 37, 199, 1, 1110, NULL, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08'),
(145, 37, 200, 1, NULL, 10, NULL, NULL, '2024-02-13 08:41:08', '2024-02-13 08:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `last_login_at`, `created_at`, `updated_at`, `role`, `admin_id`, `mobile_number`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$12$2gjCJMYvdUlqEi9WJcH6P.v/D.O3j5WSon2RX9mzv/VZEY8LeMic6', 'skEYgcIoUg9fXHqcD5OXi9KyJw6Xg8HeSsXWPWJAAIWO5RXolRTHpAc0qNec', '2024-02-15 09:03:22', '2024-01-17 09:08:12', '2024-02-15 09:03:22', 'admin', NULL, ''),
(2, 'Wilber Wisoky', 'smitham.bertram@example.com', '2024-01-17 09:08:12', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '1WlJwVRxqnt0kVw2e5DrttpITV7cNAbfrrpZuCUFWfVml6ZwZc0AmiwPIqqi', '2024-02-01 13:26:19', '2024-01-17 09:08:13', '2024-02-01 13:26:19', 'user', 1, '+1 (574) 368-5199'),
(3, 'Ollie Hessel', 'nicolas.lewis@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'hjQuDqXQxE', '2024-02-02 16:56:55', '2024-01-17 09:08:13', '2024-02-02 16:56:55', 'user', 1, '+1 (747) 291-6898'),
(4, 'Dr. Leo Schmitt PhD', 'murphy.nash@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '9Ibn5hymnp', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '(320) 474-7058'),
(5, 'Lawrence Krajcik II', 'schoen.margarita@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '95iffQswbo', '2024-01-23 08:58:11', '2024-01-17 09:08:13', '2024-01-23 08:58:11', 'user', 1, '860-901-8114'),
(6, 'Eryn Heller', 'elinore37@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'cW5WIxNvYGp9eEeOItacW5X95D7IQ5umeRMkA8UhHLH8Mr1ZYOSWsfxIfITE', '2024-01-25 08:30:45', '2024-01-17 09:08:13', '2024-01-25 08:30:45', 'user', 1, '253-483-1911'),
(7, 'Miss Breanne Dicki', 'emmalee17@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '2y4LP3I3fs', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-619-770-8792'),
(8, 'Marian Crona DVM', 'bosco.thea@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'UEXnMK2N22', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '(848) 961-5886'),
(9, 'Mrs. Selena Kautzer', 'maymie17@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'sFGQ3SNW6d', '2024-01-18 13:37:11', '2024-01-17 09:08:13', '2024-01-18 13:37:11', 'user', 1, '(781) 315-9261'),
(10, 'Wellington Heathcote III', 'fhilpert@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '6voUmu7PWD', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-567-616-4981'),
(11, 'Esperanza McDermott', 'salvatore52@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'yJJ4RYCdv9', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '520.527.0637'),
(12, 'Sara aamri', 'isaiah94@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'xOvMw59G53yjz6SUWPOjN39UoX2AZBiNp4BJolayBPrTavrWoAGTYKsvBLY2', '2024-01-24 15:12:08', '2024-01-17 09:08:13', '2024-01-24 15:12:08', 'user', 1, '+1-980-802-6350'),
(13, 'Julien Abbott PhD', 'richie71@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'kW6n9hmG0u', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '725-616-3402'),
(14, 'Mrs. Gisselle Howe', 'giovanny33@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'VQj37krfqW', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '530.671.4905'),
(15, 'Mr. Reyes Walker II', 'noemy74@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '0erH9z5kmF', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1.785.791.4358'),
(16, 'Prof. Monte Sipes', 'fmante@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'PKshX6Ma42', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1 (541) 554-5065'),
(17, 'Marcus Konopelski', 'lloyd.murphy@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '9yR5Cjocyo', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1-443-313-0076'),
(18, 'Prof. Merl McDermott DDS', 'lschoen@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'vcF2Ib3dhq', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1 (903) 862-7701'),
(19, 'Dr. Anderson Grimes II', 'parker.gage@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'OzS8AIoO3s', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-512-716-2703'),
(20, 'Ervin Kshlerin', 'amos50@example.org', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 't5rkmJCR1e', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+12283775728'),
(21, 'Dr. Missouri Hudson', 'neha.upton@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'UuIQiupL1e', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '918.573.8987'),
(22, 'Earline Marks', 'frunolfsdottir@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'ieO0twr19n', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-213-484-3990'),
(23, 'Emely Cole', 'leffler.jamarcus@example.org', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '3lIGaY8ttK', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1.323.459.4130'),
(24, 'Mr. Aric Lebsack DDS', 'watsica.cristopher@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '4nXr6NHlQ9', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '(480) 907-4064'),
(25, 'Prof. Efren Baumbach DVM', 'schulist.jaylon@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '6L90A6SNUH', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1-253-203-4153'),
(26, 'Mrs. Ciara Hills', 'trystan.bruen@example.net', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '6f6wUw97c3', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '737.622.2148'),
(27, 'Nathaniel Bruen', 'felicita23@example.org', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'H8gbEV1DNI', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+15592393401'),
(28, 'Mr. Emory Bauch IV', 'wiza.april@example.org', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'ZnSKUXRCsi', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '+1 (520) 851-7787'),
(29, 'Pamela Jast Jr.', 'satterfield.milton@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '6TQZUvqvXK', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-743-468-7546'),
(30, 'Miss Elenora Hill I', 'hmedhurst@example.org', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', '5TOicn6RJe', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '(316) 484-8606'),
(31, 'Aiden O\'Keefe', 'schimmel.kenton@example.com', '2024-01-17 09:08:13', '$2y$12$aryqcYNvR7JjIEgMIwUz0ek274djTippKUNtuPHp2OjlB15Z2mkd.', 'TdfjDl2CiL', NULL, '2024-01-17 09:08:13', '2024-01-17 09:08:13', 'user', 1, '1-678-608-3470'),
(32, 'Mohamed Amine Ben Ali', 'benali@example.com', NULL, '$2y$12$Cfqg20KbhUuzpejZ6nCbO.fts/ct5JC9TosQyePFYejJsd6k81nBW', NULL, '2024-02-13 08:42:10', '2024-02-07 11:08:23', '2024-02-13 08:42:10', 'user', 1, '23012345'),
(33, 'Fatma Zahra Mansour', 'mansour@example.com', NULL, '$2y$12$S9rwy8sBIyJKiCwXYS7syenY5GDDfdxFhWiEsyhhAAU8ZlwkieDeO', NULL, NULL, '2024-02-07 11:08:24', '2024-02-07 11:08:24', 'user', 1, '22098765'),
(34, 'Youssef Ben Salah', 'bensalah@example.com', NULL, '$2y$12$bqFI7bfOmLb/RpmmSYo4KOcZ5lZzxXm1Br1wL5BYy67YWzTQz8Bo2', NULL, NULL, '2024-02-07 11:08:24', '2024-02-07 11:08:24', 'user', 1, '21045678'),
(35, 'Amina Ben Ammar', 'benammar@example.com', NULL, '$2y$12$leBituZO5W3WN3yPtzwXvuHJPh.Oq3ARSm7F2H0wsimTGRZUxpM8i', NULL, NULL, '2024-02-07 11:08:24', '2024-02-07 11:08:24', 'user', 1, '22012345'),
(36, 'Ali Ben Youssef', 'benyoussef@example.com', NULL, '$2y$12$wMhvXsIwsEpCdOMKe9vM9ukZ1pTeYDPQamS83i.Su0ITt.1ykVToa', NULL, NULL, '2024-02-07 11:08:24', '2024-02-07 11:08:24', 'user', 1, '23098765'),
(37, 'Leila Ben Khedher', 'benkhedher@example.com', NULL, '$2y$12$kZdt/wzlB7Vfc4QappuTrejwNqJP15A3Xz/A0bMLgphX0DDE8Q9Ou', NULL, '2024-02-13 08:40:08', '2024-02-07 11:08:24', '2024-02-13 08:40:08', 'user', 1, '98012345'),
(38, 'Habib Ben Ahmed', 'benahmed@example.com', NULL, '$2y$12$VkTAoi6xyTtXY5zX.AwQhOZGZoYv4Ck1YVw8ot5PptvYNgJrATzey', NULL, '2024-02-08 15:27:12', '2024-02-07 11:08:25', '2024-02-08 15:27:12', 'user', 1, '99087654'),
(39, 'Nadia Ben Mustapha', 'benmustapha@example.com', NULL, '$2y$12$x30p3WefHMjypS.NMOk1muVAtjUPdDrXyjP.gTJpXKRwRy6eG6ZrO', NULL, '2024-02-09 08:42:33', '2024-02-07 11:08:25', '2024-02-09 08:42:33', 'user', 1, '50012345'),
(40, 'Sofia Ben Aissa', 'benaissa@example.com', NULL, '$2y$12$4HImzgjc.xMVOYhrBBw68.uX6UNisxTHiulE7.BmNppa4r95Q2Ap6', NULL, NULL, '2024-02-07 11:08:25', '2024-02-07 11:08:25', 'user', 1, '55098765'),
(41, 'Karim Ben Amor', 'benamor@example.com', NULL, '$2y$12$K3xns6hf/nUbPVqsUiuEMOV1g5GpE6iSWkWXyHVZI0BT4oqporgri', NULL, NULL, '2024-02-07 11:08:25', '2024-02-07 11:08:25', 'user', 1, '95045678');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_states`
--

CREATE TABLE `user_quiz_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `state` enum('not_started','in_progress','completed') NOT NULL DEFAULT 'not_started',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_quiz_states`
--

INSERT INTO `user_quiz_states` (`id`, `user_id`, `quiz_id`, `state`, `created_at`, `updated_at`) VALUES
(2, 39, 25, 'completed', '2024-02-09 09:37:35', '2024-02-09 09:37:35'),
(3, 39, 5, 'completed', '2024-02-09 09:45:44', '2024-02-09 09:45:44'),
(4, 39, 18, 'in_progress', '2024-02-09 11:00:29', '2024-02-09 11:00:29'),
(5, 37, 1, 'completed', '2024-02-13 08:41:08', '2024-02-13 08:41:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invitations_quiz_id_foreign` (`quiz_id`),
  ADD KEY `invitations_sender_id_foreign` (`sender_id`),
  ADD KEY `invitations_recipient_id_foreign` (`recipient_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_foreign` (`question_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_user_id_foreign` (`user_id`),
  ADD KEY `quizzes_category_id_foreign` (`category_id`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_attempts_user_id_foreign` (`user_id`),
  ADD KEY `quiz_attempts_quiz_id_foreign` (`quiz_id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `responses_user_id_question_id_quiz_id_option_id_unique` (`user_id`,`question_id`,`quiz_id`,`option_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `user_quiz_states`
--
ALTER TABLE `user_quiz_states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1431;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_quiz_states`
--
ALTER TABLE `user_quiz_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invitations`
--
ALTER TABLE `invitations`
  ADD CONSTRAINT `invitations_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invitations_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invitations_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `quizzes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD CONSTRAINT `quiz_attempts_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_attempts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
