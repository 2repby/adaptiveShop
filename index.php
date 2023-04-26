<?php
session_start(["use_strict_mode" => true]);
//$basket =[];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Адаптивность</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
</head>
<body>
<div class="container">
    <div class="header">

        <!--    <img src="uploads/file528900.png" width="120" height="120" alt="Logo"/>-->
        <div id="item1" class="menuitem col"><a href="index.php?page=items">Товары</a></div>
        <div id="item2" class="menuitem col">Категория2</div>
        <div id="item3" class="menuitem col">Категория3</div>
        <div id="item4" class="menuitem col"><a href="index.php?page=basket">Корзина</a></div>

    </div>


    <div class="main xxx">
        <div class="submenu">
            <div id="item1-1" class="submenuitem">Объект1</div>
            <div id="item1-2" class="submenuitem">Объект2</div>
            <div id="item1-3" class="submenuitem">Объект3</div>
        </div>
        <div class="content">
            <?php
            if ($_GET['page'] == 'items')
            {


            $result = $conn->query("SELECT items.id as ci, items.name, items.price, categories.name cn FROM items, categories WHERE items.id_category = categories.id");
            while ($row = $result->fetch()) {
                ?>


        <div class="post">
            <div class="item-prop">Код товара: <?=$row['ci']?></div>
            <div class="item-prop">Наименование: <?=$row['name']?> </div>
            <div class="item-prop">Цена: <?=$row['price']?></div>
            <div class="item-prop">Категория: <?=$row['cn']?></div>
            <div class="item-prop"><a href="add_to_basket.php?id=<?=$row['ci']?>">В корзину</a></div>

        </div>
                <?php
                        }
            }
            ?>
            <?
            if ($_GET['page'] == 'basket')
                require ('basket.php');
            ?>
        </div>
    </div>
</div>

</body>
</html>
