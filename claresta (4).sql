-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 10:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claresta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `no_telp_admin`) VALUES
(8, 'nathanaels', '$2y$10$u1CTkY1T.Co.VSJ/JWX7TeroYxjXVJjTu8rnQtuC97g1LO0Y4qwMq', 'nathanael.vd@gmail.com', '12312312312312312');

-- --------------------------------------------------------

--
-- Table structure for table `foto_cover`
--

CREATE TABLE `foto_cover` (
  `id_foto_cover` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_foto_cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_cover_pem`
--

CREATE TABLE `foto_cover_pem` (
  `id_foto_cover_pem` int(11) NOT NULL,
  `nama_foto_cover_pem` varchar(255) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_pelanggan`
--

CREATE TABLE `foto_pelanggan` (
  `id_foto_pelanggan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_pelanggan_pem`
--

CREATE TABLE `foto_pelanggan_pem` (
  `id_foto_pelanggan_pem` int(11) NOT NULL,
  `nama_foto_pem` varchar(255) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `id_foto_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`id_foto_produk`, `id_produk`, `nama_produk_foto`) VALUES
(13, 7, 'IMG-20200506-WA0020.jpg'),
(16, 7, '20200630144728IMG-20200506-WA0018.jpg'),
(17, 7, '20200630144751IMG-20200506-WA0017.jpg'),
(18, 8, 'IMG-20200506-WA0016.jpg'),
(19, 8, 'IMG-20200506-WA0015.jpg'),
(20, 8, 'IMG-20200506-WA0014.jpg'),
(21, 9, 'IMG-20200506-WA0013.jpg'),
(22, 9, 'IMG-20200506-WA0012.jpg'),
(23, 9, 'IMG-20200506-WA0010.jpg'),
(24, 10, 'IMG-20200506-WA0011.jpg'),
(25, 10, 'IMG-20200506-WA0006.jpg'),
(26, 10, 'IMG-20200506-WA0007.jpg'),
(27, 10, 'IMG-20200506-WA0008.jpg'),
(28, 10, 'IMG-20200506-WA0009.jpg'),
(29, 11, 'IMG-20200505-WA0016.jpg'),
(30, 11, 'IMG-20200505-WA0018.jpg'),
(31, 11, 'IMG-20200505-WA0019.jpg'),
(32, 11, 'IMG-20200505-WA0020.jpg'),
(33, 11, 'IMG-20200506-WA0003.jpg'),
(34, 11, 'IMG-20200506-WA0004.jpg'),
(35, 11, 'IMG-20200506-WA0005.jpg'),
(36, 12, 'IMG-20200505-WA0012.jpg'),
(37, 12, 'IMG-20200505-WA0013.jpg'),
(38, 12, 'IMG-20200505-WA0014.jpg'),
(39, 12, 'IMG-20200505-WA0015.jpg'),
(40, 12, 'IMG-20200505-WA0017.jpg'),
(41, 13, 'IMG-20200505-WA0008.jpg'),
(42, 13, 'IMG-20200505-WA0009.jpg'),
(43, 13, 'IMG-20200505-WA0010.jpg'),
(44, 13, 'IMG-20200505-WA0011.jpg'),
(45, 14, 'IMG-20200505-WA0002.jpg'),
(46, 14, 'IMG-20200505-WA0003.jpg'),
(47, 14, 'IMG-20200505-WA0004.jpg'),
(48, 14, 'IMG-20200505-WA0005.jpg'),
(49, 14, 'IMG-20200505-WA0006.jpg'),
(50, 14, 'IMG-20200505-WA0007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'photobook'),
(2, 'polaroid');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nyoba`
--

CREATE TABLE `nyoba` (
  `id_nyoba` int(11) NOT NULL,
  `waw` varchar(100) NOT NULL,
  `harga` varchar(225) NOT NULL,
  `urusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `berat` int(56) NOT NULL,
  `provinsi` varchar(225) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `kodepos` int(55) NOT NULL,
  `ekspedisi_kurir` varchar(255) NOT NULL,
  `jenis_paket` varchar(50) NOT NULL,
  `estimasi` int(10) NOT NULL,
  `ongkir` int(155) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(255) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_lengkap`) VALUES
(2, 'mantul@gmail.com', 'apapunlah', 'mantul', '0123123123', ''),
(3, 'mantul@gmail.com', 'michaeng14', 'mantul', '0123123123', ''),
(4, 'mantul@gmail.com', '123123123', 'mantul', '0123123123', ''),
(9, 'mantul@gmail.com', '$2y$10$xhM2qdvA6eucCUdg4O4XEOiCs2qE/hkg74fCgQZIMbCDZdQ9EvP2S', 'mantul', '0123123123', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `resi` varchar(255) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `max` varchar(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `max`, `nama_produk`, `harga`, `berat`, `deskripsi`, `foto`) VALUES
(7, 1, '150', 'PORTRAIT JURNAL', 999000, 1200, 'Kertas Premium\r\nCostum cover\r\nHard Cover\r\nukuran 21 * 26\r\n100 halaman\r\n150 foto', 'IMG-20200506-WA0020.jpg'),
(8, 1, '56', 'MEDIUM COSTUM', 265000, 1200, 'Kertas Premium\r\nCustom Cover\r\nHard Cover\r\nukuran 21 * 15 cm\r\n56 halaman', 'IMG-20200506-WA0016.jpg'),
(9, 1, '65', 'SOFTBOOK 40 HALAMAN', 150000, 1200, 'Kertas Medium\r\nCustom Cover\r\n65 foto\r\nUkuran 21 * 15 cm\r\n40 Halaman ', 'IMG-20200506-WA0013.jpg'),
(10, 1, '35', 'SOFTBOOK 24 Halaman', 100000, 1200, 'Kertas Medium\r\nCustom Cover\r\n50 foto\r\nukuran 21 * 15 cm\r\n24 Halaman', 'IMG-20200506-WA0011.jpg'),
(11, 2, '120', 'POLAROID FULL PRINT', 125000, 1200, 'ukuran 11 * 8 cm\r\n120 foto\r\nkertas premium', 'IMG-20200505-WA0016.jpg'),
(12, 1, '75', 'PHOTOBOOK PREMIUM', 1200000, 1200, 'Kertas Premium\r\nCover Import Premium Suede\r\nHard Cover\r\nLay Flat\r\nUkuran 21 * 26 cm\r\n40 Halaman\r\n75 Foto', 'IMG-20200505-WA0012.jpg'),
(13, 1, '65', 'PHOTOBOOK WEDDING', 600000, 1200, 'Kertas Premium\r\nCover Import Premium Suede\r\nHard Cover\r\nUkuran 22 * 22 cm', 'IMG-20200505-WA0008.jpg'),
(14, 1, '75', 'PHOTOBOOK WEDDING', 650000, 1200, 'Kertas Premium + Exclusive Box Grafit\r\nHard Cover\r\nLay Flat Finnishing\r\nUkuran 20 * 25 cm\r\n75 Foto', 'IMG-20200505-WA0002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rek`
--

CREATE TABLE `rek` (
  `id_rek` int(11) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rek` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek`
--

INSERT INTO `rek` (`id_rek`, `atas_nama`, `bank`, `no_rek`) VALUES
(1, 'Claresta', 'BCA', '09876543'),
(2, 'Levina', 'Mandiri', '098765432345');

-- --------------------------------------------------------

--
-- Table structure for table `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `nama_tema` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema`
--

INSERT INTO `tema` (`id_tema`, `nama_tema`) VALUES
(1, 'Polos'),
(2, 'Alam'),
(3, 'Wedding'),
(4, 'Bunga'),
(5, 'Bergaris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `foto_cover`
--
ALTER TABLE `foto_cover`
  ADD PRIMARY KEY (`id_foto_cover`);

--
-- Indexes for table `foto_cover_pem`
--
ALTER TABLE `foto_cover_pem`
  ADD PRIMARY KEY (`id_foto_cover_pem`);

--
-- Indexes for table `foto_pelanggan`
--
ALTER TABLE `foto_pelanggan`
  ADD PRIMARY KEY (`id_foto_pelanggan`);

--
-- Indexes for table `foto_pelanggan_pem`
--
ALTER TABLE `foto_pelanggan_pem`
  ADD PRIMARY KEY (`id_foto_pelanggan_pem`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`id_foto_produk`);

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
-- Indexes for table `nyoba`
--
ALTER TABLE `nyoba`
  ADD PRIMARY KEY (`id_nyoba`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rek`
--
ALTER TABLE `rek`
  ADD PRIMARY KEY (`id_rek`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `foto_cover`
--
ALTER TABLE `foto_cover`
  MODIFY `id_foto_cover` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `foto_cover_pem`
--
ALTER TABLE `foto_cover_pem`
  MODIFY `id_foto_cover_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_pelanggan`
--
ALTER TABLE `foto_pelanggan`
  MODIFY `id_foto_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

--
-- AUTO_INCREMENT for table `foto_pelanggan_pem`
--
ALTER TABLE `foto_pelanggan_pem`
  MODIFY `id_foto_pelanggan_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `id_foto_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `nyoba`
--
ALTER TABLE `nyoba`
  MODIFY `id_nyoba` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rek`
--
ALTER TABLE `rek`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
