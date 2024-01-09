-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 11:55 AM
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
  `kantin` int(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama`, `jenis`, `gambar`, `harga`, `kantin`, `status`) VALUES
(58, 'Mie Rebus', 'Makanan', 'mierebus.jpg', 10000, 25, 'Tersedia'),
(59, 'Nasi Goreng', 'Makanan', 'nasi_goreng1.jpg', 10000, 25, 'Tersedia'),
(60, 'Teh Es', 'Minuman', 'teh_es.png', 5000, 25, 'Tersedia'),
(61, 'Teh Hangat', 'Minuman', 'teh.jpg', 5000, 25, 'Tersedia'),
(62, 'Lontong', 'Makanan', 'lontong1.jpg', 10000, 25, 'Tidak Tersedia'),
(63, 'Lontong', 'Makanan', 'lontong2.jpg', 10000, 27, 'Tersedia'),
(64, 'Mie Goreng', 'Makanan', 'miegoreng1.jpg', 10000, 27, 'Tersedia'),
(65, 'Mie Rebus', 'Makanan', 'mierebus1.jpg', 10000, 27, 'Tersedia'),
(67, 'Mienas', 'Makanan', 'mienas.jpg', 10000, 27, 'Tersedia'),
(68, 'Teh Es', 'Minuman', 'teh_es1.png', 5000, 27, 'Tersedia'),
(69, 'Teh Hangat', 'Minuman', 'teh1.jpg', 5000, 27, 'Tersedia'),
(71, 'Mienas', 'Makanan', 'mienas2.jpg', 10000, 25, 'Tersedia'),
(72, 'Mie Goreng', 'Makanan', 'miegoreng2.jpg', 10000, 25, 'Tersedia'),
(73, 'Mie Goreng', 'Makanan', 'miegoreng3.jpg', 10000, 28, 'Tersedia'),
(74, 'Mie Rebus', 'Makanan', 'mierebus2.jpg', 10000, 28, 'Tersedia'),
(75, 'Teh Es', 'Minuman', 'teh_es2.png', 5000, 28, 'Tersedia'),
(76, 'Teh Hangat', 'Minuman', 'teh2.jpg', 5000, 28, 'Tersedia'),
(77, 'Nasi Goreng', 'Makanan', 'nasi_goreng2.jpg', 10000, 28, 'Tersedia'),
(78, 'Lontong', 'Makanan', 'lontong3.jpg', 10000, 28, 'Tersedia'),
(79, 'Lontong', 'Makanan', 'lontong4.jpg', 10000, 29, 'Tersedia'),
(80, 'Mie Goreng', 'Makanan', 'miegoreng4.jpg', 10000, 29, 'Tersedia'),
(81, 'Mie Rebus', 'Makanan', 'mierebus3.jpg', 10000, 29, 'Tersedia'),
(82, 'Nasi Goreng', 'Makanan', 'nasi_goreng3.jpg', 10000, 29, 'Tersedia'),
(83, 'Teh Es', 'Minuman', 'teh_es3.png', 5000, 29, 'Tersedia'),
(84, 'Teh Hangat', 'Minuman', 'teh3.jpg', 5000, 29, 'Tersedia');

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estimasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `menu`, `deskripsi`, `porsi`, `harga`, `meja`, `customer`, `status`, `date_created`, `estimasi`) VALUES
(1, 62, '', 1, 10000, '1', 30, 'Sudah dibayar', '2024-01-08 23:28:52', 5),
(2, 71, '', 2, 20000, '1', 30, 'Belum diantar', '2024-01-08 23:27:48', 10),
(3, 62, '', 4, 40000, '1', 30, 'Belum diantar', '2024-01-08 23:28:17', 15),
(4, 59, '', 4, 40000, '1', 26, 'Sudah dibayar', '2024-01-08 23:30:03', 15),
(5, 58, '', 1, 10000, '1', 30, 'Belum diantar', '2024-01-08 23:30:32', 15),
(6, 58, '', 1, 10000, '1', 26, 'Belum diantar', '2024-01-09 03:08:58', 20);

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
(30, 'b', 'b@pcr.ac.id', '$2y$10$6qovVP49iRBmOT8VJ95c0OsEll9Pxt5TZoE.U2jj501JCghpnZ9iK', '080', '12511869711.jpg', 'Customer', '2024-01-02 02:34:43');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
