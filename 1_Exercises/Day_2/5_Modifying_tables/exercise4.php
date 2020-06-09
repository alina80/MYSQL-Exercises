<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - modifying table</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="exercise4_form.php" method="post" role="form">
                <div class="form-group">
                    <legend>Remove row</legend>
                    <div class="form-group">
                        <label for="">Table column</label>
                        <select name="tableColumn" id="tableColumn" class="form-control">
                            <option value=""> -- Select column --</option>
                            <option value="id">Movies.id</option>
                            <option value="name">Movies.name</option>
                            <option value="description">Movies.description</option>
                            <option value="rating">Movies.rating</option>
                        </select>
                    </div>
                    <button type="submit" value="remove" class="btn btn-danger">REMOVE</button>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="">Column name</label>
                        <input type="text" class="form-control" name="columnName" id="columnName"
                               placeholder="Column name...">
                    </div>
                    <div class="form-group">
                        <label for="">Column type</label>
                        <input type="text" class="form-control" name="columnType" id="columnType"
                               placeholder="Column type ex. varchar(30)...">
                    </div>
                    <button type="submit" value="add" class="btn btn-success">ADD</button>
                </div>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
