DROP DATABASE IF EXISTS bookstore;

CREATE DATABASE bookstore;

USE bookstore;

CREATE TABLE Books
(  ISBN VARCHAR(13) NOT NULL PRIMARY KEY,
   Author VARCHAR(50),
   Title VARCHAR(100),
   Price FLOAT(4,2),
   PublishDate VARCHAR(50),
   Edition VARCHAR(50),
   Description VARCHAR(500),
   Language VARCHAR(50),
   Fiction BOOLEAN,
   Availability BOOLEAN,
   Bestseller BOOLEAN,
   SoldPerYear INT,
   SoldPerMonth INT,
   SoldPerWeek INT,
   EditorsPick BOOLEAN,
   Textbook BOOLEAN,
   Purchased BOOLEAN,
   PurchasedUser VARCHAR(50)
) ENGINE=InnoDB;

INSERT INTO Books VALUES
  ('0-672-31697-8', 'Michael Morgan', 
   'Java 2 for Professional Developers', 34.99,
   'January 1st 2021', 'First', 'A book about Java coding',
   'English', FALSE, TRUE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, ''
   ),
  ('0-672-31745-1', 'Thomas Down', 'Installing Debian GNU/Linux', 24.99,
  'December 25th 1990', 'Third', 'A book for Linux beginners',
   'English', FALSE, FALSE, FALSE, 12, 1, 0, FALSE, TRUE, FALSE, ''
  ),
  ('0-672-31509-2', 'Pruitt, et al.', 'Teach Yourself GIMP in 24 Hours', 24.99,
  'August 27th 2017', 'Second', 'A book for people who want to learn GIMP',
   'Multi-Language', TRUE, TRUE, FALSE, 60, 5, 1, TRUE, TRUE, FALSE, ''
  ),
  ('0-672-31769-9', 'Thomas Schenk', 
   'Caldera OpenLinux System Administration Unleashed', 49.99,
   'January 1st 2021', 'First', 'Too lazy to change this right now lol',
   'English', FALSE, TRUE, TRUE, 120, 10, 3, TRUE, TRUE, FALSE, ''
   );