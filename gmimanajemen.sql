-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2016 at 08:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gmimanajemen`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `id_satuan` varchar(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_satuan`, `kode_barang`, `nama_barang`, `keterangan`, `id_kategori`) VALUES
(1, 'ST0001', '0058', 'Cat Hitam / Soleda Irride BL Nero', 'Cat Hitam', 'K-002'),
(2, 'ST0001', '0059', 'CAT TAN / MERAH BATA', '', 'K-002'),
(3, 'ST0001', '0001', 'Kulit Mentah', '', 'K-001'),
(4, 'ST0001', '0060', 'IPERTAN M 07 / RD', '', 'K-002'),
(5, 'ST0001', '0061', 'RD TERGOTAN', '', 'K-002'),
(6, 'ST0001', '0062', 'SD BICARBONAT / SODA KUE', '', 'K-002'),
(7, 'ST0001', '0063', 'NUBUCTAN RO / ROKYTAN TAK', '', 'K-002'),
(8, 'ST0001', '0064', 'TX AYI', '', 'K-002'),
(9, 'ST0001', '0065', 'CATALIX GS', '', 'K-002'),
(10, 'ST0001', '0066', 'RI 2060', '', 'K-002'),
(11, 'ST0001', '0067', 'RA 2393', '', 'K-002'),
(12, 'ST0001', '0068', 'HAVANA G', '', 'K-002'),
(13, 'ST0001', '0069', 'BROWN NR', '', 'K-002'),
(14, 'ST0001', '0070', 'FI 50', '', 'K-002'),
(15, 'ST0001', '0071', 'LAK PIGMENT PUTIH', '', 'K-002'),
(16, 'ST0001', '0072', 'FILLER / FI 1261', '', 'K-002'),
(17, 'ST0001', '0088', 'UROPLEN MS', '', 'K-002'),
(18, 'ST0001', '0089', 'LAK PIGMEN HITAM 644 LO', '', 'K-002'),
(19, 'ST0001', '0090', 'EBOTAN WS', '', 'K-002'),
(20, 'ST0001', '0091', 'CUKA BASF', '', 'K-002'),
(21, 'ST0001', '0093', 'TAUROL DXN', '', 'K-002'),
(22, 'ST0001', '0094', 'BROWN NDG', '', 'K-002'),
(23, 'ST0001', '0095', 'UKATAN AG', '', 'K-002'),
(24, 'ST0001', '0096', 'AMONIA', '', 'K-002'),
(25, 'ST0001', '0333', 'THINER HG', '', 'K-002'),
(26, 'ST0001', '0097', 'SODOIL MSK / SL 13', '', 'K-002'),
(27, 'ST0001', '0098', 'SYNTHOL NE / SINTOL K', '', 'K-002'),
(28, 'ST0001', '0099', 'COREK TAN 51', '', 'K-002'),
(29, 'ST0001', '0111', 'GINSOL GP', '', 'K-002'),
(30, 'ST0001', '0116', 'LO 6410', '', 'K-002'),
(31, 'ST0001', '0115', 'CAT KUNING 2 / KUNING BURUK', '', 'K-002'),
(32, 'ST0001', '0118', 'WA 0423', '', 'K-002'),
(33, 'ST0001', '0999', 'LD COKLAT 7924 ST HALL', '', 'K-002'),
(34, 'ST0001', '0998', 'LD MERAH CABE RED 0743', '', 'K-002'),
(35, 'ST0001', '0222', 'CAT MAROON', '', 'K-002'),
(36, 'ST0001', '0001A', 'HUMECTOL RAPID / ENZIM SOKING', '', 'K-002'),
(37, 'ST0001', '0002', 'SN / SD SULPHIDA', '', 'K-002'),
(38, 'ST0001', '0003', 'SD ASH', '', 'K-002'),
(39, 'ST0001', '0004', 'KAPUR', '', 'K-002'),
(40, 'ST0001', '0005', 'ANTI BAKTERI / ZENITH MS', '', 'K-002'),
(41, 'ST0001', '0006', 'ZA', '', 'K-002'),
(42, 'ST0001', '0007', 'TANCROME AB / CHROME', '', 'K-002'),
(43, 'ST0001', '0008', 'SEICAL F', '', 'K-002'),
(44, 'ST0001', '0009', 'SD FORMAT', '', 'K-002'),
(45, 'ST0001', '0010', 'ORFON / PAKOBET ULTRA', '', 'K-002'),
(46, 'ST0001', '0012', 'SWAFEL', '', 'K-002'),
(47, 'ST0001', '0013', 'ANTI JAMUR', '', 'K-002'),
(48, 'ST0001', '0014', 'PELLAN GLS', '', 'K-002'),
(49, 'ST0001', '0015', 'SANDOSINIL / FWL 20', '', 'K-002'),
(50, 'ST0001', '0016', 'MAGCHEM / NEOTAN MAG', '', 'K-002'),
(51, 'ST0001', '0017', 'META BISULFIT', '', 'K-002'),
(52, 'ST0001', '0018', 'GARAM', '', 'K-002'),
(53, 'ST0001', '0019', 'MIMOSA / SETASUN MIMOSA', '', 'K-002'),
(54, 'ST0001', '0021', 'LIFSOL E', '', 'K-002'),
(55, 'ST0001', '0022', 'CFH', '', 'K-002'),
(56, 'ST0001', '0025', 'SAVINTAN R7', '', 'K-002'),
(57, 'ST0001', '0026', 'SAVINTAN ROS', '', 'K-002'),
(58, 'ST0001', '0027', 'SAVINTAN RD', '', 'K-002'),
(59, 'ST0001', '0029', 'SETAMOL WS / TAMOL NN', '', 'K-002'),
(60, 'ST0001', '0030', 'CELUP TAN AYII', '', 'K-002'),
(61, 'ST0001', '0032', 'CELUP HITAM AYI / BLACK AYI', '', 'K-002'),
(62, 'ST0001', '0033', 'CELUP COKLAT AYI', '', 'K-002'),
(63, 'ST0001', '0036', 'CELUP BLACK GP', '', 'K-002'),
(64, 'ST0001', '0037', 'GINSOL SWK / SOFCON SWK', '', 'K-002'),
(65, 'ST0001', '0038', 'SEDAFLOR LC / SL 13 / SQ', '', 'K-002'),
(66, 'ST0001', '0039', 'SEROIL FX', '', 'K-002'),
(67, 'ST0001', '0040', 'CROWN LAK/LAK LW', '', 'K-002'),
(68, 'ST0001', '0041', 'PNE / PENETRATOR 425', '', 'K-002'),
(69, 'ST0001', '0042', 'RE 2952', '', 'K-002'),
(70, 'ST0001', '0044', 'CAT PUTIH / WHITE V 1S 1020', '', 'K-002'),
(71, 'ST0001', '0045', 'CAT COKLAT', '', 'K-002'),
(72, 'ST0001', '0080', 'FONDOFLEX', '', 'K-002'),
(73, 'ST0001', '0081', 'CUKA SINTAS', '', 'K-002'),
(74, 'ST0001', '0082', 'LAK LS FG / HOTMAN / LAK BENING', '', 'K-002'),
(75, 'ST0001', '0083', 'LP 4103 / BI', '', 'K-002'),
(76, 'ST0001', '0046', 'CAT KUNING MAS', '', 'K-002'),
(77, 'ST0001', '0048', 'CAT MERAH CABE', '', 'K-002'),
(78, 'ST0001', '0049', 'AQUAFIL / STUCCO PERFELLI 501', '', 'K-002'),
(79, 'ST0001', '0050', 'ACRILON', '', 'K-002'),
(80, 'ST0001', '0051', 'SB 100', '', 'K-002'),
(81, 'ST0001', '0052', 'RESICRYL 5986 / RA 2356', '', 'K-002'),
(82, 'ST0001', '0053', 'WAXTOP B / MELIO TOP', '', 'K-002'),
(83, 'ST0001', '0055', 'TINER BA', '', 'K-002'),
(84, 'ST0001', '0056', 'KS THINNER AM', '', 'K-002'),
(85, 'ST0001', '0057', 'KS AIR', '', 'K-002');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
`id_keluar` int(11) NOT NULL,
  `kode_keluar` varchar(45) DEFAULT NULL,
  `kategori_barang` varchar(11) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_keluar`, `kode_keluar`, `kategori_barang`, `tanggal_keluar`, `keterangan`) VALUES
(1, 'K-001', 'K-002', '2016-05-10', ''),
(2, 'K-002', 'K-002', '2016-05-14', ''),
(3, 'K-003', 'K-002', '2016-05-18', ''),
(5, 'KBH-001', 'K-001', '2016-05-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar_mentah`
--

CREATE TABLE IF NOT EXISTS `barang_keluar_mentah` (
`id` int(11) NOT NULL,
  `kode_keluar` varchar(10) NOT NULL,
  `tanggal_keluar` varchar(45) DEFAULT NULL,
  `id_masuk_barang` int(11) NOT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar_mentah`
--

INSERT INTO `barang_keluar_mentah` (`id`, `kode_keluar`, `tanggal_keluar`, `id_masuk_barang`, `kuantitas`, `keterangan`) VALUES
(2, 'KLM-0001', '2016-05-19', 9, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `detile_barang_keluar`
--

CREATE TABLE IF NOT EXISTS `detile_barang_keluar` (
`id` int(11) NOT NULL,
  `id_barang_keluar` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `banyak` varchar(45) NOT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detile_barang_keluar`
--

INSERT INTO `detile_barang_keluar` (`id`, `id_barang_keluar`, `kode_barang`, `nama_barang`, `banyak`, `keterangan`) VALUES
(1, 1, '0058', 'Cat Hitam / Soleda Irride BL Nero', '5', NULL),
(2, 1, '0058', 'Cat Hitam / Soleda Irride BL Nero', '6', NULL),
(3, 2, '0059', 'CAT TAN / MERAH BATA', '3', NULL),
(4, 3, '0058', 'Cat Hitam / Soleda Irride BL Nero', '6', NULL),
(5, 3, '0059', 'CAT TAN / MERAH BATA', '8', NULL),
(7, 5, '0001', 'Kulit Mentah', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detile_pembelian`
--

CREATE TABLE IF NOT EXISTS `detile_pembelian` (
`id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kuantitas` double NOT NULL,
  `harga` varchar(45) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detile_pembelian`
--

INSERT INTO `detile_pembelian` (`id`, `nama_barang`, `kuantitas`, `harga`, `id_pembelian`, `kode_barang`) VALUES
(18, 'CAT TAN / MERAH BATA', 3, '70000', 25, '0059'),
(19, 'Cat Hitam / Soleda Irride BL Nero', 5, '70000', 26, '0058'),
(20, 'CAT TAN / MERAH BATA', 5, '500000', 26, '0059'),
(21, 'CAT TAN / MERAH BATA', 3, '50000', 27, '0059'),
(22, 'Cat Hitam / Soleda Irride BL Nero', 4, '80000', 27, '0058'),
(23, 'CAT TAN / MERAH BATA', 4, '50000', 28, '0059'),
(24, 'Cat Hitam / Soleda Irride BL Nero', 8, '1000', 29, '0058'),
(25, 'CAT TAN / MERAH BATA', 7, '500000', 29, '0059'),
(26, 'CAT TAN / MERAH BATA', 8, '50000', 30, '0059'),
(27, 'Kulit Mentah', 50, '50000', 31, '0001'),
(28, 'Kulit Mentah', 60, '50000', 32, '0001');

-- --------------------------------------------------------

--
-- Table structure for table `detile_proses_1`
--

CREATE TABLE IF NOT EXISTS `detile_proses_1` (
  `id` int(11) NOT NULL,
  `id_proses_1` int(11) DEFAULT NULL,
  `kode_terima` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang_keluar` int(11) DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detile_proses_1`
--

INSERT INTO `detile_proses_1` (`id`, `id_proses_1`, `kode_terima`, `tanggal`, `id_barang_keluar`, `keterangan`) VALUES
(0, 4, 'TR-0001', '2016-05-22', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `detile_proses_2`
--

CREATE TABLE IF NOT EXISTS `detile_proses_2` (
`id` int(11) NOT NULL,
  `id_proses_2` int(11) NOT NULL,
  `id_keluar_barang` int(11) DEFAULT NULL,
  `kode_terima` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nama_kategori`, `keterangan`, `id_kategori`) VALUES
('Bahan Mentah', 'Bahan Mentahan Kulit', 'K-001'),
('Chemical', 'Obat-obatan untuk produksi', 'K-002'),
('Pewarna', 'Pewarna Bahan Kulit', 'K-003');

-- --------------------------------------------------------

--
-- Table structure for table `konversi_satuan`
--

CREATE TABLE IF NOT EXISTS `konversi_satuan` (
`id_konversi` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `satuan2` varchar(45) NOT NULL,
  `nilai2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversi_satuan`
--

INSERT INTO `konversi_satuan` (`id_konversi`, `satuan`, `nilai`, `satuan2`, `nilai2`) VALUES
(2, 'ST0001', 1, 'ons', 10),
(3, 'ST-0002', 1, 'gr', 100),
(4, 'ST0001', 1, 'gr', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `masuk_barang`
--

CREATE TABLE IF NOT EXISTS `masuk_barang` (
`id_masuk` int(11) NOT NULL,
  `kode_masuk` varchar(45) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_masuk`, `kode_masuk`, `id_pembelian`, `tanggal_masuk`, `keterangan`) VALUES
(1, 'KM-0001', 25, '2016-05-03', ''),
(2, 'KM-0002', 27, '2016-05-02', ''),
(3, 'KM-0003', 26, '2016-05-01', ''),
(4, 'KM-0004', 28, '2016-05-20', ''),
(6, 'KM-0005', 29, '2016-05-18', ''),
(7, 'KM-0006', 30, '2016-05-18', ''),
(9, 'KM-0008', 31, '2016-05-18', ''),
(10, 'KM-0007', 32, '2016-05-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461563028),
('m130524_201442_init', 1461563034);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(45) NOT NULL,
  `jenis_pembelian` enum('chemical','bahan_mentah') NOT NULL,
  `tanggal` date NOT NULL,
  `kode_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `jenis_pembelian`, `tanggal`, `kode_supplier`) VALUES
(25, 'PB-0001', 'chemical', '2016-05-02', 'SP-001'),
(26, 'PB-0002', 'chemical', '2016-05-10', 'SP-001'),
(27, 'PB-0003', 'chemical', '2016-05-03', 'SP-001'),
(28, 'PB-0006', 'chemical', '2016-05-18', 'SP-001'),
(29, 'PB-0009', 'chemical', '2016-05-18', 'SP-002'),
(30, 'PB-0011', 'chemical', '2016-05-18', 'SP-001'),
(31, 'PB-0012', 'bahan_mentah', '2016-05-18', 'SP-001'),
(32, 'PB-0013', 'bahan_mentah', '2016-05-18', 'SP-002');

-- --------------------------------------------------------

--
-- Table structure for table `proses_1`
--

CREATE TABLE IF NOT EXISTS `proses_1` (
`id` int(11) NOT NULL,
  `kode_proses_1` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(1024) DEFAULT NULL,
  `selesai` tinyint(1) NOT NULL,
  `id_mentahan` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses_1`
--

INSERT INTO `proses_1` (`id`, `kode_proses_1`, `tanggal`, `keterangan`, `selesai`, `id_mentahan`) VALUES
(4, 'P-0001', '2016-05-22', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proses_2`
--

CREATE TABLE IF NOT EXISTS `proses_2` (
`id` int(11) NOT NULL,
  `id_proses_1` int(11) NOT NULL,
  `kode_proses` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(1024) DEFAULT NULL,
  `selesai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses_2`
--

INSERT INTO `proses_2` (`id`, `id_proses_1`, `kode_proses`, `tanggal`, `keterangan`, `selesai`) VALUES
(1, 4, 'P2-0001', '2016-05-18', 'Coba Proses 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` varchar(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `satuan`, `keterangan`) VALUES
('ST-0002', 'Ons', 'ons', 'Ons Satuan'),
('ST-0003', 'Gram', 'gr', 'Satuan Gram'),
('ST0001', 'Kilo', 'Kg', 'Satuan Berupa Kilo');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(11) NOT NULL,
  `kode` varchar(45) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(1024) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode`, `nama`, `alamat`, `phone`, `email`, `npwp`, `create_date`) VALUES
(1, 'SP-001', 'CV. Abadi Makmur', 'Kp. Sumursari, Ds. Sukasono, Kec. Sukawening, Kab. Garut - Jawa Barat', '0812345678', 'abadimakmur@gmail.com', '123456789', NULL),
(2, 'SP-002', 'CV. Subur Makmur', 'Kp. Sagaranten, Desa Sukasono, Kecamatan Sukawening, Kabupaten Garut 44184', '0812345678', 'suburmakmur@gmail.com', '0123456', '2016-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'saddam', 'P1tw73GlY-jy00J_q4C9zlxAtkRd0IMB', '$2y$13$FNNq8npwJkofqD3ws7NIZ.F9CWhkZatJk1IefkwLGsCmIPxw6aLE6', NULL, 'saddam.almahali@gmail.com', 10, 1461564409, 1461564409);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`id_barang`), ADD KEY `barang_satuan_idx` (`id_satuan`), ADD KEY `barang_kategori_idx` (`id_kategori`), ADD KEY `kode_barang_idx` (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
 ADD PRIMARY KEY (`id_keluar`), ADD UNIQUE KEY `kode_keluar_UNIQUE` (`kode_keluar`), ADD KEY `barang_keluar_kategori_fk_idx` (`kategori_barang`);

--
-- Indexes for table `barang_keluar_mentah`
--
ALTER TABLE `barang_keluar_mentah`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_masuk_barang_UNIQUE` (`id_masuk_barang`), ADD UNIQUE KEY `kode_keluar_UNIQUE` (`kode_keluar`);

--
-- Indexes for table `detile_barang_keluar`
--
ALTER TABLE `detile_barang_keluar`
 ADD PRIMARY KEY (`id`), ADD KEY `detile_barang_keluar_barang_fk_idx` (`kode_barang`), ADD KEY `detile_barang_keluar_barang_keluar_fk_idx` (`id_barang_keluar`);

--
-- Indexes for table `detile_pembelian`
--
ALTER TABLE `detile_pembelian`
 ADD PRIMARY KEY (`id`), ADD KEY `pembelian_id_idx` (`id_pembelian`), ADD KEY `pembelian_barang_fk_idx` (`kode_barang`);

--
-- Indexes for table `detile_proses_1`
--
ALTER TABLE `detile_proses_1`
 ADD PRIMARY KEY (`id`), ADD KEY `detile_proses_1_proses_1_idx` (`id_proses_1`), ADD KEY `detile_proses_1_barang_keluar_idx` (`id_barang_keluar`);

--
-- Indexes for table `detile_proses_2`
--
ALTER TABLE `detile_proses_2`
 ADD PRIMARY KEY (`id`), ADD KEY `detile_proses_2_proses_idx` (`id_proses_2`), ADD KEY `detile_proses_2_barang_keluar_idx` (`id_keluar_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konversi_satuan`
--
ALTER TABLE `konversi_satuan`
 ADD PRIMARY KEY (`id_konversi`), ADD KEY `konversi_satuan_fkey_idx` (`satuan`);

--
-- Indexes for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
 ADD PRIMARY KEY (`id_masuk`), ADD KEY `masuk_pembelian_fk_idx` (`id_pembelian`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
 ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id_pembelian`), ADD KEY `pembelian_kode_idx` (`kode_supplier`);

--
-- Indexes for table `proses_1`
--
ALTER TABLE `proses_1`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode_proses_1_UNIQUE` (`kode_proses_1`), ADD KEY `proses_1_barang_keluar_mentahan_idx` (`id_mentahan`);

--
-- Indexes for table `proses_2`
--
ALTER TABLE `proses_2`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_proses_1_UNIQUE` (`id_proses_1`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
 ADD PRIMARY KEY (`id_satuan`), ADD KEY `satuan_idx` (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`), ADD KEY `supplier_kode_idx` (`kode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `barang_keluar_mentah`
--
ALTER TABLE `barang_keluar_mentah`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detile_barang_keluar`
--
ALTER TABLE `detile_barang_keluar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detile_pembelian`
--
ALTER TABLE `detile_pembelian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `detile_proses_2`
--
ALTER TABLE `detile_proses_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konversi_satuan`
--
ALTER TABLE `konversi_satuan`
MODIFY `id_konversi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `proses_1`
--
ALTER TABLE `proses_1`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `proses_2`
--
ALTER TABLE `proses_2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `barang_kategori_fk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `barang_satuan_fk` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
ADD CONSTRAINT `barang_keluar_kategori_fk` FOREIGN KEY (`kategori_barang`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_keluar_mentah`
--
ALTER TABLE `barang_keluar_mentah`
ADD CONSTRAINT `barang_keluar_mentah_masuk_barang` FOREIGN KEY (`id_masuk_barang`) REFERENCES `masuk_barang` (`id_masuk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detile_barang_keluar`
--
ALTER TABLE `detile_barang_keluar`
ADD CONSTRAINT `detile_barang_keluar_barang_fk` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detile_barang_keluar_barang_keluar_fk` FOREIGN KEY (`id_barang_keluar`) REFERENCES `barang_keluar` (`id_keluar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detile_pembelian`
--
ALTER TABLE `detile_pembelian`
ADD CONSTRAINT `detile_pembelian_barang_fk` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detile_pembelian_fk` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detile_proses_1`
--
ALTER TABLE `detile_proses_1`
ADD CONSTRAINT `detile_proses_1_barang_keluar` FOREIGN KEY (`id_barang_keluar`) REFERENCES `barang_keluar` (`id_keluar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detile_proses_1_proses_1` FOREIGN KEY (`id_proses_1`) REFERENCES `proses_1` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detile_proses_2`
--
ALTER TABLE `detile_proses_2`
ADD CONSTRAINT `detile_proses_2_barang_keluar` FOREIGN KEY (`id_keluar_barang`) REFERENCES `barang_keluar` (`id_keluar`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detile_proses_2_proses` FOREIGN KEY (`id_proses_2`) REFERENCES `proses_2` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konversi_satuan`
--
ALTER TABLE `konversi_satuan`
ADD CONSTRAINT `konversi_satuan_fkey` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
ADD CONSTRAINT `masuk_pembelian_fk` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `pembelian_kodesp_FK` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proses_1`
--
ALTER TABLE `proses_1`
ADD CONSTRAINT `proses_1_barang_keluar_mentahan` FOREIGN KEY (`id_mentahan`) REFERENCES `barang_keluar_mentah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `proses_2`
--
ALTER TABLE `proses_2`
ADD CONSTRAINT `proses_2_proses_1` FOREIGN KEY (`id_proses_1`) REFERENCES `proses_1` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
