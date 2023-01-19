-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 02:56 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `country` varchar(50) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `country`, `picture`) VALUES
(1, 'Mihaela Tikvicki', 'mihaelatikvicki@yahoo.com', 'b59c67bf196a4758191e42f76670ceba', 5553232, 'Palmoticeva', 'female', 'Srbija', '../image/users/user.png'),
(2, 'Filip Lozo', 'filip.lozo@yahoo.com', 'b59c67bf196a4758191e42f76670ceba', 6340503, 'Kumanovska', 'male', 'Srbija', '../image/users/user.png'),
(14, 'Marko', 'marko@gmail.com', 'c28aa76990994587b0e907683792297c', 62555555, 'Marka Markovica 5', 'male', 'Srbija', '../image/users/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `details_slider`
--

CREATE TABLE `details_slider` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `type`, `price`, `details`, `image`) VALUES
(1, 101, 'Apartman', 40, 'Situated in Subotica in the Vojvodina region, Stone Lux Apartman features a balcony. The air-conditioned accommodation is 9 km from Palic, and guests benefit from complimentary WiFi and private parking available on site.', 'image1.jpeg'),
(2, 102, ' Suite', 80, 'Enjoy yourself in the luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'image3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` varchar(6) NOT NULL,
  `check_out_date` date NOT NULL,
  `Occupancy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `name`, `email`, `phone`, `address`, `country`, `room_type`, `check_in_date`, `check_in_time`, `check_out_date`, `Occupancy`) VALUES
(35, 'Marko', 'marko@gmail.com', 555232, 'Marka Oreskovica 15', 'Srbija', 'apartman', '2021-08-26', '16:28', '2021-08-28', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id_room` int(11) NOT NULL,
  `room_size` int(255) NOT NULL,
  `number_of_rooms` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `caption`) VALUES
(3, 'img3.jpeg', ''),
(6, 'img2.jpeg', ''),
(8, 'img1.jpeg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_slider`
--
ALTER TABLE `details_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `details_slider`
--
ALTER TABLE `details_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id_room` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room_type`
--
ALTER TABLE `room_type`
  ADD CONSTRAINT `fk_type_room` FOREIGN KEY (`id_room`) REFERENCES `rooms` (`room_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
