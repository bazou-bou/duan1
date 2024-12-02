-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2024 at 05:06 PM
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
(4, 3),
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
(5, 4, 1, 123, NULL),
(6, 5, 2, 20, NULL),
(7, 5, 1, 4, NULL),
(8, 5, 3, 2, NULL),
(9, 5, 4, 3, NULL);

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
(18, 1, 23, 'm.chi005', '\'haha\'', '2024-11-30 05:02:42', 1);

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
(8, 23, '99078359.00', '1', 344122842, 'Tùng dz', 'Thái Bình');

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
(24, 8, 4, 3, 'upload/shoeL2.jpg', '2024-12-01', 1487529, 'Thái Bình', 'Tùng dz', 344122842);

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
(1, 'Giày 1', 'Giày tốt', 5000000, 12, 'upload/shoeL3.jpg', 426, 1, 2),
(2, 'Giày 2', 'Giày tốt giá tốt', 3256543, 11, 'upload/shoeA1.jpg', 82, 1, 1),
(3, 'Giày 3', 'Giày tốt', 4742456, 13, 'upload/shoeA2.jpg', 92, 1, 3),
(4, 'Giày 4', 'mb hb', 1487529, 34, 'upload/shoeL2.jpg', 98, 1, 2),
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
(22, 'trantung25', 'upload/avata02.jpg', '2508', 'trantungvn8@gmail.com', NULL, 0),
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
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
