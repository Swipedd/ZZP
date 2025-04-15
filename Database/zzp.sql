-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 03:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zzp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_gebruiker` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsels` varchar(255) NOT NULL,
  `achternaam` varchar(255) NOT NULL,
  `leeftijd` int(11) NOT NULL,
  `geslacht` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefoonnummer` int(11) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `bedrijfsnaam` varchar(255) DEFAULT NULL,
  `btwnummer` int(11) DEFAULT NULL,
  `kvknummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_gebruiker`, `voornaam`, `tussenvoegsels`, `achternaam`, `leeftijd`, `geslacht`, `email`, `telefoonnummer`, `wachtwoord`, `bedrijfsnaam`, `btwnummer`, `kvknummer`) VALUES
(1, 'Shawn', '', 'Bonsu', 17, 'man', 'Shawn@gmail.com', 2147483647, '$2y$10$Cil60telW3VnNXj0RgrI3.XvCyMd4.Q3G4ibaBVwwEya47vYh9yqm', 'WeSmile', 2147483647, 18737651),
(2, 'Samuel', '', 'Marques Resende', 18, 'man', 'Samuel@gmail.com', 2147483647, '$2y$10$LYUJBQ961yb3rLsoQHSqAO.v2w9is1FAjLFFfIo4WiLwr08C0IVx.', '', 0, 0),
(3, 'Soufiane', '', 'Kidour', 17, 'man', 'Soufiane@gmail.com', 2147483647, '$2y$10$gV8XnUqwyboy2jTg6DpKY.6DCVJ.pE30MT8iD/cyt.y3GtiFtubVK', '', 0, 0),
(4, 'Sudenaz', '', 'Catak', 18, 'vrouw', 'Sudenaz@gmail.com', 2147483647, '$2y$10$a6wR/GWQ/zyRhMyWESSU5OEpWKUNp0uQUO2vO9qWMXW/bFOz02M2u', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE `bestellingen` (
  `id_bestellingen` int(11) NOT NULL,
  `id_gebruiker` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE `producten` (
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_gebruiker`);

--
-- Indexes for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`id_bestellingen`),
  ADD KEY `id_gebruiker` (`id_gebruiker`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_gebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `id_bestellingen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producten`
--
ALTER TABLE `producten`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD CONSTRAINT `id_gebruiker` FOREIGN KEY (`id_gebruiker`) REFERENCES `accounts` (`id_gebruiker`),
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `producten` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
