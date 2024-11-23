

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-header h1 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
        }

        .form-label {
            font-weight: bold;
            color: #555;
        }

        .btn-submit {
            background-color: #28a745;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-reset {
            background-color: #dc3545;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-reset:hover {
            background-color: #c82333;
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
                        <span>Danh Mục</span>
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
                        <span>Quản Lý Danh Mục</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-sanpham" class="sidebar-link">Danh Sách Sản Phẩm</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="?act=admin-create" class="sidebar-link">Thêm Sản Phẩm</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Quản Lý Thành Viên</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
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
                    </ul>
                </li>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two1" aria-expanded="false" aria-controls="multi-two1">
                                Khách Hàng
                            </a>
                            <ul style="background-color: #1A2035;" id="multi-two1" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="?act=admin-listuser" class="sidebar-link">Danh Sách Thành Viên</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-create" class="sidebar-link">Thêm Thành Viên</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth1" aria-expanded="false" aria-controls="auth1">
                        <i class="lni lni-protection"></i>
                        <span>Quản Lý Đơn Hàng</span>
                    </a>
                    <ul style="background-color: #1A2035;" id="auth1" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="?act=admin-donhang" class="sidebar-link">Danh Sách Đơn Hàng</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="" class="sidebar-link">?</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Quản Lý Bình Luận</span>
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
            <a href="?act=admin-logout" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Đăng Xuất</span>
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
            
            <main class="content px-3 py-4">
            <div class="container">
    <div class="form-container">
        <div class="form-header">
            <h1> Add New Account</h1>
        </div>
<form action="" method="POST" class="pb-5 mt-4 ms-4 me-4" enctype="multipart/form-data" >
                <!-- Khu vực thông báo lỗi -->
<div style="color: red;">
<?= $thongBaoLoi ?>
</div>
<div style="color: red;">
<?= $thongBaoUploadFile ?>
</div>

<!-- Khu vực thông báo thành công -->
<div style="color: green;">
<?= $thongBaoThanhCong ?>
</div>


<div class="mb-3">
                <label for="productName" class="form-label"> Name</label>
                <input type="text" class="form-control" id="productName" placeholder="Enter  name" required name="ho_ten">
            </div>

        
            <div class="mb-3">
                <label for="productCategory" class="form-label">Gender</label>
                <select class="form-select" id="productCategory" required name="gioi_tinh" >
                    <option selected disabled>Select gender</option>
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Enter Phone Number" min="0" required  name="so_dien_thoai" >  
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Email</label>
                <input type="text" class="form-control" id="productPrice" placeholder="Enter Email" min="0" required  name="email" >  
            </div>

      
            <div class="mb-3">
                <label for="productStock" class="form-label"> Date of birth</label>
                <input type="date" class="form-control" id="productStock" placeholder="Enter stock quantity" min="0" required name="ngay_sinh">
            </div>
        
            <div class="mb-3">
                <label for="productImage" class="form-label"> Image</label>
                <input type="file" class="form-control" id="productImage" accept="image" required name="file_anh_upload" >
            </div>
            <div class="mb-3">
                <label for="productStock" class="form-label"> Password</label>
                <input type="password" class="form-control" id="productStock" placeholder="Enter password" min="0" required name="mat_khau">
            </div>
            <div class="mb-3">
                <label for="productStock" class="form-label"> Address</label>
                <input type="text" class="form-control" id="productStock" placeholder="Enter Address" min="0" required name="dia_chi">
            </div>
           
            <div class="mb-3">
                <label for="productCategory" class="form-label">Status</label>
                <select class="form-select" id="productCategory" required name="trang_thai">
                    <option selected disabled>Select Status</option>
                    <option value="1">Presently</option>
                    <option value="2">Hidden</option>
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">position</label>
                <select class="form-select" id="productCategory" required name="chuc_vu_id">
                    <option selected disabled>Select position</option>
                    <option value="1">Admin</option>
                    <option value="2">Client</option>
                    
                </select>
            </div>

         
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-submit" name="submitForm" >Add Account</button>
                <button type="reset" class="btn btn-reset">Reset</button>
            </div>
</form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="style/style.js"></script>

</body>
</html>
 