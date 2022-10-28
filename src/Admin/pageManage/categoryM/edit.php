<h3>edit</h3>
<?php
    $id=$_GET['id'];
    $sql_show="SELECT * FROM category WHERE category_id=$id LIMIT 1";
    $sql_query=mysqli_query($data,$sql_show);
    
?>
<table >
    <form method="post" action="./pageManage/categoryM/handle.php?id=<?php echo $_GET['id']?>">
        <?php 
        // đặt tên bảng trùng với tên của thư mục (bỏ M)
        // đặt tên name trùng với thuộc tính của bảng
       
        
        while($row=mysqli_fetch_array($sql_query))
        {
         ?>
        <tr>
            <th>Tên danh mục</th>
            <th><input type="text" name="category_name" value=<?php 
            echo $row['category_name'] ?>/></th>
        </tr>
        <tr>
            <th>Mã danh mục </th>
            <th><input type="text" name="category_id" value=<?php 
            echo $row['category_id'] ?> /></th>
        </tr>
        <tr>
            <th>Số lượng sản phẩm của danh mục</th>
            <th><input type="text" name="category_amount"value=<?php 
            echo $row['category_amount'] ?>/></th>
        </tr>
        <tr>
            <th><input type="submit" name="category_edit" value="Sửa danh mục"/></th>
        </tr>
       <?php
        }
        ?>
    </form>
</table>