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
  public function delete($id){
    if($id !==""){
      $ketQua =$this->AdminSanPham->delete($id);
      if($ketQua==="success"){
      header("Location: ?act=admin-sanpham");
      }else{
        echo "<h1> Lỗi: Tham số id trống. Mời bạn kiểm tra tham số id trên đường dẫn url. </h1>";
      }
    }
   }
   public function themSP(){
      $san_phams =new san_phams();
      $thongBaoLoi="";
      $thongBaoThanhCong="";
      $thongBaoUploadFile="";
      if(isset($_POST["submitForm"])){
        $san_phams->ten_san_pham=trim($_POST["ten_san_pham"]);
        $san_phams->gia_san_pham=trim($_POST["gia_san_pham"]);
        $san_phams->gia_khuyen_mai=trim($_POST["gia_khuyen_mai"]);
        $san_phams->so_luong=trim($_POST["so_luong"]);
        $san_phams->luot_xem=trim($_POST["luot_xem"]);
        $san_phams->ngay_nhap=trim($_POST["ngay_nhap"]);
        $san_phams->mo_ta=trim($_POST["mo_ta"]);
        $san_phams->danh_muc_id=trim($_POST["danh_muc_id"]);
        $san_phams->trang_thai=trim($_POST["trang_thai"]);
        if($san_phams->ten_san_pham===""||$san_phams->gia_san_pham===""){
          $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";

        }

          if($_FILES["file_anh_upload"]["name"]!==""){
            $thamSo1=$_FILES["file_anh_upload"]["tmp_name"];
            $thamSo2 ="uploads/". $_FILES["file_anh_upload"]['name'];
            $ketQuaUploadFile=move_uploaded_file($thamSo1,$thamSo2);
            if($ketQuaUploadFile){
              $san_phams->hinh_anh=$thamSo2;
            }else{
              $thongBaoUploadFile ="upload file không thành công. mời bạn thử lại.";
            }
          }
          if($thongBaoLoi===""&& $thongBaoUploadFile===""){
            $ketQua=$this->AdminSanPham->insert($san_phams);
            if($ketQua==="success"){
              $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
              $AdminSanPham = new AdminSanPham();
            }else {
              $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";

          }
          

        }

      }
    include "view/sanpham/ThemSanPhamAdmin.php";
   }
    
   public function showUpdate($id){
    if($id !==""){
      $san_phams =new san_phams();
      $thongBaoLoi="";
      $thongBaoThanhCong="";
      $thongBaoUploadFile="";

      $san_phams=$this->AdminSanPham->find($id);

      if(isset($_POST["submitForm"])){
        $san_phams->ten_san_pham=trim($_POST["ten_san_pham"]);
        $san_phams->gia_san_pham=trim($_POST["gia_san_pham"]);
        $san_phams->gia_khuyen_mai=trim($_POST["gia_khuyen_mai"]);
        $san_phams->so_luong=trim($_POST["so_luong"]);
        $san_phams->luot_xem=trim($_POST["luot_xem"]);
        $san_phams->ngay_nhap=trim($_POST["ngay_nhap"]);
        $san_phams->mo_ta=trim($_POST["mo_ta"]);
        $san_phams->danh_muc_id=trim($_POST["danh_muc_id"]);
        $san_phams->trang_thai=trim($_POST["trang_thai"]);
        if($san_phams->ten_san_pham===""||$san_phams->gia_san_pham===""){
          $thongBaoLoi = "Tên sản phẩm, số lượng , GIá bán, Ngày xuất bản là thông tin bắt buộc. Mời bạn nhập đầy đủ thông tin và thử lại.";

        }

          if($_FILES["file_anh_upload"]["name"]!==""){
            $thamSo1=$_FILES["file_anh_upload"]["tmp_name"];
            $thamSo2 ="uploads/". $_FILES["file_anh_upload"]['name'];
            $ketQuaUploadFile=move_uploaded_file($thamSo1,$thamSo2);
            if($ketQuaUploadFile){
              $san_phams->hinh_anh=$thamSo2;
            }else{
              $thongBaoUploadFile ="upload file không thành công. mời bạn thử lại.";
            }
          }
          if($thongBaoLoi===""&& $thongBaoUploadFile===""){
            $ketQua=$this->AdminSanPham->update($id,$san_phams);
            if($ketQua==="success"){
              $thongBaoThanhCong = "Tạo mới thành công. Mời bạn tiếp tục tạo mới hoặc quay lại danh sách.";
              $AdminSanPham = new AdminSanPham();
            }else {
              $thongBaoLoi = "Tạo mới thất bại. Mời bạn kiểm tra lỗi và thực hiện lại.";

          }
          

        }

      }
    include "view/sanpham/SuaSanPhamAdmin.php";
   
    }
   }
}