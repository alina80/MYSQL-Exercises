<?php
//write SQL queries in the variables below
$query1 = "ALTER TABLE `Tickets` ADD `priceUSD` DECIMAL (10,2)";
$query2 = "ALTER TABLE `Movies` ADD `director` VARCHAR (80)";
$query3 = "ALTER TABLE `Movies` MODIFY COLUMN `director` VARCHAR (50)";
$query4 = "ALTER TABLE `Tickets` DROP COLUMN `priceUSD`";
