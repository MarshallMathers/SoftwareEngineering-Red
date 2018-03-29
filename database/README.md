# Database Team (COMP 4970 - Software Engineering)
### Team Members: Timothy Boss, Kevin Cotter, Emmett Basaca, and Brady Walsh

### Quick Database Documentation
#### Entity Relationship Diagram (ERD)
![Entity Relationship Diagram](./Entity%20Relationship%20Diagram%20(ERD).png)

#### Inputs & Outputs Diagram
![Entity Relationship Diagram](./Inputs%20and%20Outputs.png)

#### Database Name: headCountApp

### Tables
---
###### Admins
| Column   | Type         | Info    |
|----------|--------------|---------|
| Username | varchar(20)  | NotNull |
| Password | varchar(255) | NotNull |

###### Clients
| Column   | Type         | Info    |
|----------|--------------|---------|
| UserID   | varchar(20)  | NotNull |

###### Forms
| Column         | Type         | Info                       |
|----------------|--------------|----------------------------|
| FormID         | int(20)      | NotNull                    |
| RoomID         | int(20)      | NotNull                    |
| TimeslotID     | int(20)      | NotNull                    |
| HeadcountType  | varchar(20)  | NotNull                    |
| HeadcountCount | int(20)      | NotNUll                    |
| UserID         | varchar(20)  | NotNull                    |
| Timestamp      | timestamp    | NotNull, CURRENT_TIMESTAMP |

###### Rooms
| Column   | Type         | Info    |
|----------|--------------|---------|
| RoomID   | int(20)      | NotNull |
| Room     | varchar(20)  | NotNull |
| Capacity | int(20)      | NotNull |

###### Timeslots
| Column   | Type         | Info    |
|----------|--------------|---------|
| Username | varchar(20)  | NotNull |
| Password | varchar(255) | NotNull |