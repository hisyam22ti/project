-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 12:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_hisyam`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `kantin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `jenis`, `gambar`, `harga`, `kantin`) VALUES
(58, 'Mie Rebus', 'Makanan', 'mierebus.jpg', 10000, 25),
(59, 'Nasi Goreng', 'Makanan', 'nasi_goreng1.jpg', 10000, 25),
(60, 'Teh Es', 'Minuman', 'teh_es.png', 5000, 25),
(61, 'Teh Hangat', 'Minuman', 'teh.jpg', 5000, 25),
(62, 'Lontong', 'Makanan', 'lontong1.jpg', 10000, 25),
(63, 'Lontong', 'Makanan', 'lontong2.jpg', 10000, 27),
(64, 'Mie Goreng', 'Makanan', 'miegoreng1.jpg', 10000, 27),
(65, 'Mie Rebus', 'Makanan', 'mierebus1.jpg', 10000, 27),
(67, 'Mienas', 'Makanan', 'mienas.jpg', 10000, 27),
(68, 'Teh Es', 'Minuman', 'teh_es1.png', 5000, 27),
(69, 'Teh Hangat', 'Minuman', 'teh1.jpg', 5000, 27),
(71, 'Mienas', 'Makanan', 'mienas2.jpg', 10000, 25),
(72, 'Mie Goreng', 'Makanan', 'miegoreng2.jpg', 10000, 25),
(73, 'Mie Goreng', 'Makanan', 'miegoreng3.jpg', 10000, 28),
(74, 'Mie Rebus', 'Makanan', 'mierebus2.jpg', 10000, 28),
(75, 'Teh Es', 'Minuman', 'teh_es2.png', 5000, 28),
(76, 'Teh Hangat', 'Minuman', 'teh2.jpg', 5000, 28),
(77, 'Nasi Goreng', 'Makanan', 'nasi_goreng2.jpg', 10000, 28),
(78, 'Lontong', 'Makanan', 'lontong3.jpg', 10000, 28),
(79, 'Lontong', 'Makanan', 'lontong4.jpg', 10000, 29),
(80, 'Mie Goreng', 'Makanan', 'miegoreng4.jpg', 10000, 29),
(81, 'Mie Rebus', 'Makanan', 'mierebus3.jpg', 10000, 29),
(82, 'Nasi Goreng', 'Makanan', 'nasi_goreng3.jpg', 10000, 29),
(83, 'Teh Es', 'Minuman', 'teh_es3.png', 5000, 29),
(84, 'Teh Hangat', 'Minuman', 'teh3.jpg', 5000, 29);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(10) NOT NULL,
  `menu` int(10) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `porsi` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `meja` varchar(10) NOT NULL,
  `customer` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `menu`, `deskripsi`, `porsi`, `harga`, `meja`, `customer`, `status`, `date_created`) VALUES
(13, 58, '', 1, 10000, '1', 26, 'Sudah dibayar', '2023-12-26 07:46:37'),
(14, 58, '', 3, 30000, '3', 26, 'Sudah dibayar', '2023-12-29 16:17:51'),
(15, 58, '', 1, 10000, '1', 26, 'Sudah dibayar', '2023-12-29 17:04:35'),
(16, 60, '', 1, 5000, '1', 26, 'Sudah dibayar', '2023-12-29 17:06:34'),
(18, 59, '', 3, 30000, '1', 26, 'Sudah dibayar', '2023-12-29 17:10:58'),
(19, 62, '', 3, 30000, '3', 26, 'Sudah dibayar', '2023-12-29 17:11:11'),
(20, 63, '', 3, 30000, '1', 26, 'Sudah dibayar', '2023-12-29 17:12:30'),
(21, 67, '', 5, 50000, '5', 26, 'Sudah dibayar', '2023-12-29 17:12:38'),
(22, 68, '', 1, 5000, '1', 26, 'Sudah dibayar', '2023-12-29 17:31:13'),
(23, 67, '', 3, 30000, '3', 26, 'Sudah dibayar', '2023-12-29 17:31:52'),
(24, 63, '', 9, 90000, '9', 26, 'Sudah dibayar', '2023-12-29 17:33:06'),
(25, 62, '', 2, 20000, '2', 26, 'Sudah dibayar', '2023-12-30 08:09:51'),
(26, 67, '', 1, 10000, '1', 26, 'Sudah dibayar', '2023-12-31 14:11:33'),
(27, 62, '', 1, 10000, '1', 26, 'Belum dibayar', '2024-01-01 10:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `role` varchar(150) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `hp`, `gambar`, `role`, `date_created`) VALUES
(1, 'Admin', 'admin@mahasiswa.pcr.ac.id', '$2y$10$FCWz.TDLx6cYLpD3qfobIOfb1du5nunqSZgnlkBqhHg.3449TV5y2', '08', 'def.jpg', 'Admin', '2023-12-31 13:34:05'),
(25, 'Kantin Rini', 'kantin1@kantin.id', '$2y$10$j0ujnQR.yegFWWV.NPHuFOzg61vLXZ89GyduOoheCs13rM2rVqQrS', '081', 'rini.jpg', 'Kantin', '2023-12-31 13:34:05'),
(26, 'a', 'a@pcr.ac.id', '$2y$10$JsZE9HEBwwbpv5iw5FtR2.rZR869vRWj6MvvLim.gyoLK0L0FQ8bq', '089', 'hf1.png', 'Customer', '2023-12-31 13:34:05'),
(27, 'Kantin Afwah', 'kantin2@kantin.id', '$2y$10$acFA4QkL9pq9FrccwYuX.esQunJ.kAG2j.cylPnZiBG0P6Jl3iloK', '082', 'afwah.jpg', 'Kantin', '2023-12-31 13:34:05'),
(28, 'Kantin Mbak Adek', 'kantin3@kantin.id', '$2y$10$WUTrSTnaaC3qr89nASCrwekvAwv8J5EzmtWgcb36jmeGVNT2.jzhq', '083', 'mbak_adek1.jpg', 'Kantin', '2023-12-31 13:34:05'),
(29, 'Kantin Wahyu', 'kantin4@kantin.id', '$2y$10$J7A62wY5D5azAp0qjQKcKeNZ.0CTsb3KZScsjVEXx/FzXO9XsgifK', '084', 'wahyu.jpg', 'Kantin', '2023-12-31 13:34:05'),
(30, 'b', 'b@pcr.ac.id', '$2y$10$6qovVP49iRBmOT8VJ95c0OsEll9Pxt5TZoE.U2jj501JCghpnZ9iK', '080', '12511869711.jpg', 'Customer', '2023-12-31 13:34:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kantin` (`kantin`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`),
  ADD KEY `menu` (`menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `kantin` FOREIGN KEY (`kantin`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `customer` FOREIGN KEY (`customer`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `menu` FOREIGN KEY (`menu`) REFERENCES `menu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
