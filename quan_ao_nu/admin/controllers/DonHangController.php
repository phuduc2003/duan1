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

    public function deleteHang($id){
      if($id !==""){
      $KetQua=$this->AdminDonHang->deleteDonHang($id);
     if($KetQua="success"){
      header("location: ?act =admin-donhang");
     }else{
      echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
    }
      } 
    }
    public function updateDonHang($id){
      if($id !==""){
        $don_hangs = new don_hangs();
        $thongBaoLoi="";
        $thongBaoUploadFile="";
        $thongBaoThanhCong="";
        $don_hangs=$this->AdminDonHang->find_DH($id);
        
        if(isset($_POST["submitForm"])){
          $don_hangs->ma_don_hang=trim($_POST["ma_don_hang"]);
          $don_hangs->tai_khoan_id	=trim($_POST["tai_khoan_id"]);
          $don_hangs->ten_nguoi_nhan=trim($_POST["ten_nguoi_nhan"]);
          $don_hangs->email_nguoi_nhan=trim($_POST["email_nguoi_nhan"]);
          $don_hangs->sdt_nguoi_nhan=trim($_POST["sdt_nguoi_nhan"]);
          $don_hangs->dia_chi_nguoi_nhan=trim($_POST["dia_chi_nguoi_nhan"]);
          $don_hangs->ngay_dat=trim($_POST["ngay_dat"]);
          $don_hangs->ghi_chu=trim($_POST["ghi_chu"]);
          $don_hangs->phuong_thuc_thanh_toan_id=trim($_POST["phuong_thuc_thanh_toan_id"]);
          $don_hangs->trang_thai_id=trim($_POST["trang_thai_id"]);

          if($don_hangs->ma_don_hang){
            $thongBaoLoi ="mã đơn hàng phải nhập";
          }
          
          if($thongBaoLoi===""){
            $KetQua=$this->AdminDonHang->updloadDonHang($id,$don_hangs);
            if($KetQua==="success"){
              $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
              $AdminDonHang = new AdminDonHang();
            }else {
              $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";

          }
          }
        }
      }
      include "view/donhang/SuaDonHang.php";
    }
}