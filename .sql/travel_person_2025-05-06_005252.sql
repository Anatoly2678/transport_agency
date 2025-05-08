CREATE TABLE `person` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `application_id` bigint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `person_unique` (`first_name`,`last_name`,`application_id`),
  KEY `person_application_FK` (`application_id`),
  CONSTRAINT `person_application_FK` FOREIGN KEY (`application_id`) REFERENCES `application` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;