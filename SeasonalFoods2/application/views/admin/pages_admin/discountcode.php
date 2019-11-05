<div class="products-heading">
    <h1><i class="fab fa-free-code-camp"></i>Mã Giảm Giá</h1>
    <a href="<?php echo base_url()?>admin/discountcode/insertdiscount" class="btn btn-success" >Thêm Giảm Giá</a>
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
<div class="list-discount">
    <table class="table table-bordered text-center" id="table_id">
        <thead style="background-color: #3b9f5e;">
            <th>ID</th>
            <th>Tên Giảm Giá</th>
            <th>Số Lượng Giảm</th>
            <th>Giảm Giá Từ</th>
            <th>Giảm Giá Đến</th>
            <th>Tình Trạng</th>
            <th>Thao Tác</th>
        </thead>
        <tbody>
            <?php foreach($discounts as $discount){ ?>
            <tr>
                <td><?php echo $discount["id_discountcode"] ?></td>
                <td><?php echo $discount["discountName"] ?></td>
                <td><?php echo number_format($discount["quantumDiscount"]) ?> %</td>
                <td><?php echo date("d-m-Y",strtotime($discount["dateFrom"])) ?></td>
                <td><?php echo date("d-m-Y",strtotime($discount["dateTo"])) ?></td>
                <td class="checkboxTwo">
                    <input type="checkbox" id="checkboxTwoInput" <?php echo $discount["hiddencode"]==0 ? " checked = 'checked'":"" ?> />
                    <label for="checkboxTwoInput"></label>
                </td>
                <td>
                    <a href="#" class="btn btn-primary">Sửa</a>
                    <button class="btn btn-warning">Xóa</button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<style>
    .list-discount{
        padding-top: 20px;
    }
    .checkboxTwo {
        width: 120px;
        height: 40px;
        background: #333;
        border-radius: 50px;
        position: relative;
        display: inline-block;
        margin-top: 5px;
    }
    .checkboxTwo:before {
        content: '';
        position: absolute;
        top: 19px;
        left: 14px;
        height: 2px;
        width: 90px;
        background: #111;
    }
    .checkboxTwo label {
        display: block;
        width: 22px;
        height: 22px;
        border-radius: 50%;

        -webkit-transition: all .5s ease;
        -moz-transition: all .5s ease;
        -o-transition: all .5s ease;
        -ms-transition: all .5s ease;
        transition: all .5s ease;
        cursor: pointer;
        position: absolute;
        top: 9px;
        z-index: 1;
        left: 12px;
        background: #ddd;
    }
    .checkboxTwo input[type=checkbox]:checked + label {
        left: 84px;
        background: #26ca28;
    }
    .checkboxTwo input[type=checkbox]{
/*        opacity: 0;*/
    }
</style>
<script>
</script>
