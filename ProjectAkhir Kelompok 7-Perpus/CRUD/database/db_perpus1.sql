-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2024 at 03:58 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus1`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `password`, `role`) VALUES
(14, 'galang', 'Admin', '$2y$10$QpP3RIjo0kMQxM4c9vQ/vevlsCZfFs6NqirvCXwfa2yNSXcDm78fS', 'admin'),
(15, 'galang', 'glgm', '$2y$10$x5.35ht6N/b4YXG6kbVIA.SqpOiM1Dzs0o9zm4HLJCSQlhv.FFVjK', 'member'),
(16, 'cahyo', 'ch', '$2y$10$Z.5XiZ.TA8nOprYel3Qm9e1kkQcrAKfdm.jdl59wC6iqbMbm9XotC', 'member'),
(17, 'ch2', 'ch2', '$2y$10$nFEJArEzoywhWN4SFcjpYuspMz6Y2vUdv3DZsdgNyc3b9s/tNNJRu', 'admin'),
(18, 'Aryo', 'ry', '$2y$10$JOq17pRp3GSJWLL/7xne2.dm/1/UX.X0X9qS.U7OVr4ddkMwry6o6', 'member'),
(19, 'Daryyo', 'ryA', '$2y$10$LRVwVBd/atrYWA3SMDt/v.c658PT2Gqyr2ldzQMkFgYO18.tbel8C', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sampul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `jenis_buku`, `sampul`) VALUES
(5, 'Perahu Kertas', 'NG', 'kvyhvucyv', 'Bahan Bersyukur', '6741504657e13.jpg'),
(6, 'Muleho', 'Imam', 'kvyhvucyv', 'Komik', '67415016bb639.jpeg'),
(9, 'Ancika', 'Cahyo', 'Pt. Mrican', 'Novel', '67414746e4988.jpg'),
(11, 'pilsuf', 'glg', '', '', '674148b8b8e2a.jpg'),
(12, 'Bisnis Fun', 'mboh', 'PT. CLWK', 'Kisah Hidup', '6741506d448e0.jpg'),
(14, 'DABBBBBBBBB', 'DAB', 'PT Tunas pelita', 'Horeee', '674150e6a4085.jpeg'),
(15, 'SEJARAH DUNIA', 'Cahyo', 'he', 'Kisah Hidup', '67415aeaefaf2.jpg'),
(17, 'wg', 'Cahyo', 'kvyhvucyv', 'Kisah Hidup', '6741c86725fab.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_akun` int NOT NULL,
  `id_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `nama_peminjam`, `tgl_pinjam`, `tgl_kembali`, `id_akun`, `id_buku`) VALUES
(1, '', '2024-11-23', '2024-11-28', 0, 0),
(2, '', '2024-11-23', '2024-11-28', 0, 0),
(3, 'galang', '2024-11-23', '2024-11-28', 15, 15),
(4, 'budi', '2024-11-23', '2024-11-28', 15, 5),
(5, '', '2024-11-23', '2024-11-28', 16, 13),
(6, '', '2024-11-23', '2024-11-28', 16, 12),
(7, '', '2024-11-23', '2024-11-28', 18, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
