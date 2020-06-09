<?php
$query1 = 'INSERT INTO Products SET id=0, name=product1, description=name, price=904';
$query1fixed = "INSERT INTO Products SET name='product1', description='name', price=904";

$query2 = 'INSERT INTO Clients VALUES("John", "Snow", 4, "Mr.")';
$query2fixed = "INSERT INTO `products`.`clients`(`name`, `surname`) VALUES ('John', 'Snow')";

$query3 = 'INSERT INTO Movies(id, rating, name) VALUES(null, "very good", "The Fast and the Furious")';
$query3fixed = "INSERT INTO `cinemas`.`Movies`(`name`, `description`) VALUES ('The Fast and the Furious', 'very good')";

$query4 = 'INSERT INTO Payments SET id=90 AND VALUES("cash", NOW())';
$query4fixed = "INSERT INTO `cinemas`.`Payments`(`type`, `date`) VALUES ('cash', NOW())";
