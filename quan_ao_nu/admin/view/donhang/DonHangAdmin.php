


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
<div class="container mt-5">
    <!-- Header -->
    <!-- <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Product Management</h1>
        <a href="?act=admin-themSP" class="btn add-product-btn">+ Add New Product</a>
    </div> -->

    <!-- Search Bar -->
    <div class="mb-3">
        <form class="d-flex align-items-center">
            <input type="text" class="form-control search-bar me-2" placeholder="Search by name...">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>

    <!-- Product Table -->
    <div class="table-wrapper">
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <tr>
                <th>ID</th></th>
                <th>Order Code </th>
                <th> Recipient Account</th>
                <th> Name Recipient</th>
                <th>Email Recipient</th>
                <th>Phone Number</th>
                <th>Placer Address</th>
                <th> Date Put </th>
                <th>Total Amount </th>  
                <th>Notes</th>
                <th>Pay</th>
                <th>Status</th>
                <th>Operation</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($danhSachSanPham as $admins) {
                if($admins->trang_thai_id === 4 ){
                ?>     
                <tr>
               
                    <td> <?= $admins->id ?> </td>
                    <td> <?= $admins->ma_don_hang ?></td>
                   
                    <td><?= $admins->ho_ten ?></td>
                    <td> <?= $admins->ten_nguoi_nhan ?></td> 
                    <!-- <td>
                        <div style="height: 60px; width:60px;">
                            <img style="max-height:100%; max-width:100%;" src="">
                        </div>
                    </td> -->
                    <td> <?= $admins->email_nguoi_nhan ?></td>
                    <td> <?= $admins->sdt_nguoi_nhan ?></td>
                    <td> <?= $admins->dia_chi_nguoi_nhan ?></td>
                    <td> <?= $admins->ngay_dat ?></td>
                    <td> <?= $admins->tong_tien ?></td>
                    <td> <?= $admins->ghi_chu ?></td>
                    <td> <?php if( $admins->phuong_thuc_thanh_toan_id==1){
                        echo"  cash ";
                    }else{echo" Online ";} ?></td>
                    <td> <?php if( $admins->trang_thai_id==4 ){
                        echo"Completed Received";
                    } 

                        ?></td>
                    <td style="width:170px;">
                    <!-- <button class="btn btn-success m-1">
                                    <a href="?act=admin-updateDonHang&id=<?= $admins->id ?>" class="text-white" style="text-decoration:none;">
                                        <i class="fa-solid fa-pen-to-square"></i> Fix
                                    </a>
                                </button> -->
                                
                                <button class="btn btn-danger">
                                    <a href="?act=admin-chitietdonhang&id=<?= $admins->id ?> " style="text-decoration:none;" class="text-white" >
                                        <i class="fa-solid fa-trash"></i>See details
                                    </a>
                                </button>
                                
                    </td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
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