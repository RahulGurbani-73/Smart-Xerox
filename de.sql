-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 03:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `de`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(3, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`firstname`, `email`, `subject`, `feedback`) VALUES
('Ayush', 'ayush@gmail.com', 'For reliable and high-quality online printing', 'Printique and MPix consistently receive positive reviews for their print quality and speed. Printique is known for consistent and pleasing print quality,'),
('Ravi', 'ravi@gmail.com', 'Look for a service', 'Read reviews from other users to get a sense of the service&#039;s reputation and reliability'),
('Ram', 'ram@gmail.com', 'Pricing', 'What are your color rates?');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `totalPrice` int(255) NOT NULL,
  `payment_status` varchar(255) DEFAULT 'Pending',
  `user_id` int(11) NOT NULL,
  `token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `order_id`, `totalPrice`, `payment_status`, `user_id`, `token`) VALUES
(13, 'ORD-1742559270006', 258, 'Paid', 1, 9722),
(14, 'ORD-1742559360751', 276, 'Paid', 2, 7093),
(15, 'ORD-1742559360751', 240, 'Paid', 2, 5728),
(16, 'ORD-1742559456055', 1104, '1', 3, 4377),
(17, 'ORD-1742587092096', 48, 'Paid', 1, 1885),
(18, 'ORD-1742587092096', 976, '1', 1, 9802),
(19, 'ORD-1742638704459', 240, '1', 1, 4556),
(20, 'ORD-1742638704459', 168, 'Paid', 5, 5199),
(21, 'ORD-1742638704459', 24, '1', 5, 5543);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `order_id` varchar(255) NOT NULL,
  `file` longblob NOT NULL,
  `copies` int(255) NOT NULL,
  `orin` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `side` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `totalprice` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `token` int(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`order_id`, `file`, `copies`, `orin`, `color`, `side`, `type`, `size`, `totalprice`, `email`, `firstname`, `mobile`, `status`, `token`, `time`, `payment_status`) VALUES
('ORD-1742559360751', 0x75706c6f6164732f506f7274726169745f636f6c6f725f54776f20536964655f53706972616c5f41342f313734323535393338345f4153363620556e697420342e706466, 3, 'Portrait', 'color', 'Two Side', 'Spiral', 'A4', 276, 'ravi@gmail.com', 'Ravi', 2258794565, 'Accepted', 7093, '2025-03-21 17:46:23', 'Paid'),
('ORD-1742559360751', 0x75706c6f6164732f4c616e6453636170655f636f6c6f725f54776f20536964655f53706972616c5f41332f313734323535393431345f4153363620556e697420312e706466, 3, 'LandScape', 'color', 'Two Side', 'Spiral', 'A3', 240, 'ravi@gmail.com', 'Ravi', 2258794565, 'Accepted', 5728, '2025-03-21 17:46:54', 'Paid'),
('ORD-1742587092096', 0x75706c6f6164732f4c616e6453636170655f636f6c6f725f4f6e6520536964655f4e6f726d616c5f41342f313734323538373138315f415331322055312e706466, 2, 'LandScape', 'color', 'One Side', 'Normal', 'A4', 48, 'Meet@gmail.com', 'Meet', 9665767677, 'Accepted', 1885, '2025-03-22 01:29:41', 'Paid'),
('ORD-1742587092096', 0x75706c6f6164732f4c616e6453636170655f636f6c6f725f4f6e6520536964655f4e6f726d616c5f41342f313734323538373138315f415331322055332e706466, 2, 'LandScape', 'color', 'One Side', 'Normal', 'A4', 48, 'Meet@gmail.com', 'Meet', 9665767677, 'Accepted', 1885, '2025-03-22 01:29:41', 'Paid'),
('ORD-1742587092096', 0x75706c6f6164732f4c616e6453636170655f636f6c6f725f4f6e6520536964655f4e6f726d616c5f41342f313734323538373138315f415331322055342e706466, 2, 'LandScape', 'color', 'One Side', 'Normal', 'A4', 48, 'Meet@gmail.com', 'Meet', 9665767677, 'Accepted', 1885, '2025-03-22 01:29:41', 'Paid'),
('ORD-1742638704459', 0x75706c6f6164732f506f7274726169745f636f6c6f725f54776f20536964655f53706972616c5f41332f313734323830393436365f66696c652d362e706466, 3, 'Portrait', 'color', 'Two Side', 'Spiral', 'A3', 168, 'ram@gmail.com', 'Ram', 9873216540, 'Accepted', 5199, '2025-03-24 15:14:25', 'Paid'),
('ORD-1742638704459', 0x75706c6f6164732f506f7274726169745f636f6c6f725f54776f20536964655f53706972616c5f41332f313734323830393436365f66696c652d352e706466, 3, 'Portrait', 'color', 'Two Side', 'Spiral', 'A3', 168, 'ram@gmail.com', 'Ram', 9873216540, 'Accepted', 5199, '2025-03-24 15:14:25', 'Paid'),
('ORD-1742638704459', 0x75706c6f6164732f506f7274726169745f636f6c6f725f54776f20536964655f53706972616c5f41332f313734323830393436365f313734323032323130305f53455020444f432d312e706466, 3, 'Portrait', 'color', 'Two Side', 'Spiral', 'A3', 168, 'ram@gmail.com', 'Ram', 9873216540, 'Accepted', 5199, '2025-03-24 15:14:25', 'Paid'),
('ORD-1742638704459', 0x75706c6f6164732f506f7274726169745f636f6c6f725f54776f20536964655f53706972616c5f41332f313734323830393436365f313734323032323130305f53455020444f432e706466, 3, 'Portrait', 'color', 'Two Side', 'Spiral', 'A3', 168, 'ram@gmail.com', 'Ram', 9873216540, 'Accepted', 5199, '2025-03-24 15:14:25', 'Paid'),
('ORD-1742638704459', 0x75706c6f6164732f4c616e6453636170655f636f6c6f725f54776f20536964655f4e6f726d616c5f41342f313734323830393533375f313734323538373138315f415331322055312e706466, 1, 'LandScape', 'color', 'Two Side', 'Normal', 'A4', 24, 'ram@gmail.com', 'Ram', 9873216540, '1', 5543, '2025-03-24 15:15:37', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `enroll` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `mobile`, `enroll`, `sem`, `password`) VALUES
(1, 'Meet', 'Sharma', 'Meet@gmail.com', 9665767677, 'A33', '6', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Ravi', 'Shah', 'ravi@gmail.com', 2258794565, 'A44', '6', '25d55ad283aa400af464c76d713c07ad'),
(3, 'Ayush', 'Sharma', 'ayush@gmail.com', 7894561230, 'A99', '6', '25d55ad283aa400af464c76d713c07ad'),
(4, 'Harsh', 'Jain', 'harshjain@gmail.com', 8145639871, 'A22', '4', '25d55ad283aa400af464c76d713c07ad'),
(5, 'Ram', 'Jain', 'ram@gmail.com', 9873216540, '202200319010419', '6', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `add_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `alt_phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`add_id`, `user_id`, `pincode`, `locality`, `address`, `city`, `state`, `landmark`, `alt_phone`, `created_at`, `updated_at`) VALUES
(3, 1, '390001', 'CA CIrcle', '9 Chandra Colony, Opp. GLS University, Nr Ford Showroom Lane, Off C.G Road, Navrangpura', 'Ahmedabad', 'Gujrat ', '', '', '2025-03-11 07:21:20', '2025-03-24 10:16:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
