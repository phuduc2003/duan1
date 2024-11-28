<?php 
 session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
// error_reporting(0); // Tắt báo cáo lỗi
// ini_set('display_errors', 0);
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' =>  (new HomeController())->home(),
    //SanPham
    'sanpham' => (new HomeController())->homeSanPham(),
   'chitietsanpham' => (new HomeController())->detailSanPham(),
   'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
   'xoa-san-pham-gio-hang' => (new HomeController())->deleteSpTrongGh(),
    'thanh-toan'  => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan'  => (new HomeController())->postThanhToan(),
    'lich-su-mua-hang'  => (new HomeController())->lichSuMuaHang(),
    'chi-tiet-mua-hang'  => (new HomeController())->chiTietMuaHang(),
    'huy-don-hang'  => (new HomeController())->huyDonHang(),
    'them-binh-luan' => (new HomeController())->postComments(),
  
    //auth
    'login' =>(new HomeController())->formLogin(),
    'register' =>(new HomeController())->formRegister(),
    'them-register' =>(new HomeController())->postAddTaiKhoan(),
    'check-login' =>(new HomeController())->postLogin(),
    'logout' =>(new HomeController())->logout(),


};