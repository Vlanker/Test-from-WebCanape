<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
    <h1>Панель администратора: список категорий</h1>
    <h3><a href="index.php?goods=true">[Список товаров]</a> 
        <a href="index.php?category_goods">[Связи категорий с товарами]</a> 
    </h3>
    <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru">Главная</a><br /><br />
    <a href="index.php?action=add">Добавить категорию</a>
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
        <?php foreach($categories as $c): ?>
        <tr>
            <td><?=$c['category_title']?></td>
            <td><?=$c['category_short_content']?></td>
            <td><?=$c['category_content']?></td>
            <td><?=$c['category_active'] !=0 ? 'Активна' : 'Не акативна'?></td>
            <td>
                <?php foreach($goods as $g): ?>
                    <?=$c['category_id'] == $g['category_id'] ?  '['.$g['goods_title'].($g['goods_active'] != 0 ? '(Актив.)]' : '(Не актив.)]') : ''?>

                        
                <?php endforeach; 
                ?> 
            </td>
            <td><a href="index.php?action=edit&id=<?=$c['category_id']?>">Редактировать</a></td>
            <td><a href="index.php?action=delete&id=<?=$c['category_id']?>">Удалить</a></td>
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