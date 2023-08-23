-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 05:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkp`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat_tugas`
--

CREATE TABLE `detail_surat_tugas` (
  `id_detail_surat` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jk` varchar(9) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `jenis_surat` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nim1` varchar(255) DEFAULT NULL,
  `nama1` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `semester` int(10) DEFAULT NULL,
  `tahun_akademik` varchar(255) DEFAULT NULL,
  `tahun_akademik_kegiatan` varchar(255) NOT NULL,
  `nama_wali` varchar(255) DEFAULT NULL,
  `nopen` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tempat_pkl` varchar(255) DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_kegiatan` date DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tujuan_penelitian` varchar(150) DEFAULT NULL,
  `judul_penelitian` varchar(50) DEFAULT NULL,
  `tempat_penelitian` varchar(255) DEFAULT NULL,
  `lokasi_penelitian` varchar(150) DEFAULT NULL,
  `lokasi_pkl` varchar(255) DEFAULT NULL,
  `lokasi_pkl_industri` varchar(255) DEFAULT NULL,
  `lama_tugas` int(50) NOT NULL,
  `rekom_dinas` varchar(11) NOT NULL DEFAULT 'Tidak',
  `foto_ktp` varchar(150) DEFAULT NULL,
  `proposal` varchar(150) DEFAULT NULL,
  `file_rekom` varchar(150) DEFAULT NULL,
  `file_surat` varchar(150) DEFAULT NULL,
  `id_surat` int(11) NOT NULL,
  `qrcode_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_surat_tugas`
--

INSERT INTO `detail_surat_tugas` (`id_detail_surat`, `nama`, `jk`, `tgl_lahir`, `tempat_lahir`, `no_surat`, `jenis_surat`, `nim`, `nim1`, `nama1`, `prodi`, `semester`, `tahun_akademik`, `tahun_akademik_kegiatan`, `nama_wali`, `nopen`, `pangkat`, `instansi`, `tempat_pkl`, `kegiatan`, `tanggal_kegiatan`, `jam`, `tgl_mulai`, `tgl_akhir`, `tujuan_penelitian`, `judul_penelitian`, `tempat_penelitian`, `lokasi_penelitian`, `lokasi_pkl`, `lokasi_pkl_industri`, `lama_tugas`, `rekom_dinas`, `foto_ktp`, `proposal`, `file_rekom`, `file_surat`, `id_surat`, `qrcode_name`) VALUES
(65, 'Fahmi Anggara Santosa', '', '0000-00-00', '', '1/II.3.AU/06.04/I/IZN/IX/2022', 'Ajukan Surat PKL', '171080200161', '1710802001345', 'Farrel Ega', 'informatika', 10, NULL, '', NULL, NULL, NULL, NULL, 'GKB', NULL, NULL, NULL, '2022-09-08', '1970-01-01', NULL, NULL, NULL, NULL, 'sidoarjo', NULL, 19243, 'Tidak', NULL, NULL, NULL, '[signed]suratID-65.pdf', 65, '87565.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `nim` char(20) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `prodi` varchar(150) DEFAULT NULL,
  `fakultas` varchar(150) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tahun_akademik` varchar(255) DEFAULT NULL,
  `jk` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `prodi`, `fakultas`, `alamat`, `tahun_akademik`, `jk`, `email`) VALUES
('', '', '', '0000-00-00', 'Informatika', 'Sains Dan Teknologi', NULL, NULL, 'laki-laki', ''),
('171080200161', 'Fahmi Anggara Santosa', 'Sidoarjo', '1999-02-09', 'informatika', 'Sains Dan Teknologi', NULL, NULL, 'laki-laki', ''),
('admin', 'Admin', 'Bangkinang, ', '1970-01-01', 'Pasca Sarjana', 'Tarbiyah dan Keguruan', '', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `tanggal_surat_masuk` date NOT NULL,
  `status_surat` varchar(50) NOT NULL,
  `nim` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat`, `tanggal_surat_masuk`, `status_surat`, `nim`) VALUES
(65, '2022-09-08', 'Selesai', '171080200161');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id_tim` int(11) NOT NULL,
  `status_dlm_tim` varchar(50) NOT NULL,
  `nim` char(20) NOT NULL,
  `nim1` varchar(255) DEFAULT NULL,
  `nama1` varchar(255) DEFAULT NULL,
  `id_detail_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id_tim`, `status_dlm_tim`, `nim`, `nim1`, `nama1`, `id_detail_surat`) VALUES
(253, 'Nama Dosen', '', '1710802001345', 'Farrel Ega', 65);

-- --------------------------------------------------------

--
-- Table structure for table `ttd`
--

CREATE TABLE `ttd` (
  `id_ttd` int(255) NOT NULL,
  `prodi` varchar(110) NOT NULL,
  `nama_kaprodi` varchar(125) NOT NULL,
  `foto_ttd` text DEFAULT NULL,
  `nik` int(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ttd`
--

INSERT INTO `ttd` (`id_ttd`, `prodi`, `nama_kaprodi`, `foto_ttd`, `nik`, `tgl_mulai`, `tgl_akhir`) VALUES
(1, 'informatika', 'pak info', '1711w-yellow-potatoes-getty-62d865b31c387fe0bcbf0e60ac8825d9_600x400.jpg', 1313131, '0000-00-00', '0000-00-00'),
(2, 'industri', 'pak indus', '35279c5fe7b8f24c84c5a27313caeb0a_tn.jpg', 12321321, '0000-00-00', '0000-00-00'),
(3, 'mesin', 'pak mesin', 'absens.JPG', 123213, '0000-00-00', '0000-00-00'),
(4, 'elektro', 'pak elektro', '8ace09d6b77949e64b19983a74b7400b_tn.jpg', 12321321, '0000-00-00', '0000-00-00'),
(5, 'pertanian', 'pak tani', 'bukti_absen.JPG', 1234442, '0000-00-00', '0000-00-00'),
(6, 'agroteknologi', 'pak agro', 'cards.JPG', 1234442, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nim` char(20) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '12345',
  `foto` varchar(150) NOT NULL DEFAULT 'default.jpg',
  `email` varchar(150) DEFAULT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `id_user_type` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nim`, `password`, `foto`, `email`, `is_active`, `id_user_type`) VALUES
(2, 'admin', 'admin', 'default.jpg', '', 1, 1),
(702, '', '', 'default.jpg', NULL, 1, 2),
(703, '', '', 'default.jpg', NULL, 1, 2),
(704, '', '', 'default.jpg', NULL, 1, 2),
(705, '', '', 'default.jpg', NULL, 1, 2),
(708, '171080200161', '$2y$10$.iafTiU6znQr/73pb0KgO.cWZJZufkBrYG99M7pq7DhlePPvY7eoe', 'default.jpg', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id_user_type` int(11) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_user_type`, `user_type`) VALUES
(1, 'Staff LPPM'),
(2, 'Dosen'),
(3, 'Pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_surat_tugas`
--
ALTER TABLE `detail_surat_tugas`
  ADD PRIMARY KEY (`id_detail_surat`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `nip` (`nim`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id_tim`),
  ADD KEY `nip` (`nim`),
  ADD KEY `id_detail_surat` (`id_detail_surat`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`id_ttd`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nip` (`nim`),
  ADD KEY `id_user_type` (`id_user_type`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_user_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_surat_tugas`
--
ALTER TABLE `detail_surat_tugas`
  MODIFY `id_detail_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id_tim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `ttd`
--
ALTER TABLE `ttd`
  MODIFY `id_ttd` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_surat_tugas`
--
ALTER TABLE `detail_surat_tugas`
  ADD CONSTRAINT `detail_surat_tugas_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `surat_masuk` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `detail_user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tim`
--
ALTER TABLE `tim`
  ADD CONSTRAINT `tim_ibfk_1` FOREIGN KEY (`id_detail_surat`) REFERENCES `detail_surat_tugas` (`id_detail_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tim_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `detail_user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_type`) REFERENCES `user_type` (`id_user_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
