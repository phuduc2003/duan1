<?php 

include_once "models/all.php";
include_once "models/AdminSanPham.php";
include_once "controllers/SanPhamController.php";

include_once "models/AdminDonHang.php";
include_once "controllers/DonHangController.php";

include_once "models/AdminUser.php";
include_once "controllers/UserController.php";

include_once "controllers/DanhMucController.php";
include_once "models/AdminDanhMuc.php";


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
$adminDM = new DanhMucController();
$admin = new SanPhamController();
$adminDonHang = new DonHangController();
$user = new UserController();
switch($act) {
    case "":
        // Điều hướng sang trang mặc định (trang danh sách) nếu người dùng không truyền "act"
        header("Location: ?act=login");
        break;
//------------------------ TRANG QUÁN LÝ SẢN PHẨM --------------------------------//
     //DANH SÁCH
    case "admin-sanpham":
    $admin->sanpham();
    break;
    //CHI TIẾT
    case "admin-chitietsp":
        
        //bật cái dưới này lên//
    // $admin->ChiTietSP($id);
    // break;


    //THÊM SỬA XOÁ
    case "admin-delete";
   $admin->delete($id);
   break;
   case "admin-themSP";
   $admin->themSP();
   break;
   case "admin-update";
   $admin->showUpdate($id);
   break;


//-----------------------------END----------------------------------------------------//
     //------------------------ TRANG QUÁN LÝ ĐƠN HÀNG-------------------------------//
    case "admin-donhang";
    $adminDonHang->donhang();
    break;

    //thêm sửa xoá
    case "admin-deleteDonHang";
    $adminDonHang->deleteHang($id);
    break;

//-----------------------------END----------------------------------------------------//
//------------------------------TRANG QUẢN LÝ DANH MUC--------------------------------//
// case "admin-listDM":
//     $adminDM->ListDM();
//     break;
// case "admin-create":
//     $adminDM->themDM();
//     break;
// case "admin-update":
//     $adminDM->xuaDM($id);
//     break;
// case "admin-delete":
//     $adminDM->xoaDM($id);
//     break;

// case "admin-dress":
//     $adminDM->Dress();
//     break;
// case "admin-shirt":
//     $adminDM->Shirt();
//     break;
// case "admin-trouser":
//     $adminDM->Trouser();
//     break;

    
//     case "admin-updateDonHang";
//     $adminDonHang->updateDonHang($id);
//     break;

// bật quản lý danh mục lên
     //------------------------------END------------------------------------------//
   //-----------------------------------TRANG QUẢN LÝ USER ------------------------------//
    case "admin-listuser";
    $user->ListUser();
    break;
    //SỬ LÝ DỮ LIỆU ĐĂNG NHẬP
  case "admin-login":
        $user->showLogin();
        break; 
    //LOGIN LOGOUT
        case "login";
        $user->login();
        break;
        case "logout";
        $user->logout();
        break;

    //THÊM SỬA XOÁ
    case "admin-create";
    $user->CreateUser();
    break;
    case "admin-updateUser";
    $user->UpdateUser($id);
    break;
   //------------------------------END------------------------------------------//
    default:
        // Hiển thị "trang 404 fage not found" nếu giá trị "act" không nằm trong danh sách phía trên.
        // Lưu ý: Gặp lỗi này phải kiểm tra ngay giá trị act trên đường dẫn url, xem xem có gõ sai chính tả không. Chứ gõ sai chính tả thì buồn lắm luôn...
       
        break;


        
    
}