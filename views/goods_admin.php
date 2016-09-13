<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
    <h1>Панель администратора: список товаров</h1>
    <h3>
        <a href="/catalog-site.ru/admin/index.php">[Список категорий]</a>
        <a href="index.php?in=true">[Связи категорий с товарами]</a>
    </h3>
    <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru">Главная</a><br><br>
    <a href="index.php?goods=true&action=add">Добавить товар</a>
    <div>
        <table>
        <tr>
            <th>Название товара</th>
            <th>Короткое описание</th>
            <th>Полное описание</th>
            <th>Активность товара</th>
            <th>Количество товара</th>
            <th>Заказать</th>
            <th>Товар в категориях</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($goods as $a): ?>
        <tr>
            <td><?=$a['goods_title']?></td>
            <td><?=$a['goods_short_content']?></td>
            <td><?=$a['goods_content']?></td>
            <td><?=$a['goods_active'] != 0 ? 'Активен' : 'Не акативен'?></td>
            <td><?=$a['goods_number']?></td>
            <td><?=$a['goods_order'] != 0 ? 'Возможен' : 'Не возможен'?></td>
            <td>
                <?php foreach($categoties as $b): ?>
                    <?=$a['goods_id'] == $b['goods_id'] ?'['.$b['category_title'].($b['category_active']?'(Актив.)]':'(Не актив.)]'):''?>
                <?php endforeach; ?> 
            </td>
            <td><a href="index.php?goods=true&action=edit&id=<?=$a['goods_id']?>">Редактировать</a></td>
            <td><a href="index.php?goods=true&action=delete&id=<?=$a['goods_id']?>">Удалить</a></td>
        </tr> 
        <?php endforeach; ?>  
        </table>  
    </div><br /><br />
    <footer>
        Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
    </footer>
</div>
</body>
</html>