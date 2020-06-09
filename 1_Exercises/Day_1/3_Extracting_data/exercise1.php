<?php
require_once '../2_Adding_data/conn.php';
//Below, create appropriate variables with data for the database

//Below, write code that connects to the database
$conn = connect('products');
//In the variable below, write code for an SQL query that will extract appropriate data
$query = "SELECT * FROM `products`";
$result = $conn->query($query);

$hasRecords = $result->rowCount() > 0;
$data = [];

if ($hasRecords){
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
}

//make a query to the database
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - displaying data from database</title>
</head>
<body>
<table border="1" cellpadding="10" style="border-collapse: collapse; padding: 35px">
    <thead>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    </thead>

    <tbody>
    <?php foreach ($data as $k=>$v){ ?>
        <tr>
            <td><?= $v['name'] ?></td>
            <td><?= strlen($v['description']) > 10 ? substr($v['description'], 0, 20) . "..." : $v['description'] ?></td>
            <td><?= $v['price'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>
