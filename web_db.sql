-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Feb 2018 pada 05.13
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address_tbl`
--

CREATE TABLE `address_tbl` (
  `address_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `address` text NOT NULL,
  `province` tinytext NOT NULL,
  `city` tinytext NOT NULL,
  `post_code` int(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `address_tbl`
--

INSERT INTO `address_tbl` (`address_id`, `customer_id`, `address`, `province`, `city`, `post_code`, `phone`) VALUES
(1, 1, 'Jakarta Pusat. DKI Jakarta', 'DKI Jakarta', 'Jakarta Pusat', 10250, '0808080808');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` tinytext NOT NULL,
  `gender` tinytext NOT NULL,
  `born` date NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `gender`, `born`, `create_date`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin super', 'laki-laki', '1994-04-04', '2018-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`, `brand_gambar`) VALUES
(1, 'Apple', 'brand4.png'),
(2, 'Samsung', 'brand3.png'),
(3, 'Vivo', ''),
(4, 'Oppo', ''),
(5, 'LG', 'brand6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_id` int(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `gender` tinytext NOT NULL,
  `born` date NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_id`, `customer_email`, `customer_password`, `customer_name`, `gender`, `born`, `create_date`) VALUES
(1, 'test@gmail.com', 'test', 'test test', 'laki-laki', '1990-02-02', '2017-12-14'),
(2, 'waw@gmail.com', 'waw', 'waw 2', 'laki-laki', '1991-01-01', '2018-01-16'),
(3, 'yelo@gmail.com', 'yelo', 'yelooo', 'Perempuan', '2004-12-12', '2018-01-19'),
(4, 'yela@gmail.com', '78yu', 'yelo', 'Perempuan', '2011-01-01', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order_tbl`
--

CREATE TABLE `detail_order_tbl` (
  `detail_order_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `jumlah_barang` int(255) NOT NULL,
  `jumlah_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_order_tbl`
--

INSERT INTO `detail_order_tbl` (`detail_order_id`, `order_id`, `product_id`, `jumlah_barang`, `jumlah_harga`) VALUES
(8, 8, 15, 1, 4000000),
(9, 9, 12, 1, 10500000),
(10, 10, 15, 5, 4000000),
(11, 11, 7, 1, 11500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `postcode` int(11) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `total_price` double NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `customer_id`, `address`, `province`, `city`, `postcode`, `phone`, `total_price`, `order_date`, `status`) VALUES
(8, 1, 'ui', 'ui', 'ui', 90, '98', 4000000, '2018-01-23 00:00:00', 'Proses'),
(9, 1, 'qw', 'qw', 'qw', 90, '90', 10500000, '2018-01-23 00:00:00', 'Belum Lunas'),
(10, 2, 'we', 'we', 'we', 90, '67', 20000000, '2018-01-27 00:00:00', 'Proses'),
(11, 1, 'op', 'op', 'op', 90, '98', 11500000, '2018-01-27 00:00:00', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `payment_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `nomor_rekening` int(50) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `total_bayar` double NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `payment_tbl`
--

INSERT INTO `payment_tbl` (`payment_id`, `customer_id`, `order_id`, `nama_bank`, `nomor_rekening`, `atas_nama`, `total_bayar`, `gambar`, `create_date`) VALUES
(1, 2, 10, 'mandiri', 2147483647, 'test', 20000000, 'exercises31.jpg', '2018-01-27 16:13:10'),
(3, 1, 8, 'bni', 2147483647, 'test2', 4000000, 'exercises21.jpg', '2018-01-27 16:31:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(100) NOT NULL,
  `brand_id` int(100) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` text NOT NULL,
  `price` int(255) NOT NULL,
  `stock` int(255) NOT NULL,
  `gambar1` varchar(20) NOT NULL,
  `gambar2` varchar(20) NOT NULL,
  `gambar3` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `brand_id`, `product_name`, `product_description`, `price`, `stock`, `gambar1`, `gambar2`, `gambar3`, `create_date`) VALUES
(2, 1, 'iphone 7', '<p>&nbsp;&nbsp; &nbsp;Baterai: 1960 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: A10<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1334 x 750px 326ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 4,7 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 7 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 32 GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: -<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 2 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v4.2/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: IPS<br />\r\n&nbsp;&nbsp; &nbsp;OS: ios 10<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 9200000, 50, '', '', '', '2017-10-18 15:18:45'),
(3, 1, 'iPhone 7', '<p>&nbsp;&nbsp;&nbsp; Baterai: 1960 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: A10<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1334 x 750px 326ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 4,7 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 7 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 128 GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: -<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 2 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v4.2/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: IPS<br />\r\n&nbsp;&nbsp; &nbsp;OS: ios 10<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 10200000, 50, '', '', '', '2017-10-18 15:26:00'),
(4, 1, 'iPhone 7 Plus', '<p>&nbsp;&nbsp;&nbsp; Baterai: 2900 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: A10<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1920 x 1080px 401ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 5,5 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP (dual camera)<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 7 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 32 GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: -<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 3 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v4.2/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: IPS<br />\r\n&nbsp;&nbsp; &nbsp;OS: ios 10<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 10300000, 50, '', '', '', '2017-10-18 15:26:00'),
(5, 1, 'iPhone 7 Plus', '<p>&nbsp;&nbsp;&nbsp; Baterai: 2900 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: A10<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1920 x 1080px 401ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 5,5 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP (dual camera)<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 7 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 256&nbsp;GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: -<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 3 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v4.2/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: IPS<br />\r\n&nbsp;&nbsp; &nbsp;OS: ios 10<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 12200000, 50, 'iphone7plus_2.JPG', 'iphone7plus_1.JPG', 'iphone7plus_3.JPG', '2017-10-18 15:26:00'),
(6, 2, 'Galaxy S8', '<p>&nbsp;&nbsp;&nbsp; Baterai: 3000 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: Qualcomm Snapdragon 835<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1440 x 2960px 568ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 5,8 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 8 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 64GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: Up to 256GB<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 4 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v5/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: Super AMOLED<br />\r\n&nbsp;&nbsp; &nbsp;OS: Android 7 Nougat<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 10500000, 50, '', '', '', '2017-10-18 15:26:00'),
(7, 2, 'Galaxy S8 Plus', '<p>&nbsp;&nbsp;&nbsp; Baterai: 3500 mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: Qualcomm Snapdragon 835<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1440 x 2960px 529ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 6,2 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12 MP<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 8 MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 64GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: Up to 256GB<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 4 GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v5/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: Super AMOLED<br />\r\n&nbsp;&nbsp; &nbsp;OS: Android 7 Nougat&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 11500000, 50, '', '', '', '2017-10-18 15:26:00'),
(8, 2, 'Note 8', '<p>&nbsp;&nbsp;&nbsp; Baterai: 3300mAh<br />\r\n&nbsp;&nbsp; &nbsp;Prosesor: Samsung Exynos 8895<br />\r\n&nbsp;&nbsp; &nbsp;Resolusi: 1440 x 2960px 521ppi<br />\r\n&nbsp;&nbsp; &nbsp;Ukuran Layar: 6.3 inci<br />\r\n&nbsp;&nbsp; &nbsp;Kamera: 12MP (dual camera)<br />\r\n&nbsp;&nbsp; &nbsp;Kamera Depan: 8MP<br />\r\n&nbsp;&nbsp; &nbsp;Internal: 64GB<br />\r\n&nbsp;&nbsp; &nbsp;Micro SD: Up to 256GB<br />\r\n&nbsp;&nbsp; &nbsp;RAM: 6GB<br />\r\n&nbsp;&nbsp; &nbsp;Koneksi: LTE/Bluetooth v5/NFC<br />\r\n&nbsp;&nbsp; &nbsp;Layar: Super Amoled<br />\r\n&nbsp;&nbsp; &nbsp;OS: Android 7.1.1 Nougat<br />\r\n&nbsp;&nbsp; &nbsp;SIM: Nano-SIM</p>\r\n', 12999000, 50, '', '', '', '2017-10-18 15:26:00'),
(11, 2, 'samms', '<p>balalala</p>\r\n', 900000, 90, '', '', '', '2017-11-01 00:00:00'),
(12, 5, 'LG V30 Plus', '<p>Baterai:&nbsp;3300 mAh<br />\r\nProsesor:&nbsp;Qualcomm MSM8998 Snapdragon 835<br />\r\nUkuran Layar:&nbsp;6.0&quot;<br />\r\nKamera:&nbsp;16MP,&nbsp;13MP<br />\r\nKamera Depan:&nbsp;5MP Dual<br />\r\nInternal:&nbsp;128GB<br />\r\nMicro SD:&nbsp;Up to 256 GB<br />\r\nRAM:&nbsp;4GB<br />\r\nKoneksi: LTE, NFC, Bluetooth v4<br />\r\nLayar:&nbsp;P-OLED capacitive touchscreen, 16M colors<br />\r\nOS:&nbsp;Android 7.1.1 (Nougat)<br />\r\nSIM:&nbsp;Dual SIM</p>\r\n', 10500000, 50, '', '', '', '2018-01-17 16:15:29'),
(13, 5, 'LG G6 Plus', '<p>Baterai:&nbsp;3300 mAh<br />\r\nProsesor:&nbsp;Quad-core 2.35GHz<br />\r\nResolusi:&nbsp;1440 x 2880 pixels<br />\r\nUkuran Layar:&nbsp;5.7&quot;<br />\r\nKamera:&nbsp;13MP Dual<br />\r\nKamera Depan:&nbsp;5MP<br />\r\nInternal:&nbsp;128GB<br />\r\nMicro SD:&nbsp;Up to 256 GB<br />\r\nRAM:&nbsp;4GB<br />\r\nKoneksi:&nbsp;4G, LTE, NFC<br />\r\nLayar:&nbsp;IPS LCD capacitive touchscreen, 16M colors<br />\r\nOS:&nbsp;Android 7.0 (Nougat)<br />\r\nSIM:&nbsp;Dual SIM</p>\r\n', 8300000, 50, '', '', '', '2018-01-17 16:21:40'),
(14, 4, 'Oppo F5 Black', '<p>Baterai:&nbsp;3200 mAh<br />\r\nProsesor:&nbsp;Mediatek MT6763T<br />\r\nResolusi:&nbsp;1080 x 2160 pixels<br />\r\nUkuran Layar:&nbsp;6.0&quot;<br />\r\nKamera:&nbsp;16MP<br />\r\nKamera Depan:&nbsp;20MP<br />\r\nInternal:&nbsp;32GB<br />\r\nMicro SD:&nbsp;Up to 256 GB<br />\r\nRAM:&nbsp;4GB<br />\r\nKoneksi:&nbsp;4G, LTE<br />\r\nLayar:&nbsp;LTPS IPS LCD capacitive touchscreen, 16M colors<br />\r\nOS:&nbsp;Android 7.1 (Nougat)<br />\r\nSIM: Dual SIM</p>\r\n', 4000000, 50, '', '', '', '2018-01-19 08:50:50'),
(15, 4, 'Oppo F5 Gold', '<p>Baterai:&nbsp;3200 mAh<br />\r\nProsesor:&nbsp;Mediatek MT6763T<br />\r\nResolusi:&nbsp;1080 x 2160 pixels<br />\r\nUkuran Layar:&nbsp;6.0&quot;<br />\r\nKamera:&nbsp;16MP<br />\r\nKamera Depan:&nbsp;20MP<br />\r\nInternal:&nbsp;32GB<br />\r\nMicro SD:&nbsp;Up to 256 GB<br />\r\nRAM:&nbsp;4GB<br />\r\nKoneksi:&nbsp;4G, LTE<br />\r\nLayar:&nbsp;LTPS IPS LCD capacitive touchscreen, 16M colors<br />\r\nOS:&nbsp;Android 7.1 (Nougat)<br />\r\nSIM: Dual SIM</p>\r\n', 4000000, 50, '', '', '', '2018-01-19 12:17:25'),
(16, 3, 'VIVO V7+ Gold', '<p>Baterai:&nbsp;3200 mAh<br />\r\nProsesor:&nbsp;Qualcomm Snapdragon 450<br />\r\nResolusi:&nbsp;1440 x 720 HD<br />\r\nUkuran Layar:&nbsp;5.99 inch<br />\r\nKamera:&nbsp;16MP<br />\r\nKamera Depan:&nbsp;24MP&nbsp;<br />\r\nInternal:&nbsp;64GB<br />\r\nMicro SD:&nbsp;Up to 256 GB<br />\r\nRAM:&nbsp;4GB<br />\r\nKoneksi:&nbsp;4G, LTE<br />\r\nLayar:&nbsp;IPS LCD capacitive touchscreen, 16M colors<br />\r\nOS:&nbsp;Android 7.0 (Nougat)<br />\r\nSIM: Dual SIM</p>\r\n', 4400000, 50, '', '', '', '2018-01-19 12:26:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_tbl`
--

CREATE TABLE `review_tbl` (
  `review_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seller_tbl`
--

CREATE TABLE `seller_tbl` (
  `seller_id` int(255) NOT NULL,
  `product_id` int(100) NOT NULL,
  `jumlah_seller` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `seller_tbl`
--

INSERT INTO `seller_tbl` (`seller_id`, `product_id`, `jumlah_seller`) VALUES
(1, 4, 7),
(2, 5, 2),
(3, 2, 5),
(4, 8, 10),
(5, 6, 4),
(6, 7, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`customer_email`);

--
-- Indexes for table `detail_order_tbl`
--
ALTER TABLE `detail_order_tbl`
  ADD PRIMARY KEY (`detail_order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `seller_tbl`
--
ALTER TABLE `seller_tbl`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_tbl`
--
ALTER TABLE `address_tbl`
  MODIFY `address_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_order_tbl`
--
ALTER TABLE `detail_order_tbl`
  MODIFY `detail_order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review_tbl`
--
ALTER TABLE `review_tbl`
  MODIFY `review_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_tbl`
--
ALTER TABLE `seller_tbl`
  MODIFY `seller_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD CONSTRAINT `address_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_order_tbl`
--
ALTER TABLE `detail_order_tbl`
  ADD CONSTRAINT `detail_order_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_order_tbl_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD CONSTRAINT `payment_tbl_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_tbl_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD CONSTRAINT `product_tbl_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_tbl` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD CONSTRAINT `review_tbl_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_tbl_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `seller_tbl`
--
ALTER TABLE `seller_tbl`
  ADD CONSTRAINT `seller_tbl_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
