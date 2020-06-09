<?php

function connect(string $db)
{
    $host = 'localhost';
    $user = 'root';
    $password = 'coderslab';
    $pass = true;
    $conn = null;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8",
            $user, $password);
    } catch (Exception $e) {
        $pass = false;
        echo $e->getMessage();
    }

    if ($pass) {
        return $conn;
    }else{
        echo 'not connected to the database';
    }
    return null;
}