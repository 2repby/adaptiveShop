<?php
    session_start(["use_strict_mode" => true]);

    if(!$_SESSION['basket']) $_SESSION['basket'] = [];
    if (!in_array($_GET['id'], array_keys($_SESSION['basket'])))
    {
        $_SESSION['basket'][$_GET['id']] = 1;
//        array_push($_SESSION['basket'], $_GET['id'] => '1');
    }
    else{
        $_SESSION['basket'][$_GET['id']] += 1;
    }
    header("Location: index.php?page=basket");
    die();
