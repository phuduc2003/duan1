<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Top bar Start -->
    <?php require './views/layout/header.php'; ?>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= BASE_URL?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=sanpham' ?>">Products</a></li>
                <li class="breadcrumb-item active">Bill Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <!--Thông tin sản phẩm của đơn hàng-->
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="5">Thông tin sản phẩm</th>
                                    </tr>

                                </thead>
                                <tbody class="align-middle">
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá </th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                       
                                    </tr>
                                    <?php foreach ($chiTietDonHang as $item): ?>
                                        <tr>
                                            <td> <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Image" width="50px"></td>
                                            <td><?=  $item['ten_san_pham']?></td>
                                            <td><?= formatPrice($item['don_gia']) ?> </td>
                                            <td><?=  $item['so_luong']?></td>
                                            <td><?=  formatPrice($item['thanh_tien'])?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                              
                                    <tr>
                                        <th colspan="5">Phí ship : $1</th>
                                    </tr>

                               
                            
                            </table>
                           
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <!--Thông tin đơn hàng-->
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2">Thông tin sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                              
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th><?=$donHang['ma_don_hang'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Người nhận</th>
                                        <th><?=$donHang['ten_nguoi_nhan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Email người nhận</th>
                                        <th><?=$donHang['email_nguoi_nhan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại người nhận</th>
                                        <th><?=$donHang['sdt_nguoi_nhan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ người nhận</th>
                                        <th><?=$donHang['dia_chi_nguoi_nhan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Ngày đặt</th>
                                        <th><?=$donHang['ngay_dat'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tổng tiền</th>
                                        <th><?=formatPrice($donHang['tong_tien']) ?></th>
                                    </tr>
                                    <tr>
                                        <th>Ghi chú</th>
                                        <th><?=$donHang['ghi_chu'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Phương thức thanh toán</th>
                                        <th><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Trạng thái</th>
                                        <th><?=$trangThaiDonHang[$donHang['trang_thai_id']] ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Cart End -->

    <!-- Footer Start -->
    <?php require './views/layout/footer.php'; ?>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                    <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                </div>

                <div class="col-md-6 template-by">
                    <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>