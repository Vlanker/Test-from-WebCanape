<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
    <div class="container">
        <h1>Товар в подробностях</h1>
        <a href="admin">Панель Администратора</a>
        <div>
            <div>
                <h3><?=$good['goods_title']?></h3>
                <em>Короткое описание: <?=$good['goods_short_content']?></em>
                <p>Полное описание: <?=$good['goods_content']?></p>
                
                <p>Товар находится в следующих категориях:</p> 
                <?php 
                    foreach($gcats as $a): 
                        if (0 != $a['category_active']) { 
                ?> 
                <a href="goods.php?category_goods_id=<?=$a['category_id']?>"><?=$a['category_title']?></a>
                <?php   } 
                    endforeach;
                ?> 
                </a>    
            </div>
        </div>
        <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru/">Назад</a>
    </div>
</body>
</html>