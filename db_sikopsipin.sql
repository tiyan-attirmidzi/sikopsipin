-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2020 at 06:46 AM
-- Server version: 8.0.21-0ubuntu0.20.04.4
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikopsipin`
--

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `interest` int NOT NULL,
  `debt` int NOT NULL,
  `debt_interest` int NOT NULL,
  `debt_total` int NOT NULL,
  `debt_paid` int NOT NULL,
  `status` int NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `id_user`, `interest`, `debt`, `debt_interest`, `debt_total`, `debt_paid`, `status`, `time`) VALUES
(1, 11, 10, 2000000, 200000, 2200000, 2200000, 1, '2020-09-28 20:38:31'),
(6, 11, 10, 5000000, 500000, 5500000, 0, 0, '2020-09-30 00:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `loan_pays`
--

CREATE TABLE `loan_pays` (
  `id` int NOT NULL,
  `id_loan` int NOT NULL,
  `amount` int NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_pays`
--

INSERT INTO `loan_pays` (`id`, `id_loan`, `amount`, `time`) VALUES
(1, 1, 230000, '2020-09-29 20:32:45'),
(2, 1, 100000, '2020-09-29 20:39:52'),
(4, 1, 500000, '2020-09-30 01:22:02'),
(5, 1, 1370000, '2020-09-30 01:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `saldo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `id_user`, `saldo`) VALUES
(1, 11, 400000),
(2, 2, 500000),
(3, 12, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `saving_details`
--

CREATE TABLE `saving_details` (
  `id` int NOT NULL,
  `id_saving` int NOT NULL,
  `amount` int NOT NULL,
  `type` int NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saving_details`
--

INSERT INTO `saving_details` (`id`, `id_saving`, `amount`, `type`, `time`) VALUES
(1, 1, 200000, 0, '2020-09-27 20:50:39'),
(2, 1, 300000, 0, '2020-09-27 21:09:55'),
(3, 1, 150000, 1, '2020-09-27 21:23:41'),
(4, 2, 500000, 0, '2020-09-28 02:22:46'),
(5, 3, 300000, 0, '2020-09-28 02:26:07'),
(6, 1, 250000, 0, '2020-09-28 02:41:05'),
(7, 1, 300000, 1, '2020-09-28 03:15:47'),
(8, 1, 120000, 0, '2020-09-28 18:42:04'),
(9, 1, 20000, 1, '2020-09-28 18:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `uid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` int NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `joined_since` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `username`, `email`, `name`, `password`, `gender`, `address`, `phone`, `role`, `joined_since`) VALUES
(1, '20200919130701', 'admin', 'admin@sikopsipin.com', 'Admin Sikopsipin', '55c3b5386c486feb662a0785f340938f518d547f', 0, 'Poasia, Andounohu, Kendari, Sulawesi Tenggara', '081122334455', 1, '2020-09-19 13:16:36'),
(2, '20200919130743', 'member', 'member@sikopsipin.com', 'Member Sikopsipin', '55c3b5386c486feb662a0785f340938f518d547f', 0, 'Wua-wua, Kendari, Sulawesi Tenggara', '082244668899', 2, '2020-09-19 13:16:42'),
(11, '20200927204317', 'tester', 'test@test.com', 'Tester Ini Bos', 'ad616acbc075d922cbd257c66b1c2cc15f7ea071', 0, 'Test Test Test', '081133557799', 2, '2020-09-27 20:43:17'),
(12, '20200928022451', 'surti', 'surti@stancovic.com', 'Surti', 'ad616acbc075d922cbd257c66b1c2cc15f7ea071', 1, 'Wawotobi, Unaaha, Sulawesi Tenggara', '082281234567', 2, '2020-09-28 02:24:51'),
(13, '20200928031955', 'among', 'among@us.com', 'Among Us', 'ad616acbc075d922cbd257c66b1c2cc15f7ea071', 1, 'Cafeteria, MedBay, Storage, Admin, Navigation, Lower Engine', '082324252618', 2, '2020-09-28 03:19:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_pays`
--
ALTER TABLE `loan_pays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saving_details`
--
ALTER TABLE `saving_details`
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
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loan_pays`
--
ALTER TABLE `loan_pays`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saving_details`
--
ALTER TABLE `saving_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
