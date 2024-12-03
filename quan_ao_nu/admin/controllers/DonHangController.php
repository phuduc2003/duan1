<?php
class DonHangController{
 
    public $AdminDonHang;
   public $adminChiTietDH;
  public $AdminSanPham;

    // Khai báo phương thức 
  public function __construct()
  {
      // 1. Khởi tạo giá trị cho thuộc tính hang_hoaQuery
      $this->AdminDonHang = new AdminDonHang();
        $this->adminChiTietDH = new adminChiTietDH();
      $this->AdminSanPham = new AdminSanPham();

        // Mở trình duyệt lên để kiểm tra kết quả
  }

  
  

  public function donhang(){
    $danhSachSanPham = $this->AdminDonHang->All();
    include "view/donhang/DonHangAdmin.php";
  }
//
    public function deleteHang($id){
      if($id !==""){
      $KetQua=$this->AdminDonHang->deleteDonHang($id);
     if($KetQua="success"){
   

      header("location:?act=admin-andonhang");
     }else{
      echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
    }
      } 
    }
//
    public function GiaoHang($id){
      if($id !==""){
      $KetQua=$this->AdminDonHang->GiaoDonHang($id);
        
     if($KetQua="success"){

     
      header("location:?act=admin-andonhang");
     }else{
      echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
    }
      } 
    }
    //
    public function HoanTHang($id){
      if($id !==""){
      $KetQua=$this->AdminDonHang->HoanTDonHang($id);
     if($KetQua="success"){
     

      header("location:?act=admin-andonhang");
     }else{
      echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
    }
      } 
    }
    public function updateDonHang($id)
    {
      
        
        if ($id !== "") {
            $don_hangs = new don_hangs(); 
            $thongBaoLoi = ""; 
            $thongBaoThanhCong = ""; 
            $thongBaoUploadFile = "";
    
            $don_hangs = $this->AdminDonHang->find($id);
    
          if (isset($_POST["submitForm"])) {
          $don_hangs->trang_thai_id=trim($_POST["trang_thai_id"]);

          if($don_hangs->trang_thai_id===""){
                    $thongBaoLoi ="Please select status";
                  }
                if ($thongBaoLoi === "" && $thongBaoUploadFile === "") {
                    $ketQua = $this->AdminDonHang->updateDonHang($id,$don_hangs);
                    if ($ketQua === "success") {
                        $thongBaoThanhCong = "Edited successfully. Please continue creating or return to the list.";
                       
    
                    } else {
                        $thongBaoLoi = "The repair failed. Please check the errors and try again.";
    
                    }
                }
            }    
              
            include "view/donhang/SuaDonHang.php";
            
        } else {
            echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
        }
    } 
 public function ChitietDH($id){
  $orderId=$_GET['id'];
  $orderData = $this->adminChiTietDH->showDH($orderId);


 
  include "view/donhang/ChiTietDHAdmin.php";
 }
 public function AnDonHang(){
  $thongBaoThanhCong = ""; 

  $danhSachSanPham = $this->AdminDonHang->All();
  include "view/donhang/AnDonHangAdmin.php";
 }


public function ThongKe(){
  $ChiTietDonHang = $this->adminChiTietDH->Show($id);
 include "view/thongke/ThongKeAdmin.php";
}



}