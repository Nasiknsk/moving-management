-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `packing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(75) NOT NULL,
  `city` text NOT NULL,
  `type` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `status` text NOT NULL,
  `code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `address`, `city`, `type`, `email`, `password`, `nic`, `status`, `code`) VALUES
(1, 'Mohammed Nasik', 772977835, '485/1/c kalugamuwa', 'Gelioya', 'admin', 'mohammednasik68@gmail.com', '12345678', '991913092v', 'active', '467321'),
(2, 'Mohammed Nazeem', 766402206, '485/2 Kalugamuwa', 'Gelioya', 'driver', 'nazeeem@gmail.com', '12345678', '696887562v', 'active', ''),
(5, 'Inas Ahamed', 772977835, '485/1/c', 'Gelioya', 'driver', 'inasahamed@gmail.com', '12345678', '991913097v', 'active', ''),
(7, 'mohammed salah', 772977835, '485/1/c', 'Gelioya', 'supervisor', 'salah@gmail.com', '12345678', '971913093v', 'active', ''),
(8, 'Ahamed ', 772977835, 'No 27 kalugamuwa', 'Gelioya', 'supervisor', 'ahamed@gmail.com', '123456', '991713094v', 'active', ''),
(11, 'jamal musiala', 772977835, '485/1/c', 'Panadhura', 'driver', 'jamalmusiala@gmail.com', '12345678', '491913092v', 'inactive', ''),
(12, 'Sadio Mane', 779871236, 'No 13,Main road', 'Nawalapitiya', 'worker', 'sadio@gmail.com', '12345678', '991817777v', 'active', ''),
(13, 'Karim Benzema', 752580835, '123/1/c', 'Matale', 'worker', 'karim@gmail.com', '12345678', '310913094v', 'active', ''),
(14, 'Luiz Diaz', 772977465, 'Main street', 'Colombo', 'driver', 'luiz@gmail.com', '12345678', '991963092v', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `quotation` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `pro_tool` int(11) NOT NULL,
  `pro_vehicle` int(11) NOT NULL,
  `pro_emp` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asssignment`
--

CREATE TABLE `asssignment` (
  `a_id` int(11) NOT NULL,
  `quatation` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `vehicle` int(11) NOT NULL,
  `equipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `c_name`, `c_type`) VALUES
(1, 'belt', 'small'),
(2, 'belt', 'big'),
(3, 'box', 'mini'),
(4, 'wrench', 'small'),
(5, 'card board', 'small'),
(7, 'Driller', 'meduim'),
(8, 'Driller', 'Big');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `name`, `address`, `city`, `phone`, `email`, `password`, `nic`, `code`) VALUES
(3, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednasik6844@gmail.com', '12345678', '', ''),
(4, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednasik6efea8@gmail.com', 'dad1asd', '', ''),
(5, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednafdfsik68@gmail.com', 'jnhbvc', '', ''),
(6, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednfffffffffasik68@gmail.com', 'oooooooooooooooo', '', ''),
(7, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednaadasdsik68@gmail.com', '12345', '991913092v', ''),
(8, 'jhon Doe', 'No 458 main road', 'Maradana', 772977835, 'jhondoe@gmail.com', '12345678', '', ''),
(9, 'Inas Ahamed', '485/1/c', 'Gelioya', 772977835, 'inasahamed@gmail.com', '12345678', '', ''),
(10, 'Mohammed Nilshad', '485/1/c', 'Gelioya', 772977835, 'mohamednilshad8@gmail.com', '12345678', '', '783070'),
(11, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednasik1168@gmail.com', '12345678', '', ''),
(12, 'Mohammed Nasik', '485/1/c', 'Gelioya', 772977835, 'mohammednasik68@gmail.com', '123456', '', '490088');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `c_id` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` mediumtext NOT NULL,
  `status` text NOT NULL,
  `img_name` blob NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`c_id`, `request`, `date`, `description`, `status`, `img_name`, `path`) VALUES
(34, 17, '2023-05-17', 'I am writing to express my deep dissatisfaction with the service I received during my recent move conducted by your company. Unfortunately, several of my personal belongings arrived at my new residence in a severely damaged condition, which has caused me significant distress and inconvenience.', 'waiting', 0x313638343333343535335f302e706e67, 'uploads/1684334553_0.png');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `e_id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`e_id`, `cat`, `quantity`) VALUES
(2, 2, 13),
(3, 1, 15),
(4, 3, 30),
(5, 4, 50),
(7, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `h_id` int(11) NOT NULL,
  `date_apply` date NOT NULL,
  `date_req` date NOT NULL,
  `session` int(11) NOT NULL,
  `type` text NOT NULL,
  `reason` text NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` text NOT NULL,
  `emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`h_id`, `date_apply`, `date_req`, `session`, `type`, `reason`, `description`, `status`, `emp`) VALUES
(373, '2023-06-24', '2023-06-30', 3, 'full_day', 'annual_leave', 'xx', 'cancelld', 8),
(374, '2023-06-28', '2023-07-12', 3, 'full_day', 'casual', 'Festival Day', 'approved', 8),
(375, '2023-07-05', '2023-07-05', 3, 'full_day', 'Emergency', 'sfsffqefef', 'approved', 7),
(376, '2023-07-07', '2023-07-07', 3, 'full_day', 'casual', '', 'approved', 5),
(377, '2023-07-07', '2023-07-08', 3, 'full_day', 'annual_leave', 'fyugiugiugiu', 'waiting', 11);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `request` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `status`, `request`) VALUES
(12, 'Finished', 19),
(13, 'started', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pro_emp`
--

CREATE TABLE `pro_emp` (
  `pr_eid` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `status` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `role` text NOT NULL,
  `q_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_emp`
--

INSERT INTO `pro_emp` (`pr_eid`, `request`, `employee`, `status`, `vehicle`, `role`, `q_id`) VALUES
(138, 19, 7, 'Finished', 2, 'worker', 36),
(139, 19, 8, 'Finished', 2, 'worker', 36),
(140, 19, 11, 'Finished', 2, 'driver', 36),
(141, 20, 13, 'started', 2, 'worker', 37),
(142, 20, 2, 'started', 2, 'driver', 37);

-- --------------------------------------------------------

--
-- Table structure for table `pro_session`
--

CREATE TABLE `pro_session` (
  `id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pro_tools`
--

CREATE TABLE `pro_tools` (
  `pr_tid` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `equipment` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `quotation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_tools`
--

INSERT INTO `pro_tools` (`pr_tid`, `request`, `equipment`, `qty`, `status`, `vehicle`, `quotation`) VALUES
(43, 19, 2, 3, 'Finished', 2, 36),
(44, 19, 3, 5, 'Finished', 2, 36),
(45, 20, 2, 7, 'started', 2, 37);

-- --------------------------------------------------------

--
-- Table structure for table `pro_vehicle`
--

CREATE TABLE `pro_vehicle` (
  `pr_vid` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `vehicles` int(11) NOT NULL,
  `status` text NOT NULL,
  `quotation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_vehicle`
--

INSERT INTO `pro_vehicle` (`pr_vid`, `request`, `vehicles`, `status`, `quotation`) VALUES
(47, 19, 2, 'Finished', 36),
(48, 20, 2, 'started', 37);

-- --------------------------------------------------------

--
-- Table structure for table `quattion`
--

CREATE TABLE `quattion` (
  `q_id` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `date` date NOT NULL,
  `session` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `s_status` text NOT NULL,
  `c_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quattion`
--

INSERT INTO `quattion` (`q_id`, `request`, `date`, `session`, `path`, `s_status`, `c_status`) VALUES
(36, 19, '2023-07-07', 1, 'uploadfiles/bankDetailsReceipt (1).pdf', 'completed', 'Finished'),
(37, 20, '2023-07-11', 3, 'uploadfiles/bankDetailsReceipt (1).pdf', 'completed', 'started');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `l_address` varchar(50) NOT NULL,
  `l_city` text NOT NULL,
  `u_address` varchar(50) NOT NULL,
  `u_city` text NOT NULL,
  `date` date NOT NULL,
  `r_date` date NOT NULL,
  `type` text NOT NULL,
  `steps` int(3) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`r_id`, `client`, `l_address`, `l_city`, `u_address`, `u_city`, `date`, `r_date`, `type`, `steps`, `status`) VALUES
(17, 12, '485/1/c', 'Gelioya', '485/1/c', 'Gelioya', '2023-05-19', '2023-05-17', 'house', 11, 'approved'),
(18, 12, '485/1/c', 'Gelioya', '485/1/c', 'Gelioya', '2023-06-15', '2023-06-08', 'house', 25, 'approved'),
(19, 12, '485/1/c', 'Gelioya', '485/1/c', 'Gelioya', '2023-07-12', '2023-07-05', 'office', 0, 'approved'),
(20, 12, '485/1/c', 'Gelioya', '485/1/c', 'Gelioya', '2023-07-12', '2023-07-05', 'bank', 23, 'approved'),
(21, 12, '485/1/c', 'Gelioya', '485/1/c', 'Gelioya', '2023-07-07', '2023-07-07', 'house', 0, 'waiting'),
(22, 12, '485/1/c', 'Gelioya', 'no 12', 'Gampola', '2023-07-07', '2023-07-07', 'house', 8, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `s_id` int(11) NOT NULL,
  `ses_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`s_id`, `ses_name`) VALUES
(1, 'morning'),
(2, 'evening'),
(3, 'full');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(11) NOT NULL,
  `v_number` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `width` float NOT NULL,
  `capacity` float NOT NULL,
  `feul` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `f_type` text NOT NULL,
  `wheels` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_number`, `type`, `height`, `width`, `capacity`, `feul`, `model`, `status`, `f_type`, `wheels`) VALUES
(2, 'ND 3348', 'Refregirator Truck', 9, 12, 20, 200, 'tata', 'Active', '', 0),
(3, 'ND 3344', 'Refregirator Truck', 20, 20, 20, 200, 'asoak leyland', 'Active', '', 0),
(5, 'AB 2654', 'Full Body', 9, 20, 20, 2000, 'tata', 'Active', '', 0),
(6, 'LC 3344', 'Full Body', 7, 20, 50, 500, 'tata', 'Active', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `pro_emp` (`pro_emp`),
  ADD KEY `pro_tool` (`pro_tool`),
  ADD KEY `pro_vehicle` (`pro_vehicle`),
  ADD KEY `quotation` (`quotation`),
  ADD KEY `request` (`request`),
  ADD KEY `project` (`project`);

--
-- Indexes for table `asssignment`
--
ALTER TABLE `asssignment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `admin` (`admin`),
  ADD KEY `equipment` (`equipment`),
  ADD KEY `project` (`project`),
  ADD KEY `quatation` (`quatation`),
  ADD KEY `vehicle` (`vehicle`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `request` (`request`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `cat_2` (`cat`),
  ADD KEY `cat` (`cat`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `emp` (`emp`),
  ADD KEY `session` (`session`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `request` (`request`);

--
-- Indexes for table `pro_emp`
--
ALTER TABLE `pro_emp`
  ADD PRIMARY KEY (`pr_eid`),
  ADD KEY `request` (`request`),
  ADD KEY `employee` (`employee`),
  ADD KEY `vehicle` (`vehicle`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `pro_session`
--
ALTER TABLE `pro_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session` (`session`),
  ADD KEY `pro_session_ibfk_1` (`request`);

--
-- Indexes for table `pro_tools`
--
ALTER TABLE `pro_tools`
  ADD PRIMARY KEY (`pr_tid`),
  ADD KEY `request` (`request`),
  ADD KEY `equipment` (`equipment`),
  ADD KEY `vehicle` (`vehicle`),
  ADD KEY `pro_tools_ibfk_4` (`quotation`);

--
-- Indexes for table `pro_vehicle`
--
ALTER TABLE `pro_vehicle`
  ADD PRIMARY KEY (`pr_vid`),
  ADD KEY `request` (`request`),
  ADD KEY `vehicles` (`vehicles`),
  ADD KEY `pro_vehicle_ibfk_3` (`quotation`);

--
-- Indexes for table `quattion`
--
ALTER TABLE `quattion`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `request` (`request`),
  ADD KEY `session` (`session`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `client_id` (`client`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `v_number` (`v_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asssignment`
--
ALTER TABLE `asssignment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pro_emp`
--
ALTER TABLE `pro_emp`
  MODIFY `pr_eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `pro_session`
--
ALTER TABLE `pro_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_tools`
--
ALTER TABLE `pro_tools`
  MODIFY `pr_tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pro_vehicle`
--
ALTER TABLE `pro_vehicle`
  MODIFY `pr_vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `quattion`
--
ALTER TABLE `quattion`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`pro_emp`) REFERENCES `pro_emp` (`pr_eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`pro_tool`) REFERENCES `pro_tools` (`pr_tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_3` FOREIGN KEY (`pro_vehicle`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_4` FOREIGN KEY (`quotation`) REFERENCES `quattion` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_5` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_6` FOREIGN KEY (`project`) REFERENCES `project` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asssignment`
--
ALTER TABLE `asssignment`
  ADD CONSTRAINT `asssignment_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asssignment_ibfk_2` FOREIGN KEY (`equipment`) REFERENCES `equipment` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asssignment_ibfk_3` FOREIGN KEY (`project`) REFERENCES `project` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asssignment_ibfk_4` FOREIGN KEY (`quatation`) REFERENCES `quattion` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asssignment_ibfk_5` FOREIGN KEY (`vehicle`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complain`
--
ALTER TABLE `complain`
  ADD CONSTRAINT `complain_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_ibfk_1` FOREIGN KEY (`cat`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `holiday`
--
ALTER TABLE `holiday`
  ADD CONSTRAINT `holiday_ibfk_1` FOREIGN KEY (`emp`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `holiday_ibfk_2` FOREIGN KEY (`session`) REFERENCES `session` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_emp`
--
ALTER TABLE `pro_emp`
  ADD CONSTRAINT `pro_emp_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_emp_ibfk_2` FOREIGN KEY (`employee`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_emp_ibfk_3` FOREIGN KEY (`vehicle`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_emp_ibfk_4` FOREIGN KEY (`q_id`) REFERENCES `quattion` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_session`
--
ALTER TABLE `pro_session`
  ADD CONSTRAINT `pro_session_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_session_ibfk_2` FOREIGN KEY (`session`) REFERENCES `session` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_tools`
--
ALTER TABLE `pro_tools`
  ADD CONSTRAINT `pro_tools_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_tools_ibfk_2` FOREIGN KEY (`equipment`) REFERENCES `equipment` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_tools_ibfk_3` FOREIGN KEY (`vehicle`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_tools_ibfk_4` FOREIGN KEY (`quotation`) REFERENCES `quattion` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_vehicle`
--
ALTER TABLE `pro_vehicle`
  ADD CONSTRAINT `pro_vehicle_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_vehicle_ibfk_2` FOREIGN KEY (`vehicles`) REFERENCES `vehicle` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_vehicle_ibfk_3` FOREIGN KEY (`quotation`) REFERENCES `quattion` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quattion`
--
ALTER TABLE `quattion`
  ADD CONSTRAINT `quattion_ibfk_1` FOREIGN KEY (`request`) REFERENCES `request` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quattion_ibfk_2` FOREIGN KEY (`session`) REFERENCES `session` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
