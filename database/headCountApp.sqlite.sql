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
-- password hashed with BCrypt
-- Password=password
INSERT INTO [Admins] ([Username], [Password]) VALUES ('root', '$2y$10$DYPNyvsEvInue7qU8799f.mrSwCVIY6Zf6QcoszYlc3rw.jGApmMe');

INSERT INTO [Clients] ([UserID]) VALUES ('KVd3Tu');

/*******************************************
   Creating dummy data
********************************************/
INSERT INTO [Timeslots] ([TimeslotID],[Timeslot]) VALUES (1,'2:00 PM');
INSERT INTO [Timeslots] ([TimeslotID],[Timeslot]) VALUES (2,'1:00 PM');
INSERT INTO [Timeslots] ([TimeslotID],[Timeslot]) VALUES (3,'3:00 PM');
INSERT INTO [Timeslots] ([TimeslotID],[Timeslot]) VALUES (4,'12:00 AM');
INSERT INTO [Timeslots] ([TimeslotID],[Timeslot]) VALUES (5,'11:00 AM');

INSERT INTO [Rooms] ([RoomID],[Room],[Capacity]) VALUES (1,'234',80);
INSERT INTO [Rooms] ([RoomID],[Room],[Capacity]) VALUES (2,'123',180);
INSERT INTO [Rooms] ([RoomID],[Room],[Capacity]) VALUES (3,'311',100);
INSERT INTO [Rooms] ([RoomID],[Room],[Capacity]) VALUES (4,'122',30);
INSERT INTO [Rooms] ([RoomID],[Room],[Capacity]) VALUES (5,'222',60);

INSERT INTO [Forms] ([FormID],[RoomID],[TimeslotID],[HeadcountType],[HeadcountCount],[UserID]) 
  VALUES (1,2,4,'Beginning',120,'KVd3Tu');
INSERT INTO [Forms] ([FormID],[RoomID],[TimeslotID],[HeadcountType],[HeadcountCount],[UserID]) 
  VALUES (2,1,2,'Middle',60,'KVd3Tu');
INSERT INTO [Forms] ([FormID],[RoomID],[TimeslotID],[HeadcountType],[HeadcountCount],[UserID]) 
  VALUES (3,3,1,'End',90,'KVd3Tu');
INSERT INTO [Forms] ([FormID],[RoomID],[TimeslotID],[HeadcountType],[HeadcountCount],[UserID]) 
  VALUES (4,5,3,'Beginning',50,'KVd3Tu');
INSERT INTO [Forms] ([FormID],[RoomID],[TimeslotID],[HeadcountType],[HeadcountCount],[UserID]) 
  VALUES (5,4,5,'Middle',25,'KVd3Tu');