-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 26 jun 2019 om 11:41
-- Serverversie: 5.7.26-0ubuntu0.18.04.1
-- PHP-versie: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftrcarelab`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) NOT NULL,
  `content` text,
  `posted_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `answers`
--

INSERT INTO `answers` (`id`, `content`, `posted_by`, `created_at`, `updated_at`) VALUES
(1, 'Hallo,\r\nFacebook is een social media platform (soort van online adresboek) waar mensen alles kunnen delen wat zij doen.', 1, '2019-06-25 06:51:02', '2019-06-25 06:51:02'),
(2, 'Hallo, morgen avond om 19 uur is er weer bingo in het buurtcafe.', 4, '2019-06-25 06:54:12', '2019-06-25 06:54:12'),
(3, 'Nee is niet nodig', 4, '2019-06-25 10:29:32', '2019-06-25 10:29:32'),
(5, '27 graden', 5, '2019-06-26 05:33:04', '2019-06-26 05:33:04');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `blocked_users`
--

CREATE TABLE `blocked_users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `reason` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `blocked_users`
--

INSERT INTO `blocked_users` (`id`, `user_id`, `reason`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, '2019-06-25 10:30:32', '2019-06-25 10:30:32');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `hex` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `hex`, `created_at`, `updated_at`) VALUES
(1, 'Algemeen', '#ff8000', '2019-06-12 08:29:20', '2019-06-23 11:04:17'),
(2, 'Tuinieren', '#00ff00', '2019-06-14 11:07:01', '2019-06-23 11:12:58'),
(4, 'Musea', '#ffff00', '2019-06-23 11:12:13', '2019-06-23 11:12:13'),
(5, 'Spelletjes', '#80ffff', '2019-06-23 11:12:33', '2019-06-23 11:12:33'),
(6, 'Nieuws', '#0000ff', '2019-06-23 11:12:44', '2019-06-23 11:13:55'),
(7, 'Techniek', '#8000ff', '2019-06-25 06:44:25', '2019-06-25 06:44:25'),
(9, 'Sport', '#008080', '2019-06-26 05:36:05', '2019-06-26 05:36:05');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) NOT NULL,
  `content` text,
  `status` bigint(20) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `questions`
--

INSERT INTO `questions` (`id`, `content`, `status`, `created_at`, `updated_at`, `email`) VALUES
(1, 'Hoe warm word het vandaag?', 0, '2019-06-25 06:42:40', '2019-06-26 05:34:36', '521477@edu.rocmn.nl'),
(2, 'moet ik met het warme weer mijn planten extra water geven?', 0, '2019-06-25 06:43:27', '2019-06-25 10:29:45', '521477@edu.rocmn.nl'),
(3, 'het scherm van mijn mobielofoon is zwart en doet niks', 1, '2019-06-25 06:46:17', '2019-06-25 06:46:17', '521477@edu.rocmn.nl'),
(4, 'wanneer is er weer een bingo', 0, '2019-06-25 06:47:32', '2019-06-25 06:54:36', '521477@edu.rocmn.nl'),
(5, 'Waar kan ik mijn medicijnen het goedkoopst halen?', 1, '2019-06-25 06:48:35', '2019-06-25 06:48:35', '519759@edu.rocmn.nl'),
(6, 'Wat is het gezondst om te eten?', 1, '2019-06-25 06:48:58', '2019-06-25 06:48:58', '521477@edu.rocmn.nl'),
(7, 'wat is facebook', 0, '2019-06-25 06:49:39', '2019-06-25 06:51:13', '521477@edu.rocmn.nl'),
(8, 'Hoe warm word het vandaag?', 0, '2019-06-25 10:26:33', '2019-06-26 05:34:25', 'noreply@michel3951.com'),
(10, 'Welke dag is het vandaag', 1, '2019-06-26 05:31:54', '2019-06-26 05:31:54', 'noreply@michel3951.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `question_answers`
--

CREATE TABLE `question_answers` (
  `id` bigint(20) NOT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `answer_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `created_at`, `updated_at`, `answer_id`) VALUES
(1, 7, '2019-06-25 06:51:02', '2019-06-25 06:51:02', 1),
(2, 4, '2019-06-25 06:54:12', '2019-06-25 06:54:12', 2),
(3, 2, '2019-06-25 10:29:32', '2019-06-25 10:29:32', 3),
(5, 1, '2019-06-26 05:33:04', '2019-06-26 05:33:04', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `question_categories`
--

CREATE TABLE `question_categories` (
  `id` bigint(20) NOT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `question_categories`
--

INSERT INTO `question_categories` (`id`, `question_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-06-25 06:42:40', '2019-06-25 06:42:40'),
(2, 2, 2, '2019-06-25 06:43:27', '2019-06-25 06:43:27'),
(3, 3, 7, '2019-06-25 06:46:17', '2019-06-25 06:46:17'),
(4, 4, 5, '2019-06-25 06:47:32', '2019-06-25 06:47:32'),
(5, 5, 8, '2019-06-25 06:48:35', '2019-06-25 06:48:35'),
(6, 6, 8, '2019-06-25 06:48:58', '2019-06-25 06:48:58'),
(7, 7, 1, '2019-06-25 06:49:39', '2019-06-25 06:49:39'),
(8, 8, 1, '2019-06-25 10:26:33', '2019-06-25 10:26:33'),
(10, 10, 1, '2019-06-26 05:31:54', '2019-06-26 05:31:54');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `question_tags`
--

CREATE TABLE `question_tags` (
  `id` bigint(20) NOT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `question_tags`
--

INSERT INTO `question_tags` (`id`, `question_id`, `created_at`, `updated_at`, `tag_id`) VALUES
(1, 1, '2019-06-25 06:42:40', '2019-06-26 05:34:36', 3),
(2, 2, '2019-06-25 06:43:27', '2019-06-25 10:29:45', 3),
(3, 3, '2019-06-25 06:46:17', '2019-06-25 06:46:17', 1),
(4, 4, '2019-06-25 06:47:32', '2019-06-25 06:54:36', 3),
(5, 5, '2019-06-25 06:48:35', '2019-06-25 06:48:35', 1),
(6, 6, '2019-06-25 06:48:58', '2019-06-25 06:48:58', 1),
(7, 7, '2019-06-25 06:49:39', '2019-06-25 06:51:13', 3),
(8, 8, '2019-06-25 10:26:33', '2019-06-26 05:34:25', 2),
(10, 10, '2019-06-26 05:31:54', '2019-06-26 05:31:54', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'vrijwilliger', '2019-05-24 06:38:30', NULL),
(2, 'admin', '2019-05-24 08:10:49', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hex` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `hex`, `created_at`, `updated_at`) VALUES
(1, 'Open', '#2ECC71', '2019-05-24 06:39:15', '2019-05-24 06:39:15'),
(2, 'Gesloten', '#E74C3C', '2019-05-24 06:50:06', '2019-05-24 06:50:06'),
(3, 'Beantwoord', '#1ABC9C', '2019-05-24 06:52:56', '2019-05-24 06:52:56');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
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
  `role` bigint(11) DEFAULT '1',
  `verified` tinyint(1) DEFAULT '0',
  `photo` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `verified`, `photo`, `address`) VALUES
(1, 'Michel Bunschoten', 'noreply@michel3951.com', NULL, '$2y$10$CAUXi/Io8JZ0HM4P85jtPOA3DtE6AETqnsXm9l4LGtcLOQR5Viuxe', 'ybMRmUS5z93MwNpCqhweaFNwalnUon8HiIaBXfsEK2pgFucU2aYViKGV8gTv', '2019-05-23 09:42:47', '2019-05-23 09:42:47', 2, 1, NULL, NULL),
(3, 'ROC Student', '521640@edu.rocmn.nl', NULL, '$2y$10$5DHvG2Xn8jA6HtY74FDqTuOVbxirLYoffezX3Mzh/wIQwxTE/G5wi', NULL, '2019-06-23 17:04:53', '2019-06-25 10:30:18', 1, 1, NULL, NULL),
(4, 'Samuel', '519759@edu.rocmn.nl', NULL, '$2y$10$WZRV2hbD3taYeXctb5TdvObV6RFdpFKlXLlceLiwT..ZXYmXiVGIe', NULL, '2019-06-25 06:40:21', '2019-06-25 06:40:21', 1, 1, NULL, NULL),
(5, 'Floyd', '521477@edu.rocmn.nl', NULL, '$2y$10$EoyqSuMEcusDW.u5/8nLz.tXC9CfYHMTlhvqqP9HaxkWBedaQs2MW', NULL, '2019-06-25 06:41:13', '2019-06-25 06:41:13', 1, 1, NULL, NULL),
(6, 'Test', 'contact@michel3951.com', NULL, '$2y$10$Q8eYai3.HeWdyNxij/tCEe6kFCjtwZM.MA6ouGmzdVs6TNyxzB6/O', NULL, '2019-06-26 05:35:07', '2019-06-26 05:35:44', 1, 1, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer` (`question_id`),
  ADD KEY `fkanswer1` (`answer_id`);

--
-- Indexen voor tabel `question_categories`
--
ALTER TABLE `question_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `question_tags`
--
ALTER TABLE `question_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question` (`question_id`),
  ADD KEY `tag` (`tag_id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `blocked_users`
--
ALTER TABLE `blocked_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `question_categories`
--
ALTER TABLE `question_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `question_tags`
--
ALTER TABLE `question_tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `fkanswer1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
  ADD CONSTRAINT `fkquestion1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Beperkingen voor tabel `question_tags`
--
ALTER TABLE `question_tags`
  ADD CONSTRAINT `question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Beperkingen voor tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
