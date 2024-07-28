//code to create database

CREATE DATABASE travelersdetails;
USE travelersdetails;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) NOT NULL,
first_name VARCHAR(255) NOT NULL,
last_name VARCHAR(255) NOT NULL,
country VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL
);
///// post table
CREATE TABLE posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
author VARCHAR(100),
image VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
/////packages table
CREATE TABLE packages (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
price DECIMAL(10, 2) NOT NULL,
image VARCHAR(255),
duration VARCHAR(50),
destination VARCHAR(255),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
///////////////////////////////////////////
CREATE DATABASE IF NOT EXISTS travelersdetails;

USE travelersdetails;

CREATE TABLE IF NOT EXISTS bookings (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT NOT NULL,
from_country VARCHAR(255) NOT NULL,
to_country VARCHAR(255) NOT NULL,
ticket_type VARCHAR(255) NOT NULL,
departure_date DATE NOT NULL,
price DECIMAL(10, 2) NOT NULL,
card_type VARCHAR(50) NOT NULL,
card_number VARCHAR(16) NOT NULL,
expiry_date VARCHAR(5) NOT NULL,
cvv VARCHAR(3) NOT NULL,
booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
