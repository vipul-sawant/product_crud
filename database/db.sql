-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2024 at 06:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_crud`
--
CREATE DATABASE IF NOT EXISTS `product_crud` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `product_crud`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `info`, `price`, `created_at`, `updated_at`) VALUES
(6, 'samsung galaxy a 34', 'a superb smartphone but with no earphone jack', '26500', '2024-04-11 20:56:11', '2024-04-11 17:26:11'),
(7, 'boat speakers', '', '900', '2024-04-11 21:06:15', '2024-04-11 19:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pass` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp` varchar(255) DEFAULT NULL,
  `otpExpiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `created_at`, `pass`, `username`, `updated_at`, `otp`, `otpExpiry`) VALUES
(4, 'sanket', 'shankyMonkey@gmail.com', '2024-04-10 18:22:54', '$2y$10$aWq0ct8MRSj2fqui6qzYduFasg74W0py5Kh5c6IgZsRxDci5Kchl6', 'sage', '2024-04-11 19:38:25', NULL, NULL),
(8, 'vipul', 'vipulsawant@gmail.com', '2024-04-11 06:13:05', '$2y$10$ylvDj6HmVkOqGuYXyZnXR.c3rbdRnBW4JRswxv1WhEvfQC8SHzgau', 'sage_', '2024-04-13 14:44:16', NULL, NULL),
(10, 'boruto', 'boruto@gmail.com', '2024-04-11 06:24:13', '$2y$10$5AYikVSMaRF0d3M4VykS9u4B2Yf5urRW7gZeiNEmx7d/vf23JytlC', 'sage3', '2024-04-10 18:30:00', NULL, NULL),
(11, 'v', 'vipssawant842@gmail.coml', '2024-04-11 09:07:44', '$2y$10$w2D/IKtvijjKxuONDOCCTuZXPFjmuoULI7pSlPjlFQwduii/g7FkG', 'sage_2', '2024-04-11 17:24:51', '1111', '2024-04-11 22:58:34'),
(16, 'vipul', 'vipul@gmail.com', '2024-04-11 10:18:39', '$2y$10$vKKpKrutfZs3.wQ3bl8MaOnGj8jkdORfn3IfViN/0an0YgyHyC4Ua', 'vipz', '2024-04-10 18:30:00', NULL, NULL),
(20, 'v', 'a@gmail.com', '2024-04-11 10:50:16', '$2y$10$CAwNoV5xBi6nT0wRmO9M4uruoBlXcKns8neJNS8Pd/ovF/YuYHlQG', 'az', '2024-04-10 18:30:00', NULL, NULL),
(21, 'vipul sawant', 'vip@gmail.com', '2024-04-11 20:53:47', NULL, NULL, '2024-04-11 20:53:47', NULL, NULL),
(22, 'vipul', 'vipulsawant847@gmail.com', '2024-04-13 15:43:57', '$2y$10$oFPUPkCbwZYYdRv/Mk/Ycus1lpWINVmVxrOgPsllqab/i1kbt/Yly', 'vipulsawant847', '2024-04-13 12:15:43', '1111', '2024-04-13 17:49:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
