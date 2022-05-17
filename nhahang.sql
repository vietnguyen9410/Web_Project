-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2022 lúc 05:09 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhahang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `ten` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten`) VALUES
(4, 'lẩu'),
(5, 'món mực'),
(6, 'món cá'),
(7, 'hàu và ghẹ'),
(8, 'danh mục test');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don`
--

CREATE TABLE `don` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tenmon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giamon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thoigiandat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `id` int(11) NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaimon` int(10) NOT NULL,
  `id_dm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`id`, `ten`, `gia`, `img`, `loaimon`, `id_dm`) VALUES
(4, 'lẩu tiến vua', '120000', 'lẩu-tiến vua.jpg', 1, 4),
(5, 'mực hấp hành gừng', '100000', 'mực-hấp-hành-gừng.jpg', 0, 5),
(6, 'mực xào thập cẩm', '120000', 'mực-xào-thập cẩm.png', 0, 5),
(7, 'cá hồng sốt cam', '90000', 'cá-hồng-sốt cam.jpg', 0, 6),
(8, 'cá kho tộ', '100000', 'cá-kho-tộ.jpg', 1, 6),
(9, 'sashimi cá mú', '120000', 'sashimi-cá-mú.jpg', 0, 6),
(10, 'cá thu sốt cà', '80000', 'cá-thu-sốt-cà.jpg', 1, 6),
(11, 'ghẹ hấp sả', '300000', 'ghẹ-hấp.jpg', 0, 7),
(12, 'ghẹ sốt tiêu', '270000', 'ghẹ-sốt-tiêu.jpg', 0, 7),
(13, 'hàu nướng mỡ hành', '80000', 'hàu-nướng-mỡ-hành.jpg', 0, 7),
(14, 'hàu nướng phô mai', '120000', 'hàu-nướng-phô-mai.jpg', 0, 7),
(15, 'món thử', '100000', 'tôm-hùm-muối-ớt.jpg', 1, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(11) NOT NULL,
  `ten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyendung`
--

INSERT INTO `tuyendung` (`id`, `ten`, `noidung`) VALUES
(4, 'tuyển nhân viên phục vụ', 'yêu cầu nhanh nhẹn, hoạt bát, trung thực, \r\ntừ 18 đến 28 tuổi\r\nLương 22k/h\r\nthời gian làm từ 8h sáng đến 17h30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hovaten` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `hovaten`, `password`, `quyen`) VALUES
(6, 'duyanh07112004da@gmail.com', 'Duy Anh', '123', 1),
(7, 'duyanh07112002da@gmail.com', 'Trần Thị Phương', '123', 2),
(8, 'duyanh07112002da@gmail.com', 'Duy Anh Nam', '123', 2),
(9, 'duyanh@gmail.com', 'Duy Anh Nam', '1234', 2),
(10, 'duyanh@gmail.com', 'Duy Anh Nam', '1234', 2),
(11, 'duyanh@gmail.com', 'Duy Anh Nam', '1234', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don`
--
ALTER TABLE `don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `don`
--
ALTER TABLE `don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `mon`
--
ALTER TABLE `mon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don`
--
ALTER TABLE `don`
  ADD CONSTRAINT `don_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `mon`
--
ALTER TABLE `mon`
  ADD CONSTRAINT `mon_ibfk_1` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
