INSERT INTO transport_type (id, name, disabled, data_create) VALUES(44, 'Велосипед', 0, '2025-04-25 00:56:01')
,(45, 'Автобус', 0, '2025-04-25 00:56:07')
,(46, 'Лимузин', 0, '2025-04-25 00:56:16');

INSERT INTO route (id, city_from, city_to, description_from, description_to, disabled, data_create) 
VALUES(1, 'Толмачево', 'Кемерово', 'Сад яблок', '', 0, '2025-04-11 00:46:16')
,(2, 'Кемерово', 'Толмачево', '', 'Театр', 0, '2025-04-11 00:46:16')
,(15, 'Москва', 'Омск', 'Кремль', 'Наследие предков', 0, '2025-04-25 00:56:53');

INSERT INTO transport_route (id, route_id, transport_type_id, price, data_create, disabled) 
VALUES(25, 1, 44, 100, '2025-04-25 00:57:36', 0),(26, 2, 45, 300, '2025-04-25 00:57:55', 0)
,(27, 15, 46, 1000, '2025-04-25 00:58:07', 0)
,(28, 1, 45, 300, '2025-04-25 00:58:56', 0)
,(29, 2, 44, 100, '2025-04-25 00:59:08', 0);

INSERT INTO agency (data_create, inn, name, email, phone, manager, uniq_id, is_confirm, disabled, password) 
VALUES('2025-05-09 00:26:57', '053320079694', 'Kennedy Tucker', 'kozuxidi@mailinator.com', '+77358988095', 'Dolor nihil est sed ', 'a4dd3d24-2c31-11f0-a7c7-00ffeb5773c7', 1, 0, '1');