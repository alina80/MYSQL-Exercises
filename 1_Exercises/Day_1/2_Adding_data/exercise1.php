<?php
//below, write queries that add records to the first table
$table1row1 = '';
$table1row2 = '';
$table1row3 = '';
$table1row4 = '';
$table1row5 = '';

//below, write queries that add records to the second table
$table2row1 = '';
$table2row2 = '';
$table2row3 = '';
$table2row4 = '';
$table2row5 = '';

//below, write queries that add records to the third table
$table3row1 = '';
$table3row2 = '';
$table3row3 = '';
$table3row4 = '';
$table3row5 = '';

//below, place code that will add the file that handles the form and saves data in the database
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - adding products to the database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="zadanie1_form.php" method="post" role="form">
                <legend>Add product</legend>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name...">
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                           placeholder="Description...">
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                           placeholder="Price...">
                </div>
                <button type="submit" class="btn btn-primary">Add product</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
