<?php session_start();?> 
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dự án 1</title>
        <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="style/style.css">
        <style>
            .table img {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 5px;
            }

            .btn-actions {
                display: flex;
                gap: 5px;
            }

            .search-bar {
                max-width: 400px;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            .add-product-btn {
                background-color: #28a745;
                color: white;
                transition: background-color 0.3s ease;
            }

            .add-product-btn:hover {
                background-color: #218838;
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
                    <a href="?act=admin-listDM" class="sidebar-link">
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
                            <a href="?act=admin-anSanPham" class="sidebar-link">Show Product </a>
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
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth1" aria-expanded="false" aria-controls="auth1">
                        <i class="lni lni-popup"></i>
                        <span>Comment </span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth1" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-binhluan" class="sidebar-link">List Comment</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-hienbinhluan" class="sidebar-link">Show Comment</a>
                        </li>
                       
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="?act=admin-thongke" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Statistics</span>
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

            <div class="container mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Product Category Statistics</h1>
            <!-- <a href="?act=admin-themSP" class="btn add-product-btn">+ Add New Product</a> -->
        </div>

        <!-- Search Bar -->
        <!-- <div class="mb-3">
            <form class="d-flex align-items-center">
                <input type="text" class="form-control search-bar me-2" placeholder="Search by name...">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div> -->

            <div class="table-wrapper">
            <table class="table table-striped table-hover text-center">
                <thead class="table-dark">
                    <tr>
                    <th>Category Code</th>
                    <th>Category Name</th>
                    <th>Quantity</th>
                    <th>Highest Price</th>
                    <th>Lowest Price</th>
                    <th>Average Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($danhSachTKe as $admins) {
                   
                    ?>     
                    <tr>
                
                        <td> <?= $admins->danh_muc_id ?> </td>
                        <td> <?= $admins->ten_danh_muc ?></td> 
                        <td> <?= $admins->so_luong_san_pham ?></td>
                        <td> <?= $admins->gia_cao_nhat ?> </td>
                        <td> <?= $admins->gia_thap_nhat ?> </td>
                        <td> <?= $admins->gia_trung_binh ?> </td>
                        
                       


                        

                        <td></td>
                <?php }  ?>
                </tbody>
                </table>
    <div class="container my-5">
        <h1 class="text-center mb-4">Order statistics</h1>
        
        <!-- Thống kê tổng quan -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total orders</h5>
                        <p class="card-text fs-3"><?= $thongKe['tong_don_hang'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total revenue</h5>
                        <p class="card-text fs-3"><?= number_format($thongKe['tong_doanh_thu'], 0, ',', '.') ?> $</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Number of products sold</h5>
                        <p class="card-text fs-3"><?= $thongKe['tong_san_pham'] ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Số đơn hàng theo trạng thái -->
        <h2 class="mb-3">Number of orders by status</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                <th>Status</th>
                <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($thongKe['trang_thai'] as $trangThai): ?>
                    <tr>
                        <td>Status <?= $trangThai['trang_thai_id'] ?></td>
                        <td><?= $trangThai['so_luong'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Doanh thu theo tháng -->
        <h2 class="mb-3">Revenue by month</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                <th>Month</th>
                <th>Revenue ($)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($thongKe['doanh_thu_thang'] as $doanhThu): ?>
                    <tr>
                        <td>Month <?= $doanhThu['thang'] ?></td>
                        <td><?= number_format($doanhThu['doanh_thu'], 0, ',', '.') ?> $</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


                
                
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
        <script src="style/style.js"></script>
    </body>

    </html>
    </body>

    </html>