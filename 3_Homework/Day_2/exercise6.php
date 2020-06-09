<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 6 - expiring offers</title>
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

                //below, generate the list of titles of offers that meet the conditions of this exercise
                ?>
            </ul>

            <form action="" method="post" role="form">
                <legend>Expiring offers</legend>
                <div class="form-group">
                    <label for=""></label>
                    <select name="daysToEnd" id="daysToEnd" class="form-control">
                        <option value=""> -- Choose --</option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="7">7</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Show</button>
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
    </div>
</div>

</body>
</html>
