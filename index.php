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
        <div id="item2" class="menuitem col"><a href="index.php?page=purchase">Заказы</a></div>
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
            <?php
            $result = $conn->query("SELECT * FROM categories");
            while ($row = $result->fetch()) {
            ?>


            <div id="item1-1" class="submenuitem"><a href='index.php?page=items&cat=<?=$row['id']?>'><?=$row['name']?></a></div>

            <?php
            }
            ?>
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
                case 'purchase':
                    require ('purchase.php');
                    break;
                case 'login':
                    require ('login.php');
                    break;
                case 'itemform':
                    require ('itemform.php');
                    break;

            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</div>

</body>
</html>
