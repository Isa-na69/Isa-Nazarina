-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2023 pada 15.30
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('34234324', 'Nazy', 'masyarakat', 'd9a8c6c010a37fdc9850fe6d8c064880', '08123871237'),
('6678544564', 'Reina', 'reichan', '81dc9bdb52d04dc20036dbd8313ed055', '08653435352'),
('6969', 'Hiyori Tomoe', 'burungduolingo', '0571749e2ac330a7455809c6b0e7af90', '089654362');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(5) NOT NULL,
  `tgl_pengaduan` varchar(20) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2023-02-02', '', '', 'noImage.png', 'selesai'),
(2, '2023-02-02', '', '12980', 'noImage.png', 'selesai'),
(3, '2023-02-03', '', 'batujaar jelek jir', '030220230933Capture1_11zon.jpg', 'selesai'),
(4, '2023-02-05', '', 'tes', 'noImage.png', 'selesai'),
(5, '2023-02-05', '', 'halo', 'noImage.png', 'selesai'),
(8, '2023-03-01', '6969', 'nni lkjiuhgtydete', 'noImage.png', 'selesai'),
(9, '2023-03-11', '6969', 'oyrftfkgjhlhyejjjjjj', 'noImage.png', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp_petugas` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp_petugas`, `level`) VALUES
(69, 'Nazy', 'Nana7', '7813d1590d28a7dd372ad54b5d29d033', '087566459', 'petugas'),
(317, 'Tigusa', 'tigusavoice', 'ochigu', '0865434567', 'admin'),
(318, 'kari', 'admin', '21232f297a57a5a743894a0e4a801fc3', '02348234', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(5) NOT NULL,
  `id_pengaduan` int(5) NOT NULL,
  `tgl_tanggapan` varchar(20) NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 1, '2023-02-02', 'iyah saya tar bener kan\r\n', 3),
(2, 2, '2023-02-02', 'ya\r\n', 3),
(3, 4, '2023-02-05', 'yooo\r\n', 3),
(4, 5, '2023-02-05', '', 3),
(5, 3, '2023-02-05', '', 3),
(6, 8, '2023-03-08', 'oh aja si', 69);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
