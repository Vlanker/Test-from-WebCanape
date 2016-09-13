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
                <h3><?=$category['category_title']?></h3>
                <em>Короткое описание: <?=$category['category_short_content']?></em>
                <p><?=$category['category_content']?></p>
            </div>
        </div>
        <img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru/">Назад</a>
    </div>
</body>
</html>