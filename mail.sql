-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2021 at 07:04 AM
-- Server version: 5.7.21
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
-- Database: `mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

DROP TABLE IF EXISTS `dusun`;
CREATE TABLE IF NOT EXISTS `dusun` (
  `id_dusun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dusun` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dusun`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `nama_dusun`) VALUES
(1, 'Krajan'),
(2, 'Glagaharum'),
(3, 'Bulupogog'),
(4, 'Cakru\'an'),
(5, 'Rekesan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin@e-mailservice.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Kepala Desa', 'kades', 'kepaladesa@mailservice.com', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'kades'),
(4, 'Ridwan Muhammad', 'ridwan', 'ridwan.muhammad@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'penduduk'),
(12, '3517112233440001', 'tes', 'tes@gmail.com', '28b662d883b6d76fd96e4ddc5e9ba780', 'penduduk');

-- --------------------------------------------------------

--
-- Table structure for table `nomor_surat`
--

DROP TABLE IF EXISTS `nomor_surat`;
CREATE TABLE IF NOT EXISTS `nomor_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(150) NOT NULL,
  `no_surat` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomor_surat`
--

INSERT INTO `nomor_surat` (`id`, `jenis_surat`, `no_surat`) VALUES
(1, 'surat_lapor_hajatan', '431'),
(2, 'surat_keterangan_usaha', '510'),
(3, 'surat_pengantar_skck', '470'),
(4, 'surat_keterangan_kepemilikan_kendaraan_bermotor', '474'),
(5, 'surat_keterangan_tidak_mampu', '605'),
(6, 'surat_keterangan_domisili', '471'),
(7, 'surat_keterangan_berkelakuan_baik', '330'),
(8, 'surat_keterangan', '471'),
(9, 'surat_keterangan_beasiswa', '422.5');

-- --------------------------------------------------------

--
-- Table structure for table `pejabat_desa`
--

DROP TABLE IF EXISTS `pejabat_desa`;
CREATE TABLE IF NOT EXISTS `pejabat_desa` (
  `id_pejabat_desa` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(100) NOT NULL,
  `nama_pejabat_desa` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_pejabat_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pejabat_desa`
--

INSERT INTO `pejabat_desa` (`id_pejabat_desa`, `NIK`, `nama_pejabat_desa`, `jabatan`, `status`) VALUES
(1, '3507310401660003', 'Tuwuhadi', 'Kepala Desa', 1),
(2, '3507312211840003', 'Seto Giswono', 'Plt. Kepala Desa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

DROP TABLE IF EXISTS `penduduk`;
CREATE TABLE IF NOT EXISTS `penduduk` (
  `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `jalan` varchar(100) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `pend_kk` varchar(20) NOT NULL,
  `pend_terakhir` varchar(20) NOT NULL,
  `pend_ditempuh` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_dlm_keluarga` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  PRIMARY KEY (`nik`),
  KEY `idx_id_penduduk` (`id_penduduk`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `jalan`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `no_kk`, `pend_kk`, `pend_terakhir`, `pend_ditempuh`, `pekerjaan`, `status_perkawinan`, `status_dlm_keluarga`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
(92, '3517112233440001', 'Muhammad Syafi\'i', 'Malang', '1997-12-14', 'Laki-laki', 'Islam', 'jl. KH. hasyim asy\'ari no. 15', 'Krajan', '001', '002', 'Jambuwer', 'Kromengan', 'Malang', '3517000000000002', 'SLTA/SEDERAJAT', 'SLTA/SEDERAJAT', 'S1/SEDERAJAT', 'PELAJAR/MAHASISWA', 'Belum Menikah', 'Anak', 'WNI', 'Imam Islam', 'Aisyah');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

DROP TABLE IF EXISTS `profil_desa`;
CREATE TABLE IF NOT EXISTS `profil_desa` (
  `id_profil_desa` int(11) NOT NULL AUTO_INCREMENT,
  `nama_desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  PRIMARY KEY (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_profil_desa`, `nama_desa`, `alamat`, `no_telpon`, `kecamatan`, `kota`, `provinsi`, `kode_pos`) VALUES
(1, 'Jambuwer', 'Jl. Raya Jambuwer No. 557', '082331567899', 'Kromengan ', 'Kabupaten Malang', 'Jawa Timur', '65169');

-- --------------------------------------------------------

--
-- Table structure for table `surat_diambil`
--

DROP TABLE IF EXISTS `surat_diambil`;
CREATE TABLE IF NOT EXISTS `surat_diambil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `jenis_surat` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `ktp` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_diambil`
--

INSERT INTO `surat_diambil` (`id`, `id_surat`, `jenis_surat`, `nama`, `alamat`, `no_telp`, `ktp`, `tanggal`) VALUES
(2, 1, 'Surat Pengantar SKCK', 'tes', 'tes', '4232', '6.jpg', '2021-07-08'),
(3, 3, 'Surat Lapor Hajatan', 'Rudi', 'Jambuwer', '085755524255', '15.png', '2021-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

DROP TABLE IF EXISTS `surat_keterangan`;
CREATE TABLE IF NOT EXISTS `surat_keterangan` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(150) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(150) DEFAULT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) DEFAULT NULL,
  `tgl_hilang` date DEFAULT NULL,
  `penghasilan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`, `tgl_hilang`, `penghasilan`) VALUES
(1, 'Surat Keterangan Status', '471/1/35.07.31.2006/2021', '3517112233440001', 'berstatus Jejaka. (Belum Nikah)', '2021-07-08 23:10:17', 1, 'SELESAI', 1, '', NULL, NULL),
(2, 'Surat Keterangan Kehilangan', '471/2/35.07.31.2006/2021', '3517112233440001', 'Handphone', '2021-07-08 23:52:48', 2, 'SELESAI', 1, '', NULL, NULL),
(3, 'Surat Keterangan Kehilangan', NULL, '3517112233440001', 'Handphone', '2021-07-08 23:57:12', NULL, 'PENDING', 1, '', NULL, NULL),
(4, 'Surat Keterangan Kehilangan', '471/3/35.07.31.2006/2021', '3517112233440001', 'Handphone', '2021-07-09 00:08:30', 1, 'SELESAI', 1, '', '2021-07-09', NULL),
(5, 'Surat Keterangan Status', NULL, '3517112233440001', 'berstatus Jejaka. (Belum Nikah)', '2021-07-09 00:09:31', NULL, 'PENDING', 1, '', NULL, NULL),
(6, 'Surat Keterangan Penghasilan Orang Tua', '471/1/35.07.31.2006/2021', '3517112233440001', 'Muhammad Ilham', '2021-07-09 01:03:30', 1, 'SELESAI', 1, '', NULL, '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_beasiswa`
--

DROP TABLE IF EXISTS `surat_keterangan_beasiswa`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_beasiswa` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(150) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_anak` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_beasiswa`
--

INSERT INTO `surat_keterangan_beasiswa` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `nama_anak`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nama_sekolah`, `kelas`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`) VALUES
(1, 'Surat Keterangan Beasiswa', '422.5/1/35.07.31.2006/2021', '3517112233440001', 'Muhammad', 'Malang', '2021-07-09', 'Laki-Laki', 'SMPN 1 Malang', 'VII', '2021-07-09 02:47:15', 1, 'SELESAI', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_berkelakuan_baik`
--

DROP TABLE IF EXISTS `surat_keterangan_berkelakuan_baik`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_berkelakuan_baik` (
  `id_skbb` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skbb`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_berkelakuan_baik`
--

INSERT INTO `surat_keterangan_berkelakuan_baik` (`id_skbb`, `jenis_surat`, `no_surat`, `nik`, `keperluan`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`) VALUES
(1, 'Surat Keterangan Berkelakuan Baik', NULL, '3517112233440001', 'Surat Keterangan Tidak Mampu', '2021-06-28 21:35:39', NULL, 'PENDING', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_domisili`
--

DROP TABLE IF EXISTS `surat_keterangan_domisili`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_domisili` (
  `id_skd` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skd`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--

DROP TABLE IF EXISTS `surat_keterangan_kepemilikan_kendaraan_bermotor`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_kepemilikan_kendaraan_bermotor` (
  `id_skkkb` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `roda` varchar(20) NOT NULL,
  `merk_type` varchar(30) DEFAULT NULL,
  `jenis_model` varchar(30) DEFAULT NULL,
  `tahun_pembuatan` varchar(30) DEFAULT NULL,
  `cc` varchar(30) DEFAULT NULL,
  `warna_cat` varchar(30) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `no_bpkb` varchar(30) NOT NULL,
  `atas_nama_pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skkkb`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_perhiasan`
--

DROP TABLE IF EXISTS `surat_keterangan_perhiasan`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_perhiasan` (
  `id_skp` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `jenis_perhiasan` varchar(20) NOT NULL,
  `nama_perhiasan` varchar(50) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `toko_perhiasan` varchar(50) NOT NULL,
  `lokasi_toko_perhiasan` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skp`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_tidak_mampu`
--

DROP TABLE IF EXISTS `surat_keterangan_tidak_mampu`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_tidak_mampu` (
  `id_sk` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sk`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keterangan_tidak_mampu`
--

INSERT INTO `surat_keterangan_tidak_mampu` (`id_sk`, `jenis_surat`, `no_surat`, `nik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`) VALUES
(2, 'Surat Keterangan Tidak Mampu', '121321', '3517112233440001', '2021-06-28 22:16:27', 2, 'SELESAI', 1, 'Sudah'),
(3, 'Surat Keterangan Tidak Mampu', '605/1/35.07.31.2006/2021', '3517112233440001', '2021-07-09 02:11:11', 1, 'SELESAI', 1, ''),
(4, 'Surat Keterangan Tidak Mampu', NULL, '3517112233440001', '2021-07-09 02:11:22', NULL, 'PENDING', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan_usaha`
--

DROP TABLE IF EXISTS `surat_keterangan_usaha`;
CREATE TABLE IF NOT EXISTS `surat_keterangan_usaha` (
  `id_sku` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `usaha` varchar(30) DEFAULT NULL,
  `alamat_usaha` varchar(200) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sku`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_lapor_hajatan`
--

DROP TABLE IF EXISTS `surat_lapor_hajatan`;
CREATE TABLE IF NOT EXISTS `surat_lapor_hajatan` (
  `id_slh` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `jenis_hajat` varchar(30) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jenis_hiburan` varchar(50) NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `alamat_pemilik` varchar(200) NOT NULL,
  `tanggal_surat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_slh`),
  KEY `idx_id_profil_desa` (`id_profil_desa`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_nik` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_lapor_hajatan`
--

INSERT INTO `surat_lapor_hajatan` (`id_slh`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `jenis_hajat`, `hari`, `tanggal`, `jenis_hiburan`, `pemilik`, `alamat_pemilik`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`) VALUES
(1, 'Surat Lapor Hajatan', '121321', '3517112233440001', '35070', '', 'Khitanan', 'Senin', '2021-06-14 00:00:00', 'tidak ada', 'tidak ada', 'Tidak ada', '2021-06-14 22:42:48', 1, 'SELESAI', 1, 'Sudah'),
(2, 'Surat Lapor Hajatan', '121321', '3517112233440001', '35070', '1234', 'Pernikahan', 'Senin', '2021-07-05 00:00:00', 'tidak ada', 'tidak ada', 'Tidak ada', '2021-07-05 01:25:01', 2, 'SELESAI', 1, 'Sudah'),
(3, 'Surat Lapor Hajatan', '431/3/35.07.31.2006/2021', '3517112233440001', '35070', '', 'Pernikahan', 'Rabu', '2021-07-07 00:00:00', 'tidak ada', 'tidak ada', 'Tidak ada', '2021-07-07 13:13:34', 1, 'SELESAI', 1, 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengantar_skck`
--

DROP TABLE IF EXISTS `surat_pengantar_skck`;
CREATE TABLE IF NOT EXISTS `surat_pengantar_skck` (
  `id_sps` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(50) NOT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `nik` varchar(20) NOT NULL,
  `bukti_ktp` varchar(30) DEFAULT NULL,
  `bukti_kk` varchar(30) DEFAULT NULL,
  `keperluan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masa_berlaku` varchar(20) DEFAULT NULL,
  `tanggal_surat` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_pejabat_desa` int(11) DEFAULT NULL,
  `status_surat` varchar(15) NOT NULL,
  `id_profil_desa` int(11) DEFAULT NULL,
  `ambil` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sps`),
  KEY `idx_nik` (`nik`),
  KEY `idx_id_pejabat_desa` (`id_pejabat_desa`),
  KEY `idx_id_profil_desa` (`id_profil_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_pengantar_skck`
--

INSERT INTO `surat_pengantar_skck` (`id_sps`, `jenis_surat`, `no_surat`, `nik`, `bukti_ktp`, `bukti_kk`, `keperluan`, `keterangan`, `masa_berlaku`, `tanggal_surat`, `id_pejabat_desa`, `status_surat`, `id_profil_desa`, `ambil`) VALUES
(1, 'Surat Pengantar SKCK', '121321', '3517112233440001', '35070', '', 'Permohonan SKCK', 'Untuk melamar Kerja', '30 Hari', '2021-06-14 19:44:07', 1, 'SELESAI', 1, 'Sudah'),
(2, 'Surat Pengantar SKCK', '121321', '3517112233440001', '35070', '', 'Permohonan SKCK', 'Untuk melamar Kerja', '3 Hari', '2021-06-15 13:18:55', 1, 'SELESAI', 1, 'Sudah'),
(3, 'Surat Pengantar SKCK', '470/3/35.07.31.2006/2021', '3517112233440001', '35070', '', 'Permohonan SKCK', 'Untuk melamar Kerja', '30 Hari', '2021-06-28 21:27:40', 1, 'SELESAI', 1, 'Sudah');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `fk_id_pejabat_desa_sk` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_sk` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sk` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_berkelakuan_baik`
--
ALTER TABLE `surat_keterangan_berkelakuan_baik`
  ADD CONSTRAINT `fi_id_profil_desa_skbb` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_skbb` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skbb` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_domisili`
--
ALTER TABLE `surat_keterangan_domisili`
  ADD CONSTRAINT `fi_id_profil_desa_skd` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_skd` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skd` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_kepemilikan_kendaraan_bermotor`
--
ALTER TABLE `surat_keterangan_kepemilikan_kendaraan_bermotor`
  ADD CONSTRAINT `fk_id_pejabat_desa_skkkb` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_skkkb` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skkkb` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_perhiasan`
--
ALTER TABLE `surat_keterangan_perhiasan`
  ADD CONSTRAINT `fk_id_pejabat_desa_skp` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_skp` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_skp` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_keterangan_usaha`
--
ALTER TABLE `surat_keterangan_usaha`
  ADD CONSTRAINT `fi_id_profil_desa_sku` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_pejabat_desa_sku` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sku` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_lapor_hajatan`
--
ALTER TABLE `surat_lapor_hajatan`
  ADD CONSTRAINT `fk_id_pejabat_desa_slh` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_slh` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_slh` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `surat_pengantar_skck`
--
ALTER TABLE `surat_pengantar_skck`
  ADD CONSTRAINT `fk_id_pejabat_desa_sps` FOREIGN KEY (`id_pejabat_desa`) REFERENCES `pejabat_desa` (`id_pejabat_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profil_desa_sps` FOREIGN KEY (`id_profil_desa`) REFERENCES `profil_desa` (`id_profil_desa`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nik_sps` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
