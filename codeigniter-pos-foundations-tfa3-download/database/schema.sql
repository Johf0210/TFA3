-- IT0049 POS Foundations database schema
-- This schema supports the Customer Accounts and User Accounts pages.

CREATE DATABASE IF NOT EXISTS pos_foundations
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE pos_foundations;

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    avatar VARCHAR(255) NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Alicia Santos', 'alicia.santos@example.com', '0917-555-0101', NOW()),
('Brian Reyes', 'brian.reyes@example.com', '0917-555-0102', NOW()),
('Camille Cruz', 'camille.cruz@example.com', '0917-555-0103', NOW()),
('Daniel Garcia', 'daniel.garcia@example.com', '0917-555-0104', NOW()),
('Erika Mendoza', 'erika.mendoza@example.com', '0917-555-0105', NOW());

INSERT INTO users (username, full_name, avatar, created_at) VALUES
('admin01', 'Maria Dela Cruz', NULL, NOW()),
('cashier01', 'Joshua Lim', NULL, NOW()),
('cashier02', 'Nina Torres', NULL, NOW()),
('manager01', 'Owen Navarro', NULL, NOW()),
('staff01', 'Paolo Rivera', NULL, NOW());
