<?php
//below, write code that will handle submission of the form
//remember to check if the data were sent using an appropriate HTTP method
//remember to connect to the database
require_once './conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
        $_POST['name'] : null;
    $description = isset($_POST['description']) && strlen(trim($_POST['description'])) > 3 ?
        $_POST['description'] : null;
    $price = isset($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] > 0 ?
        $_POST['price'] : null;

    $errors = [];
    if (is_null($name)){
        $errors[] = 'invalid name';
    }
    if (is_null($description)){
        $errors[] = 'invalid description';
    }
    if (is_null($price)){
        $errors[] = 'invalid price';
    }

    if (!empty($errors)){
        foreach ($errors as $k=>$v){
            echo $errors[$k];
        }
    }else{

        $conn = connect('products');
        $sql = "INSERT INTO `products`.`products`(`name`,`description`,`price`) VALUES (:name, :description, :price);";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name'=>$name, 'description'=>$description, 'price'=>$price]);
        echo 'Product with ID=[' . $conn->lastInsertId() . '] was inserted';
    }
    $conn = null;
}