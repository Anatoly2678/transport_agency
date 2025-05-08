
CREATE TABLE `route` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_from` varchar(100) NOT NULL,
  `city_to` varchar(100) NOT NULL,
  `description_from` varchar(100) DEFAULT NULL,
  `description_to` varchar(100) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route_unique` (`city_from`,`city_to`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;