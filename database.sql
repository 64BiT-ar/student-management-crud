-- Create Database
CREATE DATABASE IF NOT EXISTS student_management;
USE student_management;

-- Create Students Table
CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15) NOT NULL,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert Sample Data (Optional)
INSERT INTO students (full_name, email, phone, course) VALUES
('John Smith', 'john@example.com', '555-0101', 'Computer Science'),
('Sarah Johnson', 'sarah@example.com', '555-0102', 'Business Administration'),
('Michael Davis', 'michael@example.com', '555-0103', 'Information Technology');
