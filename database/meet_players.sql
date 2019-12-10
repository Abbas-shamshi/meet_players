-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 11:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meet_players`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiledetails`
--

CREATE TABLE `profiledetails` (
  `id` int(11) NOT NULL,
  `profile_id` varchar(50) NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sport` varchar(100) NOT NULL,
  `howoften` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiledetails`
--

INSERT INTO `profiledetails` (`id`, `profile_id`, `profile_name`, `age`, `height`, `weight`, `gender`, `sport`, `howoften`, `location`, `date`) VALUES
(4, '3', '', '5', '4', '4', '4', '4', '4', '5', '4'),
(5, '3', '', '5', '4', '4', '4', '4', '4', '5', '4'),
(6, '3', '', '5', '4', '4', '4', '4', '4', '5', '4'),
(7, '3', '', 'sdsf', '4', '4', '4', '4', '4', '5', '4'),
(8, '3', '', 'ghjk', 'ghjk', 'gfhjkl', 'male', 'Football', 'ghjk', 'ghjk', '1575826778'),
(9, 'Q3HV', '', 'ghjk', 'ghjk', 'gfhjkl', 'male', 'Football', 'ghjk', 'ghjk', '1575827129'),
(10, 'FTLH', '', '24', '45', '465', 'male', 'Football', 'jc', '3', '1575943668'),
(11, 'DHOL', '', '23', '75', '74', 'male', 'Football', 's', 's', '1575945923'),
(12, '1IRY', '', 'sadfg', 'sdfb', 'sadf', 'male', 'Football', 'sd', 'dsf', '1575945965'),
(13, 'P81E', 'sdf', 'sdf', 'sdf', 'asdf', 'male', 'Football', 'sdf', 'adsf', '1575946409');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `profile_id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `profile_id`, `userid`) VALUES
(1, 'DHOL', 'ZUWFFNP2'),
(3, 'P81E', 'ZUWFFNP2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `member_since` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  `delete_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `firstname`, `lastname`, `email`, `user_password`, `member_since`, `active`, `delete_user`) VALUES
('5I5Q6D3S', 'abbas', 'shamshi', 'abbas', 'shamshi', 'abbas', '1575504269', '1', '0'),
('N93OSJF2', '', 'a', '', 'shamshi', '', '1575508287', '1', '0'),
('WTWVC6OX', '', 'a', '', 'shamshi', '', '1575508316', '1', '0'),
('95SW0DP0', 'a', '', '', '', '', '1575508322', '1', '0'),
('ARL3X8KU', '', '', '', '', '', '1575508361', '1', '0'),
('YJII0OJM', 'abbas', 'shamshi', 'abbas', 'shamshoi', 'abbas', '1575509088', '1', '0'),
('YT9KMJGK', 'abbas', 'shamshi', 'abbas', 'shamshoi', 'abbas', '1575509246', '1', '0'),
('S9WDOH6V', 'abbas', 'shamshi', 'abbas', 'shamshi', 'abbas', '1575509258', '1', '0'),
('M7HTHWT0', 'abbas', 'abbas', 'abbas', 'abbas@gmail.com', 'abbas', '1575509623', '1', '0'),
('YEY7DN6K', 'abbas', 'abbas', 'abbas', 'abbas@gmail.com', 'abbas', '1575509732', '1', '0'),
('HAJEK3WQ', 'jac', 'jac', 'jac', 'jac@gmail.com', 'as', '1575823882', '1', '0'),
('ZUWFFNP2', 'abbasshamshi', 'abbas', 'shamshi', 'abbas@gmail.com', 'shamshi', '1575943500', '1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiledetails`
--
ALTER TABLE `profiledetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiledetails`
--
ALTER TABLE `profiledetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
