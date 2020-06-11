<?php
//below, write queries for creating appropriate tables
$queryAddCategories = "CREATE TABLE `products`.`Categories` ( 
                         `id` INT(11) NOT NULL AUTO_INCREMENT , 
                         `name` VARCHAR(60) NOT NULL , 
                         PRIMARY KEY (`id`)
                         ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;";

$queryAddCategoriesSub = "CREATE TABLE `products`.`Categories_sub` ( `id` INT(11) NOT NULL AUTO_INCREMENT , 
                                          `main_id` INT(11) NOT NULL , 
                                          `name` VARCHAR(60) NOT NULL , 
                                          PRIMARY KEY (`id`),
                                          FOREIGN KEY (`main_id`) REFERENCES `Categories`(`id`)
                                         ) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci";


