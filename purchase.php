<?php
session_start(["use_strict_mode" => true]);
require("dbconnect.php");
if (!$_SESSION['username']) {
    header("Location: index.php?page=login");
    die();
}

$purchase = $conn->query("SELECT * FROM purchase WHERE id_user=" . $_SESSION['user_id']);
while ($row = $purchase->fetch()) {
    ?>
    <p>Заказ: <?= $row['id'] ?></p>
    <?php
    $total = 0;
    $purchase_items = $conn->query("SELECT ip.id ipid, i.name i_n, i.price ip, ip.quantity q, i.price * ip.quantity pr  
FROM items i, item_purchase ip WHERE i.id=ip.id_item AND ip.id_purchase=" . $row['id']);
    while ($row2 = $purchase_items->fetch()) {
        $total += $row2['pr'];
        ?>

        <div class="item">
            <div class="item-id"><?= $row2['ipid'] ?></div>
            <div class="item-name"><?= $row2['i_n'] ?> </div>
            <div class="item-price"><?= $row2['ip'] ?></div>
            <div class="item-cat"><?= $row2['q'] ?></div>
            <div class="item-cat"><?= $row2['pr'] ?></div>

        </div>
        <!--    <div class="item600">-->
        <!--        <div class="item-id">--><?//= $row['ci'] ?><!--</div>-->
        <!--        <div class="item-name">--><?//= $row['name'] ?><!--<br><i>--><?//= $row['cn'] ?><!--</i></div>-->
        <!--        <div class="item-price">--><?//= $row['price'] ?><!--</div>-->
        <!---->
        <!--        <div class="item-link"><a href="add_to_basket.php?id=--><?//= $row['ci'] ?><!--">В корзину</a></div>-->
        <!---->
        <!--    </div>-->

        <?php
    }
    if ($row['payd_at']) {
        echo('Оплачен ' . $row['payd_at']);
    } else {
        ?>
        <div class="button">
            <a href="process.php?id=<?= $row['id'] ?>">Оплатить <b><?=' '.$total.'</b> рублей'?></a>
        </div>
        <?php

    }
}
?>