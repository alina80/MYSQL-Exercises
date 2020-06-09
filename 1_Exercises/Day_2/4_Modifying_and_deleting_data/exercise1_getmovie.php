<?php
//below, write code that downloads the data of a single film after you submit a GET request

//save appropriate data from the database in the following variables, the form will be filled with them automatically
$id = '';
$name = '';
$description = '';
$rating = '';

//below, write code for handling the form

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

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form">
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
