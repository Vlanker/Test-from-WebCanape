<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
    <div class="container">
        <h1>Категории</h1>
        <div>
            <div>
                <h3><?=$categories['category_title']?></h3>
                <em>Короткое описание: <?=$categories['category_short_content']?></em>
                <p><?=$categories['category_content']?></p>
            </div>
        </div>
    </div>
</body>
</html>