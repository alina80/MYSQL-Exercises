<?php
//write SQL queries in the variables below
$query1 = "ALTER TABLE `Movies` ADD `watchCount` INT (10)";
$query2 = "ALTER TABLE `Movies` ADD `isTop` TINYINT DEFAULT 0";
$query3 = "UPDATE `Movies` SET `isTop`=1 WHERE `watchCount`> 100";
$query4 = "ALTER TABLE `Cinemas` ADD `openTime` TIME (0)";
$query5 = "ALTER TABLE `Cinemas` ADD `closeTime` TIME (0)";
