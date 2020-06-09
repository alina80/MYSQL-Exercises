<?php
require_once './exercise1.php';
//In the variable below, write SQL query code that creates the first table
$queryCreateTable1 = 'CREATE TABLE `products`.`products` ( `id` INT NOT NULL AUTO_INCREMENT , 
                       `name` VARCHAR(255) NOT NULL , 
                       `description` VARCHAR(255) NOT NULL , 
                       `price` DECIMAL(10,2) NOT NULL , 
                       PRIMARY KEY (`id`))
                        ENGINE = InnoDB;';

//In the variable below, write SQL query code that creates the second table
$queryCreateTable2 = 'CREATE TABLE `products`.`orders` ( `id` INT NOT NULL AUTO_INCREMENT , 
                       `description` VARCHAR(255) NOT NULL , 
                       PRIMARY KEY (`id`)) 
                       ENGINE = InnoDB;';

//In the variable below, write SQL query code that creates the third table
$queryCreateTable3 = 'CREATE TABLE `products`.`clients` ( `id` INT NOT NULL AUTO_INCREMENT , 
                      `name` VARCHAR(255) NOT NULL , 
                      `surname` VARCHAR(255) NOT NULL , 
                      PRIMARY KEY (`id`)) ENGINE = InnoDB;';
if ($pass) {
    try {
        $stmt = $conn->query($queryCreateTable1);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    try {
        $stmt = $conn->query($queryCreateTable2);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    try {
        $stmt = $conn->query($queryCreateTable3);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    echo 'Finished creating tables';
}
