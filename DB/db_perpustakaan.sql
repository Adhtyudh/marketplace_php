-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'komedi'),
(2, 'klasik'),
(4, 'nama'),
(5, 'tes'),
(6, 'horror');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isbn` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `gambar`, `create_at`, `update_at`, `isbn`, `id_kategori`) VALUES
(2, 'The Design of Everyday Things', 'Don Norman', 'Basic Book', 'thedesignofeverydaythings.jpg', '2022-02-27 13:59:44', '2022-02-27 13:59:44', '9780465050659\r\n', 2),
(4, 'Lean UX', 'Jeff Gothelf', 'O\'Reilly Media', 'leanux.jpg', '2022-02-27 14:07:10', '2022-02-27 14:07:10', '978-1449311650', 1),
(10, 'Menanti Hari Yang Berganti', 'notavailable', 'kepo', '130369-80a181d9ce021b264f721bb4dcc9a04a4e2e14e4.jpeg', '2022-03-17 02:32:23', '2022-03-17 02:32:23', '123', 2),
(11, 'Sabtu Bersama Bapak', 'notavailable', 'kepo', '20151010090159-4-4-novel-indonesia-pilihan-003-rizky-wahyu-permana.jpg', '2022-03-17 02:33:09', '2022-03-17 02:33:09', '123', 1),
(12, 'Menanti Hari Yang Berganti', 'notavailable', 'kepo', 'Frame 192 5.png', '2022-03-17 04:20:03', '2022-03-17 04:20:03', '234', 0),
(13, 'TO Kill', 'notavailable', 'yuuuu', 'thedesignofeverydaythings.jpg', '2022-03-17 04:51:55', '2022-03-17 04:51:55', '234', 2),
(14, 'Sabtu Bersama Bapak', 'ppp', 'kepo', 'Frame 192 5.png', '2022-03-17 04:55:52', '2022-03-17 04:55:52', '234', 5),
(15, 'mboh', 'ppp', 'kepo', 'thedesignofeverydaythings.jpg', '2022-03-17 04:56:42', '2022-03-17 04:56:42', '234', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Niagahoster Tutorial', 'nhtutorial@gmail.com', '0139a3c5cf42394be982e766c93f5ed0'),
(2, 'yudh', 'yudh@email.com', '202cb962ac59075b964b07152d234b70'),
(4, '', 'adrian@email.com', '202cb962ac59075b964b07152d234b70'),
(5, 'sopo', 'sopo@email.com', '202cb962ac59075b964b07152d234b70'),
(6, 'faisarfian', 'faisganteng@gmail', '7940ab47468396569a906f75ff3f20ef'),
(7, 'ratih kinanti', 'ntugateli@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'adif', 'adif@email.com', '202cb962ac59075b964b07152d234b70'),
(9, 'wawok', 'wawok@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
