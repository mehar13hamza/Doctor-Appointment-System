-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2021 at 09:07 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `19160239`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_Id` int(3) NOT NULL,
  `patient_username` varchar(100) NOT NULL,
  `schedule_Id` int(10) NOT NULL,
  `appiontment_Symptom` varchar(100) NOT NULL,
  `appiontment_Comment` varchar(100) NOT NULL,
  `appiontment_status` varchar(10) NOT NULL DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `patient_email` varchar(50) DEFAULT NULL,
  `patient_phone` varchar(50) DEFAULT NULL,
  `patient_message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `patient_name`, `patient_email`, `patient_phone`, `patient_message`) VALUES
(1, 'abcd', 'gmail.com', '76543', 'hello world'),
(2, 'demo', 'demo@gmail.com', '12345', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'),
(3, 'test', 'test@gmail.com', '12345', ''),
(4, 'test', 'test@gmail.com', '1234', 'Lorem Ipsum'),
(5, 'bcd', 'bcd@gmail.com', '1234', 'Lorem Ipsum'),
(6, 'code', 'code@gmail.com', '1234', 'hELLO WORLD'),
(7, 'last', 'last@gmail.com', '123', 'asd'),
(8, 'final', 'final123@gmail.com', '124', 'helllo'),
(9, 'my name', 'my emaik', '9875', 'final message testing');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `doctor_Id` int(3) NOT NULL,
  `doctor_FirstName` varchar(50) NOT NULL,
  `doctor_LastName` varchar(50) NOT NULL,
  `doctor_Address` varchar(100) NOT NULL,
  `doctor_Phone` varchar(15) NOT NULL,
  `doctor_Email` varchar(20) NOT NULL,
  `doctor_DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_username`, `password`, `doctor_Id`, `doctor_FirstName`, `doctor_LastName`, `doctor_Address`, `doctor_Phone`, `doctor_Email`, `doctor_DOB`) VALUES
('adam123', '123', 123, 'Doctor', 'Adam', 'Birmingham', '01735677589', 'Adam@gmail.com', '1990-04-10'),
('angela123', 'angela123', 1234, 'Doctor', 'Angela', 'United Kingdom', '987654321', 'angela@gmail.com', '1994-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `schedule_Id` int(11) NOT NULL,
  `schedule_Date` date NOT NULL,
  `schedule_Day` varchar(15) NOT NULL,
  `start_Time` time NOT NULL,
  `end_Time` time NOT NULL,
  `book_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`schedule_Id`, `schedule_Date`, `schedule_Day`, `start_Time`, `end_Time`, `book_status`) VALUES
(51, '2021-01-11', 'Monday', '18:00:00', '19:00:00', 'available'),
(55, '2021-01-14', 'Wednesday', '10:01:00', '10:20:00', 'available'),
(56, '2021-01-14', 'Wednesday', '10:21:00', '10:40:00', 'available'),
(57, '2021-01-14', 'Wednesday', '10:41:00', '11:00:00', 'available'),
(58, '2021-01-14', 'Wednesday', '11:01:00', '11:20:00', 'available'),
(59, '2021-01-14', 'Wednesday', '11:21:00', '11:40:00', 'available'),
(60, '2021-01-14', 'Wednesday', '11:41:00', '12:00:00', 'available'),
(61, '2021-01-14', 'Wednesday', '12:01:00', '12:20:00', 'available'),
(62, '2021-01-14', 'Wednesday', '12:21:00', '12:40:00', 'available'),
(63, '2021-01-14', 'Wednesday', '12:41:00', '13:00:00', 'available'),
(64, '2021-01-14', 'Wednesday', '13:01:00', '13:20:00', 'available'),
(65, '2021-01-14', 'Wednesday', '13:21:00', '13:40:00', 'available'),
(66, '2021-01-14', 'Wednesday', '13:41:00', '14:00:00', 'available'),
(67, '2021-01-14', 'Wednesday', '14:01:00', '14:20:00', 'available'),
(68, '2021-01-14', 'Wednesday', '14:21:00', '14:40:00', 'available'),
(69, '2021-01-14', 'Wednesday', '14:41:00', '15:00:00', 'available'),
(70, '2021-01-14', 'Wednesday', '15:01:00', '15:20:00', 'available'),
(71, '2021-01-14', 'Wednesday', '15:21:00', '15:40:00', 'available'),
(72, '2021-01-14', 'Wednesday', '15:41:00', '16:00:00', 'available'),
(73, '2021-01-14', 'Wednesday', '16:01:00', '16:20:00', 'available'),
(74, '2021-01-14', 'Wednesday', '16:21:00', '16:40:00', 'available'),
(75, '2021-01-14', 'Wednesday', '16:41:00', '17:00:00', 'available'),
(76, '2021-01-14', 'Wednesday', '17:01:00', '17:20:00', 'available'),
(77, '2021-01-14', 'Wednesday', '17:21:00', '17:40:00', 'available'),
(78, '2021-01-14', 'Wednesday', '17:41:00', '18:00:00', 'available'),
(79, '2021-01-15', 'Thursday', '09:00:00', '09:20:00', 'available'),
(80, '2021-01-15', 'Thursday', '09:21:00', '09:40:00', 'available'),
(81, '2021-01-15', 'Thursday', '09:41:00', '10:00:00', 'available'),
(82, '2021-01-15', 'Thursday', '10:01:00', '10:20:00', 'available'),
(83, '2021-01-15', 'Thursday', '10:21:00', '10:40:00', 'available'),
(84, '2021-01-15', 'Thursday', '10:41:00', '11:00:00', 'available'),
(85, '2021-01-15', 'Thursday', '11:01:00', '11:20:00', 'available'),
(86, '2021-01-15', 'Thursday', '11:21:00', '11:40:00', 'available'),
(87, '2021-01-15', 'Thursday', '11:41:00', '12:00:00', 'available'),
(88, '2021-01-15', 'Thursday', '12:01:00', '12:20:00', 'available'),
(89, '2021-01-15', 'Thursday', '12:21:00', '12:40:00', 'available'),
(90, '2021-01-15', 'Thursday', '12:41:00', '13:00:00', 'available'),
(91, '2021-01-15', 'Thursday', '13:01:00', '13:20:00', 'available'),
(92, '2021-01-15', 'Thursday', '13:21:00', '13:40:00', 'available'),
(93, '2021-01-15', 'Thursday', '13:41:00', '14:00:00', 'available'),
(94, '2021-01-15', 'Thursday', '14:01:00', '14:20:00', 'available'),
(95, '2021-01-15', 'Thursday', '14:21:00', '14:40:00', 'available'),
(96, '2021-01-15', 'Thursday', '14:41:00', '15:00:00', 'available'),
(97, '2021-01-15', 'Thursday', '15:01:00', '15:20:00', 'available'),
(98, '2021-01-15', 'Thursday', '15:21:00', '15:40:00', 'available'),
(99, '2021-01-15', 'Thursday', '15:41:00', '16:00:00', 'available'),
(100, '2021-01-15', 'Thursday', '16:01:00', '16:20:00', 'available'),
(101, '2021-01-15', 'Thursday', '16:21:00', '16:40:00', 'available'),
(102, '2021-01-15', 'Thursday', '16:41:00', '17:00:00', 'available'),
(103, '2021-01-15', 'Thursday', '17:01:00', '17:20:00', 'available'),
(104, '2021-01-15', 'Thursday', '17:21:00', '17:40:00', 'available'),
(105, '2021-01-15', 'Thursday', '17:41:00', '18:00:00', 'available'),
(106, '2021-01-16', 'Friday', '09:00:00', '09:20:00', 'available'),
(107, '2021-01-16', 'Friday', '09:21:00', '09:40:00', 'available'),
(108, '2021-01-16', 'Friday', '09:41:00', '10:00:00', 'available'),
(109, '2021-01-16', 'Friday', '10:01:00', '10:20:00', 'available'),
(110, '2021-01-16', 'Friday', '10:21:00', '10:40:00', 'available'),
(111, '2021-01-16', 'Friday', '10:41:00', '11:00:00', 'available'),
(112, '2021-01-16', 'Friday', '11:01:00', '11:20:00', 'available'),
(113, '2021-01-16', 'Friday', '11:21:00', '11:40:00', 'available'),
(114, '2021-01-16', 'Friday', '11:41:00', '12:00:00', 'available'),
(115, '2021-01-16', 'Friday', '12:01:00', '12:20:00', 'available'),
(116, '2021-01-16', 'Friday', '12:21:00', '12:40:00', 'available'),
(117, '2021-01-16', 'Friday', '12:41:00', '13:00:00', 'available'),
(118, '2021-01-16', 'Friday', '13:01:00', '13:20:00', 'available'),
(119, '2021-01-16', 'Friday', '13:21:00', '13:40:00', 'available'),
(120, '2021-01-16', 'Friday', '13:41:00', '14:00:00', 'available'),
(121, '2021-01-16', 'Friday', '14:01:00', '14:20:00', 'available'),
(122, '2021-01-16', 'Friday', '14:21:00', '14:40:00', 'available'),
(123, '2021-01-16', 'Friday', '14:41:00', '15:00:00', 'available'),
(124, '2021-01-16', 'Friday', '15:01:00', '15:20:00', 'available'),
(125, '2021-01-16', 'Friday', '15:21:00', '15:40:00', 'available'),
(126, '2021-01-16', 'Friday', '15:41:00', '16:00:00', 'available'),
(127, '2021-01-16', 'Friday', '16:01:00', '16:20:00', 'available'),
(128, '2021-01-16', 'Friday', '16:21:00', '16:40:00', 'available'),
(129, '2021-01-16', 'Friday', '16:41:00', '17:00:00', 'available'),
(130, '2021-01-16', 'Friday', '17:01:00', '17:20:00', 'available'),
(131, '2021-01-16', 'Friday', '17:21:00', '17:40:00', 'available'),
(132, '2021-01-16', 'Friday', '17:41:00', '18:00:00', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patient_First_Name` varchar(20) NOT NULL,
  `patient_Last_Name` varchar(20) NOT NULL,
  `patient_Maritial_Status` varchar(10) NOT NULL,
  `patient_DOB` date NOT NULL,
  `patient_Gender` varchar(10) NOT NULL,
  `patient_Address` varchar(100) NOT NULL,
  `patient_Phone` varchar(15) NOT NULL,
  `patient_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_username`, `password`, `patient_First_Name`, `patient_Last_Name`, `patient_Maritial_Status`, `patient_DOB`, `patient_Gender`, `patient_Address`, `patient_Phone`, `patient_Email`) VALUES
('code', 'qwerty', 'code', 'code', '', '1990-01-10', 'female', '', '', 'code@gmail.com'),
('demo1', 'qwerty', 'demo ', 'demo q', '', '1997-01-13', 'female', '', '', 'demo@gmail.com'),
('final123', 'final123', 'final', 'copy', 'single', '1999-01-01', '', 'none', '124', 'final123@gmail.com'),
('last123', '123', 'last', 'attempt', 'single', '1999-01-13', 'male', 'ABcd', '98765', 'last@gmail.com'),
('test', 'qwerty', 'test', 'login', '', '1990-03-13', 'male', '', '', 'test@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_Id`),
  ADD UNIQUE KEY `scheduleId_2` (`schedule_Id`),
  ADD KEY `patient_username` (`patient_username`),
  ADD KEY `schedule_Id` (`schedule_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_username`);

--
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`schedule_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `schedule_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_patient_fk` FOREIGN KEY (`patient_username`) REFERENCES `patient` (`patient_username`),
  ADD CONSTRAINT `appointment_schedule_fk` FOREIGN KEY (`schedule_Id`) REFERENCES `doctor_schedule` (`schedule_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
