<?php
    session_start(["use_strict_mode" => true]);
    if(!$_SESSION['basket']) $_SESSION['basket'] = [];
    if (!in_array($_GET['id'], $_SESSION['basket']))
    {
        array_push($_SESSION['basket'], $_GET['id']);
    }
    header("Location: index.php?page=basket");
    die();
