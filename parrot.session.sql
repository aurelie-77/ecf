-- Active: 1686420737260@@127.0.0.1@3306@garage_parrot



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mark` varchar(255) NOT NULL, 
  `title` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `km` text NOT NULL,
  `year` text NOT NULL,
  `content` TEXT NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;




INSERT INTO `vehicules` (`mark`, `title`, `price`, `km`, `year`, `content`, `image`  ) VALUES
('Audi', 'A6sline', '21000 €', '175000 km', 'Année 2019','Berline, Diesel, boite automatique, radar de recul, GPS, noir', 'audi.jpg'),
('Renault', 'clio', '10000 €', '190000 km', ' Année 2014','Citadine, Essence, boite manuelle, radar de recul, GPS, régulateur de vitesse, gris', 'renault.jpg'),
('Mercedes', 'cabriolet', '32000 €', '188000 Km ', 'Année 2019','Berline, Essence, boite automatique, régulateur et limiteur de vitesse, GPS, gris', 'mercedes.jpg'),
('Jeep', '4x4','19500 €', '110000 Km', 'Année 2010', 'SUV, Diesel, boite manuelle, GPS, noir', 'jeep.jpg'),
('Peugeot','307', '21000 €', '175000 Km','Année 2019', 'Berline, Essence, boite manuelle,  GPS, bleu', NULL),
('Citroen', 'Ds', '5500 €', '154000 km', 'Année 2012', 'Lorem ipsum dolor, sit amet consectetur, adipisicing elit. Dolores, amet.', NULL),
('Renault', 'Trafic', '7500 €', '250000 km', 'Année 2008', 'Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Dolores', NULL);

ALTER TABLE vehicules
ADD image1 VARCHAR(155), ADD image2 VARCHAR(155), ADD image3 VARCHAR(155);



CREATE TABLE IF NOT EXISTS `services`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` TEXT NOT NULL, 
    `price` varchar(255) NOT NULL, 
    `text` TEXT NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `services` (`name`,  `price`, `text`) VALUES
('Entretient', '70€','L entretient de votre véhicule...Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, sapiente architecto.
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto '),
('Mécanique','150€','Nos ateliers de Mécanique...Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, sapiente architecto.
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto '),
('Réparations','150€','Toutes réparations, carrosserie, pneumatique...Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, sapiente architecto.
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa  architecto ');





CREATE TABLE users2 (`id` int(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users2` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'user@test.com', 'User.User@', 'Test', 'Test', 'user'),
(2, 'admin@test.com', 'V.Parrot@', 'Vincent', 'Parrot', 'admin');


CREATE TABLE IF NOT EXISTS `comments`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name_Client` VARCHAR(255) NOT NULL, 
    `content` TEXT NOT NULL, 
    `note` int(5) NOT NULL,
    `id_user` int(11) NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `name_Client`, `content`, `note`) VALUES
(1, 'Aurelie', 'most popular front-end open source toolkit, featuring Sass variables and mixins', '4');


``



