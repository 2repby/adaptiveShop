<?php
    session_start(["use_strict_mode" => true]);
//    if(!$_SESSION['basket']) $_SESSION['basket'] = [];
    if (in_array($_GET['id'], $_SESSION['basket']))
    {
        unset($_SESSION['basket'][array_search($_GET['id'], $_SESSION['basket'])]);
    }
    header("Location: index.php?page=basket");
    die();
