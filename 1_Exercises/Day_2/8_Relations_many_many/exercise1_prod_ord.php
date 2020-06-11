<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');

$sql = "SELECT `products`.`id` `product_id`,`products`.`name` `product_name`,`orders`.`description` `order_name` 
            FROM `products` 
            LEFT JOIN `products_orders` ON `products_orders`.`product_id`=`products`.`id`
            LEFT JOIN `orders` ON `orders`.`id`=`products_orders`.`order_id` 
            ORDER BY `product_id` ASC";
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
    <title>Exercise 1 - displaying products (orders)</title>
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
                $productId = 0;
                foreach ($result as $k=>$v){
                    if ($productId!= $v['product_id']){ ?>
                        <li class="list-group-item"><h3 style="color: blue"><?= $v['product_name'] ?></h3>
                        <?php
                        $productId = $v['product_id'];
                        $sql2 = "SELECT `products`.`id` `product_id`,`products`.`name` `product_name`,`orders`.`description` `order_name` 
                                   FROM `products` 
                                   LEFT JOIN `products_orders` ON `products_orders`.`product_id`=`products`.`id`
                                   LEFT JOIN `orders` ON `orders`.`id`=`products_orders`.`order_id` 
                                   WHERE `product_id`=$productId";

                        $stmt2 = $conn->query($sql2);
                        $productData = $stmt2->fetchAll(PDO::FETCH_ASSOC); ?>
                        <ul class="list-group">
                            <?php
                            foreach ($productData as $key=>$value){ ?>
                                <li class="list-group-item"><strong><?= $value['order_name'] ?></strong></li>
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
