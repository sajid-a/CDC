-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2012 at 06:20 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE IF NOT EXISTS `Appointment` (
  `AP_Date` date NOT NULL,
  `AP_Time` time NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `AP_Done` int(2) NOT NULL,
  PRIMARY KEY (`AP_Date`,`AP_Time`,`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`AP_Date`, `AP_Time`, `Staff_ID`, `Patient_ID`, `AP_Done`) VALUES
('2012-04-03', '20:20:20', 'A001', 'A001', 0),
('2012-04-04', '20:42:10', 'A001', 'A001', 0),
('2012-04-23', '20:20:20', 'A001', 'A001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ChronicDisease`
--

CREATE TABLE IF NOT EXISTS `ChronicDisease` (
  `Patient_ID` varchar(10) NOT NULL,
  `CDS_No` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Diagnosis` varchar(50) NOT NULL,
  PRIMARY KEY (`CDS_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ChronicDisease`
--

INSERT INTO `ChronicDisease` (`Patient_ID`, `CDS_No`, `Name`, `Diagnosis`) VALUES
('A001', 111, 'Allergy', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `DayOff`
--

CREATE TABLE IF NOT EXISTS `DayOff` (
  `Holiday` varchar(10) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `Type` varchar(10) NOT NULL,
  PRIMARY KEY (`Holiday`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DrugAllergy`
--

CREATE TABLE IF NOT EXISTS `DrugAllergy` (
  `Patient_ID` varchar(10) NOT NULL,
  `DA_No` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Medical`
--

CREATE TABLE IF NOT EXISTS `Medical` (
  `Medical_No` int(10) NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  `Staff_ID` varchar(10) NOT NULL,
  `ML_Date` date NOT NULL,
  `ML_Time` time NOT NULL,
  `Condition` varchar(50) NOT NULL,
  `ML_Done` int(2) NOT NULL,
  PRIMARY KEY (`Medical_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Medical`
--

INSERT INTO `Medical` (`Medical_No`, `Patient_ID`, `Staff_ID`, `ML_Date`, `ML_Time`, `Condition`, `ML_Done`) VALUES
(1, 'A001', 'A001', '2012-04-01', '20:20:20', 'Fever', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE IF NOT EXISTS `Medicine` (
  `Medicine_No` int(10) NOT NULL,
  `Supplier_No` int(10) NOT NULL,
  `Invoice_No` int(10) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Unit` int(10) NOT NULL,
  `UnitPrice` int(10) NOT NULL,
  `SellPrice` int(10) NOT NULL,
  `Expire` date NOT NULL,
  PRIMARY KEY (`Medicine_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Medicine`
--

INSERT INTO `Medicine` (`Medicine_No`, `Supplier_No`, `Invoice_No`, `Qty`, `Unit`, `UnitPrice`, `SellPrice`, `Expire`) VALUES
(1234, 1, 1, 10, 20, 100, 110, '2020-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `MedicineDescrip`
--

CREATE TABLE IF NOT EXISTS `MedicineDescrip` (
  `Medicine_No` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Curative` varchar(10) NOT NULL,
  `Contract_Ind` varchar(10) NOT NULL,
  `Indication` varchar(10) NOT NULL,
  PRIMARY KEY (`Medicine_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MedicineDescrip`
--

INSERT INTO `MedicineDescrip` (`Medicine_No`, `Name`, `Curative`, `Contract_Ind`, `Indication`) VALUES
(1234, 'Crocin', 'aaa', 'AAA', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `Patient_ID` varchar(10) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Bday` date NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `BloodType` varchar(4) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Patient_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`Patient_ID`, `Fname`, `Lname`, `Sex`, `Bday`, `Address`, `Mobile`, `Phone`, `Email`, `BloodType`, `Password`) VALUES
('A001', 'Admin', 'Admin', 'Male', '1991-03-22', 'Nerul', 1234567890, 1234567890, 'a@a.com', 'A+', 'admin'),
('A002', 'AAAA', 'AAAA', 'Male', '1991-03-25', 'Nerul', 2147483647, 2147483647, 'a@a.com', 'B+', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `PrescriptionMedicines`
--

CREATE TABLE IF NOT EXISTS `PrescriptionMedicines` (
  `PM_No` int(10) NOT NULL AUTO_INCREMENT,
  `Medicine_No` int(10) NOT NULL,
  `PM_Date` date NOT NULL,
  `PM_Time` time NOT NULL,
  `Patient_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`PM_No`,`Medicine_No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `PrescriptionMedicines`
--

INSERT INTO `PrescriptionMedicines` (`PM_No`, `Medicine_No`, `PM_Date`, `PM_Time`, `Patient_ID`) VALUES
(1, 1234, '2012-04-01', '20:20:20', 'A001'),
(4, 1234, '2012-04-03', '17:51:18', 'A001'),
(5, 1234, '2012-04-03', '17:55:08', 'A001');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `Staff_ID` varchar(10) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Bday` date NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Mobile` int(10) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Position` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `S_Disable` int(1) NOT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_ID`, `Fname`, `Lname`, `Sex`, `Bday`, `Address`, `Mobile`, `Phone`, `Email`, `Position`, `Password`, `S_Disable`) VALUES
('A001', 'Admin', 'Admin', 'Male', '1991-03-22', 'Nerul', 1234567890, 1234567890, 'a@a.com', 'Doctor', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Supplier`
--

CREATE TABLE IF NOT EXISTS `Supplier` (
  `Supplier_No` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Fax` int(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Personal` int(10) NOT NULL,
  `S_Disable` int(2) NOT NULL,
  PRIMARY KEY (`Supplier_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Supplier`
--

INSERT INTO `Supplier` (`Supplier_No`, `Name`, `Address`, `Phone`, `Fax`, `Email`, `Personal`, `S_Disable`) VALUES
(1, 'Elder Pharma', 'Mumbai', 1234, 1234, 'a@a.com', 1234, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
