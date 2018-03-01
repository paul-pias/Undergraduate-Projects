-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 07:25 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `POSTAL_CODE` int(11) UNSIGNED NOT NULL,
  `NUMBER_OF_VACANT_APARTMENT` int(15) DEFAULT NULL,
  `AVG_RENT_ROOM` int(15) DEFAULT NULL,
  `AVG_RENT_FLAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `ID` int(11) UNSIGNED NOT NULL,
  `RID_FID` int(11) NOT NULL,
  `Type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_flats`
--

CREATE TABLE `favourite_flats` (
  `UID` int(11) UNSIGNED NOT NULL,
  `FID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_rooms`
--

CREATE TABLE `favourite_rooms` (
  `UID` int(11) UNSIGNED NOT NULL,
  `RID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `FLAT_ID` int(11) UNSIGNED NOT NULL,
  `GAS` tinyint(1) DEFAULT NULL,
  `LIFT` tinyint(1) DEFAULT NULL,
  `NUMBER_OF_WASHROOM` int(11) DEFAULT NULL,
  `NUMBER_OF_BALCONY` int(11) DEFAULT NULL,
  `NUMBER_OF_BEDROOM` int(11) DEFAULT NULL,
  `GENERATOR` tinyint(1) DEFAULT NULL,
  `DRAWING_ROOM` tinyint(1) DEFAULT NULL,
  `DINING_ROOM` tinyint(1) DEFAULT NULL,
  `SERVANT_ROOM` tinyint(1) DEFAULT NULL,
  `SQ_FEET` int(11) DEFAULT NULL,
  `AVAILIBILITY` tinyint(1) DEFAULT NULL,
  `PICTURE` text,
  `FURNISHED` tinyint(1) DEFAULT NULL,
  `RENT_ID` int(11) UNSIGNED NOT NULL,
  `ADDRESS` text NOT NULL,
  `TERMS` text,
  `POSTAL_CODE` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `RENT_ID` int(11) UNSIGNED NOT NULL,
  `BASE_RENT` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `SERVICE_CHARGE` int(11) UNSIGNED DEFAULT NULL,
  `WIFI_CHARGE` int(11) UNSIGNED DEFAULT NULL,
  `ADVANCE` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ROOM_ID` int(11) UNSIGNED NOT NULL,
  `SERVANT` tinyint(1) DEFAULT NULL,
  `TV` tinyint(1) DEFAULT NULL,
  `NUMBER_OF_MEMBERS` int(2) DEFAULT NULL,
  `BALCONY` tinyint(1) DEFAULT NULL,
  `ATTACHED_WASHROOM` tinyint(1) DEFAULT NULL,
  `WIFI` tinyint(1) DEFAULT NULL,
  `SHARABLE` int(1) DEFAULT '0',
  `MEAL_SYSTEM` tinyint(1) DEFAULT NULL,
  `FILTER` tinyint(1) DEFAULT NULL,
  `FRIDGE` tinyint(1) DEFAULT NULL,
  `TERMS` text,
  `RENT_ID` int(11) UNSIGNED NOT NULL,
  `ADDRESS` text NOT NULL,
  `AVAILIBILITY` tinyint(1) DEFAULT NULL,
  `POSTAL_CODE` int(5) NOT NULL,
  `PICTURE` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) UNSIGNED NOT NULL,
  `FIRST_NAME` varchar(30) NOT NULL DEFAULT '',
  `MIDDLE_NAME` varchar(30) DEFAULT NULL,
  `LAST_NAME` varchar(30) NOT NULL DEFAULT '',
  `CONTACT_TIME` varchar(30) DEFAULT NULL,
  `PHONE_NO` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_flat`
--

CREATE TABLE `user_flat` (
  `UID` int(11) UNSIGNED NOT NULL,
  `FID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_room`
--

CREATE TABLE `user_room` (
  `UID` int(11) UNSIGNED NOT NULL,
  `RID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`POSTAL_CODE`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `favourite_flats`
--
ALTER TABLE `favourite_flats`
  ADD PRIMARY KEY (`UID`,`FID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `favourite_rooms`
--
ALTER TABLE `favourite_rooms`
  ADD PRIMARY KEY (`UID`,`RID`),
  ADD KEY `RID` (`RID`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`FLAT_ID`),
  ADD KEY `RENT_ID` (`RENT_ID`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`RENT_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ROOM_ID`),
  ADD KEY `RENT_ID` (`RENT_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `user_flat`
--
ALTER TABLE `user_flat`
  ADD KEY `UID` (`UID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `user_room`
--
ALTER TABLE `user_room`
  ADD KEY `UID` (`UID`),
  ADD KEY `RID` (`RID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `POSTAL_CODE` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `flat`
--
ALTER TABLE `flat`
  MODIFY `FLAT_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `RENT_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ROOM_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourite_flats`
--
ALTER TABLE `favourite_flats`
  ADD CONSTRAINT `FAVOURITE_FLATS_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FAVOURITE_FLATS_ibfk_2` FOREIGN KEY (`FID`) REFERENCES `flat` (`FLAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourite_rooms`
--
ALTER TABLE `favourite_rooms`
  ADD CONSTRAINT `FAVOURITE_ROOMS_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FAVOURITE_ROOMS_ibfk_2` FOREIGN KEY (`RID`) REFERENCES `room` (`ROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `FLAT_ibfk_1` FOREIGN KEY (`RENT_ID`) REFERENCES `rent` (`RENT_ID`),
  ADD CONSTRAINT `FLAT_ibfk_2` FOREIGN KEY (`RENT_ID`) REFERENCES `rent` (`RENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FLAT_ibfk_3` FOREIGN KEY (`RENT_ID`) REFERENCES `rent` (`RENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `ROOM_ibfk_1` FOREIGN KEY (`RENT_ID`) REFERENCES `rent` (`RENT_ID`),
  ADD CONSTRAINT `ROOM_ibfk_2` FOREIGN KEY (`RENT_ID`) REFERENCES `rent` (`RENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_flat`
--
ALTER TABLE `user_flat`
  ADD CONSTRAINT `USER_FLAT_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USER_FLAT_ibfk_2` FOREIGN KEY (`FID`) REFERENCES `flat` (`FLAT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_room`
--
ALTER TABLE `user_room`
  ADD CONSTRAINT `USER_ROOM_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USER_ROOM_ibfk_2` FOREIGN KEY (`RID`) REFERENCES `room` (`ROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
