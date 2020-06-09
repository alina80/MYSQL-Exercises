<?php
//extract the name of the table and the id of the record you want to download from the GET parameter, and display the record's data below
require_once '../2_Adding_data/conn.php';
$data = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' &&
    isset($_GET['action']) &&
    isset($_GET['id']) &&
    is_numeric($_GET['id'])){

    $conn = connect('cinemas');
    $table = $_GET['action'];
    $id = $_GET['id'];
    if (in_array($table, ['Movies', 'Cinemas', 'Payments', 'Tickets'])){
        $sql = "SELECT * FROM `$table` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $data = $result;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - extracting data from database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
            <a class="btn btn-warning" href="./exercise4.php" role="button">Home</a>
            <a class="btn btn-info" href="./exercise4.php?action=Movies" role="button">Films</a>
            <a class="btn btn-info" href="./exercise4.php?action=Cinemas" role="button">Cinemas</a>
            <a class="btn btn-info" href="./exercise4.php?action=Payments" role="button">Payments</a>
            <a class="btn btn-info" href="./exercise4.php?action=Tickets" role="button">Tickets</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav justify-content-start">
                <?php
                if (isset($_GET['action'])){
                    switch ($_GET['action']){
                        case'Movies': ?>
                            <li class="nav-item">
                                <strong>Movie: </strong><span><?= $data['name'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Description: </strong><span><?= $data['description'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Rating: </strong><span><?= $data['rating'] ?></span>
                            </li>
                            <?php
                            break;
                        case'Cinemas': ?>
                            <li class="nav-item">
                                <strong>Cinema: </strong><span><?= $data['name'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Address: </strong><span><?= $data['address'] ?></span>
                            </li>
                            <?php
                            break;
                        case'Payments': ?>
                            <li class="nav-item">
                                <strong>Type: </strong><span><?= $data['type'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Date: </strong><span><?= $data['date'] ?></span>
                            </li>
                            <?php
                            break;
                        case'Tickets': ?>
                            <li class="nav-item">
                                <strong>Quantity: </strong><span><?= $data['quantity'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Price: </strong><span><?= $data['price'] ?></span>
                            </li>
                            <li class="nav-item">
                                <strong>Total: </strong><span><?= ($data['price'] * $data['quantity']) ?></span>
                            </li>
                            <?php
                            break;
                    }
                }

                ?>
            </ul>
        </div>

    </div>
</div>
</body>
</html>
