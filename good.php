<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $good = good_get($link, $_GET['id']);
    $categories = good_category_all($link);//и так
    include("views/good.php");
?>