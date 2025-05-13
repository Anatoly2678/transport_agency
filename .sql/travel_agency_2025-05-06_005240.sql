-- travel.agency определение

CREATE TABLE `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Create Time',
  `inn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniq_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_confirm` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '0-agent,1-manager,10-admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `agency_unique` (`inn`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO travel.agency (data_create, inn, name, email, phone, manager, uniq_id, is_confirm, disabled, password, `role`) VALUES('2025-05-09 00:26:57', '053320079694', 'Kennedy Tucker', 'kozuxidi@mailinator.com', '+77358988095', 'Dolor nihil est sed ', 'a4dd3d24-2c31-11f0-a7c7-00ffeb5773c7', 1, 0, '1', 0);
INSERT INTO travel.agency (data_create, inn, name, email, phone, manager, uniq_id, is_confirm, disabled, password, `role`) VALUES('2025-05-14 00:49:57', '000000000000', 'Admin', 'xalyqoc@mailinator.com', '+75177033518', 'Blanditiis voluptate', 'af2af865-3022-11f0-9fab-00ffeb5773c7', 1, 0, '11', 10);