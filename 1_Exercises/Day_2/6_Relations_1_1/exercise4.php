<?php
//here, add code for adding the code that handles the form
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - buying tickets</title>
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
                <legend>Buy ticket</legend>
                <div class="form-group">
                    <label for="">Ticket quantity</label>
                    <input type="number" class="form-control" name="ticketQuantity" id="ticketQuantity"
                           placeholder="Ticket quantity...">
                </div>
                <div class="form-group">
                    <label for="">Ticket price</label>
                    <input type="number" step="0.01" class="form-control" name="ticketPrice" id="ticketPrice"
                           placeholder="Ticket price...">
                </div>
                <div class="form-group">
                    <label for="">Payment type</label>
                    <select name="ticketType" id="ticketQuantity" class="form-control">
                        <option value=""> -- Select payment --</option>
                        <option value="card">Card</option>
                        <option value="cash">Cash</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">ADD</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
