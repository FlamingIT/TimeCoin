-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 24 Paź 2016, 15:40
-- Wersja serwera: 5.5.49-0+deb8u1
-- Wersja PHP: 5.6.26-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `db-user18980`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `ID` int(6) unsigned NOT NULL,
  `skill` varchar(90) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `skills`
--

INSERT INTO `skills` (`ID`, `skill`) VALUES
(1, 'Algebra'),
(2, 'Logarytmy'),
(3, 'Rachunek prawdopodobieństwa'),
(4, 'Geometria'),
(5, 'Planimetria'),
(6, 'Własność funkcji'),
(7, 'Trygonometria'),
(8, 'Język Angielski'),
(9, 'Język Niemiecki'),
(10, 'Język Rosyjski'),
(11, 'Język Francuski'),
(12, 'Język Hiszpański'),
(13, 'Dynamika'),
(14, 'Kinematyka'),
(15, 'Pole grawitacyjne'),
(16, 'Fale i drgania'),
(17, 'Elektrostatyka'),
(18, 'Optyka'),
(19, 'Termodynamika'),
(20, 'Hydrostatyka'),
(21, 'Chemia'),
(22, 'Biologia'),
(23, 'Informatyka'),
(24, 'Systemy w sieci'),
(25, 'HTML/CSS'),
(26, 'PHP/JavaScript'),
(27, 'Programowanie strukturalne'),
(28, 'Pakiet biurowy'),
(29, 'Bazy danych'),
(30, 'Grafika'),
(31, 'Rozprawki'),
(32, 'Ortografia'),
(33, 'Gramatyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `f_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `s_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `points` int(5) NOT NULL,
  `sex` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `skl` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `brd` date NOT NULL,
  `skills` varchar(1000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `f_name`, `s_name`, `tel`, `points`, `sex`, `skl`, `brd`, `skills`) VALUES
(1, 'buk', '6eea9b7ef19179a06954edd0f6c05ceb', 'a@a', 'q', 'w', '1', 5, 'Mężczyzna', 'Technikum', '0000-00-00', 'Algebra, Logarytmy, Geometria'),
(2, 'bulkers', '6eea9b7ef19179a06954edd0f6c05ceb', 'a@a', 'sad', 'sdaa', '23', 5, 'Mężczyzna', 'Liceum', '1990-09-09', 'Algebra, Logarytmy');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
