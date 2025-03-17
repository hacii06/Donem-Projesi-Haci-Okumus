-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                8.4.3 - MySQL Community Server - GPL
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- phone_db için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `phone_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `phone_db`;

-- tablo yapısı dökülüyor phone_db.campaigns
CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone_id` int DEFAULT NULL,
  `discount` decimal(5,2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- phone_db.campaigns: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
DELETE FROM `campaigns`;
INSERT INTO `campaigns` (`id`, `phone_id`, `discount`, `start_date`, `end_date`) VALUES
	(1, 1, 10.00, '2025-03-01', '2025-03-31'),
	(2, 2, 15.00, '2025-03-01', '2025-04-01'),
	(3, 3, 20.00, '2025-03-17', '2025-04-17');

-- tablo yapısı dökülüyor phone_db.phones
CREATE TABLE IF NOT EXISTS `phones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `storage` int DEFAULT NULL,
  `ram` int DEFAULT NULL,
  `camera` varchar(20) DEFAULT NULL,
  `screen_size` decimal(3,1) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- phone_db.phones: ~23 rows (yaklaşık) tablosu için veriler indiriliyor
DELETE FROM `phones`;
INSERT INTO `phones` (`id`, `brand`, `model`, `price`, `storage`, `ram`, `camera`, `screen_size`, `os`, `image_url`) VALUES
	(1, 'Apple', 'iPhone 14', 75000.00, 128, 6, '12 MP', 6.1, 'iOS', '/images/iphone14.png'),
	(2, 'Samsung', 'Galaxy S23', 95000.00, 256, 8, '50 MP', 6.1, 'Android', '/images/galaxys23.jpg'),
	(3, 'Xiaomi', '14 Pro', 100000.00, 512, 12, '108 MP', 6.7, 'Android', '/images/xiaomi14pro.png'),
	(4, 'Xiaomi', 'Mi 11', 15000.00, 128, 8, '108 MP', 6.8, 'Android', '/images/mi11.png'),
	(5, 'Xiaomi', 'Redmi Note 10', 6000.00, 64, 4, '48 MP', 6.4, 'Android', '/images/redminote10.jpg'),
	(6, 'Xiaomi', 'Poco X3 Pro', 8000.00, 256, 8, '48 MP', 6.7, 'Android', '/images/pocox3pro.png'),
	(7, 'Xiaomi', 'Mi Mix 4', 20000.00, 512, 12, '108 MP', 6.7, 'Android', '/images/mimix4.jpg'),
	(13, 'Apple', 'iPhone 14 Pro', 40000.00, 256, 6, '48 MP + 12 MP', 6.1, 'iOS', '/images/iphone14pro.jpg'),
	(14, 'Apple', 'iPhone 13', 25000.00, 128, 4, '12 MP + 12 MP', 6.1, 'iOS', '/images/iphone13.jpg'),
	(15, 'Apple', 'iPhone 12', 20000.00, 64, 4, '12 MP + 12 MP', 6.1, 'iOS', '/images/iphone12.png'),
	(16, 'Apple', 'iPhone SE (2022)', 15000.00, 64, 4, '12 MP', 4.7, 'iOS', '/images/iphonese2022.jpg'),
	(17, 'Samsung', 'Galaxy S24 Ultra', 45000.00, 256, 12, '200 MP + 12 MP', 6.8, 'Android', '/images/galaxys24ultra.jpg'),
	(18, 'Samsung', 'Galaxy A54 5G', 15000.00, 128, 6, '50 MP + 12 MP', 6.4, 'Android', '/images/samsunga54.png'),
	(19, 'Samsung', 'Galaxy Z Flip 5', 35000.00, 256, 8, '12 MP + 12 MP', 6.7, 'Android', '/images/galaxyzflip5.jpg'),
	(20, 'Samsung', 'Galaxy Note 20 Ultra', 25000.00, 256, 8, '64 MP + 12 MP', 6.7, 'Android', '/images/galaxynote20.png'),
	(21, 'Huawei', 'P60 Pro', 35000.00, 256, 8, '48 MP + 48 MP', 6.7, 'Android', '/images/huaweip60pro.jpg'),
	(22, 'Huawei', 'Mate 50 Pro', 30000.00, 256, 8, '50 MP + 12 MP', 6.7, 'Android', '/images/huaweimate50.png'),
	(23, 'Huawei', 'Nova 10', 18000.00, 128, 8, '50 MP + 8 MP', 6.7, 'Android', '/images/huaweinova10.png'),
	(24, 'Huawei', 'P40 Lite', 10000.00, 128, 6, '48 MP + 8 MP', 6.4, 'Android', '/images/huaweip40lite.png'),
	(25, 'Oppo', 'Find X6 Pro', 40000.00, 256, 12, '50 MP + 50 MP', 6.8, 'Android', '/images/oppofindx6pro.png'),
	(26, 'Oppo', 'Reno 10 Pro', 25000.00, 256, 12, '50 MP + 32 MP', 6.7, 'Android', '/images/opporeno10pro.jpg'),
	(27, 'Oppo', 'A78 5G', 12000.00, 128, 4, '50 MP + 2 MP', 6.6, 'Android', '/images/oppoa78.jpg'),
	(28, 'Oppo', 'Find N3 Flip', 35000.00, 256, 12, '50 MP + 48 MP', 6.8, 'Android', '/images/oppofindn3flip.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
