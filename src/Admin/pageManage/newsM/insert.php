<h3>newsM</h3>
<table >
    <form method="post" action="./pageManage/newsM/handle.php" enctype="multipart/form-data">
        <tr>
            <th>Mã tin</th>
            <th><input type="text" name="news_id"></th>
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
            <th><input type="text" name="news_title"></th>
        </tr>
        <tr>
            <th>Nội dung</th>
            <th><input type="text" name="news_content"></th>
        </tr>
        <tr>
            <th>Ảnh tin</th>
            <th><input type="file" name="news_img"></th>
        </tr>    
        <tr>
            <th><input type="submit" name="news_insert" value="Thêm tin"></th>
        </tr>
    </form>
</table>