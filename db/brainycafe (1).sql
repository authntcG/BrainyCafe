-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Jan 2022 pada 17.33
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainycafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_menu` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `qty` bigint(3) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail_pesanan` varchar(12) NOT NULL,
  `id_pesanan` varchar(12) NOT NULL,
  `id_menu` varchar(12) NOT NULL,
  `qty` bigint(3) NOT NULL,
  `ket` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_menu`, `qty`, `ket`) VALUES
('DTP-001', 'PSN-001', 'MN-009', 1, ''),
('DTP-002', 'PSN-001', 'MN-0023', 1, ''),
('DTP-003', 'PSN-001', 'MN-0017', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KAT-001', 'Coffee'),
('KAT-002', 'Non-Coffee'),
('KAT-003', 'Snack | Foods');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(12) NOT NULL,
  `name_menu` varchar(60) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `harga` bigint(15) NOT NULL,
  `picturl` text NOT NULL,
  `status_menu` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `id_kategori`, `harga`, `picturl`, `status_menu`) VALUES
('MN-00010', 'Kopi Susu Aren', 'KAT-001', 15000, '1642749586-MN-00010.jpg', 1),
('MN-001', 'Cold Brew', 'KAT-001', 30000, '1642495239-MN-001.jpg', 1),
('MN-0010', 'Indomie Rebus Telur', 'KAT-003', 12000, '1642495521-MN-0010.jpg', 1),
('MN-0011', 'Moccacino', 'KAT-001', 15000, '1642751310-MN-0011.jpg', 1),
('MN-0012', 'Tubruk', 'KAT-001', 8000, '1642750664-MN-0012.jpg', 1),
('MN-0013', 'V60', 'KAT-001', 12000, '1642750698-MN-0013.png', 1),
('MN-0014', 'Japanese V60', 'KAT-001', 14000, '1642750729-MN-0014.jpg', 1),
('MN-0015', 'Vietnam Drip', 'KAT-001', 12000, '1642750760-MN-0015.jpg', 1),
('MN-0016', 'Red Velvet Milik', 'KAT-002', 16000, '1642750788-MN-0016.jpg', 1),
('MN-0017', 'Matcha Milk', 'KAT-002', 16000, '1642750820-MN-0017.jpg', 1),
('MN-0018', 'Taro', 'KAT-002', 16000, '1642750845-MN-0018.jpg', 1),
('MN-0019', 'Lychee Milk', 'KAT-002', 14000, '1642750883-MN-0019.jpg', 1),
('MN-002', 'Chocolate Milk', 'KAT-002', 16000, '1642495272-MN-002.jpg', 1),
('MN-0020', 'Lemon Tea', 'KAT-002', 12000, '1642750914-MN-0020.jpg', 1),
('MN-0021', 'Lychee Tea', 'KAT-002', 11000, '1642750957-MN-0021.jpg', 1),
('MN-0022', 'French Fries', 'KAT-003', 15000, '1642750990-MN-0022.jpg', 1),
('MN-0023', 'Otak - Otak', 'KAT-003', 13000, '1642751024-MN-0023.jpg', 1),
('MN-0024', 'Roti Bakar', 'KAT-003', 15000, '1642751055-MN-0024.jpg', 1),
('MN-0025', 'Pisang Coklat Keju', 'KAT-003', 12000, '1642751088-MN-0025.jpg', 1),
('MN-003', 'Cireng Rujak', 'KAT-003', 16000, '1642495291-MN-003.jpg', 1),
('MN-004', 'Cold Ice Tea', 'KAT-002', 7000, '1642495315-MN-004.jpg', 1),
('MN-005', 'Espresso', 'KAT-001', 10000, '1642495330-MN-005.jpg', 1),
('MN-006', 'French Press Coffee', 'KAT-001', 13000, '1642495433-MN-006.jpg', 1),
('MN-007', 'Lemon Ice', 'KAT-002', 11000, '1642495452-MN-007.jpg', 1),
('MN-008', 'Lychee Ice', 'KAT-002', 10000, '1642495471-MN-008.jpg', 1),
('MN-009', 'Indomie Goreng Telur', 'KAT-003', 12000, '1642495498-MN-009.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `status_order` int(1) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `tgl_order`, `status_order`, `ket`) VALUES
('PSN-001', 'USR-003', '2022-01-24 00:30:58', 3, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `id_pesanan` varchar(12) NOT NULL,
  `id_va` varchar(15) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `alamat` text NOT NULL,
  `total` bigint(15) NOT NULL,
  `status_bayar` int(1) NOT NULL,
  `status_kirim` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pesanan`, `id_va`, `tgl_order`, `alamat`, `total`, `status_bayar`, `status_kirim`) VALUES
('TRX-001', 'USR-003', 'PSN-001', 'VA-003', '2022-01-24 00:30:58', 'Jl. Jakarta No 110, Kota Bandung', 41000, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `name_user` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `access_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `no_telp`, `username`, `password`, `access_level`) VALUES
('USR-001', 'Galih Respati Permana', '0', 'admin', 'admin', 1),
('USR-002', 'Pengguna', '0', 'user', '1234', 2),
('USR-003', 'Agni Pangestu', '+6281322443355', 'agi', 'agi', 2),
('USR-004', 'Ahmad Aditya', '+621326354738', 'somad', '12345', 2);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vcart`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vcart` (
`id_menu` varchar(12)
,`name_menu` varchar(60)
,`harga` bigint(15)
,`picturl` text
,`id_user` varchar(12)
,`name_user` varchar(60)
,`qty` bigint(3)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vfavorit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vfavorit` (
`id_menu` varchar(12)
,`name_menu` varchar(60)
,`harga` bigint(15)
,`picturl` text
,`status_menu` bigint(1)
,`qty` bigint(3)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `virtual_account`
--

CREATE TABLE `virtual_account` (
  `id_va` varchar(15) NOT NULL,
  `name_bank` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `virtual_account`
--

INSERT INTO `virtual_account` (`id_va`, `name_bank`, `code`) VALUES
('VA-001', 'BCA', '3901'),
('VA-002', 'Mandiri', '89508'),
('VA-003', 'BNI', '88810'),
('VA-004', 'BRI', '8810');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vmenu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vmenu` (
`id_menu` varchar(12)
,`name_menu` varchar(60)
,`id_kategori` varchar(15)
,`nama_kategori` varchar(50)
,`harga` bigint(15)
,`picturl` text
,`status_menu` bigint(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vordermenu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vordermenu` (
`id_menu` varchar(12)
,`name_menu` varchar(60)
,`orderan` decimal(41,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpesanan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpesanan` (
`id_pesanan` varchar(12)
,`id_user` varchar(12)
,`name_user` varchar(60)
,`tgl_order` datetime
,`id_menu` varchar(12)
,`name_menu` varchar(60)
,`picturl` text
,`harga` bigint(15)
,`qty` bigint(3)
,`status_order` int(1)
,`ket` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtransaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtransaksi` (
`id_transaksi` varchar(12)
,`id_user` varchar(12)
,`name_user` varchar(60)
,`id_pesanan` varchar(12)
,`id_va` varchar(15)
,`name_bank` varchar(50)
,`tgl_order` datetime
,`total` bigint(15)
,`status_bayar` int(1)
,`status_kirim` int(1)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vcart`
--
DROP TABLE IF EXISTS `vcart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcart`  AS SELECT `cart`.`id_menu` AS `id_menu`, `menu`.`name_menu` AS `name_menu`, `menu`.`harga` AS `harga`, `menu`.`picturl` AS `picturl`, `cart`.`id_user` AS `id_user`, `user`.`name_user` AS `name_user`, `cart`.`qty` AS `qty` FROM ((`cart` join `menu` on((`cart`.`id_menu` = `menu`.`id_menu`))) join `user` on((`cart`.`id_user` = `user`.`id_user`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vfavorit`
--
DROP TABLE IF EXISTS `vfavorit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfavorit`  AS SELECT DISTINCT `detail_pesanan`.`id_menu` AS `id_menu`, `menu`.`name_menu` AS `name_menu`, `menu`.`harga` AS `harga`, `menu`.`picturl` AS `picturl`, `menu`.`status_menu` AS `status_menu`, `detail_pesanan`.`qty` AS `qty` FROM (`detail_pesanan` join `menu` on((`detail_pesanan`.`id_menu` = `menu`.`id_menu`))) WHERE (`menu`.`status_menu` = '1') ORDER BY `detail_pesanan`.`qty` DESC LIMIT 0, 3 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vmenu`
--
DROP TABLE IF EXISTS `vmenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vmenu`  AS SELECT `menu`.`id_menu` AS `id_menu`, `menu`.`name_menu` AS `name_menu`, `menu`.`id_kategori` AS `id_kategori`, `kategori`.`nama_kategori` AS `nama_kategori`, `menu`.`harga` AS `harga`, `menu`.`picturl` AS `picturl`, `menu`.`status_menu` AS `status_menu` FROM (`menu` join `kategori` on((`menu`.`id_kategori` = `kategori`.`id_kategori`))) ORDER BY `menu`.`name_menu` ASC ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vordermenu`
--
DROP TABLE IF EXISTS `vordermenu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vordermenu`  AS SELECT `menu`.`id_menu` AS `id_menu`, `menu`.`name_menu` AS `name_menu`, sum(`detail_pesanan`.`qty`) AS `orderan` FROM (`menu` join `detail_pesanan` on((`menu`.`id_menu` = `detail_pesanan`.`id_menu`))) GROUP BY `menu`.`id_menu` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpesanan`
--
DROP TABLE IF EXISTS `vpesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpesanan`  AS SELECT `pesanan`.`id_pesanan` AS `id_pesanan`, `pesanan`.`id_user` AS `id_user`, `user`.`name_user` AS `name_user`, `pesanan`.`tgl_order` AS `tgl_order`, `detail_pesanan`.`id_menu` AS `id_menu`, `menu`.`name_menu` AS `name_menu`, `menu`.`picturl` AS `picturl`, `menu`.`harga` AS `harga`, `detail_pesanan`.`qty` AS `qty`, `pesanan`.`status_order` AS `status_order`, `pesanan`.`ket` AS `ket` FROM (((`pesanan` join `user` on((`pesanan`.`id_user` = `user`.`id_user`))) join `detail_pesanan` on((`pesanan`.`id_pesanan` = `detail_pesanan`.`id_pesanan`))) join `menu` on((`detail_pesanan`.`id_menu` = `menu`.`id_menu`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtransaksi`
--
DROP TABLE IF EXISTS `vtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtransaksi`  AS SELECT `transaksi`.`id_transaksi` AS `id_transaksi`, `transaksi`.`id_user` AS `id_user`, `user`.`name_user` AS `name_user`, `pesanan`.`id_pesanan` AS `id_pesanan`, `virtual_account`.`id_va` AS `id_va`, `virtual_account`.`name_bank` AS `name_bank`, `transaksi`.`tgl_order` AS `tgl_order`, `transaksi`.`total` AS `total`, `transaksi`.`status_bayar` AS `status_bayar`, `transaksi`.`status_kirim` AS `status_kirim` FROM (((`transaksi` join `user` on((`transaksi`.`id_user` = `user`.`id_user`))) join `pesanan` on((`transaksi`.`id_pesanan` = `pesanan`.`id_pesanan`))) join `virtual_account` on((`transaksi`.`id_va` = `virtual_account`.`id_va`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_ketegoti` (`id_kategori`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `virtual_account`
--
ALTER TABLE `virtual_account`
  ADD PRIMARY KEY (`id_va`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
