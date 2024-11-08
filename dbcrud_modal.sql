-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2024 pada 14.08
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud_modal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `login_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`login_id`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmhs`
--

CREATE TABLE `tmhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` char(15) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tmhs`
--

INSERT INTO `tmhs` (`id_mhs`, `nim`, `nama`, `alamat`, `prodi`) VALUES
(1, '22091397003', 'xxx', 'Graha YKP PS 2', 'Teknik Listrik'),
(5, '22091397099', 'Samuel Alexander', 'uyauyapoh', 'S1 - Teknik Informatika'),
(7, '22091397666', 'Leomord', 'Cileduk', 'S1 - Teknik Informatika'),
(9, '22091397076', 'Martis', 'Porong', 'S1 - Teknik Informatika'),
(10, '22091397033', 'Argus', 'Serpong Utara', 'S1 - Teknik Informatika'),
(11, '22091397982', 'Jokowi', 'Solo', 'S1 - Sistem Informasi'),
(15, '666', 'Andrew tate', 'Papua barat', 'S1 - Pendidikan Teknologi'),
(22, '657', 'Sandiaga uno', 'jombang selatan', 'S1 - Sistem Informasi'),
(24, '220913987', 'fufufafa anak e mulyono', 'rungkut', 'S1 - Sistem Informasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indeks untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
