<?php
//Below, write code that connects to the database

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - extracting data from database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
            <a class="btn btn-warning" href="zadanie4_form.php" role="button">Home</a>
            <a class="btn btn-info" href="zadanie5.php?action=movies" role="button">Films</a>
            <a class="btn btn-info" href="zadanie5.php?action=cinemas" role="button">Cinemas</a>
            <a class="btn btn-info" href="zadanie5.php?action=payments" role="button">Payments</a>
            <a class="btn btn-info" href="zadanie5.php?action=tickets" role="button">Tickets</a>
        </div>
    </div>
    <div class="row">
        <?php
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case'movies':
                    //here, generate appropriate links for all records that return movies
                    break;
                case'cinemas':
                    //generate appropriate links here
                    break;
                case'payments':
                    //generate appropriate links here
                    break;
                case'tickets':
                    //generate appropriate links here
                    break;
            }
        }
        ?>
    </div>
</div>
</body>
</html>
