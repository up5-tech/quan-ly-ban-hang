<div class="box-header with-border">
    <form action="http://localhost/quan-ly-ban-hang/public/index.php/products/insert_product">
        <button type="" data-width="75" data-height="50"> << Quay về <<</button>
        <br><br>
    </form>
    <a href="http://localhost/quan-ly-ban-hang/public/">
        <center><b><img src="../../image/circle.png" width="500" height="150"></b></center>
    </a><br>
    <u><h4 align="left">THÊM SẢN PHẨM</h4></u>
</div>
<header>
    <style>
        body{
            background-color:lightseagreen ;
        }
    </style>
</header>
<body>
<br><br>
<form method='get' action="http://localhost/quan-ly-ban-hang/public/index.php/products/update_product">
    <?php
    $model = new \App\Controllers\Products();
    $product = $model->edit_product();
    ?>
    <table Border=1>
        <tr>
            <td align="center">ID</td>
            <td align="center">TÊN SP</td>
            <td align="center">SỐ LƯỢNG</td>
            <td align="center">GIÁ NHẬP</td>
            <td align="center">GIÁ XUẤT</td>
            <td align="center">HÌNH ẢNH</td>
            <td align="center">GHI CHÚ</td>
        </tr>
        <?php
        $model = new \App\Controllers\Products();
        $product = $model->edit_product();
        foreach ($product
                 as $_product) {
            ?>
            <tr>
            <td><?php echo $_product['id'] ?></td>
            <td><input name='edit_name' type='text' value="<?php echo $_product['name'] ?>"></td>
            <td><input name='edit_quantity' type='text' value="<?php echo $_product['quantity'] ?>"></td>
            <td><input name='edit_price_import' type='text' value="<?php echo $_product['price_import'] ?>"></td>
            <td><input name='edit_price_export' type='text' value="<?php echo $_product['price_export'] ?>"></td>
            <td><input name='edit_img_name' type='text' value="<?php echo $_product['image_name'] ?>"></td>
            <td><input name='edit_note' type='text' value="<?php echo $_product['note'] ?>"></td>
            <td hidden> <input hidden name='edit_id_' value="<?php echo $_product['id'] ?>" ></td>

            </tr><?php } ?>
        <table>
            <table>
                <tr><br>
                    <td>
                        <button type="submit" data-width="45" data-height="50">Lưu</button>
                    </td>
                </tr>
            </table>
</form>

</body>