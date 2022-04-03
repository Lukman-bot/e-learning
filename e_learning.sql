-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2022 pada 20.06
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akses`
--

CREATE TABLE `tbl_akses` (
  `id_akses` int(11) NOT NULL,
  `ket` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_akses`
--

INSERT INTO `tbl_akses` (`id_akses`, `ket`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `unsername` varchar(100) NOT NULL,
  `panseword` text NOT NULL,
  `id_akses` int(11) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama`, `unsername`, `panseword`, `id_akses`, `tempat_lahir`, `tgl_lahir`) VALUES
(1, 'Lukman Aditiya Anggara', 'lukman', '$2y$10$8QETBRkZXQsoYTTevPkvLuwqGt7YKz05rb9kMuzyG1Wz4y.pSFTXe', 1, 'Bekasi', '2004-04-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tapel` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `id_tapel`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(5, 5, 'X RPL 1', '2022-04-03 17:59:34', NULL),
(6, 5, 'X RPL 2', '2022-04-03 17:59:41', NULL),
(7, 5, 'X RPL 3', '2022-04-03 17:59:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` int(11) NOT NULL,
  `deskripsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel_kelas_guru_group`
--

CREATE TABLE `tbl_mapel_kelas_guru_group` (
  `id_group` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id_materi` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tapel`
--

CREATE TABLE `tbl_tapel` (
  `id_tapel` int(11) NOT NULL,
  `nama_tapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tapel`
--

INSERT INTO `tbl_tapel` (`id_tapel`, `nama_tapel`) VALUES
(5, '2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `panseword1` varchar(255) NOT NULL,
  `panseword2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_kelas`, `username`, `nama_siswa`, `panseword1`, `panseword2`) VALUES
(4, 7, '123456789', 'Lukman Aditiya', '$2y$10$jJAbwsLm/KaY83SKSP9E0ueuqyoTz7b19t9l0CSXoWAPh.CP0FyJy', 'lukman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akses`
--
ALTER TABLE `tbl_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_tapel` (`id_tapel`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_mapel_kelas_guru_group`
--
ALTER TABLE `tbl_mapel_kelas_guru_group`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `tbl_tapel`
--
ALTER TABLE `tbl_tapel`
  ADD PRIMARY KEY (`id_tapel`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akses`
--
ALTER TABLE `tbl_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel_kelas_guru_group`
--
ALTER TABLE `tbl_mapel_kelas_guru_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tapel`
--
ALTER TABLE `tbl_tapel`
  MODIFY `id_tapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
