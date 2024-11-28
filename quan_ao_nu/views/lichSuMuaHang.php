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
    <?php if (isset($_SESSION['success_message'])): ?>
    <div class="alert alert-success" role="alert" style="text-align: center; margin-bottom: 20px;">
        <?= $_SESSION['success_message']; ?>
    </div>
    <?php unset($_SESSION['success_message']); // Xóa thông báo sau khi hiển thị ?>
<?php endif; ?>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=sanpham' ?>">Products</a></li>
                <li class="breadcrumb-item active">History</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                <?php
                                      foreach($donHangs as $donHang) :
                                ?>
                                       <tr>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                        <td><?=formatPrice($donHang['tong_tien'] ) ?> $</td>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                        <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                        <td>
                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id']?>" class="btn btn-sqr">Chi tiết đơn hàng</a>
                                            <?php if($donHang['trang_thai_id'] == 1) : ?>
                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id']?>" class="btn btn-sqr" onclick="return confirm('Bạn có muốn chắc chắn hủy đơn không')" >
                                                    Hủy
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                       </tr>
                                <?php
                                  endforeach
                                ?>
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