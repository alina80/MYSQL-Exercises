<?php
//download a list of film ids and titles
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');

$data = [];
$sql = "SELECT * FROM `Movies` ORDER BY name ASC";
$result = $conn->query($sql);

if ($result->rowCount() > 0){
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - data modification</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h3>List of films</h3>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <ul class="list-group">
                <?php
                //here, generate links passing film's id using GET, e.g:
                //<a href="exercise1_getmovie.php?id=34" target="_blank">film title</a>
                foreach ($data as $k=>$v){ ?>
                    <li class="list-group-item"><a href="./exercise1_getmovie.php?id=<?= $v['id'] ?>" target="_blank"><?= $v['name'] ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    </div>
</div>
</body>
</html>
