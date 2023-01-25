create database tryonicsdb;
use tryonicsdb;

CREATE TABLE Users(
    UserID int NOT NULL,
    FullName varchar(100) NOT NULL,
    About varchar(500),
    Birthday date,
	Mobile int,
	Email varchar(100),
    Country varchar(25),
	PRIMARY KEY (UserID)
);

ALTER TABLE `users` CHANGE `UserID` `UserID` INT NOT NULL AUTO_INCREMENT;

SELECT * FROM Users;