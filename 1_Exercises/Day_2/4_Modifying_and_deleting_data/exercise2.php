<?php
// Below, write code for handling the form

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - deleting film</title>
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
                <legend>Remove film</legend>
                <div class="form-group">
                    <label for="">Film</label>
                    <select name="movie" id="movie" class="form-control">
                        <option value=""> -- Select film --</option>
                        <?php
                        //add code here to generate option elements with films from the database
                        //value attribute should have the value of film id
                        //film name should be displayed in the option field on the page
                        ?>
                    </select>
                </div>
                <button type="submit" value="remove" class="btn btn-danger">Remove</button>
            </form>
        </div>

        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
    </div>
</div>
</body>
</html>
