<?php
    require_once("database.php");
    require_once("models/model.php");    
    $link = db_connect();
    $category = category_get($link, $_GET['category']);
    include("views/category.php");
?>