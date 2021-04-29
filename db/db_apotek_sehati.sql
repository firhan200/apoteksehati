-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Agu 2016 pada 09.39
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek_sehati`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `profesi`, `status`) VALUES
(2, 'dr. Yogi P. Rachmawan, SpJP', 'SPESIALIS JANTUNG DAN PEMBULUH DARAH', 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `foto`) VALUES
(3, '20-08-16-12-22-08.jpg'),
(4, '20-08-16-12-22-13.jpg'),
(6, '20-08-16-12-24-32.jpg'),
(7, '20-08-16-12-24-36.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `foto`, `judul`, `isi`) VALUES
(4, '20-08-16-13-18-23.jpg', 'KONSULTASI DOKTER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.'),
(5, '20-08-16-13-21-03.jpg', 'AMBIL DARAH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.'),
(6, '20-08-16-13-21-41.jpg', 'AMBIL DARAH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.'),
(7, '20-08-16-13-21-49.jpg', 'TES 123', 'asLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `teks_profil` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id`, `foto`, `teks_profil`) VALUES
(1, '20-08-16-13-09-47.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `foto`) VALUES
(4, '21-08-16-10-47-08.jpg'),
(5, '21-08-16-10-46-27.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
