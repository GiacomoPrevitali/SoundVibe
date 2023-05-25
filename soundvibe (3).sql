-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 25, 2023 alle 21:29
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soundvibe`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `canzoni`
--

CREATE TABLE `canzoni` (
  `Id` int(11) NOT NULL,
  `Id_Utente` int(11) NOT NULL,
  `Id_Playlist` int(11) NOT NULL,
  `Id_Song` int(11) NOT NULL,
  `Data_Aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `canzoni`
--

INSERT INTO `canzoni` (`Id`, `Id_Utente`, `Id_Playlist`, `Id_Song`, `Data_Aggiunta`) VALUES
(28, 71, 25, 59, '0000-00-00'),
(29, 71, 23, 58, '0000-00-00'),
(30, 71, 26, 59, '0000-00-00'),
(31, 71, 26, 58, '0000-00-00'),
(32, 71, 26, 57, '0000-00-00'),
(33, 71, 26, 60, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `playlist`
--

CREATE TABLE `playlist` (
  `Id` int(11) NOT NULL,
  `Id_Utente` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Immagine` varchar(255) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `Autore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `playlist`
--

INSERT INTO `playlist` (`Id`, `Id_Utente`, `Titolo`, `Immagine`, `Descrizione`, `Autore`) VALUES
(22, 70, 'Preferiti', ' ', ' ', ' '),
(23, 71, 'Preferiti', ' ', ' ', ' '),
(25, 71, 'Macchina', 'IMG-646fae7292cb31.31949170.lose.jpeg', 'Canzoni per la macchina', 'Giacomo Previtali'),
(26, 71, 'All ', '', 'tutte le canzoni', 'Giacomo Previtali');

-- --------------------------------------------------------

--
-- Struttura della tabella `song`
--

CREATE TABLE `song` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Artista` varchar(255) NOT NULL,
  `Album` varchar(255) NOT NULL,
  `Durata` varchar(255) NOT NULL,
  `Data_Aggiunta` date NOT NULL,
  `audio_url` varchar(255) NOT NULL,
  `Immagine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `song`
--

INSERT INTO `song` (`Id`, `Titolo`, `Artista`, `Album`, `Durata`, `Data_Aggiunta`, `audio_url`, `Immagine`) VALUES
(57, 'A Sky Full of Stars', 'Coldplay', 'Ghost Stories', '04:14', '2014-05-02', 'audio-646fab53aeaba9.37941724.Coldplay - A Sky Full Of Stars (Official Video).mp3', 'IMG-646fab60a778f9.64666622.SkyFullOfStar.jpeg'),
(58, 'Lose YourSelf', 'Eminem', '8 Mile', '05:27', '2002-10-28', 'audio-646fad1013f2a1.56417433.Eminem - Lose Yourself [HD].mp3', 'IMG-646fad15a36da9.71938198.lose.jpeg'),
(59, 'Firework', 'Katy Perry', 'Teenage Dream', '03:47', '2010-10-26', 'audio-646fad5743f7e0.12815990.Katy Perry - Firework (Lyrics).mp3', 'IMG-646fad5f6f05c5.78370131.firework-katy-perry-significato-traduzione.jpg'),
(60, 'Perfect', 'Ed Sheeran', '÷', '04:22', '2017-09-26', 'audio-646fad8fc1cf65.58979743.Ed Sheeran - Perfect.mp3', 'IMG-646fad94481789.95661109.perfect.jpeg');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Data_Nascita` varchar(255) NOT NULL,
  `Codice_Fiscale` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`Id`, `Nome`, `Cognome`, `Data_Nascita`, `Codice_Fiscale`, `Mail`, `Pass`) VALUES
(70, 'admin', 'admin', '2004-01-26', 'ADMIN', 'admin1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(71, 'Giacomo', 'Previtali', '2004-01-26', 'PRVGCM26A04A794H', 'giacomoprevitali11@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `canzoni`
--
ALTER TABLE `canzoni`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `canzoni`
--
ALTER TABLE `canzoni`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT per la tabella `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `song`
--
ALTER TABLE `song`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
