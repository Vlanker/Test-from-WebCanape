<?php  
    require_once("../database.php");
    require_once("../models/model.php");

    $link = db_connect();
    
    
    

    if (isset($_GET['action'])){
        $action=$_GET['action'];
    }
    else{
        $action = "";
    }

    if ($action == "addc") {
        if(!empty($_POST)){
            $categories = categories_all($link);
            category_new($link, $_POST['category_title'], $_POST['category_short_content'], $_POST['category_content'], $_POST['category_active']);
            header("Location: index.php");    
        }
        include ("../views/category_admin.php");
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
        $categories = categories_all($link);
        $cgoods = cgoods_get($link);
         
        include("../views/categories_admin.php");
    }
    
?>