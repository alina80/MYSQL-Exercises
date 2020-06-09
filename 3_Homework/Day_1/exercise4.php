<?php
//include the file with database settings

//connect to the database -> table

//load user list

//calculate how many pages will the loaded users take

//check if GET parameter with the key page was passed; if not, set default value

//check if the parameter, if passed, contains correct value

//generate a table with records displayed on the chosen page

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - pagination</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="list-group userListPerPage">
                <!--<li class="list-group-item user">Name Surname <span class="badge">ID</span></li>-->
                <?php
                //here, generate li list according to the pattern above - remember not to change the html structure from the pattern
                ?>
            </ul>
            <ul class="pagination">
                <!--<li><a href="exercise4.php?page=4">4</a></li>-->
                <?php
                //here, generate list of links to subsequent subpages according to the pattern above - remember not to change the html structure from the pattern
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>
</body>
</html>
