<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4 - wyświetlanie filmów dla danego kina</title>
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
                <div class="form-group">
                    <label for="">Cinema</label>
                    <select name="cinema" id="cinema" class="form-control">
                        <option value=""> -- Select cinema --</option>
                        <?php
                        //add code generating subsequent option elements with cinemas from the database
                        //value attribute should have the value of the cinema id
                        //cinema name should be displayed in the option field on the page
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">SHOW MOVIES</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
