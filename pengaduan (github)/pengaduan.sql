-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2023 pada 17.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `username` varchar(15) NOT NULL,
  `nip` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`username`, `nip`) VALUES
('345345345', '23232323'),
('43434343434', '5675765675675'),
('6969696969', '98989898989898'),
('7979797979', '23232323'),
('admin', '76767'),
('coba', '3232434343'),
('jojo', '456456'),
('kevin', '1234567890'),
('operator2', '23232323'),
('opredq', '56534212312'),
('piraa', '767676767'),
('piraaaa_sm', '55635425');

-- --------------------------------------------------------

--
-- Struktur dari tabel `public`
--

CREATE TABLE `public` (
  `username` varchar(15) NOT NULL,
  `nip` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `public`
--

INSERT INTO `public` (`username`, `nip`) VALUES
('admin', '76767'),
('coba', '3232434343'),
('jojo', '456456'),
('kevin', '1234567890'),
('operator2', '23232323'),
('opredq', '5653421231'),
('piraa', '767676767'),
('piraaaa_sm', '55635425');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id_report` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `title` varchar(70) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `location` varchar(50) NOT NULL,
  `category` enum('KV','TA','PS','PK','RS','KL','KP','KR') NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id_report`, `username`, `title`, `content`, `date`, `location`, `category`, `file`) VALUES
(76, 'piraa', 'lapor', 'sdsds', '2023-03-16', 'asas', 'TA', '27760308c923db3406d060242ffd4286-bicycle.jpg'),
(92, 'piraa', 'coba tnpa while id report', 'sadsfdfdf', '2023-03-13', 'cvcv', 'KL', '4ffd00ecdec7f5ac6ee15e2c7890c67d-Screenshot (1).png'),
(94, 'jojoba', 'jghjnsfhb', 'dsdsdsdsd', '2023-03-14', 'kantn', 'KP', 'c556a5374820c805d170150898c8083b-Screenshot (4).png'),
(95, 'piraa', 'pdf', 'adadwcd', '2023-03-06', 'cvcv', 'PK', 'de9c583bf35f5c05c3b0d81d08d66565-Modul PPLG.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `respon`
--

CREATE TABLE `respon` (
  `id_respond` int(5) NOT NULL,
  `respond_date` date NOT NULL,
  `isi_respond` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `id_report` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `respon`
--

INSERT INTO `respon` (`id_respond`, `respond_date`, `isi_respond`, `username`, `id_report`) VALUES
(7, '2023-03-07', 'DADASDWAWD', 'operator', 94),
(9, '2023-03-21', 'dsdsds', 'operator', 76),
(10, '2023-03-16', 'ya gtu', 'operator', 94);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('admin','operator','public') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nip`, `username`, `password`, `level`) VALUES
(33351, '6969696969', '5656564', 'kevinanjay', 'kevin123', 'public'),
(33352, '5454545454', '767676767', 'piraa', 'pira123', 'public'),
(33353, '22113', '76767', 'admin', 'admin123', 'admin'),
(33355, '123123', '456456789789', 'jojoba', 'jojo123', 'public'),
(33356, '787878787878   ', '96534212312 ', 'operator', 'op123', 'operator'),
(33357, '89898989 ', '23232323', 'operatorrrrr', 'opr123', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `FOREIGN` (`username`);

--
-- Indeks untuk tabel `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respond`),
  ADD KEY `id_report` (`id_report`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respond` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33359;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `respon_ibfk_1` FOREIGN KEY (`id_report`) REFERENCES `report` (`id_report`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
