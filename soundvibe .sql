-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2023 alle 10:26
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
-- Struttura della tabella `45_0`
--

CREATE TABLE `45_0` (
  `Id` int(11) NOT NULL,
  `Id_Playlist` int(11) NOT NULL,
  `Id_Song` int(11) NOT NULL,
  `Data_Aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `45_2`
--

CREATE TABLE `45_2` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Immagine` varchar(255) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `Autore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `45_2`
--

INSERT INTO `45_2` (`Id`, `Titolo`, `Immagine`, `Descrizione`, `Autore`) VALUES
(1, 'Preferiti', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Struttura della tabella `46_0`
--

CREATE TABLE `46_0` (
  `Id` int(11) NOT NULL,
  `Id_Playlist` int(11) NOT NULL,
  `Id_Song` int(11) NOT NULL,
  `Data_Aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `46_0`
--

INSERT INTO `46_0` (`Id`, `Id_Playlist`, `Id_Song`, `Data_Aggiunta`) VALUES
(1, 1, 1, '0000-00-00'),
(2, 2, 1, '0000-00-00'),
(3, 1, 2, '0000-00-00'),
(4, 1, 2, '0000-00-00'),
(5, 2, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `46_2`
--

CREATE TABLE `46_2` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Immagine` varchar(255) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `Autore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `46_2`
--

INSERT INTO `46_2` (`Id`, `Titolo`, `Immagine`, `Descrizione`, `Autore`) VALUES
(1, 'Preferiti', ' ', ' ', ' '),
(2, 'Chill', 'Foto', 'Bella Playlist', 'Giacomo Previtali'),
(3, 'Workout', 'Foto', 'Allenamento', 'Giacomo Previtali');

-- --------------------------------------------------------

--
-- Struttura della tabella `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `audio_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(1, 'Acqua', 'Teuda', 'Mowgli', '4:21\r\n', '2018-03-02', 'Acqua.mp3', 'Acqua.jpg'),
(2, 'Rockstar', 'SferaEbbasta', 'Rockstar', '3:15', '2023-05-17', 'Rockstar.mp3', 'Rockstar.png');

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
(45, 'Marco', 'Salvi', '2004-06-04', 'SLVMRC04H04A794R', 'marcosalvi@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f'),
(46, 'Giacomo', 'Previtali', '2004-01-26', 'PRVGCM26A04A794H', 'giacomoprevitali11@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `45_0`
--
ALTER TABLE `45_0`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `45_2`
--
ALTER TABLE `45_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `46_0`
--
ALTER TABLE `46_0`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `46_2`
--
ALTER TABLE `46_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT per la tabella `45_0`
--
ALTER TABLE `45_0`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `45_2`
--
ALTER TABLE `45_2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `46_0`
--
ALTER TABLE `46_0`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `46_2`
--
ALTER TABLE `46_2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `song`
--
ALTER TABLE `song`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
