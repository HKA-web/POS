-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2026 at 04:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` char(4) NOT NULL,
  `nm_barang` varchar(200) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `stok` int(3) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `kd_kategori` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `harga_beli`, `harga_jual`, `diskon`, `stok`, `keterangan`, `kd_kategori`) VALUES
('a1', 'pink gamis', 125000, 140000, 2, 4, '', 'K06'),
('B001', 'Bluespurple batik with bolero dress', 80000, 120000, 10, 17, 'Elegan', 'K01'),
('B002', 'Greenpink batik dress with bolero', 80000, 120000, 10, 0, 'Elegan', 'K01'),
('B003', 'Chifon Browngrey batik blouse', 80000, 125000, 10, 23, 'keren', 'K01'),
('B004', 'Brown print Batik dress', 85000, 135000, 10, 37, 'Elegan', 'K01'),
('B005', 'Green Dewi batik dress', 80000, 125000, 10, 28, 'baru', 'K01'),
('B006', 'Shine fuchsia batwing blouse', 85000, 85000, 10, 9, 'baru', 'K01'),
('B007', 'Purple leaves batik dress', 70000, 98000, 10, 4, 'baru', 'K01'),
('B008', 'Batwing white top', 75000, 110000, 10, 30, 'baru', 'K02'),
('B009', 'Black candy sifon', 80000, 120000, 10, 19, 'baru', 'K02'),
('B010', 'Tops Lace flower Red', 75000, 99000, 10, 13, 'baru', 'K02'),
('B011', 'Tops Lace flower Black', 75000, 99000, 10, 30, 'baru', 'K02'),
('B012', 'Tops Lace flower Grey', 75000, 99000, 10, 27, 'baru', 'K02'),
('B013', 'Knit Tunic Grey', 90000, 140000, 10, 11, 'baru', 'K02'),
('B014', 'Fuchsia flowR minidress', 95000, 130000, 10, 11, 'baru', 'K03'),
('B015', 'Blackline jeans minidress', 90000, 120000, 10, 20, 'baru', 'K03'),
('B016', 'Black midi Zipper with belt', 90000, 120000, 10, 30, 'baru', 'K03'),
('B017', 'Orange Polka ribbon minidress', 75000, 108000, 10, 68, 'baru', 'K03'),
('B018', 'Krancang Kebaya Purple', 140000, 185000, 10, 28, 'baru', 'K04'),
('B019', 'Krancang Kebaya Green', 140000, 185000, 10, 110, 'baru', 'K04'),
('B020', 'Krancang Kebaya Bronze', 135000, 185000, 10, 100, 'baru', 'K04'),
('B021', 'Krancang FlowR Line Purple', 135000, 185000, 10, 56, 'baru', 'K04'),
('B022', 'Gamis + Jilbab BlackPurple', 135000, 185000, 10, 98, 'baru', 'K06'),
('B023', 'Gamis   Jilbab BlackRed', 135000, 185000, 10, 201, 'baru', 'K03'),
('B024', 'Gamis   Jilbab BlackBlue', 135000, 185000, 10, 100, 'baru', 'K03'),
('B025', 'safir', 200000, 250000, 25, 20, 'asdas', 'K05'),
('B026', 'Pigora2', 2000, 3000, 0, 109, 'baik', 'K06'),
('in01', 'prevaton', 110000, 117000, 0, 4, '', 'in0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` char(3) NOT NULL,
  `nm_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nm_kategori`) VALUES
('in0', 'insektisida'),
('K01', 'Women Batik'),
('K02', 'Women Blouse'),
('K03', 'Women Dress'),
('K04', 'Busana Muslim'),
('K05', 'Moslem Blues'),
('K06', 'Moslem Gamis');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_pembelian` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `kd_supplier` char(3) NOT NULL,
  `total` int(7) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_pembelian`, `tgl_transaksi`, `catatan`, `kd_supplier`, `total`, `userid`) VALUES
('00001', '2019-01-01', 'Ok', 'S03', 4000, '2'),
('00002', '2019-02-04', 'OK', 'S01', 1602000, '1'),
('00003', '2019-02-04', 'ok', 'S01', 200000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_item`
--

CREATE TABLE `pembelian_item` (
  `no_pembelian` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_item`
--

INSERT INTO `pembelian_item` (`no_pembelian`, `kd_barang`, `harga_beli`, `jumlah`) VALUES
('00001', 'B026', 2000, 2),
('00002', 'B026', 2000, 1),
('00002', 'B025', 200000, 8),
('00003', 'B026', 2000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` char(7) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pelanggan` varchar(60) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `total` int(7) NOT NULL,
  `bayar` decimal(15,2) NOT NULL DEFAULT '0.00',
  `kembalian` decimal(15,2) NOT NULL DEFAULT '0.00',
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `tgl_transaksi`, `pelanggan`, `catatan`, `total`, `bayar`, `kembalian`, `userid`) VALUES
('00001', '2019-01-26', 'Umum', 'Lunas', 3000, '0.00', '0.00', '1'),
('00002', '2019-02-03', 'Umum', 'Lunas', 1503000, '0.00', '0.00', '1'),
('00003', '2019-02-04', 'Umum', 'Lunas', 1687500, '0.00', '0.00', '1'),
('00004', '2019-02-04', 'Umum', 'Lunas', 652500, '0.00', '0.00', '1'),
('00005', '2019-02-05', 'Umum', 'Lunas', 88200, '0.00', '0.00', '1'),
('00006', '2019-02-10', 'Den Bagus', 'Lunas', 1143900, '0.00', '0.00', '1'),
('00007', '2019-02-10', 'Fornite', 'Lunas', 4830000, '0.00', '0.00', '1'),
('00008', '2019-02-10', 'Umum', 'Lunas', 216000, '0.00', '0.00', '1'),
('00009', '2019-02-10', 'Umum', 'Lunas', 187500, '0.00', '0.00', '1'),
('00010', '2019-02-10', 'Umum', 'Lunas', 196200, '0.00', '0.00', '1'),
('00011', '2019-02-11', 'Umum', 'Lunas', 108000, '0.00', '0.00', '1'),
('00012', '2019-02-11', 'Umum', 'Lunas', 421200, '0.00', '0.00', '1'),
('00013', '0000-00-00', 'Umum', 'Lunas', 108000, '0.00', '0.00', '1'),
('00014', '2019-02-18', 'Umum', 'Lunas', 108000, '0.00', '0.00', '1'),
('00015', '2019-02-18', 'Umum', 'Lunas', 184500, '0.00', '0.00', '1'),
('00016', '2026-02-10', 'Umum', 'Lunas', 411600, '0.00', '0.00', '1'),
('00017', '2026-02-17', 'Umum', 'Lunas', 234000, '0.00', '0.00', '1'),
('00018', '2026-03-02', 'Umum', 'Lunas', 137200, '0.00', '0.00', '1'),
('00019', '2026-03-03', '', '', 0, '0.00', '0.00', '1'),
('00020', '2026-03-03', '', '', 0, '0.00', '0.00', '1'),
('00021', '2026-03-03', '', '', 0, '0.00', '0.00', '1'),
('00022', '2026-03-04', '', '', 0, '0.00', '0.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_item`
--

CREATE TABLE `penjualan_item` (
  `no_penjualan` char(7) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_item`
--

INSERT INTO `penjualan_item` (`no_penjualan`, `kd_barang`, `harga_jual`, `jumlah`) VALUES
('00001', 'B026', 3000, 1),
('00002', 'B026', 3000, 1),
('00002', 'B025', 187500, 8),
('00003', 'B025', 187500, 9),
('00004', 'b001', 108000, 2),
('00004', 'b002', 108000, 3),
('00004', 'b005', 112500, 1),
('00005', 'b007', 88200, 1),
('00006', 'b006', 76500, 1),
('00006', 'b007', 88200, 2),
('00006', 'b010', 89100, 10),
('00007', 'b002', 108000, 10),
('00007', 'b025', 187500, 20),
('00008', 'b001', 108000, 1),
('00008', 'b002', 108000, 1),
('00009', 'b025', 187500, 1),
('00010', 'b007', 88200, 1),
('00010', 'b009', 108000, 1),
('00011', 'b001', 108000, 1),
('00012', 'b002', 108000, 1),
('00012', 'b003', 112500, 1),
('00012', 'b005', 112500, 1),
('00012', 'b007', 88200, 1),
('00013', 'B001', 108000, 1),
('00014', 'b001', 108000, 1),
('00015', 'b002', 108000, 1),
('00015', 'b006', 76500, 1),
('00016', 'a1', 137200, 3),
('00017', 'in01', 117000, 2),
('00018', 'a1', 137200, 1),
('00019', 'in01', 117000, 2),
('00019', 'a1', 140000, 1),
('00019', 'B022', 185000, 1),
('00020', 'in01', 117000, 1),
('00020', 'B018', 185000, 1),
('00020', 'B025', 250000, 1),
('00020', 'B026', 3000, 1),
('00021', 'a1', 140000, 1),
('00021', 'B003', 125000, 1),
('00021', 'in01', 117000, 1),
('00022', 'B002', 120000, 1),
('00022', 'B021', 185000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kd_supplier` char(3) NOT NULL,
  `nm_supplier` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kd_supplier`, `nm_supplier`, `alamat`, `telpon`) VALUES
('S01', 'Indah Taylor', 'Wayabung, TuBa, Lampung', '083123678209'),
('S02', 'Jogja Fashion', 'Way Jepara, Lampung Timur', '082212908212'),
('S03', 'Bunafit Fashion', 'Bantul, Yogyakarta', '085678920902');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pembelian`
--

CREATE TABLE `tmp_pembelian` (
  `id` int(3) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penjualan`
--

CREATE TABLE `tmp_penjualan` (
  `id` int(3) NOT NULL,
  `kd_barang` char(4) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `qty` int(3) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(4) NOT NULL,
  `userid` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('Kasir','Admin') NOT NULL DEFAULT 'Kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `userid`, `password`, `nama`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bunafit Nugroho', 'Admin'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Septi Suhesti', 'Kasir');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_beli`
-- (See below for the actual view)
--
CREATE TABLE `view_beli` (
`tahun` varchar(4)
,`beli` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jual`
-- (See below for the actual view)
--
CREATE TABLE `view_jual` (
`tahun` varchar(4)
,`jual` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_labarugi`
-- (See below for the actual view)
--
CREATE TABLE `view_labarugi` (
`tahun` varchar(4)
,`beli` decimal(32,0)
,`jual` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_beli`
--
DROP TABLE IF EXISTS `view_beli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_beli`  AS  select cast(year(`pembelian`.`tgl_transaksi`) as char charset utf8mb4) AS `tahun`,sum(`pembelian`.`total`) AS `beli` from `pembelian` where ((`pembelian`.`tgl_transaksi` is not null) and (`pembelian`.`tgl_transaksi` <> '')) group by year(`pembelian`.`tgl_transaksi`) order by cast(year(`pembelian`.`tgl_transaksi`) as char charset utf8mb4) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_jual`
--
DROP TABLE IF EXISTS `view_jual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jual`  AS  select cast(year(`penjualan`.`tgl_transaksi`) as char charset utf8mb4) AS `tahun`,sum(`penjualan`.`total`) AS `jual` from `penjualan` where ((`penjualan`.`tgl_transaksi` is not null) and (`penjualan`.`tgl_transaksi` <> '')) group by year(`penjualan`.`tgl_transaksi`) order by cast(year(`penjualan`.`tgl_transaksi`) as char charset utf8mb4) desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_labarugi`
--
DROP TABLE IF EXISTS `view_labarugi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_labarugi`  AS  select `b`.`tahun` AS `tahun`,coalesce(`a`.`beli`,0) AS `beli`,`b`.`jual` AS `jual` from (`view_jual` `b` left join `view_beli` `a` on((`a`.`tahun` = `b`.`tahun`))) order by `b`.`tahun` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_kategori` (`kd_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `pembelian_item`
--
ALTER TABLE `pembelian_item`
  ADD KEY `no_pembelian` (`no_pembelian`,`kd_barang`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`);

--
-- Indexes for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `no_penjualan` (`no_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indexes for table `tmp_pembelian`
--
ALTER TABLE `tmp_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_pembelian`
--
ALTER TABLE `tmp_pembelian`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kd_kategori`) REFERENCES `kategori` (`kd_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kd_supplier`) REFERENCES `supplier` (`kd_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_item`
--
ALTER TABLE `pembelian_item`
  ADD CONSTRAINT `pembelian_item_ibfk_1` FOREIGN KEY (`no_pembelian`) REFERENCES `pembelian` (`no_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_item_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan_item`
--
ALTER TABLE `penjualan_item`
  ADD CONSTRAINT `penjualan_item_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `penjualan` (`no_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_item_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tmp_pembelian`
--
ALTER TABLE `tmp_pembelian`
  ADD CONSTRAINT `tmp_pembelian_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tmp_penjualan`
--
ALTER TABLE `tmp_penjualan`
  ADD CONSTRAINT `tmp_penjualan_ibfk_1` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
