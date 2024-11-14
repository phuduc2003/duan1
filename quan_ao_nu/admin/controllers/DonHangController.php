<?php
class DonHangController{
    public $AdminDonHang;

    // Khai báo phương thức 
  public function __construct()
  {
      // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
      $this->AdminDonHang = new AdminDonHang();
      // Mở trình duyệt lên để kiểm tra kết quả
  }
  public function donhang(){
    $danhSachSanPham = $this->AdminDonHang->All();
    include "view/donhang/DonHangAdmin.php";
  }

}