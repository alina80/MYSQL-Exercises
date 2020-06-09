<?php
//below, write the code that downloads data about a single cinema after you have submitted a GET request
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');

//save appropriate data from the database in the following variables, the form will be filled with them automatically
$id = '';
$name = '';
$address = '';
$errors = [];
$message = '';
$hasErrors = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = (isset($_GET['id']) && is_numeric($_GET['id'])) ?
        $_GET['id'] : null;

    if (is_null($id)) {
        $errors[] = 'id';
        $message = true;
    } else {

        $sql = "SELECT * FROM `Cinemas` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['id' => $id]);
        if ($result) {
            $message = "Cinema with id = $id was selected";
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            foreach ($data as $k => $v) {
                $$k = $v;
            }
        } else {
            $message = 'Fail';
            $hasErrors = true;
        }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = isset($_POST['cinemaId']) && is_numeric($_POST['cinemaId']) ?
        $_POST['cinemaId'] : null;
    $cinemaName = isset($_POST['cinemaName']) && strlen(trim($_POST['cinemaName'])) > 3 ?
        $_POST['cinemaName'] : null;
    $cinemaAddress = isset($_POST['cinemaAddress']) && strlen(trim($_POST['cinemaAddress'])) > 3 ?
        $_POST['cinemaAddress'] : null;

    if (is_null($id)){
        $errors[] = 'id';
    }
    if (is_null($cinemaName)){
        $errors[] = 'name';
    }
    if (is_null($cinemaAddress)){
        $errors[] = 'address';
    }

    if (empty($errors)){
        $sql = "UPDATE `Cinemas` SET `name`=:name, `address`=:address WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'id'=>$id,
            'name'=>$name,
            'address'=>$address
        ]);
        if($result){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $message = "Cinema with id = $id was succesfuly updated";
        }else{
            $message = 'Could not perform update';
            $hasErrors = true;
        }

    }else{
        $message = 'Fail ! ' . ' ERRORS ON FIELD: ' . implode(',', $errors);
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
    <title>Exercise 3 - editing cinema</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <span class="text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></span>

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="exercise3_getcinema.php" method="post" role="form">
                <legend>Edit cinema</legend>
                <div class="form-group">
                    <label for="">Cinema id</label>
                    <input type="text" class="form-control" readonly name="cinemaId" id="cinemaId" placeholder="Cinema id"
                           value="<?= $id ?>">
                </div>
                <div class="form-group">
                    <label for="">Cinema name</label>
                    <input type="text" class="form-control" name="cinemaName" id="cinemaName" placeholder="Cinema name"
                           value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="">Cinema address</label>
                    <input type="text" class="form-control" name="cinemaAddress" id="cinemaAddress"
                           placeholder="Cinema address"
                           value="<?= $address ?>">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
