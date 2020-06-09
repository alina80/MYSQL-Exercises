<?php
// Below, write code for handling the form
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$sql = "SELECT * FROM `Movies`";
$stmt = $conn->query($sql);

if ($stmt->rowCount() > 0){
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$message = '';
$hasErrors = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = isset($_POST['movie']) && is_numeric($_POST['movie']) ?
        $_POST['movie'] : null;

    $errors = [];
    if (is_null($id)){
        $errors[] = 'Movie';
        $hasErrors = true;
    }
    if (empty($errors)){
        $sql = "DELETE FROM `Movies` WHERE `id`=:id";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute(['id'=>$id]);

        if ($result){
            $message = "Success! Movie with id = $id was deleted";
        }else{
            $message = 'Fail';
        }
    }else{
        $message = "ERRORS ON FIELD: " . implode(',',$errors);
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
    <title>Exercise 1 - deleting film</title>
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
            <form action="./exercise2.php" method="post" role="form">
                <legend>Remove film</legend>
                <div class="form-group">
                    <label for="">Film</label>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select film --</option>
                        <?php
                        //add code here to generate option elements with films from the database
                        //value attribute should have the value of film id
                        //film name should be displayed in the option field on the page
                        foreach ($data as $K=>$v){ ?>
                            <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <button type="submit" value="remove" class="btn btn-danger">Remove</button>
            </form>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
</div>
</body>
</html>
