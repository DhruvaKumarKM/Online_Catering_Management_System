-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 16, 2021 at 09:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--
CREATE DATABASE IF NOT EXISTS `reservation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reservation`;

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `annouce_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `annouce_place` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `annouce_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(6, 'Main Course'),
(7, 'Pasta'),
(9, 'Dessert'),
(10, 'Rice');

-- --------------------------------------------------------

--
-- Table structure for table `combo`
--

CREATE TABLE `combo` (
  `combo_id` int(11) NOT NULL,
  `combo_name` varchar(100) NOT NULL,
  `combo_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo`
--

INSERT INTO `combo` (`combo_id`, `combo_name`, `combo_price`) VALUES
(1, 'Package 1', '150.00'),
(2, 'Package 2', '250.00'),
(3, 'Package 3', '50.00'),
(4, 'Roshan Roy', '150.00');

-- --------------------------------------------------------

--
-- Table structure for table `combo_details`
--

CREATE TABLE `combo_details` (
  `combo_details_id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combo_details`
--

INSERT INTO `combo_details` (`combo_details_id`, `combo_id`, `menu_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3),
(5, 3, 2),
(6, 3, 4),
(7, 4, 3),
(8, 4, 4),
(9, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_what` varchar(500) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_where` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_what`, `event_date`, `event_time`, `event_where`) VALUES
(1, 'Company Christmas Party', '2017-12-15', '10:39:00', 'Gym');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `member_last` varchar(15) NOT NULL,
  `member_first` varchar(15) NOT NULL,
  `member_status` varchar(10) NOT NULL,
  `member_contact` varchar(30) NOT NULL,
  `member_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_last`, `member_first`, `member_status`, `member_contact`, `member_address`) VALUES
(1, 'DSouz', 'Roshan', 'active', '1234567890', 'Mysore');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `cat_id` int(30) NOT NULL,
  `subcat_name` varchar(30) NOT NULL,
  `menu_desc` varchar(100) NOT NULL,
  `menu_price` decimal(10,2) NOT NULL,
  `menu_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `cat_id`, `subcat_name`, `menu_desc`, `menu_price`, `menu_pic`) VALUES
(1, 'Beef Simo', 6, 'Lunch and Dinner', 'Beef Salpicao', '100.00', 'indian-food-platter.jpg'),
(2, 'Bakareta', 2, 'pork', 'Pork Adobo', '100.00', 'indian-food-platter.jpg'),
(3, 'Chicken Curry', 6, 'Lunch and Dinner', 'Chicken Curry', '50.00', '501247.jpg'),
(4, 'Buko Pandan', 9, 'Mirienda', 'Buko Pandan', '45.00', 'restaurant.jpg'),
(5, 'roshans spl', 9, '', 'sffasa', '150.00', 'try.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `fullname`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Roshan Roy DSouza', 'roshanroydsouza8@gmail.com', 'sfd', 'dsf', '2021-07-14 16:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `amount`, `rid`, `payment_date`) VALUES
(1, 2000, 42, '2017-04-28'),
(2, 5000, 45, '2021-07-14'),
(3, 5000, 42, '2021-07-14'),
(4, -5400, 42, '2021-07-14'),
(5, 1000, 47, '2021-07-14'),
(6, 500, 47, '2021-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `rid` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `r_last` varchar(30) NOT NULL,
  `r_first` varchar(30) NOT NULL,
  `r_contact` varchar(30) NOT NULL,
  `r_email` varchar(50) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_type` varchar(30) NOT NULL,
  `r_ocassion` varchar(50) NOT NULL,
  `r_motif` varchar(30) NOT NULL,
  `team_id` int(11) NOT NULL,
  `r_venue` varchar(100) NOT NULL,
  `payable` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `r_status` varchar(10) NOT NULL,
  `date_reserved` date NOT NULL,
  `r_code` varchar(10) NOT NULL,
  `pax` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `modeofpayment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`rid`, `r_date`, `r_time`, `r_last`, `r_first`, `r_contact`, `r_email`, `r_address`, `r_type`, `r_ocassion`, `r_motif`, `team_id`, `r_venue`, `payable`, `balance`, `r_status`, `date_reserved`, `r_code`, `pax`, `combo_id`, `price`, `modeofpayment`) VALUES
(42, '2017-05-04', '14:00:00', 'Pipez', 'Lee ', '09001914000', 'e@gmail.com', 'Bago City', 'buffet', 'Baptism', 'White', 0, 'Bago City', '2500.00', '900.00', 'Finished', '2017-04-28', '5xkKxwWasn', 50, 3, '50.00', 'Bank to Bank'),
(45, '2017-06-07', '01:00:00', 'klj', 'kkj', 'kjk', 'emoblazz@gmail.com', 'kjk', 'buffet', 'Baptism', 'jjj', 1, 'lkjkj', '1500.00', '-3500.00', 'Approved', '2017-04-28', 'Bg0GueD1Vg', 10, 1, '150.00', 'Bank to Bank'),
(46, '2017-08-07', '01:00:00', 'klj', 'kkj', 'kjk', 'emoblazz@gmail.com', 'kjk', 'buffet', 'Baptism', 'jjj', 0, 'lkjkj', '1500.00', '1500.00', 'Approved', '2017-04-28', 'Bg0GuezJd8', 10, 1, '150.00', 'Bank to Bank'),
(47, '2021-07-15', '00:51:00', 'DSouza', 'Roshan reservation', '123456879', 'abc@gmail.com', 'Mysore', 'buffet', 'Birthday', 'ad', 1, 'sadsad', '1800.00', '300.00', 'Cancelled', '2021-07-14', 'V6FuqJMFkC', 12, 1, '150.00', 'Cash'),
(48, '2021-08-15', '19:00:00', 'Ditto', 'Dhruva', '8296473820', 'dhruva5000@gmail.com', 'no.1057,aralikatte circle,maddur pile', 'buffet', 'Birthday', '', 0, 'Mysuru', '1500.00', '1500.00', 'pending', '2021-08-15', 'IHsOdZrQIm', 10, 1, '150.00', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `r_combo`
--

CREATE TABLE `r_combo` (
  `r_combo_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `r_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_details`
--

CREATE TABLE `r_details` (
  `r_details_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `r_nop` int(10) NOT NULL,
  `r_total` decimal(10,2) NOT NULL,
  `r_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_noncombo`
--

CREATE TABLE `r_noncombo` (
  `r_non_id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `serve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `subcat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`) VALUES
(1, 'Non Combo Meal'),
(2, 'Mirienda'),
(3, 'Lunch and Dinner'),
(10, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`) VALUES
(1, 'New team'),
(2, 'Roshans Team'),
(3, 'master team');

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `team_member_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`team_member_id`, `team_id`, `member_id`) VALUES
(2, 1, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `username`, `password`, `code`, `status`, `email`) VALUES
(1, 'Roshan Dsouza', 'admin', '123456', 0, 'active', 'roshanroydsouza8@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `combo`
--
ALTER TABLE `combo`
  ADD PRIMARY KEY (`combo_id`);

--
-- Indexes for table `combo_details`
--
ALTER TABLE `combo_details`
  ADD PRIMARY KEY (`combo_details_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `r_combo`
--
ALTER TABLE `r_combo`
  ADD PRIMARY KEY (`r_combo_id`);

--
-- Indexes for table `r_details`
--
ALTER TABLE `r_details`
  ADD PRIMARY KEY (`r_details_id`);

--
-- Indexes for table `r_noncombo`
--
ALTER TABLE `r_noncombo`
  ADD PRIMARY KEY (`r_non_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_member_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `combo`
--
ALTER TABLE `combo`
  MODIFY `combo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `combo_details`
--
ALTER TABLE `combo_details`
  MODIFY `combo_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `r_combo`
--
ALTER TABLE `r_combo`
  MODIFY `r_combo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_details`
--
ALTER TABLE `r_details`
  MODIFY `r_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `r_noncombo`
--
ALTER TABLE `r_noncombo`
  MODIFY `r_non_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `team_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
