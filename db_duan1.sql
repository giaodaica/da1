-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2025 at 06:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `black_list`
--

CREATE TABLE `black_list` (
  `id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `black_list`
--

INSERT INTO `black_list` (`id`, `email`, `phone`, `user_id`) VALUES
(1, 'vanthanh@gmail.com', '0987678987', 55),
(2, 'vanthanh@gmail.com', '0978656478', 54),
(3, 'hieuttph48379@fpt.edu.vn', '098732322332', 23),
(4, 'trunghieu042000@gmail.com', '0775713231', 63),
(5, 'trunghieu042000@gmail.com', '0988777789', 64);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int NOT NULL,
  `cart_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `size` enum('S','M','L','XL') NOT NULL,
  `color` varchar(50) NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_item_id`, `cart_id`, `product_id`, `size`, `color`, `quantity`, `image`, `price`) VALUES
(215, 17, 1, 'S', 'Đen', 1, './uploads/aothunden.png', 250000),
(308, 28, 1, 'S', 'Đen', 1, './uploads/aothunden.png', 250000),
(325, 34, 1, 'S', 'Đen', 1, './uploads/aothunden.png', 250000),
(326, 34, 34, 'S', 'Trắng', 1, './uploads/bodothethaotrang.png', 500000),
(327, 31, 1, 'S', 'Đen', 1, './uploads/aothunden.png', 250000),
(328, 31, 1, 'M', 'Trắng', 1, './uploads/aothuntrang.png', 250000),
(329, 31, 33, 'S', 'Trắng', 1, './uploads/aokhoacnamtrang.png', 249000),
(364, 35, 1, 'M', 'Đen', 1, './uploads/aothunden.png', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `only` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `only`, `image`, `status`) VALUES
(1, 'Áo Phông', 0, './uploads/aophong.png', '1'),
(2, 'Bộ đồ ngủ', 2, './uploads/bodongu.jpg', '1'),
(4, 'Áo sơ mi', 0, './uploads/aosomi.jpg', '1'),
(5, 'Áo polo', 0, './uploads/aopolo.png', '1'),
(6, 'Áo khoác', 0, './uploads/aokhoacnam.jpg', '1'),
(7, 'Áo len và áo hoodie', 3, './uploads/aolen.jpg', '1'),
(8, 'Quần jean', 1, './uploads/c_jean.jpg', '1'),
(9, 'Quần kaki', 1, './uploads/c_kaki.jpg', '1'),
(10, 'Quần short', 1, './uploads/c_short.jpg', '1'),
(11, 'Quần âu', 1, './uploads/c_au.jpg', '1'),
(12, 'Quần thể thao', 1, './uploads/c_bothethao.jpg', '0'),
(13, 'Bộ đồ thể thao', 4, './uploads/c_bothethao.jpg', '1'),
(14, 'Áo và quần tập gym', 5, './uploads/c_gymnam.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_info_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text,
  `gender` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `authen` enum('Đã Xác Thực','Chưa Xác Thực') NOT NULL DEFAULT 'Chưa Xác Thực'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_info_id`, `user_id`, `full_name`, `email`, `phone`, `address`, `gender`, `date_of_birth`, `authen`) VALUES
(6, 33, '', '', '0912901291', 'cầu giấy hà nội', '1', '2024-11-08', 'Chưa Xác Thực'),
(10, 35, 'trần trung hiếu', '', '', 'cầu giấy hà nội', '0', '2024-11-01', 'Chưa Xác Thực'),
(12, 38, 'trần trung hiếu', '', '0988888888', 'trần trung hiếu', '1', '2023-01-31', 'Chưa Xác Thực'),
(13, 39, 'trần trung hiếu', '', '0987663636', 'trần trung hiếu', '0', '2023-02-14', 'Chưa Xác Thực'),
(14, 52, 'trần trung hiếu', '', '0978657377', 'hà nam hà nội', '1', '2024-10-04', 'Chưa Xác Thực'),
(19, 57, 'trần trung hiếu', 'nth.s4gavuon@gmail.com', '', 'hà nam hà nam', '1', '2024-11-13', 'Đã Xác Thực'),
(20, 61, 'Phạm Ngọc Ánh', '', '0775713230', 'Hoàng Mai Hà Nội', '0', '2000-11-13', 'Chưa Xác Thực'),
(24, 65, 'Trần Trung Hiếu', '', '0775713231', 'Lý Nhân Hà Nam', '1', '2000-11-05', 'Đã Xác Thực'),
(25, 69, 'Trần Trung Hiếu', 'hieuttph48379@fpt.edu.vn', '0978657365', 'Hoàng Mai Hà Nội', '1', '2000-11-05', 'Đã Xác Thực'),
(26, 70, 'Trung Hiếu', 'choingocrong2022@gmail.com', '0978657333', 'Hoàng Mai Hà Nội', '1', '2000-11-05', 'Đã Xác Thực');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `voucher_id` int DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Chờ xử lý','Đã hoàn tất','Đã hủy','Đã Xác Nhận','Đang giao hàng','Giao hàng thất bại') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Chờ xử lý',
  `recipient_name` varchar(100) NOT NULL,
  `recipient_phone` varchar(15) NOT NULL,
  `recipient_address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `key_limited` varchar(16) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `voucher_id`, `total_amount`, `order_date`, `status`, `recipient_name`, `recipient_phone`, `recipient_address`, `email`, `key_limited`, `note`) VALUES
(469, 65, 10, 2345000.00, '2024-12-05 15:46:12', 'Đã hoàn tất', 'Trần Trung Hiếu', '0775713231', 'Lý Nhân Hà Nam', 'trunghieu042000@gmail.com', 'FPL051224NF47H68', 'Chưa Gọi Xác Nhận'),
(470, 65, 0, 250000.00, '2024-12-05 16:01:27', 'Đã hoàn tất', 'Trần Trung Hiếu', '0775713231', 'Lý Nhân Hà Nam', 'trunghieu042000@gmail.com', 'FPL051224D6SWT68', 'Chưa Gọi Xác Nhận'),
(471, 65, 0, 250000.00, '2024-12-05 16:01:50', 'Đã hoàn tất', 'Trần Trung Hiếu', '0775713231', 'Lý Nhân Hà Nam', 'trunghieu042000@gmail.com', 'FPL051224SFXMT68', 'Chưa Gọi Xác Nhận'),
(472, 65, 0, 1750000.00, '2024-12-05 21:16:26', 'Đã hoàn tất', 'Trần Trung Hiếu', '0775713231', 'Lý Nhân Hà Nam', 'trunghieu042000@gmail.com', 'FPL0512248M29V68', 'Chưa Gọi Xác Nhận'),
(473, 0, 0, 500000.00, '2024-12-06 13:42:23', 'Đã hoàn tất', 'Trần trung hiếu', '0978657366', 'hoàng mai hà nội', 'trunghieu042000@gmail.com', 'FPL061224NLKS768', 'Chưa Gọi Xác Nhận'),
(474, 65, 0, 250000.00, '2024-12-06 13:46:31', 'Đã hoàn tất', 'Trần Trung Hiếu', '0775713231', 'Lý Nhân Hà Nam', 'trunghieu042000@gmail.com', 'FPL0612248K49P68', 'Chưa Gọi Xác Nhận');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS ((`quantity` * `price`)) STORED,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`, `color`, `size`, `image`) VALUES
(290, 469, 1, 1, 250000.00, 'Đen', 'S', './uploads/aothunden.png'),
(291, 469, 1, 1, 250000.00, 'Trắng', 'M', './uploads/aothuntrang.png'),
(292, 469, 1, 4, 250000.00, 'Trắng', 'L', './uploads/aothuntrang.png'),
(293, 469, 1, 4, 250000.00, 'Trắng', 'XL', './uploads/aothuntrang.png'),
(294, 469, 1, 4, 250000.00, 'Đen', 'M', './uploads/aothunden.png'),
(295, 470, 1, 1, 250000.00, 'Đen', 'S', './uploads/aothunden.png'),
(296, 471, 1, 1, 250000.00, 'Trắng', 'S', './uploads/aothuntrang.png'),
(297, 472, 1, 4, 250000.00, 'Trắng', 'L', './uploads/aothuntrang.png'),
(298, 472, 1, 1, 250000.00, 'Xanh', 'XL', './uploads/aothunxanh.png'),
(299, 472, 34, 1, 500000.00, 'Trắng', 'S', './uploads/bodothethaotrang.png'),
(300, 473, 1, 1, 250000.00, 'Trắng', 'M', './uploads/aothuntrang.png'),
(301, 473, 1, 1, 250000.00, 'Đỏ', 'XL', './uploads/aothundo.png'),
(302, 474, 1, 1, 250000.00, 'Trắng', 'M', './uploads/aothuntrang.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `order_id` int NOT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,2) NOT NULL,
  `method` varchar(244) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_date`, `amount`, `method`, `status`) VALUES
(34, 469, '2024-12-05 15:46:42', 2345000.00, 'NCB', 1),
(35, 471, '2024-12-05 16:02:03', 250000.00, 'VNPAY', 0),
(36, 472, '2024-12-05 21:16:57', 1750000.00, 'NCB', 1),
(37, 473, '2024-12-06 13:43:19', 500000.00, 'NCB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int DEFAULT NULL,
  `price` int NOT NULL,
  `gianhap` int NOT NULL,
  `stock_quantity` int NOT NULL,
  `status` enum('Available','Unavailable') NOT NULL DEFAULT 'Available',
  `comment` enum('0','1') NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  `Quantity_sold` int DEFAULT NULL,
  `mota` varchar(255) NOT NULL,
  `ngaynhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `price`, `gianhap`, `stock_quantity`, `status`, `comment`, `image`, `Quantity_sold`, `mota`, `ngaynhap`, `views`) VALUES
(1, 'Áo Thun Nam Vải Mềm', 1, 250000, 220000, 1876, 'Available', '1', './uploads/aothuntrang.png', 176, 'Sản phẩm mới về rất tốt trong mùa đông', '2024-11-22 09:29:17', 870),
(33, 'Áo Khoác Nam Vải Dày', 6, 249000, 200000, 100, 'Available', '1', './uploads/aokhoacnamtrang.png', 0, 'Áo khoác nam ', '2024-11-24 20:37:47', 2),
(34, 'Bộ Đồ Thể Thao Nam', 13, 500000, 400000, 92, 'Available', '1', './uploads/bodothethaotrang.png', 8, 'Đồ Thể Thao Nam', '2024-11-24 20:39:48', 79),
(35, 'Áo Polo Nam', 5, 450000, 350000, 100, 'Available', '1', './uploads/polotrang.png', 0, 'Áo Polo Nam', '2024-11-24 20:41:22', 44),
(36, 'áo len nam', 7, 11111, 111, 0, 'Available', '1', './uploads/aokhoacnamtrang.png', 0, '111', '2024-11-26 10:42:25', 14),
(37, '11111', 1, 111, 111, 1, 'Available', '1', './uploads/aothunden.png', 0, '1', '2024-11-28 23:18:21', 1),
(38, 'Đồ ngủ 2 lớp', 2, 230000, 200000, 56, 'Available', '1', './uploads/đồ ngủ1-500x500.jpg', 0, 'New 100%', '2024-12-05 22:38:52', 0),
(39, 'Áo sơ mi đi chơi', 4, 530000, 470000, 24, 'Available', '1', './uploads/áo sơ mi 1-500x500.jpg', 0, 'New 100%', '2024-12-05 22:39:51', 0),
(40, 'Áo khoác Jacket', 6, 470000, 420000, 100, 'Available', '1', './uploads/áo khoác 1-500x500.jpg', 0, 'New 100%', '2024-12-05 22:40:34', 1),
(41, 'Quần jean xanh', 8, 240000, 200000, 45, 'Available', '1', './uploads/quần jean-500x500.png', 0, 'New 100%', '2024-12-05 22:41:25', 0),
(42, 'Quần jean trắng', 8, 300000, 250000, 2, 'Available', '1', './uploads/quần jeam-500x500.jpg', 0, 'New 100%', '2024-12-05 22:42:02', 0),
(43, 'Quần kaki super', 9, 370000, 320000, 10, 'Available', '1', './uploads/quần kaki-500x500.jpg', 0, 'New 100%', '2024-12-05 22:43:20', 0),
(44, 'Quần âu dự tiệc', 11, 200000, 170000, 0, 'Unavailable', '1', './uploads/quần âu2-500x500.jpg', 0, 'New 100%', '2024-12-05 22:44:08', 0),
(45, 'Quần âu', 11, 300000, 250000, 9, 'Available', '1', './uploads/quần âu 1-500x500.png', 0, 'New 100%', '2024-12-05 22:44:37', 0),
(46, 'Quần short thoải mái', 10, 210000, 170000, 100, 'Available', '1', './uploads/quần short -500x500.jpg', 0, 'New 100%', '2024-12-05 22:45:22', 0),
(47, 'Bộ quần áo tập Gym', 14, 120000, 70000, 24, 'Available', '1', './uploads/quần áo tập gym-500x500.png', 0, 'New 100%', '2024-12-05 22:47:32', 0),
(48, 'Áo Bomber', 6, 600000, 520000, 56, 'Available', '1', './uploads/áo bomber-500x500.jpg', 0, 'Đẹp , New 100%', '2024-12-05 22:50:28', 1),
(49, 'Áo hoodie', 7, 340000, 300000, 23, 'Available', '1', './uploads/áo hôdie-500x500.jpg', 0, 'New 100%', '2024-12-05 22:51:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `variant_id` int NOT NULL,
  `product_id` int NOT NULL,
  `size` enum('S','M','L','XL') NOT NULL,
  `color` varchar(50) NOT NULL,
  `stock_quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`variant_id`, `product_id`, `size`, `color`, `stock_quantity`, `image`, `status`) VALUES
(25, 1, 'S', 'Đen', 0, './uploads/aothunden.png', '0'),
(26, 1, 'S', 'Đỏ', 100, './uploads/aothundo.png', '1'),
(27, 1, 'S', 'Xanh', 90, './uploads/aothunxanh.png', '1'),
(28, 1, 'M', 'Đen', 86, './uploads/aothunden.png', '1'),
(29, 1, 'M', 'Đỏ', 100, './uploads/aothundo.png', '1'),
(30, 1, 'M', 'Xanh', 100, './uploads/aothunxanh.png', '1'),
(31, 1, 'L', 'Đen', 100, './uploads/aothunden.png', '1'),
(32, 1, 'L', 'Đỏ', 0, './uploads/aothundo.png', '1'),
(33, 1, 'L', 'Xanh', 100, './uploads/aothunxanh.png', '1'),
(34, 1, 'XL', 'Đen', 100, './uploads/aothunden.png', '1'),
(35, 1, 'XL', 'Đỏ', 89, './uploads/aothundo.png', '1'),
(36, 1, 'XL', 'Xanh', 1, './uploads/aothunxanh.png', '1'),
(38, 35, 'M', 'Đen', 80, './uploads/poloden.png', '0'),
(45, 35, 'M', 'Đỏ', 1, './uploads/aothundo.png', '1'),
(46, 35, 'M', 'Vàng', 100, './uploads/image.png', '1'),
(47, 35, 'L', 'Cam', 100, './uploads/polocam.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratings_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `product_id` int NOT NULL,
  `comments` text NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ratings_id`, `customer_id`, `product_id`, `comments`, `rating_date`, `status`) VALUES
(15, 65, 1, 'aa', '2024-12-06 05:36:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `user_id`, `created_at`) VALUES
(4, 41, '2024-11-11 00:39:31'),
(5, 42, '2024-11-11 02:00:08'),
(6, 43, '2024-11-13 17:36:29'),
(7, 44, '2024-11-13 17:42:06'),
(8, 46, '2024-11-20 12:23:53'),
(9, 47, '2024-11-21 00:51:12'),
(10, 48, '2024-11-21 00:53:18'),
(11, 49, '2024-11-21 00:53:42'),
(12, 50, '2024-11-21 01:09:04'),
(13, 51, '2024-11-21 01:10:50'),
(14, 52, '2024-11-21 01:26:44'),
(15, 53, '2024-11-22 10:20:48'),
(16, 54, '2024-11-22 13:35:08'),
(17, 55, '2024-11-22 16:00:09'),
(18, 56, '2024-11-23 20:45:43'),
(19, 57, '2024-11-25 13:12:13'),
(20, 58, '2024-11-26 17:03:00'),
(21, 59, '2024-11-26 17:05:19'),
(22, 60, '2024-11-26 17:05:45'),
(23, 61, '2024-11-27 00:00:36'),
(27, 65, '2024-11-29 13:12:08'),
(28, 66, '2024-12-03 13:36:21'),
(29, 67, '2024-12-03 14:46:36'),
(30, 68, '2024-12-04 02:25:46'),
(31, 69, '2024-12-04 16:39:43'),
(32, 70, '2024-12-04 17:41:42'),
(33, 71, '2024-12-04 17:53:13'),
(34, 72, '2024-12-04 17:54:48'),
(35, 73, '2024-12-06 12:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('0','1','2','4') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`) VALUES
(0, '0', '0', '4'),
(27, 'hieu12', '111111', '0'),
(28, 'hieu11', '$2y$10$bPrwjS0FbbpBGP6JKvZ4G.8EJZ.7GT9AV.AKKCTohND0Q4jPmn/re', '4'),
(29, 'hieu_epl', '111111', '1'),
(30, 'hieu9z', '$2y$10$aj1vqoquoNAa4x4yXxaNxecVy9wFSQBXpfjUvTXv15JHqGFqTR/Zu', '4'),
(31, 'hieu10z', '$2y$10$T0M/sQ4II0UokEp6y/JtPuDzmA0EcHqS8tIbKfigheUlbQ1d3Oz0G', '4'),
(32, 'hieutext', '$2y$10$mYJydjIYYF8Nq86Ff.wO9e1Tym.aZ50SgZBb8jEHWcLOU2QS...FO', '4'),
(33, 'hieu000', '$2y$10$WUZTdwVZZIy5.6k2AiJPDONPvtqgvR2nURdk2KQgQIDHvjcXLNgRO', '4'),
(34, 'hieu888', '$2y$10$FDkll4qPCNtHS800dVOFlOduHxT3F4rXdx/h4fzhdVJPnoXlSePjm', '4'),
(35, 'hieu777', '$2y$10$DU69B7b6IhYWpwoUzPx4UuHex/TAjXsqtaDGRGSQqiT.sU.8HcEKC', '4'),
(36, 'hieu0909', '$2y$10$bjvEpL1iBu6fSDkGkJSpR.CGkAs4da4iryGo6mdf/QpegEtrIkqQO', '4'),
(37, '11111111', '$2y$10$30kpevG/AVSqDKlklkS1DO1jDiwx6fPwWZpBeZYgZfemKmLL6uL3C', '4'),
(38, 'hieu988', '$2y$10$RMvJUiQj9nNIEUaWcUq5cO3OVNUgz.MdA70APpgObKbMQmGDCDHzq', '4'),
(39, 'hieu990', '$2y$10$2JSL9KqlTjsgMm/d1Bx9zuwEk42eiQm5u6iI69xAmiqvcuESdy7oS', '4'),
(40, 'hieuuu', '$2y$10$F5oaqxHYFNfBL4jxuFhlR..qEW4Hr65BikepJMpVDudYa1AWFaMte', '4'),
(41, 'hieuuujj', '$2y$10$85EBODTWaQAZM27TRcU4aOX7DGkG62S.mjk0utnuwrRjf4gMjtqFC', '4'),
(42, 'hieu77nn', '$2y$10$Um4aCSNORjb44zyrsWPhH.l1mLp1Ujm05/Vpf3UuqRAM.9BfKzmKy', '4'),
(43, 'uuuuuuu', '$2y$10$q3e7xvuIxmAq.voEOk9/lu9PaaQrubqbSgcJMg2okXVmDa/BMBwMK', '4'),
(44, 'hieutest', '$2y$10$A5euvFhY9f3lDU0p9iHZceZfFtdNHchxTUsaIpLQuIdfIPNHr2pru', '4'),
(46, 'uuuiakai', '$2y$10$PZ.pSuvEdo8HRQlzTqzAE.pVPx4FbLFzgTsue8LzccEk9qCEyhlkC', '4'),
(47, 'aaaaaaaaa', '$2y$10$F6C8.G.oUFzhJQQZnnb18uUFrMkiqi8PYdxR/Iu3JtzzJUt8h23te', '4'),
(48, 'aaaaaaaaaaa', '$2y$10$pQok6IMPlHwINCjnXjDxIeuuxf1ReTTUjT.47yAHWoOMujJUbzP2O', '4'),
(49, 'tttttttttttttttt', '$2y$10$qTbp86Dfq6GKIQhbXiegQO1o9TsdoWzQwHjhD4zW0baLZoJrs/gVq', '4'),
(50, 'hieu99000', '$2y$10$kBFVS6hFCZZmX4p9B8vw6eRGWYhKHlx9a7uZ5ZhrfBGINpJXjA2g.', '4'),
(51, 'hieu89898', '$2y$10$e7CG15SZH4zWqI8zVzTL8OapBWzt9kShn9pe/o1Y6iCqMqSJGqN4m', '4'),
(52, 'hieu888999', '$2y$10$/fd2dM5f6htWrrpniHswLuLBpg78urfujOcVU6Kz121y5NmGrchXC', '4'),
(53, 'hieu00iii', '$2y$10$/RmupseGHLBHtQsCi5vkm.S7J5/kRBXCO8AJL0X.WIW4av6EpG8XW', '4'),
(54, 'u77783333', '$2y$10$t0yGljdDGTJ1OvbmnNdVROdGWld9iMVnAXgrRPId4xVBBPo5sx9LG', '4'),
(55, 'hieu99999', '$2y$10$7ICbylTPVs8RULNSNJQ.Gu.d3lmfN2x1Sx6.mFY09QuZr2qhoKCHu', '4'),
(56, 'hieu009900', '$2y$10$A2CNge6ob7rgsFOF7xVRlOiebmVjCTv8D1NJAugIZP8eWiIkZx3IG', '4'),
(57, 'hieu15', '$2y$10$1I4fDWxXPi2cEs.5KBFKd.7Of.qERWIRNMC1tUndS0j/IyW0eWSlG', '4'),
(58, 'hieu19', '$2y$10$wL3Raa/vKNG0OM51EgiZLuW4fzKh3FezIrySEQI6adVc9Ksj.skCO', '4'),
(59, 'hieu20', '$2y$10$RFTrU3Ag/gTdPqat1BegrOWvZJin5nKP7eeB.Bvq5Kc7w92qY1n/2', '4'),
(60, 'hieu21', '$2y$10$8jaBNC1vnTiNr7jT3COyeu.6UDXlAfvC14WD4NY7BzuBVsBEgKDD.', '4'),
(61, 'hieu88', '$2y$10$cDsMWEb0rv0nJg./tXEE5e2bdrvzxdG58mutDd.MEzBIl/tswiys6', '4'),
(65, 'hieu13', '20002000', '4'),
(66, 'hieu14', '$2y$10$O9o4pFNxV23BNJicjjsIzOb0yvojbfYRwJiB1buYS36Sig/WYozbW', '4'),
(67, '\'\'\'', '$2y$10$j5NaW1RnjQ/hA8UnUy1JAu49y9zB4OWAbT5nTRQlcobwy.3CpvMjq', '4'),
(68, 'hieu88999', '$2y$10$wXqZP.EW4g0cK40yrbVd6egW34CUCWCyeZxxAORYwq/pe4BDFq2Ze', '4'),
(69, 'hieuttph48379', '$2y$10$XiQ1ceV/D7OzCjijs35GIe.gbxp3BgbejblBOVy2aZhDhUqbnNbQe', '4'),
(70, 'trunghieu042000', '$2y$10$Xz.TeJtQa5thg5fPSMtr4uex2lKO6aed.YXWzNbl/i/.1SZeBYPwy', '4'),
(71, 'trunghieu112000', '$2y$10$AIvWU5Sa1Ti7AFuhqWaPHuBfY8rQk9jUG3viQcLdVRbYMQDTcaLAq', '4'),
(72, 'trunghieu0411', '$2y$10$fQgxxb7.ww5.Ei5wR2Wkz.KpZqzEziAbE6ZjiMoKp0UtTp1vaDsd6', '4'),
(73, 'mmmmmm', '$2y$10$psqtRngSJrlEJFd/DQfNJ.XNcfGlAo6PK/gxL7hX6yGBU/N1KPnSi', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user_vouchers`
--

CREATE TABLE `user_vouchers` (
  `user_voucher_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `voucher_id` int DEFAULT NULL,
  `is_used` tinyint(1) DEFAULT '0',
  `issued_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_vouchers`
--

INSERT INTO `user_vouchers` (`user_voucher_id`, `user_id`, `voucher_id`, `is_used`, `issued_date`) VALUES
(3, 27, 1, 0, '2024-11-01 14:02:54'),
(4, 33, 1, 0, '2024-11-01 14:13:44'),
(8, 36, 1, 0, '2024-11-01 23:03:03'),
(9, 37, 1, 0, '2024-11-03 17:23:29'),
(10, 38, 1, 0, '2024-11-07 17:55:23'),
(11, 39, 1, 0, '2024-11-07 17:57:32'),
(12, 40, 1, 0, '2024-11-08 14:05:07'),
(13, 41, 1, 0, '2024-11-11 00:39:31'),
(14, 42, 1, 0, '2024-11-11 02:00:08'),
(15, 43, 1, 0, '2024-11-13 17:36:29'),
(20, 46, 1, 0, '2024-11-20 12:23:53'),
(24, 47, 1, 0, '2024-11-21 00:51:12'),
(25, 48, 1, 0, '2024-11-21 00:53:18'),
(26, 49, 1, 0, '2024-11-21 00:53:42'),
(28, 51, 1, 0, '2024-11-21 01:10:50'),
(29, 52, 1, 0, '2024-11-21 01:26:44'),
(33, 56, 1, 0, '2024-11-23 20:45:43'),
(35, 58, 1, 0, '2024-11-26 17:03:00'),
(36, 59, 1, 0, '2024-11-26 17:05:19'),
(37, 60, 1, 0, '2024-11-26 17:05:45'),
(67, 66, 1, 0, '2024-12-03 13:36:21'),
(68, 66, 2, 0, '2024-12-03 13:44:31'),
(69, 66, 3, 0, '2024-12-03 13:44:36'),
(70, 67, 1, 0, '2024-12-03 14:46:36'),
(71, 68, 1, 0, '2024-12-04 02:25:46'),
(73, 69, 2, 0, '2024-12-04 16:41:36'),
(74, 69, 3, 0, '2024-12-04 16:41:44'),
(77, 65, 2, 1, '2024-12-04 17:25:25'),
(78, 65, 3, 0, '2024-12-04 17:28:41'),
(79, 70, 1, 0, '2024-12-04 17:41:42'),
(80, 70, 2, 1, '2024-12-04 17:41:58'),
(81, 70, 3, 0, '2024-12-04 17:42:02'),
(82, 71, 1, 0, '2024-12-04 17:53:13'),
(83, 72, 1, 0, '2024-12-04 17:54:48'),
(84, 65, 1, 0, '2024-12-05 03:13:56'),
(85, 65, 10, 1, '2024-12-05 15:44:59'),
(86, 73, 1, 0, '2024-12-06 12:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int NOT NULL,
  `code` varchar(50) NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `quantity` int NOT NULL,
  `minimum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `code`, `discount_percent`, `quantity`, `minimum`) VALUES
(0, '0', 0.00, 0, 0),
(1, 'MUNGBANMOI', 0.50, 0, 5000000),
(2, 'CHAODONPHAIMANH', 0.20, 97, 2000000),
(3, 'PHONGCACH', 0.30, 96, 3000000),
(5, 'NOEL2024', 0.15, 100, 1500000),
(6, 'NAMMOI2025', 0.25, 100, 400000),
(7, '1', 0.10, 1, 2222222),
(9, '2', 0.22, 2, 2222222),
(10, '3', 0.33, 3, 3333333);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `black_list`
--
ALTER TABLE `black_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_info_id`),
  ADD UNIQUE KEY `unique_user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_vouchers` (`voucher_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`variant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratings_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD PRIMARY KEY (`user_voucher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `black_list`
--
ALTER TABLE `black_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=367;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_info_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratings_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  MODIFY `user_voucher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL;

--
-- Constraints for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD CONSTRAINT `customer_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_vouchers` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_vouchers`
--
ALTER TABLE `user_vouchers`
  ADD CONSTRAINT `user_vouchers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_vouchers_ibfk_2` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`voucher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
