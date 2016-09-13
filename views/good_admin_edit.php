<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тестовое задание от WebCanape</title>
</head>
<body>
<div class="container">
<h1>Панель администратора: добавление товара</h1>
<img src="/icons/back.gif" alt="[PARENTDIR]"> <a href="/catalog-site.ru/admin/index.php?goods">Назад</a><br /><br>
    <div>
        <form method="post" action="index.php?goods=true&action=<?=$_GET['action']&id=<?=$_GET['id']?>">
            <label>Название товара <br /><input type="text" name="goods_title" value="<?=$good['good']?>" class="form-item" autofocus required style="width: 1144px"> </label><br />
            <br><label>Короткое описание <br /><textarea class="form-item" name="goods_short_content" required style="height:100px; width: 1144px"><?=$good['goods_short_content']?></textarea>
                </label><br />
            <br><label>Полное описание <br><textarea class="form-item" name="goods_content" required style="height:255px; width: 1144px"><?=$good['goods_content']?></textarea>
                </label><br />
            <label>Активность товара <input type="checkbox" name="goods_active" values="<?=$good['goods_active'] == 1 ? 'on' : '' ?>" <?=$good['goods_active'] == 1 ? 'checked' : '' ?>>
            </label>

            <label>Количество товара: <input type="text" name="goods_number" value="" class="form-item" autofocus required style="width: 255px">
            </label>
            <label>Возможность заказа <input type="checkbox" name="goods_order" values="<?=$good['goods_order'] == 1 ? 'on' : '' ?>" <?=$good['goods_order'] == 1 ? 'checked' : '' ?> ></label><br />
            <br><input type="submit" value="Сохранить" class="btn" required>
        </form>      
    </div>
</div>
</body>
</html>