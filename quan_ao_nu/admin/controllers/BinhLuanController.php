<?php
class BinhLuanController{
 
    public $AdminBinhLuan;


    // Khai báo phương thức 
  public function __construct()
  {
      // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
      $this->AdminBinhLuan = new AdminBinhLuan();


        // Mở trình duyệt lên để kiểm tra kết quả
  }


  
  public function BinhLuan(){
    $danhSachBinhLuan = $this->AdminBinhLuan->All_bl();
    include "view/binhluan/BinhLuanAdmin.php";
  }
  public function Show_BL(){
    $danhSachBinhLuan = $this->AdminBinhLuan->All_bl();
    include "view/binhluan/ShowBinhLuanAdmin.php";
  }

  public function XoaBinhLuan($id){
    if($id !==""){
      $ketQua =$this->AdminBinhLuan->xoa($id);
      if($ketQua==="success"){
      header("Location: ?act=admin-binhluan");
      }else{
        echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
      }
    }
   }


   public function HienBinhLuan($id){
    if($id !==""){
      $ketQua =$this->AdminBinhLuan->hien($id);
      if($ketQua==="success"){
      header("Location: ?act=admin-hienbinhluan");
      }else{
        echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
      }
    }
   }
}