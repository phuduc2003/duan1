<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php';// Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/DanhMucController.php';
require_once './controllers/SanPhamController.php';
// Require toàn bộ file Models
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';

// Route
$act = $_GET['act'] ?? '/';


match ($act) {
    

    
};