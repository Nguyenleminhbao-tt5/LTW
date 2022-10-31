<h3>edit</h3>
<?php
    $id=$_GET['id'];
    $sql_show="SELECT * FROM product WHERE product_id='".$id."' LIMIT 1";
    $sql_query=mysqli_query($data,$sql_show);
    
?>
<table >
    <form method="post" action="./pageManage/productM/handle.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data" >
        <?php 
        // đặt tên bảng trùng với tên của thư mục (bỏ M)
        // đặt tên name trùng với thuộc tính của bảng   
        while($row=mysqli_fetch_array($sql_query))
        {
         ?>

<tr>
            <th>Mã sản phẩm</th>
            <th><input type="text" name="product_id" value=<?php 
            echo $row['product_id'] ?>></th>
        </tr>
        <tr>
            <th>Tên sản phẩm</th>
            <th><input type="text" name="product_name"value=<?php 
            echo $row['product_name'] ?>></th>
        </tr>
        <tr>
            <th>Giá mới</th>
            <th><input type="text" name="product_priceN"value=<?php 
            echo $row['product_priceN'] ?>></th>
        </tr>
        <tr>
            <th>Giá cũ</th>
            <th><input type="text" name="product_priceO"value=<?php 
            echo $row['product_priceO'] ?>></th>
        </tr>
        <tr>
            <th>Sales</th>
            <th><input type="text" name="product_sales"value=<?php 
            echo $row['product_sales'] ?>></th>
        </tr>
        <tr>
            <th>Ảnh chính</th>
            <th><input type="file" name="product_imgPrimary"></th>
        </tr>
        <tr>
            <th>Ảnh bổ sung 1</th>
            <th><input type="file" name="product_img1"></th>
        </tr>
        <tr>
            <th>Ảnh bổ sung 2</th>
            <th><input type="file" name="product_img2"></th>
        </tr>
        <tr>
            <th>Ảnh bổ sung 3</th>
            <th><input type="file" name="product_img3"></th>
        </tr>
        <tr>
            <th>Mô tả</th>
            <th>
                <textarea name="product_descrip">
                <?php 
                    echo $row['product_descrip'] ?>
                </textarea>
            </th>
        </tr>
        <tr>
            <th>Số lượng</th>
            <th><input type="text" name="product_amount"value=<?php 
            echo $row['product_amount'] ?>></th>
        </tr>
        <tr>
            <th>Danh mục</th>
            <th>
                <select name="product_cate">
                    <?php
                       $sql_select="SELECT * FROM category ORDER BY category_id ASC";
                       $sql_query=mysqli_query($data,$sql_select);
                       while($row=mysqli_fetch_array($sql_query))
                       {
                    
                        echo '<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>';
                       }
                    ?>
                </select>
            </th>
        </tr>
        <tr>
            <th><input type="submit" name="product_edit" value="sửa sản phẩm"></th>
        </tr>
       <?php
        }
        ?>
    </form>
</table>