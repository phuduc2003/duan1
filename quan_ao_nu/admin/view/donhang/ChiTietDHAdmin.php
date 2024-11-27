
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

            <body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Order Details</h1>

        <!-- Thông tin khách hàng -->
        <div class="card mb-4 order-details-card">
            <div class="card-header bg-primary text-white">
            Customer Information
            </div>
            <?php foreach($danhSachSanPham as $admin){ ?>
            <div class="card-body">
                <p><strong>Customer name:</strong> <?= $admin->ten_nguoi_nhan ?></p>
                <p><strong>Email:</strong> <?= $admin->email_nguoi_nhan?></p>
                <p><strong>phone number:</strong> <?= $admin->sdt_nguoi_nhan?></p>
                <p><strong>Order date:</strong> <?= $admin->ngay_dat?></p>
                <p><strong>Status:</strong> <span class="badge bg-success">Delivered</span></p>
            </div>
            <?php }?>
        </div>

        <!-- Thông tin đơn hàng -->
        <div class="card mb-4 order-details-card">
            <div class="card-header bg-secondary text-white">
            Order Information
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price($)</th>
                        <th>Money ($)</th>
                    </tr>
                    </thead>    
                    <tbody>
                        <?php foreach($ChiTietDonHang as $admin){  ?>
                    <tr>
                        <td><?= $admin->id ?></td>

                        <td><?= $admin->san_pham_id ?></td>
                        
                        <td><?= $admin->so_luong ?></td>
                        <td><?= $admin->don_gia ?></td>
                        <td>
                            <?=$admin->thanh_tien=$admin->so_luong *$admin->don_gia ?>
                        </td>
                       
                    </tr>
                    
                   
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total:</th>
                        <th><?=$admin->thanh_tien ?></th>
                    </tr>
                    </tfoot> <?php }?>
                </table>
            </div>
        </div>

        <!-- Nút quay lại -->
        <div class="text-center">
            <a href="?act=admin-donhang" class="btn-back">Back to order list</a>
        </div>
    </div>
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