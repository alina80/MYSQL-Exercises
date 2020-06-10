<?php
//here, add code for adding the code that handles the form
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $action = isset($_GET['action']) && in_array($_GET['action'],['all','card','cash','transfer']) ?
        $_GET['action'] : null;
    if ($action === 'all'){
        $sql = "SELECT * FROM `Payments`JOIN `Tickets` ON `Payments`.`ticket_id`=`Tickets`.`id`";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $sql = "SELECT * FROM `Payments`JOIN `Tickets` ON `Payments`.`ticket_id`=`Tickets`.`id` WHERE `type` = '$action'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Exercise 5 - displaying tickets</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top:30px;">
            <a class="btn btn-warning" href="./exercise5.php" role="button">Home</a>
            <a class="btn btn-info" href="./exercise5.php?action=all" role="button">All</a>
            <a class="btn btn-info" href="./exercise5.php?action=card" role="button">Card</a>
            <a class="btn btn-info" href="./exercise5.php?action=cash" role="button">Cash</a>
            <a class="btn btn-info" href="./exercise5.php?action=transfer" role="button">Transfer</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:30px;">
            <ul>
                <?php
                if (isset($action)){
                    switch ($action){
                        case 'all':
                            foreach ($result as $k=>$v){ ?>
                                <li><?= "Type: " . $v['type'] . " Date: " . $v['date'] . " Ticket id: " . $v['ticket_id'] . " Quantity: " . $v['quantity'] . " Price: " . $v['price'] ?></li>
                            <?php }
                            break;
                        case 'card':
                            foreach ($result as $k=>$v){ ?>
                                <li><?= "Type: " . $v['type'] . " Date: " . $v['date'] . " Ticket id: " . $v['ticket_id'] . " Quantity: " . $v['quantity'] . " Price: " . $v['price'] ?></li>
                            <?php }

                            break;
                        case 'cash':
                            foreach ($result as $k=>$v){ ?>
                                <li><?= "Type: " . $v['type'] . " Date: " . $v['date'] . " Ticket id: " . $v['ticket_id'] . " Quantity: " . $v['quantity'] . " Price: " . $v['price'] ?></li>
                            <?php }

                            break;
                        case 'transfer':
                            foreach ($result as $k=>$v){ ?>
                                <li><?= "Type: " . $v['type'] . " Date: " . $v['date'] . " Ticket id: " . $v['ticket_id'] . " Quantity: " . $v['quantity'] . " Price: " . $v['price'] ?></li>
                            <?php }

                            break;
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
