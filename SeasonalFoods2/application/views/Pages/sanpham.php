<!--******************************************************* BANNER PRODUCTS **********************************************-->
<div class="banner banner-product-cont">
    <img width="100%" src="<?php echo base_url() ?>public/images/banner/banner-product.png"/>
    <div class="banner-content container banner-product">
        <div>
            <h1>Sản Phẩm</h1>
            <p>Your company will look astonishing. Attract more visitors, and win more business with Front template.</p>
        </div>
        
    </div>
    <div class="banner-product-img">
        <div class="bg">
            <img width="100%" src="<?php echo base_url() ?>public/images/banner/egg.png"/>
        </div>
        <div class="bg">
            <img width="100%" src="<?php echo base_url() ?>public/images/banner/egg.png"/>
        </div>
        <div class="bg-abs">
            <img width="100%" src="<?php echo base_url() ?>public/images/banner/tomatoes.png"/>
        </div>
    </div>
</div>

<style>
    .banner-product-cont{
        position: relative;
    }
    .banner-product{
        padding-top: 150px;
    }
    .banner-product h1{
        color: #ffffff;
        text-shadow: 3px 3px 9px gray;
    }
    
    .banner-product-img{
        width: 400px;
        display: flex;
        position: absolute;
        bottom: 20px;
        right: 10%;
    }
    .banner-product-img .bg{
        width: 50%;
        padding: 10px;
    }
    .banner-product-img>div img{
        border: 5px solid #fff;
        box-shadow: 5px 5px 10px #d6fae2;
        border-radius: 5px;
    }
    .banner-product-img>div img:hover{
        transform: translateY(-5px);
        transition: all 0.5s;
    }
    .banner-product-img .bg-abs{
        position: absolute;
        width: 60%;
        left: 20%;
        top: -10%;
    }
    
</style>
<!--******************************************************* PRODUCT MAIN **********************************************-->
<div class="product-main padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-12">
                        <div class="filter-list">
                            <h1 class="h2 text-center">Danh Mục</h1>
                            <ul>
                                <?php foreach($portfolios as $portfolio){?>
                                <li>
                                    <input type="checkbox" value="<?php echo $portfolio["id_portfolio"]?>"/><span><?php echo $portfolio["porName"]?></span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="fitler-price">
                            <select class="form-control">
                                <option value="0">Mặc Định</option>
                                <option value="1">Giá Giảm Dần</option>
                                <option value="2">Giá Tăng Dần</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 product-page">
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .filter-list{
        box-shadow: 3px 3px 10px gray;
    }
    .filter-list h1{
        color: #ffffff;
        background-color: #42a765;
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .filter-list ul{
        list-style: none;
        padding: 10px;
        font-size: 18px;
    }
    .filter-list ul li span{
        margin-left: 10px;
    }
    .filter-list ul li input{
        padding: 20px;
        cursor: pointer;
    }
    .fitler-price select{
        cursor: pointer;
    }
    .product-dec{
        position: relative;
        margin-bottom: 50px;
    }
    .product-page button{
        border: 0;
        background-color: #fff;
        cursor: pointer;
    }
    .product-page button:hover{
        transform: scale(1.2);
    }
    .product-page a{
        text-decoration: none;
        color: inherit;
        position: relative;
    }
    .product-page-item{
        padding: 10px;
        position: relative;
        box-shadow: 3px 3px 10px gray;
        background-color: #fff;
        overflow: hidden;
    }
    .product-page-item:hover{
        transform: translateY(-5px);
        transition: all 0.5s;
    }
    .product-page-item .content{
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .product-page-item .content span{
        color: red;
        font-weight: 500;
    }
    .product-dec .icon{
        position: absolute;
        left: 50%;
        bottom: -18px;
        transform: translateX(-50%);
        box-sizing: border-box;
        z-index: 100;
        background-color: #fff;
        padding: 5px 7px 5px 12px;
        box-shadow: 3px 3px 10px gray;
    }
    .product-dec .icon span{
        padding: 5px 8px;
        box-sizing: border-box;
        margin-left: -5px;
    }
    .product-dec span.price{
        margin-right: 10px;
        margin-left: 10px;
    }
    .product-dec span.line{
        color: gray;
        text-decoration: line-through;
        
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
<!--******************************************************* PRODUCT PAGES **********************************************-->
<div class="product-page">
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                
            </ul>
        </nav>
    </div>
</div>
<style>
    .product-page .pagination{
        display: flex;
        justify-content: center;
    }
    .activepage{
        color: red !important;
        font-weight: 500;
        font-size: 18px;
    }
</style>
<!--******************************************************* WAVE **********************************************-->
<div class="wave pd-top">
    <img width="100%" src="<?php echo base_url() ?>public/images/banner/waves.png"/>
</div>
<style>
    .wave{
        
    }
</style>


<!--******************************************************* SCRIPT **********************************************-->

<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>
<script>
    $(document).ready(function(){
        if(document.referrer == "" || document.referrer == "http://localhost/www/TCWEB/SeasonalFoods2/Handling/sanpham"){
             window.sessionStorage.setItem("search","");
        }
        
        var search =  window.sessionStorage.getItem("search");
        $("#search-text").val(search);
        
        
        action();
        $('#search-text').keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                $(".product-page .row").children().remove();
                action();
            }
        })
        $("#search-button").on("click",function(){
            $(".product-page .row").children().remove();
            action();
        })
        $(".filter-list input").change(function(){
            $(".product-page .row").children().remove();
            action();
        });
        $(".fitler-price select").change(function(){
            $(".product-page .row").children().remove();
            action();
        });
        
    });
    function action2(){
        var page = "1";
        $(".product-page .page-item").each(function(index){
            if($(this).hasClass("activepage")) {
                page = $(this).text();
            }
        });
              
        $(".product-page .row").children().remove();
        var search = $("#search-text").val();
        var portfolios = [];
            
        $(".filter-list input").each(function(index){
            if($(this).prop("checked") == true){
                var id = $(this).val();
                portfolios.push(id);
            }
        });
            
        var price = $(".fitler-price select").val();
        $.ajax({
            url: '<?php echo base_url() ?>Handling/filter',
            type: 'POST',
            dataType: 'json',
            data: {
                portfolios: JSON.stringify(portfolios),
                price: price,
                search: search,
                page: page,
            }
        })
            .done(function(data){
            for (var product of data.limit) {
                renderProduct(product);
            }
            
            
        })
        
    }
    function action(){
        var page = "1";
        $(".product-page .row").children().remove();
        var search = $("#search-text").val();
        var portfolios = [];
            
        $(".filter-list input").each(function(index){
            if($(this).prop("checked") == true){
                var id = $(this).val();
                portfolios.push(id);
            }
        });
            
        var price = $(".fitler-price select").val();
        $.ajax({
            url: '<?php echo base_url() ?>Handling/filter',
            type: 'POST',
            dataType: 'json',
            data: {
                portfolios: JSON.stringify(portfolios),
                price: price,
                search: search,
                page: page,
            }
        }).done(function(data){
            renderPages(data.quantum);
             $(".product-page .pagination li:first-child").addClass("activepage");
            for (var product of data.limit) {
                renderProduct(product);
                
            }
            
            
        })
    }
    function show($i){
        deleteActive();
        $(".product-page .page-item:nth-child("+$i+")").addClass("activepage");
        $(".product-page .row").children().remove();
        action2();
    }
    function deleteActive(){
        $(".product-page .page-item").each(function(index){
            $(this).removeClass("activepage");
        })
    }
    function renderPages(n){
        $(".product-page .pagination li").remove();
        var quantumProduct = 9;
        var quantumPage = Math.ceil( n / quantumProduct);
        for(var i=1; i<=quantumPage; i++){
            $item = $('<li class="page-item page-link" onclick="show('+i+')">'+i+'</li>');
            $(".product-page .pagination").append($item);
        }
    }
    function order($id){
        $.ajax({
            url: '<?php echo base_url() ?>Handling/datthem',
            type: 'POST',
            dataType: 'html',
            data: {
                id:$id,
            }
        })
        .done(function(data){
            $('#numbercart sub').text(data);
            alert("Đã Thêm Sản Phẩm Vào Giỏ Hàng");
                    
        })
    }
    function renderProduct(product){
        $item = "";
        if(product.quantumDiscount != null){
            var sellprice = product.price * (1 - product.quantumDiscount/100);
            sellprice = sellprice.toString();
            $item = $('<div class="col-md-4">'+
                  '<div class="product-dec">'+
                      '<a href="<?php echo base_url()?>Handling/chitietsanpham/'+product.id+'">'+
                        '<div class="product-page-item">'+
                            '<div class="img">'+
                                '<img width="100%" src="<?php echo base_url() ?>public/images/products/'+product.image+'"/>'+
                            '</div>'+
                            
                            '<div class="content text-center">'+
                                '<h1 class="h5">'+product.name+'</h1>'+
                                '<span class="pricesell">'+formatCurrency(sellprice)+' đ</span>'+
                                '<span class="price line">'+formatCurrency(product.price)+' đ</span>'+
                            '</div>'+
                            '<div class="discount-ribbon">'+
                                '<div class="discount-ribbon-inner">-'+product.quantumDiscount+'%</div>'+
                            '</div>'+
                        '</div>'+
                        '</a>'+
                        '<div class="icon">'+
                            '<span><i class="fas fa-heart"></i></span>'+
                            '<span><i class="fas fa-cart-plus"></i></span>'+
                            '<span><button onclick="order('+product.id+')"><i class="fas fa-cart-plus"></button></i></span>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
            
        }else{
            var rrp = product.rrp;
            if(rrp == 0){
                rrp = "";
            }
            else{
                rrp = formatCurrency(rrp.toString());
                rrp += "đ";
            }
            $item = $('<div class="col-md-4">'+
                  '<div class="product-dec">'+
                      '<a href="<?php echo base_url()?>Handling/chitietsanpham/'+product.id+'">'+
                        '<div class="product-page-item">'+
                            '<div class="img">'+
                                '<img width="100%" src="<?php echo base_url() ?>public/images/products/'+product.image+'"/>'+
                            '</div>'+
                            
                            '<div class="content text-center">'+
                                '<h1 class="h5">'+product.name+'</h1>'+
                                '<span class="price">'+formatCurrency(product.price)+' đ</span>'+
                                '<span class="rrp line">'+rrp+'</span>'+
                            '</div>'+
                        '</div>'+
                        '</a>'+
                        '<div class="icon">'+
                            '<span><i class="fas fa-heart"></i></span>'+
                            '<span><i class="fas fa-cart-plus"></i></span>'+
                            '<span><button onclick="order('+product.id+')"><i class="fas fa-cart-plus"></button></i></span>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
            
        }
        $a = $(".product-page .row");
        $a.append($item);
        
        }
        function formatCurrency(number){
            var n = number.split('').reverse().join("");
            var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
            return  n2.split('').reverse().join('');
        }
            
                
</script>
