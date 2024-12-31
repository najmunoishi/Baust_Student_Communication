-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 01:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baust_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `po_id` int(150) NOT NULL,
  `u_id` varchar(150) NOT NULL,
  `u_img` varchar(150) NOT NULL,
  `u_uname` varchar(150) NOT NULL,
  `u_info` varchar(150) NOT NULL,
  `posts_data` varchar(5000) NOT NULL,
  `attachment` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`po_id`, `u_id`, `u_img`, `u_uname`, `u_info`, `posts_data`, `attachment`) VALUES
(23, '257279234', 'img6099611fd03df.jpg', 'oishi', 'CSE,1st', 'hiii', 'post_img60996228280e5.jpg'),
(24, '322284379', 'img609ada7f0b66e.jpg', 'oishi', 'CE,8th', 'dddd', ''),
(25, '322284379', 'img609ada7f0b66e.jpg', 'oishi', 'CE,8th', '', 'post_img609adb1abda39.jpg'),
(26, '322284379', 'img609ada7f0b66e.jpg', 'oishi', 'CE,8th', 'tttt', 'post_img609adb4aca3d0.jpg'),
(27, '322284379', 'img609ada7f0b66e.jpg', 'oishi', 'CE,8th', '', 'post_img609aecb36f4be.jpg'),
(28, '888440587', 'img60b8f0948b9c7.jpg', 'najmun', 'ME,5th', 'ddd', 'post_img60b8f189ae52f.pdf'),
(29, '888440587', 'img60b8f0948b9c7.jpg', 'najmun', 'ME,5th', '', 'post_img60b8f1a1da336.pdf'),
(31, '523894634', 'img60fcff72af0bd.jpg', 'ohona', 'ME,1st', '', 'post_img6100038ae73e7.pdf'),
(32, '531713672', 'img610159e1d8ee2.JPG', 'Mita', 'BBA,1st', 'Hi, My name is mita  .', 'post_img61015a459e44b.pdf'),
(33, '523894634', 'img60fcff72af0bd.jpg', 'ohona', 'ME,1st', '', 'post_img610584139e885.docx');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(20) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `dep` varchar(150) NOT NULL,
  `batch` varchar(80) NOT NULL,
  `iname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `st_user` varchar(255) NOT NULL,
  `u_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `uname`, `dep`, `batch`, `iname`, `email`, `password1`, `phonenumber`, `st_user`, `u_image`) VALUES
(17, 'oishi', 'CSE', '1st', 'anamul', 'bbbb@gmail.com', '202cb962ac59075b964b07152d234b70', 1302117664, '257279234', 'img6099611fd03df.jpg'),
(18, 'oishi', 'CE', '8th', 'father', 'amrita@gmail.com', '577ef1154f3240ad5b9b413aa7346a1e', 1302117664, '322284379', 'img609ada7f0b66e.jpg'),
(19, 'oishi', 'IPE', '5th', 'anamul', 'bbbb@gmail.com', '202cb962ac59075b964b07152d234b70', 1302117664, '286166879', 'img60a50df08f42b.jpg'),
(20, 'najmun', 'ME', '5th', 'father', 'oishinajmun@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1302117664, '888440587', 'img60b8f0948b9c7.jpg'),
(21, 'anika', 'EEE', '1st', 'father', 'bbbb@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1302117664, '841899538', 'img60fcfc3b51628.jpg'),
(22, 'ohona', 'ME', '1st', 'father', 'ooo@gmail.com', '8d5e957f297893487bd98fa830fa6413', 1302117664, '523894634', 'img60fcff72af0bd.jpg'),
(23, 'oishi', 'EEE', '3rd', 'anamul', 'oishinajmun456@gmail.com', '3def184ad8f4755ff269862ea77393dd', 1302117664, '849746777', 'img60fecb6d6dd5c.jpg'),
(24, 'Mita', 'BBA', '1st', 'Abdul', 'mita@gmail.com', '202cb962ac59075b964b07152d234b70', 1772941318, '531713672', 'img610159e1d8ee2.JPG'),
(25, 'oishi', 'CSE', '1st', 'father', 'ooo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1302117664, '395455265', 'img610592a4dd978.png'),
(26, 'anika', 'ME', '1st', 'anamul', 'oishinajmun@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1772941318, '687380805', 'img610592ef2ce51.png'),
(27, 'amrita', 'CSE', '1st', 'father', 'amrita12@gmail.com', 'c44a471bd78cc6c2fea32b9fe028d30a', 1302117664, '747149692', 'img61081cabd8064.png'),
(28, 'Najmun oishi', 'CSE', '1st', 'anamul', 'najmun@gmail.com', '063d4f460490848ef7bc7d5967eef832', 1772941318, '479358459', 'img61081eb0b09f5.png'),
(29, 'Susmita', 'CSE', '1st', 'samad', 'ooo@gmail.com', '9f14579cd06fbbd2a877765f51431f70', 1302117664, '405885772', 'img611a78b21dd77.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `po_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
