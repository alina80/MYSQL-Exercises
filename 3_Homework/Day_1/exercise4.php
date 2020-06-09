<?php
//include the file with database settings
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
//connect to the database -> table
$conn = connect('homeworkDay1');
//load user list
$data = [];
//calculate how many pages will the loaded users take

//check if GET parameter with the key page was passed; if not, set default value

//check if the parameter, if passed, contains correct value

//generate a table with records displayed on the chosen page

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercise 4 - pagination</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"><h3>List of users</h3></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <ul class="list-group userListPerPage">
                <li class="list-group-item user"><strong>Name Surname</strong> <span class="badge">ID</span></li>
                <?php
                //here, generate li list according to the pattern above - remember not to change the html structure from the pattern

                $sql = "SELECT name,id FROM `users` ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                if ($stmt->rowCount() > 0){
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $nrOfRows = $stmt->rowCount();

                if (isset($_GET['page'])){
                    if (is_numeric($_GET['page'])){
                        if ($_GET['page'] > 0){
                            if (isset($_GET['perPage']) &&
                                is_numeric($_GET['perPage']) &&
                                $_GET['perPage'] > 0 &&
                                $_GET['perPage'] <= $nrOfRows){
                                $page = $_GET['page'];
                                $perPage = $_GET['perPage'];

                                if ($nrOfRows % $perPage != 0){
                                    $nrOfPages = ($nrOfRows / $perPage) + 1;
                                }else{
                                    $nrOfPages = $nrOfRows / $perPage;
                                }
                                $limitStart = ($page - 1) * $perPage;
                                $sqlPage = $sql . " LIMIT $perPage OFFSET $limitStart";

                                $stmt = $conn->prepare($sqlPage);
                                $stmt->execute();
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $data = $result;
                            }else{
                                $perPage = 10;
                            }
                            foreach ($data as $k=>$v){ ?>
                                <li class="list-group-item user"><?= $v['name'] ?><span class="badge"><?= $v['id'] ?></span></li>
                            <?php }
                        }else{ ?>
                            <h4 style="color: red"><?= 'Page must be a positive number' ?></h4>
                            <?php
                        }
                    }else{ ?>
                        <h4 style="color: red"><?= 'Incorrect page value. Enter a number' ?></h4>
                        <?php
                    }

                }else { ?>
                    <h4 style="color: red"><?= 'Please set page!' ?></h4>
                    <?php
                }
                ?>
            </ul>
            <ul class="pagination">
                <!--<li><a href="exercise4.php?page=4">4</a></li>-->
                <?php
                //here, generate list of links to subsequent subpages according to the pattern above - remember not to change the html structure from the pattern
                for ($i = 1; $i <= $nrOfPages; $i ++ ){ ?>
                    <?php $page = $i; ?>
                    <li><a href="exercise4.php?page=<?= $page ?>&perPage=<?= $perPage ?>"> <?= $page ?> </a></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
</div>
</body>
</html>
