-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2020 lúc 08:16 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_anhttt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên danh mục',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho danh mục',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo danh mục',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `hotcategory` tinyint(4) NOT NULL COMMENT 'danh muc hot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`, `hotcategory`) VALUES
(8, 'Phòng Khách', '1602694376-15755172381571935451bg_dotrangtri.png', '<p>Ph&ograve;ng kh&aacute;ch của t&ocirc;i</p>\r\n', 1, '2020-09-26 17:50:42', '2020-10-14 23:52:56', 1),
(9, ' Phòng  Ngủ', '1602694389-1575292512ngu7.jpg', '<p>Ph&ograve;ng Ngủ của t&ocirc;i</p>\r\n', 1, '2020-09-26 17:54:08', '2020-10-14 23:53:09', 1),
(18, 'Phòng Bếp', '1601233020-85091584_1294208450770372_1159289343378980864_n.jpg', '<p>Ph&ograve;ng bếp hiện đại</p>\r\n', 1, '2020-09-27 18:57:00', NULL, 1),
(19, 'Đồ trang trí', '1602694359-15755172571571934564khach22.jpg', '<p>Đồ trang tr&iacute;</p>\r\n', 1, '2020-10-14 16:50:32', '2020-10-14 23:52:39', 1),
(20, 'Bàn trà', '1602694307-1575517137bg_phongkhach.png', '<p>B&agrave;n tr&agrave; của bạn</p>\r\n', 1, '2020-10-14 16:51:47', NULL, 1),
(21, 'Bàn ăn', '1602694334-1575517167bg_phongbep.png', '<p>B&agrave;n ăn</p>\r\n', 1, '2020-10-14 16:52:14', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà tin tức thuộc về, là khóa ngoại liên kết với bảng categories',
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề tin tức',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho tin tức',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh tin tức',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `hotnews` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'Id của user trong trường hợp đã login và đặt hàng, là khóa ngoại liên kết với bảng users',
  `fullname` varchar(255) DEFAULT NULL COMMENT 'Tên khách hàng',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ khách hàng',
  `mobile` int(11) DEFAULT NULL COMMENT 'SĐT khách hàng',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email khách hàng',
  `note` text DEFAULT NULL COMMENT 'Ghi chú từ khách hàng',
  `price_total` int(11) DEFAULT NULL COMMENT 'Tổng giá trị đơn hàng',
  `payment_status` tinyint(2) DEFAULT NULL COMMENT 'Trạng thái đơn hàng: 0 - Chưa thành toán, 1 - Đã thành toán',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo đơn',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `status` tinyint(3) NOT NULL COMMENT ' trạng thái của đơn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `address`, `mobile`, `email`, `note`, `price_total`, `payment_status`, `created_at`, `updated_at`, `status`) VALUES
(63, 17, 'Bin', '72A nguyễn trãi thanh xuân hà nội', 963873812, 'hoangmanhtu0809@gmail.com', '', 83077600, 0, '2020-10-12 18:11:44', '2020-10-14 01:33:04', 1),
(64, 17, 'Bin', '72A nguyễn trãi thanh xuân hà nội', 963873812, 'hoangmanhtu0809@gmail.com', '', 83077600, 1, '2020-10-12 18:16:28', '2020-10-15 02:34:12', 1),
(65, 17, 'Bin', '68 triều khúc thanh trì hà nội', 963873812, 'hoangmanhtu0809@gmail.com', '', 3582000, 0, '2020-10-12 18:18:42', '2020-10-14 01:33:04', 1),
(66, 16, '123', '72A nguyễn trãi thanh xuân hà nội', 965656565, 'binkoy0809@gmail.com', '', 7960000, 0, '2020-10-12 18:44:26', '2020-10-14 01:33:04', 1),
(67, 16, '123', '68 triều khúc thanh trì hà nội', 965656565, 'binkoy0809@gmail.com', '', 7960000, 0, '2020-10-12 18:46:32', '2020-10-14 01:33:04', 1),
(68, 16, '123', '72A nguyễn trãi thanh xuân hà nội', 965656565, 'binkoy0809@gmail.com', '', 17726000, 0, '2020-10-12 18:47:21', '2020-10-14 01:33:04', 1),
(69, 16, '123', '68 triều khúc thanh trì hà nội', 965656565, 'binkoy0809@gmail.com', '', 17726000, 0, '2020-10-12 18:55:22', '2020-10-14 01:33:04', 1),
(70, 16, '123', '68 triều khúc thanh trì hà nội', 965656565, 'binkoy0809@gmail.com', '', 6282000, 0, '2020-10-12 18:56:15', '2020-10-14 01:33:04', 1),
(71, 16, '123', '68 triều khúc thanh trì hà nội', 965656565, 'binkoy0809@gmail.com', '', 10262000, 0, '2020-10-12 19:01:12', '2020-10-14 01:33:04', 1),
(72, 16, '123', '68 triều khúc thanh trì hà nội', 965656565, 'binkoy0809@gmail.com', '', 10262000, 0, '2020-10-12 19:01:39', '2020-10-14 01:33:04', 1),
(73, 18, '  Bin Lùn', '9', 963873812, 'admin1@mail.com', '', 6980000, 0, '2020-10-12 19:05:20', '2020-10-14 01:33:04', 1),
(74, 18, '  Bin Lùn', '9', 963873812, 'admin1@mail.com', '', 6980000, 0, '2020-10-12 19:05:49', '2020-10-14 01:33:04', 1),
(75, 18, '  Bin Lùn', '9', 963873812, 'admin1@mail.com', '', 10562000, 1, '2020-10-12 19:07:47', '2020-10-14 01:33:04', 1),
(76, 18, '  Bin Lùn', '9', 963873812, 'admin1@mail.com', '', 10562000, 1, '2020-10-12 19:08:20', '2020-10-14 01:33:04', 1),
(77, 0, 'Phạm Thị Thảo', 'Hoàng Quốc Việt -Hà Nội', 846842286, 'phamthithao0809@gmail.com', '', 46200000, 0, '2020-10-14 16:54:47', '2020-10-15 02:21:22', 3),
(78, 0, 'Phạm Thị Thảo', 'Hoàng Quốc Việt -Hà Nội', 846842286, 'phamthithao78912@gmail.com', '', 14117800, 0, '2020-10-14 16:56:12', NULL, 0),
(79, 16, '123', 'Thanh Xuân -Hà Nội', 965656565, 'binkoy0809@gmail.com', '', 6980000, 0, '2020-10-14 18:10:38', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL COMMENT 'Id của order tương ứng, là khóa ngoại liên kết với bảng orders',
  `product_id` int(11) DEFAULT NULL COMMENT 'Id của product tương ứng, là khóa ngoại liên kết với bảng products',
  `quality` int(11) DEFAULT NULL COMMENT 'Số sản phẩm đã đặt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quality`) VALUES
(62, 94, 1),
(62, 93, 1),
(62, 92, 1),
(62, 91, 1),
(63, 94, 2),
(63, 93, 1),
(63, 92, 1),
(63, 91, 1),
(64, 94, 2),
(64, 93, 1),
(64, 92, 1),
(64, 91, 1),
(65, 93, 1),
(66, 94, 2),
(67, 94, 2),
(68, 93, 3),
(68, 87, 1),
(69, 93, 3),
(69, 87, 1),
(70, 92, 1),
(71, 92, 1),
(71, 94, 1),
(72, 92, 1),
(72, 94, 1),
(73, 89, 1),
(74, 89, 1),
(75, 89, 1),
(75, 93, 1),
(76, 89, 1),
(76, 93, 1),
(77, 94, 1),
(77, 97, 1),
(78, 99, 1),
(78, 98, 1),
(79, 96, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Tên thương hiệu',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh thương hiệu',
  `description` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho thương hiệu',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái thương hiệu: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo thương hiệu',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `producer`
--

INSERT INTO `producer` (`id`, `name`, `avatar`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'HOÀN MỸ', '1601214265-15755172571571934564khach22.jpg', '<p>Ho&agrave;n mỹ l&agrave; thương hiệu của Việt Nam sản xuất</p>\r\n', 1, '2020-09-27 13:34:28', '2020-10-09 00:03:43'),
(8, 'Phố Xinh', '1602176674-1575292525ngu8.jpg', '<pre>\r\nPhố Xinh</pre>\r\n', 1, '2020-10-08 17:04:34', '2020-10-09 00:04:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL COMMENT 'Id của danh mục mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng categories',
  `producer_id` int(11) DEFAULT NULL COMMENT 'Id của thương hiệu mà sản phẩm thuộc về, là khóa ngoại liên kết với bảng producer',
  `title` varchar(255) NOT NULL COMMENT 'Tên sản phẩm',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh sản phẩm',
  `price` int(11) DEFAULT NULL COMMENT 'Giá sản phẩm',
  `quality` int(11) DEFAULT NULL COMMENT 'Số Lượng Sản Phẩm',
  `summary` varchar(255) DEFAULT NULL COMMENT 'Mô tả ngắn cho sản phẩm',
  `content` text DEFAULT NULL COMMENT 'Mô tả chi tiết cho sản phẩm',
  `hotproduct` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `discount` int(11) NOT NULL,
  `total_rating` int(11) NOT NULL COMMENT 'Tổng số đánh giá',
  `total_number_rating` int(11) NOT NULL COMMENT 'số sao đánh giá '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `producer_id`, `title`, `avatar`, `price`, `quality`, `summary`, `content`, `hotproduct`, `status`, `created_at`, `updated_at`, `discount`, `total_rating`, `total_number_rating`) VALUES
(87, 19, 7, 'Products Name 001', '1601490076-15755229151571497575ngu3.jpg', 6980000, 10, '<p><strong>Products Name 001</strong></p>\r\n\r\n<p><strong>K&iacute;ch Thước :&nbsp;</strong></p>\r\n\r\n<p><strong>22 X 49 cm</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p><strong>Products Name 001</strong></p>\r\n\r\n<p><strong>K&iacute;ch Thước :&nbsp;</strong></p>\r\n\r\n<p><strong>22 X 49 cm</strong></p>\r\n', 0, 1, '2020-09-30 17:32:45', '2020-10-15 13:14:16', 0, 0, 0),
(88, 9, 7, 'Máy tính bảng iPad 10.2 inch Wifi 32GB (2019)', '1601525115-1575292525ngu8.jpg', 6980000, 11, '<p>M&aacute;y t&iacute;nh bảng iPad 10.2 inch Wifi 32GB (2019)</p>\r\n', '<p>M&aacute;y t&iacute;nh bảng iPad 10.2 inch Wifi 32GB (2019)</p>\r\n', 0, 1, '2020-10-01 04:05:15', '2020-10-15 13:14:27', 0, 0, 0),
(89, 21, 7, 'Products Name 002', '1601525145-1574501186tham5.PNG', 6980000, 22, '<p>M&aacute;y t&iacute;nh bảng iPad 10.2 inch Wifi 32GB (2019)</p>\r\n', '<p>M&aacute;y t&iacute;nh bảng iPad 10.2 inch Wifi 32GB (2019)</p>\r\n', 0, 1, '2020-10-01 04:05:45', '2020-10-15 13:15:40', 0, 0, 0),
(90, 8, 7, 'Products Name 003', '1601550882-15755222541571940034lv13.PNG', 7980000, 10, '<p>Products Name 003</p>\r\n', '<p>Products Name 003</p>\r\n', 1, 1, '2020-10-01 11:14:42', NULL, 10, 0, 0),
(91, 20, 7, 'Products Name 005', '1601550938-15755225881571938997plv3.PNG', 68688000, 10, '<p>Products Name 003</p>\r\n', '<p>Products Name 003</p>\r\n', 1, 1, '2020-10-01 11:15:38', '2020-10-15 13:14:01', 5, 0, 0),
(92, 19, 7, 'Products Name 004', '1602143836-1575292549ch46.jpg', 6980000, 15, '<p>Products Name 003</p>\r\n', '<p>Products Name 003</p>\r\n', 1, 1, '2020-10-01 11:22:41', '2020-10-15 13:13:54', 10, 0, 0),
(93, 20, 7, 'Phòng khách nhà bạn', '1601833572-15755235921571464952khach3.jpg', 3980000, 10, '<p>Ph&ograve;ng kh&aacute;ch nh&agrave; bạn</p>\r\n', '<p>Ph&ograve;ng kh&aacute;ch nh&agrave; bạn</p>\r\n', 1, 1, '2020-10-04 17:46:12', '2020-10-15 13:13:12', 10, 0, 0),
(94, 8, 7, 'Phòng ngủ nhà bạn', '1602144294-15755221221571939934lv12.PNG', 3980000, 11, '<p>Ph&ograve;ng ngủ nh&agrave; bạn</p>\r\n', '<p>Ph&ograve;ng ngủ nh&agrave; bạn</p>\r\n', 0, 1, '2020-10-08 08:04:54', '2020-10-08 15:05:16', 0, 0, 0),
(95, 20, 7, 'Bàn trà - BCP-NKNM-LK-4444A-INOX', '1602664243-15755251091571937588khach27.jpg', 6980000, 11, '<p>TH&Ocirc;NG SỐ SẢN PHẨM</p>\r\n\r\n<p>K&iacute;ch Thước</p>\r\n\r\n<p>L 1100 &nbsp; W 600 &nbsp; H 350 (mm)</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>Cốt MDF chống ẩm bề mặt phủ laminate LK4444A</li>\r\n	<li>Ngăn k&eacute;o nhấn mở</li>\r\n	<li>Ch&acirc;n inox 304 b', '<p>TH&Ocirc;NG SỐ SẢN PHẨM</p>\r\n\r\n<p>K&iacute;ch Thước</p>\r\n\r\n<p>L 1100 &nbsp; W 600 &nbsp; H 350 (mm)</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>Cốt MDF chống ẩm bề mặt phủ laminate LK4444A</li>\r\n	<li>Ngăn k&eacute;o nhấn mở</li>\r\n	<li>Ch&acirc;n inox 304 b&oacute;ng gương</li>\r\n</ul>\r\n', 1, 1, '2020-10-14 08:30:43', '2020-10-15 13:15:12', 3, 0, 0),
(96, 20, 7, 'Sofa 2,5 chỗ Hoàn Mỹ - Sanminiato/TL-13', '1602664322-15753573661571548293ch47.jpg', 6980000, 11, '<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>100% da b&ograve; thương hiệu Mastrotto &ndash; Italia</li>\r\n	<li>Độ d&agrave;y của da từ 1.2-1.4 mm</li>\r\n	<li>B&ecirc;n trong: M&uacute;t đ&agrave;n hồi kết hợp l&ocirc;ng vũ</li>\r\n	<li>Ch&acirc;n inox đ&aacute;nh b&amp;', '<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>100% da b&ograve; thương hiệu Mastrotto &ndash; Italia</li>\r\n	<li>Độ d&agrave;y của da từ 1.2-1.4 mm</li>\r\n	<li>B&ecirc;n trong: M&uacute;t đ&agrave;n hồi kết hợp l&ocirc;ng vũ</li>\r\n	<li>Ch&acirc;n inox đ&aacute;nh b&oacute;ng</li>\r\n	<li>Khung: gỗ dầu đ&atilde; qua xử l&yacute; v&agrave; plywood</li>\r\n	<li>Da bảo h&agrave;nh 24 th&aacute;ng, khung bảo h&agrave;nh trọn đời</li>\r\n</ul>\r\n', 1, 1, '2020-10-14 08:32:02', '2020-10-15 13:15:04', 0, 0, 0),
(97, 9, 8, 'Ghế sofa góc Zolano - 101301386', '1602664416-15755234671571934169khach32.jpg', 42220000, 1, '<h3>K&iacute;ch Thước</h3>\r\n\r\n<ul>\r\n	<li>Đ&ocirc;n: L/W 620 &nbsp; P/D 630 &nbsp; H 360 (mm)</li>\r\n	<li>G&oacute;c: L/W 2900 &nbsp; P/D 1730 &nbsp;D 1050 &nbsp;H 740 (chưa n&acirc;ng tựa đẩu) /950 (đ&atilde; n&acirc;ng tựa đầu) (mm)</li>\r\n</ul>\r\n\r\n<h3>Điể', '<h3>K&iacute;ch Thước</h3>\r\n\r\n<ul>\r\n	<li>Đ&ocirc;n: L/W 620 &nbsp; P/D 630 &nbsp; H 360 (mm)</li>\r\n	<li>G&oacute;c: L/W 2900 &nbsp; P/D 1730 &nbsp;D 1050 &nbsp;H 740 (chưa n&acirc;ng tựa đẩu) /950 (đ&atilde; n&acirc;ng tựa đầu) (mm)</li>\r\n</ul>\r\n\r\n<h3>Điểm Nổi Bật</h3>\r\n\r\n<p>Đệm m&uacute;t đ&agrave;n hồi cao, phần tựa đầu c&oacute; thể n&acirc;ng hạ theo nhu cầu của người sử dụng.</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>Chất liệu: 100% da b&ograve; &Yacute;.</li>\r\n	<li>Khung: L&agrave;m bằng gỗ dầu đ&atilde; qua xử l&yacute; v&agrave; plywood.</li>\r\n	<li>Ch&acirc;n: Th&eacute;p mạ crom.</li>\r\n</ul>\r\n\r\n<h3>Xuất Xứ</h3>\r\n\r\n<p>Zolano, Malaysia</p>\r\n', 0, 1, '2020-10-14 08:33:36', NULL, 0, 0, 0),
(98, 9, 8, 'Giường ngủ - GBN020.001', '1602664551-1575292512ngu7.jpg', 13760000, 11, '<h3>K&iacute;ch Thước</h3>\r\n\r\n<p>1920x2175x1100 (mm)</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<p>- Giường bọc nỉ.</p>\r\n\r\n<p>- Khung gỗ chắc chắn.</p>\r\n\r\n<p>- Ch&acirc;n sắt sơn tĩnh điện, độ bền cao.&nbsp;</p>\r\n\r\n<h3>Xuất Xứ</h3>\r\n\r\n<ul>\r\n	<li>Thương hiệu Ho&agrave;n', '<h3>K&iacute;ch Thước</h3>\r\n\r\n<p>1920x2175x1100 (mm)</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<p>- Giường bọc nỉ.</p>\r\n\r\n<p>- Khung gỗ chắc chắn.</p>\r\n\r\n<p>- Ch&acirc;n sắt sơn tĩnh điện, độ bền cao.&nbsp;</p>\r\n\r\n<h3>Xuất Xứ</h3>\r\n\r\n<ul>\r\n	<li>Thương hiệu Ho&agrave;n Mỹ, sản xuất tại Việt Nam.&nbsp;</li>\r\n</ul>\r\n\r\n<h3>K&iacute;ch Thước Đệm</h3>\r\n\r\n<p>1800x2000mm</p>\r\n\r\n<h3>Điểm Nổi Bật</h3>\r\n\r\n<p>- Kiểu d&aacute;ng trẻ trung, thanh lịch, tinh tế -&nbsp; t&ocirc;n n&eacute;t đẹp hiện đại cho kh&ocirc;ng gian ph&ograve;ng ngủ.&nbsp;</p>\r\n\r\n<p>- Giường bọc nỉ tạo cảm gi&aacute;c mềm mại, &ecirc;m &aacute;i - cho bạn kh&ocirc;ng gian nghỉ ngơi thực sự thoải m&aacute;i sau mỗi ng&agrave;y d&agrave;i bận rộn.&nbsp;</p>\r\n', 1, 1, '2020-10-14 08:35:51', '2020-10-15 13:12:51', 5, 0, 0),
(99, 21, 7, 'Giường ngủ Hoàn Mỹ - GPNK-MFC-941SL/030SH', '1602664643-1575292549ch46.jpg', 1162000, 1, '<h3>K&iacute;ch Thước</h3>\r\n\r\n<p>L/W 1988&nbsp; &nbsp;P/D 1288&nbsp; &nbsp;H 950 (mm</p>\r\n', '<p>TH&Ocirc;NG SỐ SẢN PHẨM</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>K&iacute;ch Thước</h3>\r\n\r\n<p>L/W 1988&nbsp; &nbsp;P/D 1288&nbsp; &nbsp;H 950 (mm)</p>\r\n\r\n<h3>Chất Liệu</h3>\r\n\r\n<ul>\r\n	<li>Cốt MDF chống ẩm đạt chuẩn ch&acirc;u &Acirc;u</li>\r\n	<li>Bề mặt phủ Melamine 941SL kết hợp 030 SH cao cấp</li>\r\n</ul>\r\n\r\n<h3>Xuất Xứ</h3>\r\n\r\n<p>Ho&agrave;n Mỹ, Việt Nam</p>\r\n', 1, 1, '2020-10-14 08:37:23', '2020-10-15 13:15:51', 10, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL COMMENT 'Id của sản phẩm, là khóa ngoại liên kết với bảng products',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Tên file ảnh danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `avatar`) VALUES
(212, 87, '1601490076-1574501152tham4.PNG'),
(213, 87, '1601490076-1574501186tham5.PNG'),
(214, 87, '1601490076-1574523279plv1.PNG'),
(215, 87, '1601490076-1575292490base1.jpg'),
(216, 88, '1601525115-1575292549ch46.jpg'),
(217, 88, '1601525115-1575295707pb1.jpg'),
(218, 88, '1601525115-15753573281571938923plv4.PNG'),
(219, 89, '1601525145-1574523279plv1.PNG'),
(220, 89, '1601525145-1575292490base1.jpg'),
(221, 89, '1601525145-1575292512ngu7.jpg'),
(222, 90, '1601550882-1575292512ngu7.jpg'),
(223, 90, '1601550882-1575292525ngu8.jpg'),
(224, 90, '1601550882-15752957841571937242ban1.jpg'),
(225, 90, '1601550882-15752959641571417334khach1.jpg'),
(226, 91, '1601550938-1575292512ngu7.jpg'),
(227, 91, '1601550938-1575292525ngu8.jpg'),
(228, 91, '1601550938-1575292549ch46.jpg'),
(229, 91, '1601550939-1575295707pb1.jpg'),
(230, 92, '1601551361-1575292525ngu8.jpg'),
(231, 92, '1601551361-1575292549ch46.jpg'),
(232, 92, '1601551361-1575295707pb1.jpg'),
(233, 93, '1601833572-1575292525ngu8.jpg'),
(234, 93, '1601833572-1575292549ch46.jpg'),
(235, 93, '1601833572-1575295707pb1.jpg'),
(236, 93, '1601833572-15752957841571937242ban1.jpg'),
(237, 94, '1602144294-15755225881571938997plv3.PNG'),
(238, 94, '1602144294-15755227511571938512plv7.PNG'),
(239, 94, '1602144294-15755228061571497279ngu9.jpg'),
(240, 94, '1602144294-15755229151571497575ngu3.jpg'),
(241, 95, '1602664243-1574501152tham4.PNG'),
(242, 95, '1602664243-1574501186tham5.PNG'),
(243, 95, '1602664243-1574523279plv1.PNG'),
(244, 96, '1602664322-1575292490base1.jpg'),
(245, 96, '1602664322-1575292512ngu7.jpg'),
(246, 96, '1602664322-1575292525ngu8.jpg'),
(247, 97, '1602664416-15753573661571548293ch47.jpg'),
(248, 97, '1602664416-15755216821571938380plv8.PNG'),
(249, 97, '1602664416-15755219351571940034lv13.PNG'),
(250, 98, '1602664552-1575292490base1.jpg'),
(251, 98, '1602664552-1575292525ngu8.jpg'),
(252, 98, '1602664552-1575292549ch46.jpg'),
(253, 99, '1602664643-15755228061571497279ngu9.jpg'),
(254, 99, '1602664644-15755229151571497575ngu3.jpg'),
(255, 99, '1602664644-15755233131571929862ngu2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_product`
--

CREATE TABLE `rating_product` (
  `id` int(11) NOT NULL COMMENT 'id của đánh giá',
  `product_id` int(11) NOT NULL COMMENT 'id của sản phẩm',
  `user_id` int(11) NOT NULL COMMENT 'user_id của sản phẩm',
  `name` varchar(500) NOT NULL COMMENT 'tên người đánh giá',
  `number` int(11) NOT NULL COMMENT 'số lượng sao',
  `content` varchar(500) NOT NULL COMMENT 'content đánh giá',
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp() COMMENT 'ngày đánh giá'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `news_id` int(11) DEFAULT NULL COMMENT 'Id của tin tức sẽ hiển thị trong slide, là khóa ngoại liên kết với bảng news',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh slide',
  `position` tinyint(3) DEFAULT NULL COMMENT 'Vị trí hiển thị của slide, ví dụ: = 0 hiển thị đầu tiên...',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `sdt` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `create_at` varchar(500) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Mật khẩu đăng nhập',
  `phone` int(11) DEFAULT NULL COMMENT 'SĐT user',
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ user',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email của user',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện',
  `status` tinyint(3) DEFAULT 0 COMMENT 'Trạng thái danh mục: 0 - Inactive, 1 - Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `updated_at` datetime DEFAULT NULL COMMENT 'Ngày cập nhật cuối',
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `password`, `phone`, `address`, `email`, `avatar`, `status`, `created_at`, `updated_at`, `fullname`) VALUES
(14, '202cb962ac59075b964b07152d234b70', 395679339, NULL, 'binkoy0809@gmail.com', NULL, 1, '2020-10-05 11:16:32', NULL, 'Hoàng Mạnh Tú'),
(15, '827ccb0eea8a706c4c34a16891f84e7b', 863873812, NULL, 'admin@mail.com', NULL, 1, '2020-10-05 11:25:50', NULL, ' Nguyễn Văn B111'),
(16, 'e10adc3949ba59abbe56e057f20f883e', 965656565, NULL, 'binkoy0809@gmail.com', NULL, 0, '2020-10-12 09:23:25', NULL, '123'),
(17, '827ccb0eea8a706c4c34a16891f84e7b', 963873812, NULL, 'hoangmanhtu0809@gmail.com', NULL, 0, '2020-10-12 12:14:50', NULL, 'Bin'),
(18, 'e10adc3949ba59abbe56e057f20f883e', 963873812, NULL, 'admin1@mail.com', NULL, 0, '2020-10-12 12:25:19', NULL, '  Bin Lùn'),
(19, '827ccb0eea8a706c4c34a16891f84e7b', 968686868, NULL, 'admin@gmail.com', NULL, 1, '2020-10-15 06:08:28', NULL, 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT cho bảng `rating_product`
--
ALTER TABLE `rating_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id của đánh giá', AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
