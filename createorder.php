<?php
    session_start(["use_strict_mode" => true]);
    require ("dbconnect.php");
    if(!$_SESSION['username']){
        header("Location: index.php?page=login");
        die();
    }
    $result = $conn->query("INSERT INTO purchase (id_user) VALUES (".$_SESSION['user_id'].")");

        $order_id =$conn->lastInsertId();


    var_dump($order_id);
    foreach (array_keys($_SESSION['basket']) as $item_id){
        echo ($item_id);
        echo ("INSERT INTO item_purchase (id_item, id_purchase, quantity) VALUES (".$item_id.",".$order_id.",".$_SESSION['basket'][$item_id].")");
        $result = $conn->query("INSERT INTO item_purchase (id_item, id_purchase, quantity) VALUES (".$item_id.",".$order_id.",".$_SESSION['basket'][$item_id].")");
    }
    $_SESSION['basket'] = [];
    header("Location: index.php?page=basket");
    die();
?>
