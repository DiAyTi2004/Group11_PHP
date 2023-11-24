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
  price float,
  createDate datetime,
  category_id varchar(36) not null,
  event_id varchar(36) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_product` (`id`, `code`, `name`, `description`, `price`, `createDate`, `category_id`, `event_id`) VALUES
('7f0f5819-7962-401c-b98f-5d7bfd92a001','SP1','Giày Nike Dunk Low Michigan State DD1391-101 Cao Cấp','Giày Nike Dunk Low Michigan State DD1391-101 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01 00:00:00','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a002','SP2','Giày Nike Wmns Dunk Low Orange Pearl DD1503-102 Cao Cấp','Giày Nike Wmns Dunk Low Orange Pearl DD1503-102 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích',1200000,'2023-10-01 00:00:00','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a003','SP3','Giày Nike SB Dunk Low Kobe White Yellow Green Black','Giày Nike SB Dunk Low Kobe White Yellow Green Black với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a004','SP4','Giày Nike Wmns Dunk Low Teddy Bear Light Soft Pink','Giày Nike Wmns Dunk Low Teddy Bear Light Soft Pink với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a005','SP5','Giày Nike SB Dunk Low Reverse Panda Siêu Cấp','Giày Nike SB Dunk Low Reverse Panda Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a006','SP6','Giày Nike SB Dunk Low Otomo Katsuhiro Steamboy Like Auth','Giày Nike SB Dunk Low Otomo Katsuhiro Steamboy Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1800000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a007','SP7','Giày Nike SB Dunk Low Panda LikeAuth','Giày Nike SB Dunk Low Panda LikeAuth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1800000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a008','SP8','Giày Nike SB Dunk Low x Otomo Katsuhiro Steamboy OST White Black','Giày Nike SB Dunk Low x Otomo Katsuhiro Steamboy OST White Black với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a009','SP9','Giày Nike SB Dunk Low x Otomo Katsuhiro Steamboy OST Green','Giày Nike SB Dunk Low x Otomo Katsuhiro Steamboy OST Green với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a010','SP10','Giày Nike SB Dunk Otomo Steamboy Grey Green','Giày Nike SB Dunk Otomo Steamboy Grey Green với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a011','SP11','Giày Nike SB Dunk Otomo Katsuhiro ‘Steamboy OST’ Grey White Brown','Giày Nike SB Dunk Otomo Katsuhiro ‘Steamboy OST’ Grey White Brown với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46');
('7f0f5819-7962-401c-b98f-5d7bfd92a012','SP12','Giày Nike Wmns Air Jordan 1 Low SE ‘Mighty Swooshers’','Giày Nike Wmns Air Jordan 1 Low SE ‘Mighty Swooshers’ với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a013','SP13','Giày Nike Dunk Low Disrupt 2 Panda Siêu Cấp','Giày Nike Dunk Low Disrupt 2 Panda với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a014','SP14','Giày Nike Dunk Low Disrupt 2 Siêu Cấp','Giày Nike Dunk Low Disrupt 2 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a015','SP15','Giày Nike Dunk Low Disrupt 2 Easter Pastel Siêu Cấp','Giày Nike Dunk Low Disrupt 2 Easter Pastel với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a016','SP16','Giày Nike Dunk Low Disrupt 2 Phantom Like Auth','Giày Nike Dunk Low Disrupt 2 Phantom với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a017','SP17','Giày Nike Dunk Low Disrupt 2 ‘Hyper Royal’ Siêu Cấp','Giày Nike Dunk Low Disrupt 2 ‘Hyper Royal’Nike SB Dunk Xanh Dương với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a018','SP18','Giày Nike Sb Dunk Low Retro Xd Black White Silver Siêu Cấp','Giày Nike Sb Dunk Low Retro Xd Black White Silver với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a019','SP19','SB Dust Đen Trắng','SB Dust Đen Trắng , với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a020','SP20','Giày Nike SB DUNK LOW TRAVIS SCOTT CACTUC JACK','Giày Nike SB DUNK LOW TRAVIS SCOTT CACTUC JACK với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a021','SP21','Giày Nike Dunk Low Disrupt 2 ‘Pale Ivory’ Siêu Cấp','Giày Nike Dunk Low Disrupt 2 ‘Pale Ivory’ với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a022','SP22','Giày AF1 x Louis Vuitton White Brown','Giày AF1 x Louis Vuitton White Brown là phiên bản độc lạ hiện nay ở Việt Nam ít ai có. Shop nhập về được số lượng ít, giá cực tốt cho mọi người trải nghiệm.',1600000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a023','SP23','Giày AF1 x Louis Vuitton White Green','Giày AF1 x Louis Vuitton White Green là phiên bản độc lạ hiện nay ở Việt Nam ít ai có. Shop nhập về được số lượng ít, giá cực tốt cho mọi người trải nghiệm.',1600000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a024','SP24','Giày Nike Air Force 1 Dior Chất 2023 Likeauth','Giày Nike Air Force 1 Gucci Sơn Tùng Bản 2023 Likeauth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a025','SP25','Giày Nike Air Force 1 Chanel Chất 2023 Likeauth','Giày Nike Air Force 1 Chanel Chất 2023 Likeauth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','a4f18b20-7b62-4c88-8b03-3a9c1c2d5eab','8d7a68e9-1783-4aff-8c71-1814bcdbda46'),
('7f0f5819-7962-401c-b98f-5d7bfd92a026','SP26','Giày Adidas Alphabounce Magma White','Giày Adidas Alphabounce Magma White với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1400000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a027','SP27','Giày Adidas Alphabounce Instinct M Core Black','Giày Adidas Alphabounce Instinct M Core Black với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a028','SP28','Giày Adidas Alphabounce Instinct M Turquoise Rep 1:1','Giày Adidas Alphabounce Instinct M Turquoise với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a029','SP29','Giày Adidas Alphabounce Instinct M White Red Blue','Giày Adidas Alphabounce Instinct M White Red Blue với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a030','SP30','Giày Adidas Alphabounce Instinct M Grey Silver','Giày Adidas Alphabounce Instinct M Grey Silver với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1600000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a031','SP31','Giày Adidas Alphabounce Beyond Full Trắng','Giày Adidas Alphabounce Beyond Full Trắng tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1450000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a032','SP32','Giày Adidas Alphabounce Instinct M Black Full','Giày Adidas Alphabounce Instinct M Black Full  tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1650000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a033','SP33','Giày Chạy Bộ Adidas EQT Bost 2023 Đỏ Đen LikeAuth','Giày Chạy Bộ Adidas EQT Bost 2023 Đỏ Đen LikeAuth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Bảng nâng cấp 2023 Boost nén cực êm, đi như trên mây nên rất phù hợp cho các bạn thích sự thoải mái, nhẹ nhàng, chạy bộ thì không thể bỏ lỡ mẫu này được.',1800000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a034','SP34','Giày Chạy Bộ Adidas EQT Bost 2023 Xám Trắng LikeAuth','Giày Chạy Bộ Adidas EQT Bost 2023 Xám Trắng LikeAuth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Bảng nâng cấp 2023 Boost nén cực êm, đi như trên mây nên rất phù hợp cho các bạn thích sự thoải mái, nhẹ nhàng, chạy bộ thì không thể bỏ lỡ mẫu này được.',1800000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a035','SP35','Giày Adidas Nam EQ21 Run Xanh navy cao cấp','Giày Adidas Nam EQ21 Run Xanh navy cao cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1700000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a036','SP36','GIÀY EQT TRẮNG SỌC XÁM','GIÀY EQT TRẮNG SỌC XÁM với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a037','SP37','Giày Adidas Equipment Plus Black','Giày Adidas Equipment Plus Black với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1500000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a038','SP38','Giày Adidas Equipment Plus Boost White/Blue/Orange Like Auth','Giày Adidas Equipment Plus Boost White/Blue/Orange với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1300000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a039','SP39','Giày Adidas EQT 8681 Ghi Đen Siêu cấp','Giày Adidas 8681 Ghi Đen , với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1600000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a040','SP40','Giày Adidas Prophere Black Orange – Đen Cam Rep 1:1','Giày Adidas Prophere Black Orange – Đen Cam Rep 1:1, với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1300000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a041','SP41','Giày Adidas Prophere Trace Olive – Xanh Rêu Cam 1:1','Giày Adidas Prophere Trace Olive – Xanh Rêu Cam 1:1, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a042','SP42','Giày Adidas Prophere Triple White – Trắng Full','Giày Adidas Prophere Triple White Full tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a043','SP43','Giày Adidas Prophere Grey Orange Chuẩn Rep 1:1','Giày Adidas Prophere Grey Orange tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1200000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a044','SP44','Giày Adidas Superstar Adifom Đen Siêu Cấp','Giày Adidas Superstar Adifom Đen Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1000000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a045','SP45','Giày Adidas Superstar Adifom Trắng Siêu Cấp','Giày Adidas Superstar Adifom Trắng Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',700000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a046','SP46','Giày Adidas Superstar André Saraiva Chalk White Black – Sò XO','Giày Adidas Superstar André Saraiva Chalk White Black – Sò XO với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',900000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a047','SP47','Giày Adidas Originals Superstar Cappuccino Full White','Giày Adidas Originals Superstar Cappuccino Full White với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1000000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a048','SP48','Giày Adidas Superstar Cappuccino Green Sò Chảy Xanh','Giày Adidas Superstar Cappucino Green Sò Chảy Xanh với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1000000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a049','SP49','Giày Adidas Superstar Cappuccino Sò Chảy Hồng Kem','Giày Adidas Superstar Cappuccino Sò Chảy Hồng Kem với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1000000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a050','SP50','Giày Adidas Superstar Gold Stamp Sò Trắng','Giày Adidas Superstar Gold Stamp Sò Trắng với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',1000000,'2023-10-01','582d296d-37f7-4b0e-81ca-ff311581c2b6','452b9451-e86e-4048-a6ee-0d13dc857483'),
('7f0f5819-7962-401c-b98f-5d7bfd92a051','SP51','Giày Converse Chuck 70 Club House - A05681C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A05681C Model Converse Chuck 70 Club House Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a052','SP52','Giày Converse One Star Pro Denim - A04148C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04148C Model Converse One Star Pro Denim Chất liệu Canvas',1600000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a053','SP53','Giày Converse Lift Platform - A03542C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A03542C Model Converse Lift Platform Chất liệu Canvas',1600000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a054','SP54','Giày Converse Chuck 70 Club House - A03439C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A03439C Model Converse Chuck 70 Club House Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a055','SP55','Giày Converse Chuck 70 Utility - A03437C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A03437C Model Converse Chuck 70 Utility Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a056','SP56','Giày Converse Chuck 70 Spray Paint - A03432C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A03432C Model Converse Chuck Chuck 70 Spray Paint Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a057','SP57','Giày Converse Chuck 70 Spray Paint - A03433C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A03433C Model Converse Chuck Chuck 70 Spray Paint Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a058','SP58','Giày Converse Chuck Taylor All Star Cruise - A06142C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A06142C Model Converse Chuck Taylor All Star Cruise  Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a059','SP59','Giày Converse Chuck Taylor All Star Cruise - A04688C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04688C Model Converse Chuck Taylor All Star Cruise  Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a060','SP60','Giày Converse Chuck Taylor All Star Cruise - A04689C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a061','SP61','Giày Converse Lift Platform Blanc - A07135C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Lift Platform Blanc - A07135C Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a061','SP61','Giày Converse Chuck Taylor All Star Cruise - A04689C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a062','SP62','Giày Converse Lift Platform Blanc - A07135C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Lift Platform Blanc - A07135C Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a063','SP63','Giày Converse Chuck Taylor Far From Chuck - A04380C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Lift Platform Blanc - A07135C Chất liệu Canvas',2000000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a064','SP64','Giày Converse Chuck 70 Plus Pink - A04366C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a065','SP65','Giày Converse Chuck Taylor All Star Seasonal Color - A02784C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a066','SP66','Giày Converse Chuck Taylor All Star Construct - A05094C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a067','SP67','Giày Converse Transform Bleached Coral - A00880C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a068','SP68','Giày Converse Chuck Taylor All Star Move Platform Valentines Day - A05140C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a069','SP69','Giày Converse Converse Chuck 70 Patchwork Floral - A05193C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a070','SP70','Giày Converse Chuck 70 At Cx Counter Climate - A03274C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a071','SP71','Giày Converse Run Star Legacy CX - A04367C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a072','SP72','Giày Converse Lift Platform Denim Fashion - A03821C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a073','SP73','Giày Converse Lift Platform Decade Pink - A05135C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a074','SP74','Giày Converse Chuck Taylor All Star Denim Fashion - A02880C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a075','SP75','Giày Converse Chuck 70 Vintage Canvas - A02755C','Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam/ Ấn Độ/ Trung Quốc (tùy từng lô hàng) SKU A04689C Model Converse Chuck Taylor All Star Cruise Chất liệu Canvas',2500000,'2023-10-01','1ab78998-fa75-4abb-b937-4e59a483c171','c271c6ed-6926-4be9-afc6-b11b3e957ef3'),
('7f0f5819-7962-401c-b98f-5d7bfd92a076','SP76','Giày Nike Air Jordan 4 Retro ‘Seafoam’ AQ9129-103 Like Auth','Giày Nike Air Jordan 4 Retro ‘Seafoam’ AQ9129-103 Like Auth là một phiên bản đặc biệt trong dòng sản phẩm Air Jordan, với thiết kế táo bạo và tinh tế. Màu sắc Seafoam độc đáo và chất liệu da cao cấp kết hợp với công nghệ Air Sole tạo nên đôi giày không chỉ thể thao mà còn là biểu tượng thời trang, phù hợp với người yêu phong cách cá tính và chất lượng.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a077','SP77','Giày Nike Air Jordan 4 Retro Kaws Like Auth','Giày Nike Air Jordan 4 Retro Kaws Like Auth là một phiên bản đặc biệt trong dòng sản phẩm Air Jordan, hợp tác giữa Nike và nghệ sĩ Kaws. Được ra mắt vào năm 2017, đôi giày này nhanh chóng trở thành điểm nhấn đáng chú ý trong thế giới sneaker.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a078','SP78','Giày Air Jordan 1 Low ‘Alternate Bred Toe’ Like Auth','Giày Air Jordan 1 Low ‘Alternate Bred Toe’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a079','SP79','Giày Nike Air Jordan 1 Retro High Dior Like Auth 99%','Giày Nike Air Jordan 1 Retro High Dior Like Auth 99% với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a080','SP80','Giày Nike Air Jordan 1 x Union Retro High ‘Black Toe’ Like Auth','Giày Nike Air Jordan 1 x Union Retro High ‘Black Toe’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a081','SP81','Giày Nike Air Jordan 1 Retro High OG ‘Palomino’ Like Auth','Giày Nike Air Jordan 1 Retro High OG ‘Palomino’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a082','SP82','Giày Jordan 1 Retro Low Dior CN8608-002 Like Auth','Giày Jordan 1 Retro Low Dior CN8608-002 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a083','SP83','Giày Nike Air Jordan 1 Low ‘White Metallic Gold’ CZ4776-100 Like Auth','Giày Nike Air Jordan 1 Low ‘White Metallic Gold’ CZ4776-100 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a084','SP84','Giày Nike Air Jordan 1 Low GS ‘Shattered Backboard’ Like Auth','Giày Nike Air Jordan 1 Low GS ‘Shattered Backboard’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a085','SP85','Giày Nike Air Jordan 1 Low SE Reverse Ice Blue (W) Like Auth','Giày Nike Air Jordan 1 Low SE Reverse Ice Blue (W) Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a086','SP86','Giày Nike Air Jordan 1 Retro High OG Dark Mocha Like Auth','Giày Nike Air Jordan 1 Retro High OG Dark Mocha Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a087','SP87','Giày Nike Air Jordan 1 Retro High Bred Toe Like Auth','Giày Nike Air Jordan 1 Retro High Bred Toe Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a088','SP88','Giày Nike Air Jordan 1 High Zoom Racer Blue Like Auth','Giày Nike Air Jordan 1 High Zoom Racer Blue Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a089','SP89','Giày Jordan 1 Retro Low OG Zion Williamson Voodoo','Giày Jordan 1 Retro Low OG Zion Williamson Voodoo với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a090','SP90','Giày Nike Air Jordan 1 High Switch ‘Light Smoke Grey’ Like Auth','Giày Nike Air Jordan 1 High Switch ‘Light Smoke Grey’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a091','SP91','Giày Nike Air Jordan 4 Snorlax Like Auth','Giày Nike Air Jordan 4 Snorlax Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a092','SP92','Giày Jordan 4 Retro SE Craft Photon Dust DV3742-021 Like Auth','Giày Jordan 4 Retro SE Craft Photon Dust DV3742-021 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a093','SP93','Giày Nike Air Jordan 4 Retro ‘Pine Green’ Like Auth','Giày Nike Air Jordan 4 Retro ‘Pine Green’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',2500000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a094','SP94','Giày Nike Jordan 1 Low ‘Cardinal Red’ Like Auth','Giày Nike Jordan 1 Low ‘Cardinal Red’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a095','SP95','Giày Nike Air Jordan 1 Low ‘Unity’ DR8057-500 Like Auth','Giày Nike Air Jordan 1 Low ‘Unity’ DR8057-500 Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a096','SP96','Giày Nike Air Jordan 1 Low GS ‘University Gold’ – Jd1 Low Taxi Like Auth','Giày Nike Air Jordan 1 Low GS ‘University Gold’ – Jd1 Low Taxi Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a097','SP97','Giày Nike Air Jordan 1 Retro Low Chicago Like Auth','Giày Nike Air Jordan 1 Retro Low Chicago Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a098','SP98','Giày Nike Air Jordan 1 Low Travis Scott OG Dark Mocha Like Auth','Giày Nike Air Jordan 1 Low Travis Scott OG Dark Mocha Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a099','SP99','Giày Nike Air Jordan 1 Low ‘True Blue Cement’ Like Auth','Giày Nike Air Jordan 1 Low ‘True Blue Cement’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
('7f0f5819-7962-401c-b98f-5d7bfd92a100','SP100','Giày Nike Air Jordan 1 Low ‘Sunset Haze’ Like Auth','Giày Nike Air Jordan 1 Low ‘Sunset Haze’ Like Auth với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.',3000000,'2023-10-01','aa3166a2-6534-40a1-a1a6-cc6839cfa666','2d5d30f9-066f-4839-a973-2aa971803024'),
/*('7f0f5819-7962-401c-b98f-5d7bfd92a101','SP101','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a102','SP102','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a103','SP103','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a104','SP104','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a105','SP105','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a106','SP106','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a107','SP107','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a108','SP108','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a109','SP109','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a110','SP110','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a111','SP111','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a112','SP112','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a113','SP113','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a114','SP114','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a115','SP115','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a116','SP116','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a117','SP117','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a118','SP118','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a119','SP119','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a120','SP120','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a121','SP121','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a122','SP122','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a123','SP123','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a124','SP124','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a125','SP125','','',,'2023-10-01','9a4ab55e-3844-4d25-b20a-893b1bf7c980','f2822729-c278-4b25-9aba-6f2bd1a02133'),
('7f0f5819-7962-401c-b98f-5d7bfd92a126','SP126','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a127','SP127','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a128','SP128','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a129','SP129','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a130','SP130','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a131','SP131','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a132','SP132','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a133','SP133','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a134','SP134','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a135','SP135','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a136','SP136','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a137','SP137','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a138','SP138','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a139','SP139','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a140','SP140','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a141','SP141','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a142','SP142','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a143','SP143','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a144','SP144','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a145','SP145','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a146','SP146','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a147','SP147','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a148','SP148','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a149','SP149','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a150','SP150','','',,'2023-10-01','31895546-7989-4d6b-b45e-dd507da913c7','afcd72e9-6ec2-4d47-8a82-50477d6216dd'),
('7f0f5819-7962-401c-b98f-5d7bfd92a151','SP151','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a152','SP152','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a153','SP153','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a154','SP154','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a155','SP155','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a156','SP156','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a157','SP157','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a158','SP158','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a159','SP159','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a160','SP160','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a161','SP161','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a162','SP162','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a163','SP163','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a164','SP164','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a165','SP165','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a166','SP166','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a167','SP167','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a168','SP168','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a169','SP169','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a170','SP170','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a171','SP171','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a172','SP172','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a173','SP173','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a174','SP174','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a175','SP175','','',,'2023-10-01','31c124fe-dfdf-4777-aecb-895449fc3cbe','4cf28b83-1694-4e3d-af7b-5c0b3c4780a0'),
('7f0f5819-7962-401c-b98f-5d7bfd92a176','SP176','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a177','SP177','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a178','SP178','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a179','SP179','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a180','SP180','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a181','SP181','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a182','SP182','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a183','SP183','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a184','SP184','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a185','SP185','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a186','SP186','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a187','SP187','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a188','SP188','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a189','SP189','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a190','SP190','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a191','SP191','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a192','SP192','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a193','SP193','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a194','SP194','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a195','SP195','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a196','SP196','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a197','SP197','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a198','SP198','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a199','SP199','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a200','SP200','','',,'2023-10-01','99d98fa2-5448-4245-ab31-1fdc94cd727d','d3950d8f-7e44-4786-8caf-f480f2b34540'),
('7f0f5819-7962-401c-b98f-5d7bfd92a201','SP201','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a202','SP202','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a203','SP203','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a204','SP204','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a205','SP205','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a206','SP206','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a207','SP207','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a208','SP208','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a209','SP209','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a210','SP210','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a211','SP211','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a212','SP212','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a213','SP213','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a214','SP214','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a215','SP215','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a216','SP216','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a217','SP217','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a218','SP218','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a219','SP219','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a220','SP220','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a221','SP221','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a222','SP222','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a223','SP223','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a224','SP224','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a225','SP225','','',,'2023-10-01','90261ccc-7523-46c4-a50d-bf444c6ef699','2bc0c41b-0c08-43b7-8c45-d2f8c5c1566e'),
('7f0f5819-7962-401c-b98f-5d7bfd92a226','SP226','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a227','SP227','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a228','SP228','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a229','SP229','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a230','SP230','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a231','SP231','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a232','SP232','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a233','SP233','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a234','SP234','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a235','SP235','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a236','SP236','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a237','SP237','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a238','SP238','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a239','SP239','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a240','SP240','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a241','SP241','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a242','SP242','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a243','SP243','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a244','SP244','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a245','SP245','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a246','SP246','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a247','SP247','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a248','SP248','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a249','SP249','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2'),
('7f0f5819-7962-401c-b98f-5d7bfd92a250','SP250','','',,'2023-10-01','3e1b10c3-9fce-4e00-8304-850cefb45b55','11afef6c-bff6-432b-82eb-d44ba44743e2');*/




create table tbl_user (
  id varchar(36) primary key not null,
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  user_image LONGTEXT,
  fullname varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  username varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  password varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  email varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  phonenumber int(11) NOT NULL,
  address LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  createDate datetime,
  birthDate datetime,
  gender tinyint(1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_cart_detail (
  user_id varchar(36) not null,
  product_id varchar(36) not null,
  quantity int,
  unit_price float ,
  primary key (user_id, product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

create table tbl_status (
  id varchar(36) primary key not null, 
  code varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  name varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
insert into tbl_status (id, code, name, description) values
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
  description LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  createDate datetime
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