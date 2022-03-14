-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 03:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(100) NOT NULL,
  `house_id` int(100) NOT NULL,
  `house_categories` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `no_stay` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checked`
--

CREATE TABLE `checked` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `house_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `date_in` datetime NOT NULL,
  `date_out` datetime NOT NULL,
  `booked_cid` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1=checked in , 2 = checked out',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checked`
--

INSERT INTO `checked` (`id`, `ref_no`, `house_id`, `name`, `contact_no`, `date_in`, `date_out`, `booked_cid`, `status`, `date_updated`) VALUES
(4, '0000\n', 1, 'John Smith', '+14526-5455-44', '2020-09-19 11:48:09', '2020-09-22 11:48:09', 0, 2, '2020-09-19 13:11:34'),
(5, '9564082520\n', 1, 'John Smith', '+14526-5455-44', '2020-09-19 11:48:33', '2020-09-22 11:48:33', 0, 2, '2020-09-19 13:12:19'),
(6, '2765813481\n', 1, 'asdasd asdas as', '8747808787', '2020-09-19 13:16:00', '2020-09-24 13:16:00', 0, 2, '2020-09-19 13:43:21'),
(7, '4392831400\n', 3, 'Sample', '5205525544', '2020-09-19 13:00:00', '2020-09-23 13:00:00', 0, 2, '2020-09-19 16:00:55'),
(10, '6479004224\n', 1, 'John Smith', '+14526-5455-44', '2020-09-23 10:31:00', '2020-09-29 10:31:00', 3, 1, '2020-09-19 16:39:59'),
(0, '4623905092\n', 0, '', '0909909090', '0000-00-00 00:00:00', '2021-09-22 05:07:00', 40, 0, '2021-09-12 20:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `id` int(100) NOT NULL,
  `house_id` int(100) NOT NULL,
  `house_categories` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `no_stay` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(100) NOT NULL,
  `house_id` int(100) NOT NULL,
  `house_categories` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `no_stay` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(100) NOT NULL,
  `house_id` int(100) NOT NULL,
  `house_categories` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `no_stay` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `house_id`, `house_categories`, `client_name`, `contact_number`, `checkin`, `checkout`, `no_stay`, `payment`, `status`, `user`, `type`) VALUES
(10, 40, 'Buko White House', 'junrel', '0909090909', '2021-09-20', '2021-09-23 ', '3', ' 4800', 'Not Confirm', 'jednalig@ssct.edu.ph', 'Reserve'),
(11, 46, 'Buko YellowHouse', 'junrel', '0909090909', '2021-09-20', '2021-09-23 ', '3', ' 6000', 'Not Confirm', 'jednalig@ssct.edu.ph', 'book');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `house_id` int(100) NOT NULL,
  `house_categories` varchar(100) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `no_stay` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `house_id`, `house_categories`, `client_name`, `contact_number`, `checkin`, `checkout`, `no_stay`, `payment`, `status`, `user`) VALUES
(18, 45, 'Buko White House', 'shem', '0909090909', '2021-09-20', '2021-09-23  ', '3', '  4500', 'Confirm', 'sculata@ssct.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `price`, `cover_img`) VALUES
(2, 'Deluxe Room', 500, '1600480260_4.jpg'),
(3, 'Single Room', 120, '1600480680_2.jpg'),
(4, 'Family Room', 350, '1600480680_room-1.jpg'),
(6, 'Twin Bed Room', 200, '1600482780_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subimages`
--

CREATE TABLE `subimages` (
  `id` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `subimages` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subimages`
--

INSERT INTO `subimages` (`id`, `cid`, `subimages`) VALUES
(16, 40, '40a.jpg'),
(17, 40, '40b.jpg'),
(18, 40, '40c.jpg'),
(19, 40, '40d.jpg'),
(20, 40, '40e.jpg'),
(21, 45, '45a.jpg'),
(22, 45, '45b.jpg'),
(23, 45, '45c.jpg'),
(24, 45, '45d.jpg'),
(25, 45, '45e.jpg'),
(26, 46, '46a.jpg'),
(27, 46, '46b.jpg'),
(28, 46, '46c.jpg'),
(29, 46, '46d.jpg'),
(30, 46, '46e.jpg'),
(31, 47, '47a.jpg'),
(32, 47, '47b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(100) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `about_content` varchar(100) NOT NULL,
  `cover_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `hotel_name`, `email`, `contact`, `about_content`, `cover_img`) VALUES
(1, 'Online House Rental System', '[value-3]', '[value-4]', '[value-5]', 'home1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_houses`
--

CREATE TABLE `tbl_houses` (
  `id` int(225) NOT NULL,
  `path` varchar(100) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `pricemonth` varchar(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status1` varchar(100) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `numstatus` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_houses`
--

INSERT INTO `tbl_houses` (`id`, `path`, `img_name`, `category`, `location`, `pricemonth`, `price`, `description`, `status1`, `status2`, `numstatus`) VALUES
(40, 'houses/a4.jpg', 'a4.jpg', 'Buko White House', 'General Luna, Siargao', '16000', '1600 ', '1 room, Included Electricity, With Aircon, Hot Water, Garden, Kitchen, WiFi, Bed Sheets', '[UnavailableForBooking]', '[availableForReservation]', 1),
(45, 'houses/a3.jpg', 'a3.jpg', 'Buko White House', 'Genaral Luna, Siargao', '15000', '1500 ', 'All included, 1 Room, Garden, Kitchen, Aircon, WiFi, Laundry', '[UnavailableForBooking]', '[UnavailableForResevation]', 1),
(46, 'houses/a2.jpg', 'a2.jpg', 'Buko YellowHouse', 'Genaral Luna, Siargao', '18000', '2000 ', 'Included Electricity, 2 Rooms, Kitchen, Aircon, WiFi, Laundry once a week, Big Independent Garden', '[availableForBooking]', '[availableForReservation]', 0),
(47, 'houses/a1.jpg', 'a1.jpg', 'Buko White House', 'Genaral Luna, Siargao', '15000', '1500 ', 'Included Electricity, 1 Room, Hot Shower, Aircon, Kitchen, WiFi', '[availableForBooking]', '[availableForReservation]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(7, 'admin', 'jednalig@ssct.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'user', 'sculata@ssct.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'user', 'iindico@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(10, 'admin', 'jednalig2@ssct.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subimages`
--
ALTER TABLE `subimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_houses`
--
ALTER TABLE `tbl_houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subimages`
--
ALTER TABLE `subimages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_houses`
--
ALTER TABLE `tbl_houses`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
