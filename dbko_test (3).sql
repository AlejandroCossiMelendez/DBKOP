-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 11:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbko_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `password` varchar(32) NOT NULL DEFAULT '',
  `premDays` int(11) NOT NULL DEFAULT 0,
  `premEnd` int(11) NOT NULL DEFAULT 0,
  `email` varchar(50) NOT NULL DEFAULT '',
  `blocked` tinyint(4) NOT NULL DEFAULT 0,
  `rlname` varchar(45) NOT NULL DEFAULT '',
  `location` varchar(45) NOT NULL DEFAULT '',
  `recovery_key` varchar(20) NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT 0,
  `hidemail` tinyint(1) NOT NULL DEFAULT 0,
  `page_access` int(11) NOT NULL DEFAULT 0,
  `lastday` int(11) NOT NULL DEFAULT 0,
  `created` int(11) NOT NULL DEFAULT 0,
  `page_lastday` int(11) NOT NULL DEFAULT 0,
  `premium_points` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `password`, `premDays`, `premEnd`, `email`, `blocked`, `rlname`, `location`, `recovery_key`, `hide`, `hidemail`, `page_access`, `lastday`, `created`, `page_lastday`, `premium_points`) VALUES
(1234567, 'admyan01', 0, 1311592424, 'yanliimaxt@hotmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(6346772, '15306266', 0, 1745009372, 'yavl100220@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 100),
(9297774, '15306266', 0, 0, 'alejandro25fp@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(7526527, '15306266', 0, 0, 'yavl10022201@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(4665019, '15306266', 0, 0, 'yavl10031232201@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(2456329, '15306266', 0, 0, 'yavl100231312201@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(5644111, '15306266', 0, 0, 'yavl100222013213@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(811840, '15306266', 0, 0, 'yavl10031233220@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(5830563, '15306266', 0, 0, 'yavl1421400220@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(9099028, '15306266', 0, 0, 'yavl1002312201@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(900585, '15306266', 0, 0, 'yavl10022231310@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(2081477, '15306266', 0, 0, 'yavl100221212101@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0),
(8631209, '123456', 0, 0, 'yavl1002313122201@gmail.com', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `player` int(20) NOT NULL DEFAULT 0,
  `outfit` int(10) NOT NULL DEFAULT 0,
  `addon` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bans`
--

CREATE TABLE `bans` (
  `type` int(11) NOT NULL DEFAULT 0 COMMENT 'this field defines if its ip, account, player, or any else ban',
  `ip` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mask` int(10) UNSIGNED NOT NULL DEFAULT 4294967295,
  `player` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `account` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `time` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `reason` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blessings`
--

CREATE TABLE `blessings` (
  `player` int(20) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin2 COLLATE=latin2_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dbkop_shop`
--

CREATE TABLE `dbkop_shop` (
  `id` int(11) NOT NULL,
  `dbkop_point` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `path_img` varchar(50) NOT NULL,
  `offer_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbkop_shop`
--

INSERT INTO `dbkop_shop` (`id`, `dbkop_point`, `id_item`, `path_img`, `offer_description`) VALUES
(1, 100, 5805, 'god_armor.png', 'God Armor - Skill Sword,Critical,Distance +20.'),
(2, 100, 5809, 'god_legs.png', 'God Legs - Skill Sword,Critical,Distance +20.'),
(3, 100, 5806, 'god_boots.png', 'God Boots - Speed +80%, skill Sword,Critical,Distance,Energy +20.'),
(4, 100, 5892, 'supreme_sword.png', 'Atk:31 Def:23'),
(5, 100, 3956, 'red_senzu.png', 'HP + Mana Cure 65k');

-- --------------------------------------------------------

--
-- Table structure for table `deathlist`
--

CREATE TABLE `deathlist` (
  `player` int(21) NOT NULL DEFAULT 0,
  `killer` varchar(30) NOT NULL DEFAULT '',
  `level` int(21) NOT NULL DEFAULT 0,
  `date` int(21) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'group name',
  `flags` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `access` int(11) NOT NULL DEFAULT 0,
  `ranga` int(11) NOT NULL DEFAULT 0,
  `maxdepotitems` int(11) NOT NULL DEFAULT 0,
  `maxviplist` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guilds`
--

CREATE TABLE `guilds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'guild name - nothing else needed here',
  `ownerid` int(11) NOT NULL,
  `creationdata` int(11) NOT NULL,
  `invited_to` int(11) NOT NULL,
  `invited_by` int(11) NOT NULL,
  `in_war_with` int(11) NOT NULL,
  `kills` int(11) NOT NULL,
  `show` smallint(1) NOT NULL,
  `war_time` int(11) NOT NULL,
  `kills_all` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `guilds`
--

INSERT INTO `guilds` (`id`, `name`, `ownerid`, `creationdata`, `invited_to`, `invited_by`, `in_war_with`, `kills`, `show`, `war_time`, `kills_all`) VALUES
(2, 'Sattanish', 9, 1744854735, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `guild_ranks`
--

CREATE TABLE `guild_ranks` (
  `id` int(11) NOT NULL,
  `guild_id` int(11) NOT NULL COMMENT 'guild',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'rank name',
  `level` int(11) NOT NULL COMMENT 'rank level - leader, vice, member, maybe something else'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `guild_ranks`
--

INSERT INTO `guild_ranks` (`id`, `guild_id`, `name`, `level`) VALUES
(4, 2, 'Leader', 1);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `warnings` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`id`, `owner`, `paid`, `warnings`) VALUES
(1, 0, 0, '0'),
(2, 0, 0, '0'),
(3, 0, 0, '0'),
(4, 0, 0, '0'),
(5, 0, 0, '0'),
(6, 0, 0, '0'),
(7, 0, 0, '0'),
(12, 0, 0, '0'),
(13, 0, 0, '0'),
(14, 0, 0, '0'),
(15, 0, 0, '0'),
(16, 0, 0, '0'),
(17, 0, 0, '0'),
(18, 0, 0, '0'),
(19, 0, 0, '0'),
(20, 0, 0, '0'),
(21, 0, 0, '0'),
(22, 0, 0, '0'),
(23, 0, 0, '0'),
(24, 0, 0, '0'),
(25, 0, 0, '0'),
(26, 0, 0, '0'),
(27, 0, 0, '0'),
(28, 0, 0, '0'),
(29, 0, 0, '0'),
(30, 0, 0, '0'),
(31, 0, 0, '0'),
(32, 0, 0, '0'),
(33, 0, 0, '0'),
(34, 0, 0, '0'),
(35, 0, 0, '0'),
(36, 0, 0, '0'),
(37, 0, 0, '0'),
(38, 0, 0, '0'),
(39, 0, 0, '0'),
(40, 0, 0, '0'),
(41, 0, 0, '0'),
(42, 0, 0, '0'),
(43, 0, 0, '0'),
(44, 0, 0, '0'),
(45, 0, 0, '0'),
(47, 0, 0, '0'),
(48, 0, 0, '0'),
(49, 0, 0, '0'),
(50, 0, 0, '0'),
(51, 0, 0, '0'),
(52, 0, 0, '0'),
(53, 0, 0, '0'),
(54, 0, 0, '0'),
(55, 0, 0, '0'),
(56, 0, 0, '0'),
(57, 0, 0, '0'),
(58, 0, 0, '0'),
(59, 0, 0, '0'),
(61, 0, 0, '0'),
(62, 0, 0, '0'),
(63, 0, 0, '0'),
(64, 0, 0, '0'),
(65, 0, 0, '0'),
(66, 0, 0, '0'),
(67, 0, 0, '0'),
(68, 0, 0, '0'),
(69, 0, 0, '0'),
(70, 0, 0, '0'),
(71, 0, 0, '0'),
(72, 0, 0, '0'),
(74, 0, 0, '0'),
(76, 0, 0, '0'),
(77, 0, 0, '0'),
(78, 0, 0, '0'),
(79, 0, 0, '0'),
(80, 0, 0, '0'),
(81, 0, 0, '0'),
(82, 0, 0, '0'),
(83, 0, 0, '0'),
(84, 0, 0, '0'),
(86, 0, 0, '0'),
(87, 0, 0, '0'),
(88, 0, 0, '0'),
(89, 0, 0, '0'),
(90, 0, 0, '0'),
(91, 0, 0, '0'),
(93, 0, 0, '0'),
(94, 0, 0, '0'),
(96, 0, 0, '0'),
(97, 0, 0, '0'),
(98, 0, 0, '0'),
(99, 0, 0, '0'),
(100, 0, 0, '0'),
(101, 0, 0, '0'),
(102, 0, 0, '0'),
(103, 0, 0, '0'),
(104, 0, 0, '0'),
(105, 0, 0, '0'),
(106, 0, 0, '0'),
(107, 0, 0, '0'),
(108, 0, 0, '0'),
(109, 0, 0, '0'),
(110, 0, 0, '0'),
(111, 0, 0, '0'),
(112, 0, 0, '0'),
(113, 0, 0, '0'),
(114, 0, 0, '0'),
(115, 0, 0, '0'),
(116, 0, 0, '0'),
(117, 0, 0, '0'),
(118, 0, 0, '0'),
(119, 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `house_lists`
--

CREATE TABLE `house_lists` (
  `house_id` int(11) NOT NULL,
  `listid` int(11) NOT NULL,
  `list` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_accounts`
--

CREATE TABLE `nicaw_accounts` (
  `account_id` int(10) UNSIGNED NOT NULL,
  `rlname` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `comment` tinytext DEFAULT NULL,
  `recovery_key` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nicaw_accounts`
--

INSERT INTO `nicaw_accounts` (`account_id`, `rlname`, `location`, `comment`, `recovery_key`) VALUES
(634677, NULL, NULL, NULL, NULL),
(811840, NULL, NULL, NULL, NULL),
(900585, NULL, NULL, NULL, NULL),
(2081477, NULL, NULL, NULL, NULL),
(2456329, NULL, NULL, NULL, NULL),
(4665019, '', '', '', ''),
(5644111, NULL, NULL, NULL, NULL),
(5830563, NULL, NULL, NULL, NULL),
(7526527, '', '', '', ''),
(8548596, NULL, NULL, NULL, NULL),
(8631209, NULL, NULL, NULL, NULL),
(9099028, NULL, NULL, NULL, NULL),
(9297774, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_account_logs`
--

CREATE TABLE `nicaw_account_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `ip` int(11) DEFAULT NULL,
  `date` int(11) NOT NULL,
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nicaw_account_logs`
--

INSERT INTO `nicaw_account_logs` (`id`, `account_id`, `ip`, `date`, `action`) VALUES
(1, 8548596, 2130706433, 1309701004, 'Created'),
(2, 8548596, 2130706433, 1309701022, 'Created character: Lutzenek'),
(3, 9297774, NULL, 1744803265, 'Created'),
(4, 9297774, NULL, 1744803993, 'Created character: Tutor'),
(5, 9297774, NULL, 1744804103, 'Deleted character Tutor'),
(6, 9297774, NULL, 1744804108, 'Created character: Tutor'),
(7, 9297774, NULL, 1744804236, 'yavl1002201@gmail.com changed to alejandro25fp@gmail.com'),
(8, 9297774, NULL, 1744804371, 'Created guild: Sattanish'),
(9, 9297774, NULL, 1744804966, 'Deleted character Prueba Brolly'),
(10, 9297774, NULL, 1744804990, 'Deleted character Prueba Brolly'),
(11, 9297774, NULL, 1744805013, 'Created character: Prueba Brolly'),
(12, 9297774, NULL, 1744805593, 'Deleted character Prueba Brolly'),
(13, 7526527, NULL, 1744833635, 'Created'),
(14, 4665019, NULL, 1744834206, 'Created'),
(15, 2456329, NULL, 1744834347, 'Created'),
(16, 5644111, NULL, 1744834727, 'Created'),
(17, 811840, NULL, 1744837552, 'Created'),
(18, 5830563, NULL, 1744838812, 'Created'),
(19, 5830563, NULL, 1744838910, 'Deleted character Pruebaxd'),
(20, 9099028, NULL, 1744838959, 'Created'),
(21, 9099028, NULL, 1744838986, 'Created character: Goku test'),
(22, 9099028, NULL, 1744839805, 'Deleted character Goku test'),
(23, 9099028, NULL, 1744839849, 'Created character: Pruebaxd'),
(24, 900585, NULL, 1744853729, 'Created'),
(25, 9099028, NULL, 1744854735, 'Created guild: Sattanish'),
(26, 9099028, NULL, 1744855912, 'Created character: Pruebaxdd'),
(27, 9099028, NULL, 1744855920, 'Created character: Pruebaxddd'),
(28, 9099028, NULL, 1744855929, 'Created character: Pruebaxdddd'),
(29, 9099028, NULL, 1744855978, 'Created character: Redsas'),
(30, 9099028, NULL, 1744856016, 'Deleted character Redsas'),
(31, 2081477, NULL, 1744938804, 'Created'),
(32, 2081477, NULL, 1744938824, 'Created character: Prueba Brolly'),
(33, 2081477, NULL, 1744938853, 'Created character: Goten Test'),
(34, 8631209, NULL, 1744948528, 'Created'),
(35, 634677, NULL, 1744969731, 'Created character: Tutor Deos'),
(36, 6346772, NULL, 1745003826, 'Created character: Prueba');

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_guild_info`
--

CREATE TABLE `nicaw_guild_info` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'guild id',
  `description` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nicaw_guild_info`
--

INSERT INTO `nicaw_guild_info` (`id`, `description`) VALUES
(2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_guild_invites`
--

CREATE TABLE `nicaw_guild_invites` (
  `gid` int(10) UNSIGNED NOT NULL COMMENT 'guild id',
  `pid` int(10) UNSIGNED NOT NULL COMMENT 'player id',
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_news`
--

CREATE TABLE `nicaw_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `creator` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` text NOT NULL,
  `html` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `nicaw_news`
--

INSERT INTO `nicaw_news` (`id`, `title`, `creator`, `date`, `text`, `html`) VALUES
(1, 'Dbkop Beta', 'Tulio', '2025-04-16 12:20:55', 'Estamos trabalhando rapidamente para colocar a melhor versão do DBKOP em produção.', 0),
(2, 'Domingo, 27 de abril, dia de Eventos', 'Group to Staff', '2025-04-17 15:51:53', 'Domingo, 27 de abril, dia de Eventos, PVP 2X2, Esconde-esconde, Entre outros', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_polls`
--

CREATE TABLE `nicaw_polls` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `startdate` int(10) UNSIGNED NOT NULL,
  `enddate` int(10) UNSIGNED NOT NULL,
  `minlevel` int(10) UNSIGNED NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_poll_options`
--

CREATE TABLE `nicaw_poll_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `poll_id` int(10) UNSIGNED NOT NULL,
  `option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nicaw_poll_votes`
--

CREATE TABLE `nicaw_poll_votes` (
  `option_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `ip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `paypal_order_id` varchar(64) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paypal_payments`
--

INSERT INTO `paypal_payments` (`id`, `account_id`, `package_id`, `paypal_order_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 634677, 5, '80462848D6403473J', 'pending', '2025-04-18 08:02:50', '2025-04-18 01:02:50'),
(6, 634677, 1, '6WG82044602298947', '', '2025-04-18 09:20:17', '2025-04-18 02:20:17'),
(7, 634677, 1, '8XH18357M63172915', '', '2025-04-18 09:20:38', '2025-04-18 02:20:38'),
(8, 634677, 5, '05448043W20743749', '', '2025-04-18 09:22:44', '2025-04-18 02:22:44'),
(9, 634677, 1, '5X837692P3196444E', '', '2025-04-18 09:25:16', '2025-04-18 02:25:16'),
(10, 634677, 5, '7GF928313S049060L', '', '2025-04-18 09:27:27', '2025-04-18 02:27:27'),
(11, 634677, 5, '7T966827N5123074A', '', '2025-04-18 09:28:17', '2025-04-18 02:28:17'),
(12, 634677, 5, '5UJ0486926194105X', 'completed', '2025-04-18 09:29:23', '2025-04-18 02:29:23'),
(13, 634677, 1, '0DU884275T4927221', 'completed', '2025-04-18 09:30:23', '2025-04-18 02:30:23'),
(14, 634677, 5, '5JP4846413402904K', 'completed', '2025-04-18 09:31:41', '2025-04-18 02:31:41'),
(15, 634677, 4, '4PD40046YH386631F', 'completed', '2025-04-18 09:32:55', '2025-04-18 02:32:55'),
(16, 634677, 4, '39E766594M709234P', 'completed', '2025-04-18 09:33:38', '2025-04-18 02:33:38'),
(17, 634677, 1, '2MK11028EF906861S', 'completed', '2025-04-18 10:09:36', '2025-04-18 03:09:36'),
(18, 634677, 1, '8DY54906EY421932V', 'completed', '2025-04-18 10:09:56', '2025-04-18 03:09:56'),
(19, 634677, 5, '776249385B816925G', 'completed', '2025-04-18 12:22:48', '2025-04-18 05:22:48'),
(20, 634677, 5, '4HW511003N868162D', 'completed', '2025-04-18 12:29:03', '2025-04-18 05:29:03'),
(21, 634677, 5, '39W87216WJ9042923', 'completed', '2025-04-18 13:04:13', '2025-04-18 06:04:13'),
(22, 634677, 5, '1LN85287K4531192E', 'completed', '2025-04-18 20:45:46', '2025-04-18 13:45:46'),
(23, 6346772, 5, '09X18576BE4787600', 'completed', '2025-04-18 21:23:49', '2025-04-18 14:23:49'),
(24, 6346772, 5, '7SN59872H71716410', 'completed', '2025-04-18 21:27:44', '2025-04-18 14:27:44'),
(25, 6346772, 5, '5SU30291X8162960P', 'completed', '2025-04-18 21:31:50', '2025-04-18 14:31:50'),
(26, 6346772, 5, '9J351708BE462824P', 'completed', '2025-04-18 21:38:33', '2025-04-18 14:38:33'),
(27, 6346772, 5, '5HA26602HM4539536', 'completed', '2025-04-18 21:39:12', '2025-04-18 14:39:12'),
(28, 6346772, 5, '8085227567132410T', 'completed', '2025-04-18 21:40:47', '2025-04-18 14:40:47'),
(29, 6346772, 5, '06P78384NV2070620', 'completed', '2025-04-18 22:01:35', '2025-04-18 15:01:35'),
(30, 6346772, 5, '6AR832982L5909512', 'completed', '2025-04-18 22:05:06', '2025-04-18 15:05:06'),
(31, 6346772, 5, '4M916309GC481172C', 'completed', '2025-04-18 22:06:57', '2025-04-18 15:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `account_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL COMMENT 'users group',
  `access` int(10) NOT NULL DEFAULT 0,
  `sex` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `vocation` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `experience` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `level` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `maglevel` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `health` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `healthmax` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `mana` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `manamax` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `manaspent` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `soul` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `direction` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lookbody` int(10) UNSIGNED NOT NULL DEFAULT 136,
  `lookfeet` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `lookhead` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `looklegs` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `looktype` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `lookaddons` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `posx` int(11) NOT NULL DEFAULT 0,
  `posy` int(11) NOT NULL DEFAULT 0,
  `posz` int(11) NOT NULL DEFAULT 0,
  `cap` int(11) NOT NULL DEFAULT 0,
  `lastlogin` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lastip` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `save` tinyint(1) NOT NULL DEFAULT 1,
  `conditions` blob NOT NULL COMMENT 'drunk, poisoned etc (maybe also food and redskull)',
  `redskulltime` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `redskull` tinyint(1) NOT NULL DEFAULT 0,
  `guildnick` varchar(255) NOT NULL DEFAULT '' COMMENT 'additional nick in guild - mostly for web interfaces i think',
  `rank_id` int(11) NOT NULL COMMENT 'by this field everything with guilds is done - player has a rank which belongs to certain guild',
  `town_id` int(11) NOT NULL COMMENT 'old masterpos, temple spawn point position'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `account_id`, `group_id`, `access`, `sex`, `vocation`, `experience`, `level`, `maglevel`, `health`, `healthmax`, `mana`, `manamax`, `manaspent`, `soul`, `direction`, `lookbody`, `lookfeet`, `lookhead`, `looklegs`, `looktype`, `lookaddons`, `posx`, `posy`, `posz`, `cap`, `lastlogin`, `lastip`, `save`, `conditions`, `redskulltime`, `redskull`, `guildnick`, `rank_id`, `town_id`) VALUES
(1, 'Night', 1234567, 0, 9999, 1, 333, 162000001, 1, 0, 7740, 7740, 14160, 14160, 0, 100, 0, 136, 10, 10, 10, 334, 0, 99, 187, 7, 400, 1311590679, 16777343, 1, 0x010001000002000000000398921b0010d7000000110b00000012d007000013adc20200fe, 0, 0, '', 0, 1),
(3, 'Tutor', 9297774, 0, 0, 1, 1, 0, 20, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 69, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 3, 1),
(9, 'Pruebaxd', 9099028, 0, 0, 1, 1, 0, 20, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 69, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 4, 1),
(10, 'Pruebaxdd', 9099028, 0, 0, 1, 1, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 69, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(11, 'Pruebaxddd', 9099028, 0, 0, 1, 12, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 84, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(12, 'Pruebaxdddd', 9099028, 0, 0, 1, 1, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 69, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(13, 'Pruebaxddddd', 9099028, 0, 0, 1, 100, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 60, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(15, 'Prueba Brolly', 2081477, 0, 0, 1, 1, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 69, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(16, 'Goten Test', 2081477, 0, 0, 1, 76, 0, 1, 0, 250, 250, 250, 250, 0, 0, 0, 136, 10, 10, 10, 250, 0, 306, 46, 5, 500, 0, 0, 1, '', 0, 0, '', 0, 1),
(17, 'Tutor Deos', 6346772, 0, 9999, 1, 1, 3000002, 58, 0, 17955, 3955, 16245, 2245, 0, 0, 2, 136, 10, 10, 10, 69, 0, 113, 184, 7, 0, 1745008304, 16777343, 1, '', 0, 0, '', 0, 1),
(18, 'Prueba', 6346772, 0, 0, 1, 1, 3000001, 58, 0, 3955, 3955, 2245, 2245, 0, 0, 2, 136, 10, 10, 10, 69, 0, 113, 184, 7, 3350, 1745007340, 16777343, 1, '', 0, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `player_depotitems`
--

CREATE TABLE `player_depotitems` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `depotid` int(11) NOT NULL DEFAULT 0,
  `sid` int(11) NOT NULL COMMENT 'any given range eg 0-100 will be reserved for depot lockers and all > 100 will be then normal items inside depots',
  `pid` int(11) NOT NULL DEFAULT 0,
  `itemtype` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `attributes` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `player_depotitems`
--

INSERT INTO `player_depotitems` (`id`, `player_id`, `depotid`, `sid`, `pid`, `itemtype`, `count`, `attributes`) VALUES
(444, 18, 0, 104, 102, 5892, 1, ''),
(443, 18, 0, 103, 102, 2673, 1, ''),
(466, 17, 0, 102, 101, 2594, 1, ''),
(465, 17, 0, 101, 0, 2589, 1, ''),
(442, 18, 0, 102, 101, 2594, 1, ''),
(441, 18, 0, 101, 0, 2589, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `player_items`
--

CREATE TABLE `player_items` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `itemtype` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `attributes` blob DEFAULT NULL COMMENT 'replaces unique_id, action_id, text, special_desc'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `player_items`
--

INSERT INTO `player_items` (`id`, `player_id`, `sid`, `pid`, `itemtype`, `count`, `attributes`) VALUES
(1, 1, 129, 102, 2549, 1, ''),
(2, 1, 128, 102, 2549, 1, ''),
(3, 1, 127, 102, 2549, 1, ''),
(4, 1, 126, 102, 2450, 1, ''),
(5, 1, 125, 102, 2450, 1, ''),
(6, 1, 124, 102, 2450, 1, ''),
(7, 1, 123, 102, 2450, 1, ''),
(8, 1, 122, 102, 2450, 1, ''),
(9, 1, 121, 102, 4852, 1, ''),
(10, 1, 120, 102, 4852, 1, ''),
(11, 1, 119, 101, 2296, 1, 0x0c01),
(12, 1, 118, 101, 2316, 1, 0x0c01),
(13, 1, 117, 101, 2310, 1, 0x0c01),
(14, 1, 116, 101, 2266, 1, 0x0c01),
(15, 1, 113, 101, 2314, 1, 0x0c01),
(16, 1, 114, 101, 2267, 1, 0x0c01),
(17, 1, 115, 101, 2308, 1, 0x0c01),
(18, 1, 112, 101, 2309, 1, 0x0c01),
(19, 1, 111, 101, 2269, 1, 0x0c01),
(20, 1, 110, 101, 2312, 1, 0x0c01),
(21, 1, 109, 101, 2287, 1, 0x0c01),
(22, 1, 108, 101, 2315, 1, 0x0c01),
(23, 1, 107, 10, 2450, 1, ''),
(24, 1, 106, 8, 2640, 1, ''),
(25, 1, 105, 7, 2521, 1, ''),
(26, 1, 104, 6, 2450, 1, ''),
(27, 1, 103, 5, 3956, 98, ''),
(28, 1, 102, 3, 1996, 1, ''),
(29, 1, 101, 2, 2003, 1, ''),
(30, 3, 101, 2, 2003, 0, NULL),
(31, 9, 101, 2, 2003, 0, NULL),
(32, 10, 101, 2, 2003, 0, NULL),
(33, 11, 101, 2, 2003, 0, NULL),
(34, 12, 101, 2, 2003, 0, NULL),
(35, 15, 101, 2, 2003, 0, NULL),
(36, 16, 101, 10, 2050, 0, NULL),
(1854, 18, 119, 101, 2313, 1, 0x0c01),
(1853, 18, 118, 101, 2307, 1, 0x0c01),
(2074, 17, 120, 102, 2313, 1, 0x0c01),
(2073, 17, 119, 102, 2307, 1, 0x0c01),
(2072, 17, 118, 102, 2300, 1, 0x0c01),
(2071, 17, 117, 102, 2304, 1, 0x0c01),
(2070, 17, 116, 102, 2308, 1, 0x0c01),
(2069, 17, 115, 102, 2286, 1, 0x0c01),
(2068, 17, 114, 102, 2305, 1, 0x0c01),
(2067, 17, 113, 102, 2309, 1, 0x0c01),
(2066, 17, 112, 102, 2269, 1, 0x0c01),
(2065, 17, 111, 102, 2312, 1, 0x0c01),
(2064, 17, 110, 102, 2287, 1, 0x0c01),
(2063, 17, 109, 102, 2315, 1, 0x0c01),
(2062, 17, 108, 10, 2547, 1, ''),
(2061, 17, 107, 8, 7457, 1, ''),
(2060, 17, 106, 7, 2504, 1, ''),
(2059, 17, 105, 6, 2455, 1, ''),
(2058, 17, 104, 5, 2673, 1, ''),
(2057, 17, 103, 4, 2472, 1, ''),
(2056, 17, 102, 2, 2003, 1, ''),
(2055, 17, 101, 1, 7454, 1, ''),
(1852, 18, 117, 101, 2300, 1, 0x0c01),
(1851, 18, 116, 101, 2304, 1, 0x0c01),
(1850, 18, 115, 101, 2308, 1, 0x0c01),
(1849, 18, 114, 101, 2286, 1, 0x0c01),
(1848, 18, 113, 101, 2305, 1, 0x0c01),
(1847, 18, 112, 101, 2309, 1, 0x0c01),
(1846, 18, 111, 101, 2269, 1, 0x0c01),
(1845, 18, 110, 101, 2312, 1, 0x0c01),
(1844, 18, 109, 101, 2287, 1, 0x0c01),
(1843, 18, 108, 101, 2315, 1, 0x0c01),
(1842, 18, 107, 10, 3956, 1, ''),
(1841, 18, 106, 8, 5806, 1, ''),
(1840, 18, 105, 7, 5809, 1, ''),
(1839, 18, 104, 6, 2455, 1, ''),
(1838, 18, 103, 5, 2547, 1, ''),
(1837, 18, 102, 4, 5805, 1, ''),
(1836, 18, 101, 2, 2003, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `player_skills`
--

CREATE TABLE `player_skills` (
  `player_id` int(11) NOT NULL,
  `skillid` int(10) UNSIGNED NOT NULL,
  `value` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `player_skills`
--

INSERT INTO `player_skills` (`player_id`, `skillid`, `value`, `count`) VALUES
(1, 0, 1, 0),
(1, 1, 1, 0),
(1, 2, 1, 0),
(1, 3, 1, 0),
(1, 4, 1, 0),
(1, 5, 1, 0),
(1, 6, 1, 0),
(3, 6, 1, 0),
(3, 5, 1, 0),
(3, 4, 1, 0),
(3, 3, 1, 0),
(3, 2, 1, 0),
(3, 1, 1, 0),
(3, 0, 1, 0),
(9, 6, 1, 0),
(9, 5, 1, 0),
(9, 4, 1, 0),
(9, 3, 1, 0),
(9, 2, 1, 0),
(9, 1, 1, 0),
(9, 0, 1, 0),
(10, 0, 1, 0),
(10, 1, 1, 0),
(10, 2, 1, 0),
(10, 3, 1, 0),
(10, 4, 1, 0),
(10, 5, 1, 0),
(10, 6, 1, 0),
(11, 0, 1, 0),
(11, 1, 1, 0),
(11, 2, 1, 0),
(11, 3, 1, 0),
(11, 4, 1, 0),
(11, 5, 1, 0),
(11, 6, 1, 0),
(12, 0, 1, 0),
(12, 1, 1, 0),
(12, 2, 1, 0),
(12, 3, 1, 0),
(12, 4, 1, 0),
(12, 5, 1, 0),
(12, 6, 1, 0),
(15, 6, 1, 0),
(15, 5, 1, 0),
(15, 4, 1, 0),
(15, 3, 1, 0),
(15, 2, 1, 0),
(15, 1, 1, 0),
(15, 0, 1, 0),
(16, 0, 1, 0),
(16, 1, 1, 0),
(16, 2, 1, 0),
(16, 3, 1, 0),
(16, 4, 1, 0),
(16, 5, 1, 0),
(16, 6, 1, 0),
(17, 0, 1, 0),
(17, 1, 1, 0),
(17, 2, 1, 0),
(17, 3, 1, 0),
(17, 4, 1, 0),
(17, 5, 1, 0),
(17, 6, 1, 0),
(18, 0, 1, 0),
(18, 1, 1, 0),
(18, 2, 1, 0),
(18, 3, 1, 0),
(18, 4, 1, 0),
(18, 5, 1, 0),
(18, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `player_spells`
--

CREATE TABLE `player_spells` (
  `player_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `player_storage`
--

CREATE TABLE `player_storage` (
  `player_id` int(11) NOT NULL,
  `key` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `player_storage`
--

INSERT INTO `player_storage` (`player_id`, `key`, `value`) VALUES
(1, 20010, 3),
(1, 6628, 1),
(17, 20010, 3),
(17, 7104, 1),
(17, 7103, 1),
(17, 7102, 1),
(17, 7101, 1),
(17, 6665, 1),
(17, 10, 1745008902),
(18, 20010, 3),
(18, 7104, 1),
(18, 7103, 1),
(18, 7102, 1),
(18, 7101, 1),
(18, 6665, 1),
(18, 10, 1745003860);

-- --------------------------------------------------------

--
-- Table structure for table `player_viplist`
--

CREATE TABLE `player_viplist` (
  `player_id` int(11) NOT NULL COMMENT 'id of player whose viplist entry it is',
  `vip_id` int(11) NOT NULL COMMENT 'id of target player of viplist entry'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points_packages`
--

CREATE TABLE `points_packages` (
  `id_package` int(11) NOT NULL,
  `quality_points` int(4) NOT NULL,
  `price_package` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `points_packages`
--

INSERT INTO `points_packages` (`id_package`, `quality_points`, `price_package`) VALUES
(1, 100, 5),
(4, 200, 9),
(5, 300, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tiles`
--

CREATE TABLE `tiles` (
  `id` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tiles`
--

INSERT INTO `tiles` (`id`, `x`, `y`, `z`) VALUES
(19, 70, 182, 7),
(140, 76, 182, 7),
(259, 78, 174, 7),
(419, 54, 196, 6),
(436, 60, 196, 6),
(439, 54, 198, 6),
(456, 60, 198, 6),
(470, 124, 441, 15),
(479, 57, 178, 6),
(514, 72, 104, 7),
(516, 96, 422, 15),
(530, 64, 179, 6),
(543, 88, 113, 7),
(555, 113, 118, 7),
(574, 115, 95, 7),
(617, 93, 164, 7),
(640, 93, 160, 7),
(658, 93, 156, 7),
(675, 93, 152, 7),
(684, 96, 152, 7),
(711, 93, 164, 6),
(726, 93, 160, 6),
(741, 93, 156, 6),
(756, 93, 152, 6),
(758, 101, 158, 6),
(775, 101, 163, 6),
(805, 93, 164, 5),
(820, 93, 160, 5),
(835, 93, 156, 5),
(850, 93, 152, 5),
(852, 101, 163, 5),
(874, 101, 158, 5),
(904, 93, 164, 4),
(919, 93, 160, 4),
(934, 93, 156, 4),
(949, 93, 152, 4),
(951, 101, 163, 4),
(972, 101, 158, 4),
(1013, 438, 629, 6),
(1015, 117, 416, 15),
(1027, 442, 629, 6),
(1030, 439, 642, 6),
(1044, 444, 642, 6),
(1069, 484, 626, 6),
(1106, 333, 912, 7),
(1154, 351, 905, 7),
(1155, 347, 908, 7),
(1168, 361, 903, 7),
(1185, 357, 893, 7),
(1204, 347, 893, 7),
(1223, 369, 925, 7),
(1245, 369, 933, 7),
(1289, 381, 928, 7),
(1302, 381, 935, 7),
(1357, 357, 945, 7),
(1396, 78, 169, 7),
(1409, 91, 130, 7),
(1425, 86, 135, 6),
(1484, 95, 135, 6),
(1590, 91, 140, 7),
(1620, 73, 179, 6),
(1666, 78, 174, 6),
(1704, 78, 169, 6),
(1724, 81, 163, 6),
(1744, 85, 163, 6),
(1753, 54, 187, 6),
(1805, 51, 183, 7),
(1831, 115, 150, 7),
(1847, 115, 153, 7),
(1875, 73, 113, 7),
(1940, 73, 110, 7),
(1981, 101, 84, 7),
(2038, 100, 77, 7),
(2049, 99, 80, 6),
(2090, 93, 83, 6),
(2133, 98, 73, 6),
(2137, 99, 73, 6),
(2159, 99, 77, 6),
(2215, 107, 92, 7),
(2257, 93, 84, 7),
(2259, 60, 187, 6),
(2363, 62, 189, 5),
(2447, 62, 198, 5),
(2484, 83, 188, 7),
(2489, 84, 176, 7),
(2498, 89, 176, 7),
(2509, 85, 169, 7),
(2522, 90, 169, 7),
(2535, 98, 169, 7),
(2567, 84, 178, 6),
(2620, 101, 137, 7),
(2635, 101, 132, 7),
(2645, 101, 127, 7),
(2649, 111, 127, 7),
(2663, 111, 132, 7),
(2743, 100, 136, 6),
(2744, 111, 137, 7),
(2782, 51, 185, 6),
(2822, 55, 113, 7),
(2846, 43, 114, 7),
(2873, 43, 116, 7),
(2919, 55, 119, 7),
(2951, 44, 114, 6),
(2973, 44, 116, 6),
(3006, 51, 116, 6),
(3048, 51, 114, 6),
(3068, 44, 116, 5),
(3108, 44, 114, 5),
(3150, 55, 113, 5),
(3174, 55, 118, 5),
(3204, 47, 119, 4),
(3266, 47, 114, 4),
(3295, 55, 119, 4),
(3312, 94, 197, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tile_items`
--

CREATE TABLE `tile_items` (
  `tile_id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0,
  `itemtype` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `attributes` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tile_items`
--

INSERT INTO `tile_items` (`tile_id`, `sid`, `pid`, `itemtype`, `count`, `attributes`) VALUES
(19, 1, 0, 1252, 1, ''),
(140, 1, 0, 1252, 1, ''),
(259, 1, 0, 1250, 1, ''),
(419, 1, 0, 1252, 1, ''),
(436, 1, 0, 1252, 1, ''),
(439, 1, 0, 1252, 1, ''),
(456, 1, 0, 1252, 1, ''),
(470, 1, 0, 1252, 1, ''),
(479, 1, 0, 1250, 1, ''),
(514, 1, 0, 1252, 1, ''),
(516, 1, 0, 1250, 1, ''),
(530, 1, 0, 1252, 1, ''),
(543, 1, 0, 1252, 1, ''),
(555, 1, 0, 1250, 1, ''),
(574, 1, 0, 1253, 1, ''),
(617, 1, 0, 1250, 1, ''),
(640, 1, 0, 1250, 1, ''),
(658, 1, 0, 1250, 1, ''),
(675, 1, 0, 1250, 1, ''),
(684, 1, 0, 1250, 1, ''),
(711, 1, 0, 1250, 1, ''),
(726, 1, 0, 1250, 1, ''),
(741, 1, 0, 1250, 1, ''),
(756, 1, 0, 1250, 1, ''),
(758, 1, 0, 1250, 1, ''),
(775, 1, 0, 1250, 1, ''),
(805, 1, 0, 1250, 1, ''),
(820, 1, 0, 1250, 1, ''),
(835, 1, 0, 1250, 1, ''),
(850, 1, 0, 1250, 1, ''),
(852, 1, 0, 1250, 1, ''),
(874, 1, 0, 1250, 1, ''),
(904, 1, 0, 1250, 1, ''),
(919, 1, 0, 1250, 1, ''),
(934, 1, 0, 1250, 1, ''),
(949, 1, 0, 1250, 1, ''),
(951, 1, 0, 1250, 1, ''),
(972, 1, 0, 1250, 1, ''),
(1013, 1, 0, 3536, 1, ''),
(1015, 1, 0, 1251, 1, ''),
(1027, 1, 0, 3536, 1, ''),
(1030, 1, 0, 3536, 1, ''),
(1044, 1, 0, 3536, 1, ''),
(1069, 1, 0, 3536, 1, ''),
(1106, 1, 0, 1250, 1, ''),
(1154, 1, 0, 1250, 1, ''),
(1155, 1, 0, 1253, 1, ''),
(1168, 1, 0, 1250, 1, ''),
(1185, 1, 0, 1253, 1, ''),
(1204, 1, 0, 1253, 1, ''),
(1223, 1, 0, 1250, 1, ''),
(1245, 1, 0, 1250, 1, ''),
(1289, 1, 0, 1252, 1, ''),
(1302, 1, 0, 1252, 1, ''),
(1357, 1, 0, 1253, 1, ''),
(1396, 1, 0, 1250, 1, ''),
(1409, 1, 0, 1252, 1, ''),
(1425, 1, 0, 1252, 1, ''),
(1484, 1, 0, 1252, 1, ''),
(1590, 1, 0, 1252, 1, ''),
(1620, 1, 0, 1253, 1, ''),
(1666, 1, 0, 1249, 1, ''),
(1704, 1, 0, 1249, 1, ''),
(1724, 1, 0, 1253, 1, ''),
(1744, 1, 0, 1253, 1, ''),
(1753, 1, 0, 1252, 1, ''),
(1805, 1, 0, 1250, 1, ''),
(1831, 1, 0, 1252, 1, ''),
(1847, 1, 0, 1252, 1, ''),
(1875, 1, 0, 1252, 1, ''),
(1940, 1, 0, 1252, 1, ''),
(1981, 1, 0, 1252, 1, ''),
(2038, 1, 0, 1252, 1, ''),
(2049, 1, 0, 1252, 1, ''),
(2090, 1, 0, 1250, 1, ''),
(2133, 1, 0, 1252, 1, ''),
(2137, 1, 0, 1252, 1, ''),
(2159, 1, 0, 1252, 1, ''),
(2215, 1, 0, 1252, 1, ''),
(2257, 1, 0, 1250, 1, ''),
(2259, 1, 0, 1252, 1, ''),
(2363, 1, 0, 1249, 1, ''),
(2447, 1, 0, 1249, 1, ''),
(2484, 1, 0, 1252, 1, ''),
(2489, 1, 0, 1252, 1, ''),
(2498, 1, 0, 1252, 1, ''),
(2509, 1, 0, 1252, 1, ''),
(2522, 1, 0, 1252, 1, ''),
(2535, 1, 0, 1252, 1, ''),
(2567, 1, 0, 1249, 1, ''),
(2620, 1, 0, 1250, 1, ''),
(2635, 1, 0, 1250, 1, ''),
(2645, 1, 0, 1250, 1, ''),
(2649, 1, 0, 1250, 1, ''),
(2663, 1, 0, 1250, 1, ''),
(2743, 1, 0, 1252, 1, ''),
(2744, 1, 0, 1250, 1, ''),
(2782, 1, 0, 1250, 1, ''),
(2822, 1, 0, 1250, 1, ''),
(2846, 1, 0, 1252, 1, ''),
(2873, 1, 0, 1252, 1, ''),
(2919, 1, 0, 1250, 1, ''),
(2951, 1, 0, 1252, 1, ''),
(2973, 1, 0, 1252, 1, ''),
(3006, 1, 0, 1252, 1, ''),
(3048, 1, 0, 1252, 1, ''),
(3068, 1, 0, 1253, 1, ''),
(3108, 1, 0, 1253, 1, ''),
(3150, 1, 0, 1250, 1, ''),
(3174, 1, 0, 1250, 1, ''),
(3204, 1, 0, 1250, 1, ''),
(3266, 1, 0, 1250, 1, ''),
(3295, 1, 0, 1250, 1, ''),
(3312, 1, 0, 1252, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `z_ots_comunication`
--

CREATE TABLE `z_ots_comunication` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `param1` varchar(255) NOT NULL,
  `param2` varchar(255) NOT NULL,
  `param3` varchar(255) NOT NULL,
  `param4` varchar(255) NOT NULL,
  `param5` varchar(255) NOT NULL,
  `param6` varchar(255) NOT NULL,
  `param7` varchar(255) NOT NULL,
  `delete_it` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_shop_history_item`
--

CREATE TABLE `z_shop_history_item` (
  `id` int(11) NOT NULL,
  `to_name` varchar(255) NOT NULL DEFAULT '0',
  `to_account` int(11) NOT NULL DEFAULT 0,
  `from_nick` varchar(255) NOT NULL,
  `from_account` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `offer_id` int(11) NOT NULL DEFAULT 0,
  `trans_state` varchar(255) NOT NULL,
  `trans_start` int(11) NOT NULL DEFAULT 0,
  `trans_real` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_shop_history_item`
--

INSERT INTO `z_shop_history_item` (`id`, `to_name`, `to_account`, `from_nick`, `from_account`, `price`, `offer_id`, `trans_state`, `trans_start`, `trans_real`) VALUES
(8, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 1, 'realized', 1, 1),
(7, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 3, 'realized', 1, 1),
(6, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 2, 'realized', 1, 1),
(5, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 1, 'realized', 1, 1),
(9, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 2, 'realized', 1, 1),
(10, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 3, 'realized', 1, 1),
(11, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 1, 'realized', 1, 1),
(12, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 2, 'realized', 1, 1),
(13, 'Tutor Deos', 634677, 'Tutor Deos', 634677, 100, 3, 'realized', 1, 1),
(14, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(15, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(16, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(17, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(18, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(19, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(20, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(21, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(22, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(23, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(24, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(25, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(26, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(27, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(28, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(29, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(30, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(31, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(32, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(33, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(34, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(35, 'Prueba', 6346772, 'Prueba', 6346772, 100, 4, 'realized', 1, 1),
(36, 'Prueba', 6346772, 'Prueba', 6346772, 100, 1, 'realized', 1, 1),
(37, 'Prueba', 6346772, 'Prueba', 6346772, 100, 2, 'realized', 1, 1),
(38, 'Prueba', 6346772, 'Prueba', 6346772, 100, 3, 'realized', 1, 1),
(39, 'Prueba', 6346772, 'Prueba', 6346772, 100, 5, 'realized', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `z_shop_history_pacc`
--

CREATE TABLE `z_shop_history_pacc` (
  `id` int(11) NOT NULL,
  `to_name` varchar(255) NOT NULL DEFAULT '0',
  `to_account` int(11) NOT NULL DEFAULT 0,
  `from_nick` varchar(255) NOT NULL,
  `from_account` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `pacc_days` int(11) NOT NULL DEFAULT 0,
  `trans_state` varchar(255) NOT NULL,
  `trans_start` int(11) NOT NULL DEFAULT 0,
  `trans_real` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_shop_offer`
--

CREATE TABLE `z_shop_offer` (
  `id` int(11) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `itemid1` int(11) NOT NULL DEFAULT 0,
  `count1` int(11) NOT NULL DEFAULT 0,
  `itemid2` int(11) NOT NULL DEFAULT 0,
  `count2` int(11) NOT NULL DEFAULT 0,
  `offer_type` varchar(255) DEFAULT NULL,
  `offer_description` text NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD KEY `accno` (`id`);

--
-- Indexes for table `dbkop_shop`
--
ALTER TABLE `dbkop_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guilds`
--
ALTER TABLE `guilds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guild_ranks`
--
ALTER TABLE `guild_ranks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guild_id` (`guild_id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house_lists`
--
ALTER TABLE `house_lists`
  ADD KEY `house_id` (`house_id`);

--
-- Indexes for table `nicaw_accounts`
--
ALTER TABLE `nicaw_accounts`
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `nicaw_account_logs`
--
ALTER TABLE `nicaw_account_logs`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `nicaw_guild_info`
--
ALTER TABLE `nicaw_guild_info`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nicaw_news`
--
ALTER TABLE `nicaw_news`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nicaw_polls`
--
ALTER TABLE `nicaw_polls`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `nicaw_poll_options`
--
ALTER TABLE `nicaw_poll_options`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `player_depotitems`
--
ALTER TABLE `player_depotitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`,`depotid`);

--
-- Indexes for table `player_items`
--
ALTER TABLE `player_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_skills`
--
ALTER TABLE `player_skills`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_spells`
--
ALTER TABLE `player_spells`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_storage`
--
ALTER TABLE `player_storage`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_viplist`
--
ALTER TABLE `player_viplist`
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `points_packages`
--
ALTER TABLE `points_packages`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `tiles`
--
ALTER TABLE `tiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tile_items`
--
ALTER TABLE `tile_items`
  ADD KEY `tile_id` (`tile_id`);

--
-- Indexes for table `z_ots_comunication`
--
ALTER TABLE `z_ots_comunication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_shop_history_item`
--
ALTER TABLE `z_shop_history_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_shop_history_pacc`
--
ALTER TABLE `z_shop_history_pacc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_shop_offer`
--
ALTER TABLE `z_shop_offer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbkop_shop`
--
ALTER TABLE `dbkop_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guilds`
--
ALTER TABLE `guilds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guild_ranks`
--
ALTER TABLE `guild_ranks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `nicaw_account_logs`
--
ALTER TABLE `nicaw_account_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nicaw_news`
--
ALTER TABLE `nicaw_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nicaw_polls`
--
ALTER TABLE `nicaw_polls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nicaw_poll_options`
--
ALTER TABLE `nicaw_poll_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `player_depotitems`
--
ALTER TABLE `player_depotitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=467;

--
-- AUTO_INCREMENT for table `player_items`
--
ALTER TABLE `player_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2075;

--
-- AUTO_INCREMENT for table `points_packages`
--
ALTER TABLE `points_packages`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tiles`
--
ALTER TABLE `tiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3313;

--
-- AUTO_INCREMENT for table `z_ots_comunication`
--
ALTER TABLE `z_ots_comunication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_shop_history_item`
--
ALTER TABLE `z_shop_history_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `z_shop_history_pacc`
--
ALTER TABLE `z_shop_history_pacc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_shop_offer`
--
ALTER TABLE `z_shop_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
