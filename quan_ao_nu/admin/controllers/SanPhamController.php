<?php
class SanPhamController
{
   
   
  public $AdminSanPham;


  // Khai báo phương thức 
  public function __construct()
  {
      // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
      $this->AdminSanPham = new AdminSanPham();
      // Mở trình duyệt lên để kiểm tra kết quả
  }

  public function sanpham(){
    $danhSachSanPham = $this->AdminSanPham->all();
      include   "view/sanpham/SanPhamAdmin.php";
  }

    
}