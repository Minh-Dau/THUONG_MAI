-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th10 17, 2023 lúc 11:40 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `frm_dangky`
--

CREATE TABLE `frm_dangky` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phanquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `frm_dangky`
--

INSERT INTO `frm_dangky` (`id`, `email`, `username`, `password`, `phanquyen`) VALUES
(25, '', 'abc', '$2y$10$YMgnoB1Sm14mNmATS.bwJOzWCROfDsS0n9B92KQHTzV1GB4FAZDqO', 0),
(26, '', 'banoi', '$2y$10$E3zWY26cUYMt3hPsA0jgfejAiD43x0QTT/XG4mnC7V0pxFp9KkHym', 0),
(27, 'thanhqui0232@gmail.com', 'thanhqui', '$2y$10$zvuWJ1h3vg/MPiVCD6WliufeOKNGvBi0WefseImZF2zWCrn.cnIzC', 0),
(28, 'ongchunho004@gmail.com', 'thanhqui45', '$2y$10$tSJRGhI3ufUIQr2q6xZimestqRZXq994R19HVw.oi3Ma87Ux.xvPy', 0),
(29, 'thanhqui02323@gmail.com', 'nguyenthanhqui', '$2y$10$Gk0Rt0gOslwDPX/JEp/wGOoeEh.zMzfGq3N6I./6/Erk/8iBx2jCm', 0),
(30, 'anhqui@gmail.com', 'anhquidz', '$2y$10$MIGHRfpJc/G2FrVwrcvEWuNXg0rnCAZ8Z6lqSFD6UilNRytAkYCDa', 0),
(31, 'thanhqui022232@gmail.com', 'nguyenthanhqui123', '123', 0),
(32, 'thanhqui0232333@gmail.com', 'goku', '$2y$10$fijLHA2HxftxNcIutDYKfeL21j8vua26f3VH3Q7Ox2M2g82qUNMTm', 0),
(34, 'nhan@sad.com', 'nhan123', '$2y$10$j.G4QXlreCj0STqUCU1L9uBAznvwMfsvgVOdY5rWRWvzvOfP1JCU.', 0),
(35, 'thanhqui023222@gmail.com', 'nhanqui', '$2y$10$jof.6wuf7uCDdYdMmJxmQOCw1Fxa1pJYLkmoLUCPY/tp3HvLjm63e', 0),
(36, 'ongchunho0043@gmail.com', 'nhanvaqui', '$2y$10$Rfu4E0EYUBBytdvzTSeckOANT5oBHO8K7bNZ7urK1SCWFTCuJr1LS', 0),
(38, 'ongchunho00455@gmail.com', 'quinguyen', '$2y$10$tBK2udCwKvFYXtabvdgSt.Zdkdr7mWGuFtgBnLw.9847MTlvJFm56', 0),
(39, 'anhquidz', 'quidz', '$2y$10$Kz7i95AgvT/YMx6Rf.cuwu40OYbMbnZUjj.lEgDpBEQITPYaNcANi', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `frm_dangky`
--
ALTER TABLE `frm_dangky`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `frm_dangky`
--
ALTER TABLE `frm_dangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
