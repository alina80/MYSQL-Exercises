<?php
//Write the SQL query code in the variable below
$query = 'CREATE DATABASE `cinemas`';

//Below, create appropriate variables with data for the database
$host = 'localhost';
$db ='cinemas';
$user = 'root';
$password = 'coderslab';
$pass = true;
//Below, write code that connects to the database


try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
} catch (Exception $e) {
    $pass = false;
    echo $e->getMessage();
}

if($pass) {
    echo 'done';
}