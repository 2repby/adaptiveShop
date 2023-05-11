<?php
if ($_GET['page'] == 'items')
{


    $result = $conn->query("SELECT items.id as ci, items.name, items.price, categories.name cn, items.img_url imu FROM items, categories WHERE items.id_category = categories.id");
    while ($row = $result->fetch()) {
        ?>


        <div class="item">
            <div class="item-img"><img class="img" src="img/<?=$row['imu']?>"></div>
            <div class="item-name"><?=$row['name']?> </div>
            <div class="item-price"><?=$row['price']?></div>
            <div class="item-cat"><?=$row['cn']?></div>
            <div class="item-link"><a href="add_to_basket.php?id=<?=$row['ci']?>">В корзину</a></div>

        </div>
        <div class="item600">
            <div class="item-id"><?=$row['ci']?></div>
            <div class="item-name"><?=$row['name']?><br><i><?=$row['cn']?></i></div>
            <div class="item-price"><?=$row['price']?></div>

            <div class="item-link"><a href="add_to_basket.php?id=<?=$row['ci']?>">В корзину</a></div>

        </div>

        <?php
    }
}
?>