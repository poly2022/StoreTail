-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/11/2023 às 22:56
-- Versão do servidor: 11.3.0-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `store_tail`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `CountFavoriteBooks` (IN `user_id` INT)   BEGIN
    SELECT COUNT(*) AS total_favorites
    FROM book_user_favourites
    WHERE users_id = user_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CountReadBooks` (IN `user_id` INT)   BEGIN
SELECT COUNT(*) AS total_read_books
FROM book_user_reads
WHERE users_id = user_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListActivity` (IN `book_id_param` INT)   BEGIN
    SELECT * FROM activity_book WHERE book_id = book_id_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListBooksByFilters` (IN `filterTitle` VARCHAR(255), IN `filterGenreID` BIGINT, IN `filterAgeGroupID` BIGINT)   BEGIN
    SELECT b.title, b.description, g.genre, a.age_group
    FROM `books` b
    INNER JOIN `genres` g ON b.genre_id = g.id
    INNER JOIN `age_groups` a ON b.age_groups_id = a.id
    WHERE (filterTitle IS NULL OR b.title LIKE CONCAT('%', filterTitle, '%'))
        AND (filterGenreID IS NULL OR b.genre_id = filterGenreID)
        AND (filterAgeGroupID IS NULL OR b.age_groups_id = filterAgeGroupID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListHorariosAtivos` (`Tempo_inicio` DATETIME, `Tempo_final` DATETIME)   BEGIN
    SELECT t.hour, t.trafego as hora_popularity
    From Time_table t
    Where t.hour> tempo_inicio AND t.hour<Tempo_final
    ORDER BY hora_popularity DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ListPopularBooksLast3Months` ()   BEGIN
    SELECT b.title, b.description, COUNT(r.id) AS popularity
    FROM `books` b
    LEFT JOIN `book_user_reads` r ON b.id = r.books_id
    WHERE r.read_date >= DATE_SUB(NOW(), INTERVAL 3 MONTH)
    GROUP BY b.id
    ORDER BY popularity DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_by_favourite` (IN `x` INT)   BEGIN
    SELECT books.title
    FROM books
    INNER JOIN book_user_favourites ON books.id = book_user_favourites.book_id
    WHERE book_user_favourites.user_id = x;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_by_progress` (IN `id_user` INT)   BEGIN
    SELECT books.title, books_user_read.progress 
    FROM books_user_read
    LEFT JOIN books ON books.id = books_user_read.book_id
    WHERE books_user_read.user_id = id_user;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `activity_books`
--

CREATE TABLE `activity_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activities_id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `activity_book_users`
--

CREATE TABLE `activity_book_users` (
  `activity_books_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `progress` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `activity_images`
--

CREATE TABLE `activity_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activities_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `age_groups`
--

CREATE TABLE `age_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age_group` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `age_groups`
--

INSERT INTO `age_groups` (`id`, `age_group`, `created_at`, `updated_at`) VALUES
(1, '0-2 year olds', NULL, NULL),
(2, '3-5 year olds', NULL, NULL),
(3, '6-8 year olds', NULL, NULL),
(4, '9-12 year olds', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `author_photo_url` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `description`, `author_photo_url`, `nationality`, `created_at`, `updated_at`) VALUES
(1, 'Julia', 'Donaldson', 'Julia Donaldson is an English children’s author. She has written more than 100 plays and books for children and teenagers. Donaldson was born on September 16, 1948, in England. As a child she wrote plays and choreographed dances, which she and her younger sister, Mary, performed. Donaldson studied drama and French at the University of Bristol. Afterward she worked in publishing and as a teacher. Donaldson went on to write some of the United Kingdom’s best-selling picture books.\r\n', 'https://www.booktrust.org.uk/globalassets/images/childrens-laureate/former-laureates/julia-donaldson-16x9.jpg?w=1200&h=675&quality=70&anchor=middlecenter', 'British', NULL, NULL),
(2, 'Giles', 'Andreae', 'Giles Andreae (born 16 March 1966) is a British writer and illustrator. He is the creator of the stickman poet Purple Ronnie and the humorous artist/philosopher Edward Monkton, and is the author of Giraffes Can\'t Dance and many other books for children.', 'https://i.dailymail.co.uk/i/pix/2011/04/07/article-0-0B68431200000578-701_308x185.jpg', 'British', NULL, NULL),
(3, 'Eric', 'Carle', 'Eric Carle, (born June 25, 1929, Syracuse, New York, U.S.—died May 23, 2021, Northampton, Massachusetts), American writer and illustrator of children’s literature who published numerous best-selling books, among them The Very Hungry Caterpillar (1969), which by 2018 had sold some 50 million copies and had been translated into more than 60 languages.', 'https://www.gpb.org/sites/default/files/styles/flexheight/public/blogs/images/2016/05/25/copy_of_professional_development_blog_2.png?itok=7eU7K64X', 'American', NULL, NULL),
(4, 'Rachel', 'Bright', 'Rachel Bright is a wordsmith, illustrator and professional thinker of happy thoughts. She has written several books for children, including Love Monster, The Lion Inside and The Koala Who Could – winner of the Evening Standard Oscar’s Book Prize and the Sainsbury’s Book Award. Her books have sold over 300,000 copies in the UK alone and been translated into over 30 languages. She is also the creator of award-winning stationery and homewares range, The Brightside. Rachel lives on a farm near the seaside, with her partner and their two young daughters.', 'https://hachette.imgix.net/authors/109691.jpg?auto=compress&w=960&h=560&fit=facearea&facepad=5&crop=faces', 'Bright', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `author_books`
--

CREATE TABLE `author_books` (
  `authors_id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `cover_url` varchar(255) NOT NULL,
  `read_time` int(11) NOT NULL,
  `age_groups_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `access_level` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `genre_id`, `cover_url`, `read_time`, `age_groups_id`, `is_active`, `access_level`, `created_at`, `updated_at`) VALUES
(1, 'The Gruffalo', '', 3, 'https://upload.wikimedia.org/wikipedia/en/3/34/Fairuse_Gruffalo.jpg', 20, 1, 1, 0, NULL, NULL),
(2, 'Charlote\'s Web', '', 1, 'https://embed.cdn.pais.scholastic.com/v1/channels/clubs-us/products/identifiers/isbn/9780590302715/primary/renditions/500', 30, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `book_user_favourites`
--

CREATE TABLE `book_user_favourites` (
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `book_user_reads`
--

CREATE TABLE `book_user_reads` (
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `progress` decimal(8,2) NOT NULL,
  `rating` double(8,2) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `read_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
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
-- Estrutura para tabela `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `genres`
--

INSERT INTO `genres` (`id`, `genre`, `created_at`, `updated_at`) VALUES
(1, 'Illustrated books', NULL, NULL),
(2, 'Learning books', NULL, NULL),
(3, 'Fantasy books', NULL, NULL),
(4, 'Thematic books', NULL, NULL),
(5, 'Child development books', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `listpopularbookslast3months`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `listpopularbookslast3months` (
`title` varchar(255)
,`description` varchar(255)
,`popularity` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_10_05_234339_create_authors_table', 1),
(5, '2023_10_05_234340_create_activities_table', 1),
(6, '2023_10_05_234340_create_genres_table', 1),
(7, '2023_10_05_234340_create_user_types_table', 1),
(8, '2023_10_05_234341_create_plans_table', 1),
(9, '2023_10_05_234341_create_tags_table', 1),
(10, '2023_10_05_234342_create_age_groups_table', 1),
(11, '2023_10_05_234343_create_users_table', 1),
(12, '2023_10_05_234344_create_subscriptions_table', 1),
(13, '2023_10_05_234345_create_books_table', 1),
(14, '2023_10_05_234346_create_author_books_table', 1),
(15, '2023_10_05_234346_create_pages_table', 1),
(16, '2023_10_05_234347_create_tagging_taggeds_table', 1),
(17, '2023_10_05_234348_create_book_user_reads_table', 1),
(18, '2023_10_05_234349_create_book_user_favourites_table', 1),
(19, '2023_10_05_234350_create_videos_table', 1),
(20, '2023_10_05_234351_create_activity_books_table', 1),
(21, '2023_10_05_234352_create_activity_book_users_table', 1),
(22, '2023_10_05_234353_create_activity_images_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `page_image_url` varchar(255) NOT NULL,
  `audio_url` varchar(255) NOT NULL,
  `page_index` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `access_level` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `plans_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tagging_taggeds`
--

CREATE TABLE `tagging_taggeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `genres_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `time_table`
--

CREATE TABLE `time_table` (
  `id` int(11) NOT NULL,
  `hour` datetime NOT NULL,
  `trafego` int(11) DEFAULT NULL,
  `created_at` time NOT NULL,
  `updated_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_types_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_photo_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('guest','commom','admin','client') NOT NULL DEFAULT 'guest',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `books_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para view `listpopularbookslast3months`
--
DROP TABLE IF EXISTS `listpopularbookslast3months`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listpopularbookslast3months`  AS SELECT `b`.`title` AS `title`, `b`.`description` AS `description`, count(`r`.`books_id`) AS `popularity` FROM (`books` `b` left join `book_user_reads` `r` on(`b`.`id` = `r`.`books_id`)) WHERE `r`.`read_date` >= current_timestamp() - interval 3 month GROUP BY `b`.`id` ORDER BY count(`r`.`books_id`) DESC ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `activity_books`
--
ALTER TABLE `activity_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_books_activities_id_foreign` (`activities_id`),
  ADD KEY `activity_books_books_id_foreign` (`books_id`);

--
-- Índices de tabela `activity_book_users`
--
ALTER TABLE `activity_book_users`
  ADD PRIMARY KEY (`activity_books_id`,`users_id`),
  ADD KEY `activity_book_users_users_id_foreign` (`users_id`);

--
-- Índices de tabela `activity_images`
--
ALTER TABLE `activity_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_images_activities_id_foreign` (`activities_id`);

--
-- Índices de tabela `age_groups`
--
ALTER TABLE `age_groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `author_books`
--
ALTER TABLE `author_books`
  ADD PRIMARY KEY (`authors_id`,`books_id`),
  ADD KEY `author_books_books_id_foreign` (`books_id`);

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_genre_id_foreign` (`genre_id`),
  ADD KEY `books_age_groups_id_foreign` (`age_groups_id`);

--
-- Índices de tabela `book_user_favourites`
--
ALTER TABLE `book_user_favourites`
  ADD PRIMARY KEY (`books_id`,`users_id`),
  ADD KEY `book_user_favourites_users_id_foreign` (`users_id`);

--
-- Índices de tabela `book_user_reads`
--
ALTER TABLE `book_user_reads`
  ADD PRIMARY KEY (`books_id`,`users_id`),
  ADD KEY `book_user_reads_users_id_foreign` (`users_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_books_id_foreign` (`books_id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_users_id_foreign` (`users_id`),
  ADD KEY `subscriptions_plans_id_foreign` (`plans_id`);

--
-- Índices de tabela `tagging_taggeds`
--
ALTER TABLE `tagging_taggeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_taggeds_books_id_foreign` (`books_id`),
  ADD KEY `tagging_taggeds_tags_id_foreign` (`tags_id`);

--
-- Índices de tabela `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_genres_id_foreign` (`genres_id`);

--
-- Índices de tabela `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_types_id_foreign` (`user_types_id`);

--
-- Índices de tabela `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_books_id_foreign` (`books_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `activity_books`
--
ALTER TABLE `activity_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `activity_images`
--
ALTER TABLE `activity_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `age_groups`
--
ALTER TABLE `age_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tagging_taggeds`
--
ALTER TABLE `tagging_taggeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `activity_books`
--
ALTER TABLE `activity_books`
  ADD CONSTRAINT `activity_books_activities_id_foreign` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`),
  ADD CONSTRAINT `activity_books_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);

--
-- Restrições para tabelas `activity_book_users`
--
ALTER TABLE `activity_book_users`
  ADD CONSTRAINT `activity_book_users_activity_books_id_foreign` FOREIGN KEY (`activity_books_id`) REFERENCES `activity_books` (`id`),
  ADD CONSTRAINT `activity_book_users_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `activity_images`
--
ALTER TABLE `activity_images`
  ADD CONSTRAINT `activity_images_activities_id_foreign` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`);

--
-- Restrições para tabelas `author_books`
--
ALTER TABLE `author_books`
  ADD CONSTRAINT `author_books_authors_id_foreign` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `author_books_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);

--
-- Restrições para tabelas `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_age_groups_id_foreign` FOREIGN KEY (`age_groups_id`) REFERENCES `age_groups` (`id`),
  ADD CONSTRAINT `books_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Restrições para tabelas `book_user_favourites`
--
ALTER TABLE `book_user_favourites`
  ADD CONSTRAINT `book_user_favourites_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_user_favourites_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `book_user_reads`
--
ALTER TABLE `book_user_reads`
  ADD CONSTRAINT `book_user_reads_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_user_reads_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);

--
-- Restrições para tabelas `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plans_id_foreign` FOREIGN KEY (`plans_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `subscriptions_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `tagging_taggeds`
--
ALTER TABLE `tagging_taggeds`
  ADD CONSTRAINT `tagging_taggeds_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `tagging_taggeds_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Restrições para tabelas `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_genres_id_foreign` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_types_id_foreign` FOREIGN KEY (`user_types_id`) REFERENCES `user_types` (`id`);

--
-- Restrições para tabelas `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
