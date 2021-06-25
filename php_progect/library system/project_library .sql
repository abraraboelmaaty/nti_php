-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 01:12 AM
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
(21, '12rrtyu', 'meetghorab', 'elsenblawe', 'elmanora');

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
(5, 'abraraboelmaaty24@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', 'abrar mohamed', '01019011597', 1);

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
(2, 'admin'),
(11, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `auther`
--

CREATE TABLE `auther` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `information` varchar(400) NOT NULL,
  `photo` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `code` char(100) NOT NULL,
  `discreption` varchar(500) NOT NULL,
  `cobiedNumber` smallint(6) NOT NULL,
  `title` char(50) NOT NULL,
  `status` char(20) NOT NULL,
  `adminId` int(11) NOT NULL,
  `puplisherId` int(11) NOT NULL,
  `autherId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `photo` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(21, 'mohamed', 'aboelmaaty', 'elsayed', 'mohamedAboelmaaty', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'mohamed@gmail.com', 'male', '01019011597', 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `puplisher`
--

CREATE TABLE `puplisher` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `discreption` varchar(300) NOT NULL,
  `dateOfPublication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `adminId` (`adminId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `auther`
--
ALTER TABLE `auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `borrowbooks`
--
ALTER TABLE `borrowbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `puplisher`
--
ALTER TABLE `puplisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `adminRelation` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autherRelation` FOREIGN KEY (`autherId`) REFERENCES `auther` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `catigoryRelation` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `puplisherRelation` FOREIGN KEY (`puplisherId`) REFERENCES `puplisher` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `borrowbooks`
--
ALTER TABLE `borrowbooks`
  ADD CONSTRAINT `bookRelation` FOREIGN KEY (`bookId`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `borrowerRelation` FOREIGN KEY (`borrowerId`) REFERENCES `borrower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `borrower`
--
ALTER TABLE `borrower`
  ADD CONSTRAINT `addressRelation` FOREIGN KEY (`address`) REFERENCES `adderss` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;