-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql104.yzz.me
-- Generation Time: Feb 13, 2026 at 03:57 AM
-- Server version: 11.4.10-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yzzme_41086032_drrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bs_setting`
--

CREATE TABLE `bs_setting` (
  `setting_id` int(10) UNSIGNED NOT NULL,
  `directory` varchar(100) NOT NULL DEFAULT '',
  `admin_dir` varchar(70) NOT NULL,
  `system_title` varchar(100) NOT NULL DEFAULT '',
  `abrv` varchar(70) NOT NULL DEFAULT '',
  `year_developed` year(4) NOT NULL,
  `description` text NOT NULL,
  `developer` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bs_setting`
--

INSERT INTO `bs_setting` (`setting_id`, `directory`, `admin_dir`, `system_title`, `abrv`, `year_developed`, `description`, `developer`, `website`) VALUES
(1001, 'deped-drrm', 'deped-drrm', 'DRRM', 'DRRM', 2026, '', 'DepEd Silay', 'https://www.deped.com');

-- --------------------------------------------------------

--
-- Table structure for table `bs_user`
--

CREATE TABLE `bs_user` (
  `user_id` int(100) UNSIGNED NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `date_added` varchar(50) DEFAULT NULL,
  `added_by` int(11) NOT NULL DEFAULT 0,
  `date_modified` varchar(50) DEFAULT NULL,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `date_deleted` varchar(50) DEFAULT NULL,
  `deleted_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uid` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bs_user`
--

INSERT INTO `bs_user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `date_added`, `added_by`, `date_modified`, `modified_by`, `date_deleted`, `deleted_by`, `is_deleted`, `last_login`, `uid`) VALUES
(5, 'Benz', 'Lozada', 'admin@gmail.com', '$2y$10$Ak9bkFuEtCGZPIZkF5A4rObu7yF8qh.C0LxTHaksnF5tnkkOHjdQq', '2024-11-26 13:41:04', 1, NULL, 0, NULL, 0, 0, '2026-02-09 07:39:52', 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'Kevin', 'Cortez', 'kevin@gmail.com', '$2y$10$OrZmObNRQApwT4l6llgNZObwWTLSJOImTk4FxRKEDQaD7Gwgmtia.', '2024-11-26 13:43:41', 1, NULL, 0, NULL, 0, 0, '2024-11-26 07:39:16', '1679091c5a880faf6fb5e6087eb1b2dc');

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
(1, 'DRRM-15525456W', 'Disaster', 'Flood', '2026-02-05', '17:01:00', 'sdads', 'Medium', 'sdsfds', 2, 4, '', 'dasd', 'No Evacuation', 'No Suspension', NULL, 'DOJMES', 'sdasdasd', 'ewe', '121323', 'dsdss@gmail.com', 'dasdasda', '2026-02-05 09:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_incident`
--

CREATE TABLE `tbl_school_incident` (
  `sId` int(100) NOT NULL,
  `incident_type` varchar(100) DEFAULT NULL,
  `incident_date` varchar(20) DEFAULT NULL,
  `incident_time` varchar(20) DEFAULT NULL,
  `incident_location` varchar(100) DEFAULT NULL,
  `incident_level` varchar(20) DEFAULT NULL,
  `affected_student` int(20) DEFAULT NULL,
  `affected_staff` int(20) DEFAULT NULL,
  `suspension` tinyint(2) NOT NULL DEFAULT 0,
  `suspension_date` varchar(20) DEFAULT NULL,
  `suspension_basis` varchar(20) DEFAULT NULL,
  `reporting_person` varchar(100) DEFAULT NULL,
  `contact_number` int(20) DEFAULT NULL,
  `email_add` varchar(50) DEFAULT NULL,
  `school_add` varchar(100) DEFAULT NULL,
  `sThumbnail` varchar(50) DEFAULT NULL,
  `sDescription` text DEFAULT NULL,
  `acted` tinyint(2) NOT NULL DEFAULT 0,
  `acted_by` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_school_incident`
--

INSERT INTO `tbl_school_incident` (`sId`, `incident_type`, `incident_date`, `incident_time`, `incident_location`, `incident_level`, `affected_student`, `affected_staff`, `suspension`, `suspension_date`, `suspension_basis`, `reporting_person`, `contact_number`, `email_add`, `school_add`, `sThumbnail`, `sDescription`, `acted`, `acted_by`) VALUES
(1, 'Structural Damage', '2026-02-05', '16:56', 'School', 'Medium', 2, 1, 1, '2026-02-05', 'School Decision', 'Sample', 987654, 'sample@gmail.com', 'Camantero Elementary School, Camantero 1 Brgy. Guimbala-on', 'incident_69845be8173130.93125395.jpg', 'Sample', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bs_setting`
--
ALTER TABLE `bs_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `bs_user`
--
ALTER TABLE `bs_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_disaster`
--
ALTER TABLE `tbl_disaster`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- Indexes for table `tbl_school_incident`
--
ALTER TABLE `tbl_school_incident`
  ADD PRIMARY KEY (`sId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bs_setting`
--
ALTER TABLE `bs_setting`
  MODIFY `setting_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `bs_user`
--
ALTER TABLE `bs_user`
  MODIFY `user_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_disaster`
--
ALTER TABLE `tbl_disaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_school_incident`
--
ALTER TABLE `tbl_school_incident`
  MODIFY `sId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
