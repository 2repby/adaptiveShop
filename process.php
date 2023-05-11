<?php
session_start(["use_strict_mode" => true]);
require ("dbconnect.php");
if(!$_SESSION['username']){
    header("Location: index.php?page=login");
    die();
}

$result = $conn->query("UPDATE purchase SET payd_at = NOW() WHERE id=".$_GET['id']);


header("Location: index.php?page=purchase");
die();
?>
