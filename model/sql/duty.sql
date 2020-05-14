CREATE TABLE dutyRecordNew ( 
    dutyid int(15) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    busid int,
    FOREIGN KEY(busid) REFERENCES bus(busid),
    routeid int,
    FOREIGN KEY(routeid) REFERENCES route(routeid),
    slotid int,
    FOREIGN KEY(slotid) REFERENCES timeslottable(slotid),
    ticketbookid int,
    FOREIGN KEY(ticketbookid) REFERENCES ticketBook(ticketbookid),
    driverid int,
    FOREIGN KEY(driverid) REFERENCES employee(empid),
    conductorid int,
    FOREIGN KEY(conductorid) REFERENCES employee(empid),
    Date DATE NOT NULL,
    DispatchTime TIME DEFAULT "00:00",
    state VARCHAR(20) DEFAULT "wating"
);