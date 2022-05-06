
create database if not exists bookdb;









 use   bookdb; 
CREATE TABLE `books` (
  isbn int(11) NOT NULL AUTO_INCREMENT,
  title varchar(80) NOT NULL,
  author varchar(80) NOT NULL,
  year int(4),
  PRIMARY KEY (`isbn`)
) ;

INSERT INTO books (isbn, title, author) VALUES
(1234568, 'PHP Programming', 'Sam Jones'),
(12345675, 'Java Programming ', 'Dale Van Heer');

