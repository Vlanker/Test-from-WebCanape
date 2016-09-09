<?php
    function categories_all($link){
        $query = "SELECT * FROM category ORDER BY category.category_id ASC";
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $categories = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $categories[] = $row;
        }
        return $categories;
    }

    function category_get($link, $id_category){
	    $query = sprintf("SELECT * FROM category WHERE category.category_id=%d", (int)$id_category);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $category = mysqli_fetch_assoc($result);
        
        return $category;
    }

    function goods_alls($link, $id_goods){
        $query = sprintf("SELECT category_goods.category_id, category_goods.goods_id, goods.goods_title, goods.goods_active, goods.goods_number, goods.goods_order, category.category_title
                        FROM category INNER JOIN (goods INNER JOIN category_goods ON goods.goods_id = category_goods.goods_id) ON category.category_id = category_goods.category_id
                        WHERE category_goods.category_id=%d", (int)$id_goods);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $goods = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $goods[] = $row;
        }
        return $goods;
    }
    
    function goods_get($link, $id_good){
        $query = sprintf("SELECT * FROM goods WHERE goods.goods_id=%d", (int)$id_good);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $good = mysqli_fetch_assoc($result);
        
        return $good;
    }
    
    function gcategories_get($link, $id_gcats){
        $query = sprintf("SELECT category.category_title, category.category_active, category.category_id
                        FROM category INNER JOIN category_goods ON category.category_id = category_goods.category_id
                        WHERE category_goods.goods_id=%d", (int)$id_gcats);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $gcats = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $gcats[] = $row;
        }
        return $gcats;
    }
    
    function cgoods_get($link){
        $query = "SELECT category_goods.category_id, goods.goods_title, goods.goods_active
                FROM goods INNER JOIN category_goods ON goods.goods_id = category_goods.goods_id";    
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $cgoods = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $cgoods[] = $row;
        }
        return $cgoods;
    }

    function category_new($link, $title, $short, $content, $active){
        $title = trim($title);
        $content = trim($content);
        //Проверка
        if($title == ""){
            return false;
        }
        
        $active == 'on'?$active='1':$active='0';
        
        $t = "INSERT INTO category (category_title, category_short_content, category_content, category_active) VALUES ('%s', '%s', '%s', '%s')";

        $query = sprintf($t, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active));
       
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
        return true;
    }

    function category_edit($link, $id, $title, $short, $content, $active){
        $id = trim($id);
        $title = trim($title);
        $short = trim($short);
        $content = trim($content);
        $active = trim($active);
        
        if($title == ""){
            return false;
        }
        $sql = "UPDATE category SET category_title = '%s', category_short_content = '%s', category_content = '%s', category_active = '%s' WHERE category.category_id = %d";
        
        $query = sprintf($sql, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active),
                         $id);
                
        
        $result = mysqli_query($link, $query);

         if(!$result)
             die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }

    function articles_delete($link, $id){
       /* $id = (int)$id;
        
        if($id == 0)
            return false;
        
        $query = sprintf("DELETE FROM articles WHERE articles.id = '%d'", $id);
        $result = mysqli_query($link, $query);
        
        if(!$result)
             die(mysqli_error($link));
        
        return mysqli_affected_rows($link);*/
    }
    
    function articles_intro($text, $len = 500){
        //return mb_substr($text, 0, $len);
    }

?>