<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');
$hasErrors = false;
$errors = [];
$sqlOffers = "SELECT `id`,`title` FROM `offers`";
$stmt = $conn->prepare($sqlOffers);
$stmt->execute();
$offersList = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $offerId = isset($_POST['offer']) && is_numeric($_POST['offer']) ?
        $_POST['offer'] : null;
    $imageName = isset($_POST['imageName']) && strlen(trim($_POST['imageName'])) > 3 ?
        $_POST['imageName'] : null;
    $src = "./" . $imageName;
    if (is_null($offerId)){
        $errors[] = 'Choose offer';
    }
    if (is_null($imageName)){
        $errors[] = 'Enter a valid name';
    }

    $dimension = '';
    $sqlImages = "INSERT INTO `images` (`offer_id`,`src`,`dimension`) VALUES (:offer_id,:src,:dimension)";
    if (empty($errors)){
        try {
            $stmt = $conn->prepare($sqlImages);
            $stmt->execute([
                'offer_id'=>$offerId,
                'src'=>$src,
                'dimension'=>$dimension
            ]);
        }catch (PDOException $e){
            $errors[] = $e->getMessage();
        }
        $message = 'Image was added to offer ID = '. $offerId;
    }else{
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
    <title>Exercise 4 - adding images to offers</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <form action="./exercise4.php" method="post">
                <div class="form-group">
                    <label for="offer">Select offer</label>
                    <select name="offer" class="form-control">
                        <option value="">-- Select offer --</option>
                        <?php
                        foreach ($offersList as $k=>$v){ ?>
                            <option value="<?= $v['id'] ?>"><?= $v['title'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Image name</label>
                    <input type="text" name="imageName" class="form-control">
                </div>

                <button type="submit" name="selectOffer" value="chosen" class="btn btn-primary">Select</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-4 text-<?= $hasErrors ? 'danger' : 'success' ?>">
                <strong><?= $message ?></strong>
            </div>
            <div class="col-md-4"></div>
        </div>
</div>

</body>
</html>
