<?php
/********* categories *********/
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

    function category_get($link, $id){
	    
        $query = sprintf("SELECT * FROM category WHERE category.category_id = %d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $category = mysqli_fetch_assoc($result);
        
        return $category;
    }  

    function category_new($link, $title, $short, $content, $active){
        
        $title = trim($title);
        $short = trim($short);
        $content = trim($content);
        
        if($title == ""){
            return false;
        }
        
        $active == 'on' ? $active = '1' : $active = '0';
        
        $sql = "INSERT INTO category (category_title, category_short_content, category_content, category_active) 
                VALUES ('%s', '%s', '%s', '%s')";

        $query = sprintf($sql, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active));
       
        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }
        
        return true;
    }

    function category_edit($link, $id, $title, $short, $content, $active){
       
        $title = trim($title);
        $short = trim($short);
        $content = trim($content);
        
        if($title == ""){
            return false;
        }

        $active == 'on' ? $active = '1' : $active = '0';
        
        $sql = "UPDATE category SET category_title = '%s', category_short_content = '%s', category_content = '%s', category_active = '%s' 
                WHERE category.category_id = %d";
        
        $query = sprintf($sql,
                         mysqli_real_escape_string($link, $title),
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active),
                         $id);
        
        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }
        
        return mysqli_affected_rows($link);
    }

    function category_delete($link, $id){
       
        $id = (int)$id;
        
        if($id == 0){
            return false;
        }
        
        $query = sprintf("DELETE FROM category WHERE category.category_id = '%d'", $id);
        $result = mysqli_query($link, $query);
        
        if(!$result){
            die(mysqli_error($link));
        }
        
        return mysqli_affected_rows($link);
    }
    
    // function articles_intro($text, $len = 500){
    //     return mb_substr($text, 0, $len);
    // }
/********* end categories *********/

/********* category - goods **********/
    function category_goods_all($link, $id){
       
        $id = (int)$id;
        if($id == 0){
            return false;
        }

        $query = sprintf("SELECT category.category_id, category.category_title, goods.*
                          FROM goods INNER JOIN (category INNER JOIN category_goods ON category.category_id = category_goods.category_id) ON goods.goods_id = category_goods.goods_id
                          WHERE category.category_id = %d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if(!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $goods = array();
        
        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $goods[] = $row;
        }
        if (empty($goods)){
            return category_get($link, $id);
        }else{
            return $goods;
        }
    }

     function category_goods_get($link) {
        
        $query = "SELECT category.category_id, goods.*
                  FROM goods INNER JOIN (category INNER JOIN category_goods ON category.category_id = category_goods.category_id) ON goods.goods_id = category_goods.goods_id";
        $result = mysqli_query($link, $query);
        
        if(!$result){
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

    function good_categories_all($link, $id){
        
        $id = (int)$id;
        if($id == 0){
            return false;
        }

        $query = sprintf("SELECT category_goods.goods_id, category.category_id, category.category_title, category.category_active
                          FROM category INNER JOIN category_goods ON category.category_id = category_goods.category_id
                          WHERE category_goods.goods_id = %d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if(!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $goods = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $goods[] = $row;
        }
        if (empty($goods)){
            return good_get($link, $id);
        }else
            return $goods;
    }

    function good_categories_get($link){

        $query = "SELECT category_goods.goods_id, category.category_id, category.category_title, category.category_active
                  FROM category INNER JOIN category_goods ON category.category_id = category_goods.category_id";
                         
        $result = mysqli_query($link, $query);
        
        if(!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $categoties = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $categoties[] = $row;
        }
        
        return $categoties;
    }

/******** end category - goods *******/



/********* goods *********/

    function goods_all($link){
       
        $query = "SELECT * FROM goods ORDER BY goods.goods_id ASC";
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


    function good_get($link, $id){
       
        $query = sprintf("SELECT * FROM goods WHERE goods.goods_id = %d", (int)$id);
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $good = mysqli_fetch_assoc($result);
        
        return $good;
    }

    function good_new($link, $title, $short, $content, $active, $number, $order){
       
        $title = trim($title);
        $short = trim($short);
        $content = trim($content);
        $number = (int)($number);
        
        if($title == ""){
            return false;
        }
        
        $active == 'on' ? $active = '1' : $active = '0';
        $order == 'on' ? $order = '1' : $order = '0';

        $sql = "INSERT INTO goods (goods_title, goods_short_content, goods_content,
                                   goods_active, goods_number, goods_order) 
                VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";

        $query = sprintf($sql, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active),
                         mysqli_real_escape_string($link, $number),
                         mysqli_real_escape_string($link, $order));
       
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
        
        return true;
    }

    function good_edit($link, $id, $title, $short, $content, $active, $number, $order){
       
        $title = trim($title);
        $short = trim($short);
        $content = trim($content);
        $number = trim($number);
        
        if($title == ""){
            return false;
        }

        $active == 'on' ? $active = '1' : $active = '0';
        $order == 'on' ? $order = '1' : $order = '0';
        
        $sql = "UPDATE goods SET goods_title = '%s', goods_short_content = '%s', goods_content = '%s',
                                 goods_active = '%s', goods_number = '%s', goods_order = '%s'
                WHERE goods.goods_id = %d";
        
        $query = sprintf($sql,
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $short),
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $active),
                         mysqli_real_escape_string($link, $number),
                         mysqli_real_escape_string($link, $order),
                         $id);
        
        $result = mysqli_query($link, $query);

        if(!$result){
            die(mysqli_error($link));
        }
        
        return mysqli_affected_rows($link);
    }

    function good_delete($link, $id){
       
        $id = (int)$id;
        
        if($id == 0)
            return false;
        
        $query = sprintf("DELETE FROM goods WHERE goods.goods_id = '%d'", $id);
        $result = mysqli_query($link, $query);
        
        if(!$result)
             die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }

/*********end goods*********/


?>