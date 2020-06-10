<?php
//here, add code for adding the code that handles the form
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$hasErrors = false;
$data = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $ticketQty = isset($_POST['ticketQuantity']) && is_numeric($_POST['ticketQuantity']) && $_POST['ticketQuantity'] > 0 ?
        $_POST['ticketQuantity'] : null;
    $ticketPrice = isset($_POST['ticketPrice']) && is_numeric($_POST['ticketPrice']) && $_POST['ticketPrice'] > 0 ?
        $_POST['ticketPrice'] : null;
    $type = isset($_POST['ticketType']) && strlen(trim($_POST['ticketType'])) > 0 ?
        $_POST['ticketType'] : null;

    $errors = [];
    if (is_null($ticketQty)){
        $errors[] = 'quantity';
    }
    if (is_null($ticketPrice)){
        $errors[] = 'price';
    }
    if (is_null($type)){
        $errors[] = 'type';
    }

    if (empty($errors)){
        $sql = "INSERT INTO `Tickets` (`quantity`,`price`) VALUES (:quantity, :price)";
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute([
                'quantity'=>$ticketQty,
                'price'=>$ticketPrice
        ]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $ticketId = $conn->lastInsertId();

        $sql2 = "INSERT INTO `Payments` (`type`,`date`,`ticket_id`) VALUES (:type, :date, :ticket_id)";
        $stmt2 = $conn->prepare($sql2);
        $result2 = $stmt2->execute([
                'type'=>$type,
                'date'=>date('Y-m-d',time()),
                'ticket_id'=>$ticketId
        ]);
        $message = 'Values were inserted!';
    }else{
        $message = "Error: " . implode(',',$errors);
        $hasErrors = true;
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
    <title>Exercise 4 - buying tickets</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <form action="./exercise4.php" method="post" role="form">
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
