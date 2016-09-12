<?php  
    require_once("../database.php");
    require_once("../models/model.php");

    $link = db_connect();

    if (isset($_GET['action'])){
        $action=$_GET['action'];
    } else{
        $action = "";
    }

    if (isset($_GET['goods'])){//goods
      if ($action == "add") {
        if(!empty($_POST)){            
            good_new($link,
                         $_POST['goods_title'],
                         $_POST['goods_short_content'],
                         $_POST['goods_content'],
                         $_POST['goods_active'],
                         $_POST['goods_number'],
                         $_POST['goods_order']);

            header("Location: index.php?goods");    
        }

        include ("../views/good_admin.php");

    }else{
      
      $goods = goods_all($link);
      $gcategoties = gcategories_get($link);
         
      include("../views/goods_admin.php");
    }
    } else if ($action == "add") {//categories

        if(!empty($_POST)){            
            category_new($link,
                         $_POST['category_title'],
                         $_POST['category_short_content'],
                         $_POST['category_content'],
                         $_POST['category_active']);

            header("Location: index.php");    
        }

        include ("../views/category_admin.php");

    } else if($action == "edit"){
        
        if(!isset($_GET['id'])){
            header("Location: index.php");    
        }

        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            category_edit($link,
                          $id,
                          $_POST['category_title'],
                          $_POST['category_short_content'],
                          $_POST['category_content'],
                          $_POST['category_active']);

            header("Location: index.php");    
        }

        $category = category_get($link, $id);

        include ("../views/category_admin_edit.php");

    } else if($action == "delete"){
        $id = $_GET['id'];

        $category = category_delete($link, $id);   

        header("Location: index.php");    
    } else{
        $categories = categories_all($link);
        $cgoods = cgoods_get($link);
         
        include("../views/categories_admin.php");
    }


    //goods
     

     /*if ($action == "add_g") {

        if(!empty($_POST)){            
            good_new($link,
                         $_POST['good_title'],
                         $_POST['category_short_content'],
                         $_POST['category_content'],
                         $_POST['category_active']);

            header("Location: index.php");    
        }

        include ("../views/category_admin.php");

    } else if($action == "edit"){
        
        if(!isset($_GET['id'])){
            header("Location: index.php");    
        }

        $id = (int)$_GET['id'];

        if(!empty($_POST) && $id > 0){
            category_edit($link,
                          $id,
                          $_POST['category_title'],
                          $_POST['category_short_content'],
                          $_POST['category_content'],
                          $_POST['category_active']);

            header("Location: index.php");    
        }

        $category = category_get($link, $id);

        include ("../views/category_admin_edit.php");

    } else if($action == "delete"){
        $id = $_GET['id'];

        $category = category_delete($link, $id);   

        header("Location: index.php");    
    } else{
        $goods = goods_all($link);
        $gcategoties = gcategories_get($link);
         
        include("../views/goods_admin.php");
    }*/
?>