-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 12:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `name_admin` varchar(100) NOT NULL,
  `pass_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email_admin`, `name_admin`, `pass_admin`) VALUES
(1, 'masteradmin@enddev.com', 'Master Admin', '21232f297a57a5a743894a0e4a801fc3\r\n'),
(2, 'deviambar@enddev.com', 'Devi Ambarwati', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id_event` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tanggal_event` date NOT NULL,
  `jam_event` time NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `kuota_event` int(11) NOT NULL,
  `banner_event` varchar(150) NOT NULL,
  `sisa_kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id_event`, `id_kategori`, `nama_event`, `tanggal_event`, `jam_event`, `id_ruang`, `kuota_event`, `banner_event`, `sisa_kuota`) VALUES
(1, 1, 'DESING APLIKASI MENGGUNAKAN ADOBE XD', '2019-10-08', '13:00:00', 1, 50, 'business-banner-template_23-2148255494.jpg', 49),
(2, 2, 'Membuat Prototype', '2019-10-20', '10:00:00', 1, 50, 'online-banner-template-business-conference_23-21483103772.jpg', 50),
(3, 2, 'Membuat E-Commerce', '2019-11-30', '10:00:00', 1, 50, 'images.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'TEKNIK INFORMATIKA'),
(2, 'SISTEM INFORMASI'),
(3, 'MANAGEMENT INFORMATIKA'),
(4, 'DESAIN KOMUNIKASI VISUAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Workshop'),
(2, 'Seminar'),
(3, 'Kuliah Tamu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `jam_checkin` time NOT NULL,
  `jam_checkout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `id_event`, `id_siswa`, `jam_checkin`, `jam_checkout`) VALUES
(1, 1, 1, '00:00:00', '00:00:00'),
(4, 3, 1, '00:00:00', '00:00:00'),
(5, 3, 1, '00:00:00', '00:00:00');

--
-- Triggers `tbl_pendaftaran`
--
DELIMITER $$
CREATE TRIGGER `add_kuota` AFTER INSERT ON `tbl_pendaftaran` FOR EACH ROW BEGIN
UPDATE tbl_event
SET tbl_event.sisa_kuota = tbl_event.sisa_kuota - 1
where tbl_event.id_event = new.id_event;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruang`
--

CREATE TABLE `tbl_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruang`
--

INSERT INTO `tbl_ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'LAB A'),
(2, 'LAB B'),
(3, 'SEMINAR GEDUNG A'),
(4, 'SEMINAR GEDUNG B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nrp_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(70) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `password_siswa` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nrp_siswa`, `nama_siswa`, `id_jurusan`, `password_siswa`) VALUES
(1, 161116034, 'Devi Ambarwati', 1, '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id_slider` int(11) NOT NULL,
  `title_slider` varchar(100) NOT NULL,
  `ket_slider` varchar(100) NOT NULL,
  `img_slider` varchar(250) NOT NULL,
  `status_slider` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `title_slider`, `ket_slider`, `img_slider`, `status_slider`) VALUES
(1, 'Slider satu', 'Ini merupakan silder satu', 'images.png', 'Aktif'),
(3, 'Slider dua', 'Ini merupakan silder dua', 'online-banner-template-business-conference_23-21483103772.jpg', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ruang`
--
ALTER TABLE `tbl_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
