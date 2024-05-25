-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Bulan Mei 2024 pada 04.46
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock sparepart motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabeljenis_barang`
--

CREATE TABLE `tabeljenis_barang` (
  `kodejenis` int NOT NULL,
  `namajenis` varchar(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tabeljenis_barang`
--

INSERT INTO `tabeljenis_barang` (`kodejenis`, `namajenis`, `keterangan`) VALUES
(8, 'baut', 'titanium'),
(5672, 'spion', 'bekas'),
(14562, 'knalpot', 'baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `kodebarang` int NOT NULL,
  `barcode` int NOT NULL,
  `nama_barang` int NOT NULL,
  `harga_jual` int NOT NULL,
  `harga_beli` int NOT NULL,
  `diskon` int NOT NULL,
  `kodejenis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_beli`
--

CREATE TABLE `tabel_beli` (
  `nomorbeli` int NOT NULL,
  `tanggal` date NOT NULL,
  `cara_pembayaran` enum('tranfer','cash') NOT NULL,
  `statusbayar` enum('berhasil','belum') NOT NULL,
  `diskon` int NOT NULL,
  `kodesupply` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_jual`
--

CREATE TABLE `tabel_jual` (
  `nomorjual` int NOT NULL,
  `tanggal` date NOT NULL,
  `carapembayaran` enum('transfer','cash') NOT NULL,
  `statusbayar` enum('berhasil','tidak') NOT NULL,
  `diskon` int NOT NULL,
  `kodepelanggan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `kodepelanggan` int NOT NULL,
  `namapelanggan` varchar(20) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `notelp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_suppliyer`
--

CREATE TABLE `tabel_suppliyer` (
  `kodesupply` int NOT NULL,
  `kodebarang` int NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `notelp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabledetail_beli`
--

CREATE TABLE `tabledetail_beli` (
  `nomorbeli` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL,
  `diskon` int NOT NULL,
  `kodebarang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabledetail_jual`
--

CREATE TABLE `tabledetail_jual` (
  `nomorjual` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL,
  `diskon` int NOT NULL,
  `kodebarang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabeljenis_barang`
--
ALTER TABLE `tabeljenis_barang`
  ADD PRIMARY KEY (`kodejenis`);

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`kodebarang`),
  ADD KEY `kodejenis` (`kodejenis`);

--
-- Indeks untuk tabel `tabel_beli`
--
ALTER TABLE `tabel_beli`
  ADD PRIMARY KEY (`nomorbeli`),
  ADD KEY `kodesupply` (`kodesupply`);

--
-- Indeks untuk tabel `tabel_jual`
--
ALTER TABLE `tabel_jual`
  ADD PRIMARY KEY (`nomorjual`),
  ADD KEY `kodepelanggan` (`kodepelanggan`);

--
-- Indeks untuk tabel `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`kodepelanggan`);

--
-- Indeks untuk tabel `tabel_suppliyer`
--
ALTER TABLE `tabel_suppliyer`
  ADD PRIMARY KEY (`kodesupply`);

--
-- Indeks untuk tabel `tabledetail_beli`
--
ALTER TABLE `tabledetail_beli`
  ADD PRIMARY KEY (`nomorbeli`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Indeks untuk tabel `tabledetail_jual`
--
ALTER TABLE `tabledetail_jual`
  ADD PRIMARY KEY (`nomorjual`),
  ADD KEY `kodebarang` (`kodebarang`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD CONSTRAINT `tabel_barang_ibfk_1` FOREIGN KEY (`kodejenis`) REFERENCES `tabeljenis_barang` (`kodejenis`);

--
-- Ketidakleluasaan untuk tabel `tabel_beli`
--
ALTER TABLE `tabel_beli`
  ADD CONSTRAINT `tabel_beli_ibfk_1` FOREIGN KEY (`kodesupply`) REFERENCES `tabel_suppliyer` (`kodesupply`);

--
-- Ketidakleluasaan untuk tabel `tabel_jual`
--
ALTER TABLE `tabel_jual`
  ADD CONSTRAINT `tabel_jual_ibfk_1` FOREIGN KEY (`kodepelanggan`) REFERENCES `tabel_pelanggan` (`kodepelanggan`);

--
-- Ketidakleluasaan untuk tabel `tabledetail_beli`
--
ALTER TABLE `tabledetail_beli`
  ADD CONSTRAINT `tabledetail_beli_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tabel_barang` (`kodebarang`),
  ADD CONSTRAINT `tabledetail_beli_ibfk_2` FOREIGN KEY (`nomorbeli`) REFERENCES `tabel_beli` (`nomorbeli`);

--
-- Ketidakleluasaan untuk tabel `tabledetail_jual`
--
ALTER TABLE `tabledetail_jual`
  ADD CONSTRAINT `tabledetail_jual_ibfk_1` FOREIGN KEY (`kodebarang`) REFERENCES `tabel_barang` (`kodebarang`),
  ADD CONSTRAINT `tabledetail_jual_ibfk_2` FOREIGN KEY (`nomorjual`) REFERENCES `tabel_jual` (`nomorjual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
