-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 02:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lowongankerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kode_admin` int(11) NOT NULL,
  `nama_admin` varchar(500) NOT NULL,
  `password_admin` varchar(500) NOT NULL,
  `alamat_admin` varchar(500) NOT NULL,
  `jenis_kelamin_admin` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE IF NOT EXISTS `aturan` (
  `kode_aturan` int(11) NOT NULL,
  `nama_aturan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `kategori_pekerjaan` (
  `kode_kategori_pekerjaan` int(11) NOT NULL,
  `nama_kategori_pekerjaan` char(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`kode_kategori_pekerjaan`, `nama_kategori_pekerjaan`) VALUES
(1, 'Infrastruktur'),
(2, 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `kode_layanan` int(11) NOT NULL,
  `nama_layanan` char(200) NOT NULL,
  `jenis_layanan` char(10) NOT NULL,
  `deskripsi_layanan` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `nama_layanan`, `jenis_layanan`, `deskripsi_layanan`) VALUES
(1, 'Web yang responsive', 'Web', 'fafsdfsdfsdf'),
(2, 'Pelayanan yang memuaskan', 'Pelanggan', 'faffsfsdsgsg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `kode_member` int(11) NOT NULL,
  `nama_member` varchar(500) NOT NULL,
  `password_member` varchar(500) NOT NULL,
  `nomor_telepon` varchar(100) NOT NULL,
  `jenis_kelamin_member` char(100) NOT NULL,
  `tanggal_lahir_member` date NOT NULL,
  `jenis_member` varchar(100) NOT NULL,
  `alamat_member` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kode_member`, `nama_member`, `password_member`, `nomor_telepon`, `jenis_kelamin_member`, `tanggal_lahir_member`, `jenis_member`, `alamat_member`) VALUES
(2, 'Agus', '0525885565bb6a150db63f19bf42f11bd2db4702', '123456789', 'Laki-laki', '2016-12-23', 'Free', '12345678'),
(3, '', '', '1234567890', 'Laki-Laki', '2017-01-31', 'Premium', 'Jancuk'),
(4, 'evan', '', '134567890', 'Laki-Laki', '2017-01-24', 'Free', 'Wonosobo'),
(5, 'Jancuk', 'jancuk', '12346789', 'Laki-Laki', '2017-01-31', 'Premium', 'WSB');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `kode_pekerjaan` int(11) NOT NULL,
  `kode_kategori_pekerjaan` int(11) NOT NULL,
  `kode_member` int(11) NOT NULL,
  `nama_pekerjaan` varchar(500) NOT NULL,
  `deskripsi_pekerjaan` varchar(1000) NOT NULL,
  `lama_pengerjaan` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`kode_pekerjaan`, `kode_kategori_pekerjaan`, `kode_member`, `nama_pekerjaan`, `deskripsi_pekerjaan`, `lama_pengerjaan`) VALUES
(2, 2, 2, 'Membuat tenplate bootstrap', 'adfdsfsffsf', '2016-12-01'),
(3, 1, 2, 'Desain kontruksi bangunan', 'dadasdadsadada', '2017-01-12'),
(4, 2, 2, 'Membuat Barcode CodeIgniter', 'dadasdadasdas', '2017-01-04'),
(5, 1, 2, 'WTF', 'asdfghjkl', '2017-01-11'),
(6, 1, 2, 'WTF', 'asdfghjkl', '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE IF NOT EXISTS `tentang` (
  `kode_tentang` int(11) NOT NULL,
  `keuntungan` varchar(500) NOT NULL,
  `testimonial` varchar(500) NOT NULL,
  `kontak_kami` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`kode_kategori_pekerjaan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kode_layanan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kode_member`), ADD KEY `kode_provinsi` (`alamat_member`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode_pekerjaan`), ADD KEY `kode_kategori_pekerjaan` (`kode_kategori_pekerjaan`), ADD KEY `kode_kategori_pekerjaan_2` (`kode_kategori_pekerjaan`), ADD KEY `kode_member` (`kode_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `kode_kategori_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `kode_layanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `kode_member` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `kode_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
