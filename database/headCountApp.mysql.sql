/***********************************************************************
	headCountApp database - version 1
	Description: Creates and populates Head Count App Database.
	DB Server: MySQL
	Authors: Timothy Boss, Kevin Cotter, Emmett Basaca, and Brady Walsh
************************************************************************/

/*******************************************
    Drop database if it exists
********************************************/
DROP DATABASE IF EXISTS `headCountApp`;

/*******************************************
   Create database 
********************************************/
CREATE DATABASE `headCountApp`;
USE `headCountApp`;

/*******************************************
   Create Tables
********************************************/
CREATE TABLE `Clients` (
  `UserID` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Forms` (
  `FormID` int(20) NOT NULL,
  `RoomID` int(20) NOT NULL,
  `TimeslotID` int(20) NOT NULL,
  `HeadcountType` varchar(20) NOT NULL,
  `HeadcountCount` int(20) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Rooms` (
  `RoomID` int(20) NOT NULL,
  `Room` varchar(20) NOT NULL,
  `Capacity` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Timeslots` (
  `TimeslotID` int(20) NOT NULL,
  `Timeslot` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `Admins` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*******************************************
   Creating Default Admin User
********************************************/
INSERT INTO `Admins` (`Username`, `Password`) VALUES (`root`, `password`);