/***********************************************************************
	headCountApp database - version 1.1
	Description: Creates and populates Head Count App Database.
	DB Server: SQLite
	Authors: Timothy Boss, Kevin Cotter, Emmett Basaca, and Brady Walsh
************************************************************************/

/*******************************************
   Drop Tables
********************************************/
DROP TABLE IF EXISTS [Clients];
DROP TABLE IF EXISTS [Forms];
DROP TABLE IF EXISTS [Rooms];
DROP TABLE IF EXISTS [Timeslots];
DROP TABLE IF EXISTS [Admins];

/*******************************************
   Create Tables
********************************************/
CREATE TABLE [Clients] (
  [UserID] NVARCHAR(20) NOT NULL
);

CREATE TABLE [Forms] (
  [FormID] INTEGER NOT NULL,
  [RoomID] INTEGER NOT NULL,
  [TimeslotID] INTEGER NOT NULL,
  [HeadcountType] NVARCHAR(20) NOT NULL,
  [HeadcountCount] INTEGER NOT NULL,
  [UserID] NVARCHAR(20) NOT NULL,
  [Timestamp] DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE [Rooms] (
  [RoomID] INTEGER NOT NULL,
  [Room] NVARCHAR(20) NOT NULL,
  [Capacity] INTEGER NOT NULL
);

CREATE TABLE [Timeslots] (
  [TimeslotID] INTEGER NOT NULL,
  [Timeslot] NVARCHAR(20) NOT NULL
);

CREATE TABLE [Admins] (
  [Username] NVARCHAR(20) NOT NULL,
  [Password] NVARCHAR(255) NOT NULL
);

/*******************************************
   Creating Default Admin User
********************************************/
INSERT INTO [Admins] ([Username], [Password]) VALUES ('root', 'password');