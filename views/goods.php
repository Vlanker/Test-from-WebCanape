<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тестовое задание от WebCanape</title>
    </head>
    <body>
        <div class="container">
            <h1>Товар</h1>
            <a href="admin">Панель Администратора</a>
            <div>
                <table>
                <tr>
                    <th>Товар</th>
                    <th>Наличие на складе:</th>
                    <th>Возможность заказа:</th>
                    <th></th>
                </tr>
                <?php
                    foreach($goods as $a): 
                        if (0 != $a['goods_active']){ ?>   
                <tr>
                    <th><?=$a['goods_title']?></th>
                    <th><?=$a['goods_number']?></th>
                    <th><?=$a['goods_order']==1?'Заказ возможен':'Заказ не возможен'?></th>
                    <th><a href="good.php?good_id=<?=$a['goods_id']?>">Подробней о товаре</a></th>
                </tr>
                <?php   } 
                    endforeach; ?>   
                </table>  
            
            </div>
            <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru/">Назад</a>
            <footer>
                Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a><a href="#">2</a><a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
            </footer>
        </div>
    </body>
</html>