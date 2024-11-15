<?php 

include_once "models/all.php";
include_once "models/AdminSanPham.php";
include_once "controllers/SanPhamController.php";

include_once "models/AdminDonHang.php";
include_once "controllers/DonHangController.php";

// Route
$act = "";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
}

// Lấy giá trị "id" từ đường dẫn url
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$admin = new SanPhamController();
$adminDonHang = new DonHangController();
switch($act) {
    case "":
        // Điều hướng sang trang mặc định (trang danh sách) nếu người dùng không truyền "act"
        header("Location: ?act=admin-donhang");
        break;
    case "admin-sanpham":
    $admin->sanpham();
    break;

    case "admin-donhang";
    $adminDonHang->donhang();
    break;

    default:
        // Hiển thị "trang 404 fage not found" nếu giá trị "act" không nằm trong danh sách phía trên.
        // Lưu ý: Gặp lỗi này phải kiểm tra ngay giá trị act trên đường dẫn url, xem xem có gõ sai chính tả không. Chứ gõ sai chính tả thì buồn lắm luôn...
       
        break;
}
