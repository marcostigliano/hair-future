-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Ago 30, 2017 alle 11:04
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struttura della tabella `Appuntamento`
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
-- Dump dei dati per la tabella `Appuntamento`
--

INSERT INTO `Appuntamento` (`codice`, `data`, `ora`, `durata`, `costo`, `utente`, `listaServizi`) VALUES
(1, '2017-05-08', '09:00:00', 120, 0, 1, '0001,0002,0005'),
(2, '2017-05-09', '11:00:00', 60, 0, 2, '0001,0005'),
(3, '2017-05-08', '14:00:00', 90, 0, 1, '0001,0003');

-- --------------------------------------------------------

--
-- Struttura della tabella `Categoria`
--

CREATE TABLE `Categoria` (
  `nome` char(40) NOT NULL,
  `descrizione` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Categoria`
--

INSERT INTO `Categoria` (`nome`, `descrizione`) VALUES
('categoria particolare', 'questa è la categoria particolare'),
('categoria2', 'questa è la categoria2');

-- --------------------------------------------------------

--
-- Struttura della tabella `Servizio`
--

CREATE TABLE `Servizio` (
  `codice` int(11) NOT NULL,
  `nome` char(20) NOT NULL,
  `descrizione` char(100) DEFAULT NULL,
  `prezzo` float NOT NULL DEFAULT '0',
  `durata` int(20) DEFAULT NULL,
  `categoria` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Servizio`
--

INSERT INTO `Servizio` (`codice`, `nome`, `descrizione`, `prezzo`, `durata`, `categoria`) VALUES
(0, 'Servizio1', 'ciao questa è una descrizione di prova', 10, 30, 'categoria particolare');

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `nome` char(20) NOT NULL,
  `cognome` char(20) NOT NULL,
  `recapito` int(10) NOT NULL,
  `email` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `tipo` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `Utente`
--

INSERT INTO `Utente` (`nome`, `cognome`, `recapito`, `email`, `password`, `tipo`) VALUES
('Carlo', 'Attardi', 2147483647, 'example1@hotmail.it', 'password1', 'parrucchiere'),
('Marco', 'Stigliano', 2147483647, 'example2@hotmail.it', 'password2', 'parrucchiere'),
('Giuseppe Pio', 'Carlone', 2147483647, 'example3@hotmail.it', 'password3', 'parrucchiere');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Appuntamento`
--
ALTER TABLE `Appuntamento`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `Servizio`
--
ALTER TABLE `Servizio`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `nome_prezzo_unique` (`nome`,`prezzo`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Servizio`
--
ALTER TABLE `Servizio`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
