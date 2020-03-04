-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 03:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tegal_jaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `gambar` varchar(255) NOT NULL DEFAULT 'default.png',
  `theme` varchar(20) NOT NULL DEFAULT 'sb_admin',
  `kategori_user` enum('Admin','Kasir','pelayan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `nama`, `status`, `gambar`, `theme`, `kategori_user`) VALUES
(2, 'admin@admin.com', 'admin', 'admin', 1, 'default.png', 'sb_admin', 'Admin'),
(3, 'kasir1@kasir.com', 'kasir1', 'Akmal', 1, 'default.png', 'sb_admin', 'Kasir'),
(4, 'kasir2@kasir.com', 'kasir2', 'Rina', 1, 'default.png', 'sb_admin', 'Kasir'),
(5, 'pelayan1@pelayan.com', 'pelayan1', 'Joko', 1, 'default.png', 'sb_admin', 'pelayan'),
(6, 'pelayan2@pelayan.com', 'pelayan2', 'Ayu', 1, 'default.png', 'sb_admin', 'pelayan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kategori`
--

CREATE TABLE `detail_kategori` (
  `id_detail` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `judul_kategori` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(7) NOT NULL,
  `deskripsi_detail` text NOT NULL,
  `poin` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kategori`
--

INSERT INTO `detail_kategori` (`id_detail`, `id_kategori`, `judul_kategori`, `gambar`, `harga`, `deskripsi_detail`, `poin`) VALUES
(1, 6, 'Ikan Asin Sambal Balado', '03466-img-1.jpg', 3000, '<p style=\"margin-left: 21.3pt; text-align: justify;\">\n	Ikan Asin dengan sambal balado</p>\n<p>\n	&nbsp;</p>\n', 0),
(2, 2, 'Ayam Goreng', 'b70d3-img_5586.jpg', 12000, '<p>\n	Ayam goreng&nbsp;</p>\n', 0),
(3, 2, 'Ayam Balado', '3ba49-img_5639.jpg', 8000, '<p>\n	Ayam dengan sambal balado</p>\n', 0),
(4, 2, 'Ayam Opor', '70af6-img_5619.jpg', 8000, '<p style=\"margin-left:21.3pt;\">\n	Ayam dengan kuah kuning</p>\n<p>\n	&nbsp;</p>\n', 0),
(5, 5, 'Telur Dadar', 'a7c00-img-2.jpg', 4000, '<p>\n	Telur dadar</p>\n', 0),
(7, 5, 'Telur Ceplok Balado', '2420d-img_5643.jpg', 4000, '<p>\n	Telur ceplok dengan sambal balado</p>\n', 0),
(8, 5, 'Telur Ceplok Biasa', '8988e-img_5673.jpg', 4000, '<p style=\"margin-left:21.3pt;\">\n	Telur ceplok</p>\n<p>\n	&nbsp;</p>\n', 0),
(9, 7, 'Cumi Balado', '5e01d-img_5599.jpg', 3000, '<p>\n	Cumi dengan sambal balado</p>\n', 0),
(10, 8, 'Tumis Udang', 'c01f4-img_5637.jpg', 3000, '', 0),
(11, 8, 'Tumis Usus', '37a53-img_5631.jpg', 3000, '', 0),
(12, 9, 'Sayur Nangka', '62475-img_5644.jpg', 2000, '', 0),
(13, 9, 'Sayur Labu', 'b5330-img_5678.jpg', 2000, '', 0),
(14, 9, 'Sayur Pare', '0fccb-img_5628.jpg', 2000, '', 0),
(15, 9, 'Sayur Capcay', 'ec1ec-img_5583.jpg', 2000, '', 0),
(16, 9, 'Sayur Jamur', 'e6779-img_5622.jpg', 2000, '', 0),
(17, 9, 'Sayur Sop', '49629-img_5650.jpg', 3000, '', 0),
(18, 9, 'Sayur Bayam', '67225-img_5654.jpg', 3000, '', 0),
(19, 9, 'Sayur Tahu', '139ae-img_5664.jpg', 2000, '', 0),
(20, 8, 'Tempe Orek Kering', 'b18cd-img_5665.jpg', 2000, '', 0),
(21, 8, 'Mie Goreng ', '11499-img_5647.jpg', 2000, '', 0),
(22, 10, 'Tahu Goreng', 'b2b02-img_5661.jpg', 2000, '', 0),
(23, 10, 'Tempe Goreng', 'ab7f6-img_5669.jpg', 2000, '', 0),
(24, 1, 'Nasi Putih', 'cd64e-img_5657.jpg', 4000, '', 0),
(25, 6, 'Ikan Lele', '263c2-img20190724092622-bb.jpg', 8000, '', 0),
(26, 6, 'Ikan kembung', '24970-img20190724093057-rr.jpg', 8000, '', 0),
(27, 6, 'Ikan Mujair', '1326b-img20190724092900.jpg', 8000, '', 0),
(28, 6, 'Ikan Tongkol Goreng', 'c48b0-perbaikan.jpg', 8000, '', 0),
(29, 6, 'Ikan Tongkol Balado', '6d36a-img20190724092502-2-.jpg', 8000, '', 0),
(31, 5, 'Telur Asin', 'c8f03-img20190724092106.jpg', 4000, '', 0),
(32, 3, 'Teh Tawar Panas', '820d6-img20190725091938-b.jpg', 2000, '', 0),
(33, 3, 'Teh Manis Panas', '7ddac-img20190725092135-bt.jpg', 3000, '', 0),
(34, 4, 'Kopi Hitam', 'cda6a-img20190725090558-ti.jpg', 3000, '', 0),
(35, 4, 'Kopi Susu', 'd0a7f-img20190725091806-tttt.jpg', 3000, '', 0),
(36, 3, 'Es Teh Tawar', 'd4a3c-img20190725092842-nn.jpg', 2000, '', 0),
(38, 3, 'Es Teh Manis', '5456f-img20190725092751-mm.jpg', 4000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` int(1) NOT NULL,
  `urutan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deskripsi`, `tipe`, `urutan`) VALUES
(1, 'Nasi', '<p>\n	Semua jenis nasi</p>\n', 1, 1),
(2, 'Ayam', '<p>\n	Semua Jenis masakan ayam</p>\n', 1, 2),
(3, 'Teh', '<p>\n	Semua jenis teh</p>\n', 2, 9),
(4, 'Kopi', '<p>\n	Semua jenis kopi</p>\n', 2, 10),
(5, 'Telur', '<p>\n	Semua jenis masakan telur</p>\n', 1, 4),
(6, 'Ikan', '<p>\n	Semua jenis masakan ikan</p>\n', 1, 3),
(7, 'Cumi', '<p>\n	Semjua jenis masakan cumi</p>\n', 1, 5),
(8, 'Tumisan', '<p>\n	Semua jenis masakan Tumisan</p>\n', 1, 6),
(9, 'Sayur-sayuran', '<p>\n	Semua jenis masakan sayur-sayuran</p>\n', 1, 7),
(10, 'Gorengan', '<p>\n	Semua jenis Gorengan</p>\n', 1, 8),
(11, 'Tahu Bulat', '<p>\n	enak...</p>\n', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(3) NOT NULL,
  `no_meja` int(3) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL,
  `kode_pemesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `status`, `kode_pemesan`) VALUES
(1, 1, '0', '12020-01-07 12:3401'),
(2, 2, '3', '22020-01-07 13:2214'),
(3, 3, '2', '32020-03-04 03:1554'),
(4, 4, '0', ''),
(5, 5, '0', ''),
(6, 6, '0', ''),
(7, 7, '0', ''),
(8, 8, '0', ''),
(9, 9, '0', ''),
(10, 10, '0', ''),
(11, 11, '0', ''),
(12, 12, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(4) NOT NULL,
  `id_struk` int(4) NOT NULL,
  `id_detail` int(4) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `subtotal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_struk`, `id_detail`, `jumlah`, `subtotal`) VALUES
(61, 33, 4, 1, 8000),
(62, 33, 21, 1, 2000),
(63, 33, 24, 1, 4000),
(64, 33, 23, 1, 2000),
(65, 34, 24, 1, 4000),
(66, 34, 27, 1, 8000),
(67, 35, 24, 1, 4000),
(68, 35, 7, 1, 4000),
(69, 35, 31, 1, 4000),
(70, 35, 34, 1, 3000),
(71, 36, 2, 1, 12000),
(72, 36, 3, 1, 8000),
(73, 36, 4, 1, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_struk` int(4) NOT NULL,
  `id_meja` int(4) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(12) NOT NULL,
  `tipe_pesanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id_struk`, `id_meja`, `tanggal_pesanan`, `total`, `status`, `tipe_pesanan`) VALUES
(34, 11, '2020-01-07 12:36:36', 12000, 'lunas', 'bawa pulang'),
(35, 2, '2020-01-07 13:22:41', 15000, 'diterima', 'makan ditempat'),
(36, 3, '2020-03-04 03:16:11', 28000, 'proses', 'makan ditempat');

-- --------------------------------------------------------

--
-- Table structure for table `tjm_menu`
--

CREATE TABLE `tjm_menu` (
  `id` int(11) NOT NULL,
  `parent_menu` int(11) NOT NULL DEFAULT '1',
  `nama_menu` varchar(50) NOT NULL,
  `url_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `urutan` tinyint(3) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `type` enum('Admin','Kasir','Pelayan') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tjm_menu`
--

INSERT INTO `tjm_menu` (`id`, `parent_menu`, `nama_menu`, `url_menu`, `icon`, `urutan`, `status`, `type`) VALUES
(1, 1, 'root', '/', '', 0, 0, 'Admin'),
(2, 1, 'dashboard', 'admin/dashboard', 'fa fa-fw fa-dashboard', 1, 1, 'Admin'),
(3, 1, 'User Admin', 'admin/useradmin', 'fa fa-users', 99, 1, 'Admin'),
(4, 1, 'Menu', 'admin/menu', 'fa fa-gear', 100, 1, 'Admin'),
(25, 1, 'Master', 'admin/master', 'fa fa-ticket', 2, 0, 'Admin'),
(31, 1, 'Meja', 'admin/meja', 'glyphicon glyphicon-list-alt', 2, 1, 'Admin'),
(32, 1, 'kategori', 'admin/kategori', 'glyphicon glyphicon-list', 3, 1, 'Admin'),
(33, 1, 'detail kategori', 'admin/detail_kategori', 'glyphicon glyphicon-list', 4, 1, 'Admin'),
(34, 1, 'List Pesanan', 'admin/pesanan', 'glyphicon glyphicon-list-alt', 4, 1, 'Admin'),
(35, 1, 'List Pesanan', 'admin/pesanan', 'glyphicon glyphicon-list-alt', 2, 1, 'Kasir'),
(36, 1, 'Dashboard', 'admin/dashboard', '', 1, 1, 'Kasir'),
(37, 1, 'Dashboard', 'admin/dashboard', '', 1, 1, ''),
(39, 1, 'Pesanan Lunas', 'admin/pesananlunas', 'glyphicon glyphicon-list-alt', 7, 1, 'Admin'),
(40, 1, 'List Pesanan', 'admin/pesanan', 'glyphicon glyphicon-list', 1, 1, 'Pelayan'),
(41, 1, 'Laporan', 'admin/laporan', 'glyphicon glyphicon-list-alt', 6, 1, 'Admin'),
(42, 1, 'Laporan', 'admin/laporan', 'glyphicon glyphicon-list-alt', 2, 1, 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id_struk`);

--
-- Indexes for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_kategori`
--
ALTER TABLE `detail_kategori`
  MODIFY `id_detail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id_struk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tjm_menu`
--
ALTER TABLE `tjm_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
