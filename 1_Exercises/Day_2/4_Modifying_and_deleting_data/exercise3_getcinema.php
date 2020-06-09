<?php
//below, write the code that downloads data about a single cinema after you have submitted a GET request

//save appropriate data from the database in the following variables, the form will be filled with them automatically
$id = '';
$name = '';
$address = '';

include('zadanie3_updatecinema.php');
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

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form">
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
