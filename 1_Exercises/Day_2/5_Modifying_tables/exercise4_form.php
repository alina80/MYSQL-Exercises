<?php
//below, write code that will extract data from the form and perform an appropriate action
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');

$errors = [];
$hasErrors = false;
$table = $_GET['table'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['operation'] === 'add') {

        $columnName = isset($_POST['columnName']) && strlen(trim($_POST['columnName'])) > 0 ?
            $_POST['columnName'] : null;
        $columnType = isset($_POST['columnType']) && strlen(trim($_POST['columnType'])) > 3 ?
            $_POST['columnType'] : null;
        $errors = [];
        if (is_null($columnName)) {
            $errors[] = 'Name';
        }
        if (is_null($columnType)) {
            $errors[] = 'Type';
        }
        if (empty($errors)) {
            $sql = "ALTER TABLE `$table` ADD $columnName $columnType";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();

            if ($result) {
                $message = "Table $table was modified. Column $columnName was added.";
            } else {
                $errors[] = "Could not add column $columnName. This column already exist!";
                $hasErrors = true;
            }
        } else {
            $hasErrors = true;
        }
    }
    if ($_POST['operation'] === 'remove') {
        $tableColumn = isset($_POST['tableColumn']) && strlen(trim($_POST['tableColumn'])) > 0 ?
            $_POST['tableColumn'] : null;
        if (is_null($tableColumn)) {
            $errors[] = 'Column to delete was not selected';
            $hasErrors = true;
        }
        if (empty($errors)) {
            $sql = "ALTER TABLE `$table` DROP COLUMN $tableColumn";
            $stmt = $conn->prepare($sql);
            $result = $stmt->execute();
            if ($result) {
                $message = "Column $tableColumn was deleted from table $table";
            } else {
                $hasErrors = true;
            }
        }
    }
    if ($hasErrors) {
        $message = "Error! " . implode(',', $errors);
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
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-<?= $hasErrors ? 'danger' : 'success' ?>">
            <h3><?= $message ?></h3>
            <button class="btn btn-success"><a href="exercise4.php">Back</a></button>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    </div>
</div>
</body>

