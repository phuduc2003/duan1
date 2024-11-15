

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
                            <a href="?act=sanpham" class="sidebar-link">Danh Sách Sản Phẩm</a>
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
                            
                                <img src="upload/user.jpg" class="avatar img-fluid" alt="">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end rounded">

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
            <table  class="table">
        <thead >
            <tr>
             
                <th>ID</th></th>
                <th>Tên Sản Phẩm </th>
                <th>Giá Tiền</th>
                <th>Giá Khuyến mãi</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Lướt xem </th>
                <th>Ngày Nhập</th>  
                <th>mô tả</th>
                <th>Danh Mục</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
           
        <tbody>
            <?php foreach ($danhSachSanPham as $admins) : ?>     
                <tr>
               
                    <td> <?= $admins->id ?> </td>
                    <td> <?= $admins->ten_san_pham ?></td>
                   
                    <td> <?= $admins->gia_san_pham ?> </td>
                    <td> <?= $admins->gia_khuyen_mai ?></td> <td>
                        <div style="height: 60px; width:60px;">
                            <img style="max-height:100%; max-width:100%;" src="<?= $admins->hinh_anh ?>">
                        </div>
                    </td>
                    <td> <?= $admins->so_luong ?></td>
                    <td> <?= $admins->luot_xem ?></td>
                    <td> <?= $admins->ngay_nhap ?></td>
                    <td> <?= $admins->mo_ta ?></td>
                    <td> <?= $admins->danh_muc_id ?></td>
                    <td> <?= $admins->trang_thai ?></td>
                    <td style="width:170px;">
                    <button class="btn btn-success">
                                    <a href="?act=admin-update&id=<?= $admins->id ?>" class="text-white" style="text-decoration:none;">
                                        <i class="fa-solid fa-pen-to-square"></i> Sửa
                                    </a>
                                </button>
                                
                                <button class="btn btn-danger">
                                    <a href="?act=admin-delete&id=<?= $admins->id ?> " style="text-decoration:none;" class="text-white" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </a>
                                </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </main>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="style/style.js"></script>
</body>

</html>
</body>

</html>