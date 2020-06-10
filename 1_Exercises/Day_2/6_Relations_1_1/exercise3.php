<?php
//below, write a query for creating a table - remember about relation and adding an appropriate column
$queryCreateTable = 'CREATE TABLE `Payments`(
                        `id` INT(11) NOT NULL,
                        `type` VARCHAR (255),
                        `date` DATE,
                        `ticket_id` INT (11),
                        PRIMARY KEY (id),
                        FOREIGN KEY (id) REFERENCES `Tickets`(id)
                         )ENGINE=InnoDB';
