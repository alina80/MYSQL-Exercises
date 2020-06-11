<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');
$sql = "SELECT `products`.`id` , `products`.`name`, `Opinions`.`description` FROM `products` LEFT  JOIN `Opinions` ON `products`.`id`=`Opinions`.`product_id`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 1 - opinion and product list</title>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <legend>Product list</legend>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <ul>
                <li>
                <?php
                $lastId = 0;
                foreach ($result as $K=>$v) {
                    if ($lastId != $v['id']) {
                        $lastId = $v['id']; ?>

                </li>
                <li>
                    <strong><?= $v['name'] ?></strong><br>
                    <span><?= $v['description'] ?></span><br>


                    <?php   }else{ ?>
                        <span><?= $v['description'] ?></span><br>
                    <?php      }

                    }
                    ?>
                </li>

            </ul>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>


</body>
</html>
