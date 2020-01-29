-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2020 pada 02.39
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krs_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_makul` int(11) NOT NULL,
  `nama_makul` text NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `prodi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_makul`, `nama_makul`, `sks`, `semester`, `prodi`) VALUES
(1, 'Pemrograman Web Lanjut', 4, 5, 'Teknik Informatika'),
(4, 'Rekayasa Perangkat Lunak', 4, 5, 'Teknik Informatika'),
(5, 'E Commerce', 4, 5, 'Teknik Informatika'),
(6, 'Dasar Pemrograman', 4, 3, 'Teknik Informatika'),
(8, 'Sistem Digital', 4, 1, 'Teknik Informatika'),
(9, 'Algoritma dan Pemrograman', 4, 1, 'Teknik Informatika'),
(10, 'Struktur Data', 2, 2, 'Teknik Informatika'),
(11, 'Statistika dan Probablitisas', 3, 2, 'Teknik Informatika'),
(12, 'Metode Numerik', 3, 4, 'Teknik Informatika'),
(13, 'Aplikasi Teknologi Online', 2, 4, 'Teknik Informatika'),
(14, 'Metodologi Penelitian', 2, 6, 'Teknik Informatika'),
(15, 'Aplikasi Kompitasi Bergerak', 2, 6, 'Teknik Informatika'),
(16, 'Kerja Praktek', 2, 7, 'Teknik Informatika'),
(17, 'Proposal dan Seminar Tugas Akhir', 2, 7, 'Teknik Informatika'),
(18, 'Kepribadian dan Komunikasi', 2, 8, 'Teknik Informatika'),
(19, 'Skripsi', 2, 8, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengambilan`
--

CREATE TABLE `pengambilan` (
  `id_pengambilan` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_makul` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengambilan`
--

INSERT INTO `pengambilan` (`id_pengambilan`, `nim`, `id_makul`, `status`) VALUES
(17, 20117034, 14, 'acc'),
(18, 20117034, 15, 'acc'),
(19, 20117031, 1, 'acc'),
(20, 20117031, 4, 'acc'),
(21, 20117031, 5, 'acc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nim`, `nama`, `password`, `status`) VALUES
(20117031, 'Muhammad Saifullah', '12345', 3),
(20117034, 'Hilmi Mubarok', '123', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_makul`);

--
-- Indeks untuk tabel `pengambilan`
--
ALTER TABLE `pengambilan`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_makul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pengambilan`
--
ALTER TABLE `pengambilan`
  MODIFY `id_pengambilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
