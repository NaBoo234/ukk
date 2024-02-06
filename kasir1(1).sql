-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2024 pada 10.59
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
-- Database: `kasir1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_detailpenjualan`
--

CREATE TABLE `kasir_detailpenjualan` (
  `detailID` int(11) NOT NULL,
  `penjualanID` int(11) NOT NULL,
  `produkID` int(11) NOT NULL,
  `jumlahproduk` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_detailpenjualan`
--

INSERT INTO `kasir_detailpenjualan` (`detailID`, `penjualanID`, `produkID`, `jumlahproduk`, `subtotal`) VALUES
(1, 7, 17, 0, '3.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_pelanggan`
--

CREATE TABLE `kasir_pelanggan` (
  `pelangganID` int(11) NOT NULL,
  `namapelanggan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomortelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_pelanggan`
--

INSERT INTO `kasir_pelanggan` (`pelangganID`, `namapelanggan`, `alamat`, `nomortelepon`) VALUES
(3, 'budi', 'pekanbaru', '065846514653');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_penjualan`
--

CREATE TABLE `kasir_penjualan` (
  `penjualanID` int(11) NOT NULL,
  `tanggalpenjualan` date NOT NULL,
  `totalharga` decimal(10,2) NOT NULL,
  `pelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_penjualan`
--

INSERT INTO `kasir_penjualan` (`penjualanID`, `tanggalpenjualan`, `totalharga`, `pelangganID`) VALUES
(3, '2000-02-02', '12000.00', 1),
(4, '2024-02-04', '100000.00', 3),
(5, '2024-02-04', '100000.00', 3),
(6, '2024-02-04', '100000.00', 3),
(7, '2024-02-04', '100000.00', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir_produk`
--

CREATE TABLE `kasir_produk` (
  `produkID` int(11) NOT NULL,
  `namaproduk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir_produk`
--

INSERT INTO `kasir_produk` (`produkID`, `namaproduk`, `harga`, `stok`) VALUES
(17, 'Aqua', '10000.00', 52),
(18, 'Teh Pucuk', '6000.00', 97),
(19, 'Pena', '2000.00', 9),
(20, 'permen', '10000.00', 3),
(21, 'taro', '5000.00', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `namapetugas` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userID`, `namapetugas`, `username`, `password`, `role`) VALUES
(40, '', 'padil', '$2y$10$2AeW2/qx2RVbJXjtRzTqRetEEKEbDDx2bFjcDv3sIlSPjwy6.m9/2', '2'),
(42, '', 'ryan', '$2y$10$3KVQxKjDTAd/m5kKVCD6E.9F/HVz9g.8VlC8PYJAHg/pzRvcpH9WG', '2'),
(43, '', 'fattan', '$2y$10$K4FG0Om4BtOQVw2e3GzfFO..uqpLyWcllQ4RbYJbPlggQffnyKzKa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kasir_detailpenjualan`
--
ALTER TABLE `kasir_detailpenjualan`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `penjualanID` (`penjualanID`);

--
-- Indeks untuk tabel `kasir_pelanggan`
--
ALTER TABLE `kasir_pelanggan`
  ADD PRIMARY KEY (`pelangganID`);

--
-- Indeks untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  ADD PRIMARY KEY (`penjualanID`);

--
-- Indeks untuk tabel `kasir_produk`
--
ALTER TABLE `kasir_produk`
  ADD PRIMARY KEY (`produkID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kasir_detailpenjualan`
--
ALTER TABLE `kasir_detailpenjualan`
  MODIFY `detailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kasir_pelanggan`
--
ALTER TABLE `kasir_pelanggan`
  MODIFY `pelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kasir_penjualan`
--
ALTER TABLE `kasir_penjualan`
  MODIFY `penjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kasir_produk`
--
ALTER TABLE `kasir_produk`
  MODIFY `produkID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kasir_detailpenjualan`
--
ALTER TABLE `kasir_detailpenjualan`
  ADD CONSTRAINT `kasir_detailpenjualan_ibfk_1` FOREIGN KEY (`penjualanID`) REFERENCES `kasir_penjualan` (`penjualanID`);

--
-- Ketidakleluasaan untuk tabel `kasir_pelanggan`
--
ALTER TABLE `kasir_pelanggan`
  ADD CONSTRAINT `kasir_pelanggan_ibfk_1` FOREIGN KEY (`pelangganID`) REFERENCES `kasir_penjualan` (`penjualanID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
