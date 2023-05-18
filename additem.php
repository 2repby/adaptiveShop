<?php
require('dbconnect.php');
var_dump($_POST);
for ($i = 0; $i < count($_FILES['picture']['tmp_name']); $i++) {
    $file = fopen($_FILES['picture']['tmp_name'][$i], 'r+');

    $target_dir = "uploads/";
    //получение расширения
    $ext = explode('.', $_FILES["picture"]["name"][$i]);
    $ext = $ext[count($ext) - 1];
    $filename = 'file' . rand(100000, 999999) . '.' . $ext;
//    echo $filename;
    move_uploaded_file($_FILES["picture"]["tmp_name"][$i], $target_dir . $filename);
    $img_urls = $img_urls . ", " . $filename;
}

foreach ($_POST['properties'] as $property){
    $properties = $properties.", ".$property;
        }
$properties = substr($properties, 2);

$img_urls = substr($img_urls, 2);

echo("INSERT INTO items (name, price, id_category, description, img_url) 
    VALUES ('" . $_POST['name'] . "'," . $_POST['price'] . "," . $_POST['category'] . ",'" . $_POST['description'] . "','" .$properties . "','" . $img_urls . "')");
$result = $conn->query("INSERT INTO items (name, price, id_category, description, properties, img_url) 
    VALUES ('" . $_POST['name'] . "'," . $_POST['price'] . "," . $_POST['category'] . ",'" . $_POST['description'] . "','" .$properties . "','" . $img_urls . "')");

header("Location: /?page=items&cat=".$_POST['category']);
die();
