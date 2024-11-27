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
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Cart</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php $tongGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham): ?>
                                        <tr>
                                            <td>
                                                <div class="img">
                                                    <a
                                                        href="<?= BASE_URL . '?act=chitietsanpham&id_san_pham=' . $sanPham['san_pham_id'] ?>"><img
                                                            src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Image"></a>
                                                    <p><?= $sanPham['ten_san_pham'] ?></p>
                                                </div>
                                            </td>
                                            <td>$<?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                    <?= formatPrice($sanPham['gia_khuyen_mai']) ?>
                                                <?php } else { ?>
                                                    <?= formatPrice($sanPham['gia_san_pham']) ?>
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <div class="qty">
                                                    <button class="btn-minus"
                                                        onclick="changeQuantity(-1, <?= $sanPham['san_pham_id'] ?>)"><i
                                                            class="fa fa-minus"></i></button>
                                                    <input type="text" value="<?= $sanPham['so_luong'] ?>"
                                                        id="quantity-<?= $sanPham['san_pham_id'] ?>" readonly>
                                                    <button class="btn-plus"
                                                        onclick="changeQuantity(1, <?= $sanPham['san_pham_id'] ?>)"><i
                                                            class="fa fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td>$
                                                <?php
                                                $tongTien = 0;
                                                if ($sanPham['gia_khuyen_mai']) {
                                                    $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                } else {
                                                    $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                }
                                                $tongGioHang += $tongTien;
                                                echo formatPrice($tongTien)
                                                    ?>
                                            </td>
                                            <td><button><i class="fa fa-trash"></i></button></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="coupon">
                                    <input type="text" placeholder="Coupon Code">
                                    <button>Apply Code</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h1>Cart Summary</h1>
                                        <p>Sub Total<span>$<?= formatPrice($tongGioHang) ?></span></p>
                                        <p>Shipping Cost<span>$1</span></p>
                                        <h2>Grand Total<span>$<?= formatPrice($tongGioHang + 1) ?></span></h2>
                                    </div>
                                    <div class="cart-btn">
                                        <a class="btn" href="#"  style="width:40%;height:70%">Update Cart</a>

                                        <a class="btn" href="<?= BASE_URL . '?act=thanh-toan' ?>"
                                            style="width:40%;height:70%">Checkout</a>

                                    </div>
                                </div>
                            </div>
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