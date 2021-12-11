-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2021 pada 16.05
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasilitaskampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `fasilitas_id` int(11) NOT NULL,
  `kategori_id` varchar(45) DEFAULT NULL,
  `nama_fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`fasilitas_id`, `kategori_id`, `nama_fasilitas`, `deskripsi`, `gambar`, `created_on`) VALUES
(1, '1', 'Kelas A - Gedung C', 'Kelas A', '129fd523c9385bafcf22e0166ddb05cc.jpg', '2021-06-15 11:54:32'),
(15, '2', 'Lecture Hall', '<p>Lecture Hall<br></p>', '30a0f468f141c06209300b76c090e3ae.jpg', '2021-07-16 15:24:54'),
(16, '6', 'Lab Game Development', '<p>Lab Informatika</p>', '0a68ba8ef212daa1a12076b773fe92bf.jpg', '2021-12-05 20:16:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Kelas'),
(2, 'Gedung'),
(6, 'Laboratorium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(11) NOT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `fasilitas_id` varchar(45) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggalsampai` date NOT NULL,
  `status` enum('1','0','2','3') DEFAULT '0' COMMENT '2 kembali',
  `keteranganditolak` text NOT NULL,
  `bukti` text DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `waktupinjam` int(100) NOT NULL,
  `deskripsikegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `user_id`, `fasilitas_id`, `tanggal`, `tanggalsampai`, `status`, `keteranganditolak`, `bukti`, `created_on`, `waktupinjam`, `deskripsikegiatan`) VALUES
(55, '3', '1', '2021-12-03', '2021-12-08', '1', '', '44cccbe7c3fdbf22bf410d6587429bb5.jpg', '2021-12-05 18:13:10', 1638702790, 'Untuk mengerjakan projek kelompok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `nama_lengkap` varchar(60) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` text NOT NULL,
  `notelp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `level` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `password`, `nama_lengkap`, `username`, `email`, `notelp`, `alamat`, `level`) VALUES
(1, 'admin', 'Administrator', 'admin', 'admin@gmail.com', '08123456789', 'Jl. Alam Sutera', 'Admin'),
(2, 'manajemen', 'Manajemen', 'manajemen', 'manajemen@gmail.com', '082211434556', 'Jl. Gading Serpong', 'Manajemen'),
(3, 'jovan123', 'Jovan Haliem', 'jovan', 'jovanhaliem@gmail.com', '082298778818', 'Jl. Tigaraksa', 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`fasilitas_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `fasilitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
