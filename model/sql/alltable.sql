CREATE TABLE employee ( 
    empid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    FirstName TINYTEXT NOT NULL, 
    LastName TINYTEXT NOT NULL, 
    Address TEXT, Telephone int(10), 
    Designation TINYTEXT NOT NULL, 
    Email TEXT NULL, 
    StartDate TIME NOT NULL, 
    EndDate TIME NULL, 
    IsDeleted TINYTEXT NULL 
);

CREATE TABLE users ( 
    userid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    empid int,
    FOREIGN KEY(empid) REFERENCES employee(empid),
    Pwd LONGTEXT NOT NULL, 
    IsDeleted TINYTEXT NULL 
);

CREATE TABLE salary ( 
    sid int(3) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    empid int ,
    FOREIGN KEY(empid) REFERENCES employee(empid),
    DaySal int(10) NOT NULL, 
    HourOt int(10) NOT NULL
);

CREATE TABLE bus ( 
    busid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    StartDate DATE NOT NULL, 
    Milage int(10) NULL, 
    State TINYTEXT NOT NULL 
);

CREATE TABLE dieselUsage ( 
    usageid int(8) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    busid int ,
    FOREIGN KEY(busid) REFERENCES bus(busid),
    dieselUsage int(10) NOT NULL,
    date DATE NOT NULL
);

CREATE TABLE route ( 
    routeid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    RouteName TINYTEXT NOT NULL,
    Description TEXT NOT NULL
);

CREATE TABLE timeTable ( 
    tid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    routeid int,
    status VARCHAR(15) DEFAULT 'Pending..',
    FOREIGN KEY(routeid) REFERENCES route(routeid),
    time TIME NOT NULL,
    day VARCHAR(15) NOT NULL
);

CREATE TABLE ticketBook ( 
    ticketbookid int(10) PRIMARY KEY NOT NULL, 
    Tickets int(5) NOT NULL,
    CurruntNumber int(10) NOT NULL,
    StartNumber int(10) NOT NULL,
    EndNumber int(10) NOT NULL,
    State TINYTEXT NOT NULL
);

CREATE TABLE dutyRecord ( 
    dutyid int(15) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    busid int,
    FOREIGN KEY(busid) REFERENCES bus(busid),
    routeid int,
    FOREIGN KEY(routeid) REFERENCES route(routeid),
    tid int,
    FOREIGN KEY(tid) REFERENCES timeTable(tid),
    ticketbookid int,
    FOREIGN KEY(ticketbookid) REFERENCES ticketBook(ticketbookid),
    driverid int,
    FOREIGN KEY(driverid) REFERENCES employee(empid),
    conductorid int,
    FOREIGN KEY(conductorid) REFERENCES employee(empid),
    Date DATE NOT NULL,
    ArrivedTime TIME NOT NULL,
    DispatchTime TIME NOT NULL,
    dieselusage VARCHAR(20) DEFAULT '0',
    state VARCHAR(20) NOT NULL
);

CREATE TABLE attendenceRecord ( 
    aid int(15) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    empid int,
    FOREIGN KEY(empid) REFERENCES employee(empid),
    Date DATE NOT NULL,
    Time TIME NOT NULL
);

CREATE TABLE complain ( 
    compid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    dutyid int,
    FOREIGN KEY(dutyid) REFERENCES dutyRecord(dutyid),
    Description TEXT NOT NULL,
    Date DATE NOT NULL,
    state VARCHAR(20) NOT NULL
);


CREATE TABLE paysheet ( 
    paysheetid int(15) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    empid int,
    FOREIGN KEY(empid) REFERENCES employee(empid),
    Date DATE NOT NULL,
    Amount int(10) NOT NULL
);

CREATE TABLE complainAssigning ( 
    compassignid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    compid int,
    FOREIGN KEY(compid) REFERENCES complain(compid),
    engid int,
    FOREIGN KEY(engid) REFERENCES employee(empid),
    workerid int,
    FOREIGN KEY(workerid) REFERENCES employee(empid),
    Date DATE NOT NULL,
    time TIME NOT NULL
);