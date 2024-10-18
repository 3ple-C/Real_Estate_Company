-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 11:56 AM
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
-- Database: `royal_havens_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Buildings'),
(2, 'Lands'),
(3, 'Cars');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rooms` int(50) NOT NULL,
  `washrooms` int(50) NOT NULL,
  `area_size` int(25) NOT NULL,
  `state` varchar(200) NOT NULL,
  `town` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `color` varchar(255) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `drive` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `description`, `price`, `category_id`, `create_at`, `rooms`, `washrooms`, `area_size`, `state`, `town`, `address`, `color`, `brand`, `drive`) VALUES
(1, 'Infinix ', 'Best property', 7800000.00, 0, '2024-09-30 15:19:43', 0, 0, 8000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(3, 'Infinix ', 'Best property', 250000.00, 2, '2024-10-01 09:38:54', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(4, 'Emmylightgroup', 'Best property', 90000000.00, 1, '2024-10-01 22:49:43', 4, 2, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(5, ' SF90 Stradale', 'Fastest Car Model Created', 0.00, 3, '2024-10-02 08:28:03', 0, 0, 0, '', '', '', 'Crimson', 'Ferrari', '4WD'),
(6, 'Infinix ', 'Fastest Car Model Created', 9.00, 3, '2024-10-04 15:53:51', 0, 0, 0, '', '', '', 'Red', 'Toyota', '4WD'),
(7, 'Classic Zonac ', 'Properties limited', 507.00, 2, '2024-10-09 11:17:00', 0, 0, 8000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(8, 'Classic Zonac ', 'Properties limited', 9.00, 2, '2024-10-09 11:20:54', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(9, 'Classic Zonac ', 'Properties limited', 9.00, 2, '2024-10-09 11:41:48', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(10, 'Classic Zonac ', 'Properties limited', 9.00, 2, '2024-10-09 11:42:23', 0, 0, 8000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(11, 'Classic Zonac ', 'Properties limited', 9.00, 2, '2024-10-09 11:54:55', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(12, 'Classic Zonac ', 'Properties limited', 9.00, 2, '2024-10-09 12:05:27', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(13, 'Emmylightgroup', 'Properties limited', 780.00, 1, '2024-10-09 12:08:08', 4, 5, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', ''),
(14, 'Camry', 'Fastest Car Model Created', 507.00, 3, '2024-10-09 12:11:05', 0, 0, 0, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', 'Crimson', 'Toyota', '4WD'),
(15, '3 Duplex ', 'Perfect Building for a family', 9.00, 1, '2024-10-09 13:15:26', 7, 5, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', 'White', '', ''),
(16, 'Umnudioka 12 plots', 'Land Properties limited', 60.00, 2, '2024-10-10 09:46:22', 0, 0, 4000, 'Anambra', 'Amawbia', 'New friends Estate Amawbia', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_pics`
--

CREATE TABLE `property_pics` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_pics`
--

INSERT INTO `property_pics` (`id`, `property_id`, `img`, `status`) VALUES
(1, 14, 'uploads/download.jpeg', 'active'),
(2, 15, 'uploads/partner8.jpg', 'active'),
(3, 16, 'uploads/partner6.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Stitchitin_Academy', 'triplec7@gmail.com', '$2y$10$kY7S86BV9r2jdDkkjqGN5uaVjOjSzufzDy6mXegtt3nu2zqwOG5Ze', 'admin', '2024-09-27 08:40:02'),
(2, 'Chukwuma Chimaroke C.', 'triplec871@gmail.com', '$2y$10$9GtRICZ7DdrpLSNxN95vl.mf4ZsWKRRFzowNC5Pui8EAqZMOgzUF6', 'admin', '2024-10-01 09:33:47'),
(3, 'Chukwuma Chimaroke C.', 'tric@gmail.com', '$2y$10$OKpwNj6FRhVlmQXIdETaKe1LcFr1.vjOTUwsjUuHyxQ/QmR3lVL9e', 'customer', '2024-10-03 14:14:52'),
(4, 'Stitchitin_Academy', 'royalhaven@gmail.com', '$2y$10$LK8xpYjLNhDvym8Uatru3.uMKsH3XgKyWXbMnTbttMmXew7kUO0l2', 'customer', '2024-10-03 14:20:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `property_pics`
--
ALTER TABLE `property_pics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `property_pics`
--
ALTER TABLE `property_pics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_pics`
--
ALTER TABLE `property_pics`
  ADD CONSTRAINT `property_pics_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
