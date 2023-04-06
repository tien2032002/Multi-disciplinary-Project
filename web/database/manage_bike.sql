-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 04:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_bike`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike`
--

CREATE TABLE `bike` (
  `id` varchar(10) NOT NULL,
  `hired_hours` time DEFAULT '00:00:00',
  `price` int(10) DEFAULT 10000,
  `status` enum('ok','broken','maintaining','hired') DEFAULT 'ok',
  `name` varchar(50) NOT NULL DEFAULT 'abc',
  `img_URL` varchar(50) NOT NULL DEFAULT 'abc.png',
  `paint` varchar(50) NOT NULL DEFAULT 'abc',
  `frame` varchar(50) NOT NULL DEFAULT 'abc',
  `saddle` varchar(50) NOT NULL DEFAULT 'abc',
  `size_x` int(10) NOT NULL DEFAULT 100,
  `size_y` int(10) NOT NULL DEFAULT 150,
  `size_z` int(10) NOT NULL DEFAULT 50,
  `weight` int(10) NOT NULL DEFAULT 20,
  `payload` int(10) NOT NULL DEFAULT 100,
  `min_height` int(10) NOT NULL DEFAULT 150,
  `note` varchar(50) NOT NULL DEFAULT 'abc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bike`
--

INSERT INTO `bike` (`id`, `hired_hours`, `price`, `status`, `name`, `img_URL`, `paint`, `frame`, `saddle`, `size_x`, `size_y`, `size_z`, `weight`, `payload`, `min_height`, `note`) VALUES
('0001', '100:00:00', 20000, 'ok', 'xe leo nui', 'xe_leo_nui.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0002', '70:00:00', 10000, 'hired', 'xe di cho', 'xe_di_cho.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0003', '100:00:00', 15000, 'ok', 'xe dia hinh', 'xe_dia_hinh.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0004', '40:00:00', 15000, 'maintaining', 'xe the thao', 'xe_dia_hinh.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0005', '100:00:00', 10000, 'broken', 'xe du lich', 'xe_du_lich.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0006', '100:00:00', 15000, 'ok', 'xe dia hinh', 'xe_dia_hinh.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0007', '90:00:00', 10000, 'hired', 'xe du lich', 'xe_du_lich.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0008', '100:00:00', 15000, 'maintaining', 'xe the thao', 'xe_the_thao.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0009', '100:00:00', 15000, 'ok', 'xe the thao', 'xe_the_thao.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc'),
('0010', '50:00:00', 20000, 'ok', 'xe leo nui', 'xe_leo_nui.png', 'abc', 'abc', 'abc', 100, 150, 50, 20, 100, 150, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`) VALUES
('123456789001'),
('123456789011'),
('123456789056');

-- --------------------------------------------------------

--
-- Table structure for table `have_bikes`
--

CREATE TABLE `have_bikes` (
  `station_id` varchar(10) NOT NULL,
  `bike_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `have_bikes`
--

INSERT INTO `have_bikes` (`station_id`, `bike_id`) VALUES
('001', '0002'),
('001', '0003'),
('001', '0006'),
('002', '0004'),
('002', '0010'),
('003', '0007'),
('003', '0009'),
('004', '0005'),
('005', '0001'),
('005', '0008');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `customer_id` varchar(12) NOT NULL,
  `bike_id` varchar(10) NOT NULL,
  `start_time` datetime NOT NULL DEFAULT curtime(),
  `end_time` datetime DEFAULT addtime(current_timestamp(),'01:00:00'),
  `total_time` time DEFAULT '01:00:00',
  `revenue` int(11) DEFAULT NULL,
  `report` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`customer_id`, `bike_id`, `start_time`, `end_time`, `total_time`, `revenue`, `report`) VALUES
('123456789001', '0002', '2023-03-11 17:10:18', '2023-03-11 18:10:18', '01:00:00', 100000, NULL),
('123456789011', '0007', '2023-03-11 17:10:35', '2023-03-11 18:10:35', '01:00:00', 100000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_staff`
--

CREATE TABLE `maintenance_staff` (
  `id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maintenance_staff`
--

INSERT INTO `maintenance_staff` (`id`) VALUES
('123456789015'),
('123456789070'),
('123456789142');

-- --------------------------------------------------------

--
-- Table structure for table `manage`
--

CREATE TABLE `manage` (
  `manager_id` varchar(12) NOT NULL,
  `station_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage`
--

INSERT INTO `manage` (`manager_id`, `station_id`) VALUES
('123456789012', '001'),
('123456789012', '002'),
('123456789012', '004'),
('123456789013', '003'),
('123456789013', '005');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`) VALUES
('123456789012'),
('123456789013');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `started_date` date DEFAULT curdate(),
  `capacity` int(11) NOT NULL,
  `num_of_bikes` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `revenue` int(11) DEFAULT NULL,
  `status` enum('working','maintaining','closed') DEFAULT NULL,
  `longtitude` varchar(20) NOT NULL DEFAULT '0',
  `latitude` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name`, `started_date`, `capacity`, `num_of_bikes`, `address`, `revenue`, `status`, `longtitude`, `latitude`) VALUES
('001', 'Tram Bach Khoa', '2023-01-01', 20, 20, 'Dai hoc Bach khoa CS2', 30000000, 'maintaining', '0', '0'),
('002', 'Tram Suoi Tien', '2023-01-01', 25, 25, 'Cong vien van hoa Suoi Tien', 30000000, 'working', '0', '0'),
('003', 'Tram KTX', '2023-01-01', 30, 20, 'KTX khu B DHQG TPHCM', 30000000, 'closed', '0', '0'),
('004', 'Tram ben xe mien Dong', '2023-01-01', 35, 30, 'Ben xe mien Dong moi', 30000000, 'closed', '0', '0'),
('005', 'Tram Vincom', '2023-01-01', 30, 30, 'Vincom Mega Mall', 30000000, 'working', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `station_status`
--

CREATE TABLE `station_status` (
  `station_id` varchar(10) NOT NULL,
  `date_time` datetime DEFAULT curtime(),
  `temperature` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `status` enum('ok','hot','humid') DEFAULT 'ok'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_status`
--

INSERT INTO `station_status` (`station_id`, `date_time`, `temperature`, `humidity`, `status`) VALUES
('001', '2023-03-11 17:20:10', 30, 70, 'ok'),
('002', '2023-03-11 17:20:10', 40, 70, 'hot'),
('003', '2023-03-11 17:20:10', 30, 90, 'humid'),
('004', '2023-03-11 17:20:10', 25, 70, 'ok'),
('005', '2023-03-11 17:20:10', 30, 75, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_num` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `role` enum('customer','manager','maintenance staff') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone_num`, `email`, `address`, `role`) VALUES
('123456789001', 'Nguyen Phuoc Bao Tien', '123', '0123456789', 't@gmail.com', 'ktx', 'customer'),
('123456789011', 'Nguyen Khanh Hung', '123', '0123456789', 'hung@gmail.com', 'ktx', 'customer'),
('123456789012', 'Nguyen Hung', '123', '0123456389', 'nkh@gmail.com', 'ktx', 'manager'),
('123456789013', 'Vu Hoang Minh Tuan', '123', '0123356789', 'tuan@gmail.com', 'ktx', 'manager'),
('123456789015', 'Nguyen Huynh Anh Duy', '123', '0123456189', 'duy@gmail.com', 'ktx', 'maintenance staff'),
('123456789056', 'Nguyen Anh Duy', '123', '0133456789', 'ad@gmail.com', 'ktx', 'customer'),
('123456789070', 'Minh Tuan', '123', '0123456719', 'mtuan@gmail.com', 'ktx', 'maintenance staff'),
('123456789142', 'Nguyen Tien', '123', '0123456789', 'hung@gmail.com', 'ktx', 'maintenance staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike`
--
ALTER TABLE `bike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `have_bikes`
--
ALTER TABLE `have_bikes`
  ADD PRIMARY KEY (`station_id`,`bike_id`),
  ADD KEY `bike_id` (`bike_id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`customer_id`,`bike_id`,`start_time`),
  ADD KEY `bike_id` (`bike_id`);

--
-- Indexes for table `maintenance_staff`
--
ALTER TABLE `maintenance_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`manager_id`,`station_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station_status`
--
ALTER TABLE `station_status`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `have_bikes`
--
ALTER TABLE `have_bikes`
  ADD CONSTRAINT `have_bikes_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `have_bikes_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hire`
--
ALTER TABLE `hire`
  ADD CONSTRAINT `hire_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hire_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bike` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance_staff`
--
ALTER TABLE `maintenance_staff`
  ADD CONSTRAINT `maintenance_staff_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manage`
--
ALTER TABLE `manage`
  ADD CONSTRAINT `manage_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manage_ibfk_2` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `station_status`
--
ALTER TABLE `station_status`
  ADD CONSTRAINT `station_status_ibfk_1` FOREIGN KEY (`station_id`) REFERENCES `station` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
