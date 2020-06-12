<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');
$hasErrors = false;
$errors = [];

$sql = "SELECT * FROM `offers`";
try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    $errors[] = $e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $expire = isset($_POST['daysToEnd']) && $_POST['daysToEnd'] > 0 && in_array($_POST['daysToEnd'],[1,3,7,30]) ?
        $_POST['daysToEnd'] : null;
    if (is_null($expire)){
        $errors[] = 'Expire days not set';
    }

    if (empty($errors)){
        try {
            $sql = "SELECT `title`,`expire` FROM `offers` WHERE DATEDIFF(`expire`,NOW()) > $expire";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            $errors[] = $e->getMessage();
        }
    }
    if (!empty($errors)){
        $hasErrors = true;
        $message = "Errors: " . implode(',',$errors);
    }else{
        $message = "Offers that expire in $expire days:";
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
    <title>Exercise 6 - expiring offers</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mt-5 text-<?= $hasErrors ? 'danger' : 'success' ?>">
            <?= $message ?>
            <ul class="list-group">
                <?php
                foreach ($offers as $k=> $v){ ?>
                    <li class="list-group-item"><?= $v['title'] ?></li>
                <?php }
                ?>
            </ul>

            <form action="./exercise6.php" method="post" role="form">
                <legend>Expiring offers</legend>
                <div class="form-group">
                    <label for=""></label>
                    <select name="daysToEnd" id="daysToEnd" class="form-control">
                        <option value=""> -- Choose --</option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Show</button>
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
    </div>
</div>

</body>
</html>
