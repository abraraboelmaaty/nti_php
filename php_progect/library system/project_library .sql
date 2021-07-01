-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 01:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `adderss`
--

CREATE TABLE `adderss` (
  `id` int(11) NOT NULL,
  `street` char(10) NOT NULL,
  `neighborhood` char(10) NOT NULL,
  `city` char(10) NOT NULL,
  `governorate` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adderss`
--

INSERT INTO `adderss` (`id`, `street`, `neighborhood`, `city`, `governorate`) VALUES
(18, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora'),
(19, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora'),
(20, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora'),
(21, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora'),
(22, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora'),
(23, '12rrtyu', 'tttttt', 'rrrrrr', 'elmanora'),
(24, '12rrtyu', 'tttttt', 'elsenblawe', 'elmanora');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` char(60) NOT NULL,
  `password` char(50) NOT NULL,
  `userName` char(20) NOT NULL,
  `phone` char(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `userName`, `phone`, `role_id`) VALUES
(1, 'abrar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abrarAboelaaaty', '01019011597', 1),
(3, 'abrar@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'abrar mohamed', '01019011597', 2),
(4, 'abrar@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'abrar mohamed', '01019011597', 1),
(5, 'abraraboelmaaty24@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'abrar mohamed', '01019011597', 1),
(6, 'abrar@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'abrar mohamed', '01019011597', 1),
(7, 'mohamed@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'mohamed', '01019011597', 2),
(8, 'alia@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'ali', '01019011597', 2),
(9, 'samy@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'samy', '01019011597', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `title`) VALUES
(1, 'super admin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE `auther` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `information` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auther`
--

INSERT INTO `auther` (`id`, `name`, `information`) VALUES
(2, 'Andrew Mead', 'ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt'),
(3, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(4, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(5, 'uhygb njhg', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(6, 'oooooooooooo', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(7, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee'),
(8, 'uhygb njhg', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeet'),
(9, 'eeeeeeeeeee', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(10, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(11, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(12, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(13, 'Andrew Mead', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest'),
(14, 'DR abdelrhman', ''),
(15, 'uhygb njhg', ''),
(16, 'Andrew', ''),
(17, 'Andrew', '');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `code` char(50) NOT NULL,
  `descreption` varchar(500) NOT NULL,
  `cobiedNumber` smallint(6) NOT NULL,
  `status` enum('avilable','notAvilable','','') NOT NULL DEFAULT 'avilable',
  `admin_id` int(11) NOT NULL,
  `puplisherId` int(11) NOT NULL,
  `autherId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `photo` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `code`, `descreption`, `cobiedNumber`, `status`, `admin_id`, `puplisherId`, `autherId`, `categoryId`, `photo`) VALUES
(5, 'java script', '123456', 'Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp', 5, 'avilable', 1, 5, 4, 10, '12374676701624734213.jpg'),
(9, 'modern java script Bootcamp', '1234', 'modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp modern java script Bootcamp', 4, 'avilable', 8, 13, 12, 10, '6902587501624762913.jpg'),
(10, 'brobabilty', '1234', 'teeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeest', 2, 'avilable', 8, 14, 13, 11, '19575188031624769529.jpg'),
(14, 'Signe Ware', '1234', 'Signe Ware Signe Ware  Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware Signe Ware', 2, 'avilable', 9, 18, 17, 2, '8165395241625067035.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrowbooks`
--

CREATE TABLE `borrowbooks` (
  `id` int(11) NOT NULL,
  `borrowDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `borrowerId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrowbooks`
--

INSERT INTO `borrowbooks` (`id`, `borrowDate`, `returnDate`, `borrowerId`, `bookId`) VALUES
(48, '2021-06-15', '2021-07-02', 23, 14),
(49, '2021-06-04', '2021-07-07', 23, 5),
(50, '2021-06-10', '2021-07-08', 23, 5),
(51, '2021-06-17', '2021-07-08', 23, 14),
(52, '2021-06-11', '2021-07-09', 23, 10),
(53, '2021-06-10', '2021-07-07', 24, 9),
(54, '2021-07-07', '2021-07-01', 23, 9),
(55, '2021-07-01', '2021-07-23', 23, 9),
(56, '2021-07-14', '2021-08-04', 23, 9),
(57, '2021-07-15', '2021-09-08', 23, 9);

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `id` int(11) NOT NULL,
  `firstName` char(10) NOT NULL,
  `middleName` char(10) NOT NULL,
  `lastName` char(10) NOT NULL,
  `userName` char(20) NOT NULL,
  `password` char(50) NOT NULL,
  `email` char(60) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNum` char(15) NOT NULL,
  `address` int(11) NOT NULL,
  `photo` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`id`, `firstName`, `middleName`, `lastName`, `userName`, `password`, `email`, `gender`, `phoneNum`, `address`, `photo`) VALUES
(18, 'abrar', 'mohammed', 'aboelmaaty', 'abrarAboelmaaty', '7c222fb2927d828af22f592134e8932480637c0d', 'abrar@gmail.com', 'female', '01019011597', 18, ''),
(19, 'tasneem', 'mohammed', 'aboelmaaty', 'tasneemAboelmaaty', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'tasneem@gmail.com', 'female', '01019011597', 19, ''),
(20, 'abrar', 'mohammed', 'aboelmaaty', 'abrarAboelmaaty', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'abrar@gmail.com', 'female', '01019011597', 20, ''),
(21, 'mohamed', 'aboelmaaty', 'elsayed', 'mohamedAboelmaaty', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'mohamed@gmail.com', 'male', '01019011597', 21, ''),
(22, 'ahmed', 'mohammed', 'aboelmaaty', 'ahmedAboelmaaty', '7c222fb2927d828af22f592134e8932480637c0d', 'ahmed@gmail.com', 'male', '01019011597', 22, ''),
(23, 'ali', 'mohammed', 'elsayed', 'mohamedAboelmaaty', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'alia@gmail.com', 'female', '01019011597', 23, ''),
(24, 'asmaa', 'mohammed', 'ksaab', 'asmaa', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'asmaa@gmail.com', 'female', '01019011597', 24, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'scientific'),
(2, 'cultural'),
(3, 'social'),
(4, 'literary'),
(5, 'religious'),
(6, 'Politician'),
(10, 'programming'),
(11, 'mathimatical');

-- --------------------------------------------------------

--
-- Table structure for table `puplisher`
--

CREATE TABLE `puplisher` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `info` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `puplisher`
--

INSERT INTO `puplisher` (`id`, `name`, `info`) VALUES
(3, 'tygfderg ujjmml', ''),
(4, 'tygfderg ujjmml', ''),
(5, 'tygfderg ujjmml', ''),
(6, 'eeeeeeeeeeee', ''),
(7, 'tygfderg ujjmml', ''),
(8, 'tygfderg ujjmml', ''),
(9, 'tgyhj gthh', ''),
(10, 'tgyhj gthh', ''),
(11, 'ffffffffffffff', ''),
(12, 'tygfderg ujjmml', ''),
(13, 'tygfderg ujjmml', ''),
(14, 'tgyhj gthh', ''),
(15, 'dfghj', ''),
(16, 'oooooo', ''),
(17, 'oooooo', ''),
(18, 'tygfderg ujjmml', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adderss`
--
ALTER TABLE `adderss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auther`
--
ALTER TABLE `auther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puplisherId` (`puplisherId`),
  ADD KEY `autherId` (`autherId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `adminId` (`admin_id`);

--
-- Indexes for table `borrowbooks`
--
ALTER TABLE `borrowbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrowerId` (`borrowerId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puplisher`
--
ALTER TABLE `puplisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adderss`
--
ALTER TABLE `adderss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `borrowbooks`
--
ALTER TABLE `borrowbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `puplisher`
--
ALTER TABLE `puplisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `adminRoleRelation` FOREIGN KEY (`role_id`) REFERENCES `admin_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `adminRelation` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autherRelation` FOREIGN KEY (`autherId`) REFERENCES `auther` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catigoryRelation` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puplisherRelation` FOREIGN KEY (`puplisherId`) REFERENCES `puplisher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowbooks`
--
ALTER TABLE `borrowbooks`
  ADD CONSTRAINT `bookRelation` FOREIGN KEY (`bookId`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `borrowerRelation` FOREIGN KEY (`borrowerId`) REFERENCES `borrower` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `addressRelation` FOREIGN KEY (`address`) REFERENCES `adderss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
