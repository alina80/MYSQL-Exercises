<?php
//below, write code that adds data to the table depending on which of the forms was submitted
//REMEMBER TO VALIDATE THE DATA THAT YOU SEND
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 3 - forms for adding records to the database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="" method="post" role="form" class="cinema_form">
                <legend>Add cinema</legend>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="255"
                           placeholder="Name...">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="255"
                           placeholder="Address...">
                </div>
                <button type="submit" name="submit" value="cinemas" class="btn btn-primary">Add</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="movie_form">
                <legend>Add film</legend>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" maxlength="255"
                           placeholder="Name...">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description" maxlength="255"
                           placeholder="Description...">
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" class="form-control" name="rating" id="rating" min="0" max="30" step="0.01"
                           placeholder="Rating...">
                </div>
                <button type="submit" name="submit" value="movies" class="btn btn-primary">Add</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="ticket_form">
                <legend>Add ticket</legend>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" min="0"
                           placeholder="Quantity...">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" name="price" id="price" min="0" step="0.01"
                           placeholder="Price...">
                </div>
                <button type="submit" name="submit" value="tickets" class="btn btn-primary">Add</button>
            </form>
            <hr>
            <form action="" method="post" role="form" class="payment_form">
                <legend>Add payment</legend>
                <div class="form-group">
                    <label for="type">Payment type</label>
                    <select name="type" id="type" class="form-control">
                        <option value=""> -- Choose type --</option>
                        <option value="transfer">Transfer</option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="date"
                           placeholder="Date...">
                </div>
                <button type="submit" name="submit" value="payments" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

        </div>
    </div>
</div>
</body>
</html>
