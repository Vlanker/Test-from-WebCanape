<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $g = $_GET['good_id'];
    $good = goods_get($link, $g);
    $gcats = gcategories_get($link, $g);
    include("views/good.php");
?>