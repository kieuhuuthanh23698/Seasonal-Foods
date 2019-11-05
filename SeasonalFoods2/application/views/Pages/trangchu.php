<div class="content-top">
    <div class="container content-top-bg">
        <div class="row">
            <div class="col-md-3">
                <div class="content-top-item">
                    <span class="d-block"><i class="fas fa-truck"></i></span>
                    <strong class="d-block">Free Delivery</strong>
                    <p>Free shipping on all order</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content-top-item">
                    <span class="d-block"><i class="fas fa-undo-alt"></i></span>
                    <strong class="d-block">Return Policy</strong>
                    <p>Free shipping on all order</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content-top-item">
                    <span class="d-block"><i class="fas fa-phone"></i></span>
                    <strong class="d-block">24/7 Support</strong>
                    <p>Free shipping on all order</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="content-top-item">
                    <span class="d-block"><i class="fas fa-shield-alt"></i></span>
                    <strong class="d-block">Secure Payment</strong>
                    <p>Free shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .content-top{
        padding-left: 70px;
        padding-right: 70px;
        margin-top: 10px;
    }
    .content-top-bg{
        padding-top: 30px;
        padding-bottom: 30px;
        box-shadow: 3px 3px 10px gray;
    }
    .content-top .row{
        padding-left: 15px;
        padding-right: 15px;
    }
    .content-top .row>div{
        padding: 0;
    }
    .content-top-item{
        text-align: center;
        border-left: 1px solid #ededed;
        padding-left: 5px;
        padding-right: 5px;
    }
    .content-top .row>div:first-child .content-top-item{
        border-left: 0;
    }
    .content-top .row>div .content-top-item:last-child{
        
    }
    .content-top-item span{
        font-size: 25px;
        margin-bottom: 15px;
        color: #3b9f5e;
    }
    .content-top-item strong{
        font-size: 22px;
    }
    .content-top-item p{
        color: gray;
        font-weight: 500;
        font-size: 18px;
    }
</style>
<div class="about padding">
    <div class="about-heading container text-center">
        <h1>Về Seasonal Foods</h1>
    </div>
    <div class="about-content container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <p>jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.</p>
                <p>jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.</p>
            </div>
        </div>
    </div>
</div>
<style>
    .about{
        margin-top: 30px;
        background-image: url("<?php echo base_url() ?>public/images/banner/about.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
    .about-heading{
        padding-top: 10px;
        padding-bottom: 50px;
        margin-bottom: 30px;
        background-image: url("<?php echo base_url() ?>public/images/banner/bg-heading.png");
        background-size: 150px;
        background-repeat: no-repeat;
        background-position: center bottom;
    }
    .about-content p{
        font-size: 18px;
        color: #77838f;
        font-weight: 500;
    }
</style>
<div class="product pd-top">
    <div class="product-heading text-center">
        <h1 class="h2">Sản Phẩm Bán Chạy Của Seasonal Foods</h1>

    </div>
        
        <div class="container">
            <div class="row">
                <?php foreach($sellProducts as $sellproduct){ ?>
                <div class="col-md-4 col-sm-8 col-10 offset-1 offset-sm-2 offset-md-0 product-item">
                    <a href="<?php echo base_url()?>Handling/chitietsanpham/<?php echo $sellproduct['id'] ?>">
                        <div class="ribbon">
                            <div class="ribbon-inner">SeasonalFoods</div>
                        </div>
                        <div class="img">
                             <img width="100%" src="<?php echo base_url()?>public/images/products/<?php echo $sellproduct['image'] ?>"/>
                        </div>
                        <div class="product-content text-center">
                            <h2 class="h3"><?php echo $sellproduct['name'] ?></h2>
                            <p><?php echo number_format($sellproduct['price']) ?> đ</p>
                        </div>
                    </a>
                </div>
                <?php } ?>
                
            </div>
        </div>
</div>
<style>
    .product{

    }
    .product-heading{
        padding-top: 10px;
        padding-bottom: 50px;
        margin-bottom: 30px;
        background-image: url("<?php echo base_url() ?>public/images/banner/bg-heading.png");
        background-size: 150px;
        background-repeat: no-repeat;
        background-position: center bottom;
    }
    .product-heading img{
        width: 270px;
        margin-top: -20px;
    }
    .product-heading h1{
        font-weight: 500;

    }
    .product-item{
        padding: 40px;
    }
    .product-item a{
        display: block;
        box-sizing: border-box;
        text-decoration: none;
        box-shadow: 3px 3px 10px gray;
        padding: 10px;
        position: relative;
        overflow: hidden;
    }
    .product-item .img{
        padding: 10px;
    }
    .product-item .product-content{
        padding-top: 20px;
        padding-bottom: 10px;
    }
    .product-item h2{
        color: #3b9f5e;
    }
    .product-item a span{
        font-weight: 800;
        color: red;
    }
    .product-item a span.rrp{
        
    }
    .product-item a span.line{
        color: gray;
        text-decoration: line-through;
        margin-left: 10px;
    }
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
        right: 0px;
        top: 0px;
        z-index: 1;
        display: none;
    }
    .ribbon .ribbon-inner {
        width: 240px;
        left: -25px;
        top: 50px;
    }
    .ribbon-inner{
        background-color: #EEEEEE;
    }
    .ribbon-inner {
        font-family: "Open Sans",Helvetica,Arial,sans-serif;
        -webkit-box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.15);
        -o-box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 2px 0px 0px rgba(0, 0, 0, 0.15);
        -webkit-transform: translate3d(0, 0, 0);
        -webkit-backface-visibility: hidden;
        -webkit-perspective: 1000;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        background: #1abc9c;
        letter-spacing: 3px;
        text-align: center;
        position: relative;
        font-weight: 400;
        font-size: 14px;
        padding: 7px 0px;
        width: 120px;
        color: #fff;
        z-index: 1;
        left: 3px;
        top: 6px;
        font-weight: 600;
    }
    .product-item a:hover .ribbon{
        display: block;
    }
/*    ***************** responsive **********************/
    @media(max-width: 1125px){
        .product-item{
            padding: 20px;
        }
        .product-item h2{
            font-size: 20px;
        }
    }
    @media(max-width: 950px){
        .product h1{
            font-size: 25px;
        }
    }
    @media(max-width: 640px){
        .product{
            padding-top: 60px;
        }
    }
    
</style>
<div class="product pd-top">
    <div class="product-heading text-center">
        <h1 class="h2">Sản Phẩm Mới Của Seasonal Foods</h1>

    </div>
        
        <div class="container">
            <div class="row">
                <?php foreach($newProducts as $newproduct){
                    $sellprice = 0;
                    if($newproduct["quantumDiscount"] != null){
                        $sellprice = $newproduct['price'] * (1 - $newproduct['quantumDiscount']/100);
                    }
                    
                ?>
                <div class="col-md-3 product-item product-new-item">
                    <a href="<?php echo base_url()?>Handling/chitietsanpham/<?php echo $newproduct['id'] ?>">
                        <div class="ribbon">
                            <div class="ribbon-inner">SeasonalFoods</div>
                        </div>
                        <div class="img">
                             <img width="100%" src="<?php echo base_url()?>public/images/products/<?php echo $newproduct['image'] ?>"/>
                        </div>
                        <div class="product-content text-center">
                            <h2 class="h3"><?php echo $newproduct['name'] ?></h2>
                            <?php if($newproduct["quantumDiscount"] != null): ?>
                            <span class="sellprice"><?php echo number_format($sellprice) ?> đ</span>
                            <?php endif; ?>
                            <span class="<?php echo ($sellprice !=0)?"line":"" ?>"><?php echo number_format($newproduct['price']) ?> đ</span>
                            <?php if($newproduct["rrp"] > 0 && $newproduct["quantumDiscount"] == null): ?>
                            <span class="rrp line"><?php echo number_format($newproduct['rrp']) ?> đ</span>
                            <?php endif; ?>
                        </div>
                        <?php if($newproduct["quantumDiscount"] != null): ?>
                        <div class="discount-ribbon">
                            <div class="discount-ribbon-inner">-<?php echo $newproduct['quantumDiscount'] ?>%</div>
                        </div>
                        <?php endif; ?>
                    </a>
                </div>
                <?php } ?>
                
                
            </div>
        </div>
    <div class="load-more text-center pd-top">
        <a href="<?php echo base_url()?>Handling/sanpham">Xem Thêm</a>
    </div>
</div>
<style>
    .product-new-item{
        padding: 20px;
    }
    .load-more a{
        text-decoration: none;
        padding: 10px 15px;
        background-color: #3b9f5e;
        color: #ffffff;
        font-size: 18px;
        font-weight: 500;
        display: inline-block;
    }
    .load-more a:hover{
        transform: translateY(-5px);
        transition: all 0.5s;
    }
    .discount-ribbon{
        position: absolute;
        background-color: red;
        top: -60px;
        left: -60px;
        color: #ffffff;
        font-weight: 500;
        width: 120px;
        height: 120px;
        transform: rotate(45deg);
    }
    .discount-ribbon-inner{
        transform: rotate(-45deg);
        position: absolute;
        left: 60%;
        top: 40%;
    }
</style>
<div class="feature">
<!--    <img width="100%" src="<?php base_url()?>public/images/banner/introduce.png"/>-->
    <div class="container">
        <div class="row">
            <div class="col-md-4 feature-item">
                <div class="icon text-center mb-3">
                    <span class="fab fa-yelp fa-2x btn-icon__inner btn-icon__inner-bottom-minus"></span>
                </div>
                <div class="content text-center">
                    <h1 class="h3">Sản Phẩm An Toàn</h1>
                    <p>Achieve virtually any design and layout from within the one template.</p>
                </div>
            </div>
            <div class="col-md-4 feature-item">
                <div class="icon text-center mb-3">
                    <span class="fas fa-fire fa-2x btn-icon__inner btn-icon__inner-bottom-minus"></span>
                </div>
                <div class="content text-center">
                    <h1 class="h3">Sản Phẩm An Toàn</h1>
                    <p>Achieve virtually any design and layout from within the one template.</p>
                </div>
            </div>
            <div class="col-md-4 feature-item">
                <div class="icon text-center mb-3">
                    <span class="fab fa-whmcs fa-2x btn-icon__inner btn-icon__inner-bottom-minus"></span>
                </div>
                <div class="content text-center">
                    <h1 class="h3">Sản Phẩm An Toàn</h1>
                    <p>Achieve virtually any design and layout from within the one template.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .feature{
        background-image: url("<?php echo base_url() ?>public/images/banner/introduce.png");
        background-repeat: no-repeat;
        background-size: cover;
        padding-top: 180px;
        padding-bottom: 100px;
    }
    .feature .icon{
        color: darkgreen;
        font-size: 28px;
    }
    .feature-item{
        padding: 30px 23px;
    }
    .feature .content h1{
        font-weight: 700;
    }
    .feature .content p{
        color: #3b9f5e;
        font-weight: 900;
    }
</style>