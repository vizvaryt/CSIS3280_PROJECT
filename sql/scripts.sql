DROP DATABASE IF EXISTS bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE Books
(
    ISBN VARCHAR(500) NOT NULL PRIMARY KEY,
    Author VARCHAR(50) NOT NULL,
    Title VARCHAR(50) NOT NULL,
    Price FLOAT(4,2),
    PublishDate VARCHAR(50) NOT NULL,
    Edition VARCHAR(50),
    Description TEXT NOT NULL,
    Language VARCHAR(50) NOT NULL,
    Fiction BOOLEAN NOT NULL,
    Availability BOOLEAN NOT NULL,
    Bestseller BOOLEAN NOT NULL,
    SoldPerYear INT NOT NULL,
    SoldPerMonth INT NOT NULL,
    SoldPerWeek INT NOT NULL,
    EditorsPick BOOLEAN NOT NULL,
    Textbook BOOLEAN NOT NULL,
    Purchased BOOLEAN NOT NULL DEFAULT FALSE,
    Image VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Users
(
    Email VARCHAR(50) NOT NULL PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(50) NOT NULL,
    Address VARCHAR(50) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Password VARCHAR(100) NOT NULL,
    CurrentCart VARCHAR(500),
    PurchasedBooks VARCHAR(500),
    FOREIGN KEY (CurrentCart) REFERENCES Books(ISBN),
    FOREIGN KEY (PurchasedBooks) REFERENCES Books(ISBN)
) ENGINE=InnoDB;

INSERT INTO Books VALUES
  ('0-672-31697-8', 'Michael Morgan', 
   'Java 2 for Professional Developers', 34.99,
   'January 1st 2021', 'First', 'A book about Java coding',
   'English', FALSE, TRUE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, 'img/0.jpg'
   ),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99,
  'December 25th 1990', 'Third', 'A book for Linux beginners',
   'English', FALSE, TRUE, FALSE, 12, 1, 0, FALSE, TRUE, FALSE, 'img/1.jpg'
  ),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99,
  'August 27th 2017', 'Second', 'A book for people who want to learn GIMP',
   'Multi-Language', FALSE, TRUE, FALSE, 60, 5, 1, TRUE, TRUE, FALSE, 'img/2.jpg'
  ),
  ('0-672-31769-9', 'Thomas Schenk', 
   'Caldera OpenLinux System Administration Unleashed', 49.99,
   'January 1st 2021', 'First', 'An advanced Linux Admin book',
   'English', FALSE, TRUE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, 'img/3.jpg'
  );

INSERT INTO Users VALUES
  (
    'admin@admin.com', 'Admin', 'Debug', '6043100001', '123 Austin Ave', '2000-01-01',
    '$2y$10$UlhBlEkjF9vos3we41tLSORFh.froH1r2fuQsudqBntiedkDq68fq', NULL, NULL
  );