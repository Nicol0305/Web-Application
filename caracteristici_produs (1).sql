-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 06, 2021 la 03:09 PM
-- Versiune server: 10.4.16-MariaDB
-- Versiune PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `caracteristici_produs`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs`
--

CREATE TABLE `produs` (
  `IDProdus` int(11) NOT NULL,
  `nume_produs` varchar(25) NOT NULL,
  `pret_produs` decimal(8,2) NOT NULL,
  `cantitate` int(3) DEFAULT NULL,
  `descriere` text DEFAULT NULL,
  `comentarii` text DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `produs`
--

INSERT INTO `produs` (`IDProdus`, `nume_produs`, `pret_produs`, `cantitate`, `descriere`, `comentarii`, `rating`, `image`) VALUES
(2, 'Iphone 11', '3500.00', 12, '-', '-', 4, 'iphone11.jpg'),
(3, 'Samsung Galaxy S21', '4100.00', 8, '-', '-', 5, 's21.jpg'),
(4, 'Samsung Galaxy S20', '3400.00', 20, '5G, Dual SIM, 128GB, Cloud Pink', 'Cod Produs	SM-G981BZIDEUE', 2, 's20.jpg'),
(5, 'Iphone 12', '4500.00', 10, 'descriere', 'comentariu', 5, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`IDProdus`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `produs`
--
ALTER TABLE `produs`
  MODIFY `IDProdus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
