-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220523.649d9b34ea
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2022 at 08:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `__accepttransfer`
--

CREATE TABLE `__accepttransfer` (
  `id` int(11) NOT NULL,
  `usernamesend` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `amount` int(225) NOT NULL,
  `date` date NOT NULL,
  `isAccepted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__accepttransfer`
--

INSERT INTO `__accepttransfer` (`id`, `usernamesend`, `username`, `amount`, `date`, `isAccepted`) VALUES
(2, '059482671', '524396180', 6000000, '2022-05-24', 2),
(3, '059482671', '524396180', 6000000, '2022-05-24', 2),
(4, '943018756', '059482671', 6000000, '2022-05-25', 1),
(5, '943018756', '059482671', 6000000, '2022-05-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `__accepwithdraw`
--

CREATE TABLE `__accepwithdraw` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `cardnumber` int(6) NOT NULL,
  `money` int(30) NOT NULL,
  `date` date NOT NULL,
  `isAccepted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__accepwithdraw`
--

INSERT INTO `__accepwithdraw` (`id`, `username`, `cardnumber`, `money`, `date`, `isAccepted`) VALUES
(12, '943018756', 222222, 6000000, '2022-05-26', 1),
(13, '943018756', 222222, 6000000, '2022-05-26', 1),
(14, '943018756', 222222, 6000000, '2022-05-26', 2),
(15, '943018756', 222222, 6000000, '2022-05-26', 0),
(16, '943018756', 222222, 6000000, '2022-05-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `__account`
--

CREATE TABLE `__account` (
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `frontImg` text DEFAULT NULL,
  `backImg` text DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `isActived` int(2) NOT NULL DEFAULT 0,
  `error` int(11) DEFAULT NULL,
  `role` int(2) DEFAULT 0,
  `abnormal` int(2) DEFAULT 0,
  `OTP` int(34) NOT NULL,
  `timeblock` timestamp NULL DEFAULT NULL,
  `datecreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__account`
--

INSERT INTO `__account` (`phone`, `email`, `dob`, `frontImg`, `backImg`, `username`, `password`, `status`, `isActived`, `error`, `role`, `abnormal`, `OTP`, `timeblock`, `datecreate`) VALUES
('0829908030', 'dphuytdt@gmail.com', '2022-05-10', '../Resource/upload/628cd26ceaf2f4.52743013.jpg', '../Resource/upload/628cd26ceaf3f8.59686693.jpg', '059482671', '123', 1, 1, 0, 1, 0, 0, NULL, '2022-05-21'),
('0332420477', 'admin@gmail.com', '2022-05-19', '../Resource/upload/628b59d3ea1124.42378319.jpg', '../Resource/upload/628b59d3ea1523.76749906.jpg', '524396180', '1234', 1, 1, 0, 1, 0, 0, NULL, '2022-05-23'),
('033242047711222', '51900087@student.tdtu.edu.vn', '2022-05-14', '../Resource/upload/628e7cb26452a6.53173975.png', '../Resource/upload/628e7cb2645312.10174584.png', '541920637', 'cjMkYp', 0, 0, 0, 0, 0, 0, NULL, '2022-05-25'),
('033242047711', 'hiep09780813034@gmail.com', '2022-05-12', '../Resource/upload/628e56d445abd0.88340918.jpg', '../Resource/upload/628e56d445b4c7.73728468.jpg', '943018756', '111111', 1, 2, 0, 0, 3, 0, NULL, '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `__buyphonecard`
--

CREATE TABLE `__buyphonecard` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `cardtype` varchar(30) NOT NULL,
  `cardvalue` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date` date NOT NULL,
  `fee` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__buyphonecard`
--

INSERT INTO `__buyphonecard` (`id`, `username`, `cardtype`, `cardvalue`, `serial`, `code`, `date`, `fee`) VALUES
(16, '059482671', 'viettel', 10000, 849281485, 1111176131, '2022-05-26', 0),
(17, '059482671', 'viettel', 10000, 894791526, 1111142111, '2022-05-26', 0),
(18, '059482671', 'viettel', 10000, 407527040, 1111169996, '2022-05-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `__card`
--

CREATE TABLE `__card` (
  `cardnumber` int(6) NOT NULL,
  `expiration` date NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__card`
--

INSERT INTO `__card` (`cardnumber`, `expiration`, `cvv`) VALUES
(111111, '2022-10-10', 411),
(222222, '2022-11-11', 443),
(333333, '2022-12-12', 577);

-- --------------------------------------------------------

--
-- Table structure for table `__historyrecharge`
--

CREATE TABLE `__historyrecharge` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `cardnumber` int(11) DEFAULT NULL,
  `dateRecharge` date DEFAULT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__historyrecharge`
--

INSERT INTO `__historyrecharge` (`id`, `username`, `cardnumber`, `dateRecharge`, `value`) VALUES
(20, '059482671', 222222, '2022-05-26', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `__money`
--

CREATE TABLE `__money` (
  `username` varchar(30) NOT NULL,
  `money` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__money`
--

INSERT INTO `__money` (`username`, `money`) VALUES
('059482671', 1000),
('524396180', 6000300),
('541920637', 111),
('943018756', 24250000);

-- --------------------------------------------------------

--
-- Table structure for table `__mycard`
--

CREATE TABLE `__mycard` (
  `id` int(11) NOT NULL,
  `cardnumber` int(6) NOT NULL,
  `expiration` date NOT NULL,
  `cvv` int(3) NOT NULL,
  `money` int(30) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `times` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__mycard`
--

INSERT INTO `__mycard` (`id`, `cardnumber`, `expiration`, `cvv`, `money`, `date`, `times`) VALUES
(4, 222222, '2022-11-11', 443, 54000000, '2022-05-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `__transactionhistory`
--

CREATE TABLE `__transactionhistory` (
  `id` int(11) NOT NULL,
  `transactiontype` varchar(30) NOT NULL,
  `amount` int(12) NOT NULL,
  `executiontime` date NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `__transactionhistory`
--

INSERT INTO `__transactionhistory` (`id`, `transactiontype`, `amount`, `executiontime`, `status`) VALUES
(3, 'buycard', 0, '2022-05-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `__accepttransfer`
--
ALTER TABLE `__accepttransfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__accepwithdraw`
--
ALTER TABLE `__accepwithdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__account`
--
ALTER TABLE `__account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `__buyphonecard`
--
ALTER TABLE `__buyphonecard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__card`
--
ALTER TABLE `__card`
  ADD PRIMARY KEY (`cardnumber`);

--
-- Indexes for table `__historyrecharge`
--
ALTER TABLE `__historyrecharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__money`
--
ALTER TABLE `__money`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `__mycard`
--
ALTER TABLE `__mycard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `__transactionhistory`
--
ALTER TABLE `__transactionhistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `__accepttransfer`
--
ALTER TABLE `__accepttransfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `__accepwithdraw`
--
ALTER TABLE `__accepwithdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `__buyphonecard`
--
ALTER TABLE `__buyphonecard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `__historyrecharge`
--
ALTER TABLE `__historyrecharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `__mycard`
--
ALTER TABLE `__mycard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `__transactionhistory`
--
ALTER TABLE `__transactionhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `__money`
--
ALTER TABLE `__money`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `__account` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



