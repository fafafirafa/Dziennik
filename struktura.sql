
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `Id` int(11) NOT NULL,
  `Tresc` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Struktura tabeli dla tabeli `wykluczenia`
--

CREATE TABLE `wykluczenia` (
  `Id` int(11) NOT NULL,
  `Stream` text COLLATE utf8_unicode_ci NOT NULL,
  `Nadajacy` text COLLATE utf8_unicode_ci NOT NULL,
  `Wykluczony` text COLLATE utf8_unicode_ci NOT NULL,
  `Typ` text COLLATE utf8_unicode_ci NOT NULL,
  `Czas` int(11) DEFAULT NULL,
  `Godzina` text COLLATE utf8_unicode_ci NOT NULL,
  `Data` text COLLATE utf8_unicode_ci NOT NULL,
  `Powod` text COLLATE utf8_unicode_ci NOT NULL,
  `Szczegoly` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `wykluczenia`
--
ALTER TABLE `wykluczenia`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT dla tabeli `wykluczenia`
--
ALTER TABLE `wykluczenia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
