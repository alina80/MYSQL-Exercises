<?php
//write SQL queries in the variables below
$query1 = "UPDATE `Cinemas` SET `address`='National Stadium' WHERE `name` LIKE '%z'";
$query2 = "DELETE FROM `Payments` WHERE DATEDIFF(`date`, NOW()) < 4";
$query3 = "UPDATE `Movies` SET `rating`=5.4 WHERE CHAR_LENGTH (`description`) > 40";
$query4 = "UPDATE `Tickets` SET `price`=(`price`*0.5) WHERE `quantity` > 10";
