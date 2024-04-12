CREATE DATABASE myapp CHARACTER SET utf8 COLLATE utf8_general_ci;
USE myapp;

CREATE TABLE user(
	id int NOT NULL auto_increment PRIMARY KEY,
	fullname varchar(500) NOT NULL,
	username varchar(100) NOT NULL UNIQUE,
	email varchar(255) NOT NULL UNIQUE,
	password varchar(255) NOT NULL,
	created_at datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255)
);

INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES 
('Producto 1', 'Descripción del Producto 1', 10.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 2', 'Descripción del Producto 2', 15.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 3', 'Descripción del Producto 3', 20.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 4', 'Descripción del Producto 4', 25.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 5', 'Descripción del Producto 5', 30.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 6', 'Descripción del Producto 6', 35.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 7', 'Descripción del Producto 7', 40.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 8', 'Descripción del Producto 8', 45.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 9', 'Descripción del Producto 9', 50.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png'),
('Producto 10', 'Descripción del Producto 10', 55.99, 'https://www.adamedtv.com/wp-content/uploads/2014/05/Screen-Shot-2014-05-07-at-13.50.19.png');