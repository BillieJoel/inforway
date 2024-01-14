-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/01/2024 às 20:55
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_infoway`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image_banner` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `banners`
--

INSERT INTO `banners` (`id`, `image_banner`, `course_id`, `create_date`) VALUES
(1, 'src\\image_banner\\PHP POO.png', 1, '2024-01-11 16:45:00'),
(2, 'src\\image_banner\\JAVASCRIPT.png', 1, '2024-01-11 16:45:02'),
(3, 'src\\image_banner\\HTMLCSSJAVA.jpeg', 2, '2024-01-11 17:30:34'),
(5, 'src\\image_banner\\HARDWARE.png', 2, '2024-01-11 18:27:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `module_id`) VALUES
(1, 'otima explicação', 32, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `name_course` varchar(255) NOT NULL,
  `time_course` varchar(255) NOT NULL,
  `created_course` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `courses`
--

INSERT INTO `courses` (`course_id`, `name_course`, `time_course`, `created_course`, `description`, `image`) VALUES
(1, 'php', '44h', '2023-12-14 00:18:16', '', ''),
(2, 'html', '33h', '2024-01-11 17:29:20', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tumb` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modules`
--

INSERT INTO `modules` (`module_id`, `title`, `course_id`, `user_id`, `tumb`, `video`, `date_post`) VALUES
(1, 'Variável', 1, 32, '', '', '2024-01-11 14:36:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `students`
--

INSERT INTO `students` (`id`, `user_id`, `course_id`) VALUES
(1, 32, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL DEFAULT 'olá, eu estou usando o inforway',
  `image_profile` varchar(255) DEFAULT 'src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg',
  `user_level` enum('common','admin','teacher') NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `Date_of_birth` date NOT NULL DEFAULT current_timestamp(),
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `about`, `image_profile`, `user_level`, `cpf`, `Date_of_birth`, `create_date`) VALUES
(31, 'guilherme costa magalhães', 'teste@gmail.com', '$2y$10$mNFDb12olokJFjKVTd5byua0Tb3HmFzSFHl401YEKy23Ef6H/6JpK', '\'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'teacher', '$2y$10$.brO6V4EbSvNqX.t21w5F.4AyV2DSX0bLLfdGhe1cowGsUBXroJq.', '0000-00-00', '2023-12-14 00:07:27'),
(32, '', '', '$2y$10$oOuoo9U5so8U/VJoIGopT.TE7izxZQl63l8C5Y4xr2O71tx/YeE7C', '', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'admin', '$2y$10$sQp9jIFM7SuZ7WGu570jZu5RsZBsYaOjBfc2LyyvLxIVGuVlEPIdK', '0000-00-00', '2024-01-09 12:07:54'),
(33, 'gabriel', 'carinemagalhaesoficial@gmail.com', '$2y$10$S1c7HANyJjYCvlBApAZ9Yurp3YD.s373AXUiXLRXNChodKkNEdvd.', '\'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$2GPBilvoVezWFEW2/Ut1uO4wkl32dluh/6TLlXYTRtYP2QU3/6wIi', '0000-00-00', '2024-01-09 12:25:34'),
(34, 'guilherme', 'egrergege@gmail.com', '$2y$10$BsBtGQztTEwuDmWC0E/IGufo4IX/GWWJM4b.qiA7pzJlMUDVWXNgu', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$OHdUQ96/tJZAMoy889gog.JTdo8U3iyk.ElsGuXntN9xxMKMhi2qS', '0000-00-00', '2024-01-09 14:54:10'),
(38, 'dfsfsdfsdfsfds', 'carinemagalhaesoficial@gmail.com', '$2y$10$aJQ9ugMBbb3dsHfZfD4e8OWTIf3s/hEWFQv2pUmaHrzcg2/OnTngW', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$WuvupxTMDglpvrXvudDZx.Q8T2ZF4q4NhAWwy9MRx2Y8mDYhrOsku', '2012-12-21', '2024-01-09 17:23:28'),
(39, 'guilherme', 'guilhermecostam27@gmail.com', '$2y$10$DNQhVRAD3uggMlEUkCfRtujqpBT/FGkM7nJwBs4Kfz7VSRwlSIc8K', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'admin', '$2y$10$Nm2ABg119SqL/o0DmcSvSeOtQz.CwTNPpIeKQw7ogzNb502oVn95.', '2005-01-31', '2024-01-11 15:59:03'),
(40, 'guilherme', 'guilhermecostam27@gmail.com', '$2y$10$JoA17IVYR2gBA1EbBR15oeqQv.1q7ya6.fAQ/7eagj/1IobGU4nBG', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$4h0113srxadpUwPCR7dzD..G0VfJS/BhFfxjGnAyqFZJKQqdAlKC2', '2005-01-31', '2024-01-11 16:00:39');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Índices de tabela `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
