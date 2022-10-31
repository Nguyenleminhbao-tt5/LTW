<?php
require('../../config/config.php');
// insert
$category_id=$_POST['category_id'];
$category_name=str_replace('/','',$_POST['category_name']);
$category_amount=str_replace('/','',$_POST['category_amount']);


if(!empty($_POST['category_insert']))
{
    // value giá trị truyền vào ''
    
    $sql_insert="INSERT INTO category(category_id,category_name,category_amount) VALUES($category_id,'".$category_name."',$category_amount)";
    echo $sql_insert;
    mysqli_query($data,$sql_insert);
    header('Location:../../index.php?action=categoryM&query=insert');

}
else if (!empty($_POST['category_edit'])){ 
    $id=$_GET['id'];
    $sql_edit="UPDATE category SET category_id=$category_id,category_name='".$category_name."',category_amount=$category_amount WHERE category_id=$id";
    echo $sql_edit;
    mysqli_query($data,$sql_edit);
    header('Location:../../index.php?action=categoryM&query=insert');

}

else
{  
    $id=$_GET['id'];
    $sql_delete_category="DELETE FROM category WHERE category_id=$id";
    $sql_delete_product="DELETE FROM product WHERE product_id_cate=$id";
    mysqli_query($data,$sql_delete_product);
    mysqli_query($data,$sql_delete_category);
    
    header('Location:../../index.php?action=categoryM&query=insert');
  
}

?>