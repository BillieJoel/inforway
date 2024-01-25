-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/01/2024 às 19:50
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
(84, 'src/image_banners/65a3ad1678ead_JAVASCRIPT.png', 115, '2024-01-14 09:44:54'),
(86, 'src/image_banners/65a3ae36c3ff9_PHP POO.png', 117, '2024-01-14 09:49:42'),
(88, 'src/image_banners/65a4433227179_20200330163451_jorelfoto.jpg', 114, '2024-01-14 20:25:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `post_id`) VALUES
(1, 'otima explicação', 39, 1);

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
  `image_course` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `courses`
--

INSERT INTO `courses` (`course_id`, `name_course`, `time_course`, `created_course`, `description`, `image_course`, `price`) VALUES
(122, 'php', '550', '2024-01-14 21:37:20', 'tudo sobre php', 'src/image_courses/65a46b8b4a2e8_PHP POO.png', ''),
(124, 'Javascript', '550', '2024-01-14 21:49:30', 'tudo sobre javascript', 'src/image_courses/65a456ea4a0ce_JAVASCRIPT.png', ''),
(125, 'HTML', '700', '2024-01-15 05:11:12', 'tudo sobre  HTML.', 'src/image_courses/65a4be7074059_HTMLCSSJAVA.jpeg', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `date_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modules`
--

INSERT INTO `modules` (`module_id`, `title`, `description`, `course_id`, `user_id`, `thumbnail_url`, `video_url`, `date_post`) VALUES
(60, 'novo curso php', 'primeira aula do curso de php', 122, 52, 'https://img.youtube.com/vi/TfsO0BGvGn0/maxresdefault.jpg', 'TfsO0BGvGn0', '2024-01-25 07:46:23'),
(62, 'setup php .ini', 'Você sabe como configurar o comportamento do PHP no servidor? Sabe onde está o arquivo php.ini em cada sistema operacional? Então veja esse vídeo até o final para aprender os detalhes internos de funcionamento do PHP.', 122, 52, 'https://img.youtube.com/vi/xFdiSh8KQ94/maxresdefault.jpg', 'xFdiSh8KQ94', '2024-01-25 07:49:01'),
(66, 'Manipulação de strings com PHP', 'Você sabe usar strings em PHP? Já ouviu falar em  strings Nowdoc e Heredoc em PHP? Sabe a diferença entre usar aspas duplas ou simples para strings PHP? Sabe o que significa interpolação? Veja esse vídeo até o fim para responder todas essas perguntas', 122, 52, 'https://img.youtube.com/vi/Vn1PGAfnG_s/maxresdefault.jpg', 'Vn1PGAfnG_s', '2024-01-25 17:57:20'),
(68, 'Operadores Aritméticos do PHP', 'Você conhece os operadores matemáticos do PHP? Sabe como o PHP se comporta com expressões como \"2\"  + \"2\" ? Sabe usar os operadores de adição, subtração, multiplicação, divisão, resto de divisão inteira e potência ou exponenciação? Veja esse vídeo até o fim para responder todas essas perguntas.', 122, 52, 'https://img.youtube.com/vi/99ITnUFCzRU/maxresdefault.jpg', '99ITnUFCzRU', '2024-01-25 18:04:07'),
(69, 'As versões do PHP e seus recursos', 'Pois é nesse vídeo que você vai encontrar as respostas para todas essas perguntas.', 122, 52, 'https://img.youtube.com/vi/cGiB7D9mCAM/maxresdefault.jpg', 'cGiB7D9mCAM', '2024-01-25 18:06:40'),
(70, 'Dando os primeiros passos', 'Quais são os melhores livros de JavaScript em Português? Onde ter acesso à documentação oficial do JavaScript em Português e Inglês? Quais são os requisitos de software para aprender a programar em JavaScript? Qual é o melhor editor para códigos JavaScript?  Como instalar o Node.js no seu computador? Como configurar o Node.js? Para aprender JavaScript, é realmente necessário saber muito Inglês?Você está precisando de dicas para estudar e aprender de verdade?', 124, 52, 'https://img.youtube.com/vi/FdePtO5JSd0/maxresdefault.jpg', 'FdePtO5JSd0', '2024-01-25 18:10:13'),
(71, 'Criando o seu primeiro script', 'Você já sabe diferenciar dentro do seu código, os trechos em HTML5, em CSS3 e em JavaScript? Sabe organizar as pastas do seu projeto dentro do Visual Studio Code? Sabe como testar se o Node.js está devidamente instalado? Já sabe utilizar os comandos alert, confirm e prompt do JavaScript? \r\n', 124, 52, 'https://img.youtube.com/vi/OmmJBfcMJA8/maxresdefault.jpg', 'OmmJBfcMJA8', '2024-01-25 18:10:55'),
(72, 'Variáveis e Tipos Primitivos', 'Você sabe o que são variáveis? Sabe declarar variáveis em JavaScript? Sabe quais são os tipos primitivos do JavaScript? Consegue entender o que significa colocar um valor null dentro de uma variável em JavaScript?', 124, 52, 'https://img.youtube.com/vi/Vbabsye7mWo/maxresdefault.jpg', 'Vbabsye7mWo', '2024-01-25 18:11:37'),
(73, 'Tratamento de dados', 'Você já aprendeu a manipular dados em JavaScript? Sabe como guardar o resultado de um prompt dentro de uma variável? Sabe converter String para Número em JavaScript? Consegue formatar um número para que ele se pareça com um valor monetário usando JavaScript?', 124, 52, 'https://img.youtube.com/vi/OJgu_KCCUSY/maxresdefault.jpg', 'OJgu_KCCUSY', '2024-01-25 18:12:11'),
(74, 'Operadores (Parte1) ', 'Você já sabe como fazer cálculos usando JavaScript? Conhece os operadores aritméticos do JavaScript? Consegue entender a ordem de precedência dos operadores em JavaScript? Consegue utilizar os operadores de incremento (pré-incremento e pós-incremento) no JavaScript?  ', 124, 52, 'https://img.youtube.com/vi/hZG9ODUdxHo/maxresdefault.jpg', 'hZG9ODUdxHo', '2024-01-25 18:12:45'),
(75, 'Operadores (Parte 2)', 'Você já conhece os operadores relacionais e os operadores lógicos em JavaScript? Sabe a diferença entre usar = ou == ou === em JavaScript? Conhece a ordem de precedência dos operadores do JavaScript? Sabe como usar o operador ternário para atribuições em JavaScript?', 124, 52, 'https://img.youtube.com/vi/BP63NhITvao/maxresdefault.jpg', 'BP63NhITvao', '2024-01-25 18:13:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content`, `image`, `views`, `created_at`) VALUES
(1, 52, ' .pxc lx cpx ', 'vsvsdvl,v', '', 0, '2024-01-25 12:51:53');

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
(1, 52, 122),
(2, 52, 124);

-- --------------------------------------------------------

--
-- Estrutura para tabela `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `course_id`) VALUES
(1, 52, 124),
(2, 64, 122),
(4, 31, 2);

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
(30, 'gustavo', 'carinemagalhaesoficial@gmail.com', '$2y$10$vkgQp9gJqgn15KdYs6KmkOnYkbJgzXY5peyY/LEE81CappBCvDvAG', '\'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'admin', '$2y$10$2GPBilvoVezWFEW2/Ut1uO4wkl32dluh/6TLlXYTRtYP2QU3/6wIi', '0000-00-00', '2024-01-09 12:25:34'),
(33, 'guilherme costa magalhães', 'teste@gmail.com', '$2y$10$mNFDb12olokJFjKVTd5byua0Tb3HmFzSFHl401YEKy23Ef6H/6JpK', '\'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'teacher', '$2y$10$.brO6V4EbSvNqX.t21w5F.4AyV2DSX0bLLfdGhe1cowGsUBXroJq.', '0000-00-00', '2023-12-14 00:07:27'),
(34, 'guilherme', 'egrergege@gmail.com', '$2y$10$BsBtGQztTEwuDmWC0E/IGufo4IX/GWWJM4b.qiA7pzJlMUDVWXNgu', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$OHdUQ96/tJZAMoy889gog.JTdo8U3iyk.ElsGuXntN9xxMKMhi2qS', '0000-00-00', '2024-01-09 14:54:10'),
(38, 'dfsfsdfsdfsfds', 'carinemagalhaesoficial@gmail.com', '$2y$10$aJQ9ugMBbb3dsHfZfD4e8OWTIf3s/hEWFQv2pUmaHrzcg2/OnTngW', 'olá, eu estou usando o inforway', '\\src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$WuvupxTMDglpvrXvudDZx.Q8T2ZF4q4NhAWwy9MRx2Y8mDYhrOsku', '2012-12-21', '2024-01-09 17:23:28'),
(52, 'guilherme', 'guilhermecostam27@gmail.com', '$2y$10$yYoLfoO1LW2ArHtCraixm.pFhvXg57ZkydAX.u1AoTqVrrSAUQniW', 'ok', 'src/image_profile/65a45023b4769_PHP POO.png', 'admin', '$2y$10$.QifIWB0aVR0ZjxenKmoF.fo2h8nbk/aQ0i4fe.PMaEE9NjV3MHiC', '2312-03-31', '2024-01-13 17:40:49'),
(64, 'gabriel', 'teste2@gmail.com', '$2y$10$dq8dv1AtYlJxrZrXHoijzOSUpSGtrDDsUnDQAOEb6lAqaObDGn3ra', 'olá, eu estou usando o inforway', 'src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'teacher', '$2y$10$fG0tpwGh2rzFOPkdDXbWreBzvFGAFxzNUnssaoyHNTfnqFFoCH7IS', '2005-01-31', '2024-01-14 22:52:30'),
(70, 'guilherme magalhães', 'meu2@gmail.com', '$2y$10$tAhj6YIr9x6auixyZ0WFNOv.a53HiPn2x.nUTNN.L8mDWPr.U2FgK', 'olá, eu estou usando o inforway', 'src\\image_profile\\240_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg', 'common', '$2y$10$sQyXWVKV2uztSNeUGK4nW.NMwYr8KTihtuH8nTUtVhP1z3CZq94xe', '2005-01-31', '2024-01-14 23:54:50');

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
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `teachers`
--
ALTER TABLE `teachers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de tabela `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
