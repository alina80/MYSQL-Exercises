<?php
$queryRelation = "CREATE TABLE `cinemas`.`Screenings` ( 
    `id` INT(11) NOT NULL AUTO_INCREMENT , 
    `cinema_id` INT NOT NULL , 
    `movie_id` INT NOT NULL , 
    PRIMARY KEY (`id`),
    FOREIGN KEY (`cinema_id`) REFERENCES `Cinemas`(`id`),
    FOREIGN KEY (`movie_id`) REFERENCES `Movies`(`id`)
    ON DELETE CASCADE
) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci;";