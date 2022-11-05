-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_estoque
CREATE DATABASE IF NOT EXISTS `db_estoque` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_estoque`;

-- Copiando estrutura para tabela db_estoque.movimentos
CREATE TABLE IF NOT EXISTS `movimentos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `id_produto` int unsigned NOT NULL DEFAULT '0',
  `quantidade` int NOT NULL DEFAULT '0',
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__prdutos` (`id_produto`),
  CONSTRAINT `FK__prdutos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_estoque.movimentos: ~2 rows (aproximadamente)
INSERT INTO `movimentos` (`id`, `id_produto`, `quantidade`, `data`) VALUES
	(1, 1, 3, '2022-10-08 11:10:49'),
	(2, 2, 3, '2022-10-08 11:10:49');

-- Copiando estrutura para tabela db_estoque.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '0',
  `quantidade` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_estoque.produtos: ~2 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `quantidade`) VALUES
	(1, 'Ryzen 5 2600', 3),
	(2, 'Placa Mae', 3);

-- Copiando estrutura para tabela db_estoque.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela db_estoque.usuarios: ~3 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
	(1, 'adm', 'b09c600fddc573f117449b3723f23d64'),
	(2, 'joao', 'dccd96c256bc7dd39bae41a405f25e43'),
	(3, 'carla', '1fa4a2211b4e290f2a066de6b84187ec');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
