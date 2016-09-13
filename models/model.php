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

        if(!$result)
            die(mysqli_error($link));
        
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
        
        if($id == 0)
            return false;
        
        $query = sprintf("DELETE FROM category WHERE category.category_id = '%d'", $id);
        $result = mysqli_query($link, $query);
        
        if(!$result)
             die(mysqli_error($link));
        
        return mysqli_affected_rows($link);
    }
    
    // function articles_intro($text, $len = 500){
    //     return mb_substr($text, 0, $len);
    // }
/********* end categories *********/

/********* categories - goods **********/
function gcategories_get($link){
        $query = sprintf("SELECT category_goods.goods_id, category.category_title, category.category_active
                          FROM category INNER JOIN category_goods ON category.category_id = category_goods.category_id");
        $result = mysqli_query($link, $query);
        
        if (!$result){
            die(mysqli_error($link));
        }
        
        $n = mysqli_num_rows($result);
        $gcategories = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $gcategories[] = $row;
        }
        return $gcategories;
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


    function goods_alls($link, $id_goods){
        $query = sprintf("SELECT category_goods.category_id, category_goods.goods_id, goods.goods_title, 
                                 goods.goods_active, goods.goods_number, goods.goods_order, category.category_title
                          FROM category INNER JOIN (goods INNER JOIN category_goods ON goods.goods_id = category_goods.goods_id) ON category.category_id = category_goods.category_id
                          WHERE category_goods.category_id = %d", (int)$id_goods);
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


/******** end categories - goods *******/



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


    function goods_get($link, $id){
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

        $sql = "INSERT INTO goods (goods_title, goods_short_content, goods_content, goods_active, goods_number, goods_order) 
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

    function good_edit($link, $id, $title, $short, $content, $active){
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