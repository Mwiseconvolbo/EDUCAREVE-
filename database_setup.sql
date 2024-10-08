CREATE DATABASE plateforme_educative;

USE plateforme_educative;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('teacher', 'assistant', 'student') NOT NULL
);

CREATE TABLE assignments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    submission_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE corrections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    assignment_id INT NOT NULL,
    corrector_id INT NOT NULL,
    comments TEXT,
    correction_date DATETIME,
    FOREIGN KEY (assignment_id) REFERENCES assignments(id),
    FOREIGN KEY (corrector_id) REFERENCES users(id)
);

CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    assignment_id INT NOT NULL,
    grade VARCHAR(10),
    feedback TEXT,
    result_date DATETIME,
    FOREIGN KEY (assignment_id) REFERENCES assignments(id)
);

CREATE TABLE notifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    message TEXT,
    notification_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
