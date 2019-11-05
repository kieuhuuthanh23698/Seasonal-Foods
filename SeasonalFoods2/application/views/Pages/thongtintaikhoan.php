<div class="banner-user">
    <img width="100%" src="<?php echo base_url()?>public/images/banner/banner-userinf.png"/>
    <div class="banner-user-content container">
        <div>
            <h1><?php echo $customer[0]["cusName"] ?></h1>
        </div>
    </div>
</div>
<style>
    .banner-user{
        position: relative;
    }
    .banner-user-content{
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .banner-user-content h1{
        font-size: 80px;
        color: #ffffff;
        text-transform: capitalize;
        text-shadow: 3px 3px 10px gray;
    }
</style>
<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>