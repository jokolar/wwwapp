-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Počítač: mysql01
-- Vytvořeno: Ned 14. led 2018, 17:46
-- Verze serveru: 10.1.28-MariaDB
-- Verze PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `1872_ambike`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `registrace`
--

CREATE TABLE `registrace` (
  `id_registrace` int(11) NOT NULL,
  `id_zavodnik` int(11) NOT NULL,
  `id_zavod` int(11) NOT NULL,
  `vlozeno` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `registrace`
--

INSERT INTO `registrace` (`id_registrace`, `id_zavodnik`, `id_zavod`, `vlozeno`) VALUES
(2, 9, 4, '2018-01-14 16:09:42'),
(3, 10, 4, '2018-01-14 16:14:49'),
(8, 9, 2, '2018-01-14 17:07:04'),
(10, 9, 3, '2018-01-14 17:42:13');

-- --------------------------------------------------------

--
-- Struktura tabulky `zavod`
--

CREATE TABLE `zavod` (
  `id_zavod` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `termin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `url` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `status` char(1) COLLATE utf8_czech_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `zavod`
--

INSERT INTO `zavod` (`id_zavod`, `nazev`, `termin`, `url`, `status`) VALUES
(1, 'Blatná', '2018-01-10 08:00:00', '', '1'),
(2, 'Artík', '2018-06-15 10:00:00', 'http://artik.ambike.com', '1'),
(3, 'Merklín', '2018-05-31 10:00:00', '', '1'),
(4, 'Jáchymov', '2018-08-25 10:00:00', '', '1'),
(5, 'Ostrov', '2018-07-15 12:00:00', '', '0');

-- --------------------------------------------------------

--
-- Struktura tabulky `zavodnik`
--

CREATE TABLE `zavodnik` (
  `id_zavodnik` int(11) NOT NULL,
  `jmeno` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `mobil` varchar(20) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `zavodnik`
--

INSERT INTO `zavodnik` (`id_zavodnik`, `jmeno`, `prijmeni`, `mobil`, `email`, `login`, `password`, `status`) VALUES
(8, 'Karel', 'Novák', '777111222', 'karel.novak@zavody.cz', 'karel', 'novak', '1'),
(9, 'Daniel', 'Jouda', '', 'd.danielcak@seznam.cz', 'Dan', 'p3Jk60y2', '1'),
(10, 'Tonda', 'Jouda', '', 'd.danielcak@ambike.com', 'jouda', 'b9IHwRc7', '1');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `registrace`
--
ALTER TABLE `registrace`
  ADD PRIMARY KEY (`id_registrace`);

--
-- Klíče pro tabulku `zavod`
--
ALTER TABLE `zavod`
  ADD PRIMARY KEY (`id_zavod`);

--
-- Klíče pro tabulku `zavodnik`
--
ALTER TABLE `zavodnik`
  ADD PRIMARY KEY (`id_zavodnik`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `registrace`
--
ALTER TABLE `registrace`
  MODIFY `id_registrace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `zavod`
--
ALTER TABLE `zavod`
  MODIFY `id_zavod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `zavodnik`
--
ALTER TABLE `zavodnik`
  MODIFY `id_zavodnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
