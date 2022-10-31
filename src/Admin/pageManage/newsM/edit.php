<h3>edit</h3>
<?php
    $id=$_GET['id'];
    $sql_show="SELECT * FROM news WHERE news_id='".$id."' LIMIT 1";
    $sql_query=mysqli_query($data,$sql_show);
    
?>
<table >
    <form method="post" action="./pageManage/newsM/handle.php?id=<?php echo $_GET['id']?>" enctype="multipart/form-data" >
        <?php 
        // đặt tên bảng trùng với tên của thư mục (bỏ M)
        // đặt tên name trùng với thuộc tính của bảng   
        while($row=mysqli_fetch_array($sql_query))
        {
            echo $row['news_content'];
            echo $row['news_title'];
            
         ?>

        <tr>
            <th>Mã tin</th>
            <th><input type="text" name="news_id" value=<?php echo $row['news_id']; ?>></th>
        </tr>
        <tr>
            <th>Danh mục</th>
            <th>
                <select name="news_cate">
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
            <th>Tiêu đề</th>
            <th> <input type="text" name="news_title" value=<?php echo $row['news_title'] ?>></th>
        </tr>
        <tr>
            <th>Nội dung</th>
            <th> <input type="text" name="news_content" value=<?php echo $row['news_content'] ?>></th>
        </tr>
        <tr>
            <th>Ảnh chính</th>
            <th><input type="file" name="news_img"></th>
        </tr>
        <tr>
            <th><input type="submit" name="news_edit" value="sửa tin"></th>
        </tr>
       <?php
        }
        ?>
    </form>
</table>