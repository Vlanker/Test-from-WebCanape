<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
<h1>Панель администратора: добавление категорий</h1>
<img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru/admin/">Назад</a><br />
    <div>
        <form method="post" action="index.php?action=<?=$_GET['action']?>&id=<?=$_GET['id']?>">
            <label>Название категории<br /><input type="text" name="category_title" value="<?=$category['category_title']?>" class="form-item" autofocus required style="width: 1144px"> </label><br />
            <br><label>Короткое описание<br /><textarea class="form-item" name="category_short_content"  required style="height:100px; width: 1144px"><?=$category['category_short_content']?></textarea></label><br />
            <br> <label>Полное описание<br><textarea class="form-item" name="category_content" required style="height:255px; width: 1144px"><?=$category['category_content'] ?></textarea></label><br />
            <label>Активность категории<input type="checkbox" name="category_active" values="<?=$category['category_active'] == 1 ? 'on' : ''?>" <?=$category['category_active'] == 1 ? 'checked' : ''?>></label><br />
            <br><input type="submit" value="Сохранить" class="btn" required>
        </form>        
    </div>
</div>
</body>
</html>