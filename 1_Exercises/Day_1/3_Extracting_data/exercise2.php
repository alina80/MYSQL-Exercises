<?php
//Below, create appropriate variables with data for the database
require_once '../2_Adding_data/conn.php';

//Below, write code that connects to the database
$conn = connect('cinemas');

//In the variable below, write code for an SQL query that will extract appropriate data
$query = 'SELECT * FROM Movies';
$result = $conn->query($query);
$hasRecords = $result->rowCount() > 0;
$avg = null;
$data = [];
if($hasRecords) {
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $sum = 0;
    foreach ($data as $k=>$v) {
        $sum += $v['rating'];
    }

    $avg = $sum/count($data);

    $query = $query . " WHERE rating > $avg";
    //$query = "SELECT * FROM movies WHERE rating > $avg";

    $result2 = $conn->query($query);

    $data = $result2->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Exercise 2 - displaying data from database</title>
</head>
<body>
<table border="1" cellpadding="5" style="border-collapse: collapse">
    <thead>
    <th>Name</th>
    <th>Description</th>
    <th>Rating</th>
    </thead>
    <tbody>
    <?php foreach ($data as $k=>$v){ ?>
        <tr>
            <td><?= $v['name']?></td>
            <td><?= strlen($v['description']) > 20 ? substr($v['description'],0,20)."..." : $v['description'] ?></td>
            <td><?= $v['rating']?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
