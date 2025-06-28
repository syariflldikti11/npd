-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2025 pada 10.20
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghifaexpress`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bttb`
--

CREATE TABLE `bttb` (
  `id_bttb` varchar(100) NOT NULL,
  `nobttb` varchar(100) NOT NULL,
  `kota_asal` varchar(100) NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `id_penerima` varchar(100) NOT NULL,
  `pembayaran` varchar(100) NOT NULL,
  `colly` int(11) NOT NULL,
  `dos` int(11) NOT NULL,
  `kg` int(11) NOT NULL,
  `biaya_paket` int(11) NOT NULL,
  `tgl_bttb` date NOT NULL,
  `barang_diterima` date NOT NULL,
  `bttb_kembali` date NOT NULL,
  `isi_barang` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tgl_input_bttb` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `biaya_tambahan` int(11) NOT NULL,
  `status_barang` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `no_faktur` varchar(100) NOT NULL,
  `opr_input` varchar(100) NOT NULL,
  `opr_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_surat_jalan`
--

CREATE TABLE `detail_surat_jalan` (
  `id_detail_surat_jalan` varchar(100) NOT NULL,
  `id_bttb` varchar(100) NOT NULL,
  `id_surat_jalan` varchar(100) NOT NULL,
  `opr_input_detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `detail_surat_jalan`
--
DELIMITER $$
CREATE TRIGGER `reset_bttb` AFTER DELETE ON `detail_surat_jalan` FOR EACH ROW BEGIN
update bttb
set status_barang=0
where id_bttb=OLD.id_bttb;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_bttb` AFTER INSERT ON `detail_surat_jalan` FOR EACH ROW BEGIN
update bttb
set status_barang=1
where id_bttb=NEW.id_bttb;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(100) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('03b423de-f8b5-11ef-9ec9-c454445434d3', 'dsf'),
('6d1ce3e9-f7dc-11ef-a95a-f8fe5ef7d437', 'Satpam'),
('cbb17550-f5f3-11ef-a5cd-f8fe5ef7d437', 'Sopir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jk_karyawan` varchar(100) NOT NULL,
  `alamat_karyawan` varchar(100) NOT NULL,
  `nomor_karyawan` varchar(100) NOT NULL,
  `id_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `nomor_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  `status_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `nomor_pelanggan`, `alamat_pelanggan`, `status_pelanggan`) VALUES
('bac844fb-f84a-11ef-b01c-f8fe5ef7d437', 'PT Venta Valent', '08', 'x', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` varchar(100) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `nomor_penerima` varchar(100) NOT NULL,
  `alamat_penerima` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalan`
--

CREATE TABLE `surat_jalan` (
  `id_surat_jalan` varchar(100) NOT NULL,
  `no_surat_jalan` int(11) NOT NULL,
  `id_karyawan` varchar(100) NOT NULL,
  `no_polisi` varchar(100) NOT NULL,
  `km_awal` int(11) NOT NULL,
  `km_akhir` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `tgl_pulang` date NOT NULL,
  `jam_pulang` time NOT NULL,
  `helper` varchar(100) NOT NULL,
  `tgl_surat_jalan` date DEFAULT NULL,
  `tgl_input_surat_jalan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `opr_input` varchar(100) NOT NULL,
  `opr_update` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif_pelanggan`
--

CREATE TABLE `tarif_pelanggan` (
  `id_tarif_pelanggan` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `harga_per_colly` int(11) NOT NULL,
  `keberangkatan` varchar(100) NOT NULL,
  `lead_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif_pelanggan`
--

INSERT INTO `tarif_pelanggan` (`id_tarif_pelanggan`, `id_pelanggan`, `kota_tujuan`, `harga_per_colly`, `keberangkatan`, `lead_time`) VALUES
('cd2f0631-55f0-4de3-abb1-02cc39231ee10', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Paringin ', 24000, ' Selasa, Kamis dan Sabti ', '2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee11', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Balangan ', 24000, ' Selasa, Kamis dan Sabti ', '2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee12', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Tanjung ', 27000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee13', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kalua ', 27000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee14', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Amuntai ', 27000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee15', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Peleihari ', 21000, ' Selasa sd Minggu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee16', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Asam-asam ', 22000, ' Selasa sd Minggu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee17', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Sungai Danau ', 22000, ' Selasa sd Minggu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee18', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Sebamban ', 24000, ' Selasa sd Minggu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee19', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Angsana ', 24000, ' Selasa sd Minggu, jam 06.01 ', '25 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee20', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Pagatan ', 24000, ' Selasa sd Minggu, jam 06.02 ', '26 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee21', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Batu Licin ', 30000, ' Selasa sd Minggu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee22', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Serongga ', 65000, ' Selasa sd Minggu, jam 06.00 ', '2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee23', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kota Baru ', 42000, ' Senin sd Sabtu, jam 14.00 ', '3 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee24', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Marabahan ', 20000, ' Rabu dan Sabtu ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee25', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Handil Bhakti ', 16500, ' Senin sd Sabtu, jam 09.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee26', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Binuang ', 15000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee27', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kuala Kapuas ', 17500, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee28', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Pulang Pisau ', 21000, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee29', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Palangkaraya ', 20000, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee3', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Banjar Baru ', 9000, ' Senin sd Sabtu, jam 07.00 ', '1 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee30', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kuala Kurun ', 120000, ' Minggu sd Jum\'at, Jam 22.00 ', '4 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee31', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kasongan ', 28000, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee32', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kerengpangi ', 28000, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee33', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Sampit ', 32500, ' Minggu sd Jum\'at, Jam 22.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee34', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Samuda ', 42500, ' Minggu sd Jum\'at, Jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee35', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kuala Pambuang ', 100000, ' Minggu sd Jum\'at, Jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee36', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Hanau ', 100000, ' Minggu sd Jum\'at, Jam 22.01 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee37', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Lamandau ', 100000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '3-4 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee38', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kumai ', 45000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee39', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Pangkalan Bun ', 42000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee4', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Martapura ', 9000, ' Senin sd Sabtu, jam 07.00 ', '1 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee40', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Pangkalan Lada ', 42000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee41', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Pangkalan Benteng ', 42000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee42', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Sukamara ', 120000, ' Senin, Rabu, Jum\'at, jam 22.00 ', '3-4 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee43', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Tamiyang Layang ', 30000, ' Senin, Rabu, Jum\'at, jam 06.00 ', '1-2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee44', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Ampah ', 30000, ' Senin, Rabu, Jum\'at, jam 06.00 ', '1-2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee45', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Buntok ', 36000, ' Senin, Rabu, Jum\'at, jam 06.00 ', '1-2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee46', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Muara Teweh ', 40000, ' Senin, Rabu, Jum\'at, jam 06.00 ', '2-3 hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee47', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Puruk Cahu ', 100000, ' Senin, Rabu, Jum\'at, jam 06.01 ', '3-4 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee5', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Danau Salak ', 15000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee6', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Rantau ', 21000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee7', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Kandangan ', 22800, ' Senin sd Sabtu, jam 06.00 ', '24 Jam'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee8', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Nagara ', 52800, ' Senin sd Sabtu, jam 06.00 ', '2 Hari'),
('cd2f0631-55f0-4de3-abb1-02cc39231ee9', 'bac844fb-f84a-11ef-b01c-f8fe5ef7d437', ' Barabai ', 24000, ' Senin sd Sabtu, jam 06.00 ', '24 Jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `akses`) VALUES
('2893yr0hfea', 'jaidi', '$2y$10$Jv2xT7eyQZl3odwYQAy.eugDc3c0E8qDTbc9oSKDSzpJbk9CZyMPi', 2),
('3qr9uf0qhjf', 'aida', '$2y$10$L5wk/x14yQPPLSpvmyOqme8/RDnLhGvaNoogsEb1h8vEuoz04NTeS', 2),
('awdq2e', 'admin', '$2y$10$l/0ycWN.FbHPma2ejow0S.V3tN0i9l9t2yuiZ8LK82dUxxGWhbUf2', 1),
('q3fafq', 'rika', '$2y$10$kZay9IAbvkwab.H/2TQqoeiXxgEW4wlJ0yfQF.BUmAWyPIEtQPuiK', 2),
('qerfdssfd', 'syaifullah', '$2y$10$d.8QME64Fj/nsxOfwFFobuaYPu6bOwIeoDR/lT3CHHDY4zN6Npl1S', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bttb`
--
ALTER TABLE `bttb`
  ADD PRIMARY KEY (`id_bttb`),
  ADD UNIQUE KEY `nobttb` (`nobttb`);

--
-- Indeks untuk tabel `detail_surat_jalan`
--
ALTER TABLE `detail_surat_jalan`
  ADD PRIMARY KEY (`id_detail_surat_jalan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indeks untuk tabel `surat_jalan`
--
ALTER TABLE `surat_jalan`
  ADD PRIMARY KEY (`id_surat_jalan`),
  ADD UNIQUE KEY `no_surat_jalan` (`no_surat_jalan`);

--
-- Indeks untuk tabel `tarif_pelanggan`
--
ALTER TABLE `tarif_pelanggan`
  ADD PRIMARY KEY (`id_tarif_pelanggan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `surat_jalan`
--
ALTER TABLE `surat_jalan`
  MODIFY `no_surat_jalan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
