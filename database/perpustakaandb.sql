-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 08:17 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ayah`
--

CREATE TABLE `ayah` (
  `id_ayah` int(11) NOT NULL,
  `nama_ayah` varchar(200) NOT NULL,
  `nik` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(120) NOT NULL,
  `id_penghasilan` int(11) NOT NULL,
  `nomor_handphone` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ayah`
--

INSERT INTO `ayah` (`id_ayah`, `nama_ayah`, `nik`, `tanggal_lahir`, `id_pendidikan`, `pekerjaan`, `id_penghasilan`, `nomor_handphone`) VALUES
(34, 'Bapa Budi', 292020292, '1970-01-01', 5, 'Bapak Rumah Tangga', 3, '081265716891'),
(36, 'bapak anjay', 920390, '2018-12-27', 1, 'Nguli', 1, '029302932'),
(40, 'Bapak Komo', 29203, '2018-12-20', 2, 'Pegawai Kuli', 2, '081265716891'),
(43, 'bapak anjay', 2323, '2019-07-25', 2, 'kuli', 2, '0923902');

-- --------------------------------------------------------

--
-- Table structure for table `data_murid`
--

CREATE TABLE `data_murid` (
  `Id_data_murid` varchar(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `id_pivot_kelas` int(11) NOT NULL,
  `id_pivot_orangtua` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `nisn` int(25) NOT NULL,
  `berat_badan` int(7) NOT NULL,
  `tinggi_badan` int(7) NOT NULL,
  `kewarganegaraan` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_murid`
--

INSERT INTO `data_murid` (`Id_data_murid`, `id_murid`, `id_pivot_kelas`, `id_pivot_orangtua`, `id_alamat`, `nisn`, `berat_badan`, `tinggi_badan`, `kewarganegaraan`) VALUES
('MR-0002', 39, 3, 17, 11, 2147483647, 80, 190, 'Indonesia'),
('MR-0003', 43, 6, 21, 15, 422424, 70, 160, 'China'),
('MR-0004', 46, 3, 24, 15, 424245, 60, 190, 'Singapura');

-- --------------------------------------------------------

--
-- Table structure for table `data_murid_pivot_kelas`
--

CREATE TABLE `data_murid_pivot_kelas` (
  `id_pivot_kelas` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_murid_pivot_kelas`
--

INSERT INTO `data_murid_pivot_kelas` (`id_pivot_kelas`, `id_kelas`, `id_jurusan`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 4, 1),
(4, 5, 2),
(6, 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_murid_pivot_orangtua`
--

CREATE TABLE `data_murid_pivot_orangtua` (
  `id_pivot_orangtua` int(11) NOT NULL,
  `id_ayah` int(11) NOT NULL,
  `id_ibu` int(11) NOT NULL,
  `id_wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_murid_pivot_orangtua`
--

INSERT INTO `data_murid_pivot_orangtua` (`id_pivot_orangtua`, `id_ayah`, `id_ibu`, `id_wali`) VALUES
(17, 36, 35, 35),
(21, 40, 39, 39),
(24, 43, 42, 42);

-- --------------------------------------------------------

--
-- Table structure for table `ibu`
--

CREATE TABLE `ibu` (
  `id_ibu` int(11) NOT NULL,
  `nama_ibu` varchar(200) NOT NULL,
  `nik` int(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `pekerjaan` varchar(120) NOT NULL,
  `id_penghasilan` int(11) NOT NULL,
  `nomor_handphone` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ibu`
--

INSERT INTO `ibu` (`id_ibu`, `nama_ibu`, `nik`, `tanggal_lahir`, `id_pendidikan`, `pekerjaan`, `id_penghasilan`, `nomor_handphone`) VALUES
(33, 'Ibu Budi', 2932932, '1970-01-01', 5, 'Kuli', 3, '0812883930'),
(35, 'Napak aja', 290, '2018-12-27', 2, 'Nguli', 1, '081265716891'),
(39, 'Ibu Komo', 190391, '2018-12-25', 3, 'Kuli', 2, '081265716891'),
(42, 'ibu anjay', 13322, '1980-02-06', 2, 'Kuli', 2, '1092803');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Teknik Kendaraan Ringan'),
(4, 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang` tinytext NOT NULL,
  `grade` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `jenjang`, `grade`) VALUES
(1, '12 RPL', '1'),
(2, '12 TKR', '2'),
(4, '12 RPL', '2'),
(5, '12 TKR', '1'),
(8, '10 AK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` int(11) NOT NULL,
  `nis` int(16) NOT NULL,
  `Nama` varchar(210) NOT NULL,
  `Id_jenis_kelamin` int(2) NOT NULL,
  `tempat_lahir` varchar(110) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nomor_handphone` varchar(18) NOT NULL,
  `id_agama` int(2) NOT NULL,
  `foto` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `nis`, `Nama`, `Id_jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nomor_handphone`, `id_agama`, `foto`) VALUES
(39, 129912, 'Hakim', 1, 'Depok', '2018-12-13', '090293092302', 1, '5c27a7441ec40.png'),
(43, 324324, 'CIKI KOMO', 2, 'Bogor', '2018-12-19', '081265716891', 5, '5c4025c08e1d2.jpg'),
(46, 98429, 'Hakimanjay', 1, 'Bogor', '1990-11-21', '2093223', 2, '5c401c4d0d555.png');

-- --------------------------------------------------------

--
-- Table structure for table `murid_agama`
--

CREATE TABLE `murid_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid_agama`
--

INSERT INTO `murid_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Khonghucu'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Katolik');

-- --------------------------------------------------------

--
-- Table structure for table `murid_alamat`
--

CREATE TABLE `murid_alamat` (
  `id_alamat` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(120) NOT NULL,
  `kecamatan` varchar(90) NOT NULL,
  `kota` varchar(70) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid_alamat`
--

INSERT INTO `murid_alamat` (`id_alamat`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`) VALUES
(0, 'jl. kenanga', 'baru', 'tapos', 'depok', 'jawa barat', 1555),
(11, 'jl. kenaga no keren sekali', 'kalibaru', 'cilodong', 'depok', 'Jawa Barat', 16455),
(15, 'jl. kenaga no keren sekali', 'kalibaru', 'Tapos', 'Depok', 'Jawa Barat', 1292);

-- --------------------------------------------------------

--
-- Table structure for table `murid_jeniskelamin`
--

CREATE TABLE `murid_jeniskelamin` (
  `id_jenis_kelamin` int(11) NOT NULL,
  `nama_jenis_kelamin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid_jeniskelamin`
--

INSERT INTO `murid_jeniskelamin` (`id_jenis_kelamin`, `nama_jenis_kelamin`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nama_pendidikan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'Sekolah Dasar'),
(2, 'Sekolah Menegah Pertama'),
(3, 'SMA/SMK/MA'),
(5, 'NULL'),
(7, 'Sarjana');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(11) NOT NULL,
  `nama_penghasilan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `nama_penghasilan`) VALUES
(1, 'Kurang dari Rp. 500.000'),
(2, 'Rp. 500.000 - Rp. 1.000.000'),
(3, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_anggota`
--

CREATE TABLE `perpustakaan_anggota` (
  `id_anggota` varchar(15) NOT NULL,
  `id_data_murid` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_anggota`
--

INSERT INTO `perpustakaan_anggota` (`id_anggota`, `id_data_murid`, `created_at`) VALUES
('Ang-0001', 'MR-0002', '2018-12-24 18:16:21'),
('Ang-0002', 'MR-0003', '2018-12-28 15:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_buku`
--

CREATE TABLE `perpustakaan_buku` (
  `id_buku` varchar(11) NOT NULL,
  `nama_buku` varchar(220) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jumlah_buku` int(13) NOT NULL,
  `jumlah_pinjam` int(13) NOT NULL DEFAULT '0',
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_buku`
--

INSERT INTO `perpustakaan_buku` (`id_buku`, `nama_buku`, `id_jenis`, `jumlah_buku`, `jumlah_pinjam`, `tanggal_masuk`) VALUES
('BK-0001', 'Pemrograman Dasar', 10, 16, 7, '2018-12-19'),
('BK-0003', 'Pemrograman Web', 11, 3, 3, '2018-12-27'),
('BK-0004', 'Pemrograman Berorientasi Objek', 11, 4, 4, '2018-12-30'),
('BK-0005', 'Buku Keren', 12, 10, 3, '2018-11-15'),
('BK-0006', 'Buku Agama', 10, 20, 6, '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_buku_jenis`
--

CREATE TABLE `perpustakaan_buku_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_buku_jenis`
--

INSERT INTO `perpustakaan_buku_jenis` (`id_jenis`, `nama_jenis`) VALUES
(10, 'Buku Kelas X'),
(11, 'Buku Kelas XI'),
(12, 'Buku Kelas XII'),
(13, 'Sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_pegawai`
--

CREATE TABLE `perpustakaan_pegawai` (
  `id_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_handphone` varchar(18) NOT NULL,
  `poto` varchar(200) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_pegawai`
--

INSERT INTO `perpustakaan_pegawai` (`id_pegawai`, `nama_pegawai`, `email`, `nomor_handphone`, `poto`, `username`, `password`) VALUES
('PG-002', 'hakim', 'hakim@gmail.com', '09029011', '5c39788d12644.png', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_pinjam`
--

CREATE TABLE `perpustakaan_pinjam` (
  `id_pinjam` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `id_status_pinjam` int(5) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_pinjam`
--

INSERT INTO `perpustakaan_pinjam` (`id_pinjam`, `id_anggota`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `id_status_pinjam`) VALUES
('PJ-00001', 'Ang-0001', 'BK-0001', '2019-01-16', '2019-01-23', 1),
('PJ-00002', 'Ang-0001', 'BK-0001', '2019-01-17', '2019-01-24', 2),
('PJ-00003', 'Ang-0001', 'BK-0001', '2019-01-17', '0000-00-00', 2),
('PJ-00004', 'Ang-0001', 'BK-0001', '2019-01-17', '0000-00-00', 2);

--
-- Triggers `perpustakaan_pinjam`
--
DELIMITER $$
CREATE TRIGGER `penambah_buku` AFTER INSERT ON `perpustakaan_pinjam` FOR EACH ROW begin
declare v1, v2 INT;
set v1 = (select jumlah_buku from perpustakaan_buku WHERE perpustakaan_buku.id_buku = New.id_buku);
set v2 = (select jumlah_pinjam from perpustakaan_buku WHERE perpustakaan_buku.id_buku = New.id_buku);
if((v1 - v2) > 0) then
UPDATE perpustakaan_buku set perpustakaan_buku.jumlah_pinjam = perpustakaan_buku.jumlah_pinjam + 1 WHERE perpustakaan_buku.id_buku = New.id_buku;
ELSE
signal sqlstate '45000';
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_pinjam_status`
--

CREATE TABLE `perpustakaan_pinjam_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_pinjam_status`
--

INSERT INTO `perpustakaan_pinjam_status` (`id_status`, `nama_status`) VALUES
(1, 'Kembali'),
(2, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan_waktu`
--

CREATE TABLE `perpustakaan_waktu` (
  `id_waktu` int(11) NOT NULL,
  `lama_waktu_hari` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan_waktu`
--

INSERT INTO `perpustakaan_waktu` (`id_waktu`, `lama_waktu_hari`) VALUES
(9, 1423),
(16, 395),
(17, 7);

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(200) DEFAULT NULL,
  `nik` int(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_pendidikan` int(11) NOT NULL DEFAULT '1',
  `pekerjaan` varchar(120) DEFAULT NULL,
  `id_penghasilan` int(11) NOT NULL DEFAULT '1',
  `nomor_handphone` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id_wali`, `nama_wali`, `nik`, `tanggal_lahir`, `id_pendidikan`, `pekerjaan`, `id_penghasilan`, `nomor_handphone`) VALUES
(33, '', 0, '1970-01-01', 5, '', 3, ''),
(35, '', 0, '0000-00-00', 5, '', 3, ''),
(39, '', 0, '1970-01-01', 2, '', 3, ''),
(42, '', 0, '1970-01-01', 5, '', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayah`
--
ALTER TABLE `ayah`
  ADD PRIMARY KEY (`id_ayah`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_penghasilan` (`id_penghasilan`);

--
-- Indexes for table `data_murid`
--
ALTER TABLE `data_murid`
  ADD PRIMARY KEY (`Id_data_murid`),
  ADD KEY `id_murid` (`id_murid`),
  ADD KEY `id_pivot_kelas` (`id_pivot_kelas`),
  ADD KEY `id_pivot_orangtua` (`id_pivot_orangtua`),
  ADD KEY `id_alamat` (`id_alamat`);

--
-- Indexes for table `data_murid_pivot_kelas`
--
ALTER TABLE `data_murid_pivot_kelas`
  ADD PRIMARY KEY (`id_pivot_kelas`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_kelas_2` (`id_kelas`),
  ADD KEY `id_jurusan_2` (`id_jurusan`);

--
-- Indexes for table `data_murid_pivot_orangtua`
--
ALTER TABLE `data_murid_pivot_orangtua`
  ADD PRIMARY KEY (`id_pivot_orangtua`),
  ADD KEY `id_ayah` (`id_ayah`),
  ADD KEY `id_ibu` (`id_ibu`),
  ADD KEY `id_wali` (`id_wali`);

--
-- Indexes for table `ibu`
--
ALTER TABLE `ibu`
  ADD PRIMARY KEY (`id_ibu`),
  ADD KEY `id_penghasilan` (`id_penghasilan`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`),
  ADD KEY `Id_jenis_kelamin` (`Id_jenis_kelamin`,`id_agama`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `murid_agama`
--
ALTER TABLE `murid_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `murid_alamat`
--
ALTER TABLE `murid_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `murid_jeniskelamin`
--
ALTER TABLE `murid_jeniskelamin`
  ADD PRIMARY KEY (`id_jenis_kelamin`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `perpustakaan_anggota`
--
ALTER TABLE `perpustakaan_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_data_murid` (`id_data_murid`);

--
-- Indexes for table `perpustakaan_buku`
--
ALTER TABLE `perpustakaan_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `perpustakaan_buku_jenis`
--
ALTER TABLE `perpustakaan_buku_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `perpustakaan_pegawai`
--
ALTER TABLE `perpustakaan_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `perpustakaan_pinjam`
--
ALTER TABLE `perpustakaan_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_status_pinjam` (`id_status_pinjam`);

--
-- Indexes for table `perpustakaan_pinjam_status`
--
ALTER TABLE `perpustakaan_pinjam_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `perpustakaan_waktu`
--
ALTER TABLE `perpustakaan_waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_penghasilan` (`id_penghasilan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ayah`
--
ALTER TABLE `ayah`
  MODIFY `id_ayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `data_murid_pivot_kelas`
--
ALTER TABLE `data_murid_pivot_kelas`
  MODIFY `id_pivot_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `data_murid_pivot_orangtua`
--
ALTER TABLE `data_murid_pivot_orangtua`
  MODIFY `id_pivot_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ibu`
--
ALTER TABLE `ibu`
  MODIFY `id_ibu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `murid_agama`
--
ALTER TABLE `murid_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `murid_jeniskelamin`
--
ALTER TABLE `murid_jeniskelamin`
  MODIFY `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perpustakaan_buku_jenis`
--
ALTER TABLE `perpustakaan_buku_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `perpustakaan_pinjam_status`
--
ALTER TABLE `perpustakaan_pinjam_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `perpustakaan_waktu`
--
ALTER TABLE `perpustakaan_waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ayah`
--
ALTER TABLE `ayah`
  ADD CONSTRAINT `ayah_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `ayah_ibfk_2` FOREIGN KEY (`id_penghasilan`) REFERENCES `penghasilan` (`id_penghasilan`);

--
-- Constraints for table `data_murid`
--
ALTER TABLE `data_murid`
  ADD CONSTRAINT `data_murid_ibfk_1` FOREIGN KEY (`id_pivot_orangtua`) REFERENCES `data_murid_pivot_orangtua` (`id_pivot_orangtua`),
  ADD CONSTRAINT `data_murid_ibfk_2` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id_murid`),
  ADD CONSTRAINT `data_murid_ibfk_3` FOREIGN KEY (`id_pivot_kelas`) REFERENCES `data_murid_pivot_kelas` (`id_pivot_kelas`),
  ADD CONSTRAINT `data_murid_ibfk_4` FOREIGN KEY (`id_alamat`) REFERENCES `murid_alamat` (`id_alamat`);

--
-- Constraints for table `data_murid_pivot_kelas`
--
ALTER TABLE `data_murid_pivot_kelas`
  ADD CONSTRAINT `data_murid_pivot_kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `data_murid_pivot_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `data_murid_pivot_orangtua`
--
ALTER TABLE `data_murid_pivot_orangtua`
  ADD CONSTRAINT `data_murid_pivot_orangtua_ibfk_1` FOREIGN KEY (`id_ibu`) REFERENCES `ibu` (`id_ibu`),
  ADD CONSTRAINT `data_murid_pivot_orangtua_ibfk_2` FOREIGN KEY (`id_wali`) REFERENCES `wali` (`id_wali`),
  ADD CONSTRAINT `data_murid_pivot_orangtua_ibfk_3` FOREIGN KEY (`id_ayah`) REFERENCES `ayah` (`id_ayah`);

--
-- Constraints for table `ibu`
--
ALTER TABLE `ibu`
  ADD CONSTRAINT `ibu_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `ibu_ibfk_2` FOREIGN KEY (`id_penghasilan`) REFERENCES `penghasilan` (`id_penghasilan`);

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`Id_jenis_kelamin`) REFERENCES `murid_jeniskelamin` (`id_jenis_kelamin`),
  ADD CONSTRAINT `murid_ibfk_2` FOREIGN KEY (`id_agama`) REFERENCES `murid_agama` (`id_agama`);

--
-- Constraints for table `perpustakaan_anggota`
--
ALTER TABLE `perpustakaan_anggota`
  ADD CONSTRAINT `perpustakaan_anggota_ibfk_1` FOREIGN KEY (`id_data_murid`) REFERENCES `data_murid` (`Id_data_murid`);

--
-- Constraints for table `perpustakaan_buku`
--
ALTER TABLE `perpustakaan_buku`
  ADD CONSTRAINT `perpustakaan_buku_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `perpustakaan_buku_jenis` (`id_jenis`);

--
-- Constraints for table `perpustakaan_pinjam`
--
ALTER TABLE `perpustakaan_pinjam`
  ADD CONSTRAINT `perpustakaan_pinjam_ibfk_2` FOREIGN KEY (`id_status_pinjam`) REFERENCES `perpustakaan_pinjam_status` (`id_status`),
  ADD CONSTRAINT `perpustakaan_pinjam_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `perpustakaan_buku` (`id_buku`);

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `wali_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `wali_ibfk_2` FOREIGN KEY (`id_penghasilan`) REFERENCES `penghasilan` (`id_penghasilan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
