<?php
//below, write code that adds data to the table depending on which of the forms was submitted
//REMEMBER TO VALIDATE THE DATA THAT YOU SEND
require_once './conn.php';
$message = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $db = 'cinemas';
    $conn = connect($db);
    $target = isset($_POST['submit']) ? $_POST['submit'] : null;

    if ($target === 'cinemas'){
        $name = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
            $_POST['name'] : null;
        $address = isset($_POST['address']) && strlen(trim($_POST['address'])) > 3 ?
            $_POST['address'] : null;

        if(is_null($name)){
            $errors[] = 'Invalid cinema name';
        }
        if(is_null($address)){
            $errors[] = 'Invalid cinema address';
        }

        if (!empty($errors)){
            foreach ($errors as $k=>$v){
                echo $errors[$k];
            }
        }else {
            $sql = "INSERT INTO `cinemas`.`Cinemas`(`name`, `address`)VALUES (:name,:address)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['name'=>$name, 'address'=>$address]);
            $message = 'Cinema with ID=[' . $conn->lastInsertId() . '] was inserted';
        }
    }elseif ($target == 'movies'){
        $name = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
            $_POST['name'] : null;
        $description = isset($_POST['description']) && strlen(trim($_POST['description'])) > 3 ?
            $_POST['description'] : null;
        $rating = isset($_POST['rating']) && is_numeric($_POST['rating']) && $_POST['rating'] > 0 ?
            $_POST['rating'] : null;

        $errors = [];
        if(is_null($name)){
            $errors[] = 'Invalid movie name';
        }
        if(is_null($description)){
            $errors[] = 'Invalid movie description';
        }
        if(is_null($rating)){
            $errors[] = 'Invalid movie rating';
        }

        if (!empty($errors)){
            foreach ($errors as $k=>$v){
                echo $errors[$k];
            }
        }else {
            $sql = "INSERT INTO `cinemas`.`Movies`(`name`, `description`, `rating`) VALUES (:name,:description,:rating );";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['name' => $name, 'description' => $description,'rating'=>$rating]);
            $message = 'Movie with ID=[' . $conn->lastInsertId() . '] was inserted';
        }

    }elseif ($target == 'tickets'){
        $quantity = isset($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] > 0 ?
            $_POST['quantity'] : null;
        $price = isset($_POST['price']) && is_numeric($_POST['price']) && $_POST['price'] > 0 ?
            $_POST['price'] : null;

        $errors = [];
        if(is_null($quantity)){
            $errors[] = 'Invalid quantity';
        }
        if(is_null($price)){
            $errors[] = 'Invalid price';
        }

        if (!empty($errors)){
            foreach ($errors as $k=>$v){
                echo $errors[$k];
            }
        }else{
            $sql = "INSERT INTO `cinemas`.`Tickets`(`quantity`, `price`) VALUES (:quantity,:price);";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['quantity'=>$quantity,'price'=>$price]);
            $message = 'Tickets with ID=[' . $conn->lastInsertId() . '] was inserted';
        }

    }elseif ($target == 'payments'){
        $type = isset($_POST['type']) && strlen(trim($_POST['type'])) ?
            $_POST['type'] : null;
        $date = isset($_POST['date']) ?
            $_POST['date'] : null;

        $tmp = explode('-',$date);

        if(is_null($date) || !checkdate((int)$tmp[2],(int)$tmp[1],(int)$tmp[0])) {
            $error[] = 'date not ok';
        } else {
            $obj = DateTime::createFromFormat('Y-m-d',$date);
            $date = date_format($obj,'Y-m-d');
        }

        $errors = [];
        if(is_null($type)){
            $errors[] = 'Invalid type';
        }
        if(is_null($date)){
            $errors[] = 'Invalid date';
        }


        if (!empty($errors)){
            foreach ($errors as $k=>$v){
                echo $errors[$k];
            }
        }else{
            $sql = "INSERT INTO `cinemas`.`Payments`(`type`, `date`) VALUES (:type,:date);";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['type'=>$type,'date'=>$date]);
            $message = 'Payment with ID=[' . $conn->lastInsertId() . '] was inserted';
        }

    }
}
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
            <form action="./exercise3_form.php" method="post" role="form" class="cinema_form">
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
            <form action="./exercise3_form.php" method="post" role="form" class="movie_form">
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
            <form action="./exercise3_form.php" method="post" role="form" class="ticket_form">
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
            <form action="./exercise3_form.php" method="post" role="form" class="payment_form">
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
