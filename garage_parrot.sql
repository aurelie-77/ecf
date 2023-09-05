-- Active: 1686420737260@@127.0.0.1@3306@garage_parrot



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mark` varchar(255) NOT NULL, 
  `title` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `km` text NOT NULL,
  `year` text NOT NULL,
  `content` TEXT NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




INSERT INTO `vehicules` (`mark`, `title`, `price`, `km`, `year`, `content`, `image`  ) VALUES
('audi', 'A6sline', '21000 €', '175000 km','Année 2019','berline, boite automatique, radar de recul gps, noir' 'audi.jpg'),
('Renault', 'clio', '10000 €', '190000 km',' Année 2014','citadine, boite manuelle, radar de recul, gps, regulateur de vitesse, gris', 'renault.jpg'),
('Mercedes', 'cabriolet', '32000 €', '188000 Km ','Année 2019','Berline, boite automatique radar de recul, gps, gris', 'mercedes.jpg'),
('Jeep', '4x4','19500 €', '110000 Km', 'Année 2010', 'suv, boite manuelle, GPS noir', 'jeep.jpg'),
('peugeot','307', '21000 €', '175000 Km','Année 2019','berline boite manuelle radar derecul gps bleu', NULL),
('Article 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, amet. Cum labore possimus ad vitae minima nesciunt commodi eos.', NULL),
('Article 7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, amet. Cum labore possimus ad vitae minima nesciunt commodi eos.', NULL);











DROP TABLE IF EXISTS `users2`;
CREATE TABLE IF NOT EXISTS `users2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `users2` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(4, 'user@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Test', 'Test', 'user'),
(5, 'admin@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Admin', 'Admin', 'admin');


CREATE TABLE IF NOT EXISTS `comments`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name_Client` VARCHAR(255) NOT NULL, 
    `content` TEXT NOT NULL, 
    `note` int(5) NOT NULL,
    `id_user` int(11) NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `name_Client`, `content`, `note`, `id_user`) VALUES
(1, 'Aurelie', 'most popular front-end open source toolkit, featuring Sass variables and mixins', '4', '1'),


CREATE TABLE employes (`id` int(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




