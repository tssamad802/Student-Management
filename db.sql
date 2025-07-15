CREATE TABLE `student_records` (
id int(11) PRIMARY KEY AUTO_INCREMENT,
name varchar(55) NOT NULL,
email varchar(55) NOT NULL,
class varchar(12) NOT NULL,
created_at timestamp DEFAULT CURRENT_DATE
);

INSERT INTO `student_records`(`name`, `email`, `class`) VALUES ('samad','samad@gmail.com','2nd');