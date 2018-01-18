-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 07:07 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siatex_digilibdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_buku`
--

CREATE TABLE IF NOT EXISTS `ms_buku` (
  `id_buku` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jenis` int(11) NOT NULL COMMENT '1=hardcopy,2=softcopy',
  `judul` varchar(150) NOT NULL,
  `abstract` tinytext NOT NULL,
  `ISBN` char(13) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `operator` char(11) NOT NULL,
  `cover` text NOT NULL,
  `file` text NOT NULL,
  `judul_seo` tinytext NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_buku`
--

INSERT INTO `ms_buku` (`id_buku`, `kategori_id`, `jenis`, `judul`, `abstract`, `ISBN`, `penulis`, `penerbit`, `tanggal`, `operator`, `cover`, `file`, `judul_seo`, `create_at`, `update_at`) VALUES
(1, 1, 1, 'cintalah yesus karena Allah', 'Melihat kembali ke belakang, apa yang terasa aneh bagi saya sekarang bukanlah kaum hippie yang ingin mempraktekkan ajaran-ajaran Yesus, tetapi fakta bahwa orang-orang mengkritik mereka karena hal itu. Apa yang tampak lebih aneh adalah sebagian orang Krist', '0978687', 'bayu kurniawan', 'bakwan industrie', '0000-00-00', 'Totok Marsa', 'logo_smk_texmako.jpg', '', 'cintalah-yesus-karena-allah', '2016-02-09 01:21:07', '0000-00-00 00:00:00'),
(2, 2, 2, 'jalan kebenaran itu ada disetiap kaki kita', 'Yesus berjenggot, sebagaimana umat Muslim juga dianjurkan untuk berjenggot dalam Islam. Sementara itu, hanya sedikit penganut Kristen yang berjenggot. \r\nYesus berpakaian sederhana. Jika kita menutup mata dan membayangkan rupa Yesus, kita melihat jubah yan', '08979', 'bayu kurniawan', 'bakwan industrie', '2010-01-01', 'Totok Marsa', 'logo_smk_texmako1.jpg', 'publikasi_kepercayaan.pdf', 'jalan-kebenaran-itu-ada-disetiap-kaki-kita', '2016-02-09 01:23:47', '0000-00-00 00:00:00'),
(3, 1, 1, 'hybrid robot yang bisa memahami semua konsep bahasa pemprograman', 'robot adalah manusia ke dua bagi manusia itu sendiri, mampu dan bisa lebih cerdas dari pada manusia dalam menjalankan tugas yang diperintahkan, buku ini bercerita tentang konsep robot hybird yang mengerti konsep bahasa pemprograman untuk mempermudah kerja', '123213412', 'bayu kurniawan', 'bakwan industrie', '2010-02-01', 'Totok Marsa', 'Cerita-Puncak-Carstensz-Pyramid-di-Puncak-Jayawijaya-Papua.jpg', '', 'hybrid-robot-yang-bisa-memahami-semua-konsep-bahasa-pemprograman', '2016-02-09 08:49:07', '0000-00-00 00:00:00'),
(4, 1, 1, 'susansi sragentinawati', 'gfiauwgrfuagwrlfhabwilrebfagri.', '088787', 'zakka', 'rm tegal', '2016-02-09', 'Totok Marsa', 'review.jpg', '', 'susansi-sragentinawati', '2016-02-09 18:49:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kategori`
--

CREATE TABLE IF NOT EXISTS `ms_kategori` (
  `kategori_id` tinyint(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_kategori`
--

INSERT INTO `ms_kategori` (`kategori_id`, `nama`, `lokasi`, `create_at`, `update_at`) VALUES
(1, 'Teknologi terapan', 'H.3.4', '2016-01-14 06:35:08', '2016-01-14 07:31:59'),
(2, 'Pendidikan Agama', 'H.4.1', '2016-01-24 05:35:11', '2016-02-01 10:28:34'),
(3, 'MATEMATIKA', '2.1', '2016-02-01 10:28:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kembali`
--

CREATE TABLE IF NOT EXISTS `ms_kembali` (
  `id` int(11) NOT NULL,
  `id_transaksi` char(13) NOT NULL,
  `denda` varchar(50) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_kembali`
--

INSERT INTO `ms_kembali` (`id`, `id_transaksi`, `denda`, `operator`, `tanggal`, `create_at`, `update_at`) VALUES
(1, '20160125001', '5000', '', '2016-02-09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '20160125002', '', '', '2016-01-29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '20160125007', '5000', '', '2016-01-26', '2016-01-26 04:19:44', '0000-00-00 00:00:00'),
(4, '20160126001', '', 'Iwan Budi Susanto', '2016-01-26', '2016-01-26 07:27:23', '0000-00-00 00:00:00'),
(5, '20160203001', '4000', 'Totok Marsanto', '2016-02-03', '2016-02-03 19:32:19', '0000-00-00 00:00:00'),
(6, '20160125003', '', 'Totok Marsanto', '0000-00-00', '2016-02-03 20:34:10', '0000-00-00 00:00:00'),
(7, '20160207001', '', 'Totok Marsanto', '2016-02-08', '2016-02-07 20:19:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tampil`
--

CREATE TABLE IF NOT EXISTS `ms_tampil` (
  `ISBN` char(13) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `jumlah` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ms_transaksi`
--

CREATE TABLE IF NOT EXISTS `ms_transaksi` (
  `id_transaksi` char(13) NOT NULL,
  `nis` char(7) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_transaksi`
--

INSERT INTO `ms_transaksi` (`id_transaksi`, `nis`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `operator`, `create_at`, `update_at`) VALUES
('20160209001', '121299', '2016-02-09', '2016-02-15', 'perpanjang', 'Totok Marsanto', '2016-02-09 01:29:45', '2016-02-09 01:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `ms_transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `ms_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` char(13) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `jumlah` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_transaksi_detail`
--

INSERT INTO `ms_transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `ISBN`, `jumlah`) VALUES
(1, '20160209001', '08979', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ms_user`
--

CREATE TABLE IF NOT EXISTS `ms_user` (
  `username` char(11) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_user`
--

INSERT INTO `ms_user` (`username`, `level`) VALUES
('03639004', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_menu_admin`
--

CREATE TABLE IF NOT EXISTS `tabel_menu_admin` (
  `menu_id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_menu_admin`
--

INSERT INTO `tabel_menu_admin` (`menu_id`, `nama_menu`, `icon`, `link`, `parent`) VALUES
(1, 'Dashboard', 'fa fa-home', 'dashboard', 0),
(2, 'Master', 'fa fa-database', '#', 0),
(3, 'kategori', 'fa fa-circle-o', 'kategori', 2),
(4, 'Buku', 'fa fa-circle-o', 'buku', 2),
(5, 'Transaksi', 'fa fa-sliders', 'transaksi', 0),
(6, 'Laporan', 'fa fa-tasks', '', 0),
(7, 'peminjaman', 'fa fa-circle-o', 'laporan/pinjam', 6),
(8, 'pengembalian', 'fa fa-circle-o', 'laporan/kembali', 6),
(9, 'Data siswa', 'fa fa-circle-o', 'laporan/siswa', 6),
(10, 'Data Buku', 'fa fa-circle-o', 'laporan/buku', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_buku`
--
ALTER TABLE `ms_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `ms_kembali`
--
ALTER TABLE `ms_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_tampil`
--
ALTER TABLE `ms_tampil`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `ms_transaksi`
--
ALTER TABLE `ms_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `ms_transaksi_detail`
--
ALTER TABLE `ms_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `ms_user`
--
ALTER TABLE `ms_user`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tabel_menu_admin`
--
ALTER TABLE `tabel_menu_admin`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_buku`
--
ALTER TABLE `ms_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ms_kategori`
--
ALTER TABLE `ms_kategori`
  MODIFY `kategori_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_kembali`
--
ALTER TABLE `ms_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ms_transaksi_detail`
--
ALTER TABLE `ms_transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_menu_admin`
--
ALTER TABLE `tabel_menu_admin`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
