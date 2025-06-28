-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2025 pada 10.10
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
-- Database: `npd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(40) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_pegawai` varchar(40) NOT NULL,
  `tahun_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `id_role`, `id_pegawai`, `tahun_akun`) VALUES
('017293f5-536b-11f0-8b53-f8fe5ef7d437', 3, '4a6ba4d3-536a-11f0-8b53-f8fe5ef7d437', 2025),
('a922a11f-536a-11f0-8b53-f8fe5ef7d437', 4, '1547e3db-536a-11f0-8b53-f8fe5ef7d437', 2025),
('b4626091-536a-11f0-8b53-f8fe5ef7d437', 2, '0cc526c7-536a-11f0-8b53-f8fe5ef7d437', 2025),
('bddb2865-536a-11f0-8b53-f8fe5ef7d437', 4, 'fec23f41-5369-11f0-8b53-f8fe5ef7d437', 2025),
('c9fb4fe1-536a-11f0-8b53-f8fe5ef7d437', 6, 'f8046db4-5369-11f0-8b53-f8fe5ef7d437', 2025),
('d23e33cf-536a-11f0-8b53-f8fe5ef7d437', 5, '52e26c37-536a-11f0-8b53-f8fe5ef7d437', 2025),
('ec33cc89-536a-11f0-8b53-f8fe5ef7d437', 4, '33088f6f-536a-11f0-8b53-f8fe5ef7d437', 2025),
('f2a9060f-536a-11f0-8b53-f8fe5ef7d437', 2, '2476778f-536a-11f0-8b53-f8fe5ef7d437', 2025),
('fb119b56-536a-11f0-8b53-f8fe5ef7d437', 6, '1c20d395-536a-11f0-8b53-f8fe5ef7d437', 2025),
('qf3tyhgfas', 1, 'f9b41073-5363-11f0-8b53-f8fe5ef7d437', 2025);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` varchar(40) NOT NULL,
  `nama_bagian` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `nama_bagian`) VALUES
('1878f435-532f-11f0-8b53-f8fe5ef7d437', 'Bagian Pemerintahan'),
('2fc994bd-5336-11f0-8b53-f8fe5ef7d437', 'Bagian Organisasi'),
('323aaefd-5336-11f0-8b53-f8fe5ef7d437', 'Bagian PKP'),
('36df1880-5336-11f0-8b53-f8fe5ef7d437', 'Bagian PKEU'),
('defb95c5-5335-11f0-8b53-f8fe5ef7d437', 'Bagian Hukum'),
('e5e7d80b-5335-11f0-8b53-f8fe5ef7d437', 'Bagian Kesejahteraan Masyarakat'),
('f0fbf2d7-5335-11f0-8b53-f8fe5ef7d437', 'Bagian Pengadaan Barang dan Jasa'),
('f730e1d7-5335-11f0-8b53-f8fe5ef7d437', 'Bagian Administrasi Pemerintahan'),
('fb9b0124-5335-11f0-8b53-f8fe5ef7d437', 'Bagian Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(36) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_bagian` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_pegawai`, `id_bagian`, `password`) VALUES
('0cc526c7-536a-11f0-8b53-f8fe5ef7d437', '4', 'Lisa', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$wPEl6wDcD35dH01x2ShseuPBeT7xgK5li6Ebofi9F45JAr2gtXV/K'),
('1547e3db-536a-11f0-8b53-f8fe5ef7d437', '5', 'Bani', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$XbxaVIhgtq.d.K0hMCaLHuFZZG3.meRyVgAzv.RQV8xRVpM3uTawO'),
('1c20d395-536a-11f0-8b53-f8fe5ef7d437', '6', 'Suci', '1878f435-532f-11f0-8b53-f8fe5ef7d437', '$2y$10$PtYmYckpsgJgGQstSAVulOpb717lA65CplsRo4MJUborLBUzImv4W'),
('2476778f-536a-11f0-8b53-f8fe5ef7d437', '7', 'Suci', '1878f435-532f-11f0-8b53-f8fe5ef7d437', '$2y$10$M.9Yaxq235/UaMmtmZM1pec3JCz4qC6ve1v2QIChJNV6JUhfqe5Bu'),
('33088f6f-536a-11f0-8b53-f8fe5ef7d437', '8', 'Sinta', '1878f435-532f-11f0-8b53-f8fe5ef7d437', '$2y$10$mCuMugtJ1LBjOqrL7p.veetyVII7T3jciLpmGBpUoevgL1UNVFPXm'),
('4a6ba4d3-536a-11f0-8b53-f8fe5ef7d437', '9', 'Putri', '1878f435-532f-11f0-8b53-f8fe5ef7d437', '$2y$10$QjhTmALtkMpM9rgMu1AzaOUoOzyzLv5MgrhSPWV486L72/iyLjdwG'),
('52e26c37-536a-11f0-8b53-f8fe5ef7d437', '10', 'Akbar', '36df1880-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$KAMfplos4y1PynbBNXpblO2bQHj9Oue7nmA.s85zzLrsJLRIt0yUu'),
('f8046db4-5369-11f0-8b53-f8fe5ef7d437', '2', 'Andi', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$eNtKtxqxKQB4xkyDTi50meUM8dmpv3LqH4LgLaoxQJEJR7kGDfM2u'),
('f9b41073-5363-11f0-8b53-f8fe5ef7d437', '1', 'Syarif Firdaus', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$1aGULyYjsnU3gA0F0UZaPehSx7.Ojx8xsCUsNQO9mJn.ZtT2Xgk2S'),
('fec23f41-5369-11f0-8b53-f8fe5ef7d437', '3', 'Budi', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$GWocYndtdkP8qbNZH/EFNeEDcrunU2EWNDYyZS8PsDE15zA7zK1ke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_anggaran`
--

CREATE TABLE `permintaan_anggaran` (
  `id_permintaan_anggaran` varchar(36) NOT NULL,
  `tgl_permintaan_anggaran` date NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `sub_kegiatan` varchar(100) NOT NULL,
  `program` varchar(100) NOT NULL,
  `no_dpa` varchar(50) NOT NULL,
  `tahun_anggaran` int(5) NOT NULL,
  `status_permintaan` int(1) NOT NULL,
  `id_rek_05` varchar(36) NOT NULL,
  `id_rek_06` varchar(36) NOT NULL,
  `id_akun` varchar(37) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `catatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan_anggaran`
--

INSERT INTO `permintaan_anggaran` (`id_permintaan_anggaran`, `tgl_permintaan_anggaran`, `kegiatan`, `sub_kegiatan`, `program`, `no_dpa`, `tahun_anggaran`, `status_permintaan`, `id_rek_05`, `id_rek_06`, `id_akun`, `file`, `tgl_input`, `catatan`) VALUES
('cf94767a-53f3-11f0-8b53-f8fe5ef7d437', '2025-06-28', 'Pelaksanaan Kebijakan Perekonomian', 'Koordinasi, Sinkronisasi dan Evaluasi Kebijakan Pengelolaan BUMD dan BLUD     ', 'Program Perekonomian dan Pembangunan', '4.01.03.2.04.0003', 2025, 0, '91f52979-5339-11f0-8b53-f8fe5ef7d437', '06d961c7-533b-11f0-8b53-f8fe5ef7d437', 'b4626091-536a-11f0-8b53-f8fe5ef7d437', '7c7ed28ee1b3ea7ce141d7c3b2e3ddfa.pdf', '2025-06-28 07:45:02', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rek_05`
--

CREATE TABLE `rek_05` (
  `id_rek_05` varchar(40) NOT NULL,
  `nama_rek_05` varchar(40) NOT NULL,
  `no_rek_05` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rek_05`
--

INSERT INTO `rek_05` (`id_rek_05`, `nama_rek_05`, `no_rek_05`) VALUES
('91f52979-5339-11f0-8b53-f8fe5ef7d437', 'Belanja Barang Pakai Habis', '5.1.02.01.01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rek_06`
--

CREATE TABLE `rek_06` (
  `id_rek_06` varchar(36) NOT NULL,
  `no_rek_06` varchar(20) NOT NULL,
  `nama_rek_06` varchar(100) NOT NULL,
  `id_rek_05` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rek_06`
--

INSERT INTO `rek_06` (`id_rek_06`, `no_rek_06`, `nama_rek_06`, `id_rek_05`) VALUES
('06d961c7-533b-11f0-8b53-f8fe5ef7d437', '5.1.02.01.01.0029', 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Komputer', '91f52979-5339-11f0-8b53-f8fe5ef7d437'),
('e1b008d2-533a-11f0-8b53-f8fe5ef7d437', '5.1.02.01.01.0029', 'Belanja Alat/Bahan Untuk Kegiatan Kantor-Bahan Komputer', '91f52979-5339-11f0-8b53-f8fe5ef7d437');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'kasubbag'),
(3, 'kpa'),
(4, 'bendahara'),
(5, 'ppk'),
(6, 'pptk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usul_npd`
--

CREATE TABLE `usul_npd` (
  `id_usul_npd` varchar(100) NOT NULL,
  `tgl_usul_npd` int(11) NOT NULL,
  `jenis_npd` int(11) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `rak_tersedia` int(11) NOT NULL,
  `akum_before` int(11) NOT NULL,
  `pencairan` int(11) NOT NULL,
  `akum_after` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status_pptk` int(11) NOT NULL,
  `status_kpa` int(11) NOT NULL,
  `status_ppkeu` int(11) NOT NULL,
  `status_bend` int(11) NOT NULL,
  `kwitansi` varchar(100) NOT NULL,
  `id_usul_anggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `permintaan_anggaran`
--
ALTER TABLE `permintaan_anggaran`
  ADD PRIMARY KEY (`id_permintaan_anggaran`);

--
-- Indeks untuk tabel `rek_05`
--
ALTER TABLE `rek_05`
  ADD PRIMARY KEY (`id_rek_05`);

--
-- Indeks untuk tabel `rek_06`
--
ALTER TABLE `rek_06`
  ADD PRIMARY KEY (`id_rek_06`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `usul_npd`
--
ALTER TABLE `usul_npd`
  ADD PRIMARY KEY (`id_usul_npd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
