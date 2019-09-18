



CREATE DATABASE ejercicio3;
use ejercicio3;

CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO `users` VALUES (1,'admin','cochecito123'),(2,'root','123cochecito');

CREATE USER 'ejercicio3'@'%' IDENTIFIED BY 'contrasenia';
GRANT SELECT ON ejercicio3.* To 'ejercicio3'@'%';
