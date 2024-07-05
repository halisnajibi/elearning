-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Nov 2022 pada 01.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_absen_siswa`
--

CREATE TABLE `tbl_absen_siswa` (
  `id_absen` int(11) NOT NULL,
  `id_buku_absen` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jam_absen` time NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_absen_siswa`
--

INSERT INTO `tbl_absen_siswa` (`id_absen`, `id_buku_absen`, `id_siswa`, `status`, `jam_absen`, `keterangan`) VALUES
(3, 8, 64, 'hadir', '05:03:10', 'Berhasil'),
(4, 10, 64, 'sakit', '05:03:16', 'Berhasil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nip`, `nama`, `jk`, `tanggal_lahir`, `tempat_lahir`, `email`, `telepon`, `alamat`, `foto`, `id_user`) VALUES
(3, '041002', 'admin super', 'laki-laki', '2022-11-10', 'hss', 'sdsdsa', '2323', 'dsad', 'default.png', 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku_absen`
--

CREATE TABLE `tbl_buku_absen` (
  `id_buku_absen` int(11) NOT NULL,
  `id_pertemuan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku_absen`
--

INSERT INTO `tbl_buku_absen` (`id_buku_absen`, `id_pertemuan`, `tanggal`, `jam_mulai`, `jam_akhir`) VALUES
(8, 27, '2022-11-22', '09:13:00', '12:31:59'),
(10, 28, '2022-11-22', '09:13:00', '12:17:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nip`, `nama`, `jk`, `tanggal_lahir`, `tempat_lahir`, `email`, `telepon`, `alamat`, `foto`, `id_user`) VALUES
(8, '114', 'guru 1', 'laki-laki', '0000-00-00', 'hss', 'hafiz.amandit@gmail.com', '21212', 'dsadada', 'default.png', 92);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kd_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kd_kelas`, `nama_kelas`) VALUES
(1, '1aa', 'x ipa1'),
(2, '1aaaa', 'x ipa2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar_materi`
--

CREATE TABLE `tbl_komentar_materi` (
  `id_km` int(11) NOT NULL,
  `id_pertemuan` int(11) NOT NULL,
  `komentar` varchar(100) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komentar_materi`
--

INSERT INTO `tbl_komentar_materi` (`id_km`, `id_pertemuan`, `komentar`, `dibuat`, `status`, `nama`) VALUES
(1, 28, 'komentar pertama', '2022-11-19 16:57:43', '0', 'guru 1'),
(2, 27, 'komentar saya', '2022-11-19 17:15:15', '0', 'guru 1'),
(3, 27, 'komentar kedua', '2022-11-21 03:47:46', '0', 'guru 1'),
(4, 27, 'wewqewqe', '2022-11-21 03:52:05', '2', 'guru 1'),
(5, 28, 'kita balas', '2022-11-21 03:56:52', '1', 'guru 1'),
(6, 27, 'maaf', '2022-11-21 17:12:48', '2', 'halis'),
(7, 27, 'halis komentar', '2022-11-21 17:30:34', '0', 'halis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kd_mapel` varchar(5) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `kd_mapel`, `nama_mapel`) VALUES
(3, 'm01', 'bahasa indonesia'),
(4, 'm02', 'bahasa inggris'),
(5, 'm10', 'bilogi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pertemuan`
--

CREATE TABLE `tbl_pertemuan` (
  `id_pertemuan` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `judul_pertemuan` varchar(50) NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `materi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `absen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pertemuan`
--

INSERT INTO `tbl_pertemuan` (`id_pertemuan`, `id_ruangan`, `id_guru`, `judul_pertemuan`, `tanggal_pertemuan`, `materi`, `file`, `status`, `absen`) VALUES
(27, 7, 8, 'pertemuan 1', '2022-11-16', '<p><b>e<b>x<b>t<b> <b>e<b>ver since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into e</b>lectronic</b> typesett</b>ing, rema</b>ining ess</b>entially </b>unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'kosong', 'posting', 'Ya'),
(28, 7, 8, 'pertemuan 2', '2022-11-17', '<p>hjjhh</p>', 'RPL_2_Pengenalan_Rekayasa_Perangkat_Lunak_(1).ppt', 'posting', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `kode_ruangan` varchar(15) NOT NULL,
  `dibuat` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_guru`, `id_kelas`, `nama_ruangan`, `kode_ruangan`, `dibuat`, `keterangan`) VALUES
(7, 8, 1, 'biologi ipa1 2022', 'ujicoba', '2022-11-14', 'cekk saru'),
(8, 8, 1, 'biologi ipa2 2022', 'eqwe', '2022-11-14', 'dsdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama`, `jk`, `email`, `telepon`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `foto`, `id_user`) VALUES
(64, '123', 'halis', 'laki-laki', 'najib@man2hss.sch.id', '1234', '2022-11-23', 'hss', 'erewr', 'default.png', 88),
(65, '4545', 'adit', 'laki-laki', 'adit@gmail.com', 'erre', '2022-11-08', 'erewer', 'ewr', 'default.png', 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa_ruangan`
--

CREATE TABLE `tbl_siswa_ruangan` (
  `id_sr` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa_ruangan`
--

INSERT INTO `tbl_siswa_ruangan` (`id_sr`, `id_ruangan`, `id_siswa`, `tanggal_masuk`, `status`) VALUES
(5, 7, 64, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(70, '041002', '$2y$10$ugVouPUWzHM2zZjAECfRWeV/J4MPRGyJyGIBReHsF1Rboh.4NIT6m', 'Admin', '1'),
(88, '123', '$2y$10$XSlS4lx4WkrO3k79L919oeCxuG0Q5LyVoCnvS1gy.vQDBJx.Ee7G.', 'Siswa', '1'),
(89, '4545', '$2y$10$Wt6mC6bfY89mfY4gyrvWdudHQa1pcM1nKNLsgU.CNqBIfcJ19Vd3O', 'Siswa', '1'),
(92, '114', '$2y$10$VpukGagcQtOhPalhpE3sbOFIZldrjwEpdl2t1l.chNx1.Z450wr/K', 'Guru', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_absen_siswa`
--
ALTER TABLE `tbl_absen_siswa`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_buku_absen` (`id_buku_absen`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  ADD PRIMARY KEY (`id_buku_absen`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  ADD PRIMARY KEY (`id_km`),
  ADD KEY `id_pertemuan` (`id_pertemuan`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_pertemuan`
--
ALTER TABLE `tbl_pertemuan`
  ADD PRIMARY KEY (`id_pertemuan`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_siswa_ruangan`
--
ALTER TABLE `tbl_siswa_ruangan`
  ADD PRIMARY KEY (`id_sr`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_absen_siswa`
--
ALTER TABLE `tbl_absen_siswa`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  MODIFY `id_buku_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_pertemuan`
--
ALTER TABLE `tbl_pertemuan`
  MODIFY `id_pertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa_ruangan`
--
ALTER TABLE `tbl_siswa_ruangan`
  MODIFY `id_sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_absen_siswa`
--
ALTER TABLE `tbl_absen_siswa`
  ADD CONSTRAINT `tbl_absen_siswa_ibfk_1` FOREIGN KEY (`id_buku_absen`) REFERENCES `tbl_buku_absen` (`id_buku_absen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_absen_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_buku_absen`
--
ALTER TABLE `tbl_buku_absen`
  ADD CONSTRAINT `tbl_buku_absen_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tbl_pertemuan` (`id_pertemuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `tbl_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_komentar_materi`
--
ALTER TABLE `tbl_komentar_materi`
  ADD CONSTRAINT `tbl_komentar_materi_ibfk_1` FOREIGN KEY (`id_pertemuan`) REFERENCES `tbl_pertemuan` (`id_pertemuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pertemuan`
--
ALTER TABLE `tbl_pertemuan`
  ADD CONSTRAINT `tbl_pertemuan_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pertemuan_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD CONSTRAINT `tbl_ruangan_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ruangan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_siswa_ruangan`
--
ALTER TABLE `tbl_siswa_ruangan`
  ADD CONSTRAINT `tbl_siswa_ruangan_ibfk_1` FOREIGN KEY (`id_ruangan`) REFERENCES `tbl_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_siswa_ruangan_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
