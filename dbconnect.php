<?php
session_start(["use_strict_mode" => true]);
try {
    $conn = new PDO("mysql:host=localhost;dbname=myshop;charset=utf8mb4", 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Ошибка подключения к БД: " . $e->getMessage(), $e->getCode( );
    die();
}
?>