-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 05:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `merchandise`
--

-- --------------------------------------------------------

--
-- Table structure for table `grub`
--

CREATE TABLE `grub` (
  `id` int(11) NOT NULL,
  `nama_grup` varchar(255) NOT NULL,
  `tahun_debut` int(11) DEFAULT NULL,
  `agensi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grub`
--

INSERT INTO `grub` (`id`, `nama_grup`, `tahun_debut`, `agensi`) VALUES
(1, 'Day 6', 2012, 'JYP Entertainment'),
(3, 'EXO\r\n', 2012, 'SM Entertainment'),
(4, 'Stray Kidz', 2018, 'JYP Entertainment'),
(5, 'nct dream', 2016, 'SM Entertainment'),
(6, 'nct 127', 2016, 'SM entertainment'),
(7, 'Wayv', 2018, 'Label v'),
(8, 'Zerobaseone', 2023, 'Wake One Entertainment'),
(9, 'aespa', 2020, 'SM Entertainment'),
(10, 'itzy', 2019, 'JYP Entertainment'),
(11, 'BTS', 2013, 'Hybe Labels'),
(12, 'Seventeen', 2015, 'Pledis Entertainment'),
(13, 'New Jeans', 2022, 'Hybe Labels'),
(14, 'Twice', 2015, 'JYP Entertainment'),
(15, 'SNSD', 2007, 'SM Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'album'),
(2, 'Lightstick'),
(3, 'season Greetings'),
(4, 'Photobook'),
(5, 'photocard'),
(6, 'sticker');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` decimal(11,0) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `status` enum('Ready Stock','Pre Order') DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_grub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `gambar`, `status`, `id_kategori`, `id_grub`) VALUES
(6, 'The 7th EXO Album Sealed EXIST ', 222, 'images/s-l400.jpg', 'Ready Stock', 1, 3),
(8, 'AESPA Season Greeting 2023', 850, 'images/sg-11134201-22110-mwoisclxeojv67.jpeg', 'Pre Order', 3, 9),
(15, 'SNSD Girls Generation Forever 1 photocard ', 80, 'images/s-l1200.jpg', 'Ready Stock', 5, 15),
(16, 'PHOTOBOOK MOTS ONE BTS CLUE ROUTE ', 500, 'images/2872e4d9-ca6c-42b0-a174-4b32538bc25c.jpg', 'Ready Stock', 4, 11),
(18, 'Twice season greeting', 250, 'images/dd962262-4a2c-44d0-ac6c-cd6331ad4d9f.jpg', 'Ready Stock', 3, 14),
(19, 'SNSD - OFFICIAL LIGHTSTICK ', 508, 'images/SNSD LS 3-600x600.jpg', 'Pre Order', 2, 15),
(20, 'OFFICIAL LIGHTSTICK SEVENTEEN VER.3 CARATBONG SEVENTEEN', 755, 'images/id-11134201-23020-f5w0pbj3rrnvf9.jpeg', 'Pre Order', 2, 12),
(21, 'ITZY OFFICIAL LIGHTRING lightstick', 739, 'images/download.jpeg', 'Pre Order', 2, 10),
(22, 'ZEROBASEONE - Official Lightstick', 940, 'images/65a33286-7d5d-4044-9c90-1c654c463197.jpg', 'Pre Order', 2, 8),
(23, 'OFFICIAL LIGHTSTICK BTS ARMY BOMB SE MOTS', 855, 'images/d2af2770-0501-4b34-841a-f8b40c879fd6.jpg', 'Pre Order', 2, 11),
(24, 'Photocard sehun EXO official', 165, 'images/id-11134207-7qul6-liodcz5nzc0z4d.jpeg', 'Ready Stock', 5, 3),
(25, 'OFFICIAL PHOTOCARD NCT DREAM JENO ', 287, 'images/id-11134207-7r98w-ln05yvb7fmoffd.jpeg', 'Ready Stock', 5, 5),
(26, 'PHOTOCARD PC NCT DREAM GLITCH MODE MATCHING CARD', 33, 'images/id-11134207-7r990-lmbhxnvjolv8fd.jpeg', 'Ready Stock', 5, 5),
(27, ' NCT 127 FAVORITE ALBUM SEALED', 90, 'images/0878e2ddfca1afd8026548168ed10362.jpeg', 'Ready Stock', 1, 6),
(28, 'Album NCT 127 - FACT CHECK Chandelier Version', 295, 'images/id-11134207-7r98s-ln8h37tz7cuv81.jpeg', 'Ready Stock', 1, 6),
(29, 'AESPA LOVE MAIL STICKER FREBIESS STICKER DECO KPOP', 16, 'images/id-11134207-7qul1-likdkf3bmsq5e7.jpeg', 'Ready Stock', 6, 9),
(30, 'STICKER DECO SVT', 25, 'images/id-11134207-7r98u-lmmoidkrw6cfe4.jpeg', 'Ready Stock', 6, 12),
(31, 'STRAY KIDS LOVE MAIL STICKER SKZ FREBIESS STICKER DECO', 16, 'images/id-11134207-7qul8-lipwqmwguald8d.jpeg', 'Ready Stock', 6, 4),
(32, 'WAYV OFFICIAL LIGHTSTICK', 770, 'images/id-11134207-7r98v-llg76a9czxak03.jpeg', 'Pre Order', 2, 7),
(33, 'TWICE OFFICIAL LIGHTSTICK', 905, 'images/twice.jpeg', 'Pre Order', 2, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grub`
--
ALTER TABLE `grub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_grub` (`id_grub`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grub`
--
ALTER TABLE `grub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_grub`) REFERENCES `grub` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
