<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 5 - loading data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="dbList">
                <?php
                //the call exercise6.php?table=users&column=email&value=sonia52@gajewski.pl&show=name
                //returns a list of values from the `name` column, as shown in the pattern below
                //<li>John Snow</li>
                //<li>Mike Mathison</li>

                //generate appropriate li elements below
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">

        </div>
    </div>
</div>
</body>
</html>
