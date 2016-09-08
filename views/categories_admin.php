<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
    <h1>Панель администратора: список категорий</h1>
    <h3><a href="index.php?goods">[Список товаров]</a></h3>
    <a href="index.php?action=addc">Добавить статью</a>
    <div>
        <table>
        <tr>
            <th>Название категории</th>
            <th>Короткое описание</th>
            <th>Полное описание</th>
            <th>Активность категории</th>
            <th>Товары в категории</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($categories as $a): ?>
        <tr>
            <td><?=$a['category_title']?></td>
            <td><?=$a['category_short_content']?></td>
            <td><?=$a['category_content']?></td>
            <td><?=$a['category_active']!=0?'Активна':'Не акативна'?></td>
            <td>
                <?php foreach($cgoods as $b): ?>
                    <?=$a['category_id']==$b['category_id']?'['.$b['goods_title'].($b['goods_active']?'(Актив.)]':'(Не актив.)]'):''?>
                <?php endforeach; ?> 
            </td>
            <td><a href="index.php?action=edit&id=<?=$a['category_id']?>">Редактировать</a></td>
            <td><a href="index.php?action=delete&id=<?=$a['category_id']?>">Удалить</a></td>
        </tr> 
        <?php endforeach; ?>  
        </table>  
    </div>
    <footer>
        Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
    </footer>
</div>
</body>
</html>