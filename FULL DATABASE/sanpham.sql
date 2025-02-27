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
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(50) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `gia` varchar(50) DEFAULT NULL,
  `noidungsanpham` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `img`, `gia`, `noidungsanpham`) VALUES
(1, 'T-Shirts Black V White', 'IMG/sp1.jpg', '$24', 'Insertion of Pacemaker Lead into Left Ventricle, O'),
(2, 'T-Shirts Black V Orange', 'IMG/sp2.jpg', '$24.5', 'Fusion of Lumbosacral Joint with Interbody Fusion '),
(3, 'T-Shirts White V Yellow', 'IMG/sp3.jpg', '$23', 'Computerized Tomography (CT Scan) of Bilateral Ren'),
(4, 'T-Shirts Black V Yellow', 'IMG/sp4.jpg', '$25', 'Removal of Internal Fixation Device from Right Ank'),
(5, 'T-Shirts Red V White', 'IMG/sp5.jpg', '$21', 'Bypass Left Renal Vein to Lower Vein with Autologo'),
(6, 'T-Shirts Black V Orange 999', 'IMG/sp6.jpg', '$22', 'Insertion of Other Device into Face, Percutaneous '),
(7, 'T-Shirts White V Blue Snake', 'IMG/sp7.jpg', '$23.5', 'Fusion of Right Metacarpophalangeal Joint with Non'),
(8, 'T-Shirts Red V Violet', 'IMG/sp8.jpg', '$30', 'Excision of Left Common Iliac Artery, Percutaneous'),
(9, 'Eddy', 'http://dummyimage.com/158x100.png/ff4444/ffffff', '$7.25', 'Revision of Autologous Tissue Substitute in Right '),
(10, 'Myra', 'http://dummyimage.com/140x100.png/dddddd/000000', '$9.02', 'Drainage of Left Ulna with Drainage Device, Open A');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
