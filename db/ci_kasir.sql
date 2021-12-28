-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2021 pada 03.24
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(5) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stok` varchar(5) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `harga_jual` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok`, `harga`, `harga_jual`) VALUES
(1, 'A01', 'BODY COVER AGYA   AYLA', '0', '135000', '165000'),
(2, 'A02', 'BODY COVER ATOZ', '0', '135000', '1'),
(4, 'A04', 'BODY COVER AVZ   XENIA NEW', '3', '145000', '1'),
(5, 'A05', 'BODY COVER BRIO', '5', '135000', '1'),
(6, 'A06', 'BODY COVER CAYLA   SIGRA', '2', '135000', '1'),
(8, 'A08', 'BODY COVER ERTIGA NEW', '2', '145000', '1'),
(9, 'A09', 'BODY COVER ESCUDO   FITARA', '1', '145000', '1'),
(10, 'A10', 'BODY COVER EXPANDER', '1', '175000', '1'),
(11, 'A11', 'BODY COVER FORTUNER   PAJERO', '1', '200000', '1'),
(12, 'A12', 'BODY COVER FREED', '1', '180000', '1'),
(13, 'A13', 'BODY COVER INOVA OLD', '1', '175000', '1'),
(14, 'A14', 'BODY COVER INOVA REBORN', '1', '175000', '1'),
(15, 'A15', 'BODY COVER JAZZ ALL NEW', '2', '145000', '1'),
(16, 'A16', 'BODY COVER JAZZ NEW', '2', '145000', '1'),
(19, 'A19', 'BODY COVER KIJANG LONG', '3', '145000', '1'),
(20, 'A20', 'BODY COVER LUXIO', '1', '145000', '1'),
(21, 'A21', 'BODY COVER MOBILIO', '5', '145000', '1'),
(23, 'A23', 'BODY COVER RUSH   TERIOS OLD', '8', '145000', '1'),
(27, 'A27', 'BODY COVER YARIS', '2', '145000', '1'),
(28, 'A28', 'BODY COVER YARIS ALL NEW', '1', '145000', '1'),
(29, 'A29', 'BODY COVER NEW BALENO', '1', '145000', '1'),
(30, 'A30', 'BODY COVER APV', '1', '150000', '1'),
(31, 'A31', 'BODY COVER PAJERO SPORT', '1', '200000', '1'),
(32, 'A32', 'BODY COVER CARDOVA LURUXY', '3', '450000', '1'),
(33, 'A33', 'FOG LAMP AVANZA', '1', '400000', '1'),
(34, 'A34', 'FOG LAMP KIJANG  99', '1', '80000', '1'),
(35, 'A35', 'FOG LAMP AVANZA 2012', '1', '400000', '1'),
(36, 'A36', 'FOG LAMP KARIMUN WAGON R', '1', '500000', '1'),
(37, 'A37', 'FOG LAMP ALL NEW AVANZA 2012', '1', '400000', '1'),
(38, 'A38', 'FOG LAMP AGYA   AYLA', '1', '350000', '1'),
(39, 'A39', 'FOG LAMP LAMPU TEMBAK UNIVERSAL', '1', '120000', '1'),
(40, 'A40', 'FOG LAMP LAMPU KABUT LOWIN', '1', '120000', '1'),
(41, 'A41', 'FOG LAMP LAMPU SOROT OKD', '1', '60000', '1'),
(42, 'A42', 'FOG LAMP LAMPU BAK COLT DIESEL', '1', '45000', '1'),
(43, 'A43', 'FOG LAMP XENIA 2018', '1', '380000', '1'),
(44, 'A44', 'FOG LAMP LAMPU ARNOCHS AN-3009', '1', '120000', '1'),
(45, 'A45', 'FOG LAMP LAMPU ARNOCHS AN-2002', '2', '80000', '1'),
(46, 'A46', 'FOG LAMP TOKAI DENSO', '1', '45000', '1'),
(47, 'A47', 'FOG LAMP LAMPU ARNOCHS AN-957', '1', '95000', '1'),
(48, 'A48', 'FOG LAMP DATSUN GO', '1', '650000', '1'),
(49, 'A49', 'FOG LAMP AVANZA ALL NEW', '1', '400000', '1'),
(50, 'A50', 'FOG LAMP KIJANG GRAND', '2', '80000', '1'),
(51, 'A51', 'FOG LAMP KATANA', '1', '80000', '1'),
(52, 'A52', 'FOG LAMP BUMPER VEROZA', '2', '180000', '1'),
(53, 'A53', 'FOG LAMP LAMPU REM KIJANG KAPSUL', '1', '200000', '1'),
(54, 'A54', 'FOG LAMP LAMPU REM L300', '1', '75000', '1'),
(55, 'A55', 'FOG LAMP LAMPU STOP VEROZA', '1', '180000', '1'),
(56, 'A56', 'FOG LAMP LAMPU BUMPER KIJANG 2003', '1', '180000', '1'),
(57, 'A57', 'FOG LAMP LAMPU SEN KATANA', '2', '50000', '1'),
(58, 'A58', 'FOG LAMP LAMPU SEN VEROZA', '2', '50000', '1'),
(59, 'A59', 'FOG LAMP LAMPU TEMBAK PROSTREET', '2', '75000', '1'),
(60, 'A60', 'FOG LAMP LAMPU ROTARY', '2', '100000', '1'),
(61, 'A61', 'FOG LAMP LAMPU SEN KIJANG KRISTA', '1', '180000', '1'),
(62, 'A62', 'FOG LAMP LAMPU REM KIJANG GRAND', '1', '130000', '1'),
(93, 'A93', 'SPOILER DATHSUN GO (PUTIH)', '1', '450000', '1'),
(106, 'A106', 'TALANG AIR CEPER CANTER', '2', '135000', '1'),
(107, 'A107', 'TALANG AIR CEPER RAGASA', '2', '135000', '1'),
(108, 'A108', 'TALANG AIR CEPER HINO LOHAN', '2', '150000', '1'),
(109, 'A109', 'TALANG AIR CEPER GRAND MAX', '1', '130000', '1'),
(110, 'A110', 'TALANG AIR CEPER L 300', '3', '145000', '1'),
(111, 'A111', 'TALANG AIR ESKUDO BIASA', '3', '145000', '1'),
(112, 'A112', 'TALANG AIR ESKUDO KAPSUL', '1', '145000', '1'),
(113, 'A113', 'TALANG AIR CR-V', '1', '160000', '1'),
(114, 'A114', 'TALANG AIR TRAGA', '2', '170000', '1'),
(115, 'A115', 'TALANG AIR IGNIS', '2', '95000', '1'),
(116, 'A116', 'TALANG AIR ESPAS (SILVER)', '2', '85000', '1'),
(117, 'A117', 'TALANG AIR HIJET 1000', '1', '65000', '1'),
(118, 'A118', 'TALANG AIR TRITON LONG', '1', '220000', '1'),
(119, 'A119', 'TALANG AIR HILUX OLD DUOBEL KABIN', '1', '200000', '1'),
(120, 'A120', 'TALANG AIR HILUX PICK UP', '1', '135000', '1'),
(121, 'A121', 'TALANG AIR HILUX DOUBEL KABIN', '1', '220000', '1'),
(122, 'A122', 'TALANG AIR STARLET DADONE', '1', '135000', '1'),
(123, 'A123', 'TALANG AIR YARIS DADONE', '1', '145000', '1'),
(124, 'A124', 'TALANG AIR YARIS SLIM ALL NEW', '1', '165000', '1'),
(125, 'A125', 'TALANG AIR SIENTA', '1', '165000', '1'),
(126, 'A126', 'TALANG AIR ALL NEW PAJERO', '1', '200000', '1'),
(127, 'A127', 'TALANG AIR INOVA DADONE (SILVER)', '1', '140000', '1'),
(128, 'A128', 'TALANG AIR INOVA ALL NEW ', '1', '140000', '1'),
(129, 'A129', 'TALANG AIR INOVA SLIM', '1', '165000', '1'),
(131, 'A131', 'TALANG AIR INOVA ALL NEW SLIM', '1', '165000', '1'),
(132, 'A132', 'TALANG AIR PAJERO ALL NEW ', '1', '200000', '1'),
(133, 'A133', 'TALANG AIR KARIMUN WAGON R', '3', '150000', '1'),
(134, 'A134', 'TALANG AIR RAGASA', '1', '75000', '1'),
(135, 'A135', 'TALANG AIR RUSH SLIM', '3', '165000', '1'),
(136, 'A136', 'TALANG AIR ALTIS', '1', '165000', '1'),
(137, 'A137', 'TALANG AIR KUDA', '1', '135000', '1'),
(138, 'A138', 'TALANG AIR AGYA', '2', '150000', '1'),
(139, 'A139', 'TALANG AIR TARUNA', '1', '135000', '1'),
(140, 'A140', 'TALANG AIR JAZZ OLD DADONE', '1', '145000', '1'),
(141, 'A141', 'TALANG AIR JAZZ OLD SLIM', '1', '155000', '1'),
(142, 'A142', 'TALANG AIR JAZZ ALL NEW', '2', '155000', '1'),
(143, 'A143', 'TALANG AIR COROLLA DX', '1', '135000', '1'),
(144, 'A144', 'TALANG AIR COROLLA DX DADONE', '2', '145000', '1'),
(145, 'A145', 'TALANG AIR LIVINA SLIM', '1', '165000', '1'),
(146, 'A146', 'TALANG AIR BALENO NEXT G', '2', '155000', '1'),
(147, 'A147', 'TALANG AIR BALENO SLIM', '1', '165000', '1'),
(148, 'A148', 'TALANG AIR APV', '3', '70000', '1'),
(149, 'A149', 'TALANG AIR PANTHER SLIM OLD', '2', '170000', '1'),
(150, 'A150', 'TALANG AIR PANTHER NEW', '1', '200000', '1'),
(151, 'A151', 'TALANG AIR TWIN CAM', '3', '135000', '1'),
(152, 'A152', 'TALANG AIR TWIN CAM DANDONE', '1', '145000', '1'),
(153, 'A153', 'TALANG AIR FREED SLIM', '1', '170000', '1'),
(154, 'A154', 'TALANG AIR MOBILIO SLIM', '2', '170000', '1'),
(155, 'A155', 'TALANG AIR VIOS ALL NEW', '2', '165000', '1'),
(156, 'A156', 'TALANG AIR VIOS OLD', '1', '165000', '1'),
(157, 'A157', 'TALANG AIR VIOS 2010', '1', '165000', '1'),
(158, 'A158', 'TALANG AIR ERTIGA', '2', '160000', '1'),
(159, 'A159', 'TALANG AIR ERTIGA ALL NEW', '1', '185000', '1'),
(160, 'A160', 'TALANG AIR KIJANG CAPSUL', '2', '135000', '1'),
(161, 'A161', 'TALANG AIR KIJANG CAPSUL PICK UP', '2', '70000', '1'),
(162, 'A162', 'TALANG AIR KIJANG GRAND SLIM', '1', '145000', '1'),
(163, 'A163', 'TALANG AIR KIJANG CAPSUL SLIM', '1', '145000', '1'),
(164, 'A164', 'TALANG AIR COLT DIESEL', '2', '75000', '1'),
(165, 'A165', 'TALANG AIR DATSUN GO', '1', '155000', '1'),
(166, 'A166', 'TALANG AIR DATSUN GO SLIM', '1', '155000', '1'),
(167, 'A167', 'TALANG AIR LUXIO   GRAND MAX (DEPAN)', '2', '65000', '1'),
(168, 'A168', 'TALANG AIR L 300 BIASA', '3', '65000', '1'),
(169, 'A169', 'TALANG AIR L 300 DADONE', '1', '175000', '1'),
(170, 'A170', 'TALANG AIR L300 LEBAR', '2', '95000', '1'),
(171, 'A171', 'TALANG AIR COLT T 120 BIASA', '5', '65000', '1'),
(172, 'A172', 'TALANG AIR CARRY MEGA', '2', '90000', '1'),
(173, 'A173', 'TALANG AIR ATOZ', '2', '135000', '1'),
(174, 'A174', 'TALANG AIR XENIA', '1', '135000', '1'),
(175, 'A175', 'TALANG AIR XENIA ALL NEW', '1', '135000', '1'),
(176, 'A176', 'TALANG AIR AVANZA SLIM', '2', '150000', '1'),
(177, 'A177', 'TALANG AIR AVANZA ALL NEW', '2', '150000', '1'),
(178, 'A178', 'TALANG AIR XENIA SLIM', '2', '150000', '1'),
(179, 'A179', 'TALANG AIR XENIA ALL NEW', '3', '150000', '1'),
(180, 'A180', 'TALANG AIR KARIMUN OLD DANDONE', '1', '135000', '1'),
(181, 'A181', 'TALANG AIR CANTER DADONE', '2', '85000', '1'),
(182, 'A182', 'TALANG AIR CANTER ABSOLUTE', '1', '75000', '1'),
(183, 'A183', 'TALANG AIR VITARA DADONE', '1', '135000', '1'),
(184, 'A184', 'TALANG AIR DUTRO DADONE', '1', '85000', '1'),
(185, 'A185', 'TALANG AIR RINARINO DADONE', '1', '75000', '1'),
(186, 'A186', 'TALANG AIR PAJERO SPORT DADONE', '1', '220000', '1'),
(187, 'A187', 'TALANG AIR FORTUNER DADONE', '1', '220000', '1'),
(188, 'A188', 'TALANG AIR FORTUNER ALL NEW', '1', '200000', '1'),
(189, 'A189', 'TALANG AIR CALYA', '1', '150000', '1'),
(190, 'A190', 'TALANG AIR ETIOS', '1', '150000', '1'),
(191, 'A191', 'TALANG AIR H-RV', '1', '160000', '1'),
(192, 'A192', 'TALANG AIR AYLA', '1', '170000', '1'),
(193, 'A193', 'TALANG AIR B-RV', '2', '170000', '1'),
(194, 'A194', 'TANK COVER AGYA', '2', '45000', '1'),
(195, 'A195', 'TANK COVER APV', '1', '45000', '1'),
(196, 'A196', 'TANK COVER ARUNA', '1', '45000', '1'),
(197, 'A197', 'TANK COVER AVANZA ALL NEW', '6', '50000', '1'),
(198, 'A198', 'TANK COVER AYLA', '3', '45000', '1'),
(199, 'A199', 'TANK COVER BRIO', '2', '50000', '1'),
(200, 'A200', 'TANK COVER CR-V', '1', '45000', '1'),
(201, 'A201', 'TANK COVER EXPANDER', '1', '45000', '1'),
(202, 'A202', 'TANK COVER FEROZA', '1', '40000', '1'),
(203, 'A203', 'TANK COVER FORTUNER', '1', '50000', '1'),
(204, 'A204', 'TANK COVER FUEL', '1', '45000', '1'),
(205, 'A205', 'TANK COVER GRAND MAX', '1', '45000', '1'),
(206, 'A206', 'TANK COVER INOVA', '5', '50000', '1'),
(207, 'A207', 'TANK COVER INOVA ALL NEW', '1', '50000', '1'),
(208, 'A208', 'TANK COVER PAJERO SPORT', '1', '50000', '1'),
(209, 'A209', 'TANK COVER PANTHER', '3', '45000', '1'),
(210, 'A210', 'TANK COVER RUSH', '2', '45000', '1'),
(211, 'A211', 'TANK COVER SIDEKICK', '1', '40000', '1'),
(212, 'A212', 'TANK COVER TRD', '1', '45000', '65000'),
(213, 'A213', 'TANK COVER VITARA', '5', '40000', '1'),
(214, 'A214', 'TANK COVER XENIA ALL NEW', '2', '45000', '1'),
(215, 'A215', 'SARUNG STIR EXLUSIVE', '3', '45000', '1'),
(216, 'A216', 'SARUNG STIR NEW EXELLENT', '8', '45000', '1'),
(217, 'A217', 'SARUNG STIR ONE WAY', '3', '90000', '1'),
(218, 'A218', 'SARUNG STIR KENZORRO', '1', '45000', '1'),
(219, 'A219', 'SARUNG STIR BLUE TECH', '1', '120000', '1'),
(220, 'A220', 'SARUNG STIR CARFU R MOMO', '1', '85000', '1'),
(221, 'A221', 'SARUNG STIR VIRIDES SCENCE JEWEL', '1', '120000', '1'),
(222, 'A222', 'SARUNG STIR K SPEED MOMO', '6', '55000', '1'),
(223, 'A223', 'SARUNG STIR SARUNG STIR BIASA', '11', '25000', '1'),
(224, 'A224', 'PEDAL PADS ISOKA', '4', '45000', '1'),
(225, 'A225', 'PEDAL PADS K SPEED', '2', '50000', '1'),
(226, 'A226', 'PEDAL PADS TYPE R', '1', '55000', '1'),
(227, 'A227', 'PEDAL PADS MOMO ITALY', '2', '70000', '1'),
(228, 'A228', 'PEDAL PADS FORMULA 1', '1', '65000', '1'),
(229, 'A229', 'PEDAL PADS FOR SPORT', '1', '55000', '1'),
(230, 'A230', 'PEDAL PADS PEDAL METIK', '5', '50000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl` datetime NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_user`, `tgl`, `total`) VALUES
(1, 1, '2020-09-20 14:27:23', 270000),
(2, 1, '2020-09-20 14:31:44', 165000),
(3, 1, '2020-11-28 16:34:51', 165000),
(4, 1, '2021-03-16 08:24:13', 165000),
(5, 1, '2021-10-07 14:25:23', 495000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_bayar` int(5) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_bayar`, `id_barang`, `jumlah`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 3, 1, 1),
(5, 4, 1, 1),
(6, 5, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `email`, `no_wa`, `alamat`, `level`) VALUES
(1, 'Admin', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin@gmail.com', '088885469574', 'Padang Data', 'admin'),
(3, 'kasir', 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kasir@gmail.com', '081215951492', 'padang', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
