 CREATE TABLE timeTableNew ( 
    tid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    routeid int,
    FOREIGN KEY(routeid) REFERENCES route(routeid),
    status VARCHAR(15) DEFAULT 'Pending..',
    slotid int,
    FOREIGN KEY(slotid) REFERENCES timeSlotTable(slotid)
);

INSERT INTO `timeTableNew`(`routeid`, `slotid`) VALUES (1,1),(2,1),(4,2),(3,2),
(1,3),(3,3),(4,4),(5,4),
(1,5),(4,5),(2,6),
(1,7),(3,7),(1,8),(5,8),
(3,9),(2,10),(4,10),
(1,11),(2,11),(3,12),(4,12),
(5,13),(1,14);