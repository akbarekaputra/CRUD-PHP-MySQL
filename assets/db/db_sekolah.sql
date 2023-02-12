-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2023 pada 14.43
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `foto_siswa` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `foto_siswa`, `alamat`) VALUES
(9, '123456789', 'Akbar Eka Putra', 'Laki-laki', '123456789AkbarEkaPutra.jpg', 'JL. Pesona Anggrek Harapan'),
(10, '135798642', 'Gilang Aditya Putra', 'Laki-laki', '135798642GilangAdityaPutra.jpg', 'JL. Harapan Jaya'),
(11, '246897531', 'Eko Wiyanto', 'Laki-laki', '246897531EkoWiyanto.jpg', 'JL. Harapan Indah'),
(12, '112233445', 'Sri Hartati', 'Perempuan', '112233445SriHartati.jpg', 'JL. Summarecon'),
(52, '119944558', 'Budiyanto Hartono', 'Laki-laki', '119944558BudiyantoHartono.jpg', 'JL. Indah Kencana'),
(53, '135726489', 'Virginia Az-Zahra ', 'Perempuan', '135726489VirginiaAz-Zahra.webp', 'JL. Ahman Yani'),
(54, '142375689', 'Yanto Harjo', 'Laki-laki', '142375689YantoHarjo.webp', 'JL. Setia Budi'),
(58, '192647381', 'Alexander', 'Laki-laki', '192647381Alexander.jpg', 'Jl. Ayu Dewi'),
(59, '108325671', 'Dimas YP', 'Laki-laki', '108325671DimasYP.png', 'JL. Harapan Kita'),
(60, '213494851', 'putra desman', 'Laki-laki', '213494851putradesman.jpg', 'JL. Swadia IV'),
(61, '103927172', 'Aprilian Dwi', 'Perempuan', '103927172AprilianDwi.png', 'JL. Harapan Juanda'),
(62, '193827319', 'hilal najib', 'Laki-laki', '193827319hilalnajib.jpg', 'JL. Duta Harapan'),
(63, '182192836', 'Ghatfan ', 'Laki-laki', '182192836Ghatfan.jpg', 'JL. Wisma Asri');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
