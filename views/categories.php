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
                <?php 
                foreach($categories as $a): 
                    if (0 != $a['category_active']) { ?>
                        <h3>
                            <a href="goods.php?category_goods_id=<?=$category_goods['category_id']=$a['category_id']?>"> <?=$a['category_title']?></a> 
                            <a href="category.php?category_id=<?=$a['category_id']?>" ><em>Подробнее о категории</em></a> 
                        </h3>
                <?php }  
                endforeach; ?>
            </div>
            <footer>
                Страница: <a href="#">В начало</a>  <a href="#">-</a> <a href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">+</a> <a href="#">В конец</a>
            </footer>
        </div>
    </body>
</html>