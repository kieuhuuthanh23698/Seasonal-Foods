<div class="back-page">
    <ul>
        <li><a href="<?php echo base_url()?>admin/discountcode">Mã Giảm Giá</a></li>>
        <li>Thêm Mã Giảm Giá</li>
    </ul>
</div>
<hr/>
<style>
    .back-page{
        padding-top: 20px;
        color: black;
        font-weight: 500;
    }
    .back-page ul{
        list-style: none;
        padding-left: 0;
    }
    .back-page ul li{
        display: inline-block;
        color: greenyellow;
    }
    .back-page ul a{
        text-decoration: none;
        color: green;
    }
</style>
<div class="discount-inf">
    <h1>Chi Tiết Giảm Giá</h1>
    <div class="discount-inf-content">
        <table class="table table-bordered text-center">
            <tr>
                <td>Tên Giảm Giá</td>
                <td><input type="text" class="form-control"/></td>
                <td>Giá Trị Giảm (%)</td>
                <td>
                    <input type="text" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Giảm Giá Từ Ngày</td>
                <td><input type="text" class="form-control"/></td>
                <td>Đến Ngày</td>
                <td><input type="text" class="form-control"/></td>
            </tr>
        </table>
    </div>
</div>
<style>
    .discount-inf h1{
        font-size: 30px;
        margin-top: 20px;
        margin-bottom: 30px;
    }
</style>
<div class="products-heading">
    <h1>Sản Phẩm Áp Dụng</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#addproduct" >Thêm Sản Phẩm</button>
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
</style>
<div class="product-list">
    <table class="table table-bordered text-center" id="">
        <thead style="background-color: #3b9f5e;">
            <th>ID</th>
            <th colspan="2">Sản Phẩm</th>
            <th>Giá</th>
            <th>ĐVT</th>
            <th>Danh Mục</th>
            <th>Hiển Thị</th>
            <th></th>
        </thead>
        <tbody>
        </tbody>
    </table>

</div>
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm Sản Phẩm Giảm Giá</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-bordered text-center" id="">
                <thead style="background-color: #3b9f5e;">
                    <th><input type="checkbox"/></th>
                    <th>ID</th>
                    <th colspan="2">Sản Phẩm</th>
                    <th>Giá Bán</th>
                    <th>Giá Gốc</th>
                    <th>Hiển Thị</th>
                </thead>
                <tbody>
                    <?php foreach($productAdds as $productAdd){?>
                    <tr>
                        <td><input type="checkbox" value="<?php echo $productAdd["id"] ?>"/></td>
                        <td><?php echo $productAdd["id"] ?></td>
                        <td><img width="100px" src="<?php echo base_url()?>public/images/products/<?php echo $productAdd["image"] ?>"></td>
                        <td><?php echo $productAdd["name"] ?></td>
                        <td><?php echo number_format($productAdd["price"]) ?></td>
                        <td><?php echo number_format($productAdd["rrp"]) ?></td>
                        <td><?php echo ($productAdd["hidden"]==0)?"có":"không" ?></td>
                    </tr>
                
                    <?php }?>
                </tbody>
          </table>
          <div class="attention">
              <p><span>Lưu ý: </span> mỗi sản phẩm chỉ được áp dụng một mã giảm giá; mặc định sẽ lấy giá bán để áp dụng</p>
          </div>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<style>
    #addproduct input[type="checkbox"]{
        cursor: pointer;
    }
    #addproduct .modal-dialog{
        max-width: 70%;
    }
    #addproduct .attention span{
        color: red;
        font-weight: 500;
    }
</style>