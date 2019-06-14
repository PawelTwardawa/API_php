-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2019, 18:06
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `trojkatydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `answers`
--

CREATE TABLE `answers` (
  `ID` int(11) NOT NULL,
  `answer` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `answers`
--

INSERT INTO `answers` (`ID`, `answer`) VALUES
(1, 'odpowiedz poprawna'),
(2, 'odpowiedz niepoprawna 1'),
(3, 'odpowiedz niepoprawna 2'),
(4, 'odpowiedz niepoprawna 3'),
(5, 'NIE'),
(6, 'NIE'),
(7, 'NIE'),
(8, 'NIE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`ID`, `Name`) VALUES
(1, 'Testowa_Kategoria'),
(2, 'Matematyka'),
(3, 'Technologia'),
(4, 'Moda'),
(5, 'Jedzenie');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_to_questions`
--

CREATE TABLE `group_to_questions` (
  `ID_group` int(11) NOT NULL,
  `ID_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `group_to_questions`
--

INSERT INTO `group_to_questions` (`ID_group`, `ID_question`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `incorrect_answer1` int(11) NOT NULL,
  `incorrect_answer2` int(11) NOT NULL,
  `incorrect_answer3` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `question` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `questions`
--

INSERT INTO `questions` (`ID`, `correct_answer`, `incorrect_answer1`, `incorrect_answer2`, `incorrect_answer3`, `category`, `question`) VALUES
(1, 1, 2, 3, 4, 1, 'Co ja tu robie? '),
(3, 5, 6, 7, 8, 1, 'Czy W4 jest fajne?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `question_group`
--

CREATE TABLE `question_group` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `owner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `question_group`
--

INSERT INTO `question_group` (`ID`, `Name`, `owner`) VALUES
(1, 'Jakas tam grupa ', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `question_group`
--
ALTER TABLE `question_group`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `answers`
--
ALTER TABLE `answers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `question_group`
--
ALTER TABLE `question_group`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
