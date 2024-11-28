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
    <!-- Top bar End -->

    <!-- Nav Bar Start -->

    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->

    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Register</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Login Start -->
    <div class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?= BASE_URL . '?act=them-register' ?>" method="post">
                        <div class="register-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" name="ho_ten" type="text" placeholder="Name">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                        <?php unset($_SESSION['error']['ho_ten']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input class="form-control" name="so_dien_thoai" type="text" placeholder="Phone">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                        <?php unset($_SESSION['error']['so_dien_thoai']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Birth</label>
                                    <input class="form-control" name="ngay_sinh" type="date" placeholder="E-mail">
                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                        <?php unset($_SESSION['error']['ngay_sinh']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Email">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                        <?php unset($_SESSION['error']['email']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="mat_khau" type="text" placeholder="Password">
                                    <?php if (isset($_SESSION['error']['mat_khau'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['mat_khau'] ?></p>
                                        <?php unset($_SESSION['error']['mat_khau']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input class="form-control" name="dia_chi" type="text" placeholder="Address">
                                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                        <?php unset($_SESSION['error']['dia_chi']);  ?>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Gender</label>
                                    <select id="inputStatus" name="gioi_tinh" class="form-control custom-select">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <input type="hidden" name="chuc_vu_id" value="2">
                                <input type="hidden" name="trang_thai" value="1">
                                <div class="col-md-12">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Login End -->

    <!-- Footer Start -->

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