CREATE TABLE `transport_route` (
  `id` int NOT NULL AUTO_INCREMENT,
  `route_id` int NOT NULL,
  `transport_type_id` int NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `transport_route_unique` (`route_id`,`transport_type_id`,`price`),
  KEY `transport_route_transport_type_FK` (`transport_type_id`),
  CONSTRAINT `transport_route_route_FK` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`),
  CONSTRAINT `transport_route_transport_type_FK` FOREIGN KEY (`transport_type_id`) REFERENCES `transport_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;