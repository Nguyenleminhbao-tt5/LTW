<h3>Show</h3>
<?php

    $sql_show="SELECT * FROM category ORDER BY category_id ASC";
    $sql_query=mysqli_query($data,$sql_show);
    
?>
<table >
    
        <tr>
            <th>Tên danh mục</th>
            <th>Mã danh mục</th>
            <th>Số lượng sản phẩm của mục</th>
            <th>Tính năng</th>  
        </tr>
       
        <?php 
        // đặt tên bảng trùng với tên của thư mục (bỏ M)
        // đặt tên name trùng với thuộc tính của bảng
        
        while($row=mysqli_fetch_array($sql_query))
        {
            
         ?>
            
                <tr>
                    <th>
                        <input type="text" name="category_name" value=<?php echo $row['category_name']; ?>/></th>
                        <th><input type="text" name="category_id" value=<?php echo $row['category_id']; ?>/></th>
                        <th><input type="text" name="category_amount"value=<?php echo $row['category_amount']; ?>/>
                        <th>
                        
                        <a href="index.php?action=categoryM&query=edit&id=<?php echo $row['category_id']?>">edit</a>
                        <a href="./pageManage/categoryM/handle.php?id=<?php echo $row['category_id']?>">delete</a>
                        </th>
                    </th>
                </tr>
               
        <?php
        }
        ?>

  
</table>