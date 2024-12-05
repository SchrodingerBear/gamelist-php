-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 12:37 PM
-- Server version: 10.4.33-MariaDB-log
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `popularity` varchar(50) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `featured` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `genre`, `popularity`, `platform`, `image`, `featured`) VALUES
(1, 'League of Legends', 'MOBA', 'High', 'PC', 'assets/img/game/1.jpg', 1),
(2, 'Valorant', 'FPS', 'High', 'PC', 'assets/img/game/2.jpg', 1),
(3, 'Teamfight Tactics', 'Strategy', 'High', 'PC, Mobile', 'assets/img/game/3.jpg', 1),
(4, 'Mobile Legends', 'Moba', 'High', 'Mobile', 'assets/img/game/4.png', 1),
(5, 'GTA 5', 'Open World', 'High', 'PC', 'assets/img/game/5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `birthday`, `gender`, `created_at`, `type`) VALUES
(1, 'Administrator', '', 'admin@gmail.com', '$2y$10$Sokjiw/JnuXkBwnGTqgiZ.5JWQh96zqG1IigBoqmTaNDFK3xvxMKO', '2024-12-27', 'Male', '2024-12-03 08:20:27', 0),
(2, 'Sean', 'Pugosa', 'seancvpugosa@gmail.com', '$2y$10$4qme5I3dzF1PJtoy31MiueokJywHXXnctOaAsRzl0JRKxrGngiB4m', '2024-12-17', 'Male', '2024-12-03 08:23:59', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
