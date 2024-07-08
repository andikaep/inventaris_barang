-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 08 Jul 2024 pada 22.09
-- Versi server: 8.0.31
-- Versi PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `klasifikasi_id` int DEFAULT NULL,
  `nama_barang` varchar(150) DEFAULT NULL,
  `kondisi` enum('Berfungsi','Tidak Berfungsi') DEFAULT NULL,
  `lokasi` varchar(150) DEFAULT NULL,
  `merek` varchar(150) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `klasifikasi_id` (`klasifikasi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `klasifikasi_id`, `nama_barang`, `kondisi`, `lokasi`, `merek`, `departemen`) VALUES
(1, 2, 'Printer', 'Berfungsi', 'Lokasi', 'Epson', 'Finance'),
(2, 1, 'Komputer', 'Berfungsi', 'Lantai 3', 'Acer', 'IT'),
(3, 2, 'Meja Meeting', 'Berfungsi', 'Lantai 3', 'Canan', 'Finance'),
(4, 3, 'Router', 'Tidak Berfungsi', 'Lantai 3', 'Tp Link', 'IT'),
(5, 4, 'Telepon', 'Berfungsi', 'Lantai 1', 'Bell', 'HR'),
(6, 2, 'Lemari Arsip', 'Berfungsi', 'Lantai 2', 'Kin', 'GA'),
(7, 5, 'Spidol', 'Berfungsi', 'Lantai 4', 'Bold', 'HR'),
(8, 6, 'Pel & Sapu', 'Berfungsi', 'Lantai 2', 'Clean', 'GA'),
(9, 7, 'Obeng', 'Berfungsi', 'Lantai 2', 'Somi', 'GA'),
(10, 8, 'Bor Listrik', 'Berfungsi', 'Lantai 2', 'BorLis', 'GA'),
(11, 9, 'Kamera CCTV', 'Berfungsi', 'Lantai 3', 'Bardi', 'IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi_barang`
--

DROP TABLE IF EXISTS `klasifikasi_barang`;
CREATE TABLE IF NOT EXISTS `klasifikasi_barang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `klasifikasi_barang`
--

INSERT INTO `klasifikasi_barang` (`id`, `nama_kategori`) VALUES
(1, 'Perangkat Komputer'),
(2, 'Peralatan Kantor'),
(3, 'Perangkat Jaringan'),
(4, 'Peralatan Elektronik'),
(5, 'Alat Tulis dan Kantor'),
(6, 'Perlengkapan Kebersihan'),
(7, 'Perangkat Perbaikan'),
(8, 'Perangkat Bangunan'),
(9, 'Perangkat Keamanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'andika', '$2y$10$6GB3z2ZZ08zpqp56YLhNA.EqQh7WFiUhrCzeLt8O65VdK4lIdmrxq', 'Andika Eka Putra'),
(2, 'globalprima', '$2y$10$nqF/7DcQzimINngJboJ0NeIJ/rOGnWDAP/ldyUDd4ALMuq8Vex7LG', 'PT Global Prima Utama');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
