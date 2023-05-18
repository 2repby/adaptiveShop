<?php
require('dbconnect.php');
//unset($_SESSION['message']);
if (isset($_POST['login'])){
    $result = $conn->query("SELECT * FROM users WHERE email = '".$_POST['login']."'");

    if ($row = $result->fetch())
    {
        if (MD5($_POST["password"]) == $row['password']){
            $_SESSION['username'] = $_POST['login'];
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['message'] = 'Вы успешно вошли в сиситему';
            header("Location: index.php");
            die();
        }
        else {
            $_SESSION['message'] = 'Вы ввели неправильный пароль!';
            header("Location: index.php?page=login");
            die();
        }

    }
    else {
        $_SESSION['message'] = 'Вы ввели неправильный логин!';
        header("Location: index.php?page=login");
        die();
    }

}

if ($_GET['logout'] == 1){
//    session_unset();
    unset($_SESSION['username']);
    $_SESSION['message'] = 'Вы успешно вышли из сиситемы';
    header("Location: index.php");
    die();
}

    header("Location: index.php?page=login");
    die();

