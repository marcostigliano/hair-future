-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Ago 30, 2017 alle 16:05
-- Versione del server: 10.1.26-MariaDB
-- Versione PHP: 7.1.8

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
-- Struttura della tabella `appuntamento`
--

CREATE TABLE `appuntamento` (
  `codice` int(4) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `durata` int(3) NOT NULL,
  `costo` float NOT NULL DEFAULT '0',
  `utente` varchar(25) NOT NULL,
  `listaServizi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `appuntamento`
--

INSERT INTO `appuntamento` (`codice`, `data`, `ora`, `durata`, `costo`, `utente`, `listaServizi`) VALUES
(4, '2017-08-31', '09:00:00', 120, 30, 'example2@hotmail.it', '0|0'),
(6, '2017-09-01', '09:00:00', 90, 30, 'example2@hotmail.it', '0|0|0'),
(7, '2017-09-01', '09:00:00', 90, 30, 'example2@hotmail.it', '0|0|0'),
(8, '2017-09-01', '09:00:00', 90, 30, 'example2@hotmail.it', '0|0|0'),
(9, '2017-09-01', '09:00:00', 90, 30, 'example2@hotmail.it', '0|0|0');

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `nome` char(40) NOT NULL,
  `descrizione` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`nome`, `descrizione`) VALUES
('categoria particolare', 'questa è la categoria particolare'),
('categoria2', 'questa è la categoria2');

-- --------------------------------------------------------

--
-- Struttura della tabella `servizio`
--

CREATE TABLE `servizio` (
  `codice` int(11) NOT NULL,
  `nome` char(20) NOT NULL,
  `descrizione` char(100) DEFAULT NULL,
  `prezzo` float NOT NULL DEFAULT '0',
  `durata` int(20) DEFAULT NULL,
  `categoria` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `servizio`
--

INSERT INTO `servizio` (`codice`, `nome`, `descrizione`, `prezzo`, `durata`, `categoria`) VALUES
(0, 'Servizio1', 'ciao questa è una descrizione di prova', 10, 30, 'categoria particolare');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `recapito` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`nome`, `cognome`, `recapito`, `email`, `password`, `tipo`) VALUES
('Carlo', 'Attardi', '2147483647', 'example1@hotmail.it', 'password1', 'parrucchiere'),
('Marco', 'Stigliano', '2147483647', 'example2@hotmail.it', 'password2', 'parrucchiere'),
('Giuseppe Pio', 'Carlone', '2147483647', 'example3@hotmail.it', 'password3', 'parrucchiere');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `Utente` (`utente`);

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nome`);

--
-- Indici per le tabelle `servizio`
--
ALTER TABLE `servizio`
  ADD PRIMARY KEY (`codice`),
  ADD UNIQUE KEY `nome_prezzo_unique` (`nome`,`prezzo`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `appuntamento`
--
ALTER TABLE `appuntamento`
  MODIFY `codice` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT per la tabella `servizio`
--
ALTER TABLE `servizio`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD CONSTRAINT `Utente` FOREIGN KEY (`utente`) REFERENCES `utente` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
