<?php
//In the variable below, write SQL query code that creates the first table
$queryCreateTable1 = 'CREATE TABLE `cinemas`.`Cinemas` ( 
                        `id` INT NOT NULL AUTO_INCREMENT , 
                        `name` VARCHAR(255) NOT NULL , 
                        `adress` VARCHAR(255) NOT NULL , 
                        PRIMARY KEY (`id`)) ENGINE = InnoDB';

//In the variable below, write SQL query code that creates the second table
$queryCreateTable2 = 'CREATE TABLE `cinemas`.`Movies` ( 
                        `id` INT NOT NULL AUTO_INCREMENT , 
                        `name` VARCHAR(255) NOT NULL , 
                        `description` VARCHAR(255) NOT NULL , 
                        `rating` DECIMAL (10,2),
                        PRIMARY KEY (`id`)) ENGINE = InnoDB';

//In the variable below, write SQL query code that creates the third table
$queryCreateTable3 = 'CREATE TABLE `cinemas`.`Tickets` ( 
                       `id` INT NOT NULL AUTO_INCREMENT , 
                       `quantity` INT NOT NULL , 
                       `price` DECIMAL (10,2) NOT NULL , 
                       PRIMARY KEY (`id`)) ENGINE = InnoDB';

//In the variable below, write SQL query code that creates the fourth table
$queryCreateTable4 = 'CREATE TABLE `cinemas`.`Payments` ( 
                       `id` INT NOT NULL AUTO_INCREMENT , 
                       `type` VARCHAR(255) NOT NULL , 
                       `date` DATE NOT NULL , 
                       PRIMARY KEY (`id`)) ENGINE = InnoDB';
if ($pass){
    try {
        $stmt = $conn->query($queryCreateTable1);
    }catch (Exception $e){
        echo $e->getMessage();
    }

    try {
        $stmt = $conn->query($queryCreateTable2);
    }catch (Exception $e){
        echo $e->getMessage();
    }

    try {
        $stmt = $conn->query($queryCreateTable3);
    }catch (Exception $e){
        echo $e->getMessage();
    }

    try {
        $stmt = $conn->query($queryCreateTable4);
    }catch (Exception $e){
        echo $e->getMessage();
    }
    echo 'Finshed creating tables';
}