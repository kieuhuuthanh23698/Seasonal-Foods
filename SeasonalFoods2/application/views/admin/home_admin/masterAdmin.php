<!DOCTYPE html>
<html>
    <head>
        <title>Seasonal Foods</title>
        <link type="image/x-icon" rel="shortcut icon" href="images/logo/logo-face.png" />
        <link type="image/x-icon" rel="icon" href="images/logo/logo-face.png"/>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.css"/>
        
         <link rel="stylesheet" href="<?php echo base_url() ?>public/css/fontawesome-all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/animate.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/styleAdmin.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <script src="<?php echo base_url() ?>public/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    </head>
    <body>
        <header>
            <nav>
                <div class="logo">
                    <img width="100px" src="<?php echo base_url()?>public/images/logo/logo-web.png"/>
                    <span id="listfunction-btn"><i class="fas fa-bars"></i></span>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="<?php echo base_url()?>"><span class="home"><i class="fas fa-home"></i></span>Trang Chủ</a></li>
                        <li><a href="#"><span class="admin"><i class="fas fa-user-tie"></i></span><?php echo isset($_SESSION["admin"])?"":"" ?></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="main">
            <div class="main-bg">
                <div class="item">
                    <?php echo isset($body)?$body:"" ?>
                </div>
            </div>
            
                <div class="listfunction">
                    <ul>
                        <li>
                            <ul class="sub-list">
                                <li><i class="fas fa-user-tie"></i></li>
                                <li>Admin<br/>Quản Trị Viên</li>
                                <li><a href="#"><i class="fas fa-cogs"></i></a></li>
                            </ul>
                        </li>
                        <li id="gray">Chức Năng Quản Trị</li>
                        <li><a href="<?php echo base_url()?>admin/products"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Sản Phẩm</a></li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Banner</a></li>
                        <li><a href="<?php echo base_url() ?>admin/portfolio"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Danh Mục</a></li>
                        <li><a href="<?php echo base_url() ?>admin/unit"><span><i class="fas fa-cart-plus"></i></span>Đơn Vị Tính</a></li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Đơn Hàng</a></li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Liên Hệ</a></li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Quản Lý Bài Viết</a></li>
                        <li class="promotion"><a href="#"><span><i class="fas fa-cart-plus"></i></span>Khuyến Mãi<span><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub-promotion">
                                <li><a href="<?php echo base_url() ?>admin/discountcode">Mã Giảm Giá</a></li>
                                <li><a href="#">Phiếu Giảm Giá</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Thông Tin Seasonal Foods</a></li>
                        <li><a href="#"><span><i class="fas fa-cart-plus"></i></span>Thông Tin Seasonal Foods</a></li>
                    </ul>
                </div>
                <div class="col-md-9 item-content">
                    
                    
                </div>
            </div>
      
        
        
        
    </body>
    <script>
        $("#listfunction-btn").on("click",function(){
            $(".listfunction").toggleClass("d-block");
        })
    </script>
</html>