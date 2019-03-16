<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
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
                            <h3 align="center" >THÊM SẢN PHẨM</h3>
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


                                <!--
                                ---------------------------------------------------------------
                                -->


                                <!--- -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

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
                    <h3 align="center">XÓA SẢN PHẨM</h3>
                    <hr>

                    <!--

                    phan cach them-xoa sp
                    -->

                    <form role="form" method="POST"
                          action="http://localhost/quan-ly-ban-hang/public/index.php/products/add_to_db">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Tên Sản Phẩm  </label>
                                <select name="name">
                                    <option value="volvo"></option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
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


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </form>


                    <!--
                            phan canh

                    -->
                    </aside>
                    <div class="control-sidebar-bg"></div>
                </div>
            </div>
        </section>
    </header>

</body>
</html>


<!--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>-->
<!--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
<!--<script src="../../bower_components/fastclick/lib/fastclick.js"></script>-->
<!--<script src="../../dist/js/adminlte.min.js"></script>-->
<!--<script src="../../dist/js/demo.js"></script>-->