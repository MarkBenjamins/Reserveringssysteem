-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 dec 2019 om 14:40
-- Serverversie: 10.4.8-MariaDB
-- PHP-versie: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sollestijn`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `extrareservering`
--

CREATE DATABASE sollestijn;
USE sollestijn;

CREATE TABLE `extrareservering` (
  `id` int(11) NOT NULL,
  `hulpmiddel_id` int(11) NOT NULL,
  `reservering_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `extrareservering`
--

INSERT INTO `extrareservering` (`id`, `hulpmiddel_id`, `reservering_id`) VALUES
(1, 1, 2),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(64) NOT NULL,
  `wachtwoord` varchar(256) NOT NULL,
  `rechten` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`id`, `gebruikersnaam`, `wachtwoord`, `rechten`) VALUES
(2, 'admin', 'admin', 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hulpmiddel`
--

CREATE TABLE `hulpmiddel` (
  `id` int(11) NOT NULL,
  `beschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `hulpmiddel`
--

INSERT INTO `hulpmiddel` (`id`, `beschrijving`) VALUES
(1, 'Elektrische laadpaal'),
(2, 'Elektrische fiets'),
(3, 'Fiets'),
(4, 'Tandem');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kamer`
--

CREATE TABLE `kamer` (
  `id` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `omschrijving` varchar(250) NOT NULL,
  `beschikbaar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `kamer`
--

INSERT INTO `kamer` (`id`, `type`, `omschrijving`, `beschikbaar`) VALUES
(1, 1, 'Een kamer voor een persoon met een bad, douche, wc, tv en een bed.', 1),
(2, 1, 'Een kamer voor een persoon met een bad, douche, wc, tv en een bed.', 1),
(3, 1, 'Een persoons kamer met douche, bad, tv, wc.', 1),
(4, 1, 'Een persoons kamer met douche, bad, tv, wc.', 1),
(5, 1, 'Een persoons kamer met douche, bad, tv, wc.', 1),
(6, 3, 'Vier persoons kamer, vier aparte bedden. Luxe grote badkamer.', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(64) NOT NULL,
  `achternaam` varchar(64) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoonnummer` varchar(20) NOT NULL,
  `geboortedatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `voornaam`, `achternaam`, `email`, `telefoonnummer`, `geboortedatum`) VALUES
(1, 'Wesley', 'Schoonbeek', 'wj.schoonbeek@gmail.com', '0625387260', '1996-02-15'),
(2, 'Jannie', 'Vierentwintig', 'Jannie24@gmail.com', '0624242424', '1924-12-24');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kortingscode`
--

CREATE TABLE `kortingscode` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `hoeveel` int(11) NOT NULL,
  `percentage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medereiziger`
--

CREATE TABLE `medereiziger` (
  `id` int(11) NOT NULL,
  `reservering_id` int(11) NOT NULL,
  `leeftijd` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `prijsformule`
--

CREATE TABLE `prijsformule` (
  `id` int(11) NOT NULL,
  `hoeveel` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `kamer_id` int(11) NOT NULL,
  `kortingscode_id` int(11) DEFAULT NULL,
  `ontbijt` varchar(250) NOT NULL,
  `aantalpersonen` int(11) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `extra` varchar(250) NOT NULL,
  `totaalprijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`id`, `klant_id`, `kamer_id`, `kortingscode_id`, `ontbijt`, `aantalpersonen`, `begindatum`, `einddatum`, `extra`, `totaalprijs`) VALUES
(2, 1, 1, NULL, 'Geen gluten.', 0, '2019-12-17', '2019-12-18', 'Extra handdoek', 0),
(3, 2, 6, NULL, 'Geen.', 0, '2019-12-17', '2019-12-18', 'Geen.', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `typekamer`
--

CREATE TABLE `typekamer` (
  `type` int(2) NOT NULL,
  `prijs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `typekamer`
--

INSERT INTO `typekamer` (`type`, `prijs`) VALUES
(1, 50),
(2, 100),
(3, 150);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `extrareservering`
--
ALTER TABLE `extrareservering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_FK_extrareservering_hulpmiddel` (`hulpmiddel_id`),
  ADD KEY `PK_FK_extrareservering_reservering` (`reservering_id`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `hulpmiddel`
--
ALTER TABLE `hulpmiddel`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_FK_kamer_typekamer` (`type`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kortingscode`
--
ALTER TABLE `kortingscode`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medereiziger`
--
ALTER TABLE `medereiziger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_FK_reservering_medereiziger` (`reservering_id`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_FK_klant_reservering` (`klant_id`),
  ADD KEY `PK_FK_kamer_reservering` (`kamer_id`),
  ADD KEY `PK_FK_kortingscode_reservering` (`kortingscode_id`);

--
-- Indexen voor tabel `typekamer`
--
ALTER TABLE `typekamer`
  ADD PRIMARY KEY (`type`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `extrareservering`
--
ALTER TABLE `extrareservering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `hulpmiddel`
--
ALTER TABLE `hulpmiddel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `kamer`
--
ALTER TABLE `kamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `medereiziger`
--
ALTER TABLE `medereiziger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `extrareservering`
--
ALTER TABLE `extrareservering`
  ADD CONSTRAINT `PK_FK_extrareservering_hulpmiddel` FOREIGN KEY (`hulpmiddel_id`) REFERENCES `hulpmiddel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PK_FK_extrareservering_reservering` FOREIGN KEY (`reservering_id`) REFERENCES `reservering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD CONSTRAINT `PK_FK_kamer_typekamer` FOREIGN KEY (`type`) REFERENCES `typekamer` (`type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `medereiziger`
--
ALTER TABLE `medereiziger`
  ADD CONSTRAINT `PK_FK_reservering_medereiziger` FOREIGN KEY (`reservering_id`) REFERENCES `reservering` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD CONSTRAINT `PK_FK_kamer_reservering` FOREIGN KEY (`kamer_id`) REFERENCES `kamer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PK_FK_klant_reservering` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `PK_FK_kortingscode_reservering` FOREIGN KEY (`kortingscode_id`) REFERENCES `kortingscode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
