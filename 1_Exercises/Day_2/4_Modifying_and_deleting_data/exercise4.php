<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - deleting data</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="exercise4_remove.php" method="post" role="form">
                <legend>Remove row</legend>
                <div class="form-group">
                    <label for="">Table</label>
                    <select name="tableName" id="tableName" class="form-control">
                    	<option value=""> -- Select table -- </option>
                    	<option value="cinemas">Cinemas</option>
                    	<option value="movies">Movies</option>
                    	<option value="tickets">Tickets</option>
                    	<option value="payments">Payments</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Row ID</label>
                    <input type="number" class="form-control" name="rowId" id="rowId"
                           placeholder="Row ID...">
                </div>
                <button type="submit" class="btn btn-primary">Remove</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
