<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$hasErrors = false;
$errors = [];
$sql2 = "SELECT * FROM `Cinemas` ORDER BY `name` ASC ";
try {
    $stmt = $conn->query($sql2);
    $cinemasList = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    $message = "Errors: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cinemaId = isset($_POST['cinema']) && is_numeric($_POST['cinema']) && $_POST['cinema'] > 0 ?
        $_POST['cinema'] : null;
    if (is_null($cinemaId)){
        $errors[] = 'select cinema';
    }

    $sqlCinema = "SELECT `name` FROM `Cinemas` WHERE `id`=:=id";
    try {
        $stmt = $conn->prepare($sqlCinema);
        $stmt->execute([
            'id'=>$cinemaId
        ]);
        $cinemaName = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        $errors[] = $e->getMessage();
    }

    $sql = "SELECT `Cinemas`.`id` `cinema_id`,`Cinemas`.`name` `cinema_name`,`Movies`.`name` `movie_name`FROM `Cinemas`
                LEFT JOIN `Screenings`ON `Cinemas`.`id`=`Screenings`.`cinema_id`
                LEFT JOIN `Movies`ON `Movies`.`id`=`Screenings`.`movie_id`
                WHERE `Cinemas`.`id`=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
            'id'=>$cinemaId
    ]);
    $moviesList = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Exercise 4 - displaying movies with screenings of the chosen cinema</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="./exercise4_show_movies_by_cinema.php" method="post" role="form">
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
                <button type="submit" class="btn btn-success">SHOW MOVIES</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-<?= $hasErrors ? 'danger' : 'success' ?>">
            <legend> List of movies that are currently playing at <strong><?= '" ' . $cinemaName['name'] . ' " :' ?></strong></legend>
            <?php
            if ($hasErrors){ ?>
                 <strong><?= $message ?></strong>
            <?php }else{
            ?>
            <ul class="list-group">
                <?php
                foreach ($moviesList as $k=>$v){ ?>
                    <li class="list-group-item"><?= $v['movie_name'] ?></li>
                <?php }
                ?>
            </ul>
            <?php } ?>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    </div>
</div>
</body>
</html>
