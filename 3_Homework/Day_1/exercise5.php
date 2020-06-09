<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');
$date = [];
$sql="SELECT SUBSTRING_INDEX(email,'@',-1) FROM `users`";
$stmt =$conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$date = $result;

$domains = [];
$domains = array_unique($date,SORT_REGULAR);
$list = [];
foreach ($domains as $arr){
    foreach ($arr as $k=>$v){
        $list[] = $v;
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
            <form action="./exercise5.php" method="post" role="form">
                <legend>Users in a domain</legend>

                <div class="form-group">
                    <label for="domain">Domain</label>
                    <select name="domain" id="domain" class="form-control">
                        <option value=""> -- Choose domain --</option>
                        <?php
                        //generate remaining option elements using a loop in php
                        for ($i = 0; $i < count($list); $i++) { ?>
                            <option value="<?= $list[$i] ?>"><?= $list[$i] ?></option>

                        <?php }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Show</button>
            </form>
            <ul class="list-group userList">
                <!--<li class="list-group-item user">Name Surname (mail.of.user@domain.com)</li>-->
                <?php
                //here, generate li list according to the pattern above
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $emailDomain = isset($_POST['domain']) ?
                        $_POST['domain'] : null;
                    $sqlDomain = "SELECT name,email FROM `users` WHERE email LIKE '%$emailDomain'";
                    $stmt2 = $conn->prepare($sqlDomain);
                    $stmt2->execute();
                    $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result2 as $k=>$v) { ?>
                        <li class="list-group-item user"><?= $v['name'] ?><span class="badge"><?= $v['email'] ?></span></li>
                    <?php }
                }
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>

</body>
</html>
