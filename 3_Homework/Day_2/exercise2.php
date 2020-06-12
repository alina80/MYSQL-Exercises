<?php
require_once '../../1_Exercises/Day_1/2_Adding_data/conn.php';
$conn = connect('homeworkDay1');
$hasErrors = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $userName = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
        $_POST['name'] : null;
    $userEmail = isset($_POST['email']) && strlen(trim($_POST['email'])) > 5 ?
        $_POST['email'] : null;
    if (is_null($userName)){
        $errors[] = 'Name';
    }
    if (is_null($userEmail)){
        $errors[] = 'Email';
    }

    $characterString = '0123456789abcdefghijklmnopqrstuvwxzABCDEFGHIJKLMNOPQRSTUVWXZ';
    $maxLength = strlen($characterString)-1;
    $salt = '';
    if (empty($errors)){
        for ($i = 0; $i < 6; $i ++){
            $salt .= substr($characterString,mt_rand(0,$maxLength),1);
        }

        $stringToHash = $userName . $salt;
        $userPassword = hash('sha256',$stringToHash);

        $sql = "INSERT INTO `users` (`name`,`email`,`password`,`salt`) VALUES (:name,:email,:password,:salt)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                    'name'=>$userName,
                    'email'=>$userEmail,
                    'password'=>$userPassword,
                    'salt'=>$salt
            ]);
            $message = 'User ' . $userName . ' was added';
        }catch (PDOException $e){
            $errors[] = $e->getMessage();
        }
    }else{
        $hasErrors = true;
        $message = 'Errors: ' . implode(',',$errors);
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
    <title>Exercise 2 - adding user</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <form action="./exercise2.php" method="post">
                   <legend>Add User</legend>

                   <div class="form-group">
                       <label for="inputName">Name</label>
                       <input type="text" class="form-control" name="name" id="inputName" placeholder="Name">
                   </div>

                   <div class="form-group">
                       <label for="inputEmail">Email address</label>
                       <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                   </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
               </form>
           </div>
           <div class="col-md-3"></div>

       </div>
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6 text-<?= $hasErrors ? 'danger' : 'success' ?>"><?= $message ?></div>
           <div class="col-md-3"></div>
       </div>
   </div>

</body>
</html>
