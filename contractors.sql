-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 11:03 AM
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
-- Database: `contractors`
--

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `fname` varchar(11) NOT NULL,
  `p_id` varchar(11) NOT NULL,
  `project_title` varchar(110) NOT NULL,
  `project_location` varchar(11) NOT NULL,
  `app_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adverts`
--

INSERT INTO `adverts` (`fname`, `p_id`, `project_title`, `project_location`, `app_date`) VALUES
('Dennis', '334190404', 'need 14 men', 'Kericho', '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `client_reg`
--

CREATE TABLE `client_reg` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `identity_no` varchar(8) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `password` varchar(10) NOT NULL,
  `sc_id` varchar(200) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_reg`
--

INSERT INTO `client_reg` (`fname`, `lname`, `identity_no`, `phonenumber`, `email`, `gender`, `password`, `sc_id`, `reg_date`) VALUES
('cheramba', 'marugu', '1234567', '332', 'a@gmail.com', 'male', '123', '757018.jpg', '2019-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `fname`, `lname`, `comment`) VALUES
(1, 'Kerich', 'Obadia', 'best one'),
(2, 'Dennis', 'Kibet', 'worst of a'),
(3, 'Dennis', 'Kibet', 'good one');

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

CREATE TABLE `contractors` (
  `name` varchar(40) NOT NULL,
  `licenseno` varchar(40) NOT NULL,
  `password` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cont_works`
--

CREATE TABLE `cont_works` (
  `id` int(11) NOT NULL,
  `project_title` varchar(50) NOT NULL,
  `project_location` varchar(50) NOT NULL,
  `cat` varchar(12) NOT NULL,
  `image` varchar(200) NOT NULL,
  `starttime` varchar(50) NOT NULL,
  `endtime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cont_works`
--

INSERT INTO `cont_works` (`id`, `project_title`, `project_location`, `cat`, `image`, `starttime`, `endtime`) VALUES
(1, 'Laikipia University College Gate Construction', 'Laikipia University College', 'Architect', '384862.jpg', '12/3/2013', '20/08/2020'),
(2, 'concrete supplies', 'Nakuru', 'Plumbering', '891527.jpg', '12/3/2013', '02/02/2020');

-- --------------------------------------------------------

--
-- Table structure for table `firms`
--

CREATE TABLE `firms` (
  `firm_id` int(11) NOT NULL,
  `firm_no` varchar(10) NOT NULL,
  `firm_name` varchar(50) NOT NULL,
  `dealers_in` varchar(200) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_address` varchar(50) NOT NULL,
  `firm_image` varchar(500) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firms`
--

INSERT INTO `firms` (`firm_id`, `firm_no`, `firm_name`, `dealers_in`, `address`, `contact_address`, `firm_image`, `reg_date`) VALUES
(1, 'n16/3/0771', 'Software Inc. Kenya', 'Software applications and networking specialists', 'Ambeere Plaza 3rd Floor,Uganda Road Kitale town', 'P.O Box 23, 30201.', '', '0000-00-00'),
(2, 'N16/3/0772', 'Accfin (E.A) ltd', 'Software Engineering Company', 'Nairobi, Vision Plaza opposite Mombasa Road', 'accfin@ke.co', '482635.jpg', '2019-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `pro_comment`
--

CREATE TABLE `pro_comment` (
  `p_id` int(11) NOT NULL,
  `project_title` varchar(110) NOT NULL,
  `comment` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_comment`
--

INSERT INTO `pro_comment` (`p_id`, `project_title`, `comment`) VALUES
(5, 'Laikipia University College Gate Construction', 'qwert'),
(6, 'Laikipia University College Gate Construction', 'the design itself is fake'),
(7, 'concrete supplies', 'wertyu'),
(8, 'concrete supplies', 'qwerty'),
(9, 'Laikipia University College Gate Construction', 'wosrtd'),
(10, 'concrete supplies', 'kama ni uyu acha ikae');

-- --------------------------------------------------------

--
-- Table structure for table `t_contractors`
--

CREATE TABLE `t_contractors` (
  `id` int(11) NOT NULL,
  `cat` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `identity_no` varchar(30) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `brief_info` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `profile` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_contractors`
--

INSERT INTO `t_contractors` (`id`, `cat`, `location`, `fname`, `lname`, `identity_no`, `phonenumber`, `brief_info`, `email`, `password`, `profile`, `reg_date`) VALUES
(15, 'nuo', '78n', 'uobo', 'boibo', '89789', 'nojni', 'hoi', 'bioboi', 'nipo', '', '2020-02-17 10:49:50'),
(16, 'vuy', 'ubiu', 'yvi', 'biu', '876', 'bjk', 'kjb', 'biu', 'kjb', '', '2020-02-17 10:50:18'),
(17, 'Electrician', 'Mukuyu', 'Joseph', 'Noblepal', '33700928', '0726266668', 'I am a good electrician', 'josephnoblepal@gmail.com', '12345', '', '2020-02-17 10:52:13'),
(18, 'road contractor', 'Total ', 'Essie', 'Kimani', '37252695', '0705851468', 'Certified Road Engineer', 'esthervill245@gmail.com', '0705851468', '', '2020-02-17 15:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `client_reg`
--
ALTER TABLE `client_reg`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contractors`
--
ALTER TABLE `contractors`
  ADD PRIMARY KEY (`licenseno`);

--
-- Indexes for table `cont_works`
--
ALTER TABLE `cont_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat` (`cat`);

--
-- Indexes for table `firms`
--
ALTER TABLE `firms`
  ADD PRIMARY KEY (`firm_id`),
  ADD UNIQUE KEY `firm_no` (`firm_no`);

--
-- Indexes for table `pro_comment`
--
ALTER TABLE `pro_comment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `t_contractors`
--
ALTER TABLE `t_contractors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cont_works`
--
ALTER TABLE `cont_works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `firms`
--
ALTER TABLE `firms`
  MODIFY `firm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pro_comment`
--
ALTER TABLE `pro_comment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_contractors`
--
ALTER TABLE `t_contractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
