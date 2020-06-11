<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 2 - adding order</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="./exercise2_new_order.php" method="post" role="form">
                <div class="form-group">
                    <label for="">Order description:</label>
                    <input type="text" class="form-control" name="orderDescription" id="orderDescription"
                           placeholder="Order description...">
                </div>
                <div class="checkbox">
                    <?php
                    /*
                    Here, generate a list of all products that are in the database. Below you will find sample HTML code that displays a single product:
                    <label>
                        <input type="checkbox" name="products[]" value="12"> Product with id 12
                    </label>
                    */
                    ?>
                </div>
                <button type="submit" class="btn btn-success">ADD ORDER</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
