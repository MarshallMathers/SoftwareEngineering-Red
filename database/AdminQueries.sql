-- Submit Room Data
INSERT INTO Rooms (Room, Capacity) VALUES (?, ?);
-- Request Room Data
SELECT * FROM Rooms;
-- Update Room & Capacity
UPDATE Rooms SET Room=?, Capacity=? WHERE RoomID=?;
-- Delete Client
DELETE FROM Rooms WHERE RoomID=?;

-- Submit Client
INSERT INTO Clients (UserID) VALUE (?);
-- Request Clients
SELECT * FROM Clients;
-- Delete Client
DELETE FROM Clients WHERE UserID=?;

-- Submit Timeslot
INSERT INTO Timeslots (Timeslot) VALUES (?);
-- Request Timeslots
SELECT * FROM Timeslots;
-- Update Timeslot
UPDATE Timeslots SET Timeslot=? WHERE TimeslotID=?;
-- Delete Timeslot
DELETE FROM Timeslots WHERE TimeslotID=?;

-- Request Forms dump
SELECT * FROM FORMS;
-- Request Single Form
SELECT * FROM FORMS WHERE FormID=?;

-- Request Admin Login
SELECT * FROM Admins WHERE Username=?;