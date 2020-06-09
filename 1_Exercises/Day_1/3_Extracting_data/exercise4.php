<?php
//Below, write code that connects to the database
require_once '../2_Adding_data/conn.php';
$data = [];
if(isset($_GET['action']) && in_array($_GET['action'],['Movies','Tickets','Cinemas','Payments'])) {
    $table = $_GET['action'];
    $conn = connect('cinemas');
    $sql = "SELECT * FROM `$table`";

    $result = $conn->query($sql);

    if($result->rowCount() > 0) {
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
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
                        case'Movies':
                            //generate appropriate links for all the records
                            foreach ($data as $k=>$v){ ?>
                                <li class="nav-item">
                                    <a href="./exercise5_table_info.php?action=Movies&id=<?= $v['id'] ?>" target="_blank"> <?= $v['name'] ?></a>
                                </li>
                            <?php }
                            break;
                        case'Cinemas':
                            foreach ($data as $k=>$v){ ?>
                                <li><a href="./exercise5_table_info.php?action=Cinemas&id=<?= $v['id'] ?>" target="_blank"> <?= $v['name'] ?></a></li>
                            <?php }
                            break;
                        case'Payments':
                            foreach ($data as $k=>$v){ ?>
                                <li><a href="./exercise5_table_info.php?action=Payments&id=<?= $v['id'] ?>" target="_blank"> <?= $v['type'] . " " . $v['date'] ?></a></li>
                            <?php }
                            break;
                        case'Tickets':
                            foreach ($data as $k=>$v){ ?>
                                <li><a href="./exercise5_table_info.php?action=Tickets&id=<?= $v['id'] ?>" target="_blank"> <?= $v['quantity'] . " x " . $v['price'] . " = " . ($v['quantity'] * $v['price']) . "USD" ?></a></li>
                            <?php }
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
