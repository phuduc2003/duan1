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
    <link href="./css/style.css" rel="stylesheet">
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
                <li class="breadcrumb-item active">Product Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="Product Image">
                                    <?php endforeach ?>
                                </div>
                                <div class="product-slider-single-nav normal-slider">
                                    <?php foreach ($listAnhSanPham as $key => $anhSanPham): ?>
                                        <div class="slider-nav-img"><img
                                                src="<?= BASE_URL . $anhSanPham['link_hinh_anh'] ?>" alt="Product Image">
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?= $sanPham['ten_san_pham'] ?></h2>
                                    </div>

                                    <div class="price">
                                        <h4>Price:</h4>
                                        <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                            <p>$<?= formatPrice($sanPham['gia_khuyen_mai']) ?></p>
                                            <span>$<?= formatPrice(price: $sanPham['gia_san_pham']) ?></span>
                                        <?php } else { ?>
                                            <p>$<?= formatPrice($sanPham['gia_san_pham']) ?></p>
                                        <?php } ?>
                                    </div>
                                    
                                    <div class="price">
                                    <h4>Số lượng</h4>
                                    <p><?= $sanPham['so_luong']?> trong kho</p>  
                                    </div>
                                
                                    <div class="p-size">
                                        <h4>Size:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">S</button>
                                            <button type="button" class="btn">M</button>
                                            <button type="button" class="btn">L</button>
                                            <button type="button" class="btn">XL</button>
                                        </div>
                                       
                                    
                                  
                                    </div>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                    <div class="quantity">
                                    <h4>Quantity:</h4>
                                        <div class="qty">
                                            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                            <button class="btn-minus" type="button"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1" name="so_luong">
                                            <button class="btn-plus" type="button"><i class="fa fa-plus"></i></button>
                                        </div>
                                        </div>
                                    <div class="action_link">
                                        <button class="btn" ><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                        <!-- <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a> -->
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                </li>
                              
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (<?= $countComment = count($listBinhLuan); ?>)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Product description</h4>
                                    <p>
                                      <?= $sanPham['mo_ta'] ?>
                                    </p>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                <?php foreach ($listBinhLuan as $binhLuan): ?>
                                    <div class="reviews-submitted">
                                   
                                        <div class="reviewer"><?= $binhLuan['ho_ten'] ?>  <span>| <?= $binhLuan['ngay_dang'] ?></span></span></div>
                                        
                                      
                                     <p><?= $binhLuan['noi_dung'] ?></p>
                                    
                                    </div>
                                    <?php endforeach; ?>
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="row form">
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Sản phẩm liên quan</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
                        
                          
                            
                        <?php foreach( $listSanPhamCungDanhMuc as $key=>$sanPhamDanhMuc): ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-title">
                            <a href="#"><?= $sanPhamDanhMuc['ten_san_pham']?></a>
                        </div>
                        <div class="product-image">
                            <a href="<?= BASE_URL.'?act=chitietsanpham&id_san_pham=' . $sanPhamDanhMuc['id']?>">
                                <img src="<?= BASE_URL .$sanPhamDanhMuc['hinh_anh'] ?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="product-price">
                            <?php if($sanPhamDanhMuc['gia_khuyen_mai']){?>
                            <h3><?= formatPrice($sanPhamDanhMuc['gia_khuyen_mai']) ?>$</h3>
                            <h3 style="color:red"><del><?= formatPrice($sanPhamDanhMuc['gia_san_pham'])?>$</del></h3>
                             <a href="<?= BASE_URL.'?act=chitietsanpham&id_san_pham=' . $sanPhamDanhMuc['id']?>">
                            <a class="btn" href="<?= BASE_URL.'?act=chitietsanpham&id_san_pham=' . $sanPhamDanhMuc['id']?>"><i class="fa fa-shopping-cart"></i>Detail</a>
                            <?php }else{ ?> 
                            <h3><?= formatPrice($sanPhamDanhMuc['gia_san_pham'])?>$</h3>
                            <a class="btn" href="<?= BASE_URL.'?act=chitietsanpham&id_san_pham=' . $sanPhamDanhMuc['id']?>"><i class="fa fa-shopping-cart"></i>Detail</a>
                            <?php } ?>
                        </div>
                        </div>
                       
                    </div>
                    <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title"><?= $sanPham['ten_danh_muc'] ?></h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets &
                                        Accessories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics &
                                        Accessories</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-7.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-8.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                            <div class="product-item">
                                <div class="product-title">
                                    <a href="#">Product Name</a>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                <div class="product-image">
                                    <a href="product-detail.html">
                                        <img src="img/product-9.jpg" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                        <a href="#"><i class="fa fa-cart-plus"></i></a>
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <h3><span>$</span>99</h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            <li><a href="#">Nulla </a><span>(45)</span></li>
                            <li><a href="#">Curabitur </a><span>(34)</span></li>
                            <li><a href="#">Nunc </a><span>(67)</span></li>
                            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                            <li><a href="#">Fusce </a><span>(89)</span></li>
                            <li><a href="#">Sagittis</a><span>(28)</span></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->

    <!-- Footer Start -->
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