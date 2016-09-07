<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $categories = category_get($link, $_GET['category_id']);
    include("views/category.php");
?>