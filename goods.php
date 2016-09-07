<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $goods = goods_all($link, $_GET['category_goods_id']);
    include("views/goods.php");
?>