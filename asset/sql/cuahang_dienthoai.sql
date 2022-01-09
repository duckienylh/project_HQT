-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 04, 2022 lúc 09:34 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahang_dienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MAHD` int(11) DEFAULT NULL,
  `MADT` int(11) DEFAULT NULL,
  `SOLUONGBAN` int(11) DEFAULT NULL,
  `THANHTIEN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MAHD`, `MADT`, `SOLUONGBAN`, `THANHTIEN`) VALUES
(1, 1, 3, 950000000),
(2, 2, 3, 950000000),
(3, 3, 3, 950000000),
(4, 4, 3, 950000000),
(5, 5, 3, 950000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienthoai`
--

CREATE TABLE `dienthoai` (
  `MADT` int(11) NOT NULL,
  `TENDT` varchar(30) DEFAULT NULL,
  `SOLUONGTON` int(11) DEFAULT NULL,
  `GIABAN` float DEFAULT NULL,
  `GIANHAP` float DEFAULT NULL,
  `MOTA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dienthoai`
--

INSERT INTO `dienthoai` (`MADT`, `TENDT`, `SOLUONGTON`, `GIABAN`, `GIANHAP`, `MOTA`) VALUES
(1, 'Iphone 13 pro max', 20, 35000000, 30000000, ' phần khung viền được làm từ thép không gỉ'),
(2, 'Iphone 12 pro max', 20, 29990000, 24990000, 'sở hữu phần khung viền được vát thẳng và mạnh mẽ'),
(3, 'Iphone 11 pro max', 20, 15990000, 10990000, 'Bộ nhớ trong 512 GB'),
(4, 'Iphone 11 pro ', 20, 14990000, 9990000, 'Bộ nhớ trong 512 GB'),
(5, 'Iphone 12 pro ', 20, 25990000, 20990000, 'Bộ nhớ trong 512 GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MAKH` int(11) DEFAULT NULL,
  `MANV` int(11) DEFAULT NULL,
  `TONGTIEN` float DEFAULT NULL,
  `NGAYTAO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `MANV`, `TONGTIEN`, `NGAYTAO`) VALUES
(1, 1, 1, 53000000, '2021-01-12'),
(2, 2, 2, 54100000, '2018-01-12'),
(3, 3, 3, 52100000, '2020-11-12'),
(4, 4, 4, 59800000, '2021-12-12'),
(5, 1, 5, 55600000, '2021-03-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TENKH` varchar(50) DEFAULT NULL,
  `DIACHI` varchar(50) DEFAULT NULL,
  `SDTKH` text DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `DIACHI`, `SDTKH`, `EMAIL`) VALUES
(1, 'Nguyễn Thị Hoài', 'Hà Nội', '0945655111', 'hoai23@gmail.com'),
(2, 'Trần Thị Bích', 'Hà Nội', '0945655112', 'bich23@gmail.com'),
(3, 'Nguyễn Đức Non', 'Hà Nội', '0945655113', 'Kiennon23@gmail.com'),
(4, 'Phạm Bích Ngọc', 'Bắc Ninh', '0945655114', 'bngoc23@gmail.com'),
(5, 'Trần Thu Hoài', 'Hà Nam', '0945655115', 'thuhoai23@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MANV` int(11) NOT NULL,
  `TENNV` varchar(50) DEFAULT NULL,
  `GIOITINH` bit(1) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHINV` varchar(50) DEFAULT NULL,
  `SDTNV` text DEFAULT NULL,
  `LUONG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MANV`, `TENNV`, `GIOITINH`, `NGAYSINH`, `DIACHINV`, `SDTNV`, `LUONG`) VALUES
(1, 'Nguyễn Thị Hoa', b'0', '2001-12-12', 'Hà Nội', '0941415670', 1000000),
(2, 'Trần Thu Uyên', b'0', '2001-01-22', 'Hà Nội', '0941415671', 1000000),
(3, 'Nguyễn Hoài Phương', b'0', '2001-12-12', 'Bắc Ninh', '0941415672', 500000),
(4, 'Đinh Thái Minh', b'1', '2001-12-24', 'Hà Nội', '0941415673', 1000000),
(5, 'Trương Gia Bảo', b'1', '1996-07-25', 'Hà Nội', '0941415674', 1000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `TEN_TK` varchar(50) NOT NULL,
  `MANV` int(11) DEFAULT NULL,
  `MATKHAU` varchar(50) DEFAULT NULL,
  `NGAYTAO` date DEFAULT NULL,
  `level_TK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`TEN_TK`, `MANV`, `MATKHAU`, `NGAYTAO`, `level_TK`) VALUES
('dinhthaiminh', 1, '123', '2018-01-01', 1),
('nguyenhoaiphuong', 1, '123', '2019-01-01', 1),
('nguyenthihoa', 1, '123', '2021-01-01', 0),
('tranthuuyen', 1, '123', '2020-01-01', 0),
('truonggiabao', 1, '123', '2020-11-01', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `MAHD` (`MAHD`),
  ADD KEY `MADT` (`MADT`);

--
-- Chỉ mục cho bảng `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`MADT`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `MANV` (`MANV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MANV`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TEN_TK`),
  ADD KEY `MANV` (`MANV`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MAHD`) REFERENCES `hoadon` (`MAHD`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MADT`) REFERENCES `dienthoai` (`MADT`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khachhang` (`MAKH`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MANV`) REFERENCES `nhanvien` (`MANV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
