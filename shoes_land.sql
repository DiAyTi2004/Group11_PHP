drop database if exists shoesland;

create database shoesland;
use shoesland;

-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_old_detail`
--

CREATE TABLE `tbl_cart_old_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_old_detail`
--


INSERT INTO `tbl_cart_old_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(28, '4095', 8, 2),
(29, '4095', 7, 1),
(34, '4469', 12, 1),
(35, '4469', 13, 1),
(36, '6875', 12, 1),
(37, '6875', 13, 1),
(38, '3524', 12, 1),
(39, '3524', 13, 1),
(40, '8326', 14, 1),
(41, '8326', 16, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--
INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `diachi`, `chucvu`) VALUES
(1, 'Nguyễn Minh Tâm', 'maki', 'c4ca4238a0b923820dcc509a6f75849b', 569029353, 'mikuohandsome@gmail.com', '																																																																																																																																										13/C																																																																																																																			', 1),
(9, 'Lê Văn Hùng', 'lehung', '202cb962ac59075b964b07152d234b70', 123456, 'lehung@gmail.com', 'Thanh Hóa', 0);
 
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(5, 'Đồng hồ trưng bày', 1),
(6, 'Đồng hồ thời trang', 2),
(7, 'Đồng hồ thông minh', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_payment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_payment`) VALUES
(28, 1, '4095', 0, '0'),
(31, 1, '1378', 0, '0'),
(32, 3, '6909', 0, '0'),
(34, 3, '3504', 0, '0'),
(35, 3, '4469', 0, '0'),
(36, 3, '6875', 1, 'tienmat'),
(37, 3, '3524', 1, 'Chuyển Khoảng'),
(38, 9, '8326', 1, 'Tiền Mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `id_danhmuc`, `trangthai`) VALUES
(5, 'Đồng hồ Thụy Sĩ', 'MHAQUA', 1000000, 2, 'mvw-ml005-02-nam-2-org.jpg', '', '', 5, 1),
(6, 'CASIO 25.2 mm Nữ LTP-1130A-7BRDF', 'MHFBK', 1200000, 1, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Thiết kế của đồng hồ Sheen luôn bắt mắt người đeo bởi mặt đồng hồ đa dạng và tinh tế. Những mẫu đồng hồ dành riêng cho cô nàng có phong cách cá tính và ưa thích sự mới lạ. Điểm chung của d', '', 5, 0),
(7, 'Đồng hồ MVW 40 mm Nam ML005-02', 'MHOKU', 1500000, 1, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', '', '', 5, 1),
(8, 'Đồng hồ Masstel Smart Hero 4G', 'MHAQUACB', 500000, 12, 'befit-b3-vang-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 6, 0),
(10, 'Đồng hồ cơ Rolex 3X', 'MTBHiV', 3000000, 3, 'mvw-ml005-02-nam-2-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 7, 0),
(11, 'Đồng hồ thể thao A531', 'GDUGN0', 3000000, 1, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 7, 0),
(12, 'Đồng hồ G-Shock Z123', 'MTBJG', 3500000, 1, 'g-shock-gba-900-1a6dr-nam-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 7, 0),
(13, 'Đồng hồ SamSung A7', 'MHCBKOMI', 700000, 2, 'beu-active-1-2-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 6, 1),
(14, 'Đồng hồ Apple Watch 5.0 Seris', 'MHGSBARA', 1700000, 2, 'beu-b3-den-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 5, 1),
(15, 'Đồng hồ thông minh Smart Watch 2', 'MHSAWH', 1600000, 1, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung nhưng không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn ph', '', 5, 1),
(16, 'Đồng hồ Rolex Thụy Sĩ', 'MHCBMATSURI', 15000000, 1, 'dong-ho-nam-citizen-bi5051-51a-trang-ga-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực từ dân văn phòng', '', 6, 0),
(17, 'Đồng hồ thông minh Smart Watch 2', 'asdfdf', 13990000, 12, 'befit-b3-vang-1.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 7, 0),
(18, 'Đồng hồ G-Shock Z123', 'fsddf', 2990000, 5, 'beu-pt1-den-thumb-1-1-600x600.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 7, 0),
(19, 'Đồng hồ thể thao A531', 'vcf', 19990000, 3, 'mvw-ml005-02-nam-2-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 6, 0),
(20, 'Đồng hồ SamSung A7', 'vcfs', 5999000, 6, 'masstel-smart-hero-4g-xanh-duong-2-1-org.jpg', 'Sản phẩm đồng hồ mang thương hiệu MVW với nhiều mẫu mã năng động, trẻ trung không kém phần tinh tế và sang trọng, phù hợp với tất cả mọi người hoạt động ở nhiều lĩnh vực', '', 6, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `adress`, `note`, `id_dangky`) VALUES
(1, '', '', '', '', 3),
(2, '', '', '', '', 3),
(3, 'nguyễn Minh Tâm', '05658421', '23/C', '', 1),
(4, 'Pham Anh Vinh', '', '', '', 3),
(5, 'Pham Anh Vinh', '', '', '', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_old_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_old_detail`
--
ALTER TABLE `tbl_cart_old_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

create table tbl_payment_type (
  id varchar(36) primary key not null,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_size (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert into tbl_size values ('b5e8cf2d-8b4b-4ecf-a7c1-63e7a0e3d1a9', 'S40', 'Cỡ 40', 'Kích thước giày 40 thường được coi là phổ biến và phù hợp với nhiều người, nhưng sự thoải mái và vừa vặn có thể phụ thuộc vào kiểu giày cũng như cấu trúc chân của mỗi người.');
insert into tbl_size values ('daa2e4bd-68cf-4a9e-bb69-89a7a6df7c12', 'S41', 'Cỡ 41', 'Size giày 41 (EU) thường là một lựa chọn phổ biến cho những người có chân lớn hơn, và nó cung cấp một số ưu điểm nhất định.');
insert into tbl_size values ('fc7f0e9b-0c8d-46ab-b8d5-1e38c34c738d', 'S42', 'Cỡ 42', 'Size giày 42 (EU) là một lựa chọn lớn hơn và thường phù hợp với những người có chân to hoặc mong muốn sự thoải mái và không gian trong giày.');

create table tbl_category (
  id varchar(36) primary key not null, 
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  category_image varchar(100),
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_category (id, code, name, category_image , description) VALUES
('a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab', 'NIKE', 'Nike','nikecategory.jpg', 'Nike là một trong những thương hiệu thể thao nổi tiếng toàn cầu, được biết đến với việc sản xuất và phân phối đa dạng sản phẩm thể thao và thời trang.');

create table tbl_event (
  id varchar(36) primary key not null,
  start_date datetime ,
  end_date datetime ,
  discount float ,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  banner varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_product (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  price float ,
  fake_price float ,
  category_id varchar(36) not null,
  event_id varchar(36) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_user (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  user_image varchar(100),
  fullname varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  username varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  password varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  email varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  phonenumber int(11) NOT NULL,
  address LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_cart (
  id varchar(36) primary key not null,
  user_id varchar(36) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_cart_detail (
  cart_id varchar(36) not null,
  product_id varchar(36) not null,
  quantity int,
  unit_price float ,
  primary key (cart_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_status (
  id varchar(36) primary key not null, 
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_order (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  user_id varchar(36) not null,
  payment_type_id varchar(36) not null,
  status_id varchar(36) not null,
  create_date datetime ,
  receive_phone varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  receive_address varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  delivery_cost float ,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_order_detail (
  order_id varchar(36) not null,
  product_id varchar(36) not null,
  quantity int,
  unit_price float ,
  primary key (order_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_product_image (
  id varchar(36) primary key not null,
  product_id varchar(36) not null,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  content varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  main_image bit
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_product_size (
  product_id varchar(36) not null,
  size_id varchar(36) not null,
  quantity int,
  primary key (product_id, size_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;