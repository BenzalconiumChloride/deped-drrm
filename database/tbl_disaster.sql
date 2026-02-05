-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2026 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_drrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disaster`
--

CREATE TABLE `tbl_disaster` (
  `id` int(11) NOT NULL,
  `reference_id` varchar(50) NOT NULL,
  `incident_category` varchar(50) NOT NULL,
  `disaster_type` varchar(100) NOT NULL,
  `incident_date` date NOT NULL,
  `incident_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `severity` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `students_affected` int(11) DEFAULT 0,
  `staff_affected` int(11) DEFAULT 0,
  `casualty_details` text DEFAULT NULL,
  `property_damage` text DEFAULT NULL,
  `evacuation_status` varchar(50) DEFAULT NULL,
  `suspension_status` varchar(50) DEFAULT NULL,
  `uploaded_photos` text DEFAULT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_address` varchar(255) DEFAULT NULL,
  `reporter_name` varchar(255) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_disaster`
--

INSERT INTO `tbl_disaster` (`id`, `reference_id`, `incident_category`, `disaster_type`, `incident_date`, `incident_time`, `location`, `severity`, `description`, `students_affected`, `staff_affected`, `casualty_details`, `property_damage`, `evacuation_status`, `suspension_status`, `uploaded_photos`, `school_name`, `school_address`, `reporter_name`, `contact_number`, `email_address`, `additional_info`, `date_submitted`) VALUES
(1, 'DRRM-15525456W', 'Disaster', 'Flood', '2026-02-05', '17:01:00', 'sdads', 'Medium', 'sdsfds', 2, 4, '', 'dasd', 'No Evacuation', 'No Suspension', '[\"DRRM-15525456W_0_1770282155.jpg\"]', 'DOJMES', 'sdasdasd', 'ewe', '121323', 'dsdss@gmail.com', 'dasdasda', '2026-02-05 09:02:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_disaster`
--
ALTER TABLE `tbl_disaster`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_disaster`
--
ALTER TABLE `tbl_disaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
