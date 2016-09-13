<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    //$category = category_goods_all($link, $_GET['category']);
    $goods = category_goods_all($link, $_GET['category']);
    include("views/goods.php");
?>