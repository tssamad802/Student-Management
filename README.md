🎓 Student Management System

Live Demo: https://sm-system.infinityfreeapp.com/index.php

This is a simple Student Management System built with classic web tech to help manage student records like adding, editing, deleting, and viewing students. It is handy for schools or anyone learning CRUD apps the traditional way.

Features

Add new student records
Edit existing student data
Delete students
See all students in a table
Clean and structured PHP + MySQL backend
Lightweight UI for fast interaction

Tech Stack

Frontend: HTML, CSS, Bootstrap
Backend: PHP
Database: MySQL / MariaDB
Deployment: Free hosting (InfinityFree)

Project Structure

/
├─ assets/
│   ├─ css/
│   └─ js/
├─ config.php
├─ index.php
├─ add.php
├─ edit.php
├─ delete.php
└─ README.md

index.php — Home and student list
add.php — Add student form and logic
edit.php — Edit student form and logic
delete.php — Remove student
config.php — Database connection setup

Installation (Run Locally)

Clone this repo
git clone https://github.com/tssamad802/Student-Management.git

Import database
Create a database, e.g., student_management
Run the SQL file if included or create a table:
CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  phone VARCHAR(15),
  roll VARCHAR(50)
);

Update config.php with your MySQL details
Run the app via local server (XAMPP / WAMP / LAMP)

How It Works

Users can add students with name, email, phone and roll
All students show in the main table
Edit and delete buttons make managing records easy
PHP handles backend and form logic
Database stores everything structured

Tips

This is perfect for beginners to understand PHP + MySQL CRUD
Easy to extend with search, pagination, or login features

Acknowledgements

Thanks for building this out! Keep leveling up your web dev skills!
