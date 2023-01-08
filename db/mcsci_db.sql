-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2023 pada 04.50
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcsci_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `idBarang` varchar(55) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `idJenis` varchar(55) NOT NULL,
  `idUkuran` varchar(55) NOT NULL,
  `hargaBarang` int(55) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsiBarang` varchar(255) NOT NULL,
  `fotoBarang` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`idBarang`, `namaBarang`, `idJenis`, `idUkuran`, `hargaBarang`, `stok`, `deskripsiBarang`, `fotoBarang`) VALUES
('B-00001', 'Jersey MCI Hitam', 'J-00001', 'U-00001', 350000, 19, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN S\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '885-pngwing.com.png'),
('B-00002', 'Jersey MCI Hitam', 'J-00001', 'U-00002', 350000, 17, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN M\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '196-pngwing.com.png'),
('B-00003', 'Jersey MCI Hitam', 'J-00001', 'U-00003', 350000, 20, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN L\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '261-pngwing.com.png'),
('B-00004', 'Jersey MCI', 'J-00001', 'U-00001', 350000, 17, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN S\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '332-mci.png'),
('B-00005', 'Jersey MCI', 'J-00001', 'U-00002', 350000, 20, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN M\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '573-mci.png'),
('B-00006', 'Jersey MCI', 'J-00001', 'U-00003', 350000, 20, 'JERSEY MANCHESTER CITY TAHUN 2022\r\nUKURAN L\r\nBAHAN DRY FIT\r\n100 % ORIGINAL', '943-mci.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `idBerita` varchar(55) NOT NULL,
  `tglBerita` varchar(55) NOT NULL,
  `kategoriBerita` varchar(55) NOT NULL,
  `namaBerita` varchar(55) NOT NULL,
  `deskripsiBerita` text NOT NULL,
  `foto` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `idJenis` varchar(55) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`idJenis`, `jenis`) VALUES
('J-00001', 'Jersey'),
('J-00002', 'Gantungan Kunci'),
('J-00003', 'Pertandingan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `idTransaksi` varchar(55) NOT NULL,
  `kodePembelian` varchar(55) NOT NULL,
  `noInvoice` varchar(55) NOT NULL,
  `idMember` varchar(55) DEFAULT NULL,
  `idBarang` varchar(55) NOT NULL,
  `tglTransaksi` varchar(55) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idTransaksi`, `kodePembelian`, `noInvoice`, `idMember`, `idBarang`, `tglTransaksi`, `qty`, `total`, `status`) VALUES
('T-00003', 'D9SQBRI1 ', 'XJL2XZOZ2VXAEDX3KIV9', 'M-00001', 'B-00002', '01/04/2023', 3, '1050000', 'Menunggu Pembayaran'),
('T-00002', 'LK5CNVOW ', '36HP4XVO83XH5TUBK1YR', 'M-00001', 'B-00004', '01/04/2023', 1, '350000', 'Success'),
('T-00002', 'OXL8NBSQ ', '36HP4XVO83XH5TUBK1YR', 'M-00001', 'B-00001', '01/04/2023', 1, '350000', 'Success'),
('T-00001', 'P9K31IYF ', 'EEIBLNCMXC5839H6YCTJ', 'M-00001', 'B-00001', '01/03/2023', 1, '350000', 'Success'),
('T-00001', 'Z9DUZUSK ', 'EEIBLNCMXC5839H6YCTJ', 'M-00001', 'B-00004', '01/03/2023', 1, '350000', 'Success');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `idUkuran` varchar(55) NOT NULL,
  `ukuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`idUkuran`, `ukuran`) VALUES
('U-00001', 'S'),
('U-00002', 'M'),
('U-00003', 'L'),
('U-00004', 'XL'),
('U-00005', 'XXL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `idMember` varchar(55) NOT NULL,
  `kategoriMember` varchar(55) NOT NULL DEFAULT 'Newbie',
  `identitasMember` varchar(50) NOT NULL,
  `namaMember` varchar(55) NOT NULL,
  `jkMember` varchar(55) NOT NULL,
  `alamat` varchar(55) NOT NULL,
  `telp` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `tanggalPembuatan` varchar(55) NOT NULL,
  `tanggalUpdate` varchar(55) NOT NULL,
  `level` varchar(55) NOT NULL DEFAULT 'Member',
  `foto` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`idMember`, `kategoriMember`, `identitasMember`, `namaMember`, `jkMember`, `alamat`, `telp`, `email`, `username`, `password`, `tanggalPembuatan`, `tanggalUpdate`, `level`, `foto`) VALUES
('A-00001', 'Admin', '123', 'Admin Mee', 'Laki-Laki', 'Purwokerto', '+62', 'admin@mcsci.com', 'AdminMee', '123', '01/01/2022', '2022-12-29', 'Admin', '1user8-128x128.jpg'),
('M-00001', 'Newbie', '3302260405960001', 'Indra Kusuma', 'Laki-Laki', 'Purwokerto', '081390469322', 'ndandanda04@gmail.com', 'Mee', '123', '2023-01-03', '2023-01-03', 'Member', '030120231628593 x 4-min.jpg'),
('M-00002', 'Newbie', 'Member 2', 'Member 2', 'Laki-Laki', 'Purbalingga', '0813212311312', 'member2@gmail.com', 'Member1', '123', '2023-01-05', '2023-01-05', 'Member', '05012023113628avater.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`idBerita`);

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kodePembelian`);

--
-- Indeks untuk tabel `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`idUkuran`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`idMember`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
