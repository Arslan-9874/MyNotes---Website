-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 02:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mynotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `s_no` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`s_no`, `title`, `description`, `user_id`, `timestamp`) VALUES
(1, 'Note 1', 'New Note 1', 6, '2024-06-13 10:26:42'),
(7, 'Note 2', 'New Note 2\r\n', 6, '2024-06-13 10:46:55'),
(8, 'Note 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, in labore! Tempora ut a quas ipsam magnam eos, consectetur aperiam perspiciatis qui animi error non illum saepe sit quaerat et deserunt harum recusandae eveniet. Suscipit magni veniam ipsa id corrupti autem libero voluptates eveniet maiores ratione cupiditate, dolorum, fugiat amet cumque architecto mollitia quibusdam corporis laboriosam expedita a consequatur voluptatibus aperiam. Laborum, quibusdam cum! Explicabo magni est molestias consequatur sed pariatur ex in natus error, dolorem molestiae? Possimus, voluptatum? Eum odio natus debitis exercitationem tenetur sit similique accusamus maiores! Libero dignissimos maxime iste, recusandae vitae voluptatem repudiandae doloremque totam incidunt velit!', 6, '2024-06-13 10:47:06'),
(16, 'New Note', 'This is the description of the new Note.', 7, '2024-06-14 11:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `s_no` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`s_no`, `f_name`, `l_name`, `username`, `email`, `password`, `timestamp`) VALUES
(5, 'Arslan', 'khan', 'admin', 'admin@gmail.com', '$2y$10$oI9ptSQ0OOOa9K1T6uTaSuBgupqq/nT7accepjV/rDG7wrv81Wzpu', '2024-06-12 17:35:19'),
(6, 'Arslan', 'khan', 'user001', 'user001@gmail.com', '$2y$10$FRJ9a4iHsHQyMNugvbvsgeY.K60DP/Ip5x7.DS80CfhXjQHJjDSSa', '2024-06-12 17:56:06'),
(7, 'User', '2', 'user002', 'user002@gmail.com', '$2y$10$WV0KHKtbuRRybf5t3V2u4O/eEGk2gBJsuii5UEl9.QTITlLXN0cjm', '2024-06-14 17:21:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
