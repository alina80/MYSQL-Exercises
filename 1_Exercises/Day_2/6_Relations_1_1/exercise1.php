<?php
//below, write queries adding a table to the database; remember about relation.
$tableAddQuery = "CREATE TABLE `products`.`ClientAddress` ( 
                    `client_id` INT(20) NOT NULL, 
                    `city` VARCHAR(60) NOT NULL , 
                    `street` VARCHAR(60) NOT NULL , 
                    `house_nr` VARCHAR(30) NOT NULL ,                  
                    PRIMARY KEY (`client_id`),
                    FOREIGN KEY (`client_id`) REFERENCES `Clients`(`id`)
                    ) ENGINE = InnoDB";

//below, write code for adding records to the database
$tableAddRow1 = "INSERT INTO `ClientAddress` (`client_id`, `city`, `street`, `house_nr`) VALUES (NULL, 'Bacau', 'Mihai Eminescu', '4')";
$tableAddRow2 = "INSERT INTO `ClientAddress` (`client_id`, `city`, `street`, `house_nr`) VALUES (NULL, 'Bacau', 'Republicii', '20')";
$tableAddRow3 = "INSERT INTO `ClientAddress` (`client_id`, `city`, `street`, `house_nr`) VALUES (NULL, 'Bucuresti', 'Tineretului', '13')";
$tableAddRow4 = "INSERT INTO `ClientAddress` (`client_id`, `city`, `street`, `house_nr`) VALUES (NULL, 'Brasov', 'Nicolae Balcescu', '10')";
$tableAddRow5 = "INSERT INTO `ClientAddress` (`client_id`, `city`, `street`, `house_nr`) VALUES (NULL, 'Iasi', 'Pacurari', '25')";
