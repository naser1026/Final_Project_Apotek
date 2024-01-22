-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2024 at 02:19 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u560159210_db_apotek`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `product`
-- (See below for the actual view)
--
CREATE TABLE `product` (
`id_product_tmp` int(11)
,`small_barcode_tmp` varchar(20)
,`large_barcode_tmp` varchar(20)
,`name_tmp` varchar(200)
,`name_tmf` varchar(45)
,`name_tms` varchar(50)
,`name_tmun` varchar(50)
,`large_price_tmp` int(10)
,`small_price_tmp` int(11)
,`fill_tmp` int(11)
,`stock_tmp` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_h_product`
--

CREATE TABLE `tbl_h_product` (
  `id_product_thp` int(11) NOT NULL,
  `large_barcode_thp` varchar(20) NOT NULL,
  `small_barcode_thp` varchar(20) NOT NULL,
  `name_thp` varchar(200) NOT NULL,
  `id_large_unit_thp` int(11) NOT NULL,
  `id_small_unit_thp` int(11) NOT NULL,
  `fill_thp` int(11) NOT NULL,
  `large_price_thp` int(10) NOT NULL,
  `small_price_thp` int(11) NOT NULL,
  `id_suplier_thp` int(11) NOT NULL,
  `id_factory_thp` int(11) NOT NULL,
  `date_added_thp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `added_by_thp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_h_product`
--

INSERT INTO `tbl_h_product` (`id_product_thp`, `large_barcode_thp`, `small_barcode_thp`, `name_thp`, `id_large_unit_thp`, `id_small_unit_thp`, `fill_thp`, `large_price_thp`, `small_price_thp`, `id_suplier_thp`, `id_factory_thp`, `date_added_thp`, `added_by_thp`) VALUES
(29, '-', '-', 'Mixagrip', 32, 3, 10, 10000, 1110, 5, 2, '2023-12-20 04:37:46', 'admin'),
(32, '-', '-', 'ABOCATH 18', 31, 31, 1, 15000, 16650, 0, 0, '2023-12-21 01:27:32', 'admin'),
(33, '89919906181646', '89919906181646', 'ABOCATH 20	', 31, 31, 1, 15000, 16650, 0, 0, '2023-12-21 01:31:34', 'admin'),
(34, '', '', 'ACRAN 150MG TAB', 32, 35, 30, 144000, 5328, 0, 1, '2023-12-21 01:32:50', 'admin'),
(35, '', '', 'ACRAN 150MG TAB', 36, 25, 1, 47523, 52750, 0, 0, '2023-12-21 01:35:27', 'admin'),
(36, '', '', 'ACTIVED MERAH', 36, 25, 1, 54535, 60533, 0, 0, '2023-12-21 01:37:33', 'admin'),
(37, '', '', 'ACYCLOVIR 200MG TAB', 32, 35, 100, 59500, 660, 0, 21, '2023-12-21 01:38:40', 'admin'),
(38, '', '', 'ACYCLOVIR 400 MG TAB', 32, 35, 100, 70000, 777, 0, 0, '2023-12-21 01:39:30', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_h_user`
--

CREATE TABLE `tbl_h_user` (
  `id_user_thu` int(11) NOT NULL,
  `name_thu` varchar(50) NOT NULL,
  `email_thu` varchar(100) NOT NULL,
  `phone_number_thu` varchar(20) NOT NULL,
  `password_thu` varchar(500) NOT NULL,
  `role_thu` enum('OWNER','ADMIN') NOT NULL,
  `created_date_thu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_h_user`
--

INSERT INTO `tbl_h_user` (`id_user_thu`, `name_thu`, `email_thu`, `phone_number_thu`, `password_thu`, `role_thu`, `created_date_thu`) VALUES
(23, 'udin', 'owner@mail.com', '08222888333', '$2y$10$07kI5UGtdo6fsSPzUkbarOsK1pkO6IuCfhkAwb2o.v7h2Fxus64Xu', 'OWNER', '2024-01-08 10:08:34'),
(1, 'admin', 'admin@mail.com', '083377199913', '$2y$10$07kI5UGtdo6fsSPzUkbarOsK1pkO6IuCfhkAwb2o.v7h2Fxus64Xu', 'ADMIN', '2023-12-19 00:05:04'),
(2, 'owner', 'owner@mail.com', '08222888333', '$2y$10$07kI5UGtdo6fsSPzUkbarOsK1pkO6IuCfhkAwb2o.v7h2Fxus64Xu', 'OWNER', '2024-01-08 10:08:34'),
(25, 'Udin', 'udin@mail.com', '08222888000', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '2024-01-08 10:08:34'),
(26, 'TA', 'owner@mail.com', '08222888000', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '2024-01-08 10:08:34'),
(27, 'DNKWND', 'owner@mail.com', '08222888000', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '2024-01-08 10:08:34'),
(28, 'Ownerdnwd', 'owner@mail.com', '08222888000', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '2024-01-08 10:08:34'),
(29, 'OwnerDKWNKDNW', 'owner@mail.com', '08222888000', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '2024-01-08 10:08:34'),
(34, 'Mixagrip', 'setia@gmail.com', '08222888111', '$2y$10$SNzwSFyOQQ5ITNiL8sA.W.T3.H2qSu1VarORqHRXtvYxevZ3CfaVK', 'ADMIN', '2024-01-11 19:32:16'),
(35, 'Botol', 'admin@mail.com', '08222888000', '$2y$10$Jy31NqvaeEc0mDJNMYLgB.uc10IoGeT.jlM3uPEsE.ZxkgQepdqiu', 'ADMIN', '2024-01-11 19:42:42'),
(36, 'Botol', 'admin@mail.com', '08222888000', '$2y$10$yUCRHLYBGisQMf4/xPSe6uvdMNf0TDP/mofOuc82L.sbeIv5NyTl6', 'ADMIN', '2024-01-11 19:44:24'),
(37, 'zalfa', 'admin@mail.com', '97979172', '$2y$10$ozvrJJYXYOWrurB8JRvrfOJ/ZToMVFr04OXKsjk78WqUQkd9Dt.qS', 'ADMIN', '2024-01-20 10:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_factory`
--

CREATE TABLE `tbl_m_factory` (
  `id_factory_tmf` int(11) NOT NULL,
  `name_tmf` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_factory`
--

INSERT INTO `tbl_m_factory` (`id_factory_tmf`, `name_tmf`) VALUES
(0, '-'),
(1, 'SANBE FARMA'),
(2, 'YUPHARIN'),
(3, 'SOHO'),
(4, 'BOEHRINGER I'),
(5, 'RUSCH'),
(6, 'JITU'),
(7, 'OTTO PHARMACEUTICAL'),
(8, 'NEW INTERBAT'),
(10, 'COMBIPHAR'),
(11, 'TERUMO'),
(12, 'BECTON DICKI	'),
(13, 'NOVO NORDISK	'),
(14, 'PHAPROS'),
(15, 'LAPI LABORATORIES'),
(16, 'SANBE FARMA OTC	'),
(17, 'NOVELL ALFA'),
(18, 'JITU'),
(19, 'KALBE FARMA'),
(20, 'BAYER'),
(21, 'GENERIK'),
(22, 'MERAPI'),
(23, 'GABAH'),
(24, 'MERCK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_opname`
--

CREATE TABLE `tbl_m_opname` (
  `id_opname_tmo` int(11) NOT NULL,
  `description_tmo` varchar(100) NOT NULL,
  `qty_ok_tmo` int(11) NOT NULL,
  `qty_up_tmo` int(11) NOT NULL,
  `qty_down_tmo` int(11) NOT NULL,
  `created_by_tmo` varchar(50) NOT NULL,
  `created_date_tmo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `percentase_tmo` varchar(10) NOT NULL,
  `total_difference_price_tmo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_opname`
--

INSERT INTO `tbl_m_opname` (`id_opname_tmo`, `description_tmo`, `qty_ok_tmo`, `qty_up_tmo`, `qty_down_tmo`, `created_by_tmo`, `created_date_tmo`, `percentase_tmo`, `total_difference_price_tmo`) VALUES
(5, 'SO 30/12/2023', 7, 0, 0, 'admin', '2023-12-30 01:22:20', '0.00%', 0),
(6, 'SO 09/01/2024', 5, 1, 1, 'owner', '2024-01-09 22:53:36', '0.17%', -28304),
(7, 'SO 21/01/2024', 7, 0, 0, 'Owner', '2024-01-21 11:26:43', '0.00%', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_product`
--

CREATE TABLE `tbl_m_product` (
  `id_product_tmp` int(11) NOT NULL,
  `large_barcode_tmp` varchar(20) DEFAULT NULL,
  `small_barcode_tmp` varchar(20) DEFAULT NULL,
  `name_tmp` varchar(200) NOT NULL,
  `id_large_unit_tmp` int(11) NOT NULL,
  `id_small_unit_tmp` int(11) NOT NULL,
  `fill_tmp` int(11) NOT NULL,
  `large_price_tmp` int(10) NOT NULL,
  `small_price_tmp` int(11) NOT NULL,
  `id_suplier_tmp` int(11) DEFAULT NULL,
  `id_factory_tmp` int(11) DEFAULT NULL,
  `date_added_tmp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `added_by_tmp` varchar(50) DEFAULT NULL,
  `update_by_tmp` varchar(50) DEFAULT NULL,
  `update_date_tmp` timestamp NULL DEFAULT NULL,
  `stock_tmp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_product`
--

INSERT INTO `tbl_m_product` (`id_product_tmp`, `large_barcode_tmp`, `small_barcode_tmp`, `name_tmp`, `id_large_unit_tmp`, `id_small_unit_tmp`, `fill_tmp`, `large_price_tmp`, `small_price_tmp`, `id_suplier_tmp`, `id_factory_tmp`, `date_added_tmp`, `added_by_tmp`, `update_by_tmp`, `update_date_tmp`, `stock_tmp`) VALUES
(32, '', '', 'ABOCATH 18', 31, 31, 1, 15000, 16650, 0, 0, '2024-01-20 06:01:18', 'admin', 'admin', '2023-12-21 01:34:16', 7),
(33, '89919906181646', '89919906181646', 'ABOCATH 20	', 31, 31, 1, 15000, 16650, 0, 0, '2024-01-12 08:49:19', 'admin', NULL, NULL, 0),
(34, '', '', 'ACRAN 150MG TAB', 32, 35, 30, 144000, 5328, 5, 1, '2024-01-20 03:56:46', 'admin', 'admin', '2023-12-21 01:33:38', 3180),
(35, '', '', 'ACTIVED KUNING', 36, 25, 1, 47523, 52750, 0, 0, '2024-01-21 16:44:17', 'admin', 'admin', '2023-12-21 01:36:34', 1),
(36, '', '', 'ACTIVED MERAH', 36, 25, 1, 54535, 60533, 0, 0, '2024-01-20 03:47:22', 'admin', NULL, NULL, 23),
(37, '', '', 'ACYCLOVIR 200MG TAB', 32, 35, 100, 59500, 660, 0, 21, '2024-01-20 00:44:20', 'admin', NULL, NULL, 0),
(38, '', '', 'ACYCLOVIR 400 MG TAB', 32, 35, 100, 70000, 777, 0, 0, '2024-01-19 04:48:07', 'admin', NULL, NULL, 90);

--
-- Triggers `tbl_m_product`
--
DELIMITER $$
CREATE TRIGGER `product_history` AFTER INSERT ON `tbl_m_product` FOR EACH ROW BEGIN

INSERT INTO tbl_h_product(
    id_product_thp,
    name_thp,
    large_barcode_thp,
    small_barcode_thp,
    id_large_unit_thp,
    id_small_unit_thp,
    fill_thp,
    large_price_thp,
    small_price_thp,
    id_suplier_thp,
    id_factory_thp,
    date_added_thp,
    added_by_thp)
    VALUES(
    NEW.id_product_tmp,
	NEW.name_tmp,
	NEW.large_barcode_tmp,
	NEW.small_barcode_tmp,
	NEW.id_large_unit_tmp,
	NEW.id_small_unit_tmp,
	NEW.fill_tmp,
	NEW.large_price_tmp,
	NEW.small_price_tmp,
	NEW.id_suplier_tmp,
	NEW.id_factory_tmp,
	NEW.date_added_tmp,
	NEW.added_by_tmp);
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_suplier`
--

CREATE TABLE `tbl_m_suplier` (
  `id_suplier_tms` int(11) NOT NULL,
  `name_tms` varchar(50) NOT NULL,
  `address_tms` varchar(200) NOT NULL,
  `phone_number_tms` varchar(15) NOT NULL,
  `email_tms` varchar(100) NOT NULL,
  `website_tms` varchar(50) DEFAULT NULL,
  `information_tms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_suplier`
--

INSERT INTO `tbl_m_suplier` (`id_suplier_tms`, `name_tms`, `address_tms`, `phone_number_tms`, `email_tms`, `website_tms`, `information_tms`) VALUES
(0, '-', '-', '-', '-', '-', '-'),
(3, 'PT Enercon Equipment Company Indonesia', 'Jl Bintaro Utama 3 blok AC No 9 Bintaro Jaya Sektor 3 Tanggerang Selatan 15221 Indonesia', '0217353781', 'infoenercon@gmail.com', 'www.enercon.co.id', '--'),
(4, 'PT Globalindo Inti Sarana', 'Ruko Kedoya Indah Blok RB-BE Jl. Kedoya Raya, Jakarta Barat 11520', '02158355151', 'globalindo.intisarana@yahoo.com', 'www.japanairfilter.com', '-'),
(5, 'PT  Jayapak Sinar Abadi', 'Komplex Gading Bukit Indah blok Q No 8 Jl. Bolevard Artha Gading Kelapa Gading Jakarta 14240 Indonesia', '02145846102', 'jayapak@gmail.com', 'https://www.jayapak.com/', '-'),
(6, 'PT.SAPTA SARI TAMA', 'Jakarta', '-', '-', '-', '-'),
(7, 'MADU AM', 'Karawang', '-', '-', '-', '-'),
(8, 'ALKES RYAN', 'Karawang', '-', '-', '-', '-'),
(9, 'PT.MILLENNIUM PHARMACON INTERNATIONAL', 'Jakarta', '-', '-', '-', '-'),
(10, 'MADU NUSANTARA', 'JL.SOEKARNO HATTA NO.639', '082287340884', '-', '-', '-'),
(11, 'PT Setia Farma', 'Jl. Pegangsaan timur no 72', '-', 'setia@gmail.com', '-', '-'),
(12, 'PT Naser Setiawan Jaya Abadi', 'kp ciseureuh no 55 rt 005 rw 002 Desa CIbodas Kecamatan Bungursari Kabupaten Purwakarta Jawa Barat', '081398173028', 'setiawan@gmail.com', 'https://www.nasersetiawan.com', '-'),
(13, 'PT Bukit Farma', 'Bukit Indah City Purwakarta', '08000020038', 'bukitfarma@gmail.com', '-', '-'),
(16, 'PT SINAR TERANG', '-', '-', '-', '-', '-'),
(17, 'PT ANUGRAH JAYA MANDIRI', '-', '-', '-', '-', '-'),
(18, 'Nur', 'Krw ', '089', 'nurhayati@ptk.ubpkarawang.ac.id', 'Kalal', 'Hmlala');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_unit`
--

CREATE TABLE `tbl_m_unit` (
  `id_unit_tmun` int(11) NOT NULL,
  `name_tmun` varchar(50) NOT NULL,
  `information_tmun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_unit`
--

INSERT INTO `tbl_m_unit` (`id_unit_tmun`, `name_tmun`, `information_tmun`) VALUES
(3, 'PCS', '-'),
(4, 'PIL', '-'),
(5, 'BPL', '-'),
(6, 'KOTAK', '-'),
(7, 'TOPLES', '-'),
(8, 'TERM', ''),
(9, 'AMPLOP', '-'),
(10, 'DOSE', '-'),
(11, 'AMB', '-'),
(12, 'SALI', '-'),
(13, 'STP', '-'),
(14, 'KAPLET', '-'),
(15, 'KOLF', '-'),
(16, 'FCS', '-'),
(17, 'SYR', '-'),
(18, 'PAK', '-'),
(19, 'SUPP', '-'),
(20, 'VIAL', '-'),
(21, 'PCS', '-'),
(22, 'POT', '-'),
(23, 'KAPSUL', '-'),
(24, 'LSN', '-'),
(25, 'FLS', '-'),
(26, 'AMPUL', '-'),
(27, 'STRIP', '-'),
(28, 'KALENG', '-'),
(29, 'AMP', '-'),
(30, 'TUBE', '-'),
(31, 'BUAH', '-'),
(32, 'BOX', '-'),
(33, 'SACHET', '-'),
(35, 'TABLET', '-'),
(36, 'BOTOL', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `id_user_tmu` int(11) NOT NULL,
  `name_tmu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_number_tmu` varchar(20) NOT NULL,
  `email_tmu` varchar(100) NOT NULL,
  `password_tmu` varchar(500) NOT NULL,
  `role_tmu` enum('ADMIN','OWNER') NOT NULL,
  `img_tmu` varchar(200) NOT NULL DEFAULT 'default.png',
  `status_tmu` enum('ACTIVE','NONACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_by_tmu` varchar(100) NOT NULL,
  `created_date_tmu` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_by_tmu` varchar(50) DEFAULT NULL,
  `update_date_tmu` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_m_user`
--

INSERT INTO `tbl_m_user` (`id_user_tmu`, `name_tmu`, `phone_number_tmu`, `email_tmu`, `password_tmu`, `role_tmu`, `img_tmu`, `status_tmu`, `created_by_tmu`, `created_date_tmu`, `update_by_tmu`, `update_date_tmu`) VALUES
(1, 'admin', '083377199913', 'admin@mail.com', '$2y$10$gYQYKxBr2gZhlBR6ssuInuRMeALuDW0BAaK90eJu0Cl7/eW8CsbV2', 'ADMIN', '65aa01d2167e5_default.png', 'ACTIVE', '', '2023-12-19 00:05:04', 'admin', '2024-01-22 09:12:53'),
(2, 'Owner', '082228881111', 'owner@mail.com', '$2y$10$m1tJ1JpUxpij8bZ/KOi/CO9Rsr5//btV.OJ3buVT9Q1j8KoksRn0W', 'OWNER', '65aa01e5d0b08_default.png', 'ACTIVE', '', '2024-01-08 10:08:34', 'Owner1', '2024-01-22 09:11:08');

--
-- Triggers `tbl_m_user`
--
DELIMITER $$
CREATE TRIGGER `user_history` AFTER INSERT ON `tbl_m_user` FOR EACH ROW BEGIN

INSERT INTO tbl_h_user(id_user_thu,`name_thu`, `email_thu`, `phone_number_thu`, `password_thu`, `role_thu`, `created_date_thu`) VALUES (NEW.id_user_tmu,NEW.name_tmu, NEW.email_tmu, NEW.phone_number_tmu, NEW.password_tmu, NEW.role_tmu, NEW.created_date_tmu);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_cart`
--

CREATE TABLE `tbl_t_cart` (
  `id_ttc` int(11) NOT NULL,
  `id_product_ttc` int(11) NOT NULL,
  `qty_ttc` int(11) NOT NULL,
  `discount_ttc` int(11) NOT NULL,
  `price_ttc` int(11) NOT NULL,
  `add_qty_ttc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_t_cart`
--

INSERT INTO `tbl_t_cart` (`id_ttc`, `id_product_ttc`, `qty_ttc`, `discount_ttc`, `price_ttc`, `add_qty_ttc`) VALUES
(180, 35, 7, 0, 65937, NULL);

--
-- Triggers `tbl_t_cart`
--
DELIMITER $$
CREATE TRIGGER `add_to_cart_insert` AFTER INSERT ON `tbl_t_cart` FOR EACH ROW BEGIN
	UPDATE tbl_m_product SET stock_tmp = stock_tmp - NEW.qty_ttc WHERE id_product_tmp = NEW.id_product_ttc;
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_to_cart_update` AFTER UPDATE ON `tbl_t_cart` FOR EACH ROW BEGIN
	UPDATE tbl_m_product SET stock_tmp = stock_tmp - NEW.add_qty_ttc WHERE id_product_tmp = OLD.id_product_ttc;
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_from_cart` AFTER DELETE ON `tbl_t_cart` FOR EACH ROW BEGIN
	UPDATE tbl_m_product SET stock_tmp = stock_tmp + OLD.qty_ttc WHERE id_product_tmp = OLD.id_product_ttc;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_list_purchase`
--

CREATE TABLE `tbl_t_list_purchase` (
  `id_list_ttlp` int(11) NOT NULL,
  `id_product_ttlp` int(11) NOT NULL,
  `qty_ttlp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_purchase`
--

CREATE TABLE `tbl_t_purchase` (
  `id_purchase_ttp` int(11) NOT NULL,
  `invoice_number_ttp` varchar(50) NOT NULL,
  `id_suplier_ttp` int(11) NOT NULL,
  `list_id_product_ttp` varchar(200) NOT NULL,
  `list_qty_ttp` varchar(200) NOT NULL,
  `invoice_date_ttp` date NOT NULL,
  `payment_date_ttp` date NOT NULL,
  `total_payment_ttp` int(12) NOT NULL,
  `status_ttp` enum('Retur','Penerimaan') NOT NULL DEFAULT 'Penerimaan',
  `created_by_ttp` varchar(20) NOT NULL,
  `created_date_ttp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_t_purchase`
--

INSERT INTO `tbl_t_purchase` (`id_purchase_ttp`, `invoice_number_ttp`, `id_suplier_ttp`, `list_id_product_ttp`, `list_qty_ttp`, `invoice_date_ttp`, `payment_date_ttp`, `total_payment_ttp`, `status_ttp`, `created_by_ttp`, `created_date_ttp`) VALUES
(51, '1', 3, '32,35', '5,3', '2024-01-12', '2024-01-13', 158251, 'Retur', 'admin', '2024-01-12'),
(52, '2', 3, '35,38', '5,3', '2024-01-25', '2024-01-19', 546752, 'Retur', 'admin', '2024-01-12'),
(53, 'INV337772', 8, '36', '8', '2024-01-20', '2024-01-21', 484271, 'Retur', 'admin', '2024-01-20'),
(55, '123', 4, '34,36', '10,5', '2024-01-19', '2024-01-25', 1404538, 'Retur', 'Owner', '2024-01-20'),
(56, '', 3, '34', '10', '2024-01-19', '2024-01-20', 1598400, 'Penerimaan', 'Owner', '2024-01-20'),
(57, '1235', 10, '32', '3', '2024-01-16', '2024-01-24', 49950, 'Retur', 'Owner', '2024-01-20');

--
-- Triggers `tbl_t_purchase`
--
DELIMITER $$
CREATE TRIGGER `delete_list_purchase` AFTER INSERT ON `tbl_t_purchase` FOR EACH ROW BEGIN

DELETE FROM tbl_t_list_purchase;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_retur`
--

CREATE TABLE `tbl_t_retur` (
  `id_retur_ttr` int(11) NOT NULL,
  `id_purchase_ttr` int(11) NOT NULL,
  `list_id_product_ttr` varchar(100) NOT NULL,
  `list_qty_ttr` varchar(100) NOT NULL,
  `created_date_ttr` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `retur_price_ttr` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_t_retur`
--

INSERT INTO `tbl_t_retur` (`id_retur_ttr`, `id_purchase_ttr`, `list_id_product_ttr`, `list_qty_ttr`, `created_date_ttr`, `retur_price_ttr`) VALUES
(125, 51, '32', '-1', '2024-01-12 16:08:56', 99900),
(126, 51, '32,35', '-5,-8', '2024-01-12 16:11:34', 505254),
(135, 57, '32', '-4', '2024-01-21 13:01:18', 66600),
(136, 57, '32', '-4', '2024-01-21 13:01:18', 100000);

--
-- Triggers `tbl_t_retur`
--
DELIMITER $$
CREATE TRIGGER `retur` AFTER INSERT ON `tbl_t_retur` FOR EACH ROW BEGIN

UPDATE tbl_t_purchase SET status_ttp = 'Retur' WHERE id_purchase_ttp = NEW.id_purchase_ttr;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_t_sales`
--

CREATE TABLE `tbl_t_sales` (
  `id_sales_tts` int(11) NOT NULL,
  `invoice_number_tts` varchar(20) NOT NULL,
  `transaction_date_tts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gross_income_tts` int(11) NOT NULL,
  `profit_tts` int(11) NOT NULL,
  `cashier_name_tts` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_t_sales`
--

INSERT INTO `tbl_t_sales` (`id_sales_tts`, `invoice_number_tts`, `transaction_date_tts`, `gross_income_tts`, `profit_tts`, `cashier_name_tts`) VALUES
(84, '75014045833186', '2024-01-19 07:48:07', 48550, 9700, 'Owner'),
(85, '12645587451815', '2024-01-19 08:49:13', 133200, 26640, 'Owner'),
(86, '72614576256267', '2024-01-18 11:55:32', 666000, 133200, 'Naser Setiawan'),
(87, '72614576256266', '2024-01-19 09:55:32', 666000, 133200, 'Naser Setiawan'),
(88, '82459531810345', '2024-01-20 07:33:22', 59940, 6660, 'admin'),
(89, '63337362004123', '2024-01-20 07:34:42', 119880, 13320, 'admin'),
(90, '67908165979080', '2024-01-20 10:49:13', 104060, 20810, 'Owner'),
(91, '55475224471610', '2024-01-20 10:58:36', 173490, 34690, 'Owner'),
(92, '23970094343516', '2024-01-21 11:08:13', 39160, 5860, 'Owner'),
(93, '91787975092243', '2024-01-21 11:08:12', 39540, 6240, 'Owner');

--
-- Triggers `tbl_t_sales`
--
DELIMITER $$
CREATE TRIGGER `drop_all_product_from_cart` AFTER INSERT ON `tbl_t_sales` FOR EACH ROW BEGIN

	DELETE FROM tbl_t_cart;
    

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `product`
--
DROP TABLE IF EXISTS `product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u560159210_root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `product`  AS SELECT `tbl_m_product`.`id_product_tmp` AS `id_product_tmp`, `tbl_m_product`.`small_barcode_tmp` AS `small_barcode_tmp`, `tbl_m_product`.`large_barcode_tmp` AS `large_barcode_tmp`, `tbl_m_product`.`name_tmp` AS `name_tmp`, `tbl_m_factory`.`name_tmf` AS `name_tmf`, `tbl_m_suplier`.`name_tms` AS `name_tms`, `tbl_m_unit`.`name_tmun` AS `name_tmun`, `tbl_m_product`.`large_price_tmp` AS `large_price_tmp`, `tbl_m_product`.`small_price_tmp` AS `small_price_tmp`, `tbl_m_product`.`fill_tmp` AS `fill_tmp`, `tbl_m_product`.`stock_tmp` AS `stock_tmp` FROM (((`tbl_m_product` join `tbl_m_factory` on(`tbl_m_product`.`id_factory_tmp` = `tbl_m_factory`.`id_factory_tmf`)) join `tbl_m_suplier` on(`tbl_m_product`.`id_suplier_tmp` = `tbl_m_suplier`.`id_suplier_tms`)) join `tbl_m_unit` on(`tbl_m_product`.`id_small_unit_tmp` = `tbl_m_unit`.`id_unit_tmun`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_h_product`
--
ALTER TABLE `tbl_h_product`
  ADD PRIMARY KEY (`id_product_thp`);

--
-- Indexes for table `tbl_m_factory`
--
ALTER TABLE `tbl_m_factory`
  ADD PRIMARY KEY (`id_factory_tmf`);

--
-- Indexes for table `tbl_m_opname`
--
ALTER TABLE `tbl_m_opname`
  ADD PRIMARY KEY (`id_opname_tmo`);

--
-- Indexes for table `tbl_m_product`
--
ALTER TABLE `tbl_m_product`
  ADD PRIMARY KEY (`id_product_tmp`),
  ADD KEY `fk_id_suplier_tms_tmp` (`id_suplier_tmp`),
  ADD KEY `fk_id_warehouse_tmw_tmp` (`id_factory_tmp`),
  ADD KEY `fk_id_unit_tmun_large_tmp` (`id_large_unit_tmp`),
  ADD KEY `fk_id_unit_tmun_small_tmp` (`id_small_unit_tmp`);

--
-- Indexes for table `tbl_m_suplier`
--
ALTER TABLE `tbl_m_suplier`
  ADD PRIMARY KEY (`id_suplier_tms`);

--
-- Indexes for table `tbl_m_unit`
--
ALTER TABLE `tbl_m_unit`
  ADD PRIMARY KEY (`id_unit_tmun`);

--
-- Indexes for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`id_user_tmu`);

--
-- Indexes for table `tbl_t_cart`
--
ALTER TABLE `tbl_t_cart`
  ADD PRIMARY KEY (`id_ttc`),
  ADD KEY `fk_id_product_ttc` (`id_product_ttc`);

--
-- Indexes for table `tbl_t_list_purchase`
--
ALTER TABLE `tbl_t_list_purchase`
  ADD PRIMARY KEY (`id_list_ttlp`),
  ADD KEY `fk_id_product_ttlp` (`id_product_ttlp`);

--
-- Indexes for table `tbl_t_purchase`
--
ALTER TABLE `tbl_t_purchase`
  ADD PRIMARY KEY (`id_purchase_ttp`),
  ADD KEY `fk_id_suplier_ttp` (`id_suplier_ttp`);

--
-- Indexes for table `tbl_t_retur`
--
ALTER TABLE `tbl_t_retur`
  ADD PRIMARY KEY (`id_retur_ttr`);

--
-- Indexes for table `tbl_t_sales`
--
ALTER TABLE `tbl_t_sales`
  ADD PRIMARY KEY (`id_sales_tts`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_m_factory`
--
ALTER TABLE `tbl_m_factory`
  MODIFY `id_factory_tmf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_m_opname`
--
ALTER TABLE `tbl_m_opname`
  MODIFY `id_opname_tmo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_m_product`
--
ALTER TABLE `tbl_m_product`
  MODIFY `id_product_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_m_suplier`
--
ALTER TABLE `tbl_m_suplier`
  MODIFY `id_suplier_tms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_m_unit`
--
ALTER TABLE `tbl_m_unit`
  MODIFY `id_unit_tmun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `id_user_tmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_t_cart`
--
ALTER TABLE `tbl_t_cart`
  MODIFY `id_ttc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tbl_t_list_purchase`
--
ALTER TABLE `tbl_t_list_purchase`
  MODIFY `id_list_ttlp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tbl_t_purchase`
--
ALTER TABLE `tbl_t_purchase`
  MODIFY `id_purchase_ttp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_t_retur`
--
ALTER TABLE `tbl_t_retur`
  MODIFY `id_retur_ttr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tbl_t_sales`
--
ALTER TABLE `tbl_t_sales`
  MODIFY `id_sales_tts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_m_product`
--
ALTER TABLE `tbl_m_product`
  ADD CONSTRAINT `fk_id_factory_tmf_tmp` FOREIGN KEY (`id_factory_tmp`) REFERENCES `tbl_m_factory` (`id_factory_tmf`),
  ADD CONSTRAINT `fk_id_suplier_tms_tmp` FOREIGN KEY (`id_suplier_tmp`) REFERENCES `tbl_m_suplier` (`id_suplier_tms`),
  ADD CONSTRAINT `fk_id_unit_tmun_large_tmp` FOREIGN KEY (`id_large_unit_tmp`) REFERENCES `tbl_m_unit` (`id_unit_tmun`),
  ADD CONSTRAINT `fk_id_unit_tmun_small_tmp` FOREIGN KEY (`id_small_unit_tmp`) REFERENCES `tbl_m_unit` (`id_unit_tmun`);

--
-- Constraints for table `tbl_t_cart`
--
ALTER TABLE `tbl_t_cart`
  ADD CONSTRAINT `fk_id_product_ttc` FOREIGN KEY (`id_product_ttc`) REFERENCES `tbl_m_product` (`id_product_tmp`);

--
-- Constraints for table `tbl_t_purchase`
--
ALTER TABLE `tbl_t_purchase`
  ADD CONSTRAINT `fk_id_suplier_ttp` FOREIGN KEY (`id_suplier_ttp`) REFERENCES `tbl_m_suplier` (`id_suplier_tms`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
