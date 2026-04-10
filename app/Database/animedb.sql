-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2026. Ápr 09. 11:30
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `animedb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `animes`
--

CREATE TABLE `animes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `original_title` varchar(191) DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `poster_image` varchar(255) DEFAULT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'TV',
  `status` varchar(50) NOT NULL DEFAULT 'Finished',
  `studio` varchar(100) DEFAULT NULL,
  `aired_from` date DEFAULT NULL,
  `aired_to` date DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `quality` varchar(20) NOT NULL DEFAULT 'HD',
  `episode_current` smallint(5) UNSIGNED DEFAULT NULL,
  `episode_total` smallint(5) UNSIGNED DEFAULT NULL,
  `views_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `comments_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `score` decimal(4,2) DEFAULT NULL,
  `score_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rating_avg` decimal(3,1) DEFAULT NULL,
  `rating_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `animes`
--

INSERT INTO `animes` (`id`, `title`, `slug`, `original_title`, `synopsis`, `poster_image`, `type`, `status`, `studio`, `aired_from`, `aired_to`, `duration`, `quality`, `episode_current`, `episode_total`, `views_count`, `comments_count`, `score`, `score_count`, `rating_avg`, `rating_count`, `created_at`, `updated_at`) VALUES
(1, 'Sen to Chihiro no Kamikakushi', 'sen-to-chihiro-no-kamikakushi', '千と千尋の神隠し', 'Chihiro egy különös szellemvilágba kerül, ahol saját bátorságával és kitartásával kell megmentenie a családját.', '/img/popular/popular-1.jpg', 'Movie', 'Finished', 'Studio Ghibli', '2001-07-20', '2001-07-20', '125 min', 'HD', 1, 1, 9141, 11, 8.90, 1515, 8.8, 161, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(2, 'Kizumonogatari III: Reiketsu-hen', 'kizumonogatari-iii-reiketsu-hen', '傷物語〈Ⅲ冷血篇〉', 'Araragi végső összecsapásra készül, miközben döntést kell hoznia az emberi és természetfeletti oldala között.', '/img/popular/popular-2.jpg', 'Movie', 'Finished', 'Shaft', '2017-01-06', '2017-01-06', '83 min', 'HD', 1, 1, 8120, 8, 8.77, 1204, 8.6, 138, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(3, 'Shirogane Tamashii-hen Kouhan-sen', 'shirogane-tamashii-hen-kouhan-sen', '銀魂. 銀ノ魂篇 後半戦', 'A Gintama fináléja egyszerre akciódús, komikus és érzelmes lezárást ad a hosszú kalandnak.', '/img/popular/popular-3.jpg', 'TV', 'Finished', 'Bandai Namco Pictures', '2018-07-09', '2018-10-08', '24 min/ep', 'HD', 14, 14, 10321, 15, 8.75, 1410, 8.7, 201, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(4, 'Rurouni Kenshin: Meiji Kenkaku Romantan', 'rurouni-kenshin-meiji-kenkaku-romantan', 'るろうに剣心 -明治剣客浪漫譚-', 'A legendás kardforgató múltja elől menekülve próbál békés életet élni, de újra és újra harcba kényszerül.', '/img/popular/popular-4.jpg', 'TV', 'Finished', 'Gallop', '1996-01-10', '1998-09-08', '24 min/ep', 'HD', 95, 95, 7430, 7, 8.31, 963, 8.1, 112, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(5, 'Mushishi Zoku Shou 2nd Season', 'mushishi-zoku-shou-2nd-season', '蟲師 続章 後半エピソード', 'Ginko tovább járja a vidéket, és misztikus mushi jelenségekkel kapcsolatos emberi sorsokat tár fel.', '/img/popular/popular-5.jpg', 'TV', 'Finished', 'Artland', '2014-10-19', '2014-12-21', '24 min/ep', 'HD', 10, 10, 6980, 4, 8.68, 840, 8.9, 96, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(6, 'Monogatari Series: Second Season', 'monogatari-series-second-season', '〈物語〉シリーズ セカンドシーズン', 'A különös lányok és démoni jelenések történetei tovább bonyolódnak Araragi körül.', '/img/popular/popular-6.jpg', 'TV', 'Finished', 'Shaft', '2013-07-07', '2013-12-29', '25 min/ep', 'HD', 26, 26, 8802, 13, 8.76, 1330, 8.7, 184, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(7, 'Great Teacher Onizuka', 'great-teacher-onizuka', 'グレート・ティーチャー・オニヅカ', 'Egykori motoros bandatagból lesz tanár, aki meghökkentő, de működő módszerekkel segíti a diákjait.', '/img/recent/recent-1.jpg', 'TV', 'Finished', 'Pierrot', '1999-06-30', '2000-09-24', '24 min/ep', 'HD', 43, 43, 9541, 21, 8.69, 1466, 8.8, 205, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(8, 'Fate/Zero 2nd Season', 'fate-zero-2nd-season', 'Fate/Zero 2nd Season', 'A Szent Grál-háború döntő szakasza könyörtelen csatákon és súlyos áldozatokon át vezet.', '/img/recent/recent-4.jpg', 'TV', 'Finished', 'ufotable', '2012-04-08', '2012-06-24', '24 min/ep', 'HD', 12, 12, 12041, 18, 8.55, 1710, 8.4, 233, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(9, 'The Seven Deadly Sins: Wrath of the Gods', 'the-seven-deadly-sins-wrath-of-the-gods', '七つの大罪 神々の逆鱗', 'Meliodas és társai újra harcba indulnak Britannia sorsáért, miközben sötét titkok kerülnek felszínre.', '/img/recent/recent-6.jpg', 'TV', 'Finished', 'Studio Deen', '2019-10-09', '2020-03-25', '24 min/ep', 'HD', 24, 24, 11020, 16, 7.10, 1210, 7.3, 164, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(10, 'Boruto: Naruto Next Generations', 'boruto-naruto-next-generations', 'BORUTO-ボルト- NARUTO NEXT GENERATIONS', 'Naruto fia a saját útját keresi, miközben új veszélyek jelennek meg a shinobi világban.', '/img/sidebar/tv-1.jpg', 'TV', 'Airing', 'Pierrot', '2017-04-05', NULL, '24 min/ep', 'HD', 293, NULL, 131541, 44, 6.85, 4515, 7.0, 482, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(11, 'Sword Art Online Alicization: War of Underworld', 'sword-art-online-alicization-war-of-underworld', 'ソードアート・オンライン アリシゼーション War of Underworld', 'Az Underworld végső csatája elkezdődik, miközben Asuna és Kirito szövetségesei újra hadba állnak.', '/img/sidebar/tv-3.jpg', 'TV', 'Finished', 'A-1 Pictures', '2019-10-13', '2019-12-29', '24 min/ep', 'HD', 12, 12, 19410, 26, 7.60, 2210, 7.8, 276, '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(12, 'Fate/stay night: Heaven\'s Feel I. Presage Flower', 'fate-stay-night-heavens-feel-i-presage-flower', '劇場版「Fate/stay night [Heaven\'s Feel] I. presage flower」', 'Shirou története sötétebb és személyesebb irányt vesz, amikor a Grál-háború más arcát is megismeri.', '/img/sidebar/tv-4.jpg', 'Movie', 'Finished', 'ufotable', '2017-10-14', '2017-10-14', '120 min', 'HD', 1, 1, 14510, 17, 8.48, 1822, 8.3, 214, '2026-04-06 22:39:18', '2026-04-06 22:39:18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `anime_genres`
--

CREATE TABLE `anime_genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `anime_id` int(10) UNSIGNED NOT NULL,
  `genre_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `anime_genres`
--

INSERT INTO `anime_genres` (`id`, `anime_id`, `genre_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(6, 2, 3),
(5, 2, 8),
(7, 3, 1),
(9, 3, 4),
(8, 3, 6),
(10, 4, 1),
(11, 4, 2),
(12, 4, 4),
(14, 5, 3),
(13, 5, 4),
(15, 5, 8),
(17, 6, 5),
(18, 6, 6),
(16, 6, 8),
(20, 7, 4),
(19, 7, 6),
(21, 8, 1),
(22, 8, 3),
(23, 8, 4),
(24, 9, 1),
(25, 9, 2),
(26, 9, 3),
(27, 10, 1),
(28, 10, 2),
(29, 10, 3),
(30, 11, 1),
(31, 11, 2),
(32, 11, 3),
(33, 11, 5),
(34, 12, 1),
(36, 12, 3),
(35, 12, 4),
(37, 12, 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'action', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(2, 'Adventure', 'adventure', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(3, 'Fantasy', 'fantasy', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(4, 'Drama', 'drama', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(5, 'Romance', 'romance', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(6, 'Comedy', 'comedy', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(7, 'Sci-Fi', 'sci-fi', '2026-04-06 22:39:18', '2026-04-06 22:39:18'),
(8, 'Mystery', 'mystery', '2026-04-06 22:39:18', '2026-04-06 22:39:18');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-04-06-000001', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1775501590, 1),
(2, '2026-04-06-000002', 'App\\Database\\Migrations\\AddUsernameToUsersTable', 'default', 'App', 1775507379, 2),
(3, '2026-04-06-000003', 'App\\Database\\Migrations\\CreateAnimeCatalogTables', 'default', 'App', 1775507945, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password_hash`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', 'asd@asd.asd', '$2y$10$Ybt9kC9WagJ/lMzg7DsZce1TuBktyViBrtCxu3ms/u0ulBT5ff3e6', '2026-04-06 21:22:46', '2026-04-06 21:22:46');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `animes_slug_unique` (`slug`),
  ADD KEY `title` (`title`),
  ADD KEY `views_count` (`views_count`),
  ADD KEY `score` (`score`);

--
-- A tábla indexei `anime_genres`
--
ALTER TABLE `anime_genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anime_genres_unique_pair` (`anime_id`,`genre_id`),
  ADD KEY `anime_id` (`anime_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- A tábla indexei `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_slug_unique` (`slug`),
  ADD UNIQUE KEY `genres_name_unique` (`name`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `animes`
--
ALTER TABLE `animes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `anime_genres`
--
ALTER TABLE `anime_genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT a táblához `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `anime_genres`
--
ALTER TABLE `anime_genres`
  ADD CONSTRAINT `anime_genres_anime_id_foreign` FOREIGN KEY (`anime_id`) REFERENCES `animes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anime_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
