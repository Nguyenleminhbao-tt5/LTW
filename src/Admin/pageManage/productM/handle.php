<?php
require('../../config/config.php');

// insert
$product_id=$_POST['product_id'];
$product_name=str_replace(' ','',$_POST['product_name']);
$product_priceN=str_replace('/','',$_POST['product_priceN']);
$product_priceO=str_replace('/','',$_POST['product_priceO']);
$product_sales=str_replace('/','',$_POST['product_sales']);
$product_descrip=str_replace('/','',$_POST['product_descrip']);
$product_amount=str_replace('/','',$_POST['product_amount']);

$product_id_cate =str_replace('/','',$_POST['product_cate']);

$product_imgPrimary=$_FILES['product_imgPrimary']['name'];
$product_imgPrimary_tmp=$_FILES['product_imgPrimary']['tmp_name'];
$product_imgPrimary=time().'_'.$product_imgPrimary;


$product_img1=$_FILES['product_img1']['name'];
$product_img1_tmp=$_FILES['product_img1']['tmp_name'];
$product_img1=time().'_'.$product_img1;

$product_img2=$_FILES['product_img2']['name'];
$product_img2_tmp=$_FILES['product_img2']['tmp_name'];
$product_img2=time().'_'.$product_img2;

$product_img3=$_FILES['product_img3']['name'];
$product_img3_tmp=$_FILES['product_img3']['tmp_name'];
$product_img3=time().'_'.$product_img3;







if(!empty($_POST['product_insert']))
{
     // dùng để lấy tên danh mục
    $sql_cate="SELECT category_name FROM category WHERE category_id=$product_id_cate LIMIT 1";
    $sql_query=mysqli_query($data,$sql_cate);
    while($row=mysqli_fetch_array($sql_query))
    {
        $product_cate=$row['category_name'];
    }

    $sql_insert="INSERT INTO product(product_id,product_name,product_priceN,product_priceO,product_sales,product_imgPrimary,product_img1,product_img2,product_img3,product_descrip,product_amount,product_id_cate,product_cate) 
    VALUES('".$product_id."','".$product_name."',$product_priceN,$product_priceO,$product_sales,'".$product_imgPrimary."','".$product_img1."','".$product_img2."','".$product_img3."','".$product_descrip."',$product_amount,$product_id_cate,'".$product_cate."')";
    mysqli_query($data,$sql_insert);
    move_uploaded_file($product_imgPrimary_tmp,'../../assets/'.$product_imgPrimary);
    move_uploaded_file($product_img1_tmp,'../../assets/'.$product_img1);
    move_uploaded_file($product_img2_tmp,'../../assets/'.$product_img2);
    move_uploaded_file($product_img3_tmp,'../../assets/'.$product_img3);
    header('Location:../../index.php?action=productM&query=insert');
}
else if (!empty($_POST['product_edit'])){

    // dùng để lấy tên danh mục
    $sql_cate="SELECT category_name FROM category WHERE category_id=$product_id_cate LIMIT 1";
    $sql_query=mysqli_query($data,$sql_cate);
    while($row=mysqli_fetch_array($sql_query))
    {
        $product_cate=$row['category_name'];
    }

    // dùng để lấy ra list ảnh để so sánh
    $id=$_GET['id'];
    $sql_img="SELECT product_imgPrimary,product_img1,product_img2,product_img3 
    FROM product WHERE product_id='".$id."' LIMIT 1" ;
    $sql_query= mysqli_query($data,$sql_img);
    $arr_img=[];
    while($row=mysqli_fetch_array($sql_query))
    {
       $arr_img[0]=$row['product_imgPrimary'];
       $arr_img[1]=$row['product_img1'];
       $arr_img[2]=$row['product_img2'];
       $arr_img[3]=$row['product_img3'];
       if(strlen($product_imgPrimary)>11)
       {
        unlink('../../assets/'.$row['product_imgPrimary']);
        move_uploaded_file($product_imgPrimary_tmp,'../../assets/'.$product_imgPrimary);
        $arr_img[0]=$product_imgPrimary;
       }
        if(strlen($product_img1)>11)
       {
        unlink('../../assets/'.$row['product_img1']);
        move_uploaded_file($product_img1_tmp,'../../assets/'.$product_img1);
        $arr_img[1]=$product_img1;
       }
        if(strlen($product_img2)>11)
       {
        unlink('../../assets/'.$row['product_img2']);
        move_uploaded_file($product_img2_tmp,'../../assets/'.$product_img2);
        $arr_img[2]=$product_img2;
       }
        if(strlen($product_img3)>11)
       {
        unlink('../../assets/'.$row['product_img3']);
        move_uploaded_file($product_img3_tmp,'../../assets/'.$product_img3);
        $arr_img[3]=$product_img3;
       }
    }
    
    
    $sql_edit="UPDATE product SET product_id='".$product_id."',product_name='".$product_name."',product_priceN=$product_priceN,product_priceO=$product_priceO,product_sales=$product_sales,product_imgPrimary='".$arr_img[0]."',product_img1='".$arr_img[1]."',product_img2='".$arr_img[2]."',product_img3='".$arr_img[3]."',product_descrip='".$product_descrip."',product_amount=$product_amount,product_id_cate=$product_id_cate,product_cate='".$product_cate."'
    WHERE product_id='".$id."'";
    echo $sql_edit;
    mysqli_query($data,$sql_edit);
    header('Location:../../index.php?action=productM&query=insert');

}

else
{  
    $id=$_GET['id'];
    $sql_img="SELECT product_imgPrimary,product_img1,product_img2,product_img3 
    FROM product WHERE product_id='".$id."' LIMIT 1" ;
    $sql_query= mysqli_query($data,$sql_img);
    while($row=mysqli_fetch_array($sql_query))
    {
        unlink('../../assets/'.$row['product_imgPrimary']);
        unlink('../../assets/'.$row['product_img1']);
        unlink('../../assets/'.$row['product_img2']);
        unlink('../../assets/'.$row['product_img3']);
    }
    $sql_delete="DELETE FROM product WHERE product_id='".$id."'";
    mysqli_query($data,$sql_delete);
?> 
<?php
    header('Location:../../index.php?action=productM&query=insert');
}

?>