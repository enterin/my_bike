-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 10:39 AM
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
-- Database: `bike_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `servicerequests`
--

CREATE TABLE `servicerequests` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `bike_model` varchar(50) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `service_date` date NOT NULL,
   `service_price` decimal(10, 2) NOT NULL, -- Adding the service price field
  `service_time` time NOT NULL,
 
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `user_gmail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicerequests`
--

INSERT INTO `servicerequests` (`id`, `phone`, `bike_model`, `service_type`, `service_date`,`service_price`, `service_time`, `status`, `user_gmail`, `created_at`) VALUES
(1, '7043844438', 'we', 'tire_change', '2023-08-03', '08:00:00', 80.00, 'accepted', NULL, '2023-07-24 06:00:28'), -- Assuming tire change price is $80
(2, '1234567891', 'ktm_duke', 'Engine Servicing', '2023-08-25', '10:00:00', 100.00, 'accepted', 'htaibani3@gmail.com', '2023-08-24 06:42:37'),
(3, '9081542733', 'royal_enfield_classic', 'Engine Servicing', '2023-08-25', '10:00:00', 100.00, 'pending', 'htaibani3@gmail.com', '2023-08-24 08:22:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `servicerequests`
--
ALTER TABLE `servicerequests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `servicerequests`
--
ALTER TABLE `servicerequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
