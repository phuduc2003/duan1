<?php 
//--------------------SẢN PHẨM------------------
include_once "models/all.php";
include_once "models/AdminSanPham.php";
include_once "controllers/SanPhamController.php";

//--------------------ĐƠN HÀNG------------------
include_once "models/AdminDonHang.php";
include_once "controllers/DonHangController.php";

//--------------------USER------------------
include_once "models/AdminUser.php";
include_once "controllers/UserController.php";

//--------------------CHI TIẾT ĐƠN HÀNG------------------
include_once "models/AdminChiTietDH.php";

//--------------------DANH MỤC------------------
include_once "controllers/DanhMucController.php";
include_once "models/AdminDanhMuc.php";

//--------------------BÌNH LUẬN------------------
include_once "controllers/BinhLuanController.php";
include_once "models/AdminBinhLuan.php";

//--------------------THỐNG KÊ------------------
include_once "models/AdminThongKe.php";

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
$user = new UserController();
$adminDM = new DanhMucController();
$adminBL = new BinhLuanController();


switch($act) {
    case "":
        // Điều hướng sang trang mặc định (trang danh sách) nếu người dùng không truyền "act"
        header("Location: ?act=login");
        break;
  //-----------------------THỐNG KÊ ----------------------//     
        case "admin-thongke":
        $admin->thongke();
        break;   
        
        

//------------------------ TRANG QUÁN LÝ SẢN PHẨM --------------------------------//
     //DANH SÁCH
    case "admin-sanpham":
    $admin->sanpham();
    break;
    //CHI TIẾT
    case "admin-chitietsp":
    $admin->ChiTietSP($id);
    break;



    // TRANG SẢN PHẨM BỊ ẨN
    case "admin-anSanPham";
    $admin->AnSanPham();
    break;

    // NUT HIỆN SẢN PHẨM
    case "admin-HienSanPham";
    $admin->hienSanPham($id);
    break;


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
//------------------------ TRANG QUÁN DANH MỤC---------------------------------------//
case "admin-listDM";
    $adminDM->ListDM();
    break;
    case "admin-create";
    $adminDM->themDM();
    break;
    case "admin-updatedm";
    $adminDM->xuaDM($id);
    break;
    case "admin-deletedm";
    $adminDM->xoaDM($id);
    break;
   


//-----------------------------END----------------------------------------------------//

//-----------------------------------TRANG QUẢN LÝ BÌNH LUẬN  ------------------------------//
    case "admin-binhluan":
    $adminBL->BinhLuan();
    break;
    // NÚT XOÁ
    case "admin-BinhLuanXoa":
    $adminBL->XoaBinhLuan($id);
    break;
    // NÚT Hiện
    case "admin-showbinhluan":
    $adminBL->HienBinhLuan($id);
     break;
    // HIỆN BÌNH LUẬN BỊ ẨN

    case "admin-hienbinhluan":
    $adminBL->Show_BL();
    break;    
     //------------------------------------END--------------------------------------//



     //------------------------ TRANG QUÁN LÝ ĐƠN HÀNG-------------------------------//
    case "admin-donhang";
    $adminDonHang->donhang();
    break;

    // TRANG ĐƠN HÀNG BỊ ẨN
    case "admin-andonhang":
    $adminDonHang->AnDonHang();
    break;

    //CHI TIẾT ĐƠN HÀNG
    case "admin-chitietdonhang":
    $adminDonHang->ChiTietDH($id);
    break;    

    //thêm sửa xoá
    case "admin-deleteDonHang";
    $adminDonHang->deleteHang($id);
    break;
    case "admin-updateDonHang";
    $adminDonHang->updateDonHang($id);
    break;
    case "admin-GiaoDonHang";
    $adminDonHang->GiaoHang($id);
    break;
    case "admin-HoanTDonHang";
    $adminDonHang->HoanTHang($id);
    break;

    


     //------------------------------END------------------------------------------//
     //----------------------------------TRANG THỐNG KÊ-----------------------------//
     case "admin-thongke":
     $adminDonHang->ThongKe();
     break;   

     //------------------------------------END--------------------------------------//

   //-----------------------------------TRANG QUẢN LÝ USER ------------------------------//
   // TRANG HIỆN USER
    case "admin-listuser";
    $user->ListUser();
    break;

    // TRANG USER BỊ ẨN
    case "admin-AnUser";
    $user->AnUser();
    break;

    //NUT HIỆN USER
    case "admin-hienuser":
    $user->Hienuser($id);
    break;

    //NUT ẨN USER
    case "admin-lockuser":
    $user->LockUser($id);
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

    // NUT THÊM SỬA XOÁ
    case "admin-create";
    $user->CreateUser();
    break;
    case "admin-updateUser";
    $user->UpdateUser($id);
    break;

    case "admin-deleteUser";
    $user->deleteUserId($id);
    break;
   //------------------------------END------------------------------------------//
    default:
        // Hiển thị "trang 404 fage not found" nếu giá trị "act" không nằm trong danh sách phía trên.
        // Lưu ý: Gặp lỗi này phải kiểm tra ngay giá trị act trên đường dẫn url, xem xem có gõ sai chính tả không. Chứ gõ sai chính tả thì buồn lắm luôn...
       
        break;
}
