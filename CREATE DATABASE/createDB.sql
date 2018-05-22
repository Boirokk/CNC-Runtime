-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2018 at 12:41 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cncruntime`
--

-- --------------------------------------------------------



--
-- Table structure for table `chris_craft`
--

CREATE TABLE `chris_craft` (
  `ID` int(11) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chris_craft`
--

INSERT INTO `chris_craft` (`ID`, `part_number`, `description`) VALUES
(31, '016-0750', '36 RL FWD BOW DECK'),
(32, '016-0750-W', '36 RL FWD BOW DECK WHITE CAULK'),
(33, '016-0751', '36 RL FWD PORT STEP'),
(34, '016-0751-W', '36 RL FWD PORT STEP WHITE CAULK'),
(35, '016-0752', '36 RL FWD STBD STEP'),
(36, '016-0752-W', '36 RL FWD STBD STEP WHITE CAULK'),
(37, '016-0753', '36 RL PORT AND STBD WALKWAYS - CURVED'),
(38, '016-0753-W', '36 RL PORT AND STBD WALKWAYS - CURVED WHITE CAULK');

-- --------------------------------------------------------

--
-- Table structure for table `start`
--

CREATE TABLE `start` (
  `start_id` int(11) NOT NULL,
  `initials` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stop`
--

CREATE TABLE `stop` (
  `stop_id` int(11) NOT NULL,
  `stop_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chris_craft`
--
ALTER TABLE `chris_craft`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `start`
--
ALTER TABLE `start`
  ADD PRIMARY KEY (`start_id`);

--
-- Indexes for table `stop`
--
ALTER TABLE `stop`
  ADD PRIMARY KEY (`stop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chris_craft`
--
ALTER TABLE `chris_craft`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `start`
--
ALTER TABLE `start`
  MODIFY `start_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `stop`
--
ALTER TABLE `stop`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT;

-- Create a user and grant privileges to that user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO boirokk@localhost
IDENTIFIED BY '1OMMpXQz7x6bSlHqT2b1';
