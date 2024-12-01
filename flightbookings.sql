CREATE DATABASE IF NOT EXISTS flightBookings;


USE flightBookings;


CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    luggage INT NOT NULL,  
    sub_ten_kg INT NOT NULL DEFAULT 0,  
    over_ten_kg INT NOT NULL DEFAULT 0,  
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE INDEX idx_passenger_name ON bookings (first_name, last_name);
