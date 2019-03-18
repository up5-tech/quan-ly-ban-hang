<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CHỈNH SỬA SẢN PHẨM</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <form action="http://localhost/quan-ly-ban-hang/public/">
                                <button type="" data-width="75" data-height="50"> << Quay về <<</button>
                                <br><br>
                            </form>
                            <a href="http://localhost/quan-ly-ban-hang/public/">
                                <center><b><img src="../../image/circle.png" width="500" height="150"></b></center>
                            </a><br>
                            <u><h4 align="left">THÊM SẢN PHẨM</h4></u>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST"
                              action="http://localhost/quan-ly-ban-hang/public/index.php/products/add_to_db">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="">Số Lượng</label>
                                    <input type="text" onkeypress=" return isNumberKey(event)" class="form-control"
                                           name="quantity">
                                </div>

                                <div class="form-group">
                                    <label for="">Giá Nhập</label>
                                    <input type="text" onkeypress=" return isNumberKey(event)" class="form-control"
                                           name="price_import">
                                </div>

                                <div class="form-group">
                                    <label for="">Giá Bán</label>
                                    <input type="text" onkeypress=" return isNumberKey(event)" class="form-control"
                                           name="price_export">
                                </div>

                                <div class="form-group">
                                    <label for="">Ghi Chú</label>
                                    <input type="text" class="form-control" name="note">
                                </div>

                                <div class="form-group">
                                    <label for="name_img">Ảnh</label>
                                    <input type="file" id="name_img" name="name_img">
                                    <p class="help-block">Ảnh sản phẩm</p>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" onclick="">Submit</button>
                                </div>
                        </form>
                        </form>
                    </div>

                    <script>
                        function isNumberKey(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode;
                            if (charCode == 59 || charCode == 46)
                                return true;
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                                return false;
                            return true;
                        }
                    </script>

                    <hr>
                    <u><h4 align="left">XÓA SẢN PHẨM</h4></u>
                    <hr>

                    <div class="box-body">

                        <br>
                        <B>
                            <h4 align="left">XÓA THEO ID</h4>
                        </B>
                        <form method="get"
                              action=" http://localhost/quan-ly-ban-hang/public/index.php/products/delete_product">
                            <input name="id_del">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Xóa</button>
                            </div>

                        </form>

                        <div class="form-group">
                            <h3><label for="">BẢNG THÔNG TIN SẢN PHẨM</label></h3>
                            <table border="1" width="100%">
                                <tr>
                                    <td align="center">ID</td>
                                    <td align="center">TÊN SP</td>
                                    <td align="center">SỐ LƯỢNG</td>
                                    <td align="center">GIÁ NHẬP</td>
                                    <td align="center">GIÁ XUẤT</td>
                                    <td align="center">HÌNH ẢNH</td>
                                    <td align="center">GHI CHÚ</td>
                                    <td align="center">CHỨC NĂNG</td>
                                </tr>

                                <?php
                                $model = new \App\Controllers\Products();
                                $show_product = $model->show_all_product();
                                foreach ($show_product
                                         as $product) {
                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $product['id']; ?></td>
                                        <td align="center"><?php echo $product['name']; ?></td>
                                        <td align="center"><?php echo $product['quantity']; ?></td>
                                        <td align="center"><?php echo $product['price_import']; ?></td>
                                        <td align="center"><?php echo $product['price_export']; ?></td>
                                        <td align="center"><br>
                                            <img src="../../image/<?php echo $product['image_name'] ?>" width=75
                                                 height=75>
                                            <br><?php echo $product['image_name']; ?>
                                        </td>
                                        <td align="center"><?php echo $product['note']; ?></td>
                                        <!--  button xóa-sửa làm khongbiet lam T_T-->

                                        <td align="center">
                                            <form action="http://localhost/quan-ly-ban-hang/public/index.php/products/delete_product"
                                                  method="get">
                                                <input hidden name="id_del" value="<?php echo $product['id']; ?>"><br>
                                                <button type="submit" data-width="45" data-height="50">Xóa</button>
                                                <br>
                                            </form>

                                            <form action="http://localhost/quan-ly-ban-hang/public/index.php/products/show_edit_product"
                                                  method="get">
                                                <input hidden name="id_edit" value="<?php echo $product['id']; ?>"><br>
                                                <button type="submit" data-width="45" data-height="50">Sửa</button>
                                                <br>
                                            </form>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <!--- -------------------------------- -->

                            <!--- -------------------------------- -->
                        </div>
                    </div>
                </div>
                <!--                </form>-->
                <!--
                        phan canh

                -->
                </aside>
                <div class="control-sidebar-bg"></div>
            </div>
</div>
</section>
</header>
</div>

<!----------- -->


<!-- -->
</body>
</html>


<!--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>-->
<!--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!--<script src="../../bower_components/fastclick/lib/fastclick.js"></script>-->
<!--<script src="../../dist/js/adminlte.min.js"></script>-->
<!--<script src="../../dist/js/demo.js"></script>-->