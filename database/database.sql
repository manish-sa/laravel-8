-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2021 at 10:05 PM
-- Server version: 5.7.35-0ubuntu0.18.04.1
-- PHP Version: 7.3.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview`
--

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `name`) VALUES
(1, 'Auto'),
(2, 'Banking'),
(3, 'Education'),
(4, 'eCommerce'),
(5, 'Entertainment');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'leader'),
(4, 'user'),
(5, 'peon');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `profile_score`, `registered_on`) VALUES
(1, 'manishsaini207@gmail.com', '9096683298', 10, '2021-10-16 14:20:20'),
(2, 'manish1@yopmail.com', '9090909090', 25, '2021-10-16 14:20:20'),
(3, 'manish2@yopmail.com', '9191919191', 40, '2021-10-16 14:21:57'),
(4, 'manish3@yopmail.com', '9191919190', 30, '2021-10-16 14:21:57'),
(5, 'manish4@yopmail.com', '9191919194', 44, '2021-10-16 14:23:10'),
(6, 'manish5@yopmail.com', '9191919195', 45, '2021-10-16 14:23:10'),
(7, 'manish6@yopmail.com', '9191919196', 46, '2021-10-16 14:23:10'),
(8, 'manish7@yopmail.com', '9191919197', 47, '2021-10-16 14:23:10'),
(9, 'manish8@yopmail.com', '9191919198', 48, '2021-10-16 14:23:10'),
(10, 'manish9@yopmail.com', '9191919199', 49, '2021-10-16 14:23:10'),
(11, 'manish10@yopmail.com', '9191919110', 50, '2021-10-16 14:23:10');

--
-- Dumping data for table `user_industries`
--

INSERT INTO `user_industries` (`id`, `user_id`, `industry_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5),
(12, 1, 2);

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 7, 4),
(8, 8, 4),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5);

--
-- Dumping data for table `user_views`
--

INSERT INTO `user_views` (`id`, `user_id`, `suggestion_id`, `views`) VALUES
(1, 1, NULL, 10),
(2, 1, NULL, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
