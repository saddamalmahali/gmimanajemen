-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Mei 2016 pada 15.20
-- Versi Server: 5.6.21
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
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`id_barang` int(11) NOT NULL,
  `id_satuan` varchar(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_satuan`, `kode_barang`, `nama_barang`, `keterangan`, `id_kategori`) VALUES
(1, 'ST0001', '0058', 'Cat Hitam / Soleda Irride BL Nero', 'Cat Hitam', 'K-002'),
(2, 'ST0001', '0059', 'CAT TAN / MERAH BATA', '', 'K-002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detile_pembelian`
--

CREATE TABLE IF NOT EXISTS `detile_pembelian` (
`id_detile_pembelian` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kuantitas` varchar(255) NOT NULL,
  `harga` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detile_pembelian`
--

INSERT INTO `detile_pembelian` (`id_detile_pembelian`, `nama_barang`, `kuantitas`, `harga`) VALUES
(1, 'CAT TAN / MERAH BATA', '1', '1000'),
(2, 'CAT TAN / MERAH BATA', '2', '1000'),
(3, 'Cat Hitam / Soleda Irride BL Nero', '2', '60000'),
(4, 'CAT TAN / MERAH BATA', '5', '80000'),
(5, 'Cat Hitam / Soleda Irride BL Nero', '2', '70000'),
(6, 'CAT TAN / MERAH BATA', '3', '80000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_kategori` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`nama_kategori`, `keterangan`, `id_kategori`) VALUES
('Bahan Mentah', 'Bahan Mentahan Kulit', 'K-001'),
('Chemical', 'Obat-obatan untuk produksi', 'K-002'),
('Pewarna', 'Pewarna Bahan Kulit', 'K-003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konversi_satuan`
--

CREATE TABLE IF NOT EXISTS `konversi_satuan` (
`id_konversi` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `satuan2` varchar(45) NOT NULL,
  `nilai2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konversi_satuan`
--

INSERT INTO `konversi_satuan` (`id_konversi`, `satuan`, `nilai`, `satuan2`, `nilai2`) VALUES
(2, 'ST0001', 1, 'ons', 10),
(3, 'ST-0002', 1, 'gr', 100),
(4, 'ST0001', 1, 'gr', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1461563028),
('m130524_201442_init', 1461563034);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) NOT NULL,
  `kode_pembelian` varchar(45) NOT NULL,
  `jenis_pembelian` enum('chemical','bahan_mentah') NOT NULL,
  `tanggal` date NOT NULL,
  `kode_supplier` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `jenis_pembelian`, `tanggal`, `kode_supplier`) VALUES
(4, 'PB-0001', 'chemical', '2016-04-07', 'SP-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detile_pembelian_link`
--

CREATE TABLE IF NOT EXISTS `pembelian_detile_pembelian_link` (
  `id_pembelian` int(11) DEFAULT NULL,
  `id_detile_pembelian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_detile_pembelian_link`
--

INSERT INTO `pembelian_detile_pembelian_link` (`id_pembelian`, `id_detile_pembelian`) VALUES
(4, 5),
(4, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` varchar(11) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `satuan`, `keterangan`) VALUES
('ST-0002', 'Ons', 'ons', 'Ons Satuan'),
('ST-0003', 'Gram', 'gr', 'Satuan Gram'),
('ST0001', 'Kilo', 'Kg', 'Satuan Berupa Kilo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
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
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode`, `nama`, `alamat`, `phone`, `email`, `npwp`, `create_date`) VALUES
(1, 'SP-001', 'CV. Abadi Makmur', 'Kp. Sumursari, Ds. Sukasono, Kec. Sukawening, Kab. Garut - Jawa Barat', '0812345678', 'abadimakmur@gmail.com', '123456789', NULL),
(2, 'SP-002', 'CV. Subur Makmur', 'Kp. Sagaranten, Desa Sukasono, Kecamatan Sukawening, Kabupaten Garut 44184', '0812345678', 'suburmakmur@gmail.com', '0123456', '2016-04-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
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
 ADD PRIMARY KEY (`id_barang`), ADD KEY `barang_satuan_idx` (`id_satuan`), ADD KEY `barang_kategori_idx` (`id_kategori`);

--
-- Indexes for table `detile_pembelian`
--
ALTER TABLE `detile_pembelian`
 ADD PRIMARY KEY (`id_detile_pembelian`), ADD KEY `pembelian_id_idx` (`id_detile_pembelian`);

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
-- Indexes for table `pembelian_detile_pembelian_link`
--
ALTER TABLE `pembelian_detile_pembelian_link`
 ADD KEY `pembelian_idx_idx` (`id_pembelian`), ADD KEY `detile_pembelian_idx_idx` (`id_detile_pembelian`);

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
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detile_pembelian`
--
ALTER TABLE `detile_pembelian`
MODIFY `id_detile_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `konversi_satuan`
--
ALTER TABLE `konversi_satuan`
MODIFY `id_konversi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `barang_kategori_fk` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `barang_satuan_fk` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `konversi_satuan`
--
ALTER TABLE `konversi_satuan`
ADD CONSTRAINT `konversi_satuan_fkey` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `pembelian_kodesp_FK` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian_detile_pembelian_link`
--
ALTER TABLE `pembelian_detile_pembelian_link`
ADD CONSTRAINT `detile_pembelian_idx` FOREIGN KEY (`id_detile_pembelian`) REFERENCES `detile_pembelian` (`id_detile_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `pembelian_idx` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
