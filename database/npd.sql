-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2025 pada 10.55
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

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
('bddb2865-536a-11f0-8b53-f8fe5ef7d437', 3, 'fec23f41-5369-11f0-8b53-f8fe5ef7d437', 2025),
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
-- Struktur dari tabel `jenis_npd`
--

CREATE TABLE `jenis_npd` (
  `id_jenis_npd` varchar(100) NOT NULL,
  `nama_jenis_npd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_npd`
--

INSERT INTO `jenis_npd` (`id_jenis_npd`, `nama_jenis_npd`) VALUES
('b74f66bb-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Perjalanan Dinas Luar Daerah'),
('b74f66bb-5418-11f0-8b53-f8fe5ef7d478', 'Belanja Perjalanan Dinas Dalam Daerah'),
('be215365-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Alat Tulis Kantor'),
('c17772ee-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Cetak'),
('c7aba7d7-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Penggandaan'),
('cfaea496-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Prangko, Materai dan Benda Pos Lainnya'),
('d631ae93-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Makan dan Minum Rapat'),
('de0b6a8d-5418-11f0-8b53-f8fe5ef7d437', 'Belanja Honorarium Tim Pengelola Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(100) NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `id_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `kode_kegiatan`, `nama_kegiatan`, `id_program`) VALUES
('c906b656-5659-11f0-b601-c454445434d3', '4.01.01.2.01', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', 'aa5d18e3-5658-11f0-b601-c454445434d3');

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
('f9b41073-5363-11f0-8b53-f8fe5ef7d437', '1', 'Syarif Firdaus', '2fc994bd-5336-11f0-8b53-f8fe5ef7d437', '$2y$10$MTlqVUVTcJB8xI6N.IcyJO4a3a7DPDb.PusBIMS2uwYCsZJYdKY/.'),
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
  `catatan` varchar(100) NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `status_pptk` int(11) NOT NULL,
  `status_kpa` int(11) NOT NULL,
  `status_ppkeu` int(11) NOT NULL,
  `status_bend` int(11) NOT NULL,
  `id_jenis_npd` varchar(100) NOT NULL,
  `ppn` int(11) NOT NULL,
  `pajak_daerah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_npd` int(11) NOT NULL,
  `catatan_npd` varchar(100) NOT NULL,
  `no_npd` varchar(100) NOT NULL,
  `tgl_persetujuan_kpa` date DEFAULT NULL,
  `tgl_persetujuan_pptk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan_anggaran`
--

INSERT INTO `permintaan_anggaran` (`id_permintaan_anggaran`, `tgl_permintaan_anggaran`, `kegiatan`, `sub_kegiatan`, `program`, `no_dpa`, `tahun_anggaran`, `status_permintaan`, `id_rek_05`, `id_rek_06`, `id_akun`, `file`, `tgl_input`, `catatan`, `dokumen`, `status_pptk`, `status_kpa`, `status_ppkeu`, `status_bend`, `id_jenis_npd`, `ppn`, `pajak_daerah`, `total`, `status_npd`, `catatan_npd`, `no_npd`, `tgl_persetujuan_kpa`, `tgl_persetujuan_pptk`) VALUES
('032957d9-5589-11f0-83ec-c454445434d3', '2025-06-30', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', ' Penyusunan Dokumen Perencanaan Perangkat Daerah', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', '4.01.03.2.04.0003', 2025, 4, '91f52979-5339-11f0-8b53-f8fe5ef7d437', '06d961c7-533b-11f0-8b53-f8fe5ef7d437', 'b4626091-536a-11f0-8b53-f8fe5ef7d437', '97b160d96cb279cc93667852ca6427c3.pdf', '2025-06-30 08:05:40', '', '', 0, 0, 0, 3, 'b74f66bb-5418-11f0-8b53-f8fe5ef7d437', 0, 0, 0, 0, 'rusak', ' 08/KSB.KEU/XI/2024', NULL, NULL),
('ab2e0bbe-562f-11f0-a0b0-c454445434d3', '2025-07-01', 'wt', 'wt', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', 'rt', 2025, 0, '91f52979-5339-11f0-8b53-f8fe5ef7d437', 'e1b008d2-533a-11f0-8b53-f8fe5ef7d437', 'b4626091-536a-11f0-8b53-f8fe5ef7d437', 'bc78fa84cf2103cd4c8b2a403e50f087.pdf', '2025-07-01 03:58:38', '', '', 0, 0, 0, 0, 'b74f66bb-5418-11f0-8b53-f8fe5ef7d437', 0, 0, 0, 0, '', '', NULL, NULL),
('cf94767a-53f3-11f0-8b53-f8fe5ef7d437', '2025-06-28', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', ' Penyusunan Dokumen Perencanaan Perangkat Daerah', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', '4.01.03.2.04.0003', 2025, 4, '91f52979-5339-11f0-8b53-f8fe5ef7d437', '06d961c7-533b-11f0-8b53-f8fe5ef7d437', 'b4626091-536a-11f0-8b53-f8fe5ef7d437', '7c7ed28ee1b3ea7ce141d7c3b2e3ddfa.pdf', '2025-06-28 07:45:02', '', 'a33a10e777dc737bab4380cdbaf7e5b0.pdf', 2, 2, 2, 2, 'be215365-5418-11f0-8b53-f8fe5ef7d437', 2, 10, 200000, 1, 'benerin', ' 08/KSB.KEU/XI/2024', '2025-07-01', '2025-07-01'),
('e24afaa7-57de-11f0-b6dd-c454445434d3', '2025-07-03', 'Perencanaan, Penganggaran, dan Evaluasi Kinerja Perangkat Daerah', ' Penyusunan Dokumen Perencanaan Perangkat Daerah', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA', '4.01.03.2.04.0003', 2025, 0, '91f52979-5339-11f0-8b53-f8fe5ef7d437', 'e1b008d2-533a-11f0-8b53-f8fe5ef7d437', 'b4626091-536a-11f0-8b53-f8fe5ef7d437', '2673d9f6ada1776c93dfc584117399e2.pdf', '2025-07-03 07:25:23', '', '', 0, 0, 0, 0, 'b74f66bb-5418-11f0-8b53-f8fe5ef7d437', 0, 0, 0, 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id_program` varchar(100) NOT NULL,
  `kode_program` varchar(100) NOT NULL,
  `nama_program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id_program`, `kode_program`, `nama_program`) VALUES
('aa5d18e3-5658-11f0-b601-c454445434d3', '4.01.01', 'PROGRAM PENUNJANG URUSAN PEMERINTAHAN DAERAH KABUPATEN/KOTA');

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
-- Struktur dari tabel `rincian_npd`
--

CREATE TABLE `rincian_npd` (
  `id_rincian_npd` varchar(100) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `anggaran` int(11) NOT NULL,
  `rak_tersedia` int(11) NOT NULL,
  `akum_before` int(11) NOT NULL,
  `pencairan` int(11) NOT NULL,
  `akum_after` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `id_permintaan_anggaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rincian_npd`
--

INSERT INTO `rincian_npd` (`id_rincian_npd`, `uraian`, `anggaran`, `rak_tersedia`, `akum_before`, `pencairan`, `akum_after`, `sisa`, `id_permintaan_anggaran`) VALUES
('2abe6426-542b-11f0-8b53-f8fe5ef7d437', 'Buku Eskpedisi', 100, 80000, 70000, 60000, 50000, 400000, 'cf94767a-53f3-11f0-8b53-f8fe5ef7d437'),
('3d8f232c-5496-11f0-a6b2-f8fe5ef7d437', 'Buku Eskpedisi', 100000, 80000, 70000, 10000, 50000, 40000, 'cf94767a-53f3-11f0-8b53-f8fe5ef7d437'),
('4f02a6ad-542b-11f0-8b53-f8fe5ef7d437', 'Buku Eskpedisi', 100004, 80000, 70000, 60000, 50000, 40000, 'cf94767a-53f3-11f0-8b53-f8fe5ef7d437'),
('61fe9887-542b-11f0-8b53-f8fe5ef7d437', 'Buku Eskpedisi', 100000, 80000, 70000, 60000, 50000, 40000, 'cf94767a-53f3-11f0-8b53-f8fe5ef7d437'),
('62b241d5-5496-11f0-a6b2-f8fe5ef7d437', 'Buku Eskpedisi', 100000, 80000, 70000, 10000, 50000, 40000, 'cf94767a-53f3-11f0-8b53-f8fe5ef7d437');

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
(5, 'ppkeu'),
(6, 'pptk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kegiatan`
--

CREATE TABLE `sub_kegiatan` (
  `id_sub_kegiatan` varchar(100) NOT NULL,
  `kode_sub_kegiatan` varchar(100) NOT NULL,
  `nama_sub_kegiatan` varchar(100) NOT NULL,
  `id_kegiatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_kegiatan`
--

INSERT INTO `sub_kegiatan` (`id_sub_kegiatan`, `kode_sub_kegiatan`, `nama_sub_kegiatan`, `id_kegiatan`) VALUES
('48ef2675-57de-11f0-b6dd-c454445434d3', '4.01.01.2.01.0002', ' Penyusunan Dokumen', 'c906b656-5659-11f0-b601-c454445434d3'),
('bff63774-565a-11f0-b601-c454445434d3', '4.01.01.2.01.0001', ' Penyusunan Dokumen Perencanaan Perangkat Daerah', 'c906b656-5659-11f0-b601-c454445434d3');

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
-- Indeks untuk tabel `jenis_npd`
--
ALTER TABLE `jenis_npd`
  ADD PRIMARY KEY (`id_jenis_npd`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

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
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

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
-- Indeks untuk tabel `rincian_npd`
--
ALTER TABLE `rincian_npd`
  ADD PRIMARY KEY (`id_rincian_npd`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `sub_kegiatan`
--
ALTER TABLE `sub_kegiatan`
  ADD PRIMARY KEY (`id_sub_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
