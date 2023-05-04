<?php
    session_start(["use_strict_mode" => true]);
//    if(!$_SESSION['basket']) $_SESSION['basket'] = [];
    if (in_array($_GET['id'], array_keys($_SESSION['basket'])))
    {
        if ($_SESSION['basket'][$_GET['id']] > 1)
        {
            $_SESSION['basket'][$_GET['id']] -= 1;
        }
        else{
            unset($_SESSION['basket'][$_GET['id']]);
        }

    }
    header("Location: index.php?page=basket");
    die();
