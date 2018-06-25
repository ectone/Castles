-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 25.Jún 2018, 21:02
-- Verzia serveru: 10.1.33-MariaDB
-- Verzia PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `dbcastles`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `castles`
--

CREATE TABLE `castles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `lon` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `castles`
--

INSERT INTO `castles` (`id`, `name`, `lon`, `lat`) VALUES
(1, 'Oravský hrad', 19.358853, 49.261783),
(2, 'Spišský hrad', 20.768281, 49),
(3, 'Bratislavský hrad', 17.1, 48.142222);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `castles`
--
ALTER TABLE `castles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `castles`
--
ALTER TABLE `castles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
