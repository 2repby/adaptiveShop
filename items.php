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