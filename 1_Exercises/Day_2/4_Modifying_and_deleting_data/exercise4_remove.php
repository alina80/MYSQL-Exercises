<?php
//below, write code for extracting data from the form and deleting the record from appropriate table
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$hasErrors = false;
$message = '';
$data = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $table = isset($_POST['tableName']) && strlen(trim($_POST['tableName'])) > 0 ?
        $_POST['tableName'] : null;
    $id = isset($_POST['rowId']) && is_numeric($_POST['rowId']) && $_POST['rowId'] > 0 ?
        $_POST['rowId'] : null;

    $inputErrors = [];
    if (is_null($table)){
        $inputErrors[] = 'table';
    }
    if (is_null($id)){
        $inputErrors[] = 'id';
    }

    $outputErrors = [];
    if (empty($inputErrors)){
        $sql = "SELECT * FROM $table WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
        $result =$stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $data = $result;
        }else{
            $outputErrors[] = "Item with id = $id does not exist!";
        }
    }
    if (!empty($inputErrors)){
        $message = 'ERRORS ON FIELDS: ' . implode(',',$errors);
        $hasErrors = true;
    }
    if (!empty($outputErrors)){
        $message = "Item with id = $id does not exist!";
        $hasErrors = true;
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
    <title>Exercise 4 - deleting data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <form action="exercise4_isdeleted.php" method="post" role="form">
            <?php
            if ($hasErrors){ ?>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <h3>Incorrect data: </h3>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-danger">
                    <span> <?= $message ?></span>
                </div>

            <?php }elseif (!isset($_POST['toDelete'])){ ?>

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <legend>You have chosen to delete from <input class="group-item" name="table" value="<?= $table ?>">: </legend>
                <input name="id" value="<?= $id ?>">
                <ul class="list-group">
                    <?php
                    if (isset($_POST['tableName'])){
                        switch ($table){
                            case 'Movies': ?>
                                <li class="list-group-item"><?= $data['name'] ?></li>
                                <li class="list-group-item"><?= $data['description'] ?></li>
                                <li class="list-group-item"><?= $data['rating'] ?></li>
                                <?php break;
                            case 'Cinemas': ?>
                                <li class="list-group-item"><?= $data['name'] ?></li>
                                <li class="list-group-item"><?= $data['address'] ?></li>
                                <?php break;
                            case 'Payments': ?>
                                <li class="list-group-item"><?= $data['type'] ?></li>
                                <li class="list-group-item"><?= $data['date'] ?></li>
                                <?php break;
                            case 'Tickets': ?>
                                <li class="list-group-item"><?= $data['quantity'] ?></li>
                                <li class="list-group-item"><?= $data['price'] ?></li>
                                <?php break;
                        }
                    }
                    ?>

                </ul>

                <div class="group-item">
                    <label for="">Are you sure you want to delete? </label>
                </div>
                <div class="group-item">
                    <button type="submit" class="btn btn-danger" name="toDelete" value="yes">Yes</button>
                    <button type="submit" class="btn btn-success" name="toDelete" value="no">No</button>
                </div>

        </form>

    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

    </div>
    <?php }
    ?>


</div>
</body>
</html>

