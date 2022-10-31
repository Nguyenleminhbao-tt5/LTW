<?php
require('../../config/config.php');

// insert
$news_id=$_POST['news_id'];
$news_id_cate =str_replace('/','',$_POST['news_cate']);
$news_title=str_replace(' ','',$_POST['news_title']);
$news_content=str_replace(' ','',$_POST['news_content']);

$news_img=$_FILES['news_img']['name'];
$news_img_tmp=$_FILES['news_img']['tmp_name'];
$news_img=time().'_'.$news_img;

if(!empty($_POST['news_insert']))
{
     // dùng để lấy tên danh mục
    $sql_cate="SELECT category_name FROM category WHERE category_id=$news_id_cate LIMIT 1";
    $sql_query=mysqli_query($data,$sql_cate);
    while($row=mysqli_fetch_array($sql_query))
    {
        $news_cate=$row['category_name'];
    }

    $sql_insert="INSERT INTO news(news_id,news_title,news_cate,news_img,news_content,news_id_cate) 
    VALUES('".$news_id."','".$news_title."','".$news_cate."','".$news_img."','".$news_content."',$news_id_cate)";
    mysqli_query($data,$sql_insert);
    move_uploaded_file($news_img_tmp,'../../assets/'.$news_img);
    header('Location:../../index.php?action=newsM&query=insert');
}
else if (!empty($_POST['news_edit'])){

    // dùng để lấy tên danh mục
    $sql_cate="SELECT category_name FROM category WHERE category_id=$news_id_cate LIMIT 1";
    $sql_query=mysqli_query($data,$sql_cate);
    while($row=mysqli_fetch_array($sql_query))
    {
        $news_cate=$row['category_name'];
    }

    // dùng để lấy ra list ảnh để so sánh
    $id=$_GET['id'];
    $sql_img="SELECT news_img FROM news WHERE news_id='".$id."' LIMIT 1" ;
    $sql_query= mysqli_query($data,$sql_img);
    $arr_img='';
    while($row=mysqli_fetch_array($sql_query))
    {
        echo $row['news_img'];
       $arr_img=$row['news_img'];
       echo $arr_img;
       if(strlen($news_img)>11)
       {
        unlink('../../assets/'.$row['news_img']);
        move_uploaded_file($news_img_tmp,'../../assets/'.$news_img);
        $arr_img=$news_img;
       }  
    }   
    $sql_edit="UPDATE news SET news_id='".$news_id."',news_title='".$news_title."',news_cate='".$news_cate."',news_img='".$arr_img."',news_content='".$news_content."',news_id_cate=$news_id_cate
    WHERE news_id='".$id."'";
    echo $sql_edit;
    mysqli_query($data,$sql_edit);
    header('Location:../../index.php?action=newsM&query=insert');

}

else
{  
    $id=$_GET['id'];
    $sql_img="SELECT news_img FROM news WHERE news_id='".$id."' LIMIT 1" ;
    $sql_query= mysqli_query($data,$sql_img);
    while($row=mysqli_fetch_array($sql_query))
    {
        unlink('../../assets/'.$row['news_img']);
    }
    $sql_delete="DELETE FROM news WHERE news_id='".$id."'";
    mysqli_query($data,$sql_delete);
?> 
<?php
    header('Location:../../index.php?action=newsM&query=insert');
}

?>