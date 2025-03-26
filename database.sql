CREATE DATABASE bookedDatabase;

USE bookedDatabase;

CREATE TABLE users (
  userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  username VARCHAR(32) UNIQUE NOT NULL,
  passwordHash VARCHAR(255) NOT NULL
);