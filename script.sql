-- Active: 1686420737260@@127.0.0.1@3306@garage_parrot
 CREATE TABLE users (`id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'user@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Test', 'Test', 'user'),
(2, 'admin@test.com', '$2y$10$lEzMI.H26sDsV4PzhAVBveHiTDBrH0BGSaNDAin.89cP8y/baG0vu', 'Vincent', 'Parrot', 'admin');



DROP TABLE IF EXISTS `categories`;









DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  'marque' varchar(255) NOT NULL, 
  `title` varchar(255) NOT NULL,
  'prix' varchar(255) NOT NULL,
  'kilometres' varchar(255) NOT NULL,
  'annee' DATE
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;


INSERT INTO vehicules('id', 'marque', 'title', 'prix', 'kilometres', 'annee', 'descriptiF','image') VALUES
(1,1,'audi','A6sline', '21000', '175000','2019','berline, boite automatique, radar de recul gps, noir' 'voiture1.jpg' ),
(2,2,'Renault','clio', '10000', '190000','2014','citadine, boite manuelle, radar de recul, gps et regulateur de vitesse gris', 'voiture2.jpg'),
(3,4,'Mercedes','cabriolet', '32000', '188000','2019','Berline, boite automatique','radar de recul, gps','gris', 'voiture3.jpg'),
(4,3,'Jeep', '4x4','19500', '110000', '2010', 'suv, boite manuelle, GPS noir', 'voitur.jpg'),
(5,1,'peugeot','307', '21000', '175000','2019','berline boite manuelle radar derecul gps bleu', NULL),
(6, 2, 'Article 6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, amet. Cum labore possimus ad vitae minima nesciunt commodi eos.', NULL),
(7, 4, 'Article 7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, amet. Cum labore possimus ad vitae minima nesciunt commodi eos.', NULL);




insert into horaires(id, jours, details) values('1', 'lundi à vendredi', '8h45 12h00 14h00 18h00');
insert into horaires(id, jours, details) values('2', 'samedi', '8h45 12h00 fermé');
insert into horaires(id, jours, details) values('3', 'dimanche', 'fermé');

CREATE TABLE IF NOT EXISTS `services`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    'descriptif' varchar(255) NOT NULL, 
    'prix' varchar(255) NOT NULL, 

)

INSERT INTO services(id, type, descriptif, prix) values
('1', 'entretien mecanique', 'vidange', '70'),
('2', 'carrosserie', 'reparation', '150'),
('3', 'entretien ', 'performances et securité', '100');







