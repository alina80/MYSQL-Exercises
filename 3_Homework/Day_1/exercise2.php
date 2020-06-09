<?php
$createTableImagesQuery = "CREATE TABLE `homeworkDay1`.`images` ( 
                            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
                            `offer_id` INT UNSIGNED NOT NULL , 
                            `src` VARCHAR(100) NOT NULL , 
                            `dimension` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) 
                            ENGINE = InnoDB";

$createTableUsersCompaniesQuery = "CREATE TABLE `homeworkDay1`.`users_companies` (
                                   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
                                   `user_id` INT UNSIGNED NOT NULL , 
                                   `name` VARCHAR (30) NOT NULL , 
                                   `nip` INT NOT NULL , 
                                   `street` VARCHAR(50) NOT NULL , 
                                   `street_nr` MEDIUMINT NOT NULL , 
                                   `phone` VARCHAR(9) NOT NULL , 
                                   `post_code` VARCHAR(6) NOT NULL , 
                                   `capital` DECIMAL(7,2) NOT NULL , 
                                   `rate` DECIMAL(5,4) NOT NULL , 
                                   `created_at` DATE NOT NULL , 
                                   PRIMARY KEY (`id`), 
                                   UNIQUE (`user_id`)
                                   ) ENGINE = InnoDB";