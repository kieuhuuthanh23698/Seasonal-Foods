<div class="banner-ct">
    <img width="100%" src="<?php echo base_url()?>public/images/banner/banner-ct.png"/>
    <div class="banner-ct-content container">
        <div>
            <h1><?php echo $product[0]['name'] ?></h1>
        </div>
    </div>
</div>
<style>
    .banner-ct{
        position: relative;
    }
    .banner-ct-content{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        padding-bottom: 4%;
    }
    .banner-ct-content>div{
        width: 40%;
    }
    .banner-ct-content>div h1{
        font-size: 70px;
        color: #ffffff;
        text-shadow: 5px 5px 5px gray;
    }
</style>
<div class="container pd-top">
    <div class="row">
        <div class="col-md-5">
            <img width="100%" src="<?php echo base_url()?>public/images/products/<?php echo $product[0]['image'] ?>"/>
        </div>
        <div class="col-md-6 offset-md-1">
            
            <h1><?php echo $product[0]['name'] ?></h1>
            <p><?php echo $product[0]['description']?></p>
            <p>Giá: <span><?php echo number_format($product[0]['price']) ?> đ</span>/<?php echo $product[0]['unitName'] ?></p>
            <a href="<?php echo base_url()?>Handling/datthem/<?php echo $product[0]['id'] ?>">Thêm Vào Giỏ Hàng</a>
            
        </div>
    </div>
</div>
<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>