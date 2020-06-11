<?php
//below, write code that will handle the form and save appropriate data in the database
require_once '../../Day_1/2_Adding_data/conn.php';
$conn = connect('products');
$hasErrors = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $subCategoryName = isset($_POST['name']) && strlen(trim($_POST['name'])) > 3 ?
        $_POST['name'] : null;
    $mainCategory = isset($_POST['mainCategory']) && $_POST['mainCategory'] > 0 ?
        $_POST['mainCategory'] : null;
    if (is_null($subCategoryName)){
        $errors[] = 'SubCategory name';
    }
    if (is_null($mainCategory)){
        $errors[] = 'Select MainCategory';
    }
    if (empty($errors)){
        $sql = "INSERT INTO `Categories_sub` (`main_id`,`name`) VALUES (:main_id, :name)";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'main_id'=>$mainCategory,
                'name'=>$subCategoryName
            ]);
            $message = "Subcategory " . $subCategoryName . " was added to main category with id = " . $mainCategory;
        }catch (PDOException $e){
            $message = "Error: " . $e->getMessage();
        }

    }else{
        $hasErrors = true;
        $message = "Errors: " . implode(',',$errors);
    }
    echo $message;

}