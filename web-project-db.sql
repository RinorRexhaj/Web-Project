-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2024 at 11:46 PM
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
-- Database: `web-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ID` int(11) NOT NULL,
  `Message` text NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `Message`, `User`) VALUES
(10, 'Lorem ipsum dolore', 5),
(11, 'Message from Orges\r\n', 7),
(12, 'Message from Law', 17),
(13, 'Test Message', 19);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `EditedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`ID`, `Title`, `Description`, `Location`, `Price`, `Image`, `User_ID`, `EditedBy`) VALUES
(12, 'Bora Bora', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit repudiandae minus.', 'French Polynesia', 1000, 'borabora.jpg', 5, 7),
(14, 'Paris Adventure', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit repudiandae minus.', 'Paris', 500, 'paris.jpg', 7, 7),
(16, 'New York Magic', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit repudiandae.', 'New York', 1200, 'newYork.jpeg', 6, 6),
(17, 'Tokyo Tour', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit repudiandae minus.', 'Tokyo', 900, 'tokyo.webp', 5, NULL),
(18, 'Matira Madness', 'Lorem ipsum dolore Lorem ipsum dolore\nLorem ipsum dolore Lorem ipsum dolore Lorem ipsum dolore', 'Miami', 950, 'bg3.jpg', 5, NULL),
(20, 'Dubai Adventure', 'Lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum', 'Dubai', 500, 'dubai.jpg', 7, 5),
(21, 'Bryce Tour', '8 Day Guided Canyon Bryce Tour', 'Bryce', 200, 'p1.jpeg', 17, NULL),
(22, 'Venice Tour', '5 Day Venice Tour', 'Venice', 399, 'p3.jpeg', 19, NULL),
(23, 'Italy Adventure ', 'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum', 'Italy', 499, 'p2.jpeg', 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`Email`) VALUES
('dmkd@mfm.km'),
('email@email.com'),
('law@gmail.com'),
('nletter@nletter.net'),
('orges@gmail.com'),
('rinor@gmail.com'),
('rinori13579@gmail.com'),
('user1@gmail.com'),
('user@gmail.com'),
('vmskdvsd@mv.cm');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `ID` int(11) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `FromRs` varchar(50) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`ID`, `Destination`, `FromRs`, `CheckIn`, `CheckOut`, `UserID`) VALUES
(2, 'Tokyo', 'Ferizaj', '2024-01-18', '2024-01-20', 5),
(3, 'Dubai', 'Prishtina', '2024-01-21', '2024-01-26', 7),
(4, 'French Polynesia', 'Ferizaj', '2024-01-27', '2024-02-02', 5),
(5, 'Tokyo', 'Prizren', '2024-01-12', '2024-01-16', 7),
(6, 'California', 'Boston', '2024-01-19', '2024-01-24', 5),
(8, 'Dubai', 'Paris', '2024-01-26', '2024-02-02', 8),
(20, 'Maldives', 'Peje', '2024-01-26', '2024-01-30', 11),
(25, 'Florida', 'Cape Town', '2024-01-25', '2024-01-26', 16),
(27, 'Milan', 'Warsaw', '2024-02-22', '2024-02-28', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Profile` varchar(50) DEFAULT NULL,
  `Admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `FullName`, `Email`, `Password`, `Profile`, `Admin`) VALUES
(5, 'Rinor10', 'Rinor Rexhaj', 'rinor@gmail.com', 'Pass1234', 'insta.png', 1),
(6, 'User123', 'User 123', 'user@gmail.com', 'User1234', '', 0),
(7, 'Orges', 'Orges Sadriu', 'orges@gmail.com', 'Pass2004', '', 1),
(8, 'HolidayUser', 'Name Surname', 'holiday@gmail.com', 'holiday123', '', 0),
(11, 'NewUser', 'New User', 'newuser@outlook.live', 'Pass9999', '', 0),
(12, 'Student1', 'Student Lastname', 'student@ubt-uni.net', 'student12', 'eren.jpg', 1),
(14, 'Student2', 'Student 2', 'student2@ubt-uni.net', 'student1212', '', 0),
(16, 'Student3', 'Student 3', 'student3@ubt-uni.net', 'Student312', '', 0),
(17, 'Surgeon of Death', 'Trafalgar D. Water Law', 'law@gmail.com', 'Heart123', 'law.jpg', 0),
(18, 'Drendi', 'Dren Linig', 'dren@gmail.com', 'Dren1234', 'eren.jpg', 0),
(19, 'Attack Titan', 'Eren Yeager', 'eren@gmail.com', 'Eren1234', 'eren.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User` (`User`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `holidays_ibfk_1` (`User_ID`),
  ADD KEY `EditedBy` (`EditedBy`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `reservations_ibfk_1` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`ID`);

--
-- Constraints for table `holidays`
--
ALTER TABLE `holidays`
  ADD CONSTRAINT `holidays_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `holidays_ibfk_2` FOREIGN KEY (`EditedBy`) REFERENCES `users` (`ID`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
