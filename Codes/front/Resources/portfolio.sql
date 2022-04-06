-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 08:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `text_key` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `text_key`, `link`) VALUES
(1, 'menu.aboutme', 'about_me'),
(2, 'menu.prog', 'programming'),
(3, 'menu.web', 'web_develop'),
(4, 'menu.hobby', 'hobbies');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page`, `title`) VALUES
(1, 'about_me', 'menu.aboutme'),
(2, 'programming', 'menu.prog'),
(3, 'web_develop', 'menu.web'),
(4, 'hobbies', 'menu.hobby');

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `text_key` varchar(255) NOT NULL,
  `text_hu` text NOT NULL,
  `text_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `text`
--

INSERT INTO `text` (`id`, `text_key`, `text_hu`, `text_en`) VALUES
(1, 'menu.aboutme', 'Rólam', 'About me'),
(2, 'menu.prog', 'Programozás', 'Programming'),
(3, 'menu.web', 'Webfejlesztés', 'Web develop'),
(4, 'menu.hobby', 'Hobbik', 'Hobbies'),
(5, 'text.aboutme_im', 'A nevem', 'I\'m'),
(6, 'text.aboutme_proffesion', 'Szoftverfejlesztő', 'Software Developer'),
(7, 'text.aboutme', 'Rólam', 'About me'),
(8, 'text.aboutme_text', 'Rólam azt kell tudni….', 'I\'m an program….'),
(9, 'text.c', 'C#...', 'C#...'),
(10, 'text.java', 'Java…', 'Java…'),
(11, 'text.web', 'Web…', 'Web…'),
(12, 'text.hobbies', 'A hobbim a videóvá…', 'My hobby is video ed…'),
(14, 'text.aboutme_name', 'Nové Norbert István', 'Norbert Istvan Nove'),
(15, 'footer_text', 'Az oldalt Nové Norbert István készítette.', 'The page was made by Norbert Istvan Nove.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text_key` (`text_key`) USING BTREE,
  ADD KEY `link` (`link`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page` (`page`) USING BTREE,
  ADD KEY `title` (`title`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `text_key` (`text_key`) USING BTREE,
  ADD KEY `text_hu` (`text_hu`(768)),
  ADD KEY `text_en` (`text_en`(768));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
