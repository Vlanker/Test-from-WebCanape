<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $goods = goods_get($link, $_GET['good_id']);
    include("views/good.php");
?>