<?php  
  require_once("../database.php");
  require_once("../models/model.php");

  $link = db_connect();

  if (isset($_GET['action'])){
    $action = $_GET['action'];
  } else {
    $action = "";
  }

  if (isset($_GET['goods'])){
    $isGoods = $_GET['goods'];
  } else {
    $isGoods = "";
  }

  if (isset($_GET['in'])){
    $isIn = $_GET['in'];
  } else {
    $isIn = "";
  }

  /********** in ************/
  if (!$isGoods && $isIn && $action == "add"){
    if(!empty($_POST)){            
      good_new($link,
               $_POST['category_id'],
               $_POST['goods_id']);

      //header("Location: index.php?in=true");    
    }

    include ("../views/in_admin.php");
  }else if(!$isGoods && $isIn){
    $data = in_all($link);  
    $in = array();
    for($i=0; count($data); $i++){
       $in['category_title']
      for($j=0; count($data)-1; $j++){
        
      }  
    }


    include ("../views/in_admin.php");
  }

  /********** end in ********/

  /********* goods *********/
  if ($isGoods && !$isIn && $action == "add"){
    if(!empty($_POST)){            
      good_new($link,
               $_POST['goods_title'],
               $_POST['goods_short_content'],
               $_POST['goods_content'],
               $_POST['goods_active'],
               $_POST['goods_number'],
               $_POST['goods_order']);

      header("Location: index.php?goods=true");    
    }

  include ("../views/good_admin.php");
  } else if($isGoods && !$isIn && $action == "edit"){
    
    if(!isset($_GET['id'])){
        header("Location: index.php?goods=true");    
    }
    $id = (int)$_GET['id'];

    if(!empty($_POST) && $id > 0){
      good_edit($link,
                $id,
                $_POST['goods_title'],
                $_POST['goods_short_content'],
                $_POST['goods_content'],
                $_POST['goods_active'],
                $_POST['goods_number'],
                $_POST['goods_order']);

      header("Location: index.php?goods=true");    
    }
    $good = good_get($link, $id);

    include ("../views/good_admin_edit.php");
  } else if($isGoods && !$isIn && $action == "delete"){
    $id = $_GET['id'];

    $good = good_delete($link, $id);   

    header("Location: index.php?goods=true");    
  } else if($isGoods && !$isIn){
    $goods = goods_all($link);
    $categoties = good_categories_get($link);

    include ("../views/goods_admin.php");
  }

/*********** end goods **********/

/*********** categories *********/
  if (!$isGoods && !$isIn && $action == "add"){
    if(!empty($_POST)){            

      category_new($link,
                   $_POST['category_title'],
                   $_POST['category_short_content'],
                   $_POST['category_content'],
                   $_POST['category_active']);

      header("Location: index.php");    
    }

    include ("../views/category_admin.php");

  } else if(!$isGoods && !$isIn && $action == "edit"){
    
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

  } else if(!$isGoods && !$isIn && $action == "delete"){
    $id = $_GET['id'];

    $category = category_delete($link, $id);   

    header("Location: index.php");    
  } else if(!$isGoods && !$isIn){

    $categories = categories_all($link);
    $goods = category_goods_get($link);
     
    include("../views/categories_admin.php");
  }

/********* end categories *************/


?>