<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');
$hasErrors = false;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $showUser = isset($_GET['showUser']) ?
        $_GET['showUser'] : '';
    if (!is_numeric($showUser)){
        $errors[] = 'Incorrect showUser parameter';
    }
    if ($showUser < 0){
        $errors[] = 'Parameter showUser must be a positive number';
    }

    try {
        $sqlUser = "SELECT `id`,`name`,`email` FROM `users` WHERE `id`=:id";
        $stmt = $conn->prepare($sqlUser);
        $stmt->execute(['id'=>$showUser]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['id'] != ''){
            $message = $user['name'] . ' / ' . $user['email'];
        }else{
            $errors[] = 'User is not in the database';
        }

    }catch (PDOException $e){
        $errors[] = $e->getMessage();
    }
    if (!empty($errors)){
        $hasErrors = true;
        $message = 'Errors: ' . implode(',',$errors);
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
    <title>Exercise 3 - extracting user</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <form action="./exercise3.php?showUser=" method="get">
                <div class="form-group">
                    <legend>Select user id</legend>
                    <label>Enter id</label>
                    <input name="showUser" type="number">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div class="text-<?= $hasErrors ? 'danger' : 'success' ?>">
                <strong><?= $message ?></strong></div>
            </div>

        <div class="col-md-4"></div>
    </div>
</div>
</body>
</html>
