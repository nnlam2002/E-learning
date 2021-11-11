<?php
    session_start();   
    if(isset($_SESSION['user_name'])){     
        $category_id = $_GET['category_id'];
        include_once('../../database/database.php');
        $query = 'DELETE FROM categories WHERE category_id = :category_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $statement->closeCursor();
        $message = "Xóa danh mục thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('refresh:0; URL=../master_page.php?page_layout=categories');
    }else{
        header('location:../index.php');
    }   
?>