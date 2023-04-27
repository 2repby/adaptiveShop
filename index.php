<?php
    require ("dbconnect.php");
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
        <div id="item4" class="menuitem col"><a href="index.php?page=basket">Корзина</a></div>
        <div id="item2" class="menuitem col">Категория2</div>
        <div id="item3" class="menuitem col">
            <?php
            if (isset($_SESSION['username']))
            {
                echo ($_SESSION['username']).'  ';
                echo ("<a href='auth.php?logout=1'>Выйти</a>");
            }
            else echo ("<a href='index.php?page=login'>Войти в сиситему</a>");
            ?>


        </div>

    </div>


    <div class="main xxx">
        <div class="submenu">
            <div id="item1-1" class="submenuitem">Объект1</div>
            <div id="item1-2" class="submenuitem">Объект2</div>
            <div id="item1-3" class="submenuitem">Объект3</div>
        </div>
        <div class="content">
            <?
            require ("message.php");
            switch ($_GET['page']) {
                case 'items':
                    require ("items.php");
                    break;
                case 'basket':
                    require ('basket.php');
                    break;
                case 'login':
                    require ('login.php');
                    break;

            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</div>

</body>
</html>
