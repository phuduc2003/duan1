
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự ánY</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .product-title {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .price {
            font-size: 1.5rem;
            color: #28a745;
            font-weight: bold;
        }

        .old-price {
            text-decoration: line-through;
            color: #888;
            margin-left: 10px;
        }

        .product-description {
            line-height: 1.8;
            color: #555;
        }

        .quantity-input {
            width: 80px;
            text-align: center;
        }

        .btn-buy-now {
            background-color: #007bff;
            border: none;
            color: white;
            transition: background-color 0.3s;
        }

        .btn-buy-now:hover {
            background-color: #0056b3;
        }

        .related-products img {
            transition: transform 0.3s;
        }

        .related-products img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">adminnqt</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="?act=admin-home" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>category </span>
                    </a>
                </li>
                
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Task</span>
                    </a>
                </li> -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Product Management</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-sanpham" class="sidebar-link">Product List</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-create" class="sidebar-link">Add Product</a>
                        </li> 
                        <li class="sidebar-item">
                            <a href="?act=admin-HienSanPham" class="sidebar-link">Show Product </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Account Management</span>
                    </a>
                    <!-- <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                               Quản Lý
                            </a>
                            <ul style="background-color: #1A2035;" id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="?act=admin-listuser" class="sidebar-link">Danh Sách Quan Lý</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-create" class="sidebar-link">Thêm Quản Lý</a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
                </li>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two1" aria-expanded="false" aria-controls="multi-two1">
                                CLIENT, ADMIN
                            </a>
                            <ul style="background-color: #1A2035;" id="multi-two1" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="?act=admin-listuser" class="sidebar-link">List Account</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-create" class="sidebar-link">Add Account</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-AnUser" class="sidebar-link">Show Account </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth1" aria-expanded="false" aria-controls="auth1">
                        <i class="lni lni-protection"></i>
                        <span>Order Management</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth1" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-donhang" class="sidebar-link">Order List</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-andonhang" class="sidebar-link">Show Order</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Comment Management</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
            <a href="?act=logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
            <!-- <form action="#" class="d-none d-sm-inline-block">
                       <div class="input1">
                    <input type="text" name="" id="" placelado="tim">
                   </div>
                   <div class="icon">
                    <box-icon name='search-alt'></box-icon>
                         </div>
                </form> -->
                <div class="navbar-collapse collapse">
             
                    <ul class="navbar-nav ms-auto">
                         <!-- <box-icon name='envelope'></box-icon> -->
                        <li class="nav-item dropdown"> Admin
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            
                                <img src="uploads/avata.jpg" class="avatar img-fluid" alt="">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end rounded">

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <?php foreach ($danhSach_SP as $value) : ?>  
            <div class="container mt-5"> 
                <h1>Product Details</h1> <br>
        <!-- Product Details -->
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $value["hinh_anh"] ?>" alt="Product Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h1 class="product-title"><?= $value["ten_san_pham"]  ?></h1>
                <p class="price">$<?= $value["gia_san_pham"] ?> <span class="old-price">$<?= $value["gia_khuyen_mai"]  ?></span></p>
                <p class="product-description">
                <?= $value["mo_ta"]?>
                </p>

                <!-- Quantity and Buttons -->
                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="me-2">Quantity:</label>
                    <input type="number" id="quantity" class="form-control quantity-input me-3" value="1" min="1">
                    <button class="btn btn-success me-2">Add to Cart</button>
                    <button class="btn btn-buy-now">Buy Now</button>
                </div>

                <!-- Additional Information -->
                <p><strong>Category:</strong> <?= $value["danh_muc_id"]?></p>
                <p><strong>Availability:</strong> <?= $value["trang_thai"]?></p>
            </div>
        </div>
        <?php endforeach; ?>
        

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="style/style.js"></script>
</body>

</html>
</body>

</html>