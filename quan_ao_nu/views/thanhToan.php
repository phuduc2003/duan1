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

    <!-- Top bar End -->

    <!-- Nav Bar Start -->
    <?php require './views/layout/header.php'; ?>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=sanpham' ?>">Products</a></li>
                <li class="breadcrumb-item active">Checkout</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Start -->
    <div class="checkout">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-inner">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan"
                                        value="<?= $user['ho_ten'] ?>" placeholder="First Name" required>
                                </div>

                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="email" id="email_nguoi_nhan"
                                        name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="E-mail"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input class="form-control" type="text" id="dia_chi_nguoi_nhan"
                                        name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Address"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
                                        value="<?= $user['so_dien_thoai'] ?>" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Note</label>
                                    <textarea class="form-control" type="text" id="ghi_chu" name="ghi_chu"
                                        placeholder="Note" cols="30" row="3"></textarea>
                                </div>
                                <!-- <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Create an account</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Ship to different address</label>
                                        </div>
                                    </div> -->
                            </div>
                        </div>

                        <div class="shipping-address">
                            <h2>Shipping Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected>United States</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-inner">
                        <div class="checkout-summary">
                            <h1>Cart Total</h1>
                            <?php $tongGioHang = 0;
                            foreach ($chiTietGioHang as $key => $sanPham): ?>


                                <p><?= $sanPham['ten_san_pham'] ?> <strong> x <?= $sanPham['so_luong'] ?> </strong>
                                <span> 
                                    <?php
                                      $tongTien = 0;
                                      if ($sanPham['gia_khuyen_mai']) {
                                          $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                      } else {
                                          $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                      }
                                      $tongGioHang += $tongTien;
                                      echo formatPrice($tongTien)?>
                                          </span>
                                        </p>



                            <?php endforeach ?>
                            <p class="sub-total">Sub Total<span>
                               <?= formatPrice($tongGioHang)?>
                                </span></p>
                            <p class="ship-cost">Shipping Cost<span>$1</span></p>
                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 1 ?>">
                            <h2>Grand Total<span><?= formatPrice($tongGioHang + 1) ?></span></h2>
                        </div>
                        <div class="checkout-payment">
                            <div class="payment-methods">
                                <h1>Payment Methods</h1>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-1" value="2" name="phuong_thuc_thanh_toan_id">
                                        <label class="custom-control-label" for="payment-1">Online payment</label>
                                    </div>
                                    <div class="payment-content" id="payment-1-show">
                                        <p>
                                        Customers need to make an online payment.
                                        </p>
                                    </div>
                                </div>
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="payment-2" value="1" name="phuong_thuc_thanh_toan_id">
                                        <label class="custom-control-label" for="payment-2">Cash on Delivery</label>
                                    </div>
                                    <div class="payment-content" id="payment-2-show">
                                        <p>
                                        Customers can pay after successfully receiving the goods
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-btn">
                                <button type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Checkout End -->

    <!-- Footer Start -->

    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <?php require './views/layout/footer.php'; ?>
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