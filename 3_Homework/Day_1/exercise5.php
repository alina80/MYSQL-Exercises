<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 5 - users in a domain</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <!--Write the form below-->
            <form action="" method="post" role="form">
                <legend>Users in a domain</legend>

                <div class="form-group">
                    <label for="domain">Domain</label>
                    <select name="domain" id="domain" class="form-control">
                        <option value=""> -- Choose domain --</option>
                        <?php
                        //generate remaining option elements using a loop in php
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Show</button>
            </form>
            <ul class="list-group userList">
                <!--<li class="list-group-item user">Name Surname (mail.of.user@domain.com)</li>-->
                <?php
                //here, generate li list according to the pattern above
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>

</body>
</html>
