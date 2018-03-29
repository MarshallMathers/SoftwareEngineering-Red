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
);

CREATE TABLE `Forms` (
  `FormID` int(20) NOT NULL AUTO_INCREMENT,
  `RoomID` int(20) NOT NULL,
  `TimeslotID` int(20) NOT NULL,
  `HeadcountType` varchar(20) NOT NULL,
  `HeadcountCount` int(20) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `Rooms` (
  `RoomID` int(20) NOT NULL AUTO_INCREMENT,
  `Room` varchar(20) NOT NULL,
  `Capacity` int(20) NOT NULL
);

CREATE TABLE `Timeslots` (
  `TimeslotID` int(20) NOT NULL AUTO_INCREMENT,
  `Timeslot` varchar(20) NOT NULL
);

CREATE TABLE `Admins` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
);

/*******************************************
   Creating Default Users
********************************************/
-- password hashed with BCrypt
-- password=password
INSERT INTO `Admins` (`Username`, `Password`) VALUES ('root', '$2y$10$DYPNyvsEvInue7qU8799f.mrSwCVIY6Zf6QcoszYlc3rw.jGApmMe');

INSERT INTO `Clients` (`UserID`) VALUES ('KVd3Tu');

/*******************************************
   Creating dummy data
********************************************/
INSERT INTO `Timeslots` (`Timeslot`) VALUES ('2:00 PM');
INSERT INTO `Timeslots` (`Timeslot`) VALUES ('1:00 PM');
INSERT INTO `Timeslots` (`Timeslot`) VALUES ('3:00 PM');
INSERT INTO `Timeslots` (`Timeslot`) VALUES ('12:00 AM');
INSERT INTO `Timeslots` (`Timeslot`) VALUES ('11:00 AM');

INSERT INTO `Rooms` (`Room`, `Capacity`) VALUES ('room1',80);
INSERT INTO `Rooms` (`Room`, `Capacity`) VALUES ('room2',180);
INSERT INTO `Rooms` (`Room`, `Capacity`) VALUES ('room3',100);
INSERT INTO `Rooms` (`Room`, `Capacity`) VALUES ('room4',30);
INSERT INTO `Rooms` (`Room`, `Capacity`) VALUES ('room5',60);

INSERT INTO `Forms` (`RoomID`,`TimeslotID`,`HeadcountType`,`HeadcountCount`,`UserID`) 
  VALUES (2,4,'Beginning',120,'KVd3Tu');
INSERT INTO `Forms` (`RoomID`,`TimeslotID`,`HeadcountType`,`HeadcountCount`,`UserID`) 
  VALUES (1,2,'Middle',60,'KVd3Tu');
INSERT INTO `Forms` (`RoomID`,`TimeslotID`,`HeadcountType`,`HeadcountCount`,`UserID`) 
  VALUES (3,1,'End',90,'KVd3Tu');
INSERT INTO `Forms` (`RoomID`,`TimeslotID`,`HeadcountType`,`HeadcountCount`,`UserID`) 
  VALUES (5,3,'Beginning',50,'KVd3Tu');
INSERT INTO `Forms` (`RoomID`,`TimeslotID`,`HeadcountType`,`HeadcountCount`,`UserID`) 
  VALUES (4,5,'Middle',25,'KVd3Tu');

