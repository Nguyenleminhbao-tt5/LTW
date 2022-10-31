<h3>Show</h3>
<?php

    $sql_show="SELECT * FROM news ORDER BY news_id ASC";
    $sql_query=mysqli_query($data,$sql_show);
?>
<table >

        <tr>
            <th>Mã tin</th>
            <th>Danh mục</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Ảnh tin</th>
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
            <th><?php echo $row['news_id']; ?></th>
            <th><?php echo $row['news_cate']; ?></th>
            <th><?php echo $row['news_title']; ?></th>
            <th><?php echo $row['news_content']; ?></th>
            <th>
                <img name="news_img" src=<?php echo"./assets/".$row['news_img'];?>>
            </th>
            <th>
                <a href="index.php?action=newsM&query=edit&id=<?php echo $row['news_id']?>">edit</a>
                <a href="./pageManage/newsM/handle.php?id=<?php echo $row['news_id']?>">delete</a>
            </th>
                  
        </tr>            
        <?php
        }
        if($i==0) echo '<h3>Không có dữ liệu</h3>';
        ?>

  
</table>