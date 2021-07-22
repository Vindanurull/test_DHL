-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Okt 2019 pada 05.15
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `technical`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_item_master`
--

CREATE TABLE IF NOT EXISTS `tbl_item_master` (
  `item_code` varchar(50) NOT NULL,
  `item_desc` varchar(50) NOT NULL,
  `item_unit` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  PRIMARY KEY (`item_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_item_master`
--

INSERT INTO `tbl_item_master` (`item_code`, `item_desc`, `item_unit`, `item_price`) VALUES
('001', 'hardware', 'komputer', 10),
('003', 'Hardware', 'kabel USB', 5),
('004', 'hardware', 'keyboard', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_receipt_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_receipt_detail` (
  `id_detail` varchar(50) NOT NULL,
  `id_header` varchar(50) NOT NULL,
  `item_code` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_receipt_detail`
--

INSERT INTO `tbl_receipt_detail` (`id_detail`, `id_header`, `item_code`, `quantity`, `batch`) VALUES
('011', '1', '004', '7', '8'),
('012', '013', '001', '6', '9'),
('013', '014', '002', '7', '8'),
('014', '1', '004', '7', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_receipt_header`
--

CREATE TABLE IF NOT EXISTS `tbl_receipt_header` (
  `id_header` int(11) NOT NULL,
  `receipt_no` varchar(50) NOT NULL,
  `receipt_date` date NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_header`),
  UNIQUE KEY `receipt_no` (`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_receipt_header`
--

INSERT INTO `tbl_receipt_header` (`id_header`, `receipt_no`, `receipt_date`, `supplier_name`) VALUES
(1, '03', '2019-10-09', 'unilever'),
(2, '04', '2019-10-23', 'artechno'),
(4, '32', '2019-10-04', 'gundaling');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
