<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$sql1 = "SELECT * FROM `Cinemas` ORDER BY `name` ASC ";
try {
    $stmt = $conn->query($sql1);
    $cinemasList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    $message = "Error: " . $e->getMessage();
}
$sql2 = "SELECT * FROM `Movies` ORDER BY `name` ASC ";
try {
    $stmt = $conn->query($sql2);
    $moviesList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    $message = "Errors: " . $e->getMessage();
}

$hasErrors = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cinemaId = isset($_POST['cinema']) && is_numeric($_POST['cinema']) && $_POST['cinema'] > 0 ?
        $_POST['cinema'] : null;
    $moviesId = isset($_POST['movie']) && is_numeric($_POST['movie']) && $_POST['movie'] > 0 ?
        $_POST['movie'] : null;
    if (is_null($cinemaId)){
        $errors[] = 'cinema not set';
    }
    if (is_null($moviesId)){
        $errors[] = 'movie not set';
    }
    if (empty($errors)){
        $sql3 = "INSERT INTO `Screenings` (`cinema_id`,`movie_id`) VALUES (:cinema_id,:movie_id)";
        try {
            $stmt = $conn->prepare($sql3);
            $stmt->execute([
                    'cinema_id'=>$cinemaId,
                    'movie_id'=>$moviesId
            ]);
            $message = 'Screening with id= ' . $conn->lastInsertId() . ' was added';
        }catch (PDOException $e){
            $message = 'Errors: ' . $e->getMessage();
        }
    }else{
        $hasErrors = true;
        $message = 'Errors on fields: ' . implode(',',$errors);
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
    <title>Exercise 3 - adding movie screening</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="./exercise3_new_screening.php" method="post" role="form">
                <div class="form-group">
                    <label for="">Cinema</label>
                    <select name="cinema" id="cinema" class="form-control">
                        <option value=""> -- Select cinema --</option>
                        <?php
                        foreach ($cinemasList as $k=>$v){ ?>
                            <option value="<?= $v['id'] ?>"> <?= $v['name'] ?> </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Movie</label>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select movie --</option>
                        <?php
                        foreach ($moviesList as $k=>$v){ ?>
                            <option value="<?= $v['id'] ?>"> <?= $v['name'] ?> </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">ADD SCREENING</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?>

        </div>
    </div>
</div>
</body>
</html>
