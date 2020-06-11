<?php
//below, write code that will handle the form and save appropriate data in the database
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');
if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $category = isset($_POST['name']) && strlen(trim($_POST['name'])) > 0 ?
        $_POST['name'] : null;
    $sql = "INSERT INTO `Categories` (`name`) VALUES (:name)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name'=>$category
    ]);
    echo "Category with id = " . $conn->lastInsertId() . " was inserted";
}