<div class="wrapper-content">
    <div class="grid">
        <div class="grid__row">
            <div class="grid__column-25">
                <div class="sliderbar">
                    <ul class="sliderbar__list">
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=categoryM&query=insert" class="sliderbar__list-link">Quản lý danh mục sản phẩm</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=productM&query=insert" class="sliderbar__list-link">Quản lý sản phẩm</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=userM&query=insert" class="sliderbar__list-link">Quản lý người dùng</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=newsM&query=insert" class="sliderbar__list-link">Quản lý tin tức</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=commentM&query=insert" class="sliderbar__list-link">Quản lý bình luận</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=infoCompanyM&query=insert" class="sliderbar__list-link">Quản lý thông tin công ty</a>
                        </li>
                        <li class="sliderbar__list-item">
                            <a href="index.php?action=resourceM&query=insert" class="sliderbar__list-link">Quản lý tài nguyên</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid__columx-75">
                <div class="main">
                    <?php
                    require('./config/config.php'); 
                    if(!empty($_GET['action']))
                    {
                        $protocol=$_GET['action'];
                        $method=$_GET['query'];
                    
                        
                        if($protocol=='categoryM' && $method=='insert')
                        {
                            require('./pageManage/categoryM/insert.php');
                            require('./pageManage/categoryM/show.php');
                        }
                        else if($protocol=='categoryM' && $method=='edit')
                        {
                            require('./pageManage/categoryM/edit.php');
                        }
                        else if($protocol=='productM' && $method=='insert')
                        {
                            require('./pageManage/productM/insert.php');
                            require('./pageManage/productM/show.php');
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </grid>
 </div>
