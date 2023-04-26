<?php
//var_dump($_SESSION['basket']);
//echo("SELECT items.id as ci, items.name, items.price FROM items WHERE items.id IN (" . implode(", ", $_SESSION['basket']) . ")");
if ($_SESSION['basket'] != []) {
    $result = $conn->query("SELECT items.id as ci, items.name, items.price FROM items WHERE items.id IN (" . implode(", ", $_SESSION['basket']) . ")");
    while ($row = $result->fetch()) {
        ?>


        <div class="post">
            <div class="item-prop">Код товара: <?= $row['ci'] ?></div>
            <div class="item-prop">Наименование: <?= $row['name'] ?> </div>
            <div class="item-prop">Цена: <?= $row['price'] ?></div>
            <div class="item-prop"><a href="del_from_basket.php?id=<?= $row['ci'] ?>">Убрать</a></div>

        </div>
        <?php
    }
}
else echo 'Корзина пуста...';
?>