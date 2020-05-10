
CREATE TABLE timeSlotTable ( 
    slotid int(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    time TIME NOT NULL,
    day VARCHAR(15) NOT NULL
);

INSERT INTO `timeSlotTable`(`time`, `day`) VALUES 
("08:00","Monday"),("14:00","Monday"),("09:00","Tuesday"),("15:00","Tuesday"),
 ("10:00","Wednesday"),("16:00","Wednesday"),("11:00","Thursday"),("17:00","Thursday"),
 ("12:00","Friday"),("18:00","Friday"),("11:30","Saturday"),("14:30","Saturday"),("10:30","Sunday"),("16:30","Sunday");


