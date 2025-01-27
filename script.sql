
-- Listage de la structure de la base pour quick_talk_2
CREATE DATABASE IF NOT EXISTS `quick_talk_2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `quick_talk_2`;

-- Listage de la structure de table quick_talk_2. conversation
CREATE TABLE IF NOT EXISTS `conversation` (
  `id_conversation` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_conversation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table quick_talk_2.conversation : ~0 rows (environ)
DELETE FROM `conversation`;

-- Listage de la structure de table quick_talk_2. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `id_conversation` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_conversation` (`id_conversation`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conversation`),
  CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user_` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table quick_talk_2.message : ~0 rows (environ)
DELETE FROM `message`;

-- Listage de la structure de table quick_talk_2. receive
CREATE TABLE IF NOT EXISTS `receive` (
  `id_user` int NOT NULL,
  `id_conversation` int NOT NULL,
  PRIMARY KEY (`id_user`,`id_conversation`),
  KEY `id_conversation` (`id_conversation`),
  CONSTRAINT `receive_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_` (`id_user`),
  CONSTRAINT `receive_ibfk_2` FOREIGN KEY (`id_conversation`) REFERENCES `conversation` (`id_conversation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table quick_talk_2.receive : ~0 rows (environ)
DELETE FROM `receive`;

-- Listage de la structure de table quick_talk_2. user_
CREATE TABLE IF NOT EXISTS `user_` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table quick_talk_2.user_ : ~0 rows (environ)
DELETE FROM `user_`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
