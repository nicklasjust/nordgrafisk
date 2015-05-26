-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 26. 05 2015 kl. 19:54:15
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nordgrafisk`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `debtors`
--

CREATE TABLE IF NOT EXISTS `debtors` (
`id` int(100) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_danish_ci NOT NULL,
  `zip_code` int(100) DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `ean` varchar(200) COLLATE utf8_danish_ci DEFAULT NULL,
  `eco_reg` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci AUTO_INCREMENT=163 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(200) NOT NULL,
  `path` varchar(300) NOT NULL,
  `attached` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Data dump for tabellen `files`
--

INSERT INTO `files` (`id`, `path`, `attached`) VALUES
(53, '/tobiasharbo@gmail.com/tlf 25469500 - forside.png', 1),
(54, '/tobiasharbo@gmail.com/tlf 25469500 - forside.png', 1),
(55, '/tobiasharbo@gmail.com/tlf 25469500 - kontakt.png', 0),
(56, '/tobiasharbo@gmail.com/tlf 25469500 - forside.png', 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `file_orderline_rel`
--

CREATE TABLE IF NOT EXISTS `file_orderline_rel` (
`id` int(200) NOT NULL,
  `orderline_id` int(200) NOT NULL,
  `file_id` int(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orderlines`
--

CREATE TABLE IF NOT EXISTS `orderlines` (
`id` int(200) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_no` int(200) NOT NULL,
  `product` varchar(200) DEFAULT NULL,
  `formatComments` text,
  `usageComments` text,
  `material` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `size` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=120 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(100) NOT NULL,
  `status` int(100) NOT NULL DEFAULT '1',
  `debtor_id` int(100) NOT NULL,
  `delivery_address` varchar(200) NOT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `delivery_city` varchar(200) NOT NULL,
  `delivery_zip` varchar(200) NOT NULL,
  `eco_reg` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=162 ;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `debtors`
--
ALTER TABLE `debtors`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `file_orderline_rel`
--
ALTER TABLE `file_orderline_rel`
 ADD PRIMARY KEY (`id`), ADD KEY `orderline_id` (`orderline_id`,`file_id`), ADD KEY `file_id` (`file_id`);

--
-- Indeks for tabel `orderlines`
--
ALTER TABLE `orderlines`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`);

--
-- Indeks for tabel `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `debtor_id` (`debtor_id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `debtors`
--
ALTER TABLE `debtors`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
--
-- Tilføj AUTO_INCREMENT i tabel `files`
--
ALTER TABLE `files`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- Tilføj AUTO_INCREMENT i tabel `file_orderline_rel`
--
ALTER TABLE `file_orderline_rel`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Tilføj AUTO_INCREMENT i tabel `orderlines`
--
ALTER TABLE `orderlines`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- Tilføj AUTO_INCREMENT i tabel `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `file_orderline_rel`
--
ALTER TABLE `file_orderline_rel`
ADD CONSTRAINT `file_orderline_rel_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `file_orderline_rel_ibfk_2` FOREIGN KEY (`orderline_id`) REFERENCES `orderlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `orderlines`
--
ALTER TABLE `orderlines`
ADD CONSTRAINT `orderlines_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Begrænsninger for tabel `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`debtor_id`) REFERENCES `debtors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
