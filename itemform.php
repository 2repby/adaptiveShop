<?php

require "dbconnect.php";
$result = $conn->query("SELECT * FROM categories WHERE id=".$_GET['cat']);

?>
<h2>
    Добавление товара
</h2>
<form name="create_item" method="post" action="additem.php" enctype="multipart/form-data">
    <div>
        <label for="id1">Наименование товара:</label><br>
        <input name="name" id="id1" type="text" size="20" maxlength="40"
    </div>
    <br>
    Описание товара:<br>
    <input name="description" type="text" size="20" maxlength="40" value="Описание товара"><br>
    Тип товара:<br>
    <input type="radio" name="type" value="new" checked>Новые<br>
    <input type="radio" name="type" value="old">Б/у<br>
    <input type="radio" name="type" value="repaired">После ремонта<br>
    Характеристики:<br>
    <select name="properties[]" multiple>
        <?php
        $props = explode(', ', $result->fetch()['properties']);
        foreach ($props as $prop) {
        ?>
            <option value="<?= $prop?>" selected><?= $prop ?></option>
            <?php
            }
            ?>

    </select><br>

    Цена товара:<br>
    <input name="price" type="text" size="20" maxlength="40" value="1000"><br>

    Изображение товара:<br>
    <input type="file" name="picture[]" multiple><br>
    <input type="hidden" name="category" value="<?=$_GET['cat']?>">
    <input type="submit" value="Добавить товар">
</form>
</body>
</html>