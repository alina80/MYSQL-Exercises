<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');

$sql = "SELECT `orders`.`id` `order_id`,`orders`.`description` `order_description`,`products`.`name` `product_name`,`products`.`price` `product_price` FROM `orders` 
          LEFT JOIN `products_orders` ON `orders`.`id`=`products_orders`.`order_id`
          LEFT JOIN `products` ON `products_orders`.`product_id`=`products`.`id`";
try {
    $stmt = $conn->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
    echo "Error: " . $e->getMessage();
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - displaying orders (products)</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <legend>List of orders</legend>
            <ul class="list-group">
                <?php
                $orderId = 0;
                foreach ($result as $k=>$v){
                    if ($orderId != $v['order_id']){ ?>
                        <li class="list-group-item"><h3 style="color: blue"><?= $v['order_description'] ?></h3>
                        <?php
                        $orderId = $v['order_id'];
                        $sql2 = "SELECT `orders`.`id` `order_id`,`orders`.`description` `order_description`,`products`.`name` `product_name`,`products`.`price` `product_price` FROM `orders` 
                       LEFT JOIN `products_orders` ON `orders`.`id`=`products_orders`.`order_id`
                       LEFT JOIN `products` ON `products_orders`.`product_id`=`products`.`id`
                       WHERE `order_id`=$orderId";

                        $stmt2 = $conn->query($sql2);
                        $orderData = $stmt2->fetchAll(PDO::FETCH_ASSOC); ?>
                        <ul class="list-group">
                            <?php
                            foreach ($orderData as $key=>$value){ ?>
                                <li class="list-group-item"><strong><?= $value['product_name'] ?></strong><span> <?= $value['product_price'] ?></span></li>
                            <?php }
                            ?>
                        </ul>
                    <?php }
                    ?>
                    </li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>

</body>
</html>
