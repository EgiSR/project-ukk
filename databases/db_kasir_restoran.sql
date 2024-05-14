-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2024 pada 15.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` bigint(20) NOT NULL,
  `nominal_uang` bigint(20) NOT NULL,
  `total_bayar` bigint(20) NOT NULL,
  `waktu_bayar` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daftar_menu`
--

CREATE TABLE `tb_daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `kategori` int(50) NOT NULL,
  `harga` int(40) NOT NULL,
  `stok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_menu`
--

CREATE TABLE `tb_kategori_menu` (
  `id_kategori` int(30) NOT NULL,
  `jenis_menu` int(1) NOT NULL,
  `kategori_menu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_menu`
--

INSERT INTO `tb_kategori_menu` (`id_kategori`, `jenis_menu`, `kategori_menu`) VALUES
(1, 1, 'Nasi'),
(2, 2, 'Air');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_list_order`
--

CREATE TABLE `tb_list_order` (
  `id_list_order` int(20) NOT NULL,
  `menu` int(20) NOT NULL,
  `order_mn` bigint(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` bigint(50) NOT NULL,
  `pelanggan` varchar(30) NOT NULL,
  `meja` int(30) NOT NULL,
  `pelayan` int(30) NOT NULL,
  `status_or` int(11) NOT NULL,
  `waktu_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `nohp` int(25) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
(1, 'adminin', 'admin', '$2y$10$QR9ZMkxc3SgcvKCowEklt.KvKORoeIqDG/G3LC1XI171VpKdV5FxG', 1, 812, 'surabaya'),
(4, 'dapur', 'dapur', '$2y$10$8WAG2oB4istzMPSfZMFYuurod4NH2ikj6UAOaNxHt2m/YP0qGxs4q', 4, 815, 'semarang'),
(7, 'pelayan', 'pelayan@gmail.com', '$2y$10$7pwp9HPGgkm2.Foc1BQB8Ov0jk9ngfHQU/NlAISWON4WtSmxVzLSa', 3, 83456789, ''),
(13, 'Kasir', 'kasir@gmail.com', '$2y$10$tgeKoMLTLW8KQYsRZLyQ0etS9IDTBGe7hb3HyBC7osoddGC5ZZUF6', 2, 8234567, 'singosari');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`kategori`);

--
-- Indeks untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD PRIMARY KEY (`id_list_order`),
  ADD KEY `fk3` (`menu`),
  ADD KEY `fk4` (`order_mn`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk2` (`pelayan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_menu`
--
ALTER TABLE `tb_kategori_menu`
  MODIFY `id_kategori` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_list_order`
--
ALTER TABLE `tb_list_order`
  MODIFY `id_list_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori_menu` (`id_kategori`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`order_mn`) REFERENCES `tb_order` (`id_order`);

--
-- Ketidakleluasaan untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
