-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2021 pada 14.39
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoalattulis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(1000) NOT NULL,
  `harga_barang` int(15) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `harga_barang`, `stok`, `keterangan`) VALUES
(13, 'Buku SIDU 32s', 37000, 50, 'Per Pack'),
(15, 'Pulpen Standart 0.7', 12000, 300, 'Per Pack'),
(16, 'Penghapus Kenko', 9000, 200, 'Per Pack'),
(17, 'Pulpen Kokoro 5pcs', 20000, 30, 'Per Pack'),
(18, 'Buku KIKI Besar 40s', 40000, 150, 'Per Pack'),
(19, 'Buku SIDU 58s', 50000, 100, 'Per Pack'),
(20, 'Stabilo Joyko', 6000, 200, 'Per Buah'),
(21, 'Pulpen Kenko Animal', 25000, 70, 'Per Pack'),
(22, 'Pulpen Standart 0.5', 12000, 40, 'Per Pack'),
(23, 'Penggaris Besi', 3000, 50, 'Per Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_tlp` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama_pelanggan`, `no_tlp`, `alamat`) VALUES
(6, 'Intan Agustin', '089720014002', 'Cirebon\r\n'),
(7, 'Defan Karisma', '087577445090', 'Bandung'),
(8, 'Aulia Apriliani', '085725293513', 'Cirebon'),
(9, 'Karina ', '088300200456', 'Kuningan'),
(10, 'Sekala Giandra', '081545677788', 'Cirebon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `total_bayar` int(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`pembelian_id`, `supplier_id`, `total_bayar`, `tgl_masuk`, `keterangan`) VALUES
(1, 5, 460000, '2021-07-31', 'pembelian 1'),
(1627721251, 6, 1700000, '2021-07-31', 'pembelian 2'),
(1627727215, 10, 500000, '2021-07-31', 'pembelian 1'),
(1627727289, 11, 2280000, '2021-07-31', 'pembelian 2'),
(1627727323, 8, 8050000, '2021-07-31', 'pembelian 3'),
(1627727404, 9, 370000, '2021-07-31', 'pembelian 4'),
(1627727460, 12, 625000, '2021-07-31', 'pembelian 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `pembelian_detail_id` int(5) NOT NULL,
  `pembelian_id` int(5) NOT NULL,
  `barang_id` int(5) NOT NULL,
  `harga_satuan` int(10) NOT NULL,
  `stok_tambahan` int(10) NOT NULL,
  `harga_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`pembelian_detail_id`, `pembelian_id`, `barang_id`, `harga_satuan`, `stok_tambahan`, `harga_total`) VALUES
(1, 1, 13, 36000, 10, 360000),
(2, 1, 0, 10000, 20, 200000),
(3, 1, 15, 10000, 10, 100000),
(4, 1627669360, 16, 6000, 100, 600000),
(5, 1627721251, 13, 34000, 50, 1700000),
(8, 1627727215, 20, 5000, 100, 500000),
(10, 1627727323, 13, 34500, 100, 3450000),
(11, 1627727323, 19, 46000, 100, 4600000),
(12, 1627727404, 16, 7000, 20, 140000),
(13, 1627727404, 21, 23000, 10, 230000),
(14, 1627727460, 23, 2500, 50, 125000),
(15, 1627727460, 15, 10000, 100, 1000000),
(16, 1627727460, 22, 10000, 50, 500000),
(20, 1627727289, 18, 38000, 30, 1140000),
(21, 1627727289, 18, 38000, 30, 1140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tgl_penjualan` varchar(50) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tgl_penjualan`, `pelanggan_id`, `keterangan`, `total`) VALUES
(1627726750, '2021-07-31', 8, 'penjualan\r\n', 2100000),
(1627726887, '2021-07-31', 6, 'penjualan\r\n', 224000),
(1627726936, '2021-07-31', 9, 'penjualan', 120000),
(1627726997, '2021-07-31', 7, 'penjualan', 123000),
(1627727038, '2021-07-31', 10, 'penjualan', 18000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `penjualan_detail_id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga_total` int(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`penjualan_detail_id`, `penjualan_id`, `barang_id`, `harga_total`, `jumlah`, `diskon`) VALUES
(14, 1627397674, 13, 380000, 10, 0),
(16, 1627666774, 14, 210000, 5, 0),
(17, 1627720294, 15, 324000, 30, 10),
(18, 1627721955, 13, 74000, 2, 0),
(19, 1627721955, 15, 12000, 1, 0),
(20, 1627721955, 17, 100000, 5, 0),
(21, 1627726750, 19, 100000, 2, 0),
(22, 1627726750, 13, 111000, 3, 0),
(23, 1627726750, 20, 30000, 5, 0),
(24, 1627726750, 15, 12000, 1, 0),
(25, 1627726887, 18, 200000, 5, 0),
(26, 1627726887, 23, 6000, 2, 0),
(27, 1627726887, 15, 24000, 2, 0),
(28, 1627726936, 17, 60000, 3, 0),
(29, 1627726936, 20, 60000, 10, 0),
(30, 1627726997, 15, 12000, 1, 0),
(31, 1627726997, 13, 111000, 3, 0),
(32, 1627727038, 23, 6000, 2, 0),
(33, 1627727038, 19, 100000, 2, 0),
(34, 1627727038, 15, 12000, 1, 0),
(36, 1627726750, 18, 2000000, 50, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `no_tlp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `nama_supplier`, `no_tlp`) VALUES
(8, 'PT Sinar Dunia', '081235670088'),
(9, 'PT Kenko', '087564443001'),
(10, 'PT Joyko', '087577445090'),
(11, 'PT KIKI', '08999034550'),
(12, 'PT Sinar Jaya', '087760609889');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`pembelian_detail_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`);

--
-- Indeks untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`penjualan_detail_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1627727461;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `pembelian_detail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1627727039;

--
-- AUTO_INCREMENT untuk tabel `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `penjualan_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
