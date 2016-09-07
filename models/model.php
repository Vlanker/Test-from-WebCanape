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

    function goods_all($link){
	   $query = "SELECT * FROM goods ORDER BY goods.goods_id ASC
";
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


    function articles_new($link, $title, $date, $content){
       /* $title = trim($title);
        $content = trim($content);
        //Проверка
        if($title == ""){
            return false;
        }
        $t = "INSERT INTO articles (title, date, content) VALUES ('%s', '%s','%s')";

        $query = sprintf($t, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $date),
                         mysqli_real_escape_string($link, $content));
       
        $result = mysqli_query($link, $query);

        if(!$result)
            die(mysqli_error($link));
        return true;*/
    }

    function article_edit($link, $id, $title, $date, $content){
       /* $title = trim($title);
        $id = trim($id);
        $date = trim($date);
        $content = trim($content);
        
        if($title == ""){
            return false;
        }
        $sql = "UPDATE articles SET title = '%s', content = '%s', date = '%s' WHERE articles.id = %d";
        
        $query = sprintf($sql, 
                         mysqli_real_escape_string($link, $title), 
                         mysqli_real_escape_string($link, $content),
                         mysqli_real_escape_string($link, $date),
                         $id);
                
        
        $result = mysqli_query($link, $query);

         if(!$result)
             die(mysqli_error($link));
        
        return mysqli_affected_rows($link);*/
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