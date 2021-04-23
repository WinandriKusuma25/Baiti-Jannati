-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 09:41 PM
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
  `id_user` int(11) NOT NULL,
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

INSERT INTO `anak_didik` (`id_anak_didik`, `id_user`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `nama_wali`, `foto`) VALUES
(10, 4, 'Ilham Arifin', 'L', 'Malang', '2007-01-01', 'RT. 04 RW. 04\r\n', 'Bhakti Waluyo', 'Ilham_Arifin1.jpg'),
(11, 4, 'Steven Andra Kusuma', 'L', 'Malang', '2008-12-17', 'RT. 01 RW. 04\r\n', 'Kusnan', 'Steven_Andra_Kusuma1.jpg'),
(14, 4, 'Dwica Indah Ramayanti', 'P', 'Malang', '2007-07-11', 'RT. 04 RW. 01\r\n', 'Supardi', 'Dwica_Indah_Ramayanti.jpg'),
(15, 4, 'Mochammad Faril Kurniawan', 'L', 'Malang', '2006-11-11', 'RT. 01\r\nRW. 02\r\n', 'M.Yusuf S', 'Mochammad_Faril_Kurniawan.jpg'),
(16, 4, 'Mohammad Haidhor Alawy', 'L', 'Malang', '2006-11-11', 'RT. 01 RW. 02\r\n', 'Syamsul Arifin ', 'Mohammad_Haidhor_Alawy.jpg'),
(17, 4, 'Aisyah Rohmatul Faizah', 'P', 'Malang', '2010-05-04', 'RT. 01  RW. 04\r\n', 'Rudi', 'Aisyah_Rohmatul_Faizah.jpg'),
(18, 4, 'M. Nazril Habibi', 'L', 'Malang', '2010-11-11', 'RT. 03 RW. 02\r\n', 'Anton Hilmi', 'aaa.jpg'),
(23, 26, 'sadas', 'L', 'sadas', '2021-04-23', 'asdasdas', 'sadas', 'sadas1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 21, 'Santunan Anak Yatim Rutin Baiti Jannati lorem ipsum dolor', '<p>Seseorang bisa jadi berkecukupan secara materiil maupun nonmateriil. Akan tetapi, ada pula yang membutuhkan bantuan agar mencukupi kebutuhan sehari-harinya, terutama anak yang kehilangan ayahnya.</p><p>Sebab, dalam keluarga seorang ayah memiliki peranan penting. Ayah berfungsi sebagai kepala keluarga dan bertugas memenuhi kebutuhan hidup anggota keluarganya.</p><p>Lantas, bagaimana jika seorang anak telah kehilangan atau tidak memiliki seorang ayah? Anak yang telah kehilangan ayahnya dikenal di masyarakat sebagai anak yatim.</p><p>Berdasarkan definisi syariat, kata <em>yatim </em>ditujukan kepada mereka yang tidak memiliki ayah ketika berusia anak-anak atau masih dalam keadaan belum balig secara biologis, psikologis, dan sosiologis.</p>', 'anak_yatim.jpg', '2021-04-23 03:02:54', '2021-04-23 20:04:53'),
(8, 21, 'Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium', '<p>Link zoom yang akan kita gunakan semester ini Shohib M is inviting you to a scheduled Zoom meeting. Topic: Etika Profesi Bidang Teknologi Informasi 3E-3F D3 TI Time: This is a recurring meeting Meet anytime Join Zoom Meeting <a target=\"_blank\" href=\"https://us02web.zoom.us/j/81356554546?pwd=Q1lrK0pYRWgzbTJhbW5TSmhDK2ZRUT09\">https://us02web.zoom.us/j/81356554546?pwd=Q1lrK0pYRWgzbTJhbW5TSmhDK2ZRUT09</a> Meeting ID: 813 5655 4546 Passcode: POLINEMA One tap mobile +13126266799,,81356554546#,,,,*66873050# US (Chicago) +13462487799,,81356554546#,,,,*66873050# US (Houston) Dial by your location +1 312 626 6799 US (Chicago) +1 346 248 7799 US (Houston) +1 669 900 6833 US (San Jose) +1 929 205 6099 US (New York) +1 253 215 8782 US (Tacoma) +1 301 715 8592 US (Washington DC) Meeting ID: 813 5655 4546 Passcode: 66873050 Find your local number: <a target=\"_blank\" href=\"https://us02web.zoom.us/u/kc3ZnsTPOL\">https://us02web.zoom.us/u/kc3ZnsTPOL</a></p>', 'jasa.png', '2021-04-23 03:02:54', '2021-04-23 20:04:58'),
(10, 21, 'tes coba berita baiti jannati ya 123 aaaaaaaaaaaaa', '<p>tes coba 2</p>', 'WhatsApp_Image_2021-02-12_at_21_27_09.jpeg', '2021-04-23 03:02:54', '2021-04-23 20:05:01'),
(12, 21, 'coba coba coba', '<p>fufufu cok</p>', 'foto_fandi1.jpg', '2021-04-23 20:49:41', '2021-04-23 20:53:59');

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
(2, 2, 'keuangan', '', 10000, 0, '', ''),
(3, 1, 'non keuangan', 'a', 0, 2, 'mi.jpg', 'aaa'),
(4, 4, 'keuangan', '', 1, 0, '', 'aaa'),
(5, 5, 'keuangan', '', 11, 0, '', 'aa'),
(6, 6, 'keuangan', '', 1, 0, '', 'dqws'),
(7, 7, 'keuangan', '', 12, 0, '', 'cews'),
(8, 7, 'keuangan', '', 12, 0, '', 'cscwc'),
(9, 9, 'keuangan', '', 1, 0, '', 'a'),
(10, 9, 'keuangan', '', 1, 0, '', 'a'),
(11, 11, 'non keuangan', 'a', 0, 1, 'a', 'aaa'),
(12, 11, 'non keuangan', '1', 0, 1, 'a', 'aa'),
(13, 12, 'non keuangan', '1', 0, 1111, 'WhatsApp_Image_2021-02-12_at_21_27_09.jpeg', 'bhjvhg'),
(14, 12, 'non keuangan', '111111', 0, 222222, 'WhatsApp_Image_2021-02-12_at_23_19_19.jpeg', 'jvhjvh'),
(15, 13, 'non keuangan', 'aa', 0, 2, 'WhatsApp_Image_2021-02-12_at_22_34_39.jpeg', 'sad'),
(16, 13, 'non keuangan', 'sdsa', 0, 11, 'aaaa.jpg', 'asdas'),
(17, 14, 'keuangan', '', 1, 0, '', ''),
(18, 15, 'non keuangan', 'makanan', 0, 1, 'logo_malang.png', 'aaa'),
(19, 15, 'non keuangan', 'minuman', 0, 1, 'logo_malang1.png', 'aaa');

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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'makanan'),
(2, 'minuman');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_non_donasi`
--

CREATE TABLE `pemasukan_non_donasi` (
  `id_pemasukan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan_non_donasi`
--

INSERT INTO `pemasukan_non_donasi` (`id_pemasukan`, `id_user`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 4, 2021, '<p>baju celana sarung</p>', '2021-04-23 23:27:27', '2021-04-23 23:27:55'),
(4, 4, 2021, '<p>aaa</p>', '2021-04-23 23:27:27', '2021-04-23 23:27:59'),
(5, 4, 9000, '<p>asd</p>', '2021-04-23 23:27:27', '2021-04-23 23:28:03'),
(6, 4, 9000, '<p>asd</p>', '2021-04-23 23:27:27', '2021-04-23 23:28:06'),
(11, 4, 12345, '<p>sdsadsasadsadas</p>', '2021-04-23 23:38:27', '2021-04-23 23:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `kondisi` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `mitra_berbagi` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `id_user`, `sejarah`, `kondisi`, `foto`, `mitra_berbagi`, `created_at`, `updated_at`) VALUES
(1, 21, '<p>Dalam rangka melaksanakan kegiatan sosial di wilayah desa Bakalan kecamatan Bululawang terutama bagi adik dan saudara kita Yatim-Piatu atau terlantar, maka kami merasa perlu mengadakan kegiatan sosial dengan menyantuni, mendidik dan memberikan ketrampilan bagi anak Yatim Piatu agar dapat hidup lebih baik, mandiri dan sejahtera. Dari kepedulian tersebut maka muncul sebuah gagasan dengan membuat Yayasan Rumah Cerdas Yatim Piatu yang kami beri nama &rdquo;BAITI JANNATI&rdquo; (Rumahku Surgaku) dengan kegiatan utama yaitu Memberikan santunan setiap bulan kepada anak Yatim Piatu, Memberikan bimbingan pendidikan dan ketrampilan, Makan bersama dan kegiatan lainnya dengan anak yatim / piatu. Sehubungan dengan rencana tersebut maka diperlukan para Donatur baik dari Dalam desa maupun dari luar desa agar kegiatan yang kami rencanakan dapat berjalan dengan lancar sesuai yang diharapkan.</p><p>Yayasan ini bernama : YAYASAN RUMAH CERDAS YATIM PIATU BAITI JANNATI, selanjutnya dalam anggaran dasar ini disingkat Yayasan, yang berkedudukan di Dusun Bakalan 02 RT. 01 RW. 03 Desa Bakalan Kecamatan Bululawang Kabupaten Malang. Dalam perkembangannya, Yayasan dapat membuka kantor cabang atau perwakilan lain, baik didalam maupun diluar wilayah Republik Indonesia berdasarkan Keputusan Pengurus dengan Persetujuan Pembina.</p>', '<p>Ketika mulai didirikan dan memberikan santunan anak yatim untuk pertama kalinya pada tanggal 21 Januari 2018 ada 11 anak yatim / piatu yang menjadi prioritas penerima santunan dari Rumah Cerdas &rdquo;BAITI JANNATI&rdquo;, selanjutnya pada bulan ke-2 (18 Pebruari 2018) jumlah anak didik bertambah 3 menjadi 14 anak didik, dan pada santunan ke-3 (11 Maret 2018) jumlah anak didik bertambah 1 sehingga menjadi 15 anak didik. Pada santunan ke-4 (22 April 2018) jumlah anak didik menjadi 21 anak dan pada santunan ke-5 (13 Mei 2018) menjadi 31 anak didik dan mulai santunan ke-6 (2 Juni 2018) menjadi 33 anak didik, Santunan ke 8 menjadi 40 anak didik, santunan ke 10 sampai sekarang sudah berkembang 45 anak didik (per 22 Mei 2019)</p>', 'baju.jpg', '<ol><li><em><strong>&nbsp;Susu kedelai </strong></em></li><li><em><strong>&nbsp;Pecel uyun </strong></em></li><li><em><strong>&nbsp;Bu pri</strong></em></li></ol>', '2021-04-21 02:32:35', '2021-04-21 21:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran_donasi`
--

CREATE TABLE `pengeluaran_donasi` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(128) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran_donasi`
--

INSERT INTO `pengeluaran_donasi` (`id_pengeluaran`, `id_user`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 4, 9000, '<p>Untuk Pembangunan</p>', '2021-04-23 21:43:04', '2021-04-23 21:43:18'),
(4, 4, 90000, '<p>untuk pembangunan</p>', '2021-04-23 21:43:04', '2021-04-23 21:43:22'),
(5, 4, 10000, '<p>a</p>', '2021-04-23 21:43:04', '2021-04-23 21:43:25'),
(6, 4, 10000, '<p>a</p>', '2021-04-23 21:43:04', '2021-04-23 21:43:28'),
(7, 4, 80000, '<p>a</p>', '2021-04-23 21:43:04', '2021-04-23 21:43:31'),
(9, 4, 9000, '<p>untuk santunan anak yatim</p>', '2021-04-23 22:04:28', '2021-04-23 22:54:21'),
(11, 4, 1091, '<p>cccc</p>', '2021-04-23 22:56:55', '2021-04-23 23:01:01');

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
-- Table structure for table `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `log_user` varchar(128) DEFAULT NULL,
  `log_tipe` varchar(10) DEFAULT NULL,
  `log_desc` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_log`
--

INSERT INTO `tabel_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
(9, '2021-04-23 22:58:45', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(10, '2021-04-23 23:00:30', 'Sandi Cahyadi', 'hapus', 'hapus pengeluaran donasi'),
(11, '2021-04-23 23:01:01', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(13, '2021-04-23 23:13:02', 'Sandi Cahyadi', 'hapus', 'hapus kategori'),
(14, '2021-04-23 23:13:08', 'Sandi Cahyadi', 'hapus', 'hapus kategori'),
(18, '2021-04-23 23:46:01', 'Sandi Cahyadi', 'hapus', 'hapus pengeluaran donasi'),
(20, '2021-04-23 23:55:40', 'Sandi Cahyadi', 'logout', 'telah melakukan logout'),
(21, '2021-04-23 23:55:54', 'Superadmin', 'logout', 'telah melakukan logout'),
(22, '2021-04-23 23:57:26', 'Sandi Cahyadi', 'login', 'telah melakukan login'),
(23, '2021-04-23 23:57:53', 'Superadmin', 'logout', 'telah melakukan logout'),
(24, '2021-04-23 23:58:01', 'Sandi Cahyadi', 'login', 'telah melakukan login'),
(26, '2021-04-24 00:00:03', 'Superadmin', 'logout', 'telah melakukan logout'),
(27, '2021-04-24 00:01:13', 'Sandi Cahyadi', 'logout', 'telah melakukan logout'),
(29, '2021-04-24 00:11:14', 'Sandi Cahyadi', 'login', 'telah melakukan login'),
(30, '2021-04-24 00:43:18', 'Superadmin', 'logout', 'telah melakukan logout'),
(31, '2021-04-24 00:43:26', 'Superadmin', 'login', 'telah melakukan login'),
(32, '2021-04-24 00:47:13', 'Sandi Cahyadi', 'logout', 'telah melakukan logout'),
(33, '2021-04-24 00:47:28', 'Superadmin', 'login', 'telah melakukan login');

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
(2, 6, 11, '2021-03-17 01:59:01'),
(3, 18, 5, '2021-04-17 17:15:08'),
(4, 18, 5, '2021-04-17 17:15:33'),
(5, 18, 5, '2021-04-17 17:21:33'),
(6, 18, 5, '2021-04-17 17:28:25'),
(7, 12, 11, '2021-04-17 17:31:18'),
(8, 11, 9, '2021-04-17 17:32:42'),
(9, 17, 9, '2021-04-17 17:33:34'),
(10, 17, 9, '2021-04-17 17:34:14'),
(11, 17, 9, '2021-04-17 17:38:13'),
(12, 17, 2, '2021-04-17 17:56:14'),
(13, 11, 5, '2021-04-17 17:57:55'),
(14, 8, 9, '2021-04-17 23:00:45'),
(15, 20, 5, '2021-04-20 14:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `order_id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `va_number` varchar(30) DEFAULT NULL,
  `pdf_url` varchar(512) DEFAULT NULL,
  `status_code` char(3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`order_id`, `id_user`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`, `status_code`, `keterangan`) VALUES
(571776600, 19, 90000, 'bank_transfer', '2021-04-02 23:47:08', 'bri', '677889999332323150', 'https://app.sandbox.midtrans.com/snap/v1/transactions/35a2a7d9-fe6e-4ce8-b1ea-ddc8ae141e51/pdf', '200', ' semoga sehat'),
(1006854895, 5, 90000, 'bank_transfer', '2021-04-02 23:43:23', 'bca', '67788401447', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3ae36a1a-cca0-41b0-a8e6-6cb7a51021b6/pdf', '201', ' semoga berkah'),
(1629171484, 5, 21211212, 'bank_transfer', '2021-04-13 00:47:18', 'bca', '67788982885', 'https://app.sandbox.midtrans.com/snap/v1/transactions/35a078db-196f-44d8-88af-e71f2c7faa34/pdf', '201', ' a'),
(1704181588, 5, 1, 'bank_transfer', '2021-04-14 21:19:08', 'bri', '677885725796699660', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3cefc235-afb3-4784-95b2-e7c0c29ed183/pdf', '201', ' '),
(1913193508, 20, 10000, 'bank_transfer', '2021-04-20 14:22:10', 'bca', '67788421591', 'https://app.sandbox.midtrans.com/snap/v1/transactions/99b1dc47-761f-4f25-af73-19e9f198598b/pdf', '201', ' semoga berkah');

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
  `role` enum('admin','donatur','pengurus') NOT NULL,
  `is_active` enum('aktif','pasif') NOT NULL,
  `date_created` int(11) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role`, `is_active`, `date_created`, `last_login`) VALUES
(4, 'Sandi Cahyadi', 'andri@gmail.com', 'p_winandri.jpeg', '$2y$10$AmLssCT/Z4GPXEOaNPQbIuG5iWxASTHOMDjnH6x3LwapTqCkQQbTa', 'pengurus', 'aktif', 1604837683, '2021-04-23 19:41:23'),
(5, 'Hamba Allah', 'mamat@gmail.com', 'default.png', '$2y$10$y0ozTRDve45SeNN5cUpK0O9QwJRUvIzlQakv81xhU2h34ttCsKmLS', 'donatur', 'aktif', 1605162134, '2021-04-23 17:51:24'),
(6, 'Rudi Harwoko', 'rudi@gmail.com', 'default.png', '$2y$10$DSip5tW6bToxSIeCyvtx4uOiJelod4fq9h0IOf0VVcRZl9uvciY5K', 'donatur', 'pasif', 1605332749, '2021-04-20 21:21:29'),
(8, 'aaa', 'aaaa@gmail.com', 'default.png', '$2y$10$sQQPnQcXdCj4D3/j8VCMDOvCL7dchQVc5JeebNjI6Q5IsxFcA0Vi.', 'donatur', 'pasif', 1605340036, '2021-04-20 21:21:29'),
(11, 'Winandri Kusuma', 'winandrikusuma27@gmail.com', 'default.png', '$2y$10$AUSo71s5vzKqpH5ckFWSke0b3aq2idPK3TP2qNqMOk2m4bg37oEFW', 'donatur', 'aktif', 1605340846, '2021-04-20 21:21:29'),
(12, 'alaba', 'albabaihaki18@gmail.com', 'default.png', '$2y$10$yojJ48ob2GdSyxDjNpE1.ugCFENkdKRX3vPzxgMM5vyRUi36lbfpy', 'donatur', 'pasif', 1606026815, '2021-04-20 21:21:29'),
(17, 'Hamba Allah', 'v@gmail.com', 'default.png', '$2y$10$BIs1LnvKUOybsPpsA8DWh.L3geQH9nC1T8yufs6YF63MpCGv6Wtie', 'donatur', 'pasif', 1615816957, '2021-04-20 21:21:29'),
(18, 'Bayu', 'bayugunasar@gamil.com', 'default.png', '$2y$10$/CG3Fv9HyHgd7Kccl2oPWuUU6180UVPQywNArnh4O4sXECI2Ckw.q', 'donatur', 'aktif', 1616693738, '2021-04-20 21:21:29'),
(19, 'coba', 'coba@gmail.com', 'default.png', '$2y$10$XzHNLjmy6EGLwTfpnK4C.eOdJZOiLxNcdeV7IM2G.Ij/qgIrAOc7i', 'donatur', 'aktif', 0, '2021-04-20 21:21:29'),
(20, 'Hamba Allah', 'winandrikusuma25@gmail.com', 'default.png', '$2y$10$/V4eDddSoPd9feEGABl0.O71E72LMPccf1MG7a7AvYFmCE8ScCaXW', 'donatur', 'aktif', 1618902988, '2021-04-20 21:21:29'),
(21, 'Superadmin', 'superadmin@gmail.com', 'foto_fandi.jpg', '$2y$10$sEN1Lvbb0upbt9lKk5SXmeM.ACKeeG8wBE4ESuw0pTfVC2cajJpDC', 'admin', 'aktif', 1618934725, '2021-04-23 18:20:30'),
(22, 'a', 'a@gmail.com', 'default.png', '$2y$10$cliySOZqXUqvPuE6YppIo.Bx4xCBjKAbaZ1/rWmIVsiaOPWDzzwlG', 'donatur', 'aktif', 1618954333, '2021-04-20 21:33:02'),
(23, 'aaa', 'b@gmail.com', 'default.png', '$2y$10$mNA2MbC/NuNZhoHueL5.QOna2HszTQD/jzjj6fTsjGGa6GknrQjJa', 'donatur', 'aktif', 1619117321, '2021-04-22 18:54:23'),
(26, 'Misbaqul ulum', '1234@gmail.com', 'default.png', '$2y$10$6ipPjRWEoo8ARReKRc7e5OU8kdn1ZaJgog44GpxI67KrmBnJ5Pv1.', 'pengurus', 'aktif', 1619119520, '2021-04-23 16:13:47');

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
(12, 'winandrikusuma27@gmail.com', 'w/Q1IJyoIXBM1Nnue/gdLL1e7zm5qt2E2y2nIO3/qjo=', 1617077988),
(13, 'winandrikusuma27@gmail.com', 'sQgj1hLZ7GDplSUXRhhAI0KBLvCOaH+zUImHLf8hYLs=', 1617342577),
(14, 'winandrikusuma27@gmail.com', 'pvvAMoQXe15Rjt5W8vcWGFz3EtrPF+G8fRaNQN3fzAA=', 1618060473),
(15, 'mamat@gmail.com', 'TcHgwNhsP3LNWDUKwF3PIFdxNo8Tjbl9vHbt9vayVzk=', 1618325125),
(16, 'winandrikusuma27@gmail.com', 'P0PiLnrgqTkGPAnJFqaisHHjNNTJVSqyqcNj3XplJVQ=', 1618326859),
(17, 'winandrikusuma27@gmail.com', 'PpUSGlmchE0L9/RDy8E9+naEjRzZJmH6Dkd2KDL9h30=', 1618328042);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_didik`
--
ALTER TABLE `anak_didik`
  ADD PRIMARY KEY (`id_anak_didik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_pengurus` (`id_user`);

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
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_pengurus` (`id_user`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id _jabatan` (`id_jabatan`);

--
-- Indexes for table `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_anak_didik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  MODIFY `id_detail_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2079383001;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  ADD CONSTRAINT `detail_donasi_tunai_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `transaksi_donasi_tunai` (`id_donasi`);

--
-- Constraints for table `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  ADD CONSTRAINT `pemasukan_non_donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD CONSTRAINT `pengaturan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD CONSTRAINT `pengeluaran_donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

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

--
-- Constraints for table `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD CONSTRAINT `transaksi_midtrans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
