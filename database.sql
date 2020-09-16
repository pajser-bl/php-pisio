-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2020 at 06:07 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pavlev_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'In use',
  `type` varchar(45) DEFAULT NULL,
  `acquired` date NOT NULL,
  `price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `amortization` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `person_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`id`, `name`, `description`, `status`, `type`, `acquired`, `price`, `amortization`, `person_id`, `location_id`) VALUES
(14, 'IBM Power System S914', '8x core 3.8GHz, 1TB DDR4 2666Mbps', 'Active', 'Tangible', '2020-08-31', '63096.0000', '1.0000', 2, 2),
(15, 'Slivovitz', 'Plum brandy 0.7L, 45% ABV', 'Limited Use', 'Current Assets', '2020-07-06', '25.0000', '0.1000', 1, 2),
(16, 'Notebook', 'Old cofee cup stained math notebook.', 'Active', 'Current Assets', '2020-02-12', '1.0000', '0.0000', 1, 1),
(32, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(33, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(34, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(35, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(36, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(37, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(38, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(39, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1),
(40, 'Test', 'Test', 'In use', 'Test', '2020-09-09', '0.0000', '0.0000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('employee', 2, 1599000842),
('member', 3, 1599010599),
('theCreator', 1, 1598743430);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Administrator of this application', NULL, NULL, 1590519303, 1590519303),
('employee', 1, 'Employee of this site/company who has lower rights than admin', NULL, NULL, 1590519303, 1590519303),
('manageUsers', 2, 'Allows admin+ roles to manage users', NULL, NULL, 1590519303, 1590519303),
('member', 1, 'Authenticated user, equal to \"@\"', NULL, NULL, 1590519303, 1590519303),
('premium', 1, 'Premium users. Authenticated users with extra powers', NULL, NULL, 1590519303, 1590519303),
('theCreator', 1, 'You!', NULL, NULL, 1590519304, 1590519304),
('usePremiumContent', 2, 'Allows premium+ roles to use premium content', NULL, NULL, 1590519303, 1590519303);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('theCreator', 'admin'),
('admin', 'employee'),
('admin', 'manageUsers'),
('premium', 'member'),
('employee', 'premium'),
('premium', 'usePremiumContent');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isAuthor', 'O:25:\"app\\rbac\\rules\\AuthorRule\":3:{s:4:\"name\";s:8:\"isAuthor\";s:9:\"createdAt\";i:1590519303;s:9:\"updatedAt\";i:1590519303;}', 1590519303, 1590519303);

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `name`, `description`) VALUES
(1, 'ETF BL', 'Patre 5, Banja Luka'),
(2, 'MF BL', 'Bulevar Vojvode Stepe Stepanovica 71,Banja Luka');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lat`, `lon`, `description`, `room_id`) VALUES
(1, 44.766632, 17.187016, 'Server rack 02', 1),
(2, 44.766640, 17.018702, 'Stash inside cabinet', 2),
(3, 44.765453, 17.198208, 'Ceiling', 3),
(4, 44.766632, 17.187016, 'Server rack 03', 1),
(5, 44.766632, 17.187016, 'Server rack 01', 1),
(6, 44.766640, 17.018702, 'On desk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1590519295),
('m141022_115823_create_user_table', 1590519298),
('m141022_115912_create_rbac_tables', 1590519299);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `employment` varchar(255) NOT NULL,
  `title` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `lastname`, `firstname`, `employment`, `title`) VALUES
(1, 'McTeachin', 'Professor', 'Head professor', 'PhD'),
(2, 'McAssistant', 'Master', 'Assistant', 'MS'),
(3, 'McScientist', 'Mad', 'Head of research', 'PhD');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `building_id`) VALUES
(1, 'Server Room 001', 'Server Room no.001 at ETF', 1),
(2, 'Office 1010', 'Kabinet no.1010 at ETF', 1),
(3, 'Amphitheater', 'Amphitheater at MF', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `asset` int(11) NOT NULL,
  `person_from` int(11) DEFAULT NULL,
  `person_to` int(11) DEFAULT NULL,
  `location_from` int(11) DEFAULT NULL,
  `location_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `date`, `asset`, `person_from`, `person_to`, `location_from`, `location_to`) VALUES
(34, '2020-09-10', 14, 1, 2, 1, 1),
(39, '2020-09-07', 14, 2, 3, 1, 1),
(40, '2020-09-08', 14, 3, 3, 1, 4),
(41, '2020-09-11', 16, 1, 3, 6, 6),
(42, '2020-09-11', 16, 3, 1, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_activation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `status`, `auth_key`, `password_reset_token`, `account_activation_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', '$2y$13$aHsit9E1ZactnZhlXIbgZ.NNFBjyydYhcwQDivTmSm2Z..I4lr3j2', 10, 'aVnDqZqbmyWwESb4OIymJwmKm9YDW3OU', NULL, NULL, 1598743430, 1598743430),
(2, 'employee', 'employee@test.com', '$2y$13$dhTy8a0Glz0Aj7MdKFkSz.inyod4fTDa0L3iFgR3O8yYpjzP2xCZS', 10, 'k4qm7EEDJYJW91WU05HVP55TSsuvgg7o', NULL, NULL, 1598743518, 1599000842),
(3, 'member', 'member@test.com', '$2y$13$CmFV7MOeXcftd8SoZ90rWeYQ26iB7POeElwt6DRNcYCqKcyP7tv5.', 10, 'QvsUm5pvCHhHfcFgNYhc0-nZwApAx8Zj', NULL, NULL, 1599010599, 1599010599);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asset_person_idx` (`person_id`),
  ADD KEY `fk_asset_location1_idx` (`location_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_location_room1_idx` (`room_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_building1_idx` (`building_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transfer_asset1_idx` (`asset`),
  ADD KEY `fk_transfer_person1_idx` (`person_from`),
  ADD KEY `fk_transfer_person2_idx` (`person_to`),
  ADD KEY `fk_transfer_location1_idx` (`location_from`),
  ADD KEY `fk_transfer_location2_idx` (`location_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `account_activation_token` (`account_activation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset`
--
ALTER TABLE `asset`
  ADD CONSTRAINT `fk_asset_location1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asset_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_location_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_building1` FOREIGN KEY (`building_id`) REFERENCES `building` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `fk_transfer_asset1` FOREIGN KEY (`asset`) REFERENCES `asset` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_location1` FOREIGN KEY (`location_from`) REFERENCES `location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_location2` FOREIGN KEY (`location_to`) REFERENCES `location` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_person1` FOREIGN KEY (`person_from`) REFERENCES `person` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transfer_person2` FOREIGN KEY (`person_to`) REFERENCES `person` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
