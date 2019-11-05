<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Sản Phẩm</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button>
</div>
<div class="list-products">
    <table class="table table-bordered text-center" id="table_id">
        <thead style="background-color: #3b9f5e;">
            <th>ID</th>
            <th colspan="2">Sản Phẩm</th>
            <th>Giá Bán</th>
            <th>Giá Gốc</th>
            <th>Khuyến Mãi</th>
            <th>ĐVT</th>
            <th>Danh Mục</th>
            <th>Hiển Thị</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach($products as $product){ ?>
        <tr id="id<?php echo $product["id"] ?>">
            <td><?php echo $product["id"] ?></td>
            <td id="image"><img width="100px" src="<?php echo base_url()?>public/images/products/<?php echo $product["image"] ?>"/></td>
            <td id="name"><?php echo $product["name"] ?></td>
            <td id="price"><?php echo number_format($product["price"]) ?></td>
            <td id ="rrp"><?php echo number_format($product["rrp"]) ?></td>
            <td id="discount"><?php echo ($product["quantumDiscount"] != null)?$product["quantumDiscount"]:0 ?> %</td>
            <td id="unit"><?php echo $product["unitName"] ?></td>
            <td id='portfolio'><?php echo $product["porName"] ?></td>
<!--            <td id="hidden"><?php echo ($product["hidden"] == 0)? "có":"không" ?></td>-->
            <td>
                <input type="checkbox" <?php echo ($product["hidden"]==0)?"checked":"" ?> />
            </td>
            <td>
                <button onclick="update(<?php echo $product["id"] ?>)" class="btn btn-primary">Sửa</button>
                <button onclick="deleteProduct(<?php echo $product["id"]?>)" class="btn btn-warning">Xóa</button>
            </td>
        </tr>
        <?php } ?>
        </tbody>
            
    </table>
</div>
<style>
    .products-heading{
        padding-top: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid gray;
        display: flex;
        justify-content: space-between;
        padding-right: 20px;
    }
    .products-heading i{
        margin-right: 20px;
    }
    .products-heading h1{
        font-size: 30px;
    }
    .list-products{
        padding-top: 20px;
        padding-right: 20px;
    }
</style>
<div class="modal-update">
    <div class="modal-update-bg">
        <h2>Cập Nhật Sản Phẩm</h2>
        <hr/>
        <div class="modal-update-content">
<!--            <form id="frm-update" method="post" enctype="multipart/form-data">-->
                <input type="text" id="namesetting" name="name" class="form-control"/>
                <input type="text" id="pricesetting" name="price" class="form-control"/>
                <input type="file" id="imagesetting" name="image"/>
                <p style="color: green; font-size: 18px; font-weight: 500">Đơn Vị Tính:</p>
                <select id="unitsetting" class="form-control">
                    <?php foreach($units as $unit){?>
                    <option value="<?php echo $unit["id_units"] ?>"><?php echo $unit["unitName"] ?></option>
                    <?php } ?>
                </select>
                <p style="color: green; font-size: 18px; font-weight: 500">Danh Mục:</p>
                <select id="portfoliosetting" class="form-control">
                    <?php foreach($portfolios as $portfolio){?>
                    <option value="<?php echo $portfolio["id_portfolio"] ?>"><?php echo $portfolio["porName"] ?></option>
                    <?php } ?>
                </select>
                <p style="color: green; font-size: 18px; font-weight: 500">Hiển Thị:</p>
                <input type="radio" name="hidden" value="0"><label>Có</label>
                <input type="radio" name="hidden" value="1"><label>Không</label>
                <p style="color: green; font-size: 18px; font-weight: 500">Mô Tả:</p>
                <textarea id="descriptionupdate" name="description"></textarea>
<!--            </form>-->
        </div>
        <div class="modal-update-button">
            <button id="update-close-btn" class="btn btn-primary">Đóng</button>
            <button id="update-btn" class="btn btn-success">Cập Nhật</button>
        </div>
    </div>
</div>
<style>
    .modal-update{
        background : rgba(0,0,0,0.7);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow-y: auto;
        z-index: 1001;
    }
    .modal-update::-webkit-scrollbar{
        display: none;
    }
    .modal-update-bg{
        width: 600px;
        background-color: #fff;
        border: 1px solid green;
        padding: 20px;
        border-radius: 10px;
        margin: 20px auto;
    }
    .modal-update-bg h2{
        font-size: 25px;
    }
    .modal-update-button{
        display: flex;
        justify-content: flex-end;
        padding-top: 20px;
    }
    .modal-update-button button{
        margin-left: 10px;
    }
    .modal-update-content label{
        padding-left: 10px;
        padding-right: 20px;
    }
    .modal-update-content input, .modal-update-content select{
        margin-bottom: 10px;
    }
</style>
<div class="modal fade modal-insert" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Sản Phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<!--        <form id="frm-insert" action="<?php echo base_url() ?>admin/products/insert" method="post" enctype="multipart/form-data">-->
            <input type="text" id="namesetting" name="name" placeholder="Nhập tên sản phẩm" class="form-control"/>
            <input type="text" id="pricesetting" name="price" placeholder="Nhập giá sản phẩm" class="form-control"/>
            <input type="text" id="rrpsetting" placeholder="Nhập Giá Gốc" class="form-control"/>
            <input type="file" id="imagesetting" name="image"/>
            <p style="color: green; font-size: 18px; font-weight: 500">Đơn Vị Tính:</p>

          <select id="unitsetting" class="form-control">
                    <?php foreach($units as $unit){?>
                    <option value="<?php echo $unit["id_units"] ?>"><?php echo $unit["unitName"] ?></option>
                    <?php } ?>
                </select>
            
            <p style="color: green; font-size: 18px; font-weight: 500">Danh Mục:</p>
            <select id="portfoliosetting" name="portfolio" class="form-control">
                    <?php foreach($portfolios as $portfolio){?>
                    <option value="<?php echo $portfolio["id_portfolio"] ?>"><?php echo $portfolio["porName"] ?></option>
                    <?php } ?>
                </select>
            <p style="color: green; font-size: 18px; font-weight: 500">Hiển thị:</p>
            <input type="radio" name="hidden" value="0"><label>Có</label>
                <input type="radio" name="hidden" value="1"><label>Không</label>
            <textarea id="descriptioninsert" name="descriptioninsert"></textarea>
<!--          </form>-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="save" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<style>
    .modal .modal-dialog{
        max-width: 600px;
    }
    .modal-insert input, .modal-insert select{
        margin-bottom: 10px;
    }
    #frm-insert label{
        padding-left: 10px;
        padding-right: 20px;
    }
</style>

<script>
    function deleteProduct($id){
        var a= window.confirm("Bạn Có Chắc Muốn Xóa Sản Phẩm Này!");
        if(a == true){
            $.ajax({
                url: '<?php echo base_url() ?>admin/products/deleteAjax',
                type: 'POST',
                dataType: 'html',
                data: {
                    id: $id
                }
            })
            .done(function(data){
                var table = $('#table_id').DataTable();
                table.row($("#id"+$id)).remove().draw();
                } );
            }
        
    }
    $( "#save" ).click(function() {
        var form = createFormData("modal-insert");
        var description = CKEDITOR.instances['descriptioninsert'].getData();
        form.append("description",description);
        
        $.ajax({
            url: '<?php echo base_url()?>admin/products/insertAjax',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form,
            type: 'post',
            success: function (data) {
                alert("Thêm Sản Phẩm Thành Công");
//                renderProduct(data[0]);
//                if(data[0].hidden == 0){
//                    $("#id"+data[0].id+" #hidden").text("có");
//                }
//                else{
//                    $("#id"+data[0].id+" #hidden").text("không");
//                }
                var check = "";
                if(data[0].hidden == 0){
                    check = "checked";
                }
                var t = $('#table_id').DataTable();
                t.row.add( [
                    data[0].id,
                    '<img width="100px" src="<?php echo base_url()?>public/images/products/'+data[0].image+'"/>',
                    data[0].name,
                    data[0].price,
                    data[0].rrp,
                    data[0].quantumDiscount,
                    data[0].unitName,
                    data[0].porName,
                    '<input type="checkbox" '+check+'  />',
                    '<button onclick="update('+data[0].id+')" class="btn btn-primary">Sửa</button>'+
                    '<button onclick="deleteProduct('+data[0].id+')" class="btn btn-warning">Xóa</button>'
                    
                ] ).draw( false );
                
                
            }
        });
        
    });
    function update($id){
        $(".modal-update").show();
        $.ajax({
            url: '<?php echo base_url() ?>admin/products/getproduct',
            type: 'POST',
            dataType: 'json',
            data: {
                id: $id
            }
        })
        .done(function(data){
            console.log(data);
            $(".modal-update #namesetting").val(data[0]["name"]);
            $(".modal-update #pricesetting").val(data[0]["price"]);
            $(".modal-update #unitsetting option").each(function(index){
                if(data[0]["id_unit"] == $(this).val() ){
                    $(this).attr("selected","selected");
                }
            });
            $(".modal-update #portfoliosetting option").each(function(index){
                if(data[0]["id_por"] == $(this).val() ){
                    $(this).attr("selected","selected");
                }
            });
            $(".modal-update input[name=hidden]").each(function(index){
                if(data[0]["hidden"] == $(this).val() ){
                    $(this).attr("checked","checked");
                }
            });
            CKEDITOR.instances['descriptionupdate'].setData(data[0]["description"]);
            $(".modal-update #update-btn").attr("onclick","updateAjax("+data[0]["id"]+")")
        })
        
    }
    function updateAjax($id){
        var name = $(".modal-update #namesetting").val();
        $('#id'+$id+" #name").text(name);
        var price = $(".modal-update #pricesetting").val();
        $('#id'+$id+" #price").text(price);
        $('#id'+$id+" #unit").text($(".modal-update #unitsetting").find(':selected').text());
        $('#id'+$id+" #portfolio").text($(".modal-update #portfoliosetting").find(':selected').text());
        $(".modal-update input[name=hidden]").each(function(index){
                if($(this).prop("checked") == true){
                    if($(this).val() == 0){
                        $('#id'+$id+" #hidden").text("có");
                    }
                    else{
                        $('#id'+$id+" #hidden").text("không");
                    }
                }
        });
        var description = CKEDITOR.instances['descriptionupdate'].getData();
        
        var form = createFormData("modal-update");
        form.append("id",$id);
        form.append("description",description);
        
        $.ajax({
                url: '<?php echo base_url()?>admin/products/updateAjax', // gửi đến file upload.php 
                dataType: 'html',
                cache: false,
                contentType: false,
                processData: false,
                data: form,
                type: 'post',
                success: function (data) {
                    alert("Sản Phẩm Đã Được Chỉnh Sửa");
                    if(data != ""){
                        $('#id'+$id+" #image img").attr("src","<?php echo base_url()?>public/images/products/"+data);
                    }
                }
            });
        
        $(".modal-update").hide();
    }
    function createFormData(modal){
        var form = new FormData();
        var name = $("."+modal+" #namesetting").val();
        var price = $("."+modal+" #pricesetting").val();
        var rrp = $("."+modal+" #rrpsetting").val();
        if(rrp == ""){
            rrp = 0;
        }
        var unit_id = $("."+modal+" #unitsetting").find(':selected').val();
        var por_id = $("."+modal+" #portfoliosetting").find(':selected').val();
        var hidden =0;
        $("."+modal+" input[name=hidden]").each(function(index){
                if($(this).prop("checked") == true){
                    if($(this).val() == 0){
                        hidden = 0;
                    }
                    else{
                        hidden = 1;
                    }
                }
        });
        var file_data = $("."+modal+" #imagesetting").prop('files')[0];
        if(file_data){
            var type = file_data.type;
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];
            if (type == match[0] || type == match[1] || type == match[2] || type== match[3]) {
                form.append("image", file_data);
            }
        }
        form.append("name",name);
        form.append("price",price);
        form.append("rrp",rrp);
        form.append("unit_id",unit_id);
        form.append("por_id",por_id);
        form.append("hidden",hidden);
        
        return form;
        
    }
    function renderProduct(product){
        var item = $('<tr id="id'+product.id+'">'+
            '<td>'+product.id+'</td>'+
            '<td id="image"><img width="100px" src="<?php echo base_url()?>public/images/products/'+product.image+'"/></td>'+
            '<td id="name">'+product.name+'</td>'+
            '<td id="price">'+formatCurrency(product.price.toString())+'</td>'+
            '<td id="unit">'+product.unitName+'</td>'+
            '<td id="portfolio">'+product.porName+'</td>'+
            '<td id="hidden"></td>'+
            '<td>'+
                '<button onclick="update('+product.id+')" class="btn btn-primary">Sửa</button>'+
                '<button onclick="deleteProduct('+product.id+')" class="btn btn-warning">Xóa</button>'+
            '</td>'+
        '</tr>');
        
        item.insertBefore($(".list-products tbody tr:first-child"));
    }
    function formatCurrency(number){
            var n = number.split('').reverse().join("");
            var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
            return  n2.split('').reverse().join('');
    }
    $(document).ready(function(){
        $(".modal-update").hide();
        $("#update-close-btn").on("click",function(){
            $(".modal-update").hide();
        })
        $('#table_id').DataTable();
    })
    var table = $('#table_id').DataTable();
 
    $('#table_id #id').on( 'click', 'button.deletebn', function () {
        table.row( $(this).parent ).remove().draw();
    } );
   
</script>
<script src="https://cdn.ckeditor.com/4.11.4/standard-all/ckeditor.js"></script>
<script type="text/javascript">
//    CKEDITOR.replace("description");
//    CKEDITOR.replace("descriptionupdate");
//    CKEDITOR.disableAutoInline = true;
//    CKEDITOR.inline('descriptioninsert', {
//        extraPlugins: 'sourcedialog'
//    });
    CKEDITOR.replace('descriptioninsert',{
		        filebrowserBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html',
		        filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Images',
		        filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Flash',
		        filebrowserUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		        filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		        filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		        });
    CKEDITOR.replace('descriptionupdate',{
		        filebrowserBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html',
		        filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Images',
		        filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder.html?type=Flash',
		        filebrowserUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		        filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		        filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		        });
</script>