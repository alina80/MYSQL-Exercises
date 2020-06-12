<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $table = isset($_GET['table']) && in_array($_GET['table'],['users','images','offers','users_companies']) ?
        $_GET['table'] : null;
    $column = isset($_GET['column']) ?
        $_GET['column'] : null;
    $value = isset($_GET['value']) ?
        $_GET['value'] : null;
    $show = isset($_GET['show']) && $_GET['show'] === 'name' ?
        $_GET['show'] : null;

    $sql = "SELECT `$show` FROM `$table`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 5 - loading data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="list">
                <?php
                foreach ($users as $k=>$v){ ?>
                    <li class="list-item"><?= $v['name'] ?></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>
</body>
</html>
