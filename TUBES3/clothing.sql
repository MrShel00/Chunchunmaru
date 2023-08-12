-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2023 at 06:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name_image` varchar(255) DEFAULT NULL,
  `file_image` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `kodeBarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(4) NOT NULL,
  `jenis` varchar(15) DEFAULT NULL,
  `stok` int(5) NOT NULL,
  `harga` int(15) NOT NULL,
  `created_at` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `jenis`, `stok`, `harga`, `created_at`) VALUES
(1, 'T-Shirt', 100, 150000, '2023-08-07 11:19:40'),
(2, 'Celana Panjang', 100, 1000000, '2023-08-07 11:21:00'),
(3, 'Hoodie', 100, 500000, '2023-08-07 11:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `kodeBarang` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `created_at` varchar(50) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kodeBarang`, `nama`, `jenis`, `ukuran`, `warna`, `sex`, `brand`, `bahan`, `deskripsi`, `image_name`, `created_at`) VALUES
(1, 'TS01P', 'Guilty Partie Shirt test', 'T-Shirt', '', 'Putih', 'M', 'Guilty Partie', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Guilty Partie Shirt.jpg', '2023-08-12 20:29:40'),
(2, 'TS02H', 'Helmut Lang Shirt', 'T-Shirt', '', 'Hitam', 'M', 'Helmut ', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton Combed', 'Helmut Lang Shirt.jpg', '2023-08-12 20:30:58'),
(4, 'TS04P', 'Hispanic T-Shirt', 'T-Shirt', '', 'Putih', 'M', 'Hispanic', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Hispanic T-Shirt.jpg', '2023-08-12 20:33:27'),
(5, 'TS05P', 'It Means Good T-Shirt', 'T-Shirt', '', 'Putih', 'M', 'Means', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'It Means Good T-Shirt.jpg', '2023-08-12 20:34:33'),
(6, 'TS06P', 'Lanvin Shirt', 'T-Shirt', '', 'Putih', 'M', 'Lanvin ', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Lanvin Shirt.jpg', '2023-08-12 20:35:55'),
(7, 'TS07H', 'Palm Angels T-Shirt', 'T-Shirt', '', 'Hitam', 'M', 'Palm Angels', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton Combed ', 'Palm Angels T-Shirt.jpg', '2023-08-12 20:37:00'),
(8, 'TS08P', 'Honor Ther Gift Shirt', 'T-Shirt', '', 'Putih', 'M', 'Honor', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Honor Ther Gift Shirt.jpg', '2023-08-12 20:38:22'),
(9, 'TS09P', 'Rhude T-Shirt', 'T-Shirt', '', 'Putih', 'M', 'Rhude ', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton  Combed ', 'Rhude T-Shirt.jpg', '2023-08-12 20:39:14'),
(10, 'TS10H', 'Sain Michael Shirt', 'T-Shirt', '', 'Hitam', 'M', 'Sain Michael', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton Combed ', 'Sain Michael.jpg', '2023-08-12 20:40:23'),
(12, 'HD01G', '77s Hoodie', 'T-Shirt', '', 'grey', 'M', '77s', 'Cotton and polyester', 'Hoodie berwarna abu-abu dengan bahan cotton and polyester', '77s Hoodie.jpg', '2023-08-12 21:01:24'),
(13, 'HD02H', 'Ksubi Hoodie', 'T-Shirt', '', 'Hitam', 'M', 'Ksubi', 'Cotton and polyester', 'Hoodie berwarna Hitam dengan bahan cotton and polyester', 'Ksubi Hoodie.jpg', '2023-08-12 21:03:13'),
(14, 'HD03N', 'Los Angeles Hoodie', 'Hoodie', '', 'Navy', 'M', 'LA', 'Cotton and polyester', 'Hoodie berwarna biru navy dengan bahan cotton and polyester', 'Los Angeles Hoodie.jpg', '2023-08-12 21:04:29'),
(15, 'HD04H', 'Off-White Hoodie', 'Hoodie', '', 'Hitam', 'M', 'Off-White', 'Cotton and polyester', 'Hoodie berwarna Hitam dengan bahan cotton and polyester', 'Off-White Hoodie.jpg', '2023-08-12 21:05:57'),
(16, 'HD05C', 'The Essential Hoodie', 'Hoodie', '', 'Cream', 'M', 'Essential', 'Cotton and polyester', 'Hoodie berwarna cream dengan bahan cotton and polyester', 'The Essential Hoodie.jpg', '2023-08-12 21:08:10'),
(17, 'TS11H', 'FUTUREVVORLD T-Shirt', 'T-Shirt', '', 'Hitam', 'W', 'FUTUREVVORLD', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton Combed ', 'FUTUREVVORLD T-Shirt.JPG', '2023-08-12 21:10:51'),
(18, 'TS12S', 'God Eye T-Shirt', 'T-Shirt', '', 'Sakura pink', 'W', 'God Eye', 'catoon', 'Kaos berwarna pink sakura dengan bahan Cotton Combed ', 'God Eye T-Shirt.jpg', '2023-08-12 21:12:19'),
(19, 'TS13P', 'Heart T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Heart ', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Heart T-Shirt.jpg', '2023-08-12 21:13:38'),
(20, 'TS14H', 'Hell Was Boring in Black T-Shirt', 'T-Shirt', '', 'Hitam', 'F', 'Hell Was Boring', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton  Combed ', 'Hell Was Boring in Black T-Shirt.jpg', '2023-08-12 21:14:34'),
(21, 'TS15P', 'Hell Was Boring in White T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Hell Was Boring', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Hell Was Boring in White T-Shirt.jpg', '2023-08-12 21:15:38'),
(22, 'TS16P', 'Slogan & Figure Graphic T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Slogan & Figure', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Men Slogan & Figure Graphic T-Shirt.JPG', '2023-08-12 21:17:21'),
(23, 'TS17H', 'Self Love Club T-Shirt', 'T-Shirt', '', 'Hitam', 'F', 'Self Love', 'Cotton Combed', 'Kaos berwarna hitam dengan bahan Cotton Combed ', 'Self Love Club T-Shirt.jpg', '2023-08-12 21:18:09'),
(24, 'TS18P', 'Trick Or Treat T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Trick Or Treat', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Trick Or Treat T-Shirt.JPG', '2023-08-12 21:18:50'),
(25, 'TS19P', 'Undercover T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Undercover ', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Undercover T-Shirt.jpg', '2023-08-12 21:19:42'),
(26, 'TS20P', 'Vintage T-Shirt', 'T-Shirt', '', 'Putih', 'F', 'Vintage ', 'Cotton Combed', 'Kaos berwarna putih dengan bahan Cotton Combed ', 'Vintage T-Shirt.jpg', '2023-08-12 21:20:18'),
(27, 'HD06P', 'Do What Makes You Happy Hoodie', 'T-Shirt', '', 'Putih', 'F', 'DWMYH', 'Cotton and polyester', 'Hoodie berwarna putih dengan bahan cotton and polyester', 'Do What Makes You Happy Hoodie.jpg', '2023-08-12 21:30:43'),
(28, 'HD07S', 'Good Things Are Coming Hoodie', 'Hoodie', '', 'Good Things Are Coming Hoodie', 'F', 'GTAC', 'Cotton and polyester', 'Hoodie berwarna hijau sage dengan bahan cotton and polyester', 'Good Things Are Coming Hoodie.jpg', '2023-08-12 22:00:38'),
(29, 'HD08B', 'Smiley Pray Hoodie', 'Hoodie', '', 'Biru', 'F', 'Smiley ', 'Cotton and polyester', 'Hoodie berwarna biru dengan bahan cotton and polyester', 'Smiley Pray Hoodie.jpg', '2023-08-12 22:02:19'),
(30, 'HD09C', 'Solid Kangaroo Pocket Hoodie', 'Hoodie', '', 'Cream', 'F', 'Kangaroo ', 'Cotton and polyester', 'Hoodie berwarna cream dengan bahan cotton and polyester', 'Solid Kangaroo Pocket Hoodie.JPG', '2023-08-12 22:03:06'),
(31, 'HD10P', 'Look Cernta Hoodie', 'Hoodie', '', 'Pink', 'F', 'Weywot', 'Cotton and polyester', 'Hoodie berwarna pink dengan bahan cotton and polyester', 'Y2K Hoodie.jpg', '2023-08-12 22:05:00'),
(33, 'test', 'test', 'test', '', 'test', 't', 'test', 'stset', 'tset', 'Helmut Lang Shirt.jpg', '2023-08-12 22:27:37'),
(34, 'SH01', 'Adidas Forum 84 Low', 'Shoe', '', 'Putih', 'M', 'Adidas', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Adidas Forum 84 Low.jpg', '2023-08-12 22:53:33'),
(35, 'SH02MP', 'Amiri Shoe', 'Shoe', '', 'Merah Putih', 'M', 'Amiri', 'canvas', 'Sepatu yang didasari warna putih dan list merah  dengan bahan kanvas diperuntukkan untuk life style', 'Amiri Shoes.jpg', '2023-08-12 22:55:37'),
(36, 'SH03P', 'Chunky Sneakers', 'Shoe', '', 'Putih', 'M', 'Chunk', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Chunky Sneakers.jpg', '2023-08-12 22:56:23'),
(37, 'SH04P', 'Dior Winter Sneakers', 'Shoe', '', 'Putih', 'M', 'Dior', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Dior Winter Sneakers.jpg', '2023-08-12 22:56:57'),
(38, 'SH05P', 'Nike jordan UNC', 'Shoe', '', 'Putih', 'M', 'Nike', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk basket', 'Jordan UNC.jpg', '2023-08-12 22:58:45'),
(39, 'SH06H', 'Manchinni Sneakers', 'Shoe', '', 'Hitam', 'M', 'Manchinni ', 'canvas', 'Sepatu berwarna hitam dengan bahan kanvas diperuntukkan untuk life style', 'Manchinni Sneakers.jpg', '2023-08-12 22:59:31'),
(40, 'SH07PG', 'Nike Air Force 1 Mid X Off White Pine Green', 'Shoe', '', 'Hijau', 'M', 'Nike', 'canvas', 'Sepatu berwarna pine green dengan bahan kanvas diperuntukkan untuk basket', 'Nike Air Force 1 Mid X OffWhite Pine Green.jpg', '2023-08-12 23:01:21'),
(41, 'SH08P', 'Nike Air Max 1 Mica Green', 'Shoe', '', 'Putih', 'M', 'Nike', 'canvas', 'Sepatu berwarna putih dengan list abu dengan bahan kanvas diperuntukkan untuk basket', 'Nike Air Max 1 Mica Green.jpg', '2023-08-12 23:02:19'),
(42, 'SH09R', 'Nike Dunk Low Team Red', 'Shoe', '', 'Merah', 'M', 'Nike', 'canvas', 'Sepatu berwarna Merah dengan bahan kanvas diperuntukkan untuk basket', 'Nike Dunk Low Team Red.jpg', '2023-08-12 23:03:14'),
(43, 'SH10P', 'Summer Breathable Skateboard Sneakers', 'Shoe', '', 'Putih', 'M', 'Summer', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk skateboard', 'Summer Breathable Skateboard Sneakers.jpg', '2023-08-12 23:04:21'),
(44, 'SH11P', '90s Style Sneakers', 'Shoe', '', 'Putih', 'F', 'Arigato', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', '90s Style Sneakers.jpg', '2023-08-12 23:05:34'),
(45, 'SH12P', 'Amiri Team Read', 'Shoe', '', 'Putih', 'F', 'Amiri', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Amiri Team Read.jpg', '2023-08-12 23:06:16'),
(46, 'SH13P', 'Astro Chunky', 'Shoe', '', 'Putih', 'F', 'Astro', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Astro Chunky.JPG', '2023-08-12 23:06:44'),
(47, 'SH14P', 'Autry Medalist Sneaker All White', 'Shoe', '', 'Putih', 'F', 'Autry', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Autry Medalist Sneaker All White.jpg', '2023-08-12 23:07:16'),
(48, 'SH15P', 'COPENHAGEN CPH71', 'Shoe', '', 'Putih', 'F', 'COPENHAGEN', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'COPENHAGEN CPH71.jpg', '2023-08-12 23:08:02'),
(49, 'SH16P', 'Filling Pieces Sneakers', 'Shoe', '', 'Putih', 'F', 'Filling Pieces', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Filling Pieces Sneakers.jpg', '2023-08-12 23:08:33'),
(50, 'SH17P', 'Orbit Vintage ', 'Shoe', '', 'Putih', 'F', 'Orbit', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Orbit Vintage .jpg', '2023-08-12 23:09:08'),
(51, 'SH18P', 'Puma CA Pro', 'Shoe', '', 'Putih', 'F', 'PUMA', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'Puma CA Pro.jpg', '2023-08-12 23:09:40'),
(52, 'SH19P', 'The Arlo Sneakers', 'Shoe', '', 'Putih', 'F', 'Arlo', 'canvas', 'Sepatu berwarna putih dengan bahan kanvas diperuntukkan untuk life style', 'The Arlo Sneakers.JPG', '2023-08-12 23:10:12'),
(53, 'SH20H', 'Walden Loafers', 'Shoe', '', 'Hitam', 'F', 'Walden', 'canvas', 'Sepatu berwarna hitam dengan bahan kanvas diperuntukkan untuk life style', 'Walden Loafers.jpg', '2023-08-12 23:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
