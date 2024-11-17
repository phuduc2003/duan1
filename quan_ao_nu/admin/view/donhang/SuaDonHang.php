

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
                                    <a href="?act=admin-user" class="sidebar-link">Danh Sách Quan Lý</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-createTV" class="sidebar-link">Thêm Quản Lý</a>
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
                                    <a href="?act=admin-user" class="sidebar-link">Danh Sách Thành Viên</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="?act=admin-createTV" class="sidebar-link">Thêm Thành Viên</a>
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
                            <a href="?act=admin-donHang" class="sidebar-link">Danh Sách Đơn Hàng</a>
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
            <form action="#" class="d-none d-sm-inline-block">
                       <div class="input1">
                    <input type="text" name="" id="" placelado="tim">
                   </div>
                   <div class="icon">
                    <box-icon name='search-alt'></box-icon>
                         </div>
                </form>
                <div class="navbar-collapse collapse">
             
                    <ul class="navbar-nav ms-auto">
                         <box-icon name='envelope'></box-icon>
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

<div class="row">
    <div class="">
        <label for="inputEmail4" class="form-label">Mã Đơn Hàng</label>
        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập tên sản phẩm" name="ma_don_hang" value="<?= $don_hangs->ma_don_hang ?>" >
    </div>
    <div class="">
        <label for="inputEmail4" class="form-label">Tên Người Nhận</label>
        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập số lượng" name="ten_nguoi_nhan" value="<?= $don_hangs->ten_nguoi_nhan ?>">
    </div>
    <div class="">
        <label for="inputEmail4" class="form-label">Email Người Nhận</label>
        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá bán" name="email_nguoi_nhan"value="<?= $don_hangs->email_nguoi_nhan ?>" >
    </div>
    <div class="">
        <label for="inputEmail4" class="form-label">SĐT Người Nhận</label>
        <input type="number" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá bán" name="sdt_nguoi_nhan"value="<?= $don_hangs->sdt_nguoi_nhan ?>" >
    </div>
    <div class="">
        <label for="inputEmail4" class="form-label">Địa Chỉ Người Đặt</label>
        <input type="text" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá sale" name="dia_chi_nguoi_nhan" value="<?= $don_hangs->dia_chi_nguoi_nhan ?>">
    <div class="">
        <label for="inputEmail4" class="form-label">Ngày Đặt</label>
        <input type="date" class="form-control rounded-0" id="inputEmail4" placeholder="Nhập giá bán" name="ngay_dat" value="<?= $don_hangs->ngay_dat ?>">
        <div class="">
        <label for="inputPassword4" class="form-label">Ghi Chú</label>
        <textarea name="ghi_chu" id="description" cols="30" rows="3" class="form-control" placeholder="Mô tả"></textarea>
    </div>
    <div class="">
        <label for="inputPassword4" class="form-label">Địa Chỉ người nhận</label>
        <textarea name="dia_chi_nguoi_nhan" id="description" cols="30" rows="3" class="form-control" placeholder="Mô tả"></textarea>
    </div>
    <div class="mt-3">
        <span class="form-label">Phương Thức Thanh Toán:</span>
        <select class="form-control" name="phuong_thuc_thanh_toan_id">
            <option value="0">-- Lựa chọn --</option>
            <option value="1">tiền mặt</option>
            <option value="2">chuyển khoản</option>
        </select>
    </div>
    <div class="mt-3">
        <span class="form-label">Tài Khoản :</span>
        <select class="form-control" name="tai_khoan_id">
            <option value="0">-- Lựa chọn --</option>
            <option value="1">admin</option>
            <option value="2">Khách Hàng</option>
            
        </select>
    </div>
    <div class="mt-3">
        <span class="form-label">Trạng Thái:</span>
        <select class="form-control" name="trang_thai_id">
            <option value="1">còn hàng</option>
           
            <option value="2">hết hàng</option>
        </select>
    </div>
    <!-- <div class="mt-3">
        <span class="form-label">Lựa chọn</span>
        <div class="row ps-3 pt-2">
            <div class="form-check col-2">
                <input class="form-check-input" type="radio" name="trang_thai" id="flexRadioDefault1">
                <label value="1" class="form-check-label" for="flexRadioDefault1">
                  Còn hàng
                </label>
            </div>
            <div class="form-check col-5">
                <input class="form-check-input" type="radio" name="trang_thai" id="flexRadioDefault2" checked>
                <label value="2" class="form-check-label" for="flexRadioDefault2">
                  Hết hàng
                </label>
            </div>
        </div>
    </div> -->
    <div class="mt-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-success" name="submitForm">Tạo mới</button>
    </div>  
</div>
</form>
            </main>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="style/style.js"></script>
</body>

</html>
</body>

</html>