<div class="banner">
    <img width="100%" src="<?php echo base_url() ?>public/images/banner/banner-cart.png"/>
    <div class="banner-content container banner-cart">
        <div>
            <h1>Giỏ Hàng</h1>
            <p>Your company will look astonishing. Attract more visitors, and win more business with Front template.</p>
        </div>
        
    </div>
</div>

<style>
    .banner-cart{
        padding-top: 20%;
    }
</style>
<div class="cart mt-5">
    <div class="container">
        <table class="table table-bordered text-center" style="box-shadow: 3px 3px 10px gray">
            <tr style="background-color: #3b9f5e;">
                <th colspan="2">Sản Phẩm</th>
                <th>Giá</th>
                <th>Số Lượng</th>
                <th>ĐVT</th>
                <th>Thành Tiền</th>
                <th></th>
            </tr>
            <?php if($giohang !=null){
                $tongtien = 0;
                foreach($giohang as $item){
                    $thanhtien = $item['price'] * $item['number'];
                    $tongtien += $item['price'] * $item['number'];
            ?>
            <tr id="id<?php echo $item['id'] ?>">
                <td><img width="150px" src="<?php echo base_url() ?>public/images/products/<?php echo $item['image']?>" /></td>
                <td><?php echo $item['name']?></td>
                <td><span id="price"><?php echo number_format($item['price'])?></span> đ</td>
                <td><input type="number" min="1" id="number" value="<?php echo $item['number']?>" onchange="change(<?php echo $item['id'] ?>,this.value)" /></td>
                <td><?php echo $item['unitName']?></td>
                <td><span id="thanhtien"><?php echo number_format($thanhtien) ?></span> đ</td>
                <td>
                    <button title="xóa sản phẩm" onclick="remove(<?php echo $item['id'] ?>)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php }} ?>
            
        </table>
    </div>
</div>
<div class="payment">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-8">
                <div class="payment-content">
                    <strong>Tổng Tiền: </strong>
                    <span id="tongtien"><?php echo isset($_SESSION["giohang"])?  number_format($tongtien): "" ?></span> đ
                    <a href="<?php echo base_url()?>Handling/dathang">Tiến Hành Đặt Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .payment .payment-content{
        height: 200px;
        padding: 20px;
        box-shadow: 3px 3px 10px gray;
        font-size: 18px;
    }
    .payment-content a{
        display: block;
        padding: 10px 20px;
        text-align: center;
        margin-top: 80px;
        text-decoration: none;
        background-color: #ff424e;
        color: #ffffff;
        font-size: 18px;
    }
</style>


<script>
    $(function(){
        $("header").addClass("header-fix");
    });
</script>
<script>
    function remove($id){
        $.ajax({
            url: '<?php echo base_url() ?>Handling/remove',
			type: 'POST',
			dataType: 'json',
			data: { number: $id},
        })
        .done(function(data){
            $('#tongtien').text(data.thanhtien);
            $('#id'+$id).remove();
            $('#numbercart sub').text(data.number);
        });
        
    }
    function change($id, number){
        if(number<1){
            number = 1;
            $('#id'+$id+" #number").val(number);
        }
        
        var sl = parseInt($('#id'+$id+" #number").val());
        var gia = parseInt($('#id'+$id+" #price").text().replace(",",""));
        var ta = parseInt(sl*gia);
        var tt = formatCurrency(ta);
        $('#id'+$id+" #thanhtien").text(tt);
        
        $.ajax({
            url: '<?php echo base_url() ?>Handling/changeNumber',
			type: 'POST',
			dataType: 'html',
			data: {number: number, id : $id},
        })
        .done(function(data){
            var t = formatCurrency(data);
            $("#tongtien").text(t);
            
        });
      }
    
    
    function formatCurrency(number){
        var n = number.toString();
        n = n.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }
</script>