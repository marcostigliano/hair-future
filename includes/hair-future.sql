-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 08:26 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hair-future`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appuntamento`
--

CREATE TABLE `Appuntamento` (
  `codice` int(4) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `durata` int(3) NOT NULL,
  `costo` float NOT NULL DEFAULT '0',
  `utente` int(4) NOT NULL,
  `listaServizi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `Utente`
--

CREATE TABLE `Utente` (
 `nome` char(20) NOT NULL,
 `cognome` char(20) NOT NULL,
 `recapito` int(10) NOT NULL,
 `email` char(20) NOT NULL,
 `password` char(20) NOT NULL,
 `tipo` char(20) NOT NULL);

--
-- Dumping data for table `Appuntamento`
--

INSERT INTO `Appuntamento` (`codice`, `data`, `ora`, `durata`, `costo`, `utente`, `listaServizi`) VALUES
(1, '2017-05-08', '09:00:00', 120, 0, 1, '0001,0002,0005'),
(2, '2017-05-09', '11:00:00', 60, 0, 2, '0001,0005'),
(3, '2017-05-08', '14:00:00', 90, 0, 1, '0001,0003');


--
-- Dumping data for table `Utente`
--

INSERT INTO `Utente` (`nome`, `cognome`, `recapito`, `email`, `password`, `tipo`) VALUES
('Carlo', 'Attardi', '3896666666', 'example1@hotmail.it', 'password1', 'parrucchiere' ),
('Marco', 'Stigliano', '3896666667', 'example2@hotmail.it', 'password2', 'parrucchiere'),
('Giuseppe Pio', 'Carlone', '3896666668', 'example3@hotmail.it', 'password3', 'parrucchiere');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appuntamento`
--
ALTER TABLE `Appuntamento`
  ADD PRIMARY KEY (`codice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
