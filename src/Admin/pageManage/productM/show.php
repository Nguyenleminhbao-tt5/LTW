<h3>Show</h3>
<?php

    $sql_show="SELECT * FROM product ORDER BY product_id ASC";
    $sql_query=mysqli_query($data,$sql_show);
    
?>
<table >
    
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá mới</th>
            <th>Giá cũ</th>
            <th>Sales</th>
            <th>Mô tả</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Ảnh chính</th>
            <th>Ảnh bổ sung 1</th>
            <th>Ảnh bổ sung 2</th>
            <th>Ảnh bổ sung 3</th>
            <th>Tính năng</th>
        </tr>
        <?php 
        // đặt tên bảng trùng với tên của thư mục (bỏ M)
        // đặt tên name trùng với thuộc tính của bảng
        $i=0;
        while($row=mysqli_fetch_array($sql_query))
      {
            $i+=1;
         ?>
        <tr>
            <th><?php echo $row['product_name']; ?></th>
            <th><?php echo $row['product_id']; ?></th>
            <th><?php echo $row['product_priceN']; ?></th>
            <th><?php echo $row['product_priceO']; ?></th>
            <th><?php echo $row['product_sales']; ?></th>
            <th><?php echo $row['product_descrip']; ?></th>
            <th><?php echo $row['product_amount']; ?></th>
            <th><?php echo $row['product_cate']; ?></th>
            <th>
                <img name="product_imgPrimary" src=<?php echo"./assets/".$row['product_imgPrimary'];?>>
            </th>
            <th>
                <img name="product_img1" src=<?php echo"./assets/".$row['product_img1'];?>>
            </th>
            <th>
                <img name="product_img2" src=<?php echo"./assets/".$row['product_img2'];?>>
            </th>
            <th>
                <img name="product_img3" src=<?php echo"./assets/".$row['product_img3'];?>>
            </th>
                    <th>
                        <a href="index.php?action=productM&query=edit&id=<?php echo $row['product_id']?>">edit</a>
                        <a href="./pageManage/productM/handle.php?id=<?php echo $row['product_id']?>">delete</a>
                    </th>
                  
        </tr>            
        <?php
        }
        if($i==0) echo '<h3>Không có dữ liệu</h3>';
        ?>

  
</table>