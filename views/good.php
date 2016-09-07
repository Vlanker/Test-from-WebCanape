<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
    <div class="container">
        <h1>Товар</h1>
        <div>
            <div>
                <h3><?=$goods['goods_title']?></h3>
                <em>Короткое описание: <?=$goods['goods_short_content']?></em>
                <p><?=$goods['goods_content']?></p>
            </div>
        </div>
    </div>
</body>
</html>