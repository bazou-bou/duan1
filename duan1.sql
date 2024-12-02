-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 07:13 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image_path`, `title`, `status`) VALUES
(1, 'upload/Banner-uiux.jpg', 'banner1', 1),
(2, 'upload/Banner-uiux-6.jpg', 'wesvrervdsc', 1),
(4, 'upload/412949799_18216870532270880_6448690469242135409_n.jpg', 'xinh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`) VALUES
(6, 2),
(4, 3),
(7, 22),
(5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `item_id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `card_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`item_id`, `cart_id`, `product_id`, `quantity`, `card_img`) VALUES
(5, 4, 1, 8, NULL),
(10, 4, 3, 104, NULL),
(11, 4, 2, 20, NULL),
(12, 4, 4, 6, NULL),
(13, 6, 2, 100, NULL),
(15, 7, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `img`, `status`) VALUES
(1, 'Giày nam', 'upload/giay_nam.jpg', 1),
(2, 'Giày nữ', 'upload/giay_nu.png', 1),
(3, 'Giày trẻ em', 'upload/shoe3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `product_id`, `user_id`, `username`, `content`, `comment_date`, `status`) VALUES
(7, 1, NULL, 'admin', '\'rftgfaedfeq\'', '2024-11-19 19:14:25', 0),
(8, 1, NULL, 'Anonymous', '\'rftgfaedfeq\'', '2024-11-19 19:15:30', 1),
(12, 1, 3, 'tung25', '\'ìuyuhfjvbnlwekfhjb\'', '2024-11-20 01:29:28', 0),
(13, 1, 3, 'tung25', '\'tungfjnnuiogijnbg ọighih\'', '2024-11-20 01:30:05', 1),
(14, 1, 3, 'tung25', '\'tungfjnnuiogijnbg ọighih\'', '2024-11-20 01:58:11', 1),
(15, 4, 3, 'tung25', '\'dmm\'', '2024-11-25 21:32:55', 0),
(16, 1, 23, 'm.chi005', '\'ưelghdfgljdslfkj\'', '2024-11-30 05:01:40', 1),
(17, 1, 23, 'm.chi005', '\'ưelghdfgljdslfkj\'', '2024-11-30 05:02:36', 1),
(18, 1, 23, 'm.chi005', '\'haha\'', '2024-11-30 05:02:42', 1),
(19, 3, 3, 'tung25', '\'\'', '2024-12-01 20:32:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  `contact_mess` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contact_status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_mess`, `created_at`, `contact_status`) VALUES
(1, 'linh le', 'linh@gmail.com', '0123456789', 'cửa hàng uy tín', '2024-12-01 21:27:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `new_id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `new_img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `view` smallint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`new_id`, `user_id`, `title`, `content`, `new_img`, `view`, `status`, `created_at`) VALUES
(2, 9, 'Google xác nhận trả tiền tỷ cho Apple để mặc định công cụ tìm kiếm', ' Hiện Liên minh châu Âu cũng đề nghị các thiết bị phải cài đặt \"giao diện lựa chọn\" ngay từ đầu để người dùng truy cập những công cụ tìm kiếm ngoài Google.</p>', 'php/client/view/viewclient/images/ds_1.webp', 14, 0, '2023-11-15 20:53:51'),
(8, 4, 'Lịch sử hình thành của Converse', '<p><i><strong>Câu chuyện về Converse luôn là chủ đề được nhiều tín đồ sneaker quan tâm. Là một thương hiệu có mặt từ lâu đời với các thiết kế mang vẻ đẹp cổ điển không hề bị mai một với thời gian. Converse đang ngày càng giữ vững vị thế và phát triển hơn trên con đường thời trang hiện đại. Hãy cùng Drake VN khám phá câu chuyện thú vị về thương hiệu này ngay bài viết dưới đây nhé.</strong></i></p><p>&nbsp;</p><h2><strong>Câu chuyện về Converse với sự hình thành đáng tự hào</strong></h2><p>Năm 1917 là năm mà thiết kế đầu tiên được ra đời. Với tên gọi Non skids - đôi giày bóng rổ đầu tiên ở Thế Giới đã gây ra một làn sóng mới với các cầu thủ bóng rổ. Với nhiều người ở Mỹ thì đôi giày này còn chính là một sự thay đổi lớn, bùng nổ hơn. Kể từ thời điểm đó, những đôi giày Canvas luôn là sự lựa chọn không thể tách rời của bất cứ cầu thủ hay các huấn luyện viên.</p>', 'https://res.cloudinary.com/dvysn6zdt/image/upload/v1731396213/upload_ecommerce/phpE24E_lt4fcu.jpg', 2, 1, '2024-11-12 14:23:33'),
(9, 2, 'Converse mãi đỉnh', 'fgfge', 'https://images2.thanhnien.vn/528068263637045248/2024/1/25/e093e9cfc9027d6a142358d24d2ee350-65a11ac2af785880-17061562929701875684912.jpg', 23, 1, '2024-12-02 03:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sdt` int DEFAULT NULL,
  `name_custom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total`, `status`, `sdt`, `name_custom`, `address`) VALUES
(6, 23, '99078359.00', '1', 344122842, 'Trần Thanh Tùng', 'Thái Bình city'),
(7, 23, '99078359.00', '1', 344122842, 'Tùng dz', 'Thái Bình'),
(8, 23, '99078359.00', '1', 344122842, 'Tùng dz', 'Thái Bình'),
(9, 23, '99078359.00', '0', 344122842, 'Bùi Thu Hiền', 'Thái Bình city'),
(10, 22, '32565430.00', '0', 344122842, 'Bùi Thu Hiền', 'Thái Bình city');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_date` date NOT NULL,
  `order_price` int NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name_custom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sdt` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `order_img`, `order_date`, `order_price`, `address`, `name_custom`, `sdt`) VALUES
(7, 6, 2, 20, 'upload/shoeA1.jpg', '2022-01-01', 3256543, 'Thái Bình city', 'Trần Thanh Tùng', 344122842),
(8, 6, 1, 4, 'upload/imgshoeA3.jpg', '2022-02-01', 5000000, 'Thái Bình city', 'Trần Thanh Tùng', 344122842),
(9, 6, 3, 2, 'upload/shoeA2.jpg', '2022-01-01', 4742456, 'Thái Bình city', 'Trần Thanh Tùng', 344122842),
(14, 7, 2, 20, 'upload/shoeA1.jpg', '2023-12-01', 3256543, 'Thái Bình', 'Tùng dz', 344122842),
(15, 7, 1, 4, 'upload/shoeL3.jpg', '2023-12-01', 5000000, 'Thái Bình', 'Tùng dz', 344122842),
(16, 7, 3, 2, 'upload/shoeA2.jpg', '2023-12-01', 4742456, 'Thái Bình', 'Tùng dz', 344122842),
(17, 7, 4, 3, 'upload/shoeL2.jpg', '2023-12-01', 1487529, 'Thái Bình', 'Tùng dz', 344122842),
(21, 8, 2, 20, 'upload/shoeA1.jpg', '2024-12-01', 3256543, 'Thái Bình', 'Tùng dz', 344122842),
(22, 8, 1, 4, 'upload/shoeL3.jpg', '2024-12-01', 5000000, 'Thái Bình', 'Tùng dz', 344122842),
(23, 8, 3, 2, 'upload/shoeA2.jpg', '2024-12-01', 4742456, 'Thái Bình', 'Tùng dz', 344122842),
(24, 8, 4, 3, 'upload/shoeL2.jpg', '2024-12-01', 1487529, 'Thái Bình', 'Tùng dz', 344122842),
(25, 9, 2, 20, 'upload/shoeA1.jpg', '2024-12-02', 3256543, 'Thái Bình city', 'Bùi Thu Hiền', 344122842),
(26, 9, 1, 4, 'upload/shoeL3.jpg', '2024-12-02', 5000000, 'Thái Bình city', 'Bùi Thu Hiền', 344122842),
(27, 9, 3, 2, 'upload/shoeA2.jpg', '2024-12-02', 4742456, 'Thái Bình city', 'Bùi Thu Hiền', 344122842),
(28, 9, 4, 3, 'upload/shoeL2.jpg', '2024-12-02', 1487529, 'Thái Bình city', 'Bùi Thu Hiền', 344122842),
(32, 10, 2, 10, 'upload/shoeA1.jpg', '2024-12-02', 3256543, 'Thái Bình city', 'Bùi Thu Hiền', 344122842);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `views` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `stock`, `img`, `views`, `status`, `category_id`) VALUES
(1, 'Giày 1', 'Giày tốt', 5000000, 12, 'upload/shoeL3.jpg', 440, 1, 2),
(2, 'Giày 2', 'Giày tốt giá tốt', 3256543, 11, 'upload/shoeA1.jpg', 175, 1, 1),
(3, 'Giày 3', 'Giày tốt', 4742456, 13, 'upload/shoeA2.jpg', 112, 1, 3),
(4, 'Giày 4', 'mb hb', 1487529, 34, 'upload/shoeL2.jpg', 153, 1, 2),
(8, '	SamSung S23 ultra', 'Apple Macbook Air 13 M3 – Thiết kế mỏng nhẹ, hiệu năng vượt trội.RAM 8GB cùng dung lượng lưu trữ 256GB mượt mà.', 25000000, 42562, 'upload/shoeL4.jpg', 24253255, 1, 3),
(9, '	SamSung S23 ultra', 'Apple Macbook Air 13 M3 – Thiết kế mỏng nhẹ, hiệu năng vượt trội.RAM 8GB cùng dung lượng lưu trữ 256GB mượt mà.', 25000000, 42562, 'upload/shoeL4.jpg', 24253253, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'upload/avata02.jpg',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `role` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `img`, `password`, `email`, `role`, `status`) VALUES
(2, 'admin', 'upload/avata02.jpg', '123456', 'dafd', 0, 1),
(3, 'tung25', 'upload/avata02.jpg', '2508', 'adsfd', 1, 1),
(4, '', 'upload/avata02.jpg', '', '', NULL, 1),
(21, 'bou2005', 'upload/avata02.jpg', '123456', 'giaabaoo0510@gmail.com', NULL, 0),
(22, 'trantung25', 'upload/avata02.jpg', '2508', 'trantungvn8@gmail.com', NULL, 1),
(23, 'm.chi005', 'upload/avata02.jpg', '2508', 'steamlo2k5@gmail.com', NULL, 1),
(30, 'Tung_no_pro25', 'upload/avata02.jpg', '2508', 'anhdat0501.2005@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variant_id` int NOT NULL,
  `variant_name` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variant_product`
--

CREATE TABLE `variant_product` (
  `variant_product_id` int NOT NULL,
  `product_id` int NOT NULL,
  `variant_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`new_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `variant_product`
--
ALTER TABLE `variant_product`
  ADD PRIMARY KEY (`variant_product_id`),
  ADD KEY `product_variant` (`product_id`),
  ADD KEY `variantid` (`variant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `new_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variant_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `variant_product`
--
ALTER TABLE `variant_product`
  MODIFY `variant_product_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`),
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `variant_product`
--
ALTER TABLE `variant_product`
  ADD CONSTRAINT `product_variant` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `variantid` FOREIGN KEY (`variant_id`) REFERENCES `variant` (`variant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
