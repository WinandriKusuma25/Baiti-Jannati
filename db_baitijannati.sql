-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 06:24 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baitijannati`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_didik`
--

CREATE TABLE `anak_didik` (
  `id_anak_didik` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nama_wali` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anak_didik`
--

INSERT INTO `anak_didik` (`id_anak_didik`, `id_pengurus`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `nama_wali`, `foto`) VALUES
(10, 5, 'Ilham Arifin', 'L', 'Malang', '2007-01-01', 'RT. 04 RW. 04\r\n', 'Bhakti Waluyo', 'Ilham_Arifin1.jpg'),
(11, 9, 'Steven Andra Kusuma', 'L', 'Malang', '2008-12-17', 'RT. 01 RW. 04\r\n', 'Kusnan', 'Steven_Andra_Kusuma1.jpg'),
(14, 9, 'Dwica Indah Ramayanti', 'P', 'Malang', '2007-07-11', 'RT. 04 RW. 01\r\n', 'Supardi', 'Dwica_Indah_Ramayanti.jpg'),
(15, 9, 'Mochammad Faril Kurniawan', 'L', 'Malang', '2006-11-11', 'RT. 01\r\nRW. 02\r\n', 'M.Yusuf S', 'Mochammad_Faril_Kurniawan.jpg'),
(16, 5, 'Mohammad Haidhor Alawy', 'L', 'Malang', '2006-11-11', 'RT. 01 RW. 02\r\n', 'Syamsul Arifin ', 'Mohammad_Haidhor_Alawy.jpg'),
(17, 5, 'Aisyah Rohmatul Faizah', 'P', 'Malang', '2010-05-04', 'RT. 01  RW. 04\r\n', '', 'Aisyah_Rohmatul_Faizah.jpg'),
(18, 5, 'M. Nazril Habibi', 'L', 'Malang', '2010-11-11', 'RT. 03 RW. 02\r\n', 'Anton Hilmi', 'aaa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_pengurus`, `tgl_kegiatan`, `judul`, `deskripsi`, `foto`) VALUES
(2, 11, '2021-02-18', ' Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium', '<p>Halo</p>', 'Screenshot_(8).png'),
(3, 9, '2021-02-25', 'Santunan Anak Yatim Rutin Baiti Jannati lorem ipsum dolor', '<p>Seseorang bisa jadi berkecukupan secara materiil maupun nonmateriil. Akan tetapi, ada pula yang membutuhkan bantuan agar mencukupi kebutuhan sehari-harinya, terutama anak yang kehilangan ayahnya.</p><p>Sebab, dalam keluarga seorang ayah memiliki peranan penting. Ayah berfungsi sebagai kepala keluarga dan bertugas memenuhi kebutuhan hidup anggota keluarganya.</p><p>Lantas, bagaimana jika seorang anak telah kehilangan atau tidak memiliki seorang ayah? Anak yang telah kehilangan ayahnya dikenal di masyarakat sebagai anak yatim.</p><p>Berdasarkan definisi syariat, kata <em>yatim </em>ditujukan kepada mereka yang tidak memiliki ayah ketika berusia anak-anak atau masih dalam keadaan belum balig secara biologis, psikologis, dan sosiologis.</p>', 'anak_yatim.jpg'),
(8, 9, '2021-02-18', 'Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium', '<p>Link zoom yang akan kita gunakan semester ini Shohib M is inviting you to a scheduled Zoom meeting. Topic: Etika Profesi Bidang Teknologi Informasi 3E-3F D3 TI Time: This is a recurring meeting Meet anytime Join Zoom Meeting <a target=\"_blank\" href=\"https://us02web.zoom.us/j/81356554546?pwd=Q1lrK0pYRWgzbTJhbW5TSmhDK2ZRUT09\">https://us02web.zoom.us/j/81356554546?pwd=Q1lrK0pYRWgzbTJhbW5TSmhDK2ZRUT09</a> Meeting ID: 813 5655 4546 Passcode: POLINEMA One tap mobile +13126266799,,81356554546#,,,,*66873050# US (Chicago) +13462487799,,81356554546#,,,,*66873050# US (Houston) Dial by your location +1 312 626 6799 US (Chicago) +1 346 248 7799 US (Houston) +1 669 900 6833 US (San Jose) +1 929 205 6099 US (New York) +1 253 215 8782 US (Tacoma) +1 301 715 8592 US (Washington DC) Meeting ID: 813 5655 4546 Passcode: 66873050 Find your local number: <a target=\"_blank\" href=\"https://us02web.zoom.us/u/kc3ZnsTPOL\">https://us02web.zoom.us/u/kc3ZnsTPOL</a></p>', 'jasa.png'),
(10, 5, '2021-03-21', 'tes coba berita baiti jannati ya 123', '<p>tes coba</p>', 'windows-10-wallpaper-hd-19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_donasi_tunai`
--

CREATE TABLE `detail_donasi_tunai` (
  `id_detail_donasi` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `jenis_donasi` enum('keuangan','non keuangan') NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_donasi_tunai`
--

INSERT INTO `detail_donasi_tunai` (`id_detail_donasi`, `id_donasi`, `jenis_donasi`, `kategori`, `nominal`, `jumlah`, `image`, `keterangan`) VALUES
(1, 1, 'non keuangan', 'makanan', 0, 2, 'mi.jpg', 'hgghggh'),
(2, 2, 'keuangan', '', 10000, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua'),
(2, 'Wakil Ketua'),
(3, 'Sektretaris'),
(4, 'Bendahara'),
(5, 'Pengawas'),
(6, 'Pengurus Bidang Keagamaan'),
(9, 'Pembina');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_donasi`
--

CREATE TABLE `pengeluaran_donasi` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nominal` int(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_donasi`
--

INSERT INTO `pengeluaran_donasi` (`id_pengeluaran`, `id_pengurus`, `tgl_pengeluaran`, `nominal`, `keterangan`) VALUES
(1, 2, '2021-03-03', 9000, 'Untuk Pembangunan'),
(3, 9, '2021-03-28', 600000, '<p>untuk santunan anak yatim</p>'),
(4, 2, '2021-03-28', 90000, '<p>untuk pembangunan</p>'),
(5, 2, '2021-03-28', 10000, '<p>a</p>'),
(6, 5, '2021-03-31', 10000, '<p>a</p>'),
(7, 9, '2021-04-01', 80000, '<p>a</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pengurus` varchar(128) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `jabatan` enum('ketua','wakil','sekretaris','bendahara','anggota aktif','anggota pasif') NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_jabatan`, `nama_pengurus`, `jenis_kelamin`, `jabatan`, `no_telp`) VALUES
(2, 1, 'Sandi Cahyadi', 'L', 'ketua', '08383229874'),
(5, 6, 'Khoirul Warisin', 'L', 'anggota aktif', '089765234123'),
(9, 2, 'Mas\'udi Faris', 'L', 'ketua', '087654312345'),
(11, 3, 'Ram Alif Pramana', 'L', 'ketua', '083832298748');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_donasi_tunai`
--

CREATE TABLE `transaksi_donasi_tunai` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `tgl_donasi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_donasi_tunai`
--

INSERT INTO `transaksi_donasi_tunai` (`id_donasi`, `id_user`, `id_pengurus`, `tgl_donasi`) VALUES
(1, 5, 9, '2021-03-09 13:59:01'),
(2, 6, 11, '2021-03-17 01:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `order_id` int(20) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va_number` varchar(30) NOT NULL,
  `pdf_url` varchar(512) NOT NULL,
  `status_code` char(3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`order_id`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `keterangan`) VALUES
(54395835, 1000000, 'bank_transfer', '2021-03-06 16:15:50', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/76ba7819-1d5d-46da-b5c6-1fb89fa1653a/pdf', '201', 'aaaaa'),
(484801864, 70000, 'bank_transfer', '2021-03-29 01:16:36', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/dac25bf5-c7ef-4fe0-a719-62605e474550/pdf', '201', ''),
(853257284, 8000, 'bank_transfer', '2021-03-15 22:49:13', 'bri', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/33ffe4b7-ada7-4a19-a3ef-e0c1141b08b6/pdf', '201', ''),
(943371113, 90000, 'bank_transfer', '2021-03-11 12:50:11', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ff512cba-d9c3-40ad-946d-00f75d29cafe/pdf', '201', ''),
(1000345545, 90000, 'bank_transfer', '2021-03-29 00:58:52', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3deb33ee-6e43-4569-acb4-2f40faa13ecd/pdf', '201', ''),
(1269349588, 233232, 'bank_transfer', '2020-12-04 12:58:28', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c584c8eb-c430-4126-9919-012bb069d4a9/pdf', '201', ''),
(1457896182, 100000, 'bank_transfer', '2021-03-09 12:02:04', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/5590db96-ae6d-41f4-a1b7-cbc4b873648e/pdf', '201', ''),
(1552855403, 90000, 'bank_transfer', '2021-03-07 19:23:12', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/84c93a26-13ef-41b5-8b4d-7ed5d8fbb3db/pdf', '201', ''),
(1664832634, 90000, 'bank_transfer', '2021-03-29 01:45:45', 'bri', '677881841530730613', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d949c10a-25f3-4c98-be4a-3a47e68f7ff1/pdf', '201', 'aaaaaaaaa'),
(2079383000, 111111, 'bank_transfer', '2020-12-03 23:39:49', 'bca', '2147483647', 'https://app.sandbox.midtrans.com/snap/v1/transactions/39b98f66-ec40-4122-8130-df7d73d02a3d/pdf', '201', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(1) NOT NULL,
  `is_active` enum('aktif','pasif') NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`) VALUES
(4, 'Admin Jannati', 'andri@gmail.com', 'default1.png', '$2y$10$AmLssCT/Z4GPXEOaNPQbIuG5iWxASTHOMDjnH6x3LwapTqCkQQbTa', 1, 'aktif', 1604837683),
(5, 'Hamba Allah', 'mamat@gmail.com', 'default.png', '$2y$10$y0ozTRDve45SeNN5cUpK0O9QwJRUvIzlQakv81xhU2h34ttCsKmLS', 2, 'aktif', 1605162134),
(6, 'Rudi Harwoko', 'rudi@gmail.com', 'default.png', '$2y$10$DSip5tW6bToxSIeCyvtx4uOiJelod4fq9h0IOf0VVcRZl9uvciY5K', 2, 'pasif', 1605332749),
(8, 'aaa', 'aaaa@gmail.com', 'default.png', '$2y$10$sQQPnQcXdCj4D3/j8VCMDOvCL7dchQVc5JeebNjI6Q5IsxFcA0Vi.', 2, 'pasif', 1605340036),
(11, 'Winandri Kusuma', 'winandrikusuma27@gmail.com', 'default.png', '$2y$10$AUSo71s5vzKqpH5ckFWSke0b3aq2idPK3TP2qNqMOk2m4bg37oEFW', 2, 'aktif', 1605340846),
(12, 'alaba', 'albabaihaki18@gmail.com', 'default.png', '$2y$10$yojJ48ob2GdSyxDjNpE1.ugCFENkdKRX3vPzxgMM5vyRUi36lbfpy', 2, 'pasif', 1606026815),
(17, 'Hamba Allah', 'v@gmail.com', 'default.png', '$2y$10$BIs1LnvKUOybsPpsA8DWh.L3geQH9nC1T8yufs6YF63MpCGv6Wtie', 2, 'pasif', 1615816957),
(18, 'Bayu', 'bayugunasar@gamil.com', 'default.png', '$2y$10$/CG3Fv9HyHgd7Kccl2oPWuUU6180UVPQywNArnh4O4sXECI2Ckw.q', 2, 'aktif', 1616693738),
(19, 'coba', 'coba@gmail.com', 'default.png', '$2y$10$XzHNLjmy6EGLwTfpnK4C.eOdJZOiLxNcdeV7IM2G.Ij/qgIrAOc7i', 2, 'aktif', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id_token`, `email`, `token`, `date_created`) VALUES
(5, 'winandrikusuma27@gmail.com', 'D168U9cJN4/2OXd1QYbZvmonjnusxAD0RsDLIEASFM4=', 1605345253),
(6, 'albabaihaki18@gmail.com', 'x3938kQzE/xoLhSxy9T71V+vCvz8aaPEIjn5kxU7aAg=', 1606026815),
(7, 'winandrikusuma27@gmail.com', 'WwJT3v49cYBNaXeWH9juxcLF9icHY6cCPxehLAm5TDk=', 1606835043),
(8, 'baba@gmail.com', '3tvLouKa8kkQ+6KpbMt1M4Z3UvP81zmmgmT8h+a+M+8=', 1609926876),
(9, 'baba2@gmail.com', '5tO3e9/8emAPhDm28Ptq9MsJGvs9QA3sierySBruT3Q=', 1609927094),
(11, 'v@gmail.com', '6XqMz/j0nrcjxLurWWDkboMwhAS9liNKyar/kyKE1uk=', 1615816957),
(12, 'winandrikusuma27@gmail.com', 'w/Q1IJyoIXBM1Nnue/gdLL1e7zm5qt2E2y2nIO3/qjo=', 1617077988);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_didik`
--
ALTER TABLE `anak_didik`
  ADD PRIMARY KEY (`id_anak_didik`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  ADD PRIMARY KEY (`id_detail_donasi`),
  ADD KEY `id_donasi` (`id_donasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id _jabatan` (`id_jabatan`);

--
-- Indexes for table `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_user` (`id_user`,`id_pengurus`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_didik`
--
ALTER TABLE `anak_didik`
  MODIFY `id_anak_didik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  MODIFY `id_detail_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2079383001;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak_didik`
--
ALTER TABLE `anak_didik`
  ADD CONSTRAINT `anak_didik_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);

--
-- Constraints for table `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  ADD CONSTRAINT `detail_donasi_tunai_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `transaksi_donasi_tunai` (`id_donasi`);

--
-- Constraints for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD CONSTRAINT `pengeluaran_donasi_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  ADD CONSTRAINT `transaksi_donasi_tunai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_donasi_tunai_ibfk_2` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
