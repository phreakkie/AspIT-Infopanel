-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 28. 03 2022 kl. 13:52:33
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoscreen`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `userid` int(255) NOT NULL,
  `week` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `mon` varchar(50) NOT NULL,
  `tue` varchar(50) NOT NULL,
  `wed` varchar(50) NOT NULL,
  `thu` varchar(50) NOT NULL,
  `fri` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `food`
--

INSERT INTO `food` (`id`, `userid`, `week`, `year`, `mon`, `tue`, `wed`, `thu`, `fri`, `timestamp`) VALUES
(30, 0, 13, 0, 'Pasta Carbonarra', 'Amerikansk Farsbrød', 'Kylling i kokossovs', 'Italienske Frikadeller', 'Tarteletter', '2022-03-28 11:03:53');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `inews`
--

CREATE TABLE `inews` (
  `id` int(4) NOT NULL,
  `descWhere` varchar(200) NOT NULL COMMENT 'Where is the student interning',
  `descWhat` varchar(200) NOT NULL COMMENT 'What is the student doing interning',
  `src` varchar(200) DEFAULT NULL,
  `alt` varchar(200) DEFAULT NULL,
  `userid` int(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `inews`
--

INSERT INTO `inews` (`id`, `descWhere`, `descWhat`, `src`, `alt`, `userid`, `active`) VALUES
(29, 'aawgaw', 'gwaga', '6233154b72b57.jpg', 'wdafa', 1, 0),
(30, 'afwaf', 'gwagaw', 'download.jpg', 'gwgwag', 1, 1),
(31, 'Test', 'test', 'download.jpg', 'agwaga', 1, 1),
(32, 'ktutuk', 'tkutkt', '62331541c7b36.jpg', 'ktkr', 1, 1),
(33, 'etQT', 'QT3qt', 'download.jpg', 'q3tQT3', 1, 0),
(34, 'aegag', 'aeatag', 'download.jpg', 'aegag', 1, 1),
(35, 'awfa', 'wafa', 'billed1.jpg', 'wafaw', 1, 0),
(36, 'fwafa', 'wafafwa', 'billed1.jpg', 'wafa', 1, 1),
(37, 'hej med dig hvordan går det det går godt hvad med dig det går også godt har du haft en god dag ja det har jeg har du haft en god dag ja jeg har også haft en god dag', 'hej med dig hvordan går det det går godt hvad med dig det går også godt har du haft en god dag ja det har jeg har du haft en god dag ja jeg har også haft en god dag', '623b14c187612.png', 'wafafa', 1, 1),
(39, 'Fin jakke', 'Meget fin jakkeawfafaw', '623333fd9085c.jpg', 'Jakkefwafwa', 1, 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `userid` int(4) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `dbUsername` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dbPassword` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `accesslevel` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `dbUsername`, `dbPassword`, `accesslevel`) VALUES
(1, 'Admin', 'Admin', 'admin', '$2y$10$F4/W20eh.ZUSGqmvw8CFN.8ZoSDBRcWXQfCnhPP7booDYqlNDW7Q6', 1),
(2, 'AL2', '', 'AL2', '$2y$10$Mkz5YvX8W6FY3EJ2cyn0TOLqCtSX/cbeFpiQ.9TBF.uuP/DsAPChq', 2),
(3, 'AL3', '', 'AL3', '$2y$10$Y3hmiEfsaJ/TvWqSWCHIeOGqsCtcxTj9UoP2mQlML/XCHwnL7RyjG', 3),
(13, 'Jens', 'Lyn', 'JeLy', '$2y$10$81EjJKJb9KMVJDZHL2u6Z.te5CxVWm4jonAErU61NtiYo362gsaP.', 3),
(18, 'Nicolai', 'Hansen', 'æøå', '$2y$10$fNowCv6680F6rnGEVFC38eLITTrpokXoyQl.jpgaAdPUWWRzEqbqO', 3),
(19, 'Hannibal', 'Hansen', 'hanh', '$2y$10$mvRy.c3pvgzCjxNJfkOxtOdZcyFizHnIJWNBULwjE.Up2lbC3n/mm', 2);

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `inews`
--
ALTER TABLE `inews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tilføj AUTO_INCREMENT i tabel `inews`
--
ALTER TABLE `inews`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `inews`
--
ALTER TABLE `inews`
  ADD CONSTRAINT `inews_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);

DELIMITER $$
--
-- Hændelser
--
CREATE DEFINER=`root`@`localhost` EVENT `cleaning` ON SCHEDULE EVERY 1 DAY STARTS '2022-03-28 10:55:13' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM food
  WHERE timestamp < CURRENT_TIMESTAMP - INTERVAL 4 MONTH$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
