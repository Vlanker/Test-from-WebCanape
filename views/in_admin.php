<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
    <h1>Панель администратора: связи категорий и товаров</h1>
    <h3>
        <a href="/catalog-site.ru/admin/index.php">[Список категорий]</a>
        <a href="index.php?goods=true">[Список товаров]</a>
    </h3>
    <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru">Главная</a><br><br>
    <a href="index.php?in=true&action=add">Добавить всязь</a>
    <div>
    <?=var_dump($in)?>
        <table>
        <tr>
            <th>Название категории</th>
            <th>Список товаров</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($in as $i): ?>
        <tr>
            <td><?=$i['category_title']?><?=$i['category_active'] ? '(Актив.)' : '(Не актив.)'?></td>  
            <td>[<?=$i['goods_title']?><?=$i['goods_active'] ? '(Актив.)] ' : '(Не актив.)] '?></td>
            <td><a href="index.php?in=true&action=edit&id=<?=$i['category_id']?>">Редактировать</a></td>
            <td><a href="index.php?in=true&action=delete&id=<?=$i['category_id']?>">Удалить</a></td>
        </tr> 
        <?php endforeach; ?>  
        </table-->  
    </div><br /><br />
    <footer>
        Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
    </footer>
</div>
</body>
</html>