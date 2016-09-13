<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $good = goods_get($link, $_GET['id']);
    $categories = categories_all($link);
    include("views/good.php");
?>