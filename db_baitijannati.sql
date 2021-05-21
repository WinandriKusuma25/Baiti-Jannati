-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Bulan Mei 2021 pada 08.52
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

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
-- Struktur dari tabel `anak_didik`
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
-- Dumping data untuk tabel `anak_didik`
--

INSERT INTO `anak_didik` (`id_anak_didik`, `id_pengurus`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `nama_wali`, `foto`) VALUES
(10, 2, 'Ilham Arifin', 'L', 'Malang', '2007-01-01', 'RT. 04 RW. 04\r\n', 'Bhakti Waluyo', 'Ilham_Arifin1.jpg'),
(11, 2, 'Steven Andra Kusuma', 'L', 'Malang', '2008-12-17', 'RT. 01 RW. 04\r\n', 'Kusnan', 'Steven_Andra_Kusuma1.jpg'),
(14, 2, 'Dwica Indah Ramayanti', 'P', 'Malang', '2007-07-11', 'RT. 04 RW. 01\r\n', 'Supardi', 'Dwica_Indah_Ramayanti.jpg'),
(15, 2, 'Mochammad Faril Kurniawan', 'L', 'Malang', '2006-11-11', 'RT. 01\r\nRW. 02\r\n', 'M.Yusuf S', 'Mochammad_Faril_Kurniawan.jpg'),
(16, 2, 'Mohammad Haidhor Alawy', 'L', 'Malang', '2006-11-11', 'RT. 01 RW. 02\r\n', 'Syamsul Arifin ', 'Mohammad_Haidhor_Alawy.jpg'),
(17, 2, 'Aisyah Rohmatul Faizah', 'P', 'Malang', '2010-05-04', 'RT. 01  RW. 04\r\n', 'Rudi', 'Aisyah_Rohmatul_Faizah.jpg'),
(18, 2, 'M. Nazril Habibi', 'L', 'Malang', '2010-11-11', 'RT. 03 RW. 02\r\n', 'Anton Hilmi', 'aaa.jpg'),
(23, 2, 'sadas', 'L', 'sadas', '2021-04-23', 'asdasdas', 'sadas', 'sadas1.jpg'),
(25, 2, 'tes', 'L', 'tes', '2021-05-07', 'tes', 'tes', 'Foto_Dapur1.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
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
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 21, 'Santunan Anak Yatim Rutin Baiti Jannati', '<p>Seseorang bisa jadi berkecukupan secara materiil maupun nonmateriil. Akan tetapi, ada pula yang membutuhkan bantuan agar mencukupi kebutuhan sehari-harinya, terutama anak yang kehilangan ayahnya.</p><p>Sebab, dalam keluarga seorang ayah memiliki peranan penting. Ayah berfungsi sebagai kepala keluarga dan bertugas memenuhi kebutuhan hidup anggota keluarganya.</p><p>Lantas, bagaimana jika seorang anak telah kehilangan atau tidak memiliki seorang ayah? Anak yang telah kehilangan ayahnya dikenal di masyarakat sebagai anak yatim.</p><p>Berdasarkan definisi syariat, kata <em>yatim </em>ditujukan kepada mereka yang tidak memiliki ayah ketika berusia anak-anak atau masih dalam keadaan belum balig secara biologis, psikologis, dan sosiologis.</p>', 'anak_yatim.jpg', '2021-04-23 03:02:54', '2021-05-20 20:13:36'),
(13, 21, 'Pembagian Zakat Fitrah Baiti Jannati', '<p>Rabu, 12 Mei 2021 Baiti Jannati telah membagikan zakat fitrah kepada masyarakat dhuafa di Desa Bakalan.<br>Jumlah beras zakat yang diterima di Baiti Jannati berjumlah sekitar 60 kantong beras @2,5kg.<br>Pembagian berlangsung dari pagi sampai sore hari. pembagian di khususkan di dusun bakalan terlebih dahulu, setelah di dusun bakalan sudah merata, pembagian dilanjutkan ke dusun banjarsari yang merupakan dari bagian Desa Bakalan Juga</p>', 'WhatsApp_Image_2021-05-20_at_19_42_37.jpeg', '2021-05-20 19:54:29', NULL),
(14, 21, 'Penyerahan Uang Yayasan dari Pembina', '<p>Rabu, 19 Mei 2021 Bapak Sandi selaku pembina yayasan menyerahkan uang yayasan ke ketua yayasan yaitu Bapak Bayu Eko. Penyerahan dilakukan di Panti Asuhan Baiti Jannati bersamaan dengan Tamu yaitu Cabang baru Baiti Jannati di Desa Sumbertangkil Kecamatan Dampit Kabupapen Malang. Penyerahan uang ini bertujuan agara keuangan yayasan dan panti asuhan terpisan dan dikelola oleh masing-masing pengurus. </p>', 'WhatsApp_Image_2021-05-20_at_19_42_08.jpeg', '2021-05-20 20:16:04', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_donasi`
--

CREATE TABLE `cara_donasi` (
  `id_cara` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pertanyaan` varchar(256) NOT NULL,
  `jawaban` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cara_donasi`
--

INSERT INTO `cara_donasi` (`id_cara`, `id_user`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 21, 'apa itu donasi?', 'tidak tahu yaaa', '2021-04-28 06:03:34', NULL),
(3, 21, 'Apa bisa Donatur berdonasi tanpa ke Yayasan?', 'Bisa, karena bisa langsung melalui sistem dan terdapat beberapa metode pembayaran yang tersedia.', '2021-04-28 06:35:52', NULL),
(4, 21, 'coba', 'coba', '2021-04-28 07:05:08', NULL),
(5, 21, 'coba', 'coba', '2021-04-28 07:08:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_donasi_tunai`
--

CREATE TABLE `detail_donasi_tunai` (
  `id_detail_donasi` int(11) NOT NULL,
  `id_donasi` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `jenis_donasi` enum('keuangan','non keuangan') NOT NULL,
  `nominal` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `keterangan` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_donasi_tunai`
--

INSERT INTO `detail_donasi_tunai` (`id_detail_donasi`, `id_donasi`, `id_kategori`, `jenis_donasi`, `nominal`, `jumlah`, `image`, `keterangan`) VALUES
(44, 35, 17, 'keuangan', 10000, 0, NULL, 'semoga berkah'),
(45, 35, 15, 'non keuangan', NULL, 8, 'Foto_Kamar_Mandi.jpeg', 'minuman sebanyak 11 kardus1'),
(46, 40, NULL, 'keuangan', 20000, NULL, NULL, 'Semoga Berkah'),
(47, 46, 17, 'keuangan', 200000, 0, NULL, 'barokah'),
(48, 47, 17, 'keuangan', 10000000, 0, NULL, 'Donasi dari Pak Heppi'),
(49, 48, 17, 'keuangan', 2000000, 0, NULL, 'Dari Bu Endang SMPN 1 Bululawang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'makanan'),
(2, 'minuman'),
(15, 'Pakaian'),
(17, 'uang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_user`, `judul`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 21, 'Santunan coba', '<p>Santunan yang kami adakan yaitu setiap 1 bulan sekali. Yaitu menyantuni anak yatim, piatu, dan dhuafa yang ada di Desa Bakalan. coba</p>', 'santunan.png', '2021-04-27 01:07:48', '2021-04-28 05:13:09'),
(2, 21, 'Bakti Sosial', 'Melakukan Bakti Sosial bagi warga yang mengalami kesusahan, misalnya kematian dan warga kurang mampu dan warga yang membutuhkan', 'baktisosial.png', '2021-04-27 01:34:27', '2021-04-28 04:47:40'),
(3, 21, 'Beasiswa Pendidikan', 'Membantu SPP anak didik setip bulan yang sudah sekolah SMP. Meskipun membantunya tidak penuh 100% tetapi tetap dibantu oleh yayasan.', 'pendidikan.png', '2021-04-28 05:28:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_non_donasi`
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
-- Dumping data untuk tabel `pemasukan_non_donasi`
--

INSERT INTO `pemasukan_non_donasi` (`id_pemasukan`, `id_user`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(15, 4, 1000000, '<p>Jual baju bekas di Desa Sumbertangkil</p>', '2021-04-30 00:07:26', '2021-05-20 20:41:49'),
(16, 4, 300000, '<p>Jual Takjil Berbuka</p>', '2021-04-30 00:08:51', NULL),
(17, 4, 1500000, '<p>Jual Baju Bekas di Desa Purwodadi </p>', '2021-05-03 02:26:44', '2021-05-20 20:41:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `kondisi` text NOT NULL,
  `foto` varchar(128) NOT NULL,
  `mitra_berbagi` text NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `kontak` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `motivasi` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id_pengaturan`, `id_user`, `sejarah`, `kondisi`, `foto`, `mitra_berbagi`, `lokasi`, `kontak`, `email`, `motivasi`, `created_at`, `updated_at`) VALUES
(1, 21, '<p>Dalam rangka melaksanakan kegiatan sosial di wilayah desa Bakalan kecamatan Bululawang terutama bagi adik dan saudara kita Yatim-Piatu atau terlantar, maka kami merasa perlu mengadakan kegiatan sosial dengan menyantuni, mendidik dan memberikan ketrampilan bagi anak Yatim Piatu agar dapat hidup lebih baik, mandiri dan sejahtera. Dari kepedulian tersebut maka muncul sebuah gagasan dengan membuat Yayasan Rumah Cerdas Yatim Piatu yang kami beri nama &rdquo;BAITI JANNATI&rdquo; (Rumahku Surgaku) dengan kegiatan utama yaitu Memberikan santunan setiap bulan kepada anak Yatim Piatu, Memberikan bimbingan pendidikan dan ketrampilan, Makan bersama dan kegiatan lainnya dengan anak yatim / piatu. Sehubungan dengan rencana tersebut maka diperlukan para Donatur baik dari Dalam desa maupun dari luar desa agar kegiatan yang kami rencanakan dapat berjalan dengan lancar sesuai yang diharapkan.</p><p>Yayasan ini bernama : YAYASAN RUMAH CERDAS YATIM PIATU BAITI JANNATI, selanjutnya dalam anggaran dasar ini disingkat Yayasan, yang berkedudukan di Dusun Bakalan 02 RT. 01 RW. 03 Desa Bakalan Kecamatan Bululawang Kabupaten Malang. Dalam perkembangannya, Yayasan dapat membuka kantor cabang atau perwakilan lain, baik didalam maupun diluar wilayah Republik Indonesia berdasarkan Keputusan Pengurus dengan Persetujuan Pembina.</p>', '<p>Ketika mulai didirikan dan memberikan santunan anak yatim untuk pertama kalinya pada tanggal 21 Januari 2018 ada 11 anak yatim / piatu yang menjadi prioritas penerima santunan dari Rumah Cerdas &rdquo;BAITI JANNATI&rdquo;, selanjutnya pada bulan ke-2 (18 Pebruari 2018) jumlah anak didik bertambah 3 menjadi 14 anak didik, dan pada santunan ke-3 (11 Maret 2018) jumlah anak didik bertambah 1 sehingga menjadi 15 anak didik. Pada santunan ke-4 (22 April 2018) jumlah anak didik menjadi 21 anak dan pada santunan ke-5 (13 Mei 2018) menjadi 31 anak didik dan mulai santunan ke-6 (2 Juni 2018) menjadi 33 anak didik, Santunan ke 8 menjadi 40 anak didik, santunan ke 10 sampai sekarang sudah berkembang 45 anak didik (per 22 Mei 2019)</p>', 'baju.jpg', '<ol><li><em><strong>&nbsp;Susu kedelai </strong></em></li><li><em><strong>&nbsp;Pecel uyun </strong></em></li><li><em><strong>&nbsp;Bu pri</strong></em></li></ol>', '<p>Dsn Bakalan 02 RT. 01 RW. 03 Desa Bakalan Kec. Bululawang Kab. Malang</p>', '08383229874', 'baitijannati@gmail.com', '<p>&quot;Adapun bila Tuhannya mengujinya lalu membatasi rezekinya maka dia berkata: &quot;Tuhanku menghinakanku&quot;. Sekali-kali tidak (demikian), sebenarnya kamu tidak memuliakan anak yatim&quot; (QS. al-Fajr : 16-17).</p>', '2021-04-21 02:32:35', '2021-04-28 04:19:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_donasi`
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
-- Dumping data untuk tabel `pengeluaran_donasi`
--

INSERT INTO `pengeluaran_donasi` (`id_pengeluaran`, `id_user`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(21, 4, 200000, '<p>Beli oleh-oleh buat menjenguk bayi Ketua Yayasan</p>', '2021-04-30 00:07:56', '2021-05-20 20:38:08'),
(26, 4, 500000, '<p>Zakat Maal dari Hamba Allah</p>', '2021-05-03 02:25:50', '2021-05-20 20:38:39'),
(27, 4, 200000, '<p>Takziyah Alhamarhum Hasan Basori dan Pak Mulyono</p>', '2021-05-03 03:22:52', '2021-05-20 20:36:58'),
(28, 4, 300000, '<p>Beli Semen Gresik untuk pembagunan panti</p>', '2021-05-03 03:23:03', '2021-05-20 20:33:56'),
(29, 4, 100000, '<p>Beli Bahan makanan untuk selamatan tadarus</p>', '2021-05-03 03:24:04', '2021-05-20 20:33:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_pengurus` varchar(128) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_user`, `id_jabatan`, `nama_pengurus`, `jenis_kelamin`, `no_telp`) VALUES
(2, 21, 1, 'Sandi Cahyadi', 'L', '08383229874'),
(5, 21, 6, 'Khoirul Warisin', 'L', '089765234123'),
(9, 21, 2, 'Mas\'udi Faris', 'L', '087654312345'),
(11, 21, 3, 'Ram Alif Pramana', 'L', '083832298748');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_log`
--

CREATE TABLE `tabel_log` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL DEFAULT current_timestamp(),
  `log_user` varchar(128) DEFAULT NULL,
  `log_tipe` varchar(10) DEFAULT NULL,
  `log_desc` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_log`
--

INSERT INTO `tabel_log` (`log_id`, `log_time`, `log_user`, `log_tipe`, `log_desc`) VALUES
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
(33, '2021-04-24 00:47:28', 'Superadmin', 'login', 'telah melakukan login'),
(34, '2021-04-24 12:26:25', 'Sandi Cahyadi', 'tambah', 'tambah kategori'),
(35, '2021-04-24 23:01:02', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(36, '2021-04-24 23:07:50', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(37, '2021-04-24 23:08:31', 'Sandi Cahyadi', 'tambah', 'tambah pemasukan non donasi'),
(38, '2021-04-25 00:17:45', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(39, '2021-04-25 00:21:55', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(40, '2021-04-25 00:25:26', 'Misbaqul ulum', 'tambah', 'tambah pengeluaran donasi'),
(41, '2021-04-25 00:29:44', 'Misbaqul ulum', 'tambah', 'tambah pemasukan non donasi'),
(42, '2021-04-25 22:42:58', 'Sandi Cahyadi', 'tambah', 'tambah pemasukan non donasi'),
(43, '2021-04-26 01:45:27', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(44, '2021-04-29 18:32:42', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(45, '2021-04-29 18:33:18', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(46, '2021-04-30 00:07:26', 'Sandi Cahyadi', 'tambah', 'tambah pemasukan non donasi'),
(47, '2021-04-30 00:07:56', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(48, '2021-04-30 00:08:51', 'Sandi Cahyadi', 'tambah', 'tambah pemasukan non donasi'),
(49, '2021-04-30 00:10:01', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(50, '2021-04-30 01:39:29', 'Sandi Cahyadi', 'hapus', 'hapus pengeluaran donasi'),
(51, '2021-04-30 05:39:46', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(52, '2021-05-03 02:25:50', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(53, '2021-05-03 02:26:44', 'Sandi Cahyadi', 'tambah', 'tambah pemasukan non donasi'),
(54, '2021-05-03 03:22:52', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(55, '2021-05-03 03:23:04', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(56, '2021-05-03 03:24:04', 'Sandi Cahyadi', 'tambah', 'tambah pengeluaran donasi'),
(57, '2021-05-20 20:33:18', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(58, '2021-05-20 20:33:56', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(59, '2021-05-20 20:36:58', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(60, '2021-05-20 20:37:20', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(61, '2021-05-20 20:38:08', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(62, '2021-05-20 20:38:39', 'Sandi Cahyadi', 'edit', 'edit pengeluaran donasi'),
(63, '2021-05-20 20:38:43', 'Sandi Cahyadi', 'hapus', 'hapus pengeluaran donasi'),
(64, '2021-05-20 20:41:09', 'Sandi Cahyadi', 'edit', 'edit pemasukan non donasi'),
(65, '2021-05-20 20:41:36', 'Sandi Cahyadi', 'edit', 'edit pemasukan non donasi'),
(66, '2021-05-20 20:41:49', 'Sandi Cahyadi', 'edit', 'edit pemasukan non donasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_donasi_tunai`
--

CREATE TABLE `transaksi_donasi_tunai` (
  `id_donasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_pengurus` int(11) NOT NULL,
  `tgl_donasi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_donasi_tunai`
--

INSERT INTO `transaksi_donasi_tunai` (`id_donasi`, `id_user`, `id_user_pengurus`, `tgl_donasi`) VALUES
(35, 5, 4, '2021-05-03 04:49:08'),
(40, 5, 4, '2020-06-03 05:58:39'),
(46, 5, 4, '2021-05-21 13:47:34'),
(47, 5, 4, '2021-05-21 13:49:18'),
(48, 5, 4, '2021-05-21 13:52:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_midtrans`
--

CREATE TABLE `transaksi_midtrans` (
  `order_id` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `transaction_time` varchar(20) NOT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `va_number` varchar(30) DEFAULT NULL,
  `bill_key` varchar(128) DEFAULT NULL,
  `biller_code` varchar(128) DEFAULT NULL,
  `pdf_url` varchar(512) DEFAULT NULL,
  `status_code` char(3) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_midtrans`
--

INSERT INTO `transaksi_midtrans` (`order_id`, `id_user`, `gross_amount`, `payment_type`, `transaction_time`, `bank`, `va_number`, `bill_key`, `biller_code`, `pdf_url`, `status_code`, `keterangan`) VALUES
(663333755, 5, 900000, 'bank_transfer', '2021-04-29 02:13:58', 'bca', '67788433842', '', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/068d197a-3763-4373-9209-aec44f4ab423/pdf', '200', ' aa'),
(983527393, 5, 100000, 'bank_transfer', '2021-05-20 20:47:29', 'bri', '677882764646901251', NULL, NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/ea796939-9daf-4ae9-8703-aef2ac685b8e/pdf', '201', 'Semoga Berkah '),
(1220785475, 5, 9000, 'bank_transfer', '2021-04-29 19:04:19', NULL, NULL, '', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/cafd181a-8f50-4995-be8e-89f45bda6fad/pdf', '201', ' aa'),
(1343753910, 5, 90000, 'bank_transfer', '2021-05-03 08:36:34', 'bni', '9886778842729467', NULL, NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/21aeff1e-338d-4d3c-9b6b-071940a47f40/pdf', '201', ' sadsa'),
(1913193508, 20, 10000, 'bank_transfer', '2021-04-20 14:22:10', 'bca', '67788421591', '', '', 'https://app.sandbox.midtrans.com/snap/v1/transactions/99b1dc47-761f-4f25-af73-19e9f198598b/pdf', '201', ' semoga berkah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id_tujuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `id_user`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 21, 'Donasi', '<p>Mencari dan mendapatkan Donatur Tetap maupun Tidak Tetap yang hasilnya akan diberikan sepenuhnya kepada anak yatim / piatu.</p>', '2021-04-26 02:17:50', '2021-04-26 03:08:16'),
(3, 21, 'Santunan Rutin', '<p>Memberikan santunan secara rutin perbulan kepada anak yatim/piatu</p>', '2021-04-26 02:53:15', NULL),
(4, 21, 'Bimbingan Pendidikan', '<p>Memberikan bimbingan pendidikan dan ketrampilan secara gratis kepada anak didik rumah cerdas ”BAITI JANNATI”</p>', '2021-04-26 02:54:31', NULL),
(5, 21, 'Biaya Pendidikan', '<p>Membantu biaya pendidikan dan perlengkapan sekolah anak didik mulai dari tingkat TK sampai dengan SMP / MTs.</p>', '2021-04-26 02:55:48', NULL),
(6, 21, 'Pendanaan', '<p>Mengadakan berbagai kegiatan yang dapat mendatangkan dana untuk selanjutnya diperuntukkan untuk anak yatim / piatu.</p>', '2021-04-26 02:56:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `role`, `is_active`, `date_created`, `last_login`) VALUES
(4, 'Sandi Cahyadi', 'andri@gmail.com', 'p_winandri.jpeg', '$2y$10$AmLssCT/Z4GPXEOaNPQbIuG5iWxASTHOMDjnH6x3LwapTqCkQQbTa', 'pengurus', 'aktif', 1604837683, '2021-05-21 06:25:33'),
(5, 'Hamba Allah', 'mamat@gmail.com', 'default.png', '$2y$10$y0ozTRDve45SeNN5cUpK0O9QwJRUvIzlQakv81xhU2h34ttCsKmLS', 'donatur', 'aktif', 1605162134, '2021-05-20 13:50:22'),
(20, 'Hamba Allah', 'winandrikusuma25@gmail.com', 'default.png', '$2y$10$7BL.cHlDH1GwmSv/gu2MLuL2AX54rpG0068VxPJHcQBdAZgmQLD2K', 'donatur', 'aktif', 1618902988, '2021-04-29 15:04:36'),
(21, 'Superadmin', 'superadmin@gmail.com', 'foto_fandi.jpg', '$2y$10$sEN1Lvbb0upbt9lKk5SXmeM.ACKeeG8wBE4ESuw0pTfVC2cajJpDC', 'admin', 'aktif', 1618934725, '2021-05-21 06:22:16'),
(26, 'Misbaqul ulum', '1234@gmail.com', 'default.png', '$2y$10$6ipPjRWEoo8ARReKRc7e5OU8kdn1ZaJgog44GpxI67KrmBnJ5Pv1.', 'pengurus', 'aktif', 1619119520, '2021-04-24 17:47:25'),
(28, 'Hamba Allah', 'muhammadmisbaqul2@gmail.com', 'default.png', '$2y$10$KNNijAGt5qhD7tO5fpG15uXfl3HnuRGn3eDj2JdLlsq4Yi2duALye', 'donatur', 'aktif', 1621565174, '2021-05-21 02:53:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
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
-- Indeks untuk tabel `anak_didik`
--
ALTER TABLE `anak_didik`
  ADD PRIMARY KEY (`id_anak_didik`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_pengurus` (`id_user`);

--
-- Indeks untuk tabel `cara_donasi`
--
ALTER TABLE `cara_donasi`
  ADD PRIMARY KEY (`id_cara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  ADD PRIMARY KEY (`id_detail_donasi`),
  ADD KEY `id_donasi` (`id_donasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_pengurus` (`id_user`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id _jabatan` (`id_jabatan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `id_user` (`id_user`,`id_user_pengurus`),
  ADD KEY `id_pengurus` (`id_user_pengurus`);

--
-- Indeks untuk tabel `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id_tujuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak_didik`
--
ALTER TABLE `anak_didik`
  MODIFY `id_anak_didik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cara_donasi`
--
ALTER TABLE `cara_donasi`
  MODIFY `id_cara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  MODIFY `id_detail_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tabel_log`
--
ALTER TABLE `tabel_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1937164313;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `anak_didik`
--
ALTER TABLE `anak_didik`
  ADD CONSTRAINT `anak_didik_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`);

--
-- Ketidakleluasaan untuk tabel `cara_donasi`
--
ALTER TABLE `cara_donasi`
  ADD CONSTRAINT `cara_donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `detail_donasi_tunai`
--
ALTER TABLE `detail_donasi_tunai`
  ADD CONSTRAINT `detail_donasi_tunai_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `transaksi_donasi_tunai` (`id_donasi`),
  ADD CONSTRAINT `detail_donasi_tunai_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemasukan_non_donasi`
--
ALTER TABLE `pemasukan_non_donasi`
  ADD CONSTRAINT `pemasukan_non_donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD CONSTRAINT `pengaturan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD CONSTRAINT `pengeluaran_donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `pengurus_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi_donasi_tunai`
--
ALTER TABLE `transaksi_donasi_tunai`
  ADD CONSTRAINT `transaksi_donasi_tunai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_donasi_tunai_ibfk_2` FOREIGN KEY (`id_user_pengurus`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `transaksi_midtrans`
--
ALTER TABLE `transaksi_midtrans`
  ADD CONSTRAINT `transaksi_midtrans_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD CONSTRAINT `tujuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
