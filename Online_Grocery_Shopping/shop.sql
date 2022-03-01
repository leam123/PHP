-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2020 at 01:53 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `email`, `type`) VALUES
(1, 'garcia', 'garcia', 'garcia.leamor1@gmail', 'Admin'),
(4, 'rabe', 'rabe', 'rabe@gmail.com', 'Customer'),
(5, 'cherry', 'cherry', 'cherry@gmail.com', 'Customer'),
(6, 'erwin', 'erwin', 'erwin@gmail.com', 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `ct_order`
--

CREATE TABLE `ct_order` (
  `order_id` int(11) NOT NULL,
  `acc_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `date_ordered` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ct_order`
--

INSERT INTO `ct_order` (`order_id`, `acc_id`, `prod_id`, `paid_amount`, `date_ordered`) VALUES
(7, NULL, 3, 0, '2020-03-21 11:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `phoneNo` bigint(11) NOT NULL,
  `street` varchar(20) DEFAULT NULL,
  `brgy` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postalCode` bigint(11) DEFAULT NULL,
  `acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `lastName`, `firstName`, `phoneNo`, `street`, `brgy`, `city`, `postalCode`, `acc_id`) VALUES
(1, 'Garcia', 'Leamor', 9223676471, 'Kalunasan', 'Kalunasan', 'Cebu City', 6000, 1),
(4, 'Rabe', 'Emanuel', 9123456789, 'N.Bacalso', 'Adlaon', 'Cebu', 6000, 4),
(5, 'Garcia', 'Cherry', 9457728844, 'Kalunasan', 'Kalunasan', 'Cebu', 6000, 5),
(6, 'Villarojo', 'Erwin', 9111111111, 'Punta', 'Adlaon', 'Cebu', 6000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `prod_id` int(11) NOT NULL,
  `unitCost` double NOT NULL,
  `price_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`prod_id`, `unitCost`, `price_id`) VALUES
(1, 15.75, 1),
(2, 15.75, 2),
(3, 55, 3),
(4, 55, 4),
(5, 35.9, 5),
(6, 109.9, 6),
(10, 25.15, 9),
(11, 65.5, 10),
(12, 35.9, 11),
(13, 20, 12),
(14, 22.5, 13),
(15, 15, 14),
(16, 15, 15),
(17, 45.15, 16),
(19, 25.15, 18),
(22, 35.9, 21),
(23, 15, 22);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category`, `quantity`, `image`) VALUES
(1, 'Oreo', 'Biscuits', 88, 'img/oreo.jpg'),
(2, 'Colgate Toothpaste', 'Personal Hygiene', 75, 'img/colgate.jpg'),
(3, 'Dove Shampoo', 'Personal Hygiene', 15, 'img/dove.jpg'),
(4, 'Rexona for Men', 'Personal Hygiene', 11, 'img/rexona.png'),
(5, 'Palm Oil', 'Home Products', 85, 'img/palmOil.jpg'),
(6, 'Lays Classic', 'Chips', 75, 'img/lays.jpg'),
(10, 'Classic Cola ', 'Drinks', 55, 'img/cola1.jpg'),
(11, 'Coca Cola 1 Liter', 'Drinks', 20, 'img/cola2.jpg'),
(12, 'Mug Root Beer', 'Drinks', 85, 'img/beer.jpg'),
(13, 'Apple', 'Fruits', 35, 'img/apples.jpg'),
(14, 'Orange', 'Fruits', 30, 'img/oranges.jpg'),
(15, 'Lettuce', 'Vegetables', 20, 'img/lettuce.jpg'),
(16, 'Broccoli', 'Vegetables', 20, 'img/broccoli.jpg'),
(17, 'Emporia Tissue', 'Toiletries', 25, 'img/tissue.jpg'),
(19, 'Cadbury Diary Milk Silk', 'Chocolates', 80, 'img/diaryMilk.jpg'),
(22, 'McCormick Whole Black Pepper', 'Seasoning', 20, 'img/pepper.jpg'),
(23, 'Nestle KitKat Original', 'Chocolates', 85, 'img/kitkat.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct_order`
--
ALTER TABLE `ct_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `ct_order_ibfk_1` (`acc_id`),
  ADD KEY `ct_order_ibfk_2` (`prod_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_ibfk_1` (`acc_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`),
  ADD KEY `price_ibfk_1` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ct_order`
--
ALTER TABLE `ct_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_order`
--
ALTER TABLE `ct_order`
  ADD CONSTRAINT `ct_order_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ct_order_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
