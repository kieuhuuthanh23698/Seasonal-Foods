<table class="table table-bordered table-responsive" id="myTable">
    <thead>
        <th>id</th>
        <th colspan="2">Sản Phẩm</th>
        <th>Đơn Vị Tính</th>
        <th>Danh Mục</th>
        <th>Thương Hiệu</th>
        <th>Giá Bán</th>
        <th>Giá Gốc</th>
        <th>Giảm Giá</th>
        <th>Hiển Thị</th>
        <th>Ngày Tạo</th>
        <th>Ngày Cập Nhật</th>
    </thead>
    <tbody>
        
    </tbody>
</table>
<script>
    
</script>
<script>
    $(document).ready( function () {
//        $('#myTable').DataTable();
        $.get( "<?php echo base_url()?>admin/product2/productJson", function( data ) {
            var obj = jQuery.parseJSON(data);
            for(var product of obj) {
                renderProduct(product);
            }
        });
    } );
    
    function renderProduct(product){
        var brandName = product.brandName;
        if(brandName == null){
            brandName = "no brand";
        }
        var quantumDiscount = product.quantumDiscount;
        if(quantumDiscount == null){
            quantumDiscount = "";
        }else{
            quantumDiscount+="%";
        }
        var hidden = product.hidden;
        if(hidden == 0){
            hidden = "checked";
        }else{
            hidden = "";
        }
        $item = $('<tr>'+
            '<td>'+product.id+'</td>'+
            '<td>'+product.name+'</td>'+
            '<td><image width="100px" src="<?php echo base_url()?>public/images/products/'+product.image+' ?>" /></td>'+
            '<td>'+product.unitName+'</td>'+
            '<td>'+product.porName+'</td>'+
            '<td>'+brandName+'</td>'+
            '<td>'+product.price+'</td>'+
            '<td>'+product.rrp+'</td>'+
            '<td>'+quantumDiscount+'</td>'+
            '<td><input type="checkbox" '+hidden+' /></td>'+
            '<td>'+product.create_at+'</td>'+
            '<td>'+product.update_at+'</td>'+
            '</tr>');
                  
        $("tbody").append($item);
    }
</script>
