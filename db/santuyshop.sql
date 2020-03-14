-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 04:07 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santuyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `nama_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Laptop'),
(2, 'Harddisk'),
(3, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `password_pelanggan` varchar(100) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat_pelanggan` text NOT NULL,
  `telepon_pelanggan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'errymongol@gmail.com', '$2y$10$4qwspGWJzGNzCUIoWhDXU.cmQKvhgE0f41Uadfctf5q5q1DVXctg2', 'Erry Mongolia', 'Jln. Saya Goreng', '08222222'),
(2, 'iskandar@gmail.com', '$2y$10$PEwa.2C8kF4VTv3Yyb7hsOHrfjB.6rdykqI5N0bSKEO.pz2U5SYQS', 'Iskandar', '', '081231234'),
(3, 'batimjohn@gmail.com', '$2y$10$g5CRrRkWESS4VDmpE7qi0OWOJb7kTeoPdaxmQoClo4UN/b4eUOU/G', 'Batim John', 'Jalan Soekamti', '08222212');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `no_faktur` int(6) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL,
  `status_pembelian` varchar(30) NOT NULL DEFAULT 'Belum Lunas'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `no_faktur`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(12, 937283, 2, '2018-07-07', 5000000, 'Belum Lunas'),
(13, 219849, 2, '2018-07-07', 1500000, 'Lunas'),
(14, 158198, 2, '2018-07-07', 750000, 'Lunas'),
(15, 805857, 2, '2018-07-07', 0, 'Belum Lunas'),
(16, 690978, 2, '2018-07-07', 0, 'Lunas'),
(17, 101379, 2, '2018-07-07', 875900, 'Lunas'),
(18, 871803, 2, '2018-07-07', 750000, 'Lunas'),
(19, 445386, 2, '2018-07-07', 52150000, 'Belum Lunas'),
(20, 829922, 2, '2018-07-07', 875900, 'Belum Lunas'),
(21, 311531, 3, '2018-07-07', 4750000, 'Belum Lunas'),
(22, 695625, 3, '2018-07-07', 4750000, 'Belum Lunas'),
(23, 638577, 3, '2018-07-07', 875900, 'Belum Lunas'),
(24, 250208, 3, '2018-07-07', 2627700, 'Lunas'),
(25, 849736, 3, '2018-07-07', 750000, 'Belum Lunas'),
(26, 429709, 3, '2018-07-07', 4750000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama_produk`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(2, 12, 6, 1, '', 0, 0, 0, 0),
(3, 13, 2, 2, '', 0, 0, 0, 0),
(4, 14, 2, 1, '', 0, 0, 0, 0),
(5, 17, 4, 1, '', 0, 0, 0, 0),
(6, 18, 1, 1, '', 0, 0, 0, 0),
(7, 19, 1, 5, '', 0, 0, 0, 0),
(8, 19, 8, 7, '', 0, 0, 0, 0),
(9, 20, 4, 1, '', 875900, 800, 800, 875900),
(10, 21, 7, 1, '', 4750000, 2100, 2100, 4750000),
(11, 22, 7, 1, '', 4750000, 2100, 2100, 4750000),
(12, 23, 4, 1, '', 875900, 800, 800, 875900),
(13, 24, 4, 3, '', 875900, 800, 2400, 2627700),
(14, 25, 4, 1, '', 875900, 800, 800, 875900),
(15, 25, 7, 1, '', 4750000, 2100, 2100, 4750000),
(16, 25, 1, 1, '', 750000, 100, 100, 750000),
(17, 26, 6, 1, '', 5000000, 1000, 1000, 5000000),
(18, 26, 7, 1, '', 4750000, 2100, 2100, 4750000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(3) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi_produk` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat`, `gambar`, `deskripsi_produk`) VALUES
(1, 2, 'Harddisk Oriclo 2TB', 750000, 100, 'oriclo.jpg', 'Ini Harddisk Sangat Bagus dalam membackup data    '),
(2, 2, 'Harddisk Seagate 2TB Black', 750000, 1000, 'seagate2tb.jpg', 'Harddisk Seagate dengan ukuran penyimpanan yang besar , mampu membackup semua file anda dengan aman. Mantap pokonya mah                     '),
(4, 2, 'Hardisk External Seagate 2TB Slim Original Garansi Resmi - Blue', 875900, 800, 'seagate2tb.gif', 'Hardisk External 1 TB original warna merah<br>\r\nGaransi 1 tahun service.'),
(6, 1, 'Lenovo Ideapad 110-14ISK', 5000000, 1000, 'lenovo2.jpg', '  \r\n      -Kelengkapan fullset box tas charger ada semua tentunya segel pabrik masih nempel alias barang belum pernah samasekali di bongkar ( Barang masih segelan ). <br>  \r\n-Laptop seri baru keluaran terbaru Skylake generasi ke 6 Kondisi fisik mulus 95%.     '),
(7, 1, 'Laptop Asus x455Ia', 4750000, 2100, 'asus.png', 'Laptop Asus dengan spesifikasi : Intel Core i3,IntelÂ® Coreâ„¢ i3-4005U Processor (1.70 GHz, 3M Cache),  500 GB HDD'),
(8, NULL, 'Asus A442UR - GA Core I 5 8250 Gen Ke 8 Vga 2gb', 7450000, 5000, 'asus_a442ur.jpg', 'ASUS A442UR-GA(CORE I5-8250U, 4GB, 1TB, WIN 10, 14 INCH, DARK GREY, GOLD)');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_testimoni`, `nama`, `email`, `subjek`, `pesan`) VALUES
(0, 'Erry Nurhadiansyah', 'erry72@gmail.com', 'ask', 'adsasdasd'),
(0, 'Erry Mongolia', 'guitarlearn72@gmail.com', 'ask', 'asdasdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_ongkir` (`no_faktur`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`),
  ADD KEY `id_pembelian` (`id_pembelian`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
