-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2023 at 06:19 AM
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
-- Database: `auth_app_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_hp` char(20) NOT NULL DEFAULT '13',
  `tanggal_lahir` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `no_hp`, `tanggal_lahir`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'asbi', 'asbi@asbi.com', NULL, '21312321312', '2023-09-22', '$2y$10$OSIJ6gNJWT416b98ImdNXuCWRrCkHWLYEycQhYMq./6gDEFjROU82', NULL, '2023-09-05 05:23:22', '2023-09-05 05:23:22'),
(2, '89560', 'asbi@asbii.com', NULL, '895604523384', '2023-09-21', '$2y$10$JNADU1AUiJqlNh0z1MUBX.IEvXJshNbVeuMTwhY.wj.P/yVNVgyjm', '2RMkqlUMC807tycud3yuPJfERj9XvroxS5BdaMW23fUuxKbleeTEuNSujHfe', '2023-09-05 08:45:23', '2023-09-05 18:48:51'),
(3, 'asbi', 'asbi@asbi1.com', NULL, '0821khsad213', '2023-09-11', '$2y$10$7USKMT7XJsPbL803E3N6FeKP.VDEAiAPcUMwQA1/hRv0ROuVtRH8e', NULL, '2023-09-06 19:36:15', '2023-09-06 19:36:15'),
(4, 'asbi', 'asbi@asbiasbi.com', NULL, '08absy657', '2023-09-21', '$2y$10$m.gTpb4CLQ/QuYPWxS3wZub.M9Ay1lLbcC7ro3uFWNwcYthHoPMSa', NULL, '2023-09-06 21:03:05', '2023-09-06 21:03:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
