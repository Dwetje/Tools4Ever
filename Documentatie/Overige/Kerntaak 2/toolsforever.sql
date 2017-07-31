-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 jun 2016 om 11:25
-- Serverversie: 10.1.10-MariaDB
-- PHP-versie: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsforever`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fabriek`
--

CREATE TABLE `fabriek` (
  `fabriekID` int(3) NOT NULL,
  `fabrieknaam` varchar(30) NOT NULL,
  `telefoon` varchar(10) NOT NULL,
  `emailadres` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `fabriek`
--

INSERT INTO `fabriek` (`fabriekID`, `fabrieknaam`, `telefoon`, `emailadres`) VALUES
(1, 'Worx', '0701234567', 'info@worx.nl'),
(2, 'Black & Decker', '0601234567', 'info@B&D.nl'),
(3, 'Einhell', '0104567890', 'info@einhell.nl'),
(4, 'Kärcher', '123098765', 'info@kärcher.nl'),
(5, 'Bosch', '0201234567', 'info@bosch.nl'),
(6, 'Sencys', '090123654', 'info@sencys.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `gebruikerID` int(3) NOT NULL,
  `gebruikersnaam` varchar(75) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `wachtwoord` varchar(75) NOT NULL,
  `voorletters` varchar(5) NOT NULL,
  `tussenvoegsel` varchar(5) NOT NULL,
  `achternaam` varchar(20) NOT NULL,
  `telefoon` varchar(10) NOT NULL,
  `emailadres` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikerID`, `gebruikersnaam`, `rol`, `wachtwoord`, `voorletters`, `tussenvoegsel`, `achternaam`, `telefoon`, `emailadres`) VALUES
(1, 'MrSanchez', 'Directie', 'sanchez2016', 'G', '', 'Sanchez', '0612345678', 'sanchez@tfe.nl'),
(2, 'DhrNorton', 'Directie', 'norton2016', 'N', '', 'Norton', '0698765332', 'norton@tfe.nl'),
(3, 'MrHuisman', 'Medewerker', 'Huisman2016', 'S', '', 'Huisman', '0678786723', 'huisman@tfe.nl'),
(4, 'MvrBuijs', 'Medewerker', 'buijs2016', 'J', '', 'Buijs', '0698712347', 'buijs@tfe.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locatie`
--

CREATE TABLE `locatie` (
  `locatieID` int(3) NOT NULL,
  `locatie` varchar(30) NOT NULL,
  `adres` varchar(25) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `plaats` varchar(20) NOT NULL,
  `telefoon` varchar(10) NOT NULL,
  `emailadres` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `locatie`
--

INSERT INTO `locatie` (`locatieID`, `locatie`, `adres`, `postcode`, `plaats`, `telefoon`, `emailadres`) VALUES
(1, 'Rotterdam', 'pleesmanstraat 7', '1202 EE', 'Rotterdam', '060123567', 'rotterdam.TFE@gmail.com'),
(2, 'Almere', 'watweetjij 99', '1402 AA', 'Almere', '0901245637', 'almere.TFE@gmail.com'),
(3, 'Eindhoven', 'manmanmanweg 88', '1669 DD', 'Eindhoven', '030563913', 'eindhoven.TFE@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `productID` int(3) NOT NULL,
  `productnaam` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fabriekID` int(4) NOT NULL,
  `inkoopprijs` decimal(10,2) NOT NULL,
  `verkoopprijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productID`, `productnaam`, `type`, `fabriekID`, `inkoopprijs`, `verkoopprijs`) VALUES
(1, 'Accuboordhamer', 'WX 382', 1, '69.95', '111.75'),
(2, '4-in-1 schuurmachine', 'KA 280 K', 2, '55.95', '67.95'),
(5, 'Verstekzaag', 'BT-MS 2112', 3, '49.95', '67.49'),
(6, 'Alleszuiger', 'WD2.200', 4, '29.95', '47.96'),
(7, 'Accuboordmachine', 'PSR 14.4', 5, '59.95', '68.00'),
(8, '33-delige borenset', '', 6, '9.95', '15.20'),
(9, 'Workmate', 'WM 536', 2, '49.95', '63.20'),
(10, 'Kruislijnlaserset', 'PCL 20', 5, '99.95', '122.40');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voorraad`
--

CREATE TABLE `voorraad` (
  `voorraadID` int(3) NOT NULL,
  `locatieID` int(3) NOT NULL,
  `productID` int(3) NOT NULL,
  `minimumaantal` int(3) NOT NULL,
  `aantal` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `voorraad`
--

INSERT INTO `voorraad` (`voorraadID`, `locatieID`, `productID`, `minimumaantal`, `aantal`) VALUES
(1, 1, 1, 10, 10),
(2, 1, 2, 10, 15),
(3, 1, 5, 10, 2),
(4, 2, 6, 10, 4),
(5, 2, 1, 21, 11),
(6, 2, 7, 10, 12),
(7, 2, 8, 30, 54),
(8, 3, 9, 10, 14),
(9, 3, 10, 10, 11),
(10, 3, 1, 20, 11),
(11, 3, 7, 20, 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fabriek`
--
ALTER TABLE `fabriek`
  ADD PRIMARY KEY (`fabriekID`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`gebruikerID`);

--
-- Indexen voor tabel `locatie`
--
ALTER TABLE `locatie`
  ADD PRIMARY KEY (`locatieID`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexen voor tabel `voorraad`
--
ALTER TABLE `voorraad`
  ADD PRIMARY KEY (`voorraadID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `fabriek`
--
ALTER TABLE `fabriek`
  MODIFY `fabriekID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `gebruikerID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `locatie`
--
ALTER TABLE `locatie`
  MODIFY `locatieID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT voor een tabel `voorraad`
--
ALTER TABLE `voorraad`
  MODIFY `voorraadID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
