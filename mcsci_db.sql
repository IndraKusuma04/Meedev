-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 11:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `idBarang` varchar(55) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `idJenis` varchar(55) NOT NULL,
  `idUkuran` varchar(55) NOT NULL,
  `hargaBarang` int(55) NOT NULL,
  `stok` int(11) NOT NULL,
  `fotoBarang` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `idBarang`, `namaBarang`, `idJenis`, `idUkuran`, `hargaBarang`, `stok`, `fotoBarang`) VALUES
(9, 'B-00001', 'Jersey MCI Hitam', 'J-00001', 'U-00002', 350000, 10, '453-44-pngwing.com.png'),
(10, 'B-00002', 'Jersey MCI', 'J-00001', 'U-00002', 350000, 18, '462-1mci.png'),
(11, 'B-00003', 'Gantungan Kunci Manchester City Logam', 'J-00003', 'U-00007', 25000, 42, '381-ganci_mci.jpg'),
(12, 'B-00004', 'Gantungan Kunci Manchester City Karet', 'J-00003', 'U-00007', 20000, 52, '886-ganci-karet-mci.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `idBerita` varchar(55) NOT NULL,
  `tglBerita` varchar(55) NOT NULL,
  `kategoriBerita` varchar(55) NOT NULL,
  `namaBerita` varchar(55) NOT NULL,
  `deskripsiBerita` text NOT NULL,
  `foto` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `idBerita`, `tglBerita`, `kategoriBerita`, `namaBerita`, `deskripsiBerita`, `foto`) VALUES
(3, 'BE-00001', '12/30/2022', 'J-00002', 'Informasi NOBAR (Nonton Barang)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque maximus euismod lorem nec fermentum. Vestibulum cursus tristique nunc, a sagittis lectus consequat eget. Sed malesuada ullamcorper tincidunt. Sed vel leo eget dui lobortis egestas vitae eleifend lectus. Nunc blandit arcu in lacus malesuada suscipit. Suspendisse molestie odio sit amet augue porttitor fermentum. Quisque odio diam, tristique id nisi ac, efficitur aliquam dolor.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur leo lorem, mattis et leo nec, dignissim lobortis nisl. Morbi luctus feugiat enim, at fringilla dui. Pellentesque id mauris pharetra, aliquet nibh ac, rhoncus lorem. Nunc at interdum tellus. Donec tempor diam at nisl convallis, at tempus dui aliquet. Nam dictum enim justo. Nunc at tortor gravida, fermentum ante ut, malesuada ex. Mauris a pulvinar est. Nulla eget lacus eleifend, porta orci in, feugiat tellus. In finibus enim et mauris tempus, euismod dignissim diam pulvinar. Aliquam interdum dignissim massa, aliquam pharetra est venenatis vel.\r\n\r\nSuspendisse imperdiet elit eu congue sollicitudin. Vestibulum interdum velit id lorem laoreet, ac volutpat nulla ornare. Pellentesque aliquam leo non lectus posuere, eu lacinia mi pharetra. Morbi at dapibus eros. Nulla facilisi. Mauris luctus lobortis nibh id sodales. Donec malesuada maximus euismod. Sed ex odio, iaculis vitae bibendum vitae, sagittis vitae sapien. Vestibulum porttitor nisi eget tellus blandit pretium.\r\n\r\nQuisque ac sem odio. Praesent in finibus ante. Vivamus sodales nibh libero, eget dictum magna ullamcorper ac. Donec vehicula posuere sodales. Nulla fermentum felis libero, nec convallis turpis rutrum ac. In hac habitasse platea dictumst. Aliquam facilisis semper lorem quis dictum. Maecenas leo massa, ornare vel auctor id, tempor ut turpis. In urna orci, faucibus vel commodo sed, vulputate id tortor. Mauris faucibus egestas justo. Aenean metus eros, vulputate commodo est a, scelerisque pulvinar est. Donec a tempor lectus. Suspendisse nec dignissim neque. Proin pellentesque massa in erat ornare, ornare sodales dui tincidunt.\r\n\r\nInteger commodo, metus vel facilisis semper, tortor dui aliquam massa, sit amet dapibus ligula sapien at libero. Etiam sed laoreet risus, non semper risus. Sed eu elit nec ante blandit elementum. Ut rutrum facilisis sodales. Donec volutpat, justo sit amet euismod convallis, nisi dui mattis nisl, vitae gravida mauris sapien quis lacus. Morbi bibendum tempor tellus a laoreet. Ut ac ex et lectus aliquam elementum. Maecenas id hendrerit felis. Donec auctor at neque vitae auctor. Duis id iaculis velit, vitae tincidunt magna. Ut sollicitudin ante sed convallis pharetra. Etiam sed pulvinar nulla, et semper lorem. Nam in tortor ante.', '237-prod-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id` int(11) NOT NULL,
  `idJenis` varchar(55) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id`, `idJenis`, `jenis`) VALUES
(13, 'J-00001', 'Jersey'),
(15, 'J-00002', 'Pertandingan'),
(16, 'J-00003', 'Gantungan Kunci');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `idTransaksi` varchar(55) DEFAULT NULL,
  `noInvoice` varchar(55) NOT NULL,
  `idMember` varchar(55) DEFAULT NULL,
  `idBarang` varchar(55) NOT NULL,
  `tglTransaksi` varchar(55) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `total` varchar(55) NOT NULL,
  `status` varchar(55) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `idTransaksi`, `noInvoice`, `idMember`, `idBarang`, `tglTransaksi`, `qty`, `total`, `status`) VALUES
(29, 'T-00001', 'VGCM3Q1DRT5FIWINY2A2', 'M#00002', 'B#00001', '12/25/2022', 3, '1050000', 'Success'),
(30, 'T-00001', 'VGCM3Q1DRT5FIWINY2A2', 'M#00002', 'B#00002', '12/25/2022', 3, '1050000', 'Success'),
(31, 'T-00002', 'UCLEF1FM9YMVESPPM5JS', 'M-00001', 'B-00001', '12/30/2022', 1, '350000', 'Success'),
(32, 'T-00002', 'UCLEF1FM9YMVESPPM5JS', 'M-00001', 'B-00001', '12/30/2022', 1, '350000', 'Success'),
(36, '', 'T2MB0K1JC1U294HVRKMQ', 'M-00001', 'B-00001', '12/30/2022', 3, '1050000', 'Success'),
(37, 'T-00003', 'GE29ZQZFQUZU7XLO2SSR', 'M-00001', 'B-00001', '12/30/2022', 3, '1050000', 'Success'),
(38, 'T-00004', 'LWF6HOEHPA2XY8LCYV1Q', 'M-00001', 'B-00002', '12/31/2022', 2, '700000', 'Success'),
(39, 'T-00005', '6CY62Q7BAHN1INT1X18F', 'M-00001', 'B-00003', '12/31/2022', 10, '250000', 'Success'),
(40, 'T-00006', 'DPW1QU5KFRNKW60G6HZ8', 'M-00001', 'B-00001', '01/01/2023', 1, '350000', 'Success'),
(41, 'T-00006', 'DPW1QU5KFRNKW60G6HZ8', 'M-00001', 'B-00003', '01/01/2023', 1, '25000', 'Success'),
(42, 'T-00006', 'DPW1QU5KFRNKW60G6HZ8', 'M-00001', 'B-00004', '01/01/2023', 1, '20000', 'Success'),
(47, 'T-00007', 'BRKK93J5RUWK1614K9MP', 'M-00001', 'B-00001', '01/03/2023', 1, '350000', 'Menunggu Pembayaran'),
(50, 'T-00007', 'BRKK93J5RUWK1614K9MP', 'M-00001', 'B-00003', '01/03/2023', 2, '50000', 'Menunggu Pembayaran'),
(51, NULL, '', NULL, 'B-00004', '01/03/2023', 2, '40000', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ukuran`
--

CREATE TABLE `tb_ukuran` (
  `id` int(11) NOT NULL,
  `idUkuran` varchar(55) NOT NULL,
  `ukuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ukuran`
--

INSERT INTO `tb_ukuran` (`id`, `idUkuran`, `ukuran`) VALUES
(18, 'U-00001', 'S'),
(19, 'U-00002', 'M'),
(20, 'U-00003', 'L'),
(21, 'U-00004', 'XL'),
(22, 'U-00005', 'XXL'),
(23, 'U-00006', 'Besar'),
(24, 'U-00007', 'Kecil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
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
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `idMember`, `kategoriMember`, `identitasMember`, `namaMember`, `jkMember`, `alamat`, `telp`, `email`, `username`, `password`, `tanggalPembuatan`, `tanggalUpdate`, `level`, `foto`) VALUES
(9, 'A-00001', 'Admin', '123', 'Admin Mee', 'Laki-Laki', 'Purwokerto', '+62', 'admin@mcsci.com', 'AdminMee', '123', '01/01/2022', '2022-12-29', 'Admin', '1user8-128x128.jpg'),
(10, 'M-00001', 'Newbie', '3301020304050004', 'Dimas Anugerah Adibrata', 'Laki-Laki', 'Purbalingga', '085842230721', 'member@gmail.com', 'Member1', '123', '2022-12-30', '2023-01-03', 'Member', 'user1-128x128.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_ukuran`
--
ALTER TABLE `tb_ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
