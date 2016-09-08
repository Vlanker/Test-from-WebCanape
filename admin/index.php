<?php  
    require_once("../database.php");
    require_once("../models/model.php");

    $link = db_connect();
    
    $categories = categories_all($link);
    $cgoods = cdoods_get($link);
    
    
    include("../views/categories_admin.php");
    
/*
    if (isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action = "";
    }

    if ($action == "add") {
        if(!empty($_POST)){
            articles_new($link, $_POST['title'], $_POST['date'], $_POST['content']);
            header("Location: index.php");    
        }
        include ("../views/article_admin.php");
    }
    else if($action == "edit"){
        if(!isset($_GET['id'])){
            header("Location: index.php");    
        }
        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            article_edit($link, $id, $_POST['title'], $_POST['date'], $_POST['content']);
            header("Location: index.php");    
        }

        $articles = articles_get($link, $id);   
        include ("../views/article_admin.php");
    }
    else if($action == "delete"){
        $id = $_GET['id'];
        $articles = articles_delete($link, $id);   
        header("Location: index.php");    
    }
    else{
        $articles = articles_all($link);
        include("../views/articles_admin.php");
    }*/
    
?>