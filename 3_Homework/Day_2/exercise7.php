<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 7 - offer sum</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="offerList">
                <?php
                //<li>Title of offer 1</li>
                //<li>Title of offer 2</li>

                //generate a list of offer titles below
                ?>
            </ul>

            <?php
            //below, display a message with the sum of offers, only if the form was submitted
            ?>
            <form action="" method="post" role="form">
                <legend>Sum of offers</legend>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" id="price"
                           placeholder="Price...">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
    </div>
</div>
</body>
</html>
