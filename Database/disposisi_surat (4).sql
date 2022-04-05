-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 02:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disposisi_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat_masuk` int(11) NOT NULL,
  `diteruskan_kepada` varchar(200) NOT NULL,
  `tanda_tangan` varchar(200) NOT NULL,
  `tindak_lanjut` varchar(200) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  `diteruskan_oleh` varchar(200) NOT NULL,
  `tanggal_dibaca` date DEFAULT NULL,
  `catatan_bidang` varchar(255) DEFAULT NULL,
  `dibaca` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat_masuk`, `diteruskan_kepada`, `tanda_tangan`, `tindak_lanjut`, `catatan`, `tanggal_dikirim`, `diteruskan_oleh`, `tanggal_dibaca`, `catatan_bidang`, `dibaca`) VALUES
(1, 32, 'Bid. Infrastruktur dan Kewilayahan', 'upload/6215c36644ec0.png', 'Koordinasi / Konfirmasikan', 'ccc', '2022-02-23', 'Pimpinan', '2022-02-23', NULL, 'Y'),
(2, 32, 'Bid. Pemerintahan dan Pembangunan Manusia', 'upload/6215c57057c9b.png', 'Koordinasi / Konfirmasikan', 'ss', '2022-02-23', 'Pimpinan', '2022-02-23', '-', 'Y'),
(3, 32, 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam', 'upload/6215cd28c86a6.png', 'Tanggapan dan saran', 'cfd', '2022-02-23', 'Pimpinan', '2022-02-23', '-', 'Y'),
(4, 32, 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan', 'upload/6215ce966db4e.png', 'Koordinasi / Konfirmasikan', 'sst', '2022-02-23', 'Pimpinan', '2022-02-23', '-', 'Y'),
(5, 32, 'Bid. Infrastruktur dan Kewilayahan', 'upload/621a479196492.png', 'Koordinasi / Konfirmasikan', 'xd', '2022-02-26', 'Pimpinan', '2022-02-26', '-', 'Y'),
(7, 32, 'Sekertaris', 'upload/621a4a8ddd508.png', 'Proses lebih lanjut', 'stuju', '2022-02-26', 'Pimpinan', '2022-02-27', '-', 'Y'),
(8, 32, 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan', 'upload/621b29bf0a09c.png', 'Proses lebih lanjut', 'ss', '2022-02-27', 'Sekertaris', '0000-00-00', '-', NULL),
(9, 32, 'Bid. Pemerintahan dan Pembangunan Manusia', 'upload/621b2bcf6fcc5.png', 'Proses lebih lanjut', 'xd', '2022-02-27', 'Sekertaris', '0000-00-00', '-', 'N'),
(10, 32, 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam', 'upload/621b2cac4d836.png', 'Proses lebih lanjut', 'xds', '2022-02-27', 'Sekertaris', '0000-00-00', '-', 'N'),
(11, 32, 'Sekertaris', 'upload/621b314700ab1.', '', '', '2022-02-27', 'Pimpinan', '2022-02-27', '-', 'Y'),
(12, 32, 'Sekertaris', 'upload/621b76fee9815.', 'Belum Diproses', '', '2022-02-27', 'Pimpinan', '0000-00-00', '-', NULL),
(13, 32, 'Sekertaris', 'upload/621b771589524.', 'Belum Diproses', '', '2022-02-27', 'Pimpinan', '0000-00-00', '-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `nama_role`) VALUES
(1, 'Sekretaris'),
(2, 'Bid. Infrastruktur dan Kewilayahan'),
(3, 'Bid. Pemerintahan dan Pembangunan Manusia'),
(4, 'Bid. Perencanaan Ekonomi dan Sumber Daya Alam'),
(5, 'Bid. Perencanaan, Pengendalian dan Evaluasi Pembangunan'),
(6, 'Pimpinan'),
(7, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `nomor_agenda` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `asal_surat`, `nomor_surat`, `nomor_agenda`, `tanggal_surat`, `tanggal_diterima`, `sifat`, `perihal`, `surat`) VALUES
(28, 'Gresik Putih 07', 'ABAR/238/ABER/2022', '00000', '2022-02-05', '2022-02-25', 'Biasa', 'Apalah aku', '58_1931710041_1931710137_1931710142.pdf'),
(29, 'Menhan', '0120', '00000', '2022-02-14', '2022-02-14', 'Rahasia', 'Bom Rumah Hantu', 'Surat_Izin_Seminar_Proposal_D3MI.pdf'),
(31, 'DPD Gresik', '0009909', '09099', '2022-02-19', '2022-02-25', 'Biasa', 'aaaa', 'tes.pdf'),
(32, 'DPD', '008/T119A/0125', '1001', '2022-02-21', '2022-02-21', 'Penting', 'coba', 'tes1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `has_app` int(11) DEFAULT NULL,
  `fcm_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `role_id`, `has_app`, `fcm_token`) VALUES
(2, 'admins', 'admin', '$2y$10$IQLzrlAVnfIfi5Dq2o.MSe3e909DnwVkthsWjGdCmxrj1coGxUFce', 7, 0, NULL),
(4, 'pimpinan', 'pimpinan', '$2y$10$.o1vNMRw/vGziDYVb6VySuK9DHUEDN1LroEBONvC6dNzXK7ugNbsW', 6, 0, NULL),
(5, 'sekertaris', 'sekertaris', '$2y$10$4N75qYb6OAwivxaRP53QueCpuwKKa.csI9uTnp1O0cngdO2WeirDy', 1, 0, NULL),
(6, 'Bidang1', 'bidang1', '$2y$10$Jgi6QNppxoscBZenkOqma.e./xgJ5D/h79IIS/93XGPiKGuUsb67.', 2, 0, NULL),
(7, 'Bidang2', 'bidang2', '$2y$10$DHnbwfT6.uq8KMz0Z8TIa.u68NcV1pd14gpCdDuooSk5OcmpmwYkq', 3, 0, NULL),
(10, 'bidang3', 'bidang3', '$2y$10$p4x4Z.qzgulrbPIR0n50OeZT2OZcU07Jp5zdAW.Jnln3.qyRdXvjS', 4, 0, NULL),
(11, 'bidang4', 'bidang4', '$2y$10$85ptTwTz/QQeAidYtDS8Ae9z2Eu9OjNpMUFikRwvK9MVos8059Kku', 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
