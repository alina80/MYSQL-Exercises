<?php
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('cinemas');
$data = [];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if ($_POST['toDelete'] === 'yes'){
        $table = isset($_POST['table']) && strlen(trim($_POST['table'])) > 0 ?
            $_POST['table'] : null;
        $id = isset($_POST['id']) && is_numeric($_POST['id']) && $_POST['id'] >0 ?
            $_POST['id'] : null;

        if (is_null($table)){
            $errors[] = 'table is null';
        }
        if (is_null($id)){
            $errors[] = 'id is null';
        }
        if (empty($errors)){
            $sql = "DELETE FROM $table WHERE `id`=:id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            echo "The item with id = $id from table $table was deleted<br>";
        }else{
            echo 'errors';
        }

    }
}

if ($_POST['toDelete'] === 'no'){
    echo 'Not done';
}
?>
<a href="./exercise4.php">Back</a>
