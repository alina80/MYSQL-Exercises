<?php
//below, write code that downloads the data of a single film after you submit a GET request
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
//save appropriate data from the database in the following variables, the form will be filled with them automatically
$id = '';
$name = '';
$description = '';
$rating = '';
$message = '';
$hasErrors = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = isset($_POST['movieId']) && is_numeric($_POST['movieId']) ?
        $_POST['movieId'] : null;
    $name = isset($_POST['movieName']) && strlen(trim($_POST['movieName'])) > 3 ?
        $_POST['movieName'] : null;
    $description = isset($_POST['movieDescription']) && strlen(trim($_POST['movieDescription'])) > 3 ?
        $_POST['movieDescription'] : null;
    $rating = isset($_POST['movieRating']) && is_numeric($_POST['movieRating']) ?
        $_POST['movieRating'] : null;

    $errors = [];
    if (is_null($id)){
        $errors[] = 'Id';
    }
    if (is_null($name)){
        $errors[] = 'Name';
    }
    if (is_null($description)){
        $errors[] = 'Description';
    }
    if (is_null($rating)){
        $errors[] = 'Rating';
    }

    if(empty($errors)){
        $sql = "UPDATE `Movies` SET `name`=:name, `description`=:description, `rating`=:rating WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
            'id'=>$id,
            'name'=>$name,
            'description'=>$description,
            'rating'=>$rating
        ]);
        if ($result){
            $message = 'Success';
        }else{
            $message = 'Fail';
            $hasErrors = true;
        }

    }else{
        $message = 'ERRORS ON FIELDS: ' . implode(',', $errors);
        $hasErrors = true;
    }
}elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM `Movies` WHERE `id`=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $movie = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($movie as $k=>$v){
        $$k = $v;
    }
}
print_r($data);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - editing film</title>
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
            <form action="./exercise1_getmovie.php" method="post" role="form">
                <legend>Editing a film</legend>
                <div class="form-group">
                    <label for="">Film id</label>
                    <input type="text" class="form-control" readonly name="movieId" id="movieId" placeholder="Film id"
                           value="<?= $id ?>">
                </div>
                <div class="form-group">
                    <label for="">Film name</label>
                    <input type="text" class="form-control" name="movieName" id="movieName" placeholder="Film name"
                           value="<?= $name ?>">
                </div>
                <div class="form-group">
                    <label for="">Film description</label>
                    <input type="text" class="form-control" name="movieDescription" id="movieDescription"
                           placeholder="Film description"
                           value="<?= $description ?>">
                </div>
                <div class="form-group">
                    <label for="">Rating</label>
                    <input type="number" step="0.01" class="form-control" name="movieRating" id="movieRating"
                           placeholder="Rating"
                           value="<?= $rating ?>">
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
