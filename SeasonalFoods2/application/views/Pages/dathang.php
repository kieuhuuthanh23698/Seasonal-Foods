<div class="banner-order">
    <img width="100%" src="<?php echo base_url()?>public/images/banner/banner-dathang.png"/>
    <div class="banner-order-content container">
        <div>
            <h1>Đặt Hàng</h1>
        </div>
    </div>
</div>
<style>
    .banner-order{
        position: relative;
    }
    .banner-order-content{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .banner-order-content>div{
        width: 50%;
    }
    .banner-order-content h1{
        text-transform: capitalize;
        color: #2e690a;
        font-weight: 900;
        font-size: 80px;
        text-shadow: 3px 3px 10px #7ef136;
    }
    
</style>
<?php 
    var_dump($customer);
    
?>
<div class="address-user pd-top">
    <div class="container">
        <h1>Địa Chỉ Giao Hàng</h1>
        <div class=" address-user-content">
            
        </div>
    </div>
</div>

<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>