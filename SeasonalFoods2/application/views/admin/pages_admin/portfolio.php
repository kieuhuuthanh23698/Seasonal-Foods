<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Danh Mục Sản Phẩm</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button>
</div>
<div class="list-por">
    <table class="table table-bordered text-center" id="table_id">
        <thead style="background-color: #3b9f5e;">
            <th>ID</th>
            <th>Đơn Vị Tính</th>
            <th>Ngày Tạo</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach($portfolios as $portfolio){ ?>
        <tr id="id<?php echo $portfolio["id"] ?>">
            <td><?php echo $portfolio["id"] ?></td>
            <td><?php echo $portfolio["porName"] ?></td>
            <td><?php echo $portfolio["por_create_at"] ?></td>
            <td>
                <button onclick="deletePor(<?php echo $portfolio["id"] ?>)"  class="btn btn-warning">Xóa</button>
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
    .list-por{
        padding-top: 20px;
        padding-right: 20px;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <input type="text" id="porName" class="form-control" placeholder="Nhập Tên Danh Mục"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id='savePor' type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    $("#savePor").on("click",function(){
        var porName = $(".modal #porName").val();
        if(porName == ""){
            alert("Nhập Tên Danh Mục");
            return;
        }
        $.ajax({
            url: '<?php echo base_url() ?>admin/portfolio/insert',
            type: 'POST',
            dataType: 'json',
            data: {
                porName: porName
            }
        })
        .done(function(data){
            alert("Thêm Sản Phẩm Thành Công");
           renderPor(data);      
        })
    })
    function renderPor(por){
        $item = $('<tr id="id<?php echo $portfolio["id"] ?>">'+
            '<td><?php echo $portfolio["id"] ?></td>'+
            '<td><?php echo $portfolio["porName"] ?></td>'+
            '<td><?php echo $portfolio["por_create_at"] ?></td>'+
            '<td><button  class="btn btn-warning">Xóa</button></td>'+
        '</tr>');
        $item.insertBefore($(".list-por tbody tr:first-child"));
    }
    function deletePor($id){
        var answer = confirm("Bạn Có Chắc Muốn Xóa Danh Mục Này!");
        if(answer){
            $.ajax({
            url: '<?php echo base_url() ?>admin/portfolio/delete',
            type: 'POST',
            dataType: 'html',
            data: {
                id: $id
            }
        })
        .done(function(data){
            alert(data);      
        })
        }
          
    }
</script>