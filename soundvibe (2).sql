-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2023 alle 21:26
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
-- Struttura della tabella `38_0`
--

CREATE TABLE `38_0` (
  `Id` int(11) NOT NULL,
  `Id_Playlist` int(11) NOT NULL,
  `Id_Song` int(11) NOT NULL,
  `Data_Aggiunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `38_0`
--

INSERT INTO `38_0` (`Id`, `Id_Playlist`, `Id_Song`, `Data_Aggiunta`) VALUES
(1, 1, 1, '2023-05-16'),
(3, 1, 2, '2023-05-17'),
(4, 2, 2, '2023-05-17');

-- --------------------------------------------------------

--
-- Struttura della tabella `38_2`
--

CREATE TABLE `38_2` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL,
  `Immagine` varchar(255) NOT NULL,
  `Descrizione` varchar(255) NOT NULL,
  `Autore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `38_2`
--

INSERT INTO `38_2` (`Id`, `Titolo`, `Immagine`, `Descrizione`, `Autore`) VALUES
(1, 'Chill', 'Immagine', 'Playlist con canzoni tranquille', 'Giacomo Previtali'),
(2, 'Workout', 'Immagine', 'Allenamento', 'Giacomo Previtali');

-- --------------------------------------------------------

--
-- Struttura della tabella `audios`
--

CREATE TABLE `audios` (
  `id` int(11) NOT NULL,
  `audio_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `audios`
--

INSERT INTO `audios` (`id`, `audio_url`) VALUES
(9, 'video-646e34bd844af0.69727730.mp3');

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
(20, 69, 20, 1, '0000-00-00'),
(22, 69, 21, 2, '0000-00-00'),
(23, 69, 20, 56, '0000-00-00');

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
(19, 69, 'Preferiti', ' ', ' ', ' '),
(20, 69, 'Chill', 'IMG-6464746c360c62.32366160.jpg', 'Prova', 'Giacomo Previtali'),
(21, 69, 'Prova', 'SoundVibe_Logo.png', 'Prova', 'Giacomo Previtali'),
(22, 70, 'Preferiti', ' ', ' ', ' ');

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
(2, 'Rockstar', 'SferaEbbasta', 'Rockstar', '3:15', '2023-05-17', 'Rockstar.mp3', 'Rockstar.png'),
(56, 'Intro Orange County', 'Tedua', 'Aspettando Orange County', '03:51', '2016-01-25', 'audio-646e63a0402c52.49073485.mp3', '');

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
(69, 'Giacomo', 'Previtali', '2004-01-26', 'PRVGCM26A04A794H', 'giacomoprevitali11@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(70, 'admin', 'admin', '2004-01-26', 'ADMIN', 'admin1234@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `38_0`
--
ALTER TABLE `38_0`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Playlist` (`Id_Playlist`),
  ADD KEY `Id_Song` (`Id_Song`);

--
-- Indici per le tabelle `38_2`
--
ALTER TABLE `38_2`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT per la tabella `38_0`
--
ALTER TABLE `38_0`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `38_2`
--
ALTER TABLE `38_2`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `audios`
--
ALTER TABLE `audios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `canzoni`
--
ALTER TABLE `canzoni`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `playlist`
--
ALTER TABLE `playlist`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT per la tabella `song`
--
ALTER TABLE `song`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `38_0`
--
ALTER TABLE `38_0`
  ADD CONSTRAINT `Id_Playlist` FOREIGN KEY (`Id_Playlist`) REFERENCES `38_2` (`Id`),
  ADD CONSTRAINT `Id_Song` FOREIGN KEY (`Id_Song`) REFERENCES `song` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
