

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
    <link rel="stylesheet" href="style/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .order-details-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-back {
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #0056b3;
            color: #fff;
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
                        <i class="lni lni-list"></i>
                        <span>category </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-archive"></i>
                        <span>Product Management</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-sanpham" class="sidebar-link">Product List</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-create" class="sidebar-link">Add New Product</a>
                        </li> 
                        <li class="sidebar-item">
                            <a href="?act=admin-anSanPham" class="sidebar-link">List of products deleted </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-users"></i>
                        <span>Account Management</span>
                    </a>
                </li>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two1" aria-expanded="false" aria-controls="multi-two1">
                                CLIENT, ADMIN
                            </a>
                            <ul style="background-color: #1A2035;" id="multi-two1" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="?act=admin-listuser" class="sidebar-link"> List of accounts</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-create" class="sidebar-link">Add New Account</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-AnUser" class="sidebar-link">List of locked accounts </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                 <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#orderDropdown" aria-expanded="false" aria-controls="orderDropdown">
                        <i class="lni lni-package"></i>
                        <span>Order Management</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="orderDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-donhang" class="sidebar-link">Order delivered successfully</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-andonhang" class="sidebar-link">pending orders</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#commentDropdown" aria-expanded="false" aria-controls="commentDropdown">
                        <i class="lni lni-popup"></i>
                        <span>Comment Management</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="commentDropdown" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-binhluan" class="sidebar-link">List of comments</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-hienbinhluan" class="sidebar-link"> List of Deleted Comments</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="?act=admin-thongke" class="sidebar-link">
                        <i class="lni lni-stats-up"></i>
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
            
            <?php if (!empty($orderData)) { 
    // Lấy thông tin đơn hàng chính
    $orderInfo = $orderData[0];
?>
<div class="container my-5">
    <!-- Card hiển thị thông tin đơn hàng -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Order Information</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Order ID:</strong> <?= $orderInfo['ma_don_hang']; ?></p>
                    <p><strong>Customer Name:</strong> <?= $orderInfo['ten_nguoi_nhan']; ?></p>
                    <p><strong>Email:</strong> <?= $orderInfo['email_nguoi_nhan']; ?></p>
                    <p><strong>Phone Number:</strong> <?= $orderInfo['sdt_nguoi_nhan']; ?></p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    <?= $orderInfo['trang_thai_id'] == 4 ? 'bg-success' : 
                         ($orderInfo['trang_thai_id'] == 3 ? 'bg-info' : 
                         ($orderInfo['trang_thai_id'] == 2 ? 'bg-warning' : 'bg-secondary')); ?>">
                    <?php
                    if ($orderInfo['trang_thai_id'] == 4) echo "Completed";
                    if ($orderInfo['trang_thai_id'] == 3) echo "In Delivery";
                    if ($orderInfo['trang_thai_id'] == 2) echo "Pending Approval";
                    if ($orderInfo['trang_thai_id'] == 1) echo "Approved";
                    ?>
                </span>
            </p>

                </div>
                <div class="col-md-6">
                    <p><strong>Address:</strong> <?= $orderInfo['dia_chi_nguoi_nhan']; ?></p>
                    <p><strong>Order Date:</strong> <?= $orderInfo['ngay_dat']; ?></p>
                    <p><strong>describe:</strong> <?= $orderInfo['ghi_chu']; ?></p>
                    <p><strong>Payment method:</strong> 
                    <?php if($orderInfo['phuong_thuc_thanh_toan_id']==1){echo"Cash on Delivery";}
                          if($orderInfo['phuong_thuc_thanh_toan_id']==2){echo"online payment";} ?></p>
                </div>
            </div>
           
        </div>
    </div>

    <!-- Card hiển thị chi tiết đơn hàng -->
    <div class="card mt-4 shadow">
        <div class="card-header bg-secondary text-white">
            <h3 class="card-title">Order Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $tong = 0;
                    foreach ($orderData as $detail) { ?>
                        <tr>
                            <td><?= $detail['ten_san_pham']; ?></td>
                            <td><?= $detail['so_luong']; ?></td>
                            <td><?= number_format($detail['don_gia'], 2); ?> $</td>
                            <td><?= number_format($detail['thanh_tien'], 2); ?> $</td>
                        </tr>
                    <?php 
                        $tong += $detail['thanh_tien'];
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total:</th>
                        <th><?= number_format($tong, 2); ?> $</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="container my-5">
        <div class="alert alert-warning">
            <strong>No order found!</strong> Please check the order ID.
        </div>
    </div>
<?php } ?>


        <!-- Nút quay lại -->
        <div class="text-center">
            <a href="?act=admin-donhang" class="btn-back">Back to order list</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="style/style.js"></script>
</body>

</html>







     




