<?php
    require_once("database.php");
    require_once("models/model.php");
    $link = db_connect();
    $categories = categories_all($link);
    include("views/categories.php");
?>