<div class="products-heading">
    <h1><i class="fas fa-shopping-bag"></i>Đơn Vị Tính</h1>
    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Thêm Mới</button>
</div>
<div class="list-products">
    <table class="table table-bordered text-center" id="table_id">
        <thead style="background-color: #3b9f5e;">
            <th>ID</th>
            <th>Đơn Vị Tính</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach($units as $unit){ ?>
        <tr id="id<?php echo $unit["id"] ?>">
            <td><?php echo $unit["id"] ?></td>
            <td><?php echo $unit["unitName"] ?></td>
            <td>
                <button class="btn btn-warning">Xóa</button>
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