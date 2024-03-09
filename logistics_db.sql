-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 05:38 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(16) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `email`, `phone`, `message`) VALUES
(2, 'logisticcargoexp', 'Carier', 'logisticcargoexp@gmail.com', 2147483647, 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id laudantium ut eos in architecto. Dolorum.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `email`) VALUES
(1, 'njid18753@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tnumber` varchar(10) NOT NULL,
  `sname` varchar(300) NOT NULL,
  `scontact` varchar(16) NOT NULL,
  `smail` varchar(100) NOT NULL,
  `sadresse` varchar(300) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dispatchl` varchar(300) NOT NULL,
  `rname` varchar(300) NOT NULL,
  `rcontact` varchar(16) NOT NULL,
  `rmail` varchar(100) NOT NULL,
  `radresse` varchar(300) NOT NULL,
  `current_loc` varchar(1000) NOT NULL,
  `description` varchar(300) NOT NULL,
  `dispatch` date NOT NULL,
  `delivery` date NOT NULL,
  `carier` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`tnumber`, `sname`, `scontact`, `smail`, `sadresse`, `status`, `dispatchl`, `rname`, `rcontact`, `rmail`, `radresse`, `current_loc`, `description`, `dispatch`, `delivery`, `carier`) VALUES
('F9936B2DDA', 'Micheal', '8545845421', 'arrmicheal1000@gmail.com', 'Canada', 'On hold', 'Umm Qasr Port, Iraq', '	Onyinyechi Mamah', '654884564', 'estheronyi3@gmail.com', 'canada', 'Umm Qasr Port, Iraq', 'Gift Box', '2024-02-25', '2024-02-27', 'USPS'),
('U6XJH4DOV3', 'Ha-joon Hajun', '13057036896', '	gemh_ltd@yahoo.com', '200 Garden City Plaza, Garden City, NY 11530, United States.', 'Picked Up', '38.112949, 1.976532', 'WANG HSINHO', '886910715437', '48805023@yahoo.com.TW', 'No. 150, Sec. 6, Minquan E. Rd., Neihu Dist., Taipei City 114, Taiwan (R.O.C.)', 'Narita International Airport, Japan  ', 'Consignment.', '2022-11-10', '2022-11-14', 'UPS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass'),
(2, 'dev', 'dev'),
(3, 'etr', 'sdgfe'),
(4, 'fre', 'ecd'),
(5, 'gtr', 'bjfh'),
(6, 'hiu', 'fbng'),
(7, 'ipo', 'gtf'),
(8, 'kfbjf', 'fhkdd'),
(9, 'nfh', 'bdjfh'),
(10, 'wil', 'wil'),
(11, 'ypy', 'tyr'),
(12, 'yut', 'vgt'),
(13, 'zer', 'edrf'),
(14, 'wil', 'wil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tnumber`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
