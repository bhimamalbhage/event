-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2019 at 07:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Block',
  `venue` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `status`, `venue`) VALUES
(1, 'PHP : Today PHP Event Calendar Class', '2019-10-22', 1, 'New York'),
(2, 'Javascript Class', '2019-10-10', 1, 'New York'),
(3, 'javascript onchange event example class', '2019-10-08', 1, 'India'),
(4, 'Birthday Event', '2019-10-26', 1, 'New York'),
(5, 'Bootstrap Class', '2019-10-29', 1, 'Colomobia'),
(6, 'Jquery Class', '2019-09-25', 1, 'Las Vegas'),
(7, 'Ajax Class', '2019-09-25', 1, 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `date`, `comment`) VALUES
(3, 'Bhima Malbhage', '02/10/2019', 'That\'s a good way to manage events. Thanks.'),
(4, 'Shankar Malbhage', '02/10/2019', 'Thanks for event management. It\'s good.'),
(5, 'Zsolt', '02/10/2019', 'Some suggestions are required.'),
(6, 'Bhima', '07/10/2019', 'Hi..whats up');

-- --------------------------------------------------------

--
-- Table structure for table `grevents`
--

CREATE TABLE `grevents` (
  `id` int(11) NOT NULL,
  `title` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `venue` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grevents`
--

INSERT INTO `grevents` (`id`, `title`, `date`, `status`, `venue`) VALUES
(1, 'PHP: Heute PHP Event Calendar Class', '2019-10-22', 1, 'New York'),
(2, 'Javascript-Klasse', '2019-10-10', 1, 'New York'),
(3, 'Beispielklasse für ein Javascript onchange-Ereignis', '2019-10-07', 1, 'India'),
(4, 'Geburtstags-Event', '2019-10-26', 1, 'New York');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `lang` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `title` varchar(1000) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `menu` varchar(191) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `daylist` varchar(2000) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `lang`, `title`, `menu`, `daylist`) VALUES
(1, 'en', 'Welcome To Events', 'Home,Events,Event 1,Event 2,Event 3,About,Contact Us', 'Sun,Mon,Tue,Wed,Thu,Fri,Sat'),
(2, 'hr', 'Üdvözöljük az eseményeken', 'itthon,Események,1. esemény,2. esemény,3. esemény,Vendégkönyv,Ról ről,Lépjen kapcsolatba velünk', 'vasárnap,hétfő,kedd,szerda,csütörtök,péntek,szombat'),
(3, 'gr', 'Willkommen zu Veranstaltungen', 'Zuhause,Veranstaltungen,Veranstaltung 1,Veranstaltung 2,Veranstaltung 3,Gästebuch,Über,Kontaktiere uns', 'Son,Mon,Die,Mit,Don,Fre,Sam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grevents`
--
ALTER TABLE `grevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grevents`
--
ALTER TABLE `grevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
