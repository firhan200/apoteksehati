-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 07:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `is_admin` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `text`, `created_at`, `dokter_id`, `is_admin`) VALUES
(22, 2, 'test', '2021-04-30 19:05:50', 2, 0),
(23, 1, 'iyaa?', '2021-04-30 19:06:07', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `profesi`, `status`) VALUES
(2, 'dr. Yogi P. Rachmawan, SpJP', 'SPESIALIS JANTUNG DAN PEMBULUH DARAH', 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `foto`) VALUES
(3, '20-08-16-12-22-08.jpg'),
(4, '20-08-16-12-22-13.jpg'),
(6, '20-08-16-12-24-32.jpg'),
(7, '20-08-16-12-24-36.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `foto2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `foto`, `judul`, `isi`, `foto2`) VALUES
(4, '20-08-16-13-18-23.jpg', 'KONSULTASI DOKTER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.', NULL),
(5, '20-08-16-13-21-03.jpg', 'AMBIL DARAH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.', NULL),
(6, '20-08-16-13-21-41.jpg', 'AMBIL DARAH', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.', NULL),
(7, '20-08-16-13-21-49.jpg', 'TES 123', 'asLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.', NULL),
(9, '14-05-21-18-45-02.jpg', 'test 123', 'hello', '14-05-21-18-45-18_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `teks_profil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `foto`, `teks_profil`) VALUES
(1, '20-08-16-13-09-47.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed convallis tellus. Donec fringilla id ipsum sed ultrices. Fusce blandit dolor mi. Nunc fermentum varius lorem eu vehicula. Nullam sollicitudin tortor eu placerat pharetra.');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `foto`) VALUES
(4, '21-08-16-10-47-08.jpg'),
(5, '21-08-16-10-46-27.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(100) NOT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT 0,
  `request_reset_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `full_name`, `created_at`, `password`, `is_active`, `request_reset_password`) VALUES
(2, 'firhan.faisal1995@gmail.com', 'Firhan Faisal', '2021-05-18 17:46:55', '7c222fb2927d828af22f592134e8932480637c0d', 1, NULL),
(3, 'firhan@gmail.com', 'Firhan Faisal', '2021-05-18 17:20:52', 'addbd3aa5619f2932733104eb8ceef08f6fd2693', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
