-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2025 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `birthday`, `organization`, `location`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'user1', '$2y$10$E1xampleHashForPassword1', 'John', 'Doe', 'user1@example.com', '555-0101', '1990-01-01', 'Company A', 'New York', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(2, 'user2', '$2y$10$E2xampleHashForPassword2', 'Jane', 'Smith', 'user2@example.com', '555-0102', '1991-02-02', 'Company B', 'Los Angeles', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(3, 'user3', '$2y$10$E3xampleHashForPassword3', 'Alice', 'Johnson', 'user3@example.com', '555-0103', '1992-03-03', 'Company C', 'Chicago', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(4, 'user4', '$2y$10$E4xampleHashForPassword4', 'Bob', 'Williams', 'user4@example.com', '555-0104', '1993-04-04', 'Company D', 'Houston', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(5, 'user5', '$2y$10$E5xampleHashForPassword5', 'Carol', 'Brown', 'user5@example.com', '555-0105', '1994-05-05', 'Company E', 'Phoenix', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(6, 'user6', '$2y$10$E6xampleHashForPassword6', 'David', 'Jones', 'user6@example.com', '555-0106', '1995-06-06', 'Company F', 'Philadelphia', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(7, 'user7', '$2y$10$E7xampleHashForPassword7', 'Eve', 'Garcia', 'user7@example.com', '555-0107', '1996-07-07', 'Company G', 'San Antonio', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(8, 'user8', '$2y$10$E8xampleHashForPassword8', 'Frank', 'Miller', 'user8@example.com', '555-0108', '1997-08-08', 'Company H', 'San Diego', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(9, 'user9', '$2y$10$E9xampleHashForPassword9', 'Grace', 'Davis', 'user9@example.com', '555-0109', '1998-09-09', 'Company I', 'Dallas', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(10, 'user10', '$2y$10$E10xampleHashForPassword10', 'Hank', 'Rodriguez', 'user10@example.com', '555-0110', '1999-10-10', 'Company J', 'San Jose', '', '2025-01-04 16:42:52', '2025-01-04 16:42:52'),
(11, 'new', '$2y$10$7qzd.VfMI9fxDm/YoTChWuSAgZOvzZMIlvVHYIxeMRFN1iuPdbi6q', 'New', 'User', 'new@new.com', NULL, NULL, NULL, NULL, NULL, '2025-01-06 02:00:19', '2025-01-08 20:31:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
