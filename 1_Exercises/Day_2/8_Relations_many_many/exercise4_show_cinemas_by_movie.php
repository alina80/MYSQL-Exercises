<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$hasErrors = false;
$errors = [];
$sql2 = "SELECT * FROM `Movies` ORDER BY `name` ASC ";
try {
    $stmt = $conn->query($sql2);
    $moviesList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    $message = "Errors: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $movieId = isset($_POST['movie']) && is_numeric($_POST['movie']) && $_POST['movie'] > 0 ?
        $_POST['movie'] : null;
    if (is_null($movieId)){
        $errors[] = 'select movie';
    }

    $sqlMovie = "SELECT `name` FROM `Movies` WHERE `id`=:=id";
    try {
        $stmt = $conn->prepare($sqlMovie);
        $stmt->execute([
                'id'=>$movieId
        ]);
        $movieName = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        $errors[] = $e->getMessage();
    }


    $sql ="SELECT `Movies`.`id` `movie_id`,`Movies`.`name` `movie_name`,`Cinemas`.`name` `cinema_name` FROM `Movies`
           LEFT JOIN `Screenings`ON `Movies`.`id`=`Screenings`.`movie_id`
           LEFT JOIN `Cinemas`ON `Screenings`.`cinema_id`=`Cinemas`.`id`
           WHERE `movie_id`=:id";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
                'id'=>$movieId
        ]);
        $cinemasList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cinemasList as $k=>$v){
            if ($v['cinema_name'] == ''){
                $errors[] = 'Movie does not play in any cinema';
            }
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
    <title>Exercise 4 - displaying cinemas with screenings of the chosen film</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="./exercise4_show_cinemas_by_movie.php" method="post" role="form">
                <div class="form-group">
                    <legend for="movie">Movie</legend>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select movie --</option>
                        <?php
                        foreach ($moviesList as $k=>$v){ ?>
                            <option value="<?= $v['id'] ?>"> <?= $v['name'] ?> </option>
                        <?php }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">SHOW CINEMAS</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-<?= $hasErrors ? 'danger' : 'success' ?>">
            <legend> List of cinemas that are currently playing <strong><?= '" ' . $movieName['name'] . ' " :' ?></strong></legend>
            <?php
            if ($hasErrors){ ?>
                <strong><?= $message ?></strong>
            <?php }else{
            ?>
            <ul class="list-group">
                <?php
                foreach ($cinemasList as $k=>$v){ ?>
                    <li class="list-group-item"><?= $v['cinema_name'] ?></li>

                <?php }
                ?>

            </ul>
            <?php } ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
