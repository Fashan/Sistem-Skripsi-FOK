-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jan 2022 pada 09.23
-- Versi server: 10.5.12-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18184722_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `pembimbing_1` varchar(50) DEFAULT NULL,
  `pembimbing_2` varchar(50) DEFAULT NULL,
  `penguji_1` varchar(50) DEFAULT NULL,
  `penguji_2` varchar(50) DEFAULT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `mahasiswa_id`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`, `jenis_kegiatan`) VALUES
(2, 53, 'hadir', 'hadir', 'hadir', 'belum', 'seminar proposal'),
(3, 53, 'hadir', 'hadir', 'hadir', 'belum', 'sidang skripsi'),
(4, 54, 'hadir', 'hadir', 'hadir', 'belum', 'seminar proposal'),
(5, 54, 'hadir', 'hadir', 'belum', 'hadir', 'sidang skripsi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan_proposal`
--

CREATE TABLE `bimbingan_proposal` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(11) NOT NULL,
  `dosen_id` bigint(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bimbingan` text NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimbingan_proposal`
--

INSERT INTO `bimbingan_proposal` (`id`, `mahasiswa_id`, `dosen_id`, `tanggal`, `bimbingan`, `status`, `role_id`, `file`) VALUES
(141, 53, 47, '2022-01-11', 'bimbingan 1', '', 1, 'Iji_Format_AR_Musium_new.docx'),
(142, 54, 47, '2022-01-23', 'bab 1', NULL, 1, 'Iji_Format_AR_Musium_new1.docx'),
(143, 54, 48, '2022-01-23', 'proposal', NULL, 2, 'Iji_Format_AR_Musium_(1).docx'),
(144, 54, 49, '2022-01-23', 'revisi 1', NULL, 1, 'Iji_Format_AR_Musium_new.docx'),
(145, 54, 50, '2022-01-23', 'revisi 1', NULL, 1, 'Iji_Format_AR_Musium_new.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan_skripsi`
--

CREATE TABLE `bimbingan_skripsi` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(11) NOT NULL,
  `dosen_id` bigint(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bimbingan` text NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimbingan_skripsi`
--

INSERT INTO `bimbingan_skripsi` (`id`, `mahasiswa_id`, `dosen_id`, `tanggal`, `bimbingan`, `status`, `role_id`, `file`) VALUES
(69, 54, 47, '2022-01-23', 'bab 1', NULL, 1, 'Iji_Format_AR_Musium_new2.docx'),
(70, 54, 48, '2022-01-23', 'bab 1', NULL, 2, 'Iji_Format_AR_Musium_new.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `mahasiswa_id` bigint(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `tanggal`, `mahasiswa_id`, `keterangan`, `status`) VALUES
(43, '2022-01-05 5:14 PM', 53, 'seminar proposal', 'selesai'),
(46, '2022-1-06 7:16 AM', 53, 'sidang skripsi', 'selesai'),
(47, '2022-01-05 12:25 PM', 53, 'yudisium', 'akan berlangsung'),
(48, '2022-1-06 3:56 PM', 54, 'seminar proposal', 'selesai'),
(49, '2022-1-08 4:25 PM', 54, 'sidang skripsi', 'selesai'),
(50, '2022-1-08 5:20 PM', 54, 'yudisium', 'akan berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ide_skripsi`
--

CREATE TABLE `ide_skripsi` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `abstrak` text NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `mahasiswa_id` bigint(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `bukti` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ide_skripsi`
--

INSERT INTO `ide_skripsi` (`id`, `judul`, `abstrak`, `file`, `mahasiswa_id`, `status`, `catatan`, `bukti`) VALUES
(32, 'Tuliskan Judul Skripsi Disini', 'papakan abstrak', 'bab1_1815051077.pdf', 53, 'ACC', '', 'bukti_1815051077.pdf'),
(33, 'sebuah judul', 'abstrak disini', 'example1.pdf', 54, 'ACC', '', 'example.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`) VALUES
(2, 'Pendidikan Jasmani, Kesehatan dan Rekreasi'),
(4, 'Pendidikan Kepelatihan Olahraga'),
(5, 'Ilmu Keolahragaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `moderator`
--

CREATE TABLE `moderator` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `moderator`
--

INSERT INTO `moderator` (`id`, `mahasiswa_id`, `nama`, `nim`) VALUES
(7, 53, 'mahasiswa2', '1815051078'),
(8, 54, 'mahasiswa3', '1815051079');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_proposal`
--

CREATE TABLE `nilai_proposal` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `pembimbing_1` float DEFAULT NULL,
  `pembimbing_2` float DEFAULT NULL,
  `penguji_1` float DEFAULT NULL,
  `penguji_2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_proposal`
--

INSERT INTO `nilai_proposal` (`id`, `mahasiswa_id`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`) VALUES
(12, 53, 80, 82.5, 88.5, NULL),
(17, 54, 80, 90, 90, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_skripsi`
--

CREATE TABLE `nilai_skripsi` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `pembimbing_1` varchar(10) DEFAULT NULL,
  `pembimbing_2` varchar(10) DEFAULT NULL,
  `penguji_1` varchar(10) DEFAULT NULL,
  `penguji_2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_skripsi`
--

INSERT INTO `nilai_skripsi` (`id`, `mahasiswa_id`, `pembimbing_1`, `pembimbing_2`, `penguji_1`, `penguji_2`) VALUES
(27, 53, '80', '90', '90', NULL),
(28, 54, '80', '90', NULL, '90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` int(11) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembimbing`
--

INSERT INTO `pembimbing` (`id`, `dosen_id`, `mahasiswa_id`, `role_id`, `status`) VALUES
(99, 47, 53, 4, 'sudah'),
(100, 48, 53, 6, 'sudah'),
(109, 49, 53, 14, 'sudah'),
(110, 50, 53, 15, 'sudah'),
(111, 47, 54, 4, 'sudah'),
(112, 48, 54, 6, 'sudah'),
(113, 49, 54, 14, 'sudah'),
(114, 50, 54, 15, 'sudah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasyarat_proposal`
--

CREATE TABLE `prasyarat_proposal` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `file_proposal` varchar(50) NOT NULL,
  `file_kdn` varchar(50) NOT NULL,
  `file_kartubimbingan` varchar(50) NOT NULL,
  `file_khs` varchar(50) NOT NULL,
  `status_fileproposal` varchar(50) DEFAULT NULL,
  `status_filekdn` varchar(50) DEFAULT NULL,
  `status_filekartubimbingan` varchar(50) DEFAULT NULL,
  `status_filekhs` varchar(50) DEFAULT NULL,
  `status_prasyarat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prasyarat_proposal`
--

INSERT INTO `prasyarat_proposal` (`id`, `mahasiswa_id`, `file_proposal`, `file_kdn`, `file_kartubimbingan`, `file_khs`, `status_fileproposal`, `status_filekdn`, `status_filekartubimbingan`, `status_filekhs`, `status_prasyarat`) VALUES
(5, 53, 'example.pdf', 'example1.pdf', 'example2.pdf', 'example3.pdf', 'check', 'check', 'check', 'check', 'diterima'),
(7, 54, 'example.pdf', 'example1.pdf', 'example2.pdf', 'example3.pdf', 'check', 'check', 'check', 'check', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasyarat_skripsi`
--

CREATE TABLE `prasyarat_skripsi` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `file_transkipnilai` varchar(50) DEFAULT NULL,
  `file_biodatafoto` varchar(50) DEFAULT NULL,
  `file_suratlab` varchar(50) DEFAULT NULL,
  `file_bebaspiutang` varchar(50) DEFAULT NULL,
  `file_surattugas` varchar(50) DEFAULT NULL,
  `file_coverskripsi` varchar(50) DEFAULT NULL,
  `file_kartubimbingan` varchar(50) DEFAULT NULL,
  `file_piagam` varchar(50) DEFAULT NULL,
  `file_buktisumbangan` varchar(50) DEFAULT NULL,
  `file_skripsi` varchar(50) DEFAULT NULL,
  `file_buktiartikel` varchar(50) DEFAULT NULL,
  `status_transkipnilai` varchar(50) DEFAULT NULL,
  `status_biodatafoto` varchar(50) DEFAULT NULL,
  `status_suratlab` varchar(50) DEFAULT NULL,
  `status_bebaspiutang` varchar(50) DEFAULT NULL,
  `status_surattugas` varchar(50) DEFAULT NULL,
  `status_coverskripsi` varchar(50) DEFAULT NULL,
  `status_kartubimbingan` varchar(50) DEFAULT NULL,
  `status_piagam` varchar(50) DEFAULT NULL,
  `status_buktisumbangan` varchar(50) DEFAULT NULL,
  `status_fileskripsi` varchar(50) DEFAULT NULL,
  `status_buktiartikel` varchar(50) DEFAULT NULL,
  `status_prasyarat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prasyarat_skripsi`
--

INSERT INTO `prasyarat_skripsi` (`id`, `mahasiswa_id`, `file_transkipnilai`, `file_biodatafoto`, `file_suratlab`, `file_bebaspiutang`, `file_surattugas`, `file_coverskripsi`, `file_kartubimbingan`, `file_piagam`, `file_buktisumbangan`, `file_skripsi`, `file_buktiartikel`, `status_transkipnilai`, `status_biodatafoto`, `status_suratlab`, `status_bebaspiutang`, `status_surattugas`, `status_coverskripsi`, `status_kartubimbingan`, `status_piagam`, `status_buktisumbangan`, `status_fileskripsi`, `status_buktiartikel`, `status_prasyarat`) VALUES
(23, 53, 'example.pdf', 'example1.pdf', 'example3.pdf', 'example4.pdf', 'example5.pdf', 'example6.pdf', 'example2.pdf', 'example7.pdf', 'example8.pdf', 'example9.pdf', 'example10.pdf', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'diterima'),
(24, 54, 'example.pdf', 'example1.pdf', 'example3.pdf', 'example4.pdf', 'example5.pdf', 'example6.pdf', 'example2.pdf', 'example7.pdf', 'example8.pdf', 'example9.pdf', 'example10.pdf', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'check', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasyarat_yudisium`
--

CREATE TABLE `prasyarat_yudisium` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `file_buktirevisi` varchar(50) DEFAULT NULL,
  `file_buktipublikasi` varchar(50) DEFAULT NULL,
  `status_buktirevisi` varchar(50) DEFAULT NULL,
  `status_buktipublikasi` varchar(50) DEFAULT NULL,
  `status_prasyarat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prasyarat_yudisium`
--

INSERT INTO `prasyarat_yudisium` (`id`, `mahasiswa_id`, `file_buktirevisi`, `file_buktipublikasi`, `status_buktirevisi`, `status_buktipublikasi`, `status_prasyarat`) VALUES
(1, 53, 'example.pdf', 'example1.pdf', 'check', 'check', 'diterima'),
(2, 54, 'example.pdf', 'example1.pdf', 'check', 'check', 'diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`) VALUES
(1, 'Ilmu Olahraga dan Kesehatan'),
(3, 'Pendidikan Olahraga'),
(6, 'Pendidikan Kepelatihan Olahraga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `abstrak` text NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `status_p1` varchar(50) DEFAULT NULL,
  `status_p2` varchar(50) DEFAULT NULL,
  `status_pnj1` varchar(20) NOT NULL,
  `status_pnj2` varchar(20) NOT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id`, `mahasiswa_id`, `judul`, `abstrak`, `file`, `status_p1`, `status_p2`, `status_pnj1`, `status_pnj2`, `catatan`) VALUES
(17, 53, 'Tuliskan Judul Skripsi Disini', 'papakan abstrak', NULL, 'ACC', 'ACC', 'ACC', 'belum ACC', 'lulus dengan tanpa revisi'),
(18, 54, 'sebuah judul', 'abstrak disini', 'example.pdf', 'ACC', 'ACC', 'ACC', 'belum ACC', 'lulus dengan tanpa revisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'mahasiswa'),
(2, 'dosen'),
(3, 'Pembimbing 1 Proposal'),
(4, 'Pembimbing 1 Skripsi/TA'),
(5, 'Pembimbing 2 Proposal'),
(6, 'Pembimbing 2 Skripsi/TA'),
(7, 'admin'),
(8, 'kajur'),
(10, 'kaprodi'),
(11, 'PA'),
(12, 'Penguji 1 Proposal'),
(13, 'Penguji 2 Proposal'),
(14, 'Penguji 1 Skripsi/TA'),
(15, 'Penguji 2 Skripsi/TA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `abstrak` text NOT NULL,
  `file` varchar(50) DEFAULT NULL,
  `status_pem1` varchar(10) DEFAULT NULL,
  `status_pem2` varchar(10) DEFAULT NULL,
  `status_pnj1` varchar(10) DEFAULT NULL,
  `status_pnj2` varchar(10) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`id`, `mahasiswa_id`, `judul`, `abstrak`, `file`, `status_pem1`, `status_pem2`, `status_pnj1`, `status_pnj2`, `catatan`) VALUES
(19, 53, 'Tuliskan Judul Skripsi Disini', 'papakan abstrak', NULL, 'ACC', 'ACC', 'ACC', 'belum ACC', 'lulus dengan revisi'),
(20, 54, 'sebuah judul', 'abstrak disini', 'example.pdf', 'ACC', 'ACC', 'belum ACC', 'ACC', 'lulus dengan tanpa revisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `prodi_id`, `jurusan_id`, `username`, `nama`, `email`, `password`, `avatar`, `role_id`, `pa_id`, `status`) VALUES
(14, 3, 2, '1815051070', 'Fashan Saraya', 'fashan@undiksha.ac.id', '$2y$10$Ekfw4B/9gyFXZ8UEUmEQtubjXc5kd2zSERc0dOolzyxSAKNQ761aW', NULL, 7, NULL, NULL),
(47, 1, 5, '1815051071', 'dosen1', 'dosen1@gmail.com', '$2y$10$O4Yeon/AVgPFjdxoSb800eH7KPygWDGR/HjlhMGdbeoPQQhHBYIP.', NULL, 2, NULL, NULL),
(48, 1, 5, '1815051072', 'dosen2', 'dosen2@gmail.com', '$2y$10$2IrPfflhdGsY58b.1xmByeVjgCM.2hgkKg9BVBh2LOXomTni4S/MC', NULL, 2, NULL, NULL),
(49, 1, 5, '1815051073', 'dosen3', 'dosen3@gmail.com', '$2y$10$IQg60w19gWzxkmIkvFGSwOaKBn.SgvmdDOPVaNXxD1M5PtZL8iwAy', NULL, 2, NULL, NULL),
(50, 1, 5, '1815051074', 'dosen4', 'dosen4@gmail.com', '$2y$10$0fvsOywaEPn3BzLYZ6cX9.bU6V.4oplxSf2xYVsxj/yz3cJPNxjCa', NULL, 2, NULL, NULL),
(51, 1, 5, '1815051075', 'korprodi1', 'kaprodi1@gmail.com', '$2y$10$OJhENHJN0f/ycY6QFvgu8e4tuPKIYH22H0IxdVwhHb8d8WE0LTJUW', NULL, 10, NULL, NULL),
(52, 1, 5, '1815051076', 'pa1', 'pa1@gmail.com', '$2y$10$NYAawj3T6dGeDIREXjKQI.8aV.ClnyKNArlZEefRcuiug/hxx4mDy', NULL, 11, NULL, NULL),
(53, 1, 5, '1815051077', 'mahasiswa1', 'mahasiswa1@gmail.com', '$2y$10$iMjTsdmqNe8Op0We462RSeO8KFGAsci0C8Z8LkrLj0ev41.JHfIq.', 'ec78aec375ac29222ff24429c5cc1b45.PNG', 1, 52, 'yudisium'),
(54, 1, 2, '1815051078', 'mahasiswa2', 'mahasiswa2@gmail.com', '$2y$10$vPg4bl8pMFgUzAaflPC7MO5LOHYQw3vKODa7mHr6DICGP3YtOpT/G', NULL, 1, 52, 'yudisium');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bimbingan_proposal`
--
ALTER TABLE `bimbingan_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bimbingan_proposal_ibfk_1` (`mahasiswa_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `bimbingan_skripsi`
--
ALTER TABLE `bimbingan_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bimbingan_skripsi_ibfk_1` (`mahasiswa_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `ide_skripsi`
--
ALTER TABLE `ide_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moderator_ibfk_1` (`mahasiswa_id`);

--
-- Indeks untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `nilai_skripsi`
--
ALTER TABLE `nilai_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `role` (`role_id`);

--
-- Indeks untuk tabel `prasyarat_proposal`
--
ALTER TABLE `prasyarat_proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `prasyarat_skripsi`
--
ALTER TABLE `prasyarat_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `prasyarat_yudisium`
--
ALTER TABLE `prasyarat_yudisium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role_id`),
  ADD KEY `prodi_id` (`prodi_id`),
  ADD KEY `users_ibfk_3` (`jurusan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bimbingan_proposal`
--
ALTER TABLE `bimbingan_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT untuk tabel `bimbingan_skripsi`
--
ALTER TABLE `bimbingan_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `ide_skripsi`
--
ALTER TABLE `ide_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `moderator`
--
ALTER TABLE `moderator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `nilai_skripsi`
--
ALTER TABLE `nilai_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `prasyarat_proposal`
--
ALTER TABLE `prasyarat_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `prasyarat_skripsi`
--
ALTER TABLE `prasyarat_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `prasyarat_yudisium`
--
ALTER TABLE `prasyarat_yudisium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bimbingan_proposal`
--
ALTER TABLE `bimbingan_proposal`
  ADD CONSTRAINT `bimbingan_proposal_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_proposal_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bimbingan_skripsi`
--
ALTER TABLE `bimbingan_skripsi`
  ADD CONSTRAINT `bimbingan_skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bimbingan_skripsi_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ide_skripsi`
--
ALTER TABLE `ide_skripsi`
  ADD CONSTRAINT `ide_skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `moderator`
--
ALTER TABLE `moderator`
  ADD CONSTRAINT `moderator_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_proposal`
--
ALTER TABLE `nilai_proposal`
  ADD CONSTRAINT `nilai_proposal_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_skripsi`
--
ALTER TABLE `nilai_skripsi`
  ADD CONSTRAINT `nilai_skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembimbing_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembimbing_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prasyarat_proposal`
--
ALTER TABLE `prasyarat_proposal`
  ADD CONSTRAINT `prasyarat_proposal_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prasyarat_skripsi`
--
ALTER TABLE `prasyarat_skripsi`
  ADD CONSTRAINT `prasyarat_skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prasyarat_yudisium`
--
ALTER TABLE `prasyarat_yudisium`
  ADD CONSTRAINT `prasyarat_yudisium_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
