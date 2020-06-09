<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');

$errors = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $table = isset($_GET['table']) && in_array($_GET['table'],['Movies', 'Cinemas', 'Payments','Tickets']) ?
        $_GET['table'] : null;
    if (!is_null($table)){
        if (!in_array($_GET['table'],['Movies', 'Cinemas', 'Payments','Tickets'])){
            $errors = "Table does not exist";
            echo $errors;
        }
        $sql2 = "SHOW COLUMNS FROM `$table`";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Exercise 4 - modifying table</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="exercise4.php" method="get">
                <legend>Select Table</legend>
                <div class="group-item">
                    <label>
                        <input type="radio" name="table" value="Movies"> Movies
                    </label>
                    <label>
                        <input type="radio" name="table" value="Cinemas"> Cinemas
                    </label>
                    <label>
                        <input type="radio" name="table" value="Payments"> Payments
                    </label>
                    <label>
                        <input type="radio" name="table" value="Tickets"> Tickets
                    </label>
                </div>
                <div class="group-item">
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </form>
            <form action="exercise4_form.php?table=<?= $table ?>" method="post" role="form">
                <div class="form-group">

                    <legend>Remove Column from <?= $table ?></legend>
                    <div class="form-group">
                        <label for="">Table column</label>
                        <select name="tableColumn" id="tableColumn" class="form-control">
                            <option value=""> -- Select column --</option>
                            <?php
                            foreach ($result2 as $k=>$v){ ?>
                                <option value="<?= $v['Field'] ?>"><?= $v['Field'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <button type="submit" value="remove" name="operation" class="btn btn-danger">REMOVE</button>
                </div>

                <legend>Add Column to <?= $table ?></legend>
                <div class="form-group">
                    <div class="form-group">
                        <label for="">Column name</label>
                        <input type="text" class="form-control" name="columnName" id="columnName"
                               placeholder="Column name...">
                    </div>
                    <div class="form-group">
                        <label for="">Column type</label>
                        <input type="text" class="form-control" name="columnType" id="columnType"
                               placeholder="Column type ex. varchar(30)...">
                    </div>
                    <button type="submit" value="add" name="operation" class="btn btn-success">ADD</button>
                </div>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
