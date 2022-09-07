-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 02:21 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hkid_appointment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `app_id` int(3) NOT NULL,
  `hkid` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `enquiry_code` varchar(255) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`app_id`, `hkid`, `dob`, `app_date`, `app_time`, `enquiry_code`, `created_time`) VALUES
(40, 'cjBLY2JwSjAzdzhqcUI3TjFiYzRaUT09OjphLWpWSverq3wu+kRn/hkR', '1999-12-26', '2022-09-10', '10:00:00', '1111', '2022-09-06 15:41:33'),
(41, 'dlJQcy8yNkN2dnZkODRWZGpiNG1rdz09OjqUKYdGWstMn/HcM6Bnl7lN', '2000-01-05', '2022-09-10', '10:00:00', '2323', '2022-09-06 15:44:26'),
(42, 'VlFYV1A3MXZoM0FCN1ZqTkE3MGYxZz09OjqGoGZqtN3o94ybCBK1ZU+9', '1999-12-03', '2022-09-10', '13:00:00', '4242', '2022-09-06 15:45:27'),
(43, 'cGgveFYzTjFiamR3TVFjT2hMRWxRQT09OjrH6xjAzb2w+kbsaDzTSj32', '1997-07-17', '2022-09-10', '15:00:00', '6161', '2022-09-06 15:46:45'),
(44, 'cEttaTRQaHlrcURiNWUxaUV3WVQwUT09OjpmrIoVaXvy48JtKuz60+zk', '2000-01-19', '2022-09-10', '11:00:00', '8181', '2022-09-06 15:47:24'),
(45, 'UUpSOUdvNlNjOUtPc3d4anJjRlkzUT09OjpXh2ZSQLi/0gFj1gdbX4Or', '1997-07-25', '2022-09-10', '10:00:00', '1010', '2022-09-06 15:47:58'),
(46, 'TWtNcXk4SjAwd0t2ancvbG1zQVFUZz09Ojog5AQPadXWgEd8JuQi3Twl', '2002-10-10', '2022-09-10', '14:30:00', '4321', '2022-09-06 15:48:30'),
(47, 'UnlOWkVjc1NBclpJa0tXckJkWnl6dz09OjpYSv7LpEGkRp/KIbrZd21e', '2000-02-04', '2022-09-10', '10:00:00', '4242', '2022-09-06 15:48:52'),
(48, 'Q0hHNzVNbU9FanM5TFBadndRSjhhQT09Ojq9PWwCGnebfxGREYA6lf3a', '1999-12-28', '2022-09-10', '11:00:00', '1212', '2022-09-07 11:40:43'),
(59, 'OE1pWGJlbjUyNmU3VVpxVUhyVTA3UT09OjqRANXatQj+bIMGAcsYIbIs', '1999-12-26', '2022-09-10', '10:00:00', '5252', '2022-09-07 12:02:36'),
(60, 'Ylp6VXZqZ0J4RTZCYk9pMnVWdGROQT09OjrfTfKlwPda37rjtg4YY86f', '2000-01-17', '2022-09-10', '15:00:00', '5121', '2022-09-07 12:03:12'),
(61, 'UWFhQzlhWkUxbG4vVERveWlhQmxWdz09Ojp+yc+Y13PKmtz0h6ZZD5Ne', '1999-11-30', '2022-09-10', '16:00:00', '7121', '2022-09-07 12:03:57'),
(62, 'aFJseTJ3OGNmbUtxVDc1TXpVL2xFZz09OjpB5U8ktbmUfAgF/8SyoUKD', '2000-01-01', '2022-09-10', '16:30:00', '2124', '2022-09-07 12:05:13'),
(63, 'MHdGRnFTZjdYQytXd1NQQ2FhK0lRQT09OjqZTorSVl2l0YLeiZS863qv', '1995-07-27', '2022-09-10', '13:30:00', '2195', '2022-09-07 12:06:39'),
(64, 'L3YyOFRXRmlxeEhhQ1ZaRkxKd1M5QT09OjpN7LQz8tDOPHq2qzagwb4S', '2003-07-17', '2022-09-10', '12:00:00', '2121', '2022-09-07 12:07:47'),
(65, 'MHQ0bDI0ZGk3VTFjdmk3Q0d4TlFxdz09Ojo8EqOC1y3oCiRN64fOWFTQ', '2000-01-25', '2022-09-11', '10:00:00', '2142', '2022-09-07 12:14:09'),
(66, 'SDIvT2I4RnZraFVqbC9mUnM5VlFTZz09OjqvWbvoWKCkIxRGRO28+ZAK', '2000-01-01', '2022-09-11', '10:00:00', '7878', '2022-09-07 12:16:02'),
(67, 'VmU0ZDZGSWZ5S0dvYUVrZzQ2ekQ4UT09OjqPWa82YhHF+WSaXhV+/ZBb', '2000-01-27', '2022-09-11', '10:00:00', '9895', '2022-09-07 12:17:43'),
(68, 'S3hsL2Y3ckh0YUF6UFBlUFpMKzJSQT09OjoqaAgXjwkyUVIxk1nQzvoO', '2000-01-17', '2022-09-11', '15:00:00', '4343', '2022-09-07 12:18:14'),
(69, 'V0cvTWVvMnB4VXJMeHJxSmRxdDVwUT09OjqU4tV8lo+BpKA2yoqIMe/+', '2000-01-25', '2022-09-11', '14:30:00', '1290', '2022-09-07 12:19:03'),
(70, 'aW0wY1FHRXRHRU4wVzR5a3Y5Nkpudz09OjoHSWgrckzlHlkXTA49yG0O', '1994-12-01', '2022-09-11', '13:30:00', '6767', '2022-09-07 12:20:02'),
(71, 'K29LbEdYT0huZXVmVGJtcVRDTXB5Zz09OjqD0t2Qh/jvjw2WcIyCTFw/', '2000-01-18', '2022-09-11', '16:30:00', '9021', '2022-09-07 12:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_quotas`
--

CREATE TABLE `appointment_quotas` (
  `app_quotas_id` int(3) NOT NULL,
  `app_quotas_date` date NOT NULL,
  `app_quotas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_quotas`
--

INSERT INTO `appointment_quotas` (`app_quotas_id`, `app_quotas_date`, `app_quotas`) VALUES
(6, '2022-09-08', 16),
(7, '2022-09-09', 16),
(8, '2022-09-10', 0),
(9, '2022-09-11', 9);

-- --------------------------------------------------------

--
-- Table structure for table `staff_account`
--

CREATE TABLE `staff_account` (
  `staff_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_account`
--

INSERT INTO `staff_account` (`staff_id`, `username`, `salt`, `hash_password`) VALUES
(4, 'gary221', 'DCtPCNDFCP6v1kR5', '97c48731d9c1605f965d523b8bf3ba2c95c21a7c764604a69bb5cdb3d9c98237c516776c196279df773b2d97964ffd8ea60dc70a7646ef69df6c8ef25e928711'),
(10, 'peter221', 'eyyl4aFoM06skmyv', 'f4bdd8f0910aef8bdfaabb006b3ca7c0b2f25ec439ffdca6dd763feb234c255da9628797847cb78176e07090389babcfae0cc646291a8459d4a21fa6688c6cd4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `appointment_quotas`
--
ALTER TABLE `appointment_quotas`
  ADD PRIMARY KEY (`app_quotas_id`);

--
-- Indexes for table `staff_account`
--
ALTER TABLE `staff_account`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `app_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `appointment_quotas`
--
ALTER TABLE `appointment_quotas`
  MODIFY `app_quotas_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staff_account`
--
ALTER TABLE `staff_account`
  MODIFY `staff_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
