<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тестовое задание от WebCanape</title>
    </head>
    <body>
        <div class="container">
            <h1>Выберите категорию для вывода списка товара:</h1>
            <a href="admin">Панель Администратора</a>
            <div>
                <table>
                <tr>
                    <th>Категории</th>
                    <th></th>
                </tr>
               
                <?php 
                foreach($categories as $a): 
                     if (0 != $a['category_active']) { 
                ?> 
                <tr>
                    <th><a href="goods.php?category_goods_id=<?=$a['category_id']?>"> <?=$a['category_title']?></a></th>
                    <th><a href="category.php?category_id=<?=$a['category_id']?>" ><em>Подробнее о категории</em></a></th>
                </tr>
                <?php } 
                    endforeach;
                ?>   
                </table>  
            </div>
            <footer>
                Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
            </footer>
        </div>
    </body>
</html>