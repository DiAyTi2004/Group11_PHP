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
insert into tbl_payment_type values ('cc01ac4e-e003-430c-9076-236b55a8991c','Tiền mặt','#TM','Thanh toán trực tiếp bằng tiền mặt là một phương thức phổ biến, đặc biệt là trong các giao dịch hàng ngày, mua sắm tại cửa hàng truyền thống hoặc chợ.');
insert into tbl_payment_type values ('78e09f60-bb2b-4bc7-86c2-ca27a33aa5c8','Chuyển khoản ngân hàng','#CKNN','Người mua có thể chuyển tiền trực tiếp từ tài khoản ngân hàng của họ sang tài khoản của người bán. Phương thức này thường được sử dụng cho các giao dịch lớn và trực tuyến.');
insert into tbl_payment_type values ('2e198743-d03d-43db-ac59-3f2bb47d5de3','Thẻ tín dụng và thẻ ghi nợ','#TTD&GN','Thanh toán bằng thẻ tín dụng hoặc thẻ ghi nợ là một phương thức phổ biến cho mua sắm trực tuyến và offline. Visa và MasterCard là hai loại thẻ phổ biến tại Việt Nam.');
insert into tbl_payment_type values ('fdc8f73c-e3f6-4cb9-add0-c5a661563c9d','Ví điện tử','#VĐT','Sử dụng ví điện tử như MoMo, ZaloPay, ViettelPay, AirPay là cách thanh toán tiện lợi và ngày càng phổ biến. Người dùng có thể liên kết ví điện tử với tài khoản ngân hàng hoặc thẻ tín dụng để thực hiện thanh toán.');
insert into tbl_payment_type values ('8d3c67e6-a124-4a6d-857d-869815ad189a','Chuyển phát nhanh COD','#COD','Trong trường hợp mua sắm trực tuyến, người mua có thể thanh toán khi nhận hàng, tiền mặt hoặc qua thẻ tín dụng. Phương thức này giúp người mua kiểm tra sản phẩm trước khi thanh toán.');
insert into tbl_payment_type values ('790a1183-21d3-4ca5-bb84-1f8d7349b014','Internet Banking và Mobile Banking','#BANKING','Sử dụng dịch vụ ngân hàng trực tuyến qua Internet Banking hoặc ứng dụng Mobile Banking để thực hiện các giao dịch thanh toán.');
insert into tbl_payment_type values ('64473054-f544-4a9c-9480-3c1a4e13df1e','Thanh toán qua QR Code','#QR','Sử dụng ứng dụng ví điện tử hoặc ứng dụng thanh toán trực tuyến để quét mã QR Code và thực hiện thanh toán.');

create table tbl_size (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
insert into tbl_size values ('a1b14f82-848e-11ee-b962-0242ac120002', 'S35', 'Cỡ 35', 'Đây thường là những size dành cho người có bàn chân nhỏ và nhẹ. Size 35 thường là size phổ biến cho giày dành cho nữ.');
insert into tbl_size values ('2dd58a8c-848f-11ee-b962-0242ac120002', 'S36', 'Cỡ 36', 'Đây thường là những size dành cho người có bàn chân nhỏ và nhẹ. Size 36 thường là size phổ biến cho giày dành cho nữ.');
insert into tbl_size values ('35a34d94-848f-11ee-b962-0242ac120002', 'S37', 'Cỡ 37', 'Đây thường là những size dành cho người có bàn chân nhỏ và nhẹ. Size 37 thường là cho cả nam và nữ.');
insert into tbl_size values ('3cb72b14-848f-11ee-b962-0242ac120002', 'S38', 'Cỡ 38', 'Đây thường là những size dành cho người có bàn chân nhỏ và nhẹ. Size 38 thường là cho cả nam và nữ.');
insert into tbl_size values ('45ef4fc2-848f-11ee-b962-0242ac120002', 'S39', 'Cỡ 39', 'Đây thường là những size dành cho người có bàn chân nhỏ và nhẹ. Size 39 thường là cho cả nam và nữ.');
insert into tbl_size values ('4c309e18-848f-11ee-b962-0242ac120002', 'S40', 'Cỡ 40', 'size này phổ biến cho người có bàn chân vừa đến lớn. Size 40 thường là size trung bình, phù hợp cho nhiều người.');
insert into tbl_size values ('525d7ba8-848f-11ee-b962-0242ac120002', 'S41', 'Cỡ 41', 'size này phổ biến cho người có bàn chân vừa đến lớn. Size 41 thường là size trung bình, phù hợp cho nhiều người.');
insert into tbl_size values ('59ad58ce-848f-11ee-b962-0242ac120002', 'S42', 'Cỡ 42', 'Size giày 42 là một lựa chọn lớn hơn và thường phù hợp với những người có chân to hoặc mong muốn sự thoải mái và không gian trong giày.');
insert into tbl_size values ('5f2518c8-848f-11ee-b962-0242ac120002', 'S43', 'Cỡ 43', 'Size giày 43 là một lựa chọn lớn hơn và thường phù hợp với những người có chân to hoặc mong muốn sự thoải mái và không gian trong giày.');
insert into tbl_size values ('6bfdd788-848f-11ee-b962-0242ac120002', 'S44', 'Cỡ 44', 'Size này thường dành cho những người có bàn chân lớn và mạnh mẽ. Size 44 thường là phổ biến cho nam giới.');
insert into tbl_size values ('72d16070-848f-11ee-b962-0242ac120002', 'S45', 'Cỡ 45', 'Size này thường dành cho những người có bàn chân lớn và mạnh mẽ. Size 45 thường là phổ biến cho nam giới.');
insert into tbl_size values ('7836460c-848f-11ee-b962-0242ac120002', 'S46', 'Cỡ 46', 'Size này thường dành cho những người có bàn chân lớn và mạnh mẽ. Size 46 thường là cho những người có bàn chân cực kỳ lớn.');
insert into tbl_size values ('809a4cf8-848f-11ee-b962-0242ac120002', 'S47', 'Cỡ 47', 'Size này thường dành cho những người có bàn chân lớn và mạnh mẽ. Size 47 thường là cho những người có bàn chân cực kỳ lớn.');

create table tbl_category (
  id varchar(36) primary key not null, 
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  category_image varchar(100),
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_category (id, code, name, category_image , description) VALUES
('a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab', 'NIKE', 'Nike','nikecategory.jpg', 'Nike là một trong những thương hiệu thể thao nổi tiếng toàn cầu, được biết đến với việc sản xuất và phân phối đa dạng sản phẩm thể thao và thời trang.'),
('582d296d-37f7-4b0e-81ca-ff311581c2b6','ADIDAS','Adidas','adidas.png','Giày Adidas là một dòng sản phẩm giày thể thao và thời trang của thương hiệu Adidas, một trong những nhãn hiệu nổi tiếng hàng đầu trên thế giới. Adidas đã tạo ra nhiều mẫu giày khác nhau, phục vụ nhu cầu của người tiêu dùng từ các hoạt động thể thao đến thời trang hàng ngày.'),
('1ab78998-fa75-4abb-b937-4e59a483c171','CONVERSE','Converse','Converse.png','Giày Converse là những đôi giày thể thao mang đậm phong cách retro và văn hóa đô thị. Dòng giày nổi tiếng nhất của Converse là Chuck Taylor All Star, một biểu tượng thời trang đã tồn tại từ những năm 1920 và trở thành một trong những mẫu giày phổ biến nhất trên thế giới.'),
('aa3166a2-6534-40a1-a1a6-cc6839cfa666','JORDAN','Jordan','jordan.png','Giày Jordan là một dòng sản phẩm giày thể thao và thời trang của thương hiệu Jordan Brand, một phần của tập đoàn Nike. Dòng giày này được đặt tên theo huyền thoại bóng rổ Michael Jordan, người đã trở thành một trong những cầu thủ xuất sắc nhất trong lịch sử môn thể thao này.'),
('9a4ab55e-3844-4d25-b20a-893b1bf7c980','MLB','Mlb','MLB.png','Mẫu giày được ưa chuộng trong giới baseball, được sử dụng trong các trận đấu Major League Baseball (MLB) hoặc được thiết kế với phong cách và ý tưởng liên quan đến bóng chày.'),
('31895546-7989-4d6b-b45e-dd507da913c7','NEW BALANCE','New Balance','newbalance.png','Giày New Balance là sản phẩm của thương hiệu giày thể thao New Balance, một trong những nhãn hiệu nổi tiếng và đáng tin cậy trên thế giới.'),
('31c124fe-dfdf-4777-aecb-895449fc3cbe','PUMA','Puma','puma.png','Puma là một trong những thương hiệu giày và thể thao hàng đầu trên thế giới, có trụ sở chính tại Herzogenaurach, Đức.'),
('99d98fa2-5448-4245-ab31-1fdc94cd727d','TODS','Tods','tods.png','Tods là một thương hiệu thời trang và giày dép cao cấp có trụ sở tại Ý, nổi tiếng với việc sản xuất giày da chất lượng cao và các sản phẩm thời trang sang trọng.'),
('90261ccc-7523-46c4-a50d-bf444c6ef699','VANS','Vans','vans.png','Vans là một thương hiệu giày và thời trang đường phố nổi tiếng, xuất phát từ California, Hoa Kỳ. Đặc biệt là với dòng giày skate và lifestyle.'),
('3e1b10c3-9fce-4e00-8304-850cefb45b55','YEEZY','Yeezy','yeezy.png','Yeezy là kết quả của sự hợp tác giữa Kanye West và Adidas, một trong những thương hiệu thể thao hàng đầu trên thế giới. Sự kết hợp giữa tầm nhìn sáng tạo của Kanye West và kỹ thuật sản xuất của Adidas đã tạo ra các sản phẩm độc đáo và độc lập.');

create table tbl_event (
  id varchar(36) primary key not null,
  start_date datetime ,
  end_date datetime ,
  discount float ,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  banner LONGTEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
insert into tbl_event values ('8d7a68e9-1783-4aff-8c71-1814bcdbda46','2023-10-01 08:00:00 SA','2023-10-30 22:00:00 CH','50%','#1','Ưu đãi tháng 10','Sự kiện giảm giá và khuyến mãi đặc biệt cho mùa đông đã tới.','even1.png');
insert into tbl_event values ('c271c6ed-6926-4be9-afc6-b11b3e957ef3','2023-10-15 08:00:00 SA','2023-10-30 22:00 CH','70%','#2','Flash Sale','Sale giá sốc-giảm đến 70%, freeship từ 2 đôi.','even2.png');
insert into tbl_event values ('2d5d30f9-066f-4839-a973-2aa971803024','2023-11-01 08:00:00 SA','2023-11-10 22:00 CH','60%','#3','Ra mắt Sản phẩm Mới','Ra mắt sản phẩm mới cực hot. Bốc thăm giảm giá cực sốc cho 5 khách hàng may mắn.','even3.png');
insert into tbl_event values ('452b9451-e86e-4048-a6ee-0d13dc857483','2023-11-11 08:00:00 SA','2023-11-21 22:00 CH','40%','#4','Mua càng nhiều giảm càng nhiều','Mua từ 3 đôi trở lên nhận giảm giá cực sốc.','even4.png');
insert into tbl_event values ('f2822729-c278-4b25-9aba-6f2bd1a02133','2023-12-01 08:00:00 SA','2023-12-16 22:00 CH','30%','#5','Chương trình mua giày cặp đôi','Khách hàng là cặp đôi sẽ nhận về ưu đãi, giảm giá và quà tặng giá trị.','even5.png');
insert into tbl_event values ('afcd72e9-6ec2-4d47-8a82-50477d6216dd','2023-12-17 08:00:00 SA','2023-12-30 22:00 CH','30%','#6','Ngày lễ kỉ niệm','Lễ kỉ niệm 40 năm của hãng Bitit, giảm giá sốc với các sản phẩm hãng Bitit.','even6.png');
insert into tbl_event values ('4cf28b83-1694-4e3d-af7b-5c0b3c4780a0','2023-10-13 08:00:00 SA','2023-10-14 22:00 CH','50%','#7','Sự kiện BlackFriday','Giảm giá cực sốc khi khách hàng đến với shoesland vào dịp này.','even7.jpg');
insert into tbl_event values ('2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e','2023-12-23 00:00:00 SA','2023-12-25 23:59 CH','50%','#8','Ngày lễ Giáng Sinh','Giảm giá cực sốc đối với các sản phẩm có màu đỏ và xanh lá.','even8.jpg');
insert into tbl_event values ('d3950d8f-7e44-4786-8caf-f480f2b34540','2023-12-27 08:00:00 SA','2024-01-03 22:00 CH','50%','#9','Tết dương lịch','Giảm giá cực sốc khi khách hàng đến với shoesland vào dịp này.','even9.png');
insert into tbl_event values ('11afef6c-bff6-432b-82eb-d44ba44743e2','2024-02-08 00:00:00 SA','2024-02-14 23:59 CH','50%','#10','Tết Nguyên Đán','Giảm giá cực sốc khi khách hàng đến với shoesland vào dịp này.','even10.png');



create table tbl_product (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  price float ,
  category_id varchar(36) not null,
  event_id varchar(36) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_user (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  user_image LONGTEXT,
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
insert into tbl_status (id, code, name, description) value 
('f1e30780-f494-477d-8fba-63d280843c91','S1','Chờ xác nhận','Trạng thái đầu tiên khi khách hàng đặt hàng thành công và hệ thống ghi nhận thông tin đơn hàng.'),
('94ea518b-b5cf-4ee3-8f8b-65a73c33a7e8','S2','Đã xác nhận','Khách hàng nhận được xác nhận đơn hàng qua email hoặc tin nhắn, xác nhận rằng đơn hàng của họ đã được nhận và đang được xử lý.'),
('1221802e-1ad2-4aba-91ae-69b86270ae32','S3','Đang đóng gói','Đơn hàng bắt đầu được xử lý và chuẩn bị để đóng gói.'),
('30928569-9d4c-4e24-a2f5-447a1cc895b5','S4','Chờ lấy hàng','Sản phẩm đã đóng gói xong và chờ đối tác vận chuyển đến lấy.'),
('3f8c1efb-7b9e-4bdd-a856-d45e01053585','S5','Chờ giao hàng','Sản phẩm được đóng gói cẩn thận và chuyển giao cho đối tác vận chuyển để giao hàng.'),
('6e5f0c4f-bec1-4766-9af6-8f5928f56287','S6','Đang giao hàng','Đơn hàng đã rời kho và đang trên đường để được giao đến địa chỉ của khách hàng.'),
('2fb6fe9b-c49c-4358-8dc1-943e20f5f094','S7','Đã giao hàng','Đơn hàng đã được giao thành công đến tay khách hàng.'),
('10dcaad2-8c9e-4078-85b4-8fbd6ed50c26','S8','Đã hủy','Trạng thái này xảy ra khi đơn hàng bị hủy bởi khách hàng hoặc do các lý do khác.'),
('00c64206-1c21-4fb8-b679-007de67d76c9','S9','Trả hàng','Đơn hàng đã được trả lại do lý do nào đó, và quá trình xử lý đơn hàng trả lại bắt đầu.'),
('6e4134f7-7ef4-4244-8a6e-4ae3ac5bbfa5','S10','Hoàn tiền','Khi đơn hàng được trả lại, quá trình hoàn tiền được thực hiện nếu có.'),
('b0b461c2-2309-4b2a-b186-f415368105e7','S11','Hoàn thành','Trạng thái cuối cùng của đơn hàng khi tất cả các quy trình liên quan đã được hoàn tất.');
create table tbl_order (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  user_id varchar(36) not null,
  status_id varchar(36) not null,
  receive_phone varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  receive_address varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  delivery_cost float ,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_order_detail (
  order_id varchar(36) not null,
  product_id varchar(36) not null,
  size_id varchar(36) not null,
  quantity int,
  unit_price float ,
  primary key (order_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_product_image (
  id varchar(36) primary key not null,
  product_id varchar(36) not null,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  content varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
   main_image TINYINT(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_product_size (
  product_id varchar(36) not null,
  size_id varchar(36) not null,
  quantity int,
  primary key (product_id, size_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;