-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 10:00 AM
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
-- Database: `db_ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `nama_tabel`
--

CREATE TABLE `nama_tabel` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `foto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_iventaris`
--

CREATE TABLE `tb_iventaris` (
  `id` int(11) NOT NULL,
  `id_iventaris` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `tanggal_register` date NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_iventaris`
--

INSERT INTO `tb_iventaris` (`id`, `id_iventaris`, `nama_barang`, `kondisi`, `stok`, `tanggal_register`, `foto`) VALUES
(5, 'Gr001', 'Cireng', 'baik', 100, '2024-02-15', 0x6a616c75722f6162736f6c75742f6b652f646972656b746f72692f756e676761682f342e6a7067),
(9, 'Gr005', 'Krupuk Singkong', 'baik', 0, '2024-02-15', 0x6a616c75722f6162736f6c75742f6b652f646972656b746f72692f756e676761682f363563646262323563643337395f372e706e67),
(17, '14312Y8951', 'Jam Tangan Kayu Pria', 'baik', 10, '0000-00-00', 0x6a616c75722f6162736f6c75742f6b652f646972656b746f72692f756e676761682f74656e737572612d736561736f6e2d322d636f7665722e6a7067),
(18, '12341251', 'ADIDIDII', 'baik', 200, '0000-00-00', 0x6a616c75722f6162736f6c75742f6b652f646972656b746f72692f756e676761682f);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id` int(11) NOT NULL,
  `id_iventaris` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id`, `id_iventaris`, `nama_barang`, `nama_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `petugas`) VALUES
(1, 'Gr005', 'Cireng', 'herman', '2024-02-15', '2024-02-17', 'selesai', 'titan'),
(4, 'Gr009', 'Krupuk Ikan', 'herman', '2024-02-15', '0000-00-00', 'belum selesai', 'titan'),
(6, 'Gr005', 'Krupuk Singkong', 'herman', '2024-02-18', '0000-00-00', 'belum selesai', 'titan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nama_tabel`
--
ALTER TABLE `nama_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_iventaris`
--
ALTER TABLE `tb_iventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_iventaris`
--
ALTER TABLE `tb_iventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
