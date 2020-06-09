<?php

$query1 = 'SELECT * FROM `users` WHERE name LIKE "%Julia%";';

$query2 = 'SELECT * FROM `users` ORDER BY email DESC LIMIT 5';

$query3 = 'SELECT * FROM `users` WHERE email LIKE "L%@yahoo.com";';

$query4 = 'SELECT * FROM `users` WHERE password = SHA2(name,salt)';

$query5 = 'SELECT id,title FROM `offers` WHERE price > 500000;';

$query6 = "SELECT id,price FROM `offers` WHERE price BETWEEN 2000 AND 400000 AND activation_token = '' ";

$query7 = 'SELECT title,price,phone FROM `offers` WHERE DATEDIFF(expire,NOW())>10 AND status = 1';

$query8 = 'SELECT * FROM `offers` WHERE price > 50000 AND description LIKE "%violent%" AND phone LIKE "%2%"';

$query9 = 'SELECT * FROM `offers` WHERE TIMESTAMP(promoted) = 0 AND price < 30000 AND title LIKE "%LLC" ';

$query10 = 'UPDATE `offers` SET price = price + 1000 WHERE id BETWEEN 20 AND 25';

$query11 = 'DELETE FROM `offers` WHERE DATEDIFF(NOW(),expire) > 3';

$query12 = 'DELETE FROM `offers` WHERE phone LIKE "+48%" AND status = 1 AND DATEDIFF(promoted_to,NOW())>0 AND DATEDIFF(expire,NOW())>0';

$query13 = 'UPDATE `offers` SET promoted_to = DATE_ADD(NOW(),INTERVAL 23 DAY),status = 1 WHERE SUBSTRING(phone,3,2) = "48" AND status = 0';

$query14 = 'SELECT * FROM `offers` WHERE price * 2 < 50000 AND promoted = 1';

$query15 = 'UPDATE `offers` SET description = REPLACE(description, "executed", "founded") WHERE description LIKE "%executed%" AND phone LIKE "%(%)%" AND price > 400000';

$query16 = 'SELECT COUNT(*) AS sum_active FROM `offers` WHERE DATEDIFF(expire,NOW()) > 0 AND status = 1';

$query17 = '';

$query18 = '';

$query19 = '';

$query20 = '';