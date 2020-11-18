-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3306
-- Timp de generare: nov. 18, 2020 la 02:48 PM
-- Versiune server: 10.3.16-MariaDB
-- Versiune PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `id15313870_magazin`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nume` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nume`) VALUES
(1, 'Laptopuri'),
(2, 'Telefoane mobile'),
(3, 'Camere video'),
(7, 'Televizoare'),
(9, 'Imprimante');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `comanda`
--

CREATE TABLE `comanda` (
  `id_comanda` int(11) NOT NULL,
  `id_utilizator` int(11) NOT NULL,
  `valoare` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `confirmare` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs`
--

CREATE TABLE `produs` (
  `id_produs` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `nume` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descriere` text COLLATE utf8_unicode_ci NOT NULL,
  `pret` int(11) NOT NULL,
  `imagine` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oferta` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `produs`
--

INSERT INTO `produs` (`id_produs`, `id_cat`, `nume`, `descriere`, `pret`, `imagine`, `oferta`) VALUES
(1, 1, 'Laptop 1', 'procesor placa video etc', 600, 'img1.jpg', 1),
(2, 2, 'Telefon1 ', 'bla bla bla', 1000, 'img2.jpg', 1),
(3, 7, 'Televizor1', 'chestiii', 600, 'img3.jpg', 0),
(4, 3, 'Camera 2', 'Camera de filmat', 700, 'img4.jpg', 0),
(5, 9, 'Imprimanta1', 'Imprimanta color', 700, 'img5.jpg', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `produs_comanda`
--

CREATE TABLE `produs_comanda` (
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nr_produse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `utilizator`
--

CREATE TABLE `utilizator` (
  `id_utilizator` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `nume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prenume` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `judet` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `oras` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `strada` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numar` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `cod_postal` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `vkey` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `verificat` tinyint(1) NOT NULL DEFAULT 0,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Eliminarea datelor din tabel `utilizator`
--

INSERT INTO `utilizator` (`id_utilizator`, `username`, `password`, `nume`, `prenume`, `telefon`, `mail`, `judet`, `oras`, `strada`, `numar`, `cod_postal`, `statut`, `vkey`, `verificat`, `createdate`) VALUES
(21, 'GMaster', '$2y$10$hrL7MRw0yZSyWnvoKt38IelD4EsEqfGcHfFJH76QXuJdDuYE5H7p6', 'Gabriel', 'Hirnea', '0732855380', 'hirneagabriel2000@hotmail.com', 'Vrancea', 'Plostina', 'Principala', '1', '627448', 1, '79dc78669fc647de18a3a780fe3a6d15', 1, '2020-11-17 11:28:12.026082');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexuri pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `FK_id_utilizator` (`id_utilizator`);

--
-- Indexuri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `FK_id_cat` (`id_cat`);

--
-- Indexuri pentru tabele `produs_comanda`
--
ALTER TABLE `produs_comanda`
  ADD KEY `fk_id_comanda` (`id_comanda`),
  ADD KEY `fk_id_produs` (`id_produs`);

--
-- Indexuri pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  ADD PRIMARY KEY (`id_utilizator`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `comanda`
--
ALTER TABLE `comanda`
  MODIFY `id_comanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `produs`
--
ALTER TABLE `produs`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pentru tabele `utilizator`
--
ALTER TABLE `utilizator`
  MODIFY `id_utilizator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `FK_id_utilizator` FOREIGN KEY (`id_utilizator`) REFERENCES `utilizator` (`id_utilizator`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `produs`
--
ALTER TABLE `produs`
  ADD CONSTRAINT `FK_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constrângeri pentru tabele `produs_comanda`
--
ALTER TABLE `produs_comanda`
  ADD CONSTRAINT `fk_id_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comanda` (`id_comanda`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_produs` FOREIGN KEY (`id_produs`) REFERENCES `produs` (`id_produs`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
