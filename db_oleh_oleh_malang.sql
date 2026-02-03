-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2025 at 11:52 PM
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
-- Database: `db_oleh_oleh_malang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '2025-12-18 02:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `username`, `password`, `nama_customer`, `email`, `no_hp`, `alamat`, `created_at`) VALUES
(9, NULL, NULL, 'userr', 'anggaratzy001@gmail.com', '00233', 'cibodas', '2025-12-20 07:58:21'),
(10, 'ayuuu', 'e10adc3949ba59abbe56e057f20f883e', 'ayuuu', 'anggaratzy001@gmail.com', '00233', 'gatau', '2025-12-20 20:17:48'),
(11, 'userr', 'e10adc3949ba59abbe56e057f20f883e', 'userr', 'tzy12@gmail.com', '00233', 'malang', '2025-12-20 23:08:25'),
(14, 'brook', 'e10adc3949ba59abbe56e057f20f883e', 'brook', 'anggaratzy003@gmail.com', '00233', 'walet', '2025-12-21 00:45:22'),
(15, 'angun', 'e10adc3949ba59abbe56e057f20f883e', 'angun', 'anggaratzy003@gmail.com', '00233', 'walet', '2025-12-21 20:06:28'),
(16, 'ajiss', 'e10adc3949ba59abbe56e057f20f883e', 'ajiss', 'anggaratzy003@gmail.com', '00233', 'walet', '2025-12-21 21:38:48'),
(17, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'anggaratzy001@gmail.com', '00233', 'dwwdwwd', '2025-12-21 22:25:18'),
(18, 'putri', 'e10adc3949ba59abbe56e057f20f883e', 'putri', 'anggaratzy003@gmail.com', '00233', 'walet', '2025-12-21 23:07:26'),
(19, 'andriana', 'e10adc3949ba59abbe56e057f20f883e', 'andriana', 'anggaratzy003@gmail.com', '00233', 'wwwwrqqq', '2025-12-22 00:02:15'),
(20, 'alill', 'e10adc3949ba59abbe56e057f20f883e', 'alill', 'Pt_Supraa@gmail.com', '00233', 'wwwwrqqq', '2025-12-22 09:29:59'),
(21, 'ripin', 'e10adc3949ba59abbe56e057f20f883e', 'ripin', 'ripin_ganteng@gmail.com', '081234567890', 'Jl. Soekarno Hatta, Malang', '2025-12-23 06:07:03'),
(22, 'dionn', 'e10adc3949ba59abbe56e057f20f883e', 'dionn', 'anggaratzy003@gmail.com', '00233', 'walet', '2025-12-23 09:24:32'),
(23, 'imamm', 'e10adc3949ba59abbe56e057f20f883e', 'imamm', 'gatau@gamail.com', '0976877', 'jll gatauuu', '2025-12-23 09:47:09'),
(24, 'kucing', 'e10adc3949ba59abbe56e057f20f883e', 'kucing', 'bejo@gmail.com', '0864644', 'jl kulon', '2025-12-23 10:21:26'),
(25, 'harimau', 'e10adc3949ba59abbe56e057f20f883e', 'harimau', 'anggaratzy001@gmail.com', '00233', 'dwwdwwd', '2025-12-24 05:16:55'),
(26, 'ulatt', 'e10adc3949ba59abbe56e057f20f883e', 'ulatt', 'anggaratzy001@gmail.com', '00233', 'isi sendiri bro', '2025-12-24 05:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail`, `id_pembelian`, `id_produk`, `qty`, `harga_beli`) VALUES
(1, 1, 16, 1, 20000),
(2, 1, 16, 1, 20000),
(12, 6, 20, 3, 50000),
(13, 7, 20, 4, 50000),
(17, 9, 20, 1, 20000),
(18, 9, 15, 1, 20000),
(20, 10, 18, 1, 50000),
(29, 15, 26, 10, 50000),
(30, 15, 26, 10, 50000),
(31, 16, 26, 50, 50000),
(32, 16, 26, 20, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ayam'),
(2, 'mie'),
(3, 'bebek123'),
(4, 'gacoan'),
(5, 'bebek');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_notifikasi`
--

CREATE TABLE `log_notifikasi` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `tanggal`, `total`) VALUES
(1, 1, '2025-12-22', 40000),
(2, 1, '2025-12-22', 600000),
(3, 1, '2025-12-22', 600000),
(4, 1, '2025-12-22', 20000),
(5, 1, '2025-12-22', 0),
(6, 1, '2025-12-22', 190000),
(7, 2, '2025-12-22', 400000),
(8, 2, '2025-12-22', 400000),
(9, 2, '2025-12-22', 40000),
(10, 3, '2025-12-23', 100000),
(11, 3, '2025-12-23', 400000),
(12, 4, '2025-12-23', 250000),
(13, 4, '2025-12-23', 700000),
(14, 5, '2025-12-23', 900000),
(15, 2, '2025-12-23', 1000000),
(16, 2, '2025-12-23', 3500000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(150) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `gambar`, `deskripsi`, `created_at`) VALUES
(13, 2, 'Cwie Mie Malang Instan', 22000, 60, 'cwie_mie.jpg', 'Cwie mie khas Malang dengan mie lembut dan taburan ayam gurih.', '2025-12-15 11:21:43'),
(14, 2, 'Bakpao Telo Ungu', 20000, 50, 'bakpao_telo.jpg', 'Bakpao berbahan dasar ubi ungu khas Malang.', '2025-12-15 11:21:43'),
(15, 2, 'Ledre Pisang Malang', 17000, 69, 'ledre_pisang.jpg', 'Kue tipis renyah berbahan pisang asli.', '2025-12-15 11:21:43'),
(16, 2, 'Keripik Apel Malang', 19000, 82, 'keripik_apel.jpg', 'Keripik apel khas Malang dengan teknologi vacuum frying.', '2025-12-15 11:21:43'),
(17, 2, 'Keripik Salak Malang', 20000, 58, 'keripik_salak.jpg', 'Keripik salak khas Malang dengan rasa manis alami.', '2025-12-15 11:21:43'),
(18, 2, 'Sari Markisa Malang', 14000, 91, 'sari_markisa.jpg', 'Minuman sari markisa segar tanpa pengawet.', '2025-12-15 11:21:43'),
(19, 2, 'Kopi Dampit Malang', 28000, 35, 'kopi_dampit.jpg', 'Kopi robusta asli Dampit Malang dengan aroma kuat dan cita rasa khas pegunungan.', '2025-12-15 11:21:43'),
(20, 3, 'Onde-onde Telo', 18000, 53, 'onde_telo.jpg', 'Onde-onde berbahan ubi ungu dengan isian kacang hijau, renyah di luar dan lembut di dalam.', '2025-12-15 11:21:43'),
(26, 3, 'strudel malang', 50000, 69, 'p1.jpg', 'kuenya enak lezat lembut dan creamy', '2025-12-24 04:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `email`, `no_telepon`) VALUES
(1, 'gatau', 'kiyomasa', 'Pt_Supraa@gmail.com', '8756676'),
(2, 'Nippon', 'kebumen', 'anggaratzy001@gmail.com', '080233123'),
(3, 'Hasura', 'Jl Suka damai', 'tzy123@gmail.com', '08767'),
(4, 'gajah', 'isi sendirii', 'tzy123@gmail.com', '098787677'),
(5, 'jerapah', 'dwwdwwd', 'anggaratzy001@gmail.com', '00233');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` enum('Pending','Lunas','Ditolak','Dikirim','Selesai') DEFAULT 'Pending',
  `bukti_bayar` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `total`, `bukti`, `status`, `bukti_bayar`, `tanggal`) VALUES
(2, 9, 18000, 'bukti_7_1766192328.png', 'Pending', NULL, '2025-12-20 01:58:48'),
(3, 10, 110000, 'bukti_10_1766237081.png', 'Lunas', NULL, '2025-12-20 14:24:41'),
(4, 10, 14000, 'bukti_10_1766242541.png', 'Ditolak', NULL, '2025-12-20 15:55:41'),
(5, 10, 14000, 'bukti_10_1766242605.png', 'Ditolak', NULL, '2025-12-20 15:56:45'),
(6, 10, 72000, 'bukti_10_1766245186.png', 'Lunas', NULL, '2025-12-20 16:39:46'),
(7, 10, 20000, 'bukti_10_1766246802.png', 'Pending', NULL, '2025-12-20 17:06:42'),
(8, 11, 18000, 'bukti_11_1766246965.png', 'Pending', NULL, '2025-12-20 17:09:25'),
(9, 11, 112000, NULL, 'Lunas', 'bukti_11_1766247737.png', '2025-12-20 17:22:17'),
(10, 11, 36000, NULL, 'Pending', NULL, '2025-12-20 17:49:21'),
(11, 11, 28000, NULL, 'Pending', NULL, '2025-12-20 17:51:05'),
(12, 11, 19000, NULL, 'Pending', NULL, '2025-12-20 17:54:54'),
(13, 11, 34000, NULL, 'Pending', NULL, '2025-12-20 17:57:22'),
(14, 11, 14000, NULL, 'Pending', NULL, '2025-12-20 17:58:13'),
(15, 11, 18000, NULL, 'Pending', NULL, '2025-12-20 17:59:58'),
(16, 11, 28000, NULL, 'Pending', NULL, '2025-12-20 18:02:19'),
(17, 11, 14000, 'bukti_17_1766250846.png', 'Pending', 'bukti_17_1766250846.png', '2025-12-20 18:03:24'),
(18, 11, 28000, NULL, 'Pending', NULL, '2025-12-20 18:16:17'),
(19, 12, 28000, NULL, 'Pending', NULL, '2025-12-20 18:18:00'),
(20, 12, 18000, NULL, 'Pending', NULL, '2025-12-20 18:27:58'),
(21, 13, 14000, NULL, 'Pending', NULL, '2025-12-20 18:33:00'),
(22, 13, 28000, '53e0c6c8ff2723f0e2050e39192f9dc7.png', 'Pending', '53e0c6c8ff2723f0e2050e39192f9dc7.png', '2025-12-20 18:43:50'),
(23, 14, 36000, '42b3c50e4d3f9f67c336f06e82a800be.png', 'Pending', '42b3c50e4d3f9f67c336f06e82a800be.png', '2025-12-20 18:45:54'),
(24, 15, 53000, 'e606fd294d855e88bc2308896b7926d1.png', 'Pending', 'e606fd294d855e88bc2308896b7926d1.png', '2025-12-21 14:16:28'),
(25, 16, 17000, '902ab372803c37fd699028f97ae646ea.png', 'Pending', '902ab372803c37fd699028f97ae646ea.png', '2025-12-21 15:39:22'),
(26, 17, 28000, '23c34b449dc2f8e2e38c9aff1623b95b.png', 'Pending', '23c34b449dc2f8e2e38c9aff1623b95b.png', '2025-12-21 16:31:56'),
(27, 17, 18000, '7e59a756a5ca40770fc5a8f6acedc232.png', 'Lunas', '7e59a756a5ca40770fc5a8f6acedc232.png', '2025-12-21 16:56:11'),
(28, 11, 10000, '2b6b689be85254bbdac57e38427019e5.png', 'Pending', '2b6b689be85254bbdac57e38427019e5.png', '2025-12-21 17:05:19'),
(29, 18, 10000, 'b503faf0d63f90ed59574163172b3fd5.png', 'Pending', 'b503faf0d63f90ed59574163172b3fd5.png', '2025-12-21 17:08:05'),
(30, 19, 20000, '50b12c1988f138dcc81a8976fb348655.png', 'Pending', '50b12c1988f138dcc81a8976fb348655.png', '2025-12-21 18:03:45'),
(31, 20, 36000, '20143109dd4dc9e10aa1cba9d6e4a674.png', 'Pending', '20143109dd4dc9e10aa1cba9d6e4a674.png', '2025-12-22 03:30:49'),
(32, 20, 10000, '70fe06d7815df642884bb1d87f448cf4.png', 'Pending', '70fe06d7815df642884bb1d87f448cf4.png', '2025-12-22 08:15:49'),
(33, 20, 28000, '2cf3f86771e8f40291cb088d3b97a251.png', 'Lunas', '2cf3f86771e8f40291cb088d3b97a251.png', '2025-12-22 23:41:07'),
(34, 22, 54000, 'd31c1c4e158f1d9c14628db62e90a08f.png', 'Lunas', 'd31c1c4e158f1d9c14628db62e90a08f.png', '2025-12-23 03:25:14'),
(35, 22, 200000, '21764a65217f0846cd6669b239b73c99.png', 'Ditolak', '21764a65217f0846cd6669b239b73c99.png', '2025-12-23 03:39:33'),
(36, 23, 40000, 'f862d086a8ed03937158ab35bfd342b2.png', 'Lunas', 'f862d086a8ed03937158ab35bfd342b2.png', '2025-12-23 03:48:41'),
(37, 24, 56000, 'ddd853c99a412df11772fbd644441468.png', 'Lunas', 'ddd853c99a412df11772fbd644441468.png', '2025-12-23 04:22:33'),
(38, 25, 150000, '1eec93ff93f0104aa317114599d7de0c.png', 'Lunas', '1eec93ff93f0104aa317114599d7de0c.png', '2025-12-23 23:18:54'),
(39, 26, 78000, '7d45439ffba615dbf9bc1254d153321a.png', 'Ditolak', '7d45439ffba615dbf9bc1254d153321a.png', '2025-12-23 23:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_produk`, `qty`, `harga`, `subtotal`) VALUES
(1, 2, NULL, 1, NULL, 0),
(2, 3, NULL, 5, NULL, 0),
(3, 3, NULL, 1, NULL, 0),
(4, 4, NULL, 1, NULL, 0),
(5, 5, NULL, 1, NULL, 0),
(6, 6, 0, 4, NULL, 0),
(7, 7, 0, 1, NULL, 0),
(8, 8, 0, 1, NULL, 0),
(9, 9, 0, 4, NULL, 0),
(10, 10, 20, 2, 18000, 36000),
(11, 11, 19, 1, 28000, 28000),
(12, 12, 16, 1, 19000, 19000),
(13, 13, 15, 2, 17000, 34000),
(14, 14, 18, 1, 14000, 14000),
(15, 15, 20, 1, 18000, 18000),
(16, 16, 19, 1, 28000, 28000),
(17, 17, 18, 1, 14000, 14000),
(18, 18, 19, 1, 28000, 28000),
(19, 19, 19, 1, 28000, 28000),
(20, 20, 20, 1, 18000, 18000),
(21, 21, 18, 1, 14000, 14000),
(22, 22, 19, 1, 28000, 28000),
(23, 23, 20, 2, 18000, 36000),
(24, 24, 20, 2, 18000, 36000),
(25, 24, 15, 1, 17000, 17000),
(26, 25, 15, 1, 17000, 17000),
(27, 26, 19, 1, 28000, 28000),
(28, 27, 20, 1, 18000, 18000),
(29, 28, 21, 1, 10000, 10000),
(30, 29, 21, 1, 10000, 10000),
(31, 30, 21, 2, 10000, 20000),
(32, 31, 20, 2, 18000, 36000),
(33, 32, 21, 1, 10000, 10000),
(34, 33, 19, 1, 28000, 28000),
(35, 34, 20, 3, 18000, 54000),
(36, 35, 22, 2, 100000, 200000),
(37, 36, 17, 2, 20000, 40000),
(38, 37, 19, 2, 28000, 56000),
(39, 38, 26, 3, 50000, 150000),
(40, 39, 19, 1, 28000, 28000),
(41, 39, 26, 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_supplier`
--

CREATE TABLE `transaksi_supplier` (
  `transaksi_supplier_id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` decimal(12,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_supplier`
--

INSERT INTO `transaksi_supplier` (`transaksi_supplier_id`, `id_supplier`, `tanggal_transaksi`, `total_harga`) VALUES
(1, 1, '2025-12-22', '0.00'),
(2, 1, '2025-12-22', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_supplier_detail`
--

CREATE TABLE `transaksi_supplier_detail` (
  `id_detail_masuk` int(11) NOT NULL,
  `id_transaksi_supplier` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `qty_masuk` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_detail_pembelian` (`id_pembelian`),
  ADD KEY `fk_detail_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `log_notifikasi`
--
ALTER TABLE `log_notifikasi`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `fk_pembelian_supplier` (`id_supplier`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  ADD PRIMARY KEY (`transaksi_supplier_id`),
  ADD KEY `fk_transaksi_supplier_supplier` (`id_supplier`);

--
-- Indexes for table `transaksi_supplier_detail`
--
ALTER TABLE `transaksi_supplier_detail`
  ADD PRIMARY KEY (`id_detail_masuk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_notifikasi`
--
ALTER TABLE `log_notifikasi`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  MODIFY `transaksi_supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_supplier_detail`
--
ALTER TABLE `transaksi_supplier_detail`
  MODIFY `id_detail_masuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `fk_detail_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_detail_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi_supplier`
--
ALTER TABLE `transaksi_supplier`
  ADD CONSTRAINT `fk_transaksi_supplier_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
