<?php 

class gioHangController
{

   
    public function homeSanPham(){
      try {
        require_once "./views/sanPham.php";
      } catch (Exception $e) {
        echo "Có lỗi xảy ra: " . $e->getMessage();
      }
    }  
    public function homeSanPhamChiTiet(){
        try {
          require_once "./views/chiTietSanPham.php";
        } catch (Exception $e) {
          echo "Có lỗi xảy ra: " . $e->getMessage();
        }
      }  
      public function homeGioHang(){
        try {
          require_once "./views/gioHang.php";
        } catch (Exception $e) {
          echo "Có lỗi xảy ra: " . $e->getMessage();
        }
      }  

}