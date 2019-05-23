-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 12:53 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `chart_id` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `chart_id`, `jumlah`, `id_masakan`) VALUES
(11, '', 0, 3),
(12, '', 0, 3),
(13, '', 0, 3),
(14, '', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_detail_order` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_masakan`, `keterangan`, `status_detail_order`, `jumlah`) VALUES
(2, 73, 2, 'BELI', 'lezat', 0),
(3, 74, 2, 'BELI', 'lezat', 0),
(4, 75, 3, 'BELI', 'lezat', 0),
(5, 76, 3, 'BELI', 'lezat', 0),
(6, 77, 3, 'BELI', 'lezat', 0),
(7, 78, 3, 'BELI', 'lezat', 0),
(8, 79, 3, 'BELI', 'lezat', 0),
(9, 80, 3, 'BELI', 'lezat', 0),
(10, 81, 3, 'BELI', 'lezat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'kasir'),
(4, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `masakan`
--

CREATE TABLE `masakan` (
  `id_masakan` int(11) NOT NULL,
  `kode_masakan` varchar(20) NOT NULL,
  `nama_masakan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(20) NOT NULL,
  `status_masakan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masakan`
--

INSERT INTO `masakan` (`id_masakan`, `kode_masakan`, `nama_masakan`, `harga`, `stok`, `status_masakan`) VALUES
(1, 'ASD23', 'Ayam Goreng', 45000, 5, 'ada'),
(2, 'ABC43', 'Nasi Goreng', 20000, 0, 'ada'),
(3, 'ABC12', 'Ayam Goreng', 45000, 0, 'ada'),
(4, 'ABD23', 'Ayam Goreng', 20000, 3, 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_order` varchar(100) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `total_bayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `no_meja`, `tanggal`, `id_user`, `keterangan`, `status_order`, `id_pelanggan`, `total_bayar`) VALUES
(1, 4, '2019-05-02 21:05:15', 2, 'dd', 'ee', '2', '4333'),
(71, 0, '2019-05-02 21:36:06', 0, '', '', '0', ''),
(72, 0, '2019-05-02 21:36:26', 0, '', '', '0', ''),
(73, 0, '2019-05-02 21:39:04', 0, '', '', '0', ''),
(74, 0, '2019-05-02 21:39:36', 0, '', '', '0', ''),
(75, 0, '2019-05-02 21:41:59', 0, '', '', 'resa', ''),
(76, 0, '2019-05-02 21:43:36', 0, 'BELI', 'lezat', 'resa', ''),
(77, 2, '2019-05-02 21:47:15', 0, 'BELI', 'lezat', 'resa', ''),
(78, 2, '2019-05-02 21:56:35', 0, 'BELI', 'lezat', 'resa', '$total'),
(79, 2, '2019-05-02 22:12:26', 0, 'BELI', 'lezat', 'resa', ''),
(80, 2, '2019-05-02 22:15:55', 0, 'BELI', 'lezat', 'resa', ''),
(81, 2, '2019-05-02 22:50:44', 0, 'BELI', 'lezat', 'resa', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`, `username`, `password`) VALUES
(1, 'putri', 'Malang', '081234565432', 'putri', 12345),
(2, 'wadaw', 'malang', '0902384853341', 'amin', 1010);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_user` text NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', 'admin', 'loelita', 1),
(2, 'kasir', 'kasir', 'alifia', 2),
(5, 'aldi123', 'aldi', 'aldi', 1),
(6, 'resa4', '12345678', 'resa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_masakan` (`id_masakan`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `masakan`
--
ALTER TABLE `masakan`
  ADD PRIMARY KEY (`id_masakan`),
  ADD KEY `kode_masakan` (`kode_masakan`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masakan`
--
ALTER TABLE `masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_masakan`) REFERENCES `masakan` (`id_masakan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
