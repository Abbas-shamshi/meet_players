-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 05:19 PM
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
  `team` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `college` varchar(250) NOT NULL,
  `age` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `sport` varchar(100) NOT NULL,
  `howoften` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `profile_status` varchar(250) NOT NULL,
  `profile_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiledetails`
--

INSERT INTO `profiledetails` (`id`, `profile_id`, `profile_name`, `team`, `position`, `college`, `age`, `height`, `weight`, `gender`, `sport`, `howoften`, `location`, `experience`, `status`, `profile_status`, `profile_date`) VALUES
(4, '3', '', '', '', '', '5', '4', '4', '4', '4', '4', '5', '', '', '1', '4'),
(5, '3', '', '', '', '', '5', '4', '4', '4', '4', '4', '5', '', '', '1', '4'),
(6, '3', '', '', '', '', '5', '4', '4', '4', '4', '4', '5', '', '', '1', '4'),
(7, '3', '', '', '', '', 'sdsf', '4', '4', '4', '4', '4', '5', '', '', '1', '4'),
(8, '3', '', '', '', '', 'ghjk', 'ghjk', 'gfhjkl', 'male', 'Football', 'ghjk', 'ghjk', '', '', '1', '1575826778'),
(9, 'Q3HV', '', '', '', '', 'ghjk', 'ghjk', 'gfhjkl', 'male', 'Football', 'ghjk', 'ghjk', '', '', '1', '1575827129'),
(10, 'FTLH', 'There', '', '', '', '266', '41', '12', 'male', 'Football', '3', 'nyc', '', '', '1', '1575943668'),
(11, 'DHOL', 'abbas', 'asfgb', 'asdfb', 'asdf', 'shamshi', '6', '70', 'male', 'Football', '3 times', 'jersey', 'sdfvb', 'Active', '1', '1575945923'),
(12, '1IRY', '', '', '', '', 'sadfg', 'sdfb', 'sadf', 'male', 'Football', 'sd', 'dsf', '', '', '1', '1575945965'),
(13, 'P81E', 'sdf', '', '', '', 'sdf', 'sdf', 'asdf', 'male', 'Football', 'sdf', 'adsf', '', '', '1', '1575946409'),
(14, 'FRZG', 'criceket', '', '', '', '26', '46', '87', 'male', 'Football', 'boston', '3 times', '', '', '1', '1576467171'),
(15, '5KO7', 'khokho', '', '', '', '21', '13', '14', 'male', 'Football', 'jersey', '4', '', '', '1', '1576472154'),
(16, 'LOV1', 'kho', '', '', '', '12', '12', '12', 'male', 'Football', '12', '12', '', 'Active', '1', '1576472240'),
(17, 'JC47', 'test', 'werghmn', 'weghmn', 'werghn', 'werghmn', 'werdghn', 'werghn', 'male', 'Football', 'wqefetg', 'wqefghn', 'wefgth', 'Active', '1', '1576528555'),
(18, 'KTPZ', 'dfhj', ',cfgnjm', 'dfghjk', 'xcvbnm', 'xcvbnm', 'xcvbnm,', 'cvbnm', 'male', 'Football', 'bnm', 'bn', 'xcvbn', 'Active', '1', '1576538167'),
(19, 'KY50', 'Online', 'sense', 'front', 'pace', '26', '4\"', '46', 'male', 'Football', '1 ti,e', 'nyc', 'sadsd', 'Active', '0', '1576542016'),
(20, '3QMA', 'Judo', 'dfghjmk,', 'edfghnjm', 'fghjmdfgbn', 'mfghm', 'fghn', 'fghn', 'male', 'Football', 'fghn', 'tghj', 'fvbn', 'Active', '1', '1576628145'),
(21, 'O7XW', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628538'),
(22, '1STI', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628550'),
(23, 'UYQ1', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628554'),
(24, '6SJY', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628570'),
(25, 'NOG6', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628581'),
(26, 'X589', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628587'),
(27, '7B5G', '', '', '', '', '', '', '', 'male', 'Football', '', '', '', 'Active', '1', '1576628653'),
(28, '7XEJ', 'tesrt', 'sadfvb', 'dsfb', 'wddfb', 'wadfvbdsf', 'wadg', 'wdesb', 'male', 'Football', 'adsfvb', 'edsgv', 'wedsf', 'Active', '1', '1576630114'),
(29, 'E6TX', 'football', 'fghj', 'Goal Keeper', 'Pace', 'cvbn', 'cvbn', 'cvb', 'male', 'Football', 'sdcfv', 'dcfvb', 'dfv', 'Active', '1', '1576631434');

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
(3, 'P81E', 'ZUWFFNP2'),
(4, 'FRZG', 'ZUWFFNP2'),
(5, '5KO7', 'ZUWFFNP2'),
(6, 'LOV1', 'ZUWFFNP2'),
(7, 'JC47', 'ZUWFFNP2'),
(8, 'KTPZ', 'ZUWFFNP2'),
(9, 'KY50', '76TGXGCT'),
(10, '3QMA', 'ZUWFFNP2'),
(11, 'O7XW', 'ZUWFFNP2'),
(12, '1STI', 'ZUWFFNP2'),
(13, 'UYQ1', 'ZUWFFNP2'),
(14, '6SJY', 'ZUWFFNP2'),
(15, 'NOG6', 'ZUWFFNP2'),
(16, 'X589', 'ZUWFFNP2'),
(17, '7B5G', 'ZUWFFNP2'),
(18, '7XEJ', 'ZUWFFNP2'),
(19, 'E6TX', 'PWHEZ5R5');

-- --------------------------------------------------------

--
-- Table structure for table `profile_achivements`
--

CREATE TABLE `profile_achivements` (
  `profile_id` varchar(255) NOT NULL,
  `achivement_1` varchar(255) NOT NULL,
  `achivement_2` varchar(255) NOT NULL,
  `achivement_3` varchar(255) NOT NULL,
  `achivement_4` varchar(255) NOT NULL,
  `achivement_5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_achivements`
--

INSERT INTO `profile_achivements` (`profile_id`, `achivement_1`, `achivement_2`, `achivement_3`, `achivement_4`, `achivement_5`) VALUES
('DHOL', 'This is achivement 1', 'This is achivement 2', 'This is achivement 3', 'This is achivement 4', 'This is achivement 5'),
('FRZG', 'Achiv 1', 'Achiv 2', 'Achiv 3', 'Achiv 4\r\n', 'Achiv 5'),
('7B5G', 'asdfghjk', 'asdfghjk', 'asdfhjk', 'asdfghjkl', 'asdfghjl'),
('7XEJ', 'wadsv', 'wdesdgv', 'wadsd', 'wdasf', 'dfgvb'),
('E6TX', 'wsdf', 'wsdfcvwsdfv', 'sdfv', 'sdfcvb', 'this is');

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
  `user_password` varchar(255) NOT NULL,
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
('ZUWFFNP2', 'abbasshamshi', 'abbas', 'shamshi', 'abbas@gmail.com', 'shamshi', '1575943500', '1', '0'),
('76TGXGCT', 'kautilya', 'kautilya', 'save', 'kautilya@gmail.com', '456', '1576541935', '1', '0'),
('X9RIIV2J', 'asdfgbn', 'awghm', 'aedfbn', 'abbas@gmail.com', '02ff5a4a7e7f8c495da475c5e5d311f53d04ce202760e1b142', '1576630717', '1', '0'),
('PWHEZ5R5', 'abhishek', 'abhishek', 'julania', 'julania@gmail.com', '90f98fc82045c9d3bfadfd78b70189b2ece6a9ee41359c2de46dbf8c15f1df2f3', '1576631272', '1', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
